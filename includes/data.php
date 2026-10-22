<?php
/**
 * AiPBX.bid — Central Data Loader & Multilingual Helper
 * Loads data.json and provides trilingual (TR/EN/DE) rendering helpers.
 */

// The server's Apache sandbox forbids executable memory; without this every
// regex call logs a PCRE JIT warning.
ini_set('pcre.jit', '0');

$dataFile = __DIR__ . '/../data.json';
$data = [];
if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true) ?: [];
}

// ── Language Routing (TR / EN / DE / AZ) ──────────────────────────────────────────
// The URL alone decides the language, so every URL always serves the same
// content (a hard requirement for canonical/hreflang SEO):
//   /features      → TR (default, no prefix)
//   /en/features   → EN
//   /de/features   → DE
//   /az/features   → AZ
// .htaccess maps /en/*, /de/* and /az/* onto the same PHP files with SITE_LANG set.
const SITE_URL     = 'https://aipbx.bid';
const SITE_LANGS   = ['tr', 'en', 'de', 'az'];
const DEFAULT_LANG = 'tr';
const YOUTUBE_CHANNEL = 'https://www.youtube.com/@aipbx';
// YouTube video ids per language (no Azerbaijani video: Turkish is shown there).
// Add the menu tour ids here when they are uploaded; an empty list hides the video.
const VIDEOS = [
    'install' => ['tr' => 'eDHHHW6ZcvQ', 'en' => 'lH1-k_z5jFE', 'de' => '1QuOM6Rtcbg'],
    'tour'    => [],
];

/** The video id for the page language, falling back to Turkish (az) and English. */
function video_id(string $kind, string $lang): string {
    $v = VIDEOS[$kind] ?? [];
    return $v[$lang] ?? ($lang === 'az' ? ($v['tr'] ?? '') : '') ?: ($v['en'] ?? '');
}

$PAGE_SLUG = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php', '.php');
$PAGE_SLUG = ($PAGE_SLUG === 'index') ? '/' : '/' . $PAGE_SLUG;

/** Absolute URL of a page slug ('/', '/features', '/features#x') in the given language. */
function lang_url(string $slug, string $lang, bool $absolute = true): string {
    $path = ($lang === DEFAULT_LANG) ? $slug : '/' . $lang . ($slug === '/' ? '/' : $slug);
    return ($absolute ? SITE_URL : '') . $path;
}

$envLang = $_SERVER['SITE_LANG'] ?? $_SERVER['REDIRECT_SITE_LANG'] ?? '';
$LANG = in_array($envLang, SITE_LANGS, true) ? $envLang : DEFAULT_LANG;

// Legacy ?lang=xx URLs (already indexed / linked) → permanent redirect to the path-based URL.
if (isset($_GET['lang']) && in_array(strtolower((string)$_GET['lang']), SITE_LANGS, true)) {
    $q = $_GET;
    unset($q['lang']);
    $target = lang_url($PAGE_SLUG, strtolower((string)$_GET['lang'])) . ($q ? '?' . http_build_query($q) : '');
    header('Location: ' . $target, true, 301);
    exit;
}

