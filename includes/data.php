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
//   /features      → EN (default, no prefix; since 2026-10-26, Turkish before)
//   /tr/features   → TR
//   /de/features   → DE
//   /az/features   → AZ
// .htaccess maps /tr/*, /de/* and /az/* onto the same PHP files with SITE_LANG set,
// and sends the old /en/* addresses to the unprefixed ones (301).
const SITE_URL     = 'https://aipbx.bid';
const SITE_LANGS   = ['tr', 'en', 'de', 'az'];
const DEFAULT_LANG = 'en';
const YOUTUBE_CHANNEL = 'https://www.youtube.com/@aipbx';
const PLAY_STORE_URL = 'https://play.google.com/store/apps/details?id=com.mhrgl.AiPBX';
// YouTube video ids per language (no Azerbaijani video: Turkish is shown there).
// Add the menu tour ids here when they are uploaded; an empty list hides the video.
const VIDEOS = [
    'install' => ['tr' => 'eDHHHW6ZcvQ', 'en' => 'lH1-k_z5jFE', 'de' => '1QuOM6Rtcbg'],
    'tour'    => ['tr' => 'Teol14NgXbY', 'en' => 'xU0BYN6AKE4', 'de' => '8whV_DY3ZqQ'],
];

// For the VideoObject structured data (search results show the video).
// uploadDate must be a full ISO 8601 datetime with time zone (Google Search Console requirement).
const VIDEO_INFO = [
    'eDHHHW6ZcvQ' => ['lang' => 'tr', 'date' => '2026-10-22T15:16:16-07:00', 'duration' => 'PT3M48S',
        'title' => 'AiPBX Kurulumu: Açık Kaynak IP Santral Adım Adım (Ubuntu 26.04 · Asterisk 22)',
        'desc' => 'AiPBX açık kaynak IP santralin boş bir Ubuntu 26.04 sunucuya tek komutla kurulumu: Asterisk 22, PJSIP, WebRTC, SIP/TLS, T.38 faks, çağrı merkezi ve yerel yapay zekâ.'],
    'lH1-k_z5jFE' => ['lang' => 'en', 'date' => '2026-10-22T15:08:18-07:00', 'duration' => 'PT4M24S',
        'title' => 'How to Install AiPBX: Open-Source AI-Powered IP PBX, Step by Step (Ubuntu 26.04 · Asterisk 22)',
        'desc' => 'Installing the AiPBX open-source IP PBX on an empty Ubuntu 26.04 server with one command: Asterisk 22, PJSIP, WebRTC, SIP over TLS, T.38 fax, a call center and local AI.'],
    '1QuOM6Rtcbg' => ['lang' => 'de', 'date' => '2026-10-22T15:18:29-07:00', 'duration' => 'PT4M3S',
        'title' => 'AiPBX installieren: Quelloffene IP-Telefonanlage mit KI, Schritt für Schritt (Ubuntu 26.04)',
        'desc' => 'Installation der Open-Source-Telefonanlage AiPBX mit einem Befehl auf einem leeren Ubuntu-26.04-Server: Asterisk 22, PJSIP, WebRTC, SIP über TLS, T.38-Fax, Callcenter und lokale KI.'],
    'Teol14NgXbY' => ['lang' => 'tr', 'date' => '2026-10-25T12:19:22-07:00', 'duration' => 'PT9M47S',
        'title' => 'AiPBX Menü Turu: Açık Kaynak IP Santralin Bütün Ekranları (Asterisk 22 · WebRTC · Çağrı Merkezi)',
        'desc' => 'AiPBX yönetim panelinin bütün menülerini sırayla tanıtıyoruz: dahililer, SIP dış hatlar, gelen ve giden yönlendirmeler, IVR, kuyruklar, çağrı merkezi, faks, yerel yapay zekâ, entegrasyonlar ve güvenlik. Örnek verilerle, yeni kurulmuş bir santral üzerinde.'],
    'xU0BYN6AKE4' => ['lang' => 'en', 'date' => '2026-10-25T12:19:30-07:00', 'duration' => 'PT10M46S',
        'title' => 'AiPBX Menu Tour: Every Screen of the Open-Source IP PBX (Asterisk 22 · WebRTC · Call Center)',
        'desc' => 'We walk through every menu of the AiPBX administration portal: extensions, SIP trunks, inbound and outbound routes, IVR, queues, the call center, fax, local AI, integrations and security. With sample data, on a freshly installed system.'],
    '8whV_DY3ZqQ' => ['lang' => 'de', 'date' => '2026-10-25T12:19:35-07:00', 'duration' => 'PT10M4S',
        'title' => 'AiPBX Menütour: Alle Seiten der Open-Source-Telefonanlage (Asterisk 22 · WebRTC · Callcenter)',
        'desc' => 'Wir gehen alle Menüs des AiPBX-Verwaltungsportals durch: Nebenstellen, SIP-Trunks, eingehende und ausgehende Routen, IVR, Warteschlangen, Callcenter, Fax, lokale KI, Integrationen und Sicherheit. Mit Beispieldaten auf einer frisch installierten Anlage.'],
];

