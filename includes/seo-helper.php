<?php
/**
 * AiPBX.bid — Universal SEO Helper (Tüm sayfalar için)
 * Her sayfada $page değişkeni set edilmiş olmalı.
 * Merkezi SEO veri tablosu — kolayca güncellenebilir.
 */

// One entry per page. docs.php sets $seoOverride per document instead.
$pageSeoMap = array (
  'index' => 
  array (
    'tr' => 
    array (
      'title' => 'AiPBX — Açık kaynak, yapay zekâ destekli IP santral',
      'desc' => 'Tek komutla kurulan ücretsiz kurumsal santral: web portalı, masaüstü telefonlar, Android ve iOS uygulaması, çağrı merkezi, faks ve yerel yapay zekâ. Asterisk 22, MIT lisansı.',
      'keywords' => 'AiPBX, %100 free, açık kaynak IP santral, open source PBX, yapay zeka destekli santral, ai powered pbx, ai supported voip, VoIP santral, SIP santral, SIP trunk, PJSIP, Asterisk 22, WebRTC softphone, ücretsiz IP santral, kurumsal telefon santrali',
    ),
    'en' => 
    array (
      'title' => 'AiPBX — Open-source IP PBX with AI built in',
      'desc' => 'A free business phone system installed with one command: web portal, desk phones, Android and iOS apps, call centre, fax and local AI. Asterisk 22, MIT license.',
      'keywords' => 'AiPBX, 100% free pbx, open source ip pbx, opensource voip, ai powered pbx, ai supported telephony, voip, sip, sip trunk, pjsip, asterisk 22, webrtc softphone, free business phone system, enterprise voip solution',
    ),
    'de' => 
    array (
      'title' => 'AiPBX — Open-Source-Telefonanlage mit KI',
      'desc' => 'Eine kostenlose Telefonanlage, mit einem Befehl installiert: Webportal, Tischtelefone, Android- und iOS-App, Callcenter, Fax und lokale KI. Asterisk 22, MIT-Lizenz.',
      'keywords' => 'AiPBX, 100% free, Open Source IP TK-Anlage, KI Telefonanlage, ai powered voip, Asterisk 22, WebRTC Telefonie, Port 443 SIP, Enterprise Kommunikation, VoIP SIP',
    ),
    'az' => 
    array (
      'title' => 'AiPBX — Süni intellektli açıq mənbəli IP santral',
      'desc' => 'Bir əmrlə quraşdırılan pulsuz korporativ santral: veb portal, masaüstü telefonlar, Android və iOS tətbiqi, çağrı mərkəzi, faks və yerli süni intellekt. Asterisk 22, MIT lisenziyası.',
      'keywords' => 'AiPBX, 100% pulsuz, açıq mənbəli IP santral, süni intellekt santral, ai powered pbx, VoIP santral, SIP santral, SIP trunk, PJSIP, Asterisk 22, WebRTC softphone',
    ),
    'slug' => '/',
  ),
  'android' => 
  array (
    'tr' => 
    array (
      'title' => 'Android Google Play Kapalı Test & Erken Erişim | AiPBX',
      'desc' => 'AiPBX Android kurumsal softphone uygulamasının Google Play kapalı test (Closed Testing) sürecine katılın. Google Grubu veya kayıt formuyla hemen erişim sağlayın.',
      'keywords' => 'AiPBX Android, Google Play kapalı test, closed testing track, AiPBX tester kayıt, Android PBX erken erişim',
    ),
    'en' => 
    array (
      'title' => 'Android Google Play Closed Testing & Early Access | AiPBX',
      'desc' => 'Join the Google Play closed testing track for AiPBX Android enterprise softphone. Get instant access via Google Group or tester registration form.',
      'keywords' => 'AiPBX Android, Google Play closed testing, closed track, AiPBX tester signup, Android PBX early access',
    ),
    'de' => 
    array (
      'title' => 'Android Google Play Closed-Testing & Vorabzugang | AiPBX',
      'desc' => 'Nehmen Sie am Google Play Closed Testing für das AiPBX Android Enterprise-Softphone teil. Sofortiger Zugang über Google Group oder Registrierungsformular.',
      'keywords' => 'AiPBX Android, Google Play Closed-Testing, Closed Track, AiPBX Tester Anmeldung, Android PBX Vorabzugang',
    ),
    'az' => 
    array (
      'title' => 'Android Google Play Qapalı Test & Erkən Giriş | AiPBX',
      'desc' => 'AiPBX Android korporativ softphone tətbiqinin Google Play qapalı test (Closed Testing) prosesinə qoşulun. Google Qrupu və ya qeydiyyat forması ilə dərhal giriş əldə edin.',
      'keywords' => 'AiPBX Android, Google Play qapalı test, closed testing track, AiPBX tester qeydiyyat, Android PBX erkən giriş',
    ),
    'slug' => '/android',
  ),
);