// First visit to a default-language URL: send humans whose browser prefers
// another supported language to that version once (302, never cached).
// Crawlers and anyone who already has a language cookie see the URL as-is.
if ($LANG === DEFAULT_LANG && !isset($_COOKIE['aipbx_lang'])
    && ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET'
    && !preg_match('/bot|crawl|spider|slurp|lighthouse|preview|facebookexternalhit|embedly|headless/i', $_SERVER['HTTP_USER_AGENT'] ?? 'bot')
    && !empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $preferred = DEFAULT_LANG;
    foreach (explode(',', strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE'])) as $l) {
        $code = substr(trim($l), 0, 2);
        if ($code === 'tr') { $preferred = 'tr'; break; }
        if ($code === 'az') { $preferred = 'az'; break; }
        if ($code === 'de') { $preferred = 'de'; break; }
        if ($code !== '' && $code !== '*') { $preferred = 'en'; break; }
    }
    if ($preferred !== DEFAULT_LANG) {
        $qs = $_SERVER['QUERY_STRING'] ?? '';
        header('Cache-Control: private, no-store');
        header('Vary: Accept-Language, Cookie');
        header('Location: ' . lang_url($PAGE_SLUG, $preferred) . ($qs !== '' ? '?' . $qs : ''), true, 302);
        exit;
    }
}
header('Vary: Accept-Language, Cookie');
header('Content-Language: ' . $LANG);
setcookie('aipbx_lang', $LANG, ['expires' => time() + 365 * 24 * 3600, 'path' => '/', 'secure' => true, 'samesite' => 'Lax']);

/**
 * Pages carry all three translations inline (data-lang="tr|en|de"). Only the
 * active language is sent: search engines must see one language per URL, and
 * the HTML shrinks to roughly a third.
 */
function strip_foreign_lang(string $html, string $lang): string {
    static $void = ['area', 'br', 'col', 'embed', 'hr', 'img', 'input', 'source', 'track', 'wbr'];
    $out = '';
    $pos = 0;
    while (preg_match('/<([a-zA-Z][a-zA-Z0-9]*)\b[^>]*?\sdata-lang="(tr|en|de|az)"[^>]*>/', $html, $m, PREG_OFFSET_CAPTURE, $pos)) {
        $start   = $m[0][1];
        $openEnd = $start + strlen($m[0][0]);
        $tag     = strtolower($m[1][0]);
        if ($m[2][0] === $lang || $tag === 'html') {
            $out .= substr($html, $pos, $openEnd - $pos);
            $pos = $openEnd;
            continue;
        }
        if (in_array($tag, $void, true) || str_ends_with($m[0][0], '/>')) {
            $out .= substr($html, $pos, $start - $pos);
            $pos = $openEnd;
            continue;
        }
        $depth = 1;
        $scan  = $openEnd;
        while ($depth > 0 && preg_match('#<(/?)' . $tag . '\b[^>]*>#i', $html, $t, PREG_OFFSET_CAPTURE, $scan)) {
            $depth += ($t[1][0] === '/') ? -1 : 1;
            $scan = $t[0][1] + strlen($t[0][0]);
        }
        if ($depth > 0) {
            // Unbalanced markup: keep it rather than swallow the rest of the page.
            $out .= substr($html, $pos, $openEnd - $pos);
            $pos = $openEnd;
            continue;
        }
        $out .= substr($html, $pos, $start - $pos);
        $pos = $scan;
    }
    return $out . substr($html, $pos);
}

/** Prefix root-relative page links with the language folder (/features → /en/features). */
function localize_links(string $html, string $lang): string {
    if ($lang === DEFAULT_LANG) return $html;
    return preg_replace_callback('#\bhref="(/[^"]*)"#', function ($m) use ($lang) {
        $url  = $m[1];
        $path = parse_url($url, PHP_URL_PATH) ?? '/';
        if (str_starts_with($url, '//')
            || preg_match('#^/(en|de|az|css|js|img|downloads|admin|api|cdn-cgi|\.well-known)(/|$)#', $path)
            || str_contains(basename($path), '.')) {
            return $m[0];
        }
        return 'href="/' . $lang . $url . '"';
    }, $html);
}

ob_start(function (string $html) use ($LANG): string {
    return localize_links(strip_foreign_lang($html, $LANG), $LANG);
});

// Data shortcuts
$company           = $data['company'] ?? [];
$stats             = $data['stats'] ?? [];
$hero              = $data['hero'] ?? [];
$flagshipFeatures  = $data['flagshipFeatures'] ?? [];
$tables            = $data['tables'] ?? [];
$technicalDeepDive = $data['technicalDeepDive'] ?? [];
$faq               = $data['faq'] ?? [];

// ── String & Escaping Helpers ────────────────────────────────────────────────
if (!function_exists('e')) {
    function e($s): string {
        return htmlspecialchars((string)$s, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
    }
}

if (!function_exists('url_safe')) {
    function url_safe($s): string {
        $u = trim((string)$s);
        if ($u === '') return '';
        if (preg_match('#^(?:/|\#|\?|mailto:|tel:|https?://)#i', $u) || str_starts_with($u, 'wa.me/')) {
            return e($u);
        }
        if (preg_match('/^[a-z][a-z0-9+\-.]*:/i', $u)) return '';
        return e($u);
    }
}

if (!function_exists('j')) {
    function j($s): string {
        return json_encode((string)$s, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    }
}

// ── Trilingual Tag Rendering Helpers ─────────────────────────────────────────
/**
 * Renders all 3 language representations with data-lang attributes for instant client-side switching.
 * HTML tags (<span>, <a>, <strong>, etc.) are preserved without double-escaping.
 */
function t(string $tr, string $en, ?string $de = null, string $tag = 'span', string $extra = '', ?string $az = null): string {
    $de = $de ?? $en;
    $az = $az ?? $tr;
    if ($tag === '') {
        $tag = 'span';
    }
    $out = '';
    foreach (['tr' => $tr, 'en' => $en, 'de' => $de, 'az' => $az] as $l => $text) {
        $out .= "<{$tag} data-lang=\"{$l}\"{$extra}>{$text}</{$tag}>";
    }
    return $out;
}

function t_html(string $tr, string $en, ?string $de = null, string $tag = 'div', string $extra = '', ?string $az = null): string {
    return t($tr, $en, $de, $tag, $extra, $az);
}

function t_field(array $item, string $fieldPrefix, string $tag = 'span', string $extra = ''): string {
    $tr = (string)($item[$fieldPrefix . 'TR'] ?? ($item[$fieldPrefix] ?? ''));
    $en = (string)($item[$fieldPrefix . 'EN'] ?? $tr);
    $de = (string)($item[$fieldPrefix . 'DE'] ?? $en);
    $az = (string)($item[$fieldPrefix . 'AZ'] ?? $tr);
    return t($tr, $en, $de, $tag, $extra, $az);
}

function getLocal(array $item, string $fieldPrefix, ?string $lang = null): string {
    global $LANG;
    $l = $lang ?: $LANG;
    $suffix = strtoupper($l); // TR, EN, DE
    if (isset($item[$fieldPrefix . $suffix])) {
        return (string)$item[$fieldPrefix . $suffix];
    }
    if (isset($item[$fieldPrefix . 'TR'])) return (string)$item[$fieldPrefix . 'TR'];
    if (isset($item[$fieldPrefix . 'EN'])) return (string)$item[$fieldPrefix . 'EN'];
    return (string)($item[$fieldPrefix] ?? '');
}

function getLangUrl(string $targetLang): string {
    global $PAGE_SLUG;
    return lang_url($PAGE_SLUG, $targetLang, false);
}

// ── App downloads ────────────────────────────────────────────────────────────
// Builds are attached to GitHub Releases by CI (android-build.yml / ios-build.yml).
// Download links use GitHub's fixed "latest" URLs; the release tag and file sizes
// shown next to them are looked up once an hour.
const GITHUB_REPO = 'mahirgul/AiPBX';

function latest_release(): array {
    static $rel = null;
    if ($rel !== null) return $rel;
    $cache = sys_get_temp_dir() . '/aipbx_latest_release.json';
    if (is_file($cache) && time() - filemtime($cache) < 3600) {
        return $rel = json_decode((string)file_get_contents($cache), true) ?: [];
    }
    $ctx = stream_context_create(['http' => [
        'timeout' => 3,
        'header'  => "User-Agent: aipbx.bid\r\nAccept: application/vnd.github+json\r\n",
    ]]);
    $json = @file_get_contents('https://api.github.com/repos/' . GITHUB_REPO . '/releases/latest', false, $ctx);
    $data = $json ? json_decode($json, true) : null;
    if (!is_array($data) || empty($data['tag_name'])) {
        // Keep serving the last good answer; retry in an hour.
        if (is_file($cache)) { touch($cache); return $rel = json_decode((string)file_get_contents($cache), true) ?: []; }
        return $rel = [];
    }
    $rel = ['tag' => $data['tag_name'], 'assets' => array_column($data['assets'] ?? [], 'size', 'name')];
    @file_put_contents($cache, json_encode($rel));
    return $rel;
}

/** Download URL for an app build: always the newest file of the latest GitHub Release. */
function download_url(string $file): string {
    return 'https://github.com/' . GITHUB_REPO . '/releases/latest/download/' . $file;
}

/** Human-readable size of a build ("3.0 MB"), from GitHub or the local copy. */
function download_size(string $file): string {
    $rel = latest_release();
    $bytes = $rel['assets'][$file] ?? 0;
    return $bytes ? number_format($bytes / 1048576, 1) . ' MB' : '';
}

/** Badge text for the Android build: the release tag once CI has attached the APK. */
function android_build_label(): string {
    global $company;
    $rel = latest_release();
    return $rel['tag'] ?? ('v' . ($company['version'] ?? ''));
}