/** "/css/site.css" -> "/css/site.css?v=<mtime>": browsers fetch a file again as soon as it changes. */
function asset(string $path): string {
    $t = @filemtime(dirname(__DIR__) . $path);
    return $path . '?v=' . ($t ?: '1');
}

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
// The cookie was renamed (aipbx_lang → aipbx_locale) when the default became
// English, so a visitor whose old cookie said "tr" for the unprefixed URLs is
// asked again by the browser language instead of being pinned to English.
if ($LANG === DEFAULT_LANG && !isset($_COOKIE['aipbx_locale'])
    && ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET'
    && !preg_match('/bot|crawl|spider|slurp|lighthouse|preview|facebookexternalhit|embedly|headless/i', $_SERVER['HTTP_USER_AGENT'] ?? 'bot')
    && !empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $preferred = DEFAULT_LANG;
    foreach (explode(',', strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE'])) as $l) {
        $code = substr(trim($l), 0, 2);
        if (in_array($code, SITE_LANGS, true)) { $preferred = $code; break; }
        if ($code !== '' && $code !== '*') { break; }   // any other language: English
    }
    if ($preferred !== DEFAULT_LANG) {
        $qs = $_SERVER['QUERY_STRING'] ?? '';
        header('Cache-Control: private, no-store');
        header('Vary: Accept-Language, Cookie');
        // The cookie is set on the redirect too: a browser that still holds the
        // old permanent "/tr/ → /" redirect (Turkish was unprefixed until
        // 2026-10-26) comes straight back here, and must then stay put instead
        // of bouncing between the two addresses.
        setcookie('aipbx_locale', $preferred, ['expires' => time() + 365 * 24 * 3600, 'path' => '/', 'secure' => true, 'samesite' => 'Lax']);
        header('Location: ' . lang_url($PAGE_SLUG, $preferred) . ($qs !== '' ? '?' . $qs : ''), true, 302);
        exit;
    }
}
header('Vary: Accept-Language, Cookie');
header('Content-Language: ' . $LANG);
setcookie('aipbx_locale', $LANG, ['expires' => time() + 365 * 24 * 3600, 'path' => '/', 'secure' => true, 'samesite' => 'Lax']);

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

/** Prefix root-relative page links with the language folder (/features → /tr/features). */
function localize_links(string $html, string $lang): string {
    if ($lang === DEFAULT_LANG) return $html;
    return preg_replace_callback('#\bhref="(/[^"]*)"#', function ($m) use ($lang) {
        $url  = $m[1];
        $path = parse_url($url, PHP_URL_PATH) ?? '/';
        if (str_starts_with($url, '//')
            || preg_match('#^/(tr|en|de|az|css|js|img|downloads|admin|api|cdn-cgi|\.well-known)(/|$)#', $path)
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