// Aktif sayfa belirle ($page değişkeni PHP sayfasında set edilmeli)
$pageKey = $page ?? 'index';
if (!isset($pageSeoMap[$pageKey])) {
    $pageKey = 'index';
}

$seoData  = $pageSeoMap[$pageKey][$LANG] ?? $pageSeoMap[$pageKey]['tr'];
$seoTitle = $seoData['title'];
$seoDesc  = $seoData['desc'];
$seoKw    = $seoData['keywords'];
$seoSlug  = $pageSeoMap[$pageKey]['slug'] ?? '/';

// Every language version is its own canonical URL; hreflang ties them together.
$canonical = lang_url($seoSlug, $LANG);
$altUrls   = [];
foreach (SITE_LANGS as $l) {
    $altUrls[$l] = lang_url($seoSlug, $l);
}
// Pages built from the AiPBX repository (docs.php) set their own title, description and
// URL; the language versions differ only in the site chrome around the text.
if (isset($seoOverride)) {
    $seoTitle  = $seoOverride['title'];
    $seoDesc   = $seoOverride['desc'];
    $seoSlug   = $seoOverride['slug'];
    $canonical = lang_url($seoSlug, $LANG);
    foreach (SITE_LANGS as $l) {
        $altUrls[$l] = lang_url($seoSlug, $l);
    }
}

$locales       = ['tr' => 'tr_TR', 'en' => 'en_US', 'de' => 'de_DE', 'az' => 'az_AZ'];
$currentLocale = $locales[$LANG] ?? 'tr_TR';
$ogImage       = SITE_URL . '/img/og-image-' . (is_file(__DIR__ . '/../img/og-image-' . $LANG . '.png') ? $LANG : 'tr') . '.png';
$ogImageAlt    = ['tr' => 'AiPBX — Açık Kaynak Kurumsal IP Santral', 'en' => 'AiPBX — Open Source Enterprise IP PBX', 'de' => 'AiPBX — Open-Source-Telefonanlage', 'az' => 'AiPBX — Açıq Mənbəli Korporativ IP Santral'][$LANG];
$homeName      = ['tr' => 'Ana Sayfa', 'en' => 'Home', 'de' => 'Startseite', 'az' => 'Ana Səhifə'][$LANG];
$crumbName     = trim(preg_split('/ — | \| /u', $seoTitle)[0]);
$version       = ltrim(latest_release()['tag'] ?? ($company['version'] ?? ''), 'v');

