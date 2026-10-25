<?php
/**
 * aipbx.bid — home page: what AiPBX is, the main features and where to go next.
 * Details have their own pages (features, install, videos, mobile) and /docs.
 */
$page = 'index';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/content.php';
?>
<!DOCTYPE html>
<html lang="<?= e($LANG) ?>" data-lang="<?= e($LANG) ?>">
<head>
    <?php include __DIR__ . '/includes/head.php'; ?>
    <?php include __DIR__ . '/includes/seo-helper.php'; ?>
</head>
<body class="sx-page">
<?php include __DIR__ . '/includes/navbar.php'; ?>

<main>
    <section class="sx-hero">
        <div class="sx-wrap">
            <h1><?= t('Açık kaynak IP santral, <em>yapay zekâ</em> ile', 'The open-source IP PBX, with <em>AI</em> built in', 'Die Open-Source-Telefonanlage mit <em>KI</em>', az: 'Açıq mənbəli IP santral, <em>süni intellekt</em> ilə') ?></h1>
            <p><?= t(
                'Tek komutla kurulan kurumsal santral: web portalı, masaüstü telefonlar, mobil uygulamalar, çağrı merkezi ve faks. Ücretsiz ve kendi sunucunuzda.',
                'A business phone system installed with one command: web portal, desk phones, mobile apps, call centre and fax. Free, on your own server.',
                'Eine Telefonanlage für Unternehmen, mit einem Befehl installiert: Webportal, Tischtelefone, Apps, Callcenter und Fax. Kostenlos, auf Ihrem eigenen Server.',
                az: 'Bir əmrlə quraşdırılan korporativ santral: veb portal, masaüstü telefonlar, mobil tətbiqlər, çağrı mərkəzi və faks. Pulsuz və öz serverinizdə.'
            ) ?></p>
            <div class="sx-hero-cta">
                <a href="/install" class="sx-btn sx-btn-primary"><i class="fa-solid fa-terminal"></i> <?= t('Kurulum', 'Install', 'Installieren', az: 'Quraşdırma') ?></a>
                <a href="/videos" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-circle-play"></i> <?= t('Videoyu izle', 'Watch the video', 'Video ansehen', az: 'Videoya bax') ?></a>
                <a href="https://github.com/mahirgul/AiPBX" class="sx-btn sx-btn-ghost" target="_blank" rel="noopener"><i class="fa-brands fa-github"></i> GitHub</a>
            </div>
            <div class="sx-hero-meta">
                <?php if ($version !== ''): ?><b><?= e($version) ?></b> · <?php endif; ?>Asterisk 22 · Ubuntu 26.04 LTS · <?= t('MIT lisansı', 'MIT license', 'MIT-Lizenz', az: 'MIT lisenziyası') ?>
            </div>
            <div class="sx-frame">
                <div class="sx-frame-bar"><i></i><i></i><i></i></div>
                <img src="/img/shots/portal-dashboard.jpg" width="1440" height="900" alt="<?= e($L(['tr' => 'AiPBX portalı: genel bakış', 'en' => 'AiPBX portal: overview', 'de' => 'AiPBX-Portal: Übersicht', 'az' => 'AiPBX portalı: ümumi baxış'])) ?>" fetchpriority="high">
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/includes/sections/features.php'; ?>
    <section class="sx-section" id="next">
        <div class="sx-wrap">
            <div class="sx-next">
                <a href="/install" class="sx-next-card"><i class="fa-solid fa-terminal"></i>
                    <b><?= t('Kurulum', 'Install', 'Installation', az: 'Quraşdırma') ?></b>
                    <span><?= t('Tek komut, yaklaşık 15 dakika.', 'One command, about 15 minutes.', 'Ein Befehl, etwa 15 Minuten.', az: 'Bir əmr, təxminən 15 dəqiqə.') ?></span></a>
                <a href="/videos" class="sx-next-card"><i class="fa-solid fa-circle-play"></i>
                    <b><?= t('Videolar', 'Videos', 'Videos', az: 'Videolar') ?></b>
                    <span><?= t('Kurulum ve panel, altyazılı anlatımla.', 'Installation and portal, narrated and subtitled.', 'Installation und Portal, mit Sprecher und Untertiteln.', az: 'Quraşdırma və panel, səsli izah və altyazı ilə.') ?></span></a>
                <a href="/mobile" class="sx-next-card"><i class="fa-solid fa-mobile-screen"></i>
                    <b><?= t('Mobil', 'Mobile', 'Mobil', az: 'Mobil') ?></b>
                    <span><?= t('Android ve iOS uygulamaları.', 'Android and iOS apps.', 'Android- und iOS-Apps.', az: 'Android və iOS tətbiqləri.') ?></span></a>
            </div>
            <p class="sx-more"><a href="/features"><?= t('Bütün özellikler, ekranlar ve sık sorulanlar', 'All features, screenshots and questions', 'Alle Funktionen, Screenshots und Fragen', az: 'Bütün xüsusiyyətlər, ekranlar və suallar') ?> →</a></p>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