$graph = [
    [
        '@type'       => 'WebSite',
        '@id'         => SITE_URL . '/#website',
        'url'         => SITE_URL . '/',
        'name'        => 'AiPBX',
        'description' => $company['shortDesc' . strtoupper($LANG)] ?? $seoDesc,
        'inLanguage'  => ['tr', 'en', 'de', 'az'],
        'publisher'   => ['@id' => SITE_URL . '/#author'],
    ],
    [
        '@type'  => 'Person',
        '@id'    => SITE_URL . '/#author',
        'name'   => 'Mahir Gül',
        'url'    => 'https://mhrgl.com',
        'sameAs' => ['https://github.com/mahirgul', 'https://mhrgl.com', 'https://x.com/mhrgl'],
    ],
    [
        '@type'                  => 'SoftwareApplication',
        '@id'                    => SITE_URL . '/#software',
        'name'                   => 'AiPBX',
        'alternateName'          => ['AiPBX 100% Free Open Source AI-Powered IP PBX', 'AiPBX VoIP SIP Telephony', 'AiPBX Açık Kaynak Santral'],
        'applicationCategory'    => 'BusinessApplication',
        'applicationSubCategory' => '100% Free Open Source AI-Powered VoIP & SIP Enterprise IP PBX',
        'operatingSystem'        => 'Ubuntu 26.04 LTS, Android, iOS, Web',
        'softwareVersion'        => $version,
        'description'            => $company['shortDesc' . strtoupper($LANG)] ?? $seoDesc,
        'url'                    => SITE_URL . '/',
        'image'                  => $ogImage,
        'screenshot'             => [SITE_URL . '/img/screenshot_dialer.png', SITE_URL . '/img/screenshot_call.png'],
        'installUrl'             => lang_url('/installation', $LANG),
        'downloadUrl'            => 'https://github.com/mahirgul/AiPBX',
        'license'                => 'https://opensource.org/licenses/MIT',
        'isAccessibleForFree'    => true,
        'offers'                 => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'USD'],
        'author'                 => ['@id' => SITE_URL . '/#author'],
        'sameAs'                 => ['https://github.com/mahirgul/AiPBX'],
    ],
    [
        '@type'              => ($pageKey === 'api-docs' || $pageKey === 'installation') ? ['WebPage', 'TechArticle'] : 'WebPage',
        '@id'                => $canonical . '#webpage',
        'url'                => $canonical,
        'name'               => $seoTitle,
        'headline'           => $crumbName,
        'description'        => $seoDesc,
        'inLanguage'         => $LANG,
        'isPartOf'           => ['@id' => SITE_URL . '/#website'],
        'about'              => ['@id' => SITE_URL . '/#software'],
        'author'             => ['@id' => SITE_URL . '/#author'],
        'primaryImageOfPage' => ['@type' => 'ImageObject', 'url' => $ogImage, 'width' => 1200, 'height' => 630],
        'dateModified'       => date('Y-m-d', max(filemtime($_SERVER['SCRIPT_FILENAME']), filemtime(__DIR__ . '/../data.json'))),
        'breadcrumb'         => ['@id' => $canonical . '#breadcrumb'],
    ],
    [
        '@type'           => 'BreadcrumbList',
        '@id'             => $canonical . '#breadcrumb',
        'itemListElement' => array_values(array_filter([
            ['@type' => 'ListItem', 'position' => 1, 'name' => $homeName, 'item' => lang_url('/', $LANG)],
            $pageKey !== 'index' ? ['@type' => 'ListItem', 'position' => 2, 'name' => $crumbName, 'item' => $canonical] : null,
        ])),
    ],
];

// FAQ rich result data (the same Q&A is visible in the #faq section of the homepage)
if ($pageKey === 'index' && !empty($faq)) {
    $graph[] = [
        '@type'      => 'FAQPage',
        '@id'        => $canonical . '#faq',
        'inLanguage' => $LANG,
        'mainEntity' => array_map(fn($f) => [
            '@type'          => 'Question',
            'name'           => strip_tags(getLocal($f, 'q')),
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags(getLocal($f, 'a'))],
        ], $faq),
    ];
}
?>

<!-- Primary Meta Tags -->
<title><?= e($seoTitle) ?></title>
<meta name="description" content="<?= e($seoDesc) ?>">
<meta name="keywords" content="<?= e($seoKw) ?>">
<meta name="author" content="Mahir Gül">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

<!-- Canonical & Hreflang -->
<link rel="canonical" href="<?= e($canonical) ?>">
<?php foreach ($altUrls as $l => $u): ?>
<link rel="alternate" hreflang="<?= $l ?>" href="<?= e($u) ?>">
<?php endforeach; ?>
<link rel="alternate" hreflang="x-default" href="<?= e($altUrls['en']) ?>">

<!-- Open Graph -->
<meta property="og:site_name" content="AiPBX">
<meta property="og:type" content="website">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:title" content="<?= e($seoTitle) ?>">
<meta property="og:description" content="<?= e($seoDesc) ?>">
<meta property="og:image" content="<?= e($ogImage) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:type" content="image/png">
<meta property="og:image:alt" content="<?= e($ogImageAlt) ?>">
<meta name="twitter:image:alt" content="<?= e($ogImageAlt) ?>">
<meta property="og:locale" content="<?= e($currentLocale) ?>">
<?php foreach ($locales as $lKey => $lVal): if ($lKey !== $LANG): ?>
<meta property="og:locale:alternate" content="<?= e($lVal) ?>">
<?php endif; endforeach; ?>

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@mhrgl">
<meta name="twitter:creator" content="@mhrgl">
<meta name="twitter:title" content="<?= e($seoTitle) ?>">
<meta name="twitter:description" content="<?= e($seoDesc) ?>">
<meta name="twitter:image" content="<?= e($ogImage) ?>">

<!-- Schema.org JSON-LD -->
<script type="application/ld+json">
<?= json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_PRETTY_PRINT) ?>

</script>
