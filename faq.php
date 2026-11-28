<?php
/**
 * aipbx.bid — FAQ Hub (/faq) and Individual Technology Articles (/faq/<slug>).
 */
$techArticles = require __DIR__ . '/includes/tech-articles.php';
$topic = trim((string) ($_GET['topic'] ?? ''));

if ($topic !== '' && !isset($techArticles[$topic])) {
    include __DIR__ . '/404.php';
    exit;
}

$page = 'faq';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/content.php';

if ($topic !== '') {
    $art = $techArticles[$topic];
    $artTitle = getLocal($art, 'title');
    $artDesc  = getLocal($art, 'summary');
    $artKw    = getLocal($art, 'keywords');
    $PAGE_SLUG = '/faq/' . $topic;

    $seoOverride = [
        'title'    => $artTitle . ' — AiPBX FAQ & Tech',
        'desc'     => mb_strimwidth($artDesc, 0, 160, '…'),
        'keywords' => $artKw,
        'slug'     => '/faq/' . $topic,
        'type'     => ['WebPage', 'TechArticle'],
    ];
    $head = [
        t_field($art, 'title', ''),
        t_field($art, 'summary', ''),
    ];

    $slugs = array_keys($techArticles);
    $idx = array_search($topic, $slugs, true);
    $prevSlug = ($idx !== false && $idx > 0) ? $slugs[$idx - 1] : null;
    $nextSlug = ($idx !== false && $idx < count($slugs) - 1) ? $slugs[$idx + 1] : null;
} else {
    $PAGE_SLUG = '/faq';
    // Append article summaries into $faq so FAQPage JSON-LD and the accordion share one source.
    foreach ($techArticles as $slug => $art) {
        if ($slug === 'quic') {
            continue;
        }
        $faq[] = [
            'qTR' => $art['titleTR'],
            'qEN' => $art['titleEN'],
            'qDE' => $art['titleDE'],
            'qAZ' => $art['titleAZ'],
            'aTR' => $art['summaryTR'],
            'aEN' => $art['summaryEN'],
            'aDE' => $art['summaryDE'],
            'aAZ' => $art['summaryAZ'],
            'link' => '/faq/' . $slug,
        ];
    }
    $head = [
        t('Sık sorulanlar & mimari teknolojiler', 'FAQ & architecture technologies', 'FAQ & Architektur-Technologien', az: 'Tez-tez verilən suallar & texnologiyalar'),
        t(
            'Kullandığımız ve test ettiğimiz tüm temel teknolojiler (Asterisk 22, PJSIP, Port 443 ALPN, WebRTC, Go Chat, ONNX TTS, Silero VAD, HEPv3, Passkey ve deneysel QUIC) tek tek makalelerle.',
            'Every core technology AiPBX runs in production or actively tests — Asterisk 22, PJSIP, Port 443 ALPN, WebRTC, Go chat, ONNX TTS, Silero VAD & Smart Turn, HEPv3, Passkeys, PushKit/CallKit, and experimental QUIC — documented one by one.',
            'Alle Kerntechnologien, die AiPBX produktiv einsetzt oder testet – Asterisk 22, PJSIP, Port 443 ALPN, WebRTC, Go-Chat, ONNX-TTS, Silero VAD & Smart Turn, HEPv3, Passkeys und experimentelles QUIC.',
            az: 'AiPBX-də işlətdiyimiz və sınaqdan keçirdiyimiz bütün əsas texnologiyalar (Asterisk 22, PJSIP, Port 443 ALPN, WebRTC, Go söhbət, ONNX TTS, Silero VAD, HEPv3, Passkey və təcrübi QUIC) ayrı-ayrı məqalələrlə.'
        ),
    ];
}
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
    <?php include __DIR__ . '/includes/sections/pagehead.php'; ?>

<?php if ($topic !== ''): ?>
    <section class="sx-section">
        <div class="sx-wrap">
            <article class="sx-article">
                <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:18px;font-size:.9rem;color:var(--sx-muted);">
                    <div>
                        <a href="/" style="font-weight:600;text-decoration:none;"><?= t('Ana Sayfa', 'Home', 'Startseite', az: 'Ana Səhifə') ?></a> /
                        <a href="/faq" style="font-weight:600;text-decoration:none;"><?= t('SSS & Teknolojiler', 'FAQ & Tech', 'FAQ & Technik', az: 'Suallar & Texnologiya') ?></a> /
                        <span><?= e($artTitle) ?></span>
                    </div>
                    <span style="display:inline-flex;align-items:center;gap:6px;background:<?= e($art['badgeBg']) ?>;color:#fff;font-size:.74rem;font-weight:700;padding:4px 10px;border-radius:999px;letter-spacing:.04em;">
                        <i class="fa-solid <?= e($art['icon']) ?>"></i> <?= t_field($art, 'badge', '') ?>
                    </span>
                </div>

                <?php foreach ($art['sections'] as $sec): ?>
                    <h2><?= t_field($sec, 'heading', '') ?></h2>
                    <p><?= e(getLocal($sec, 'body')) ?></p>
                <?php endforeach; ?>

                <div class="sx-callout">
                    <?= t_field($art, 'callout', '') ?>
                </div>

                <div class="row" style="display:flex;gap:12px;flex-wrap:wrap;margin-top:28px;">
                    <?php if (!empty($art['docsLink'])): ?>
                        <?php $isExt = str_starts_with($art['docsLink'], 'https://'); ?>
                        <a href="<?= e($art['docsLink']) ?>"<?= $isExt ? ' target="_blank" rel="noopener"' : '' ?> class="sx-btn sx-btn-primary">
                            <i class="fa-solid <?= $isExt ? 'fa-up-right-from-square' : 'fa-book' ?>"></i> <?= t_field($art, 'docsLabel', '') ?>
                        </a>
                    <?php endif; ?>
                    <a href="/why-php" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-server"></i> <?= t('Neden PHP? (Mimari)', 'Why PHP? (Architecture)', 'Warum PHP? (Architektur)', az: 'Niyə PHP? (Memarlıq)') ?></a>
                    <a href="/faq" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-layer-group"></i> <?= t('Tüm Teknolojiler', 'All Technologies', 'Alle Technologien', az: 'Bütün Texnologiyalar') ?></a>
                </div>

                <?php if ($prevSlug !== null || $nextSlug !== null): ?>
                    <div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-top:32px;padding-top:20px;border-top:1px solid var(--sx-line);font-size:.92rem;font-weight:600;">
                        <div>
                            <?php if ($prevSlug !== null): ?>
                                <a href="/faq/<?= e($prevSlug) ?>" style="text-decoration:none;">← <?= e(getLocal($techArticles[$prevSlug], 'title')) ?></a>
                            <?php endif; ?>
                        </div>
                        <div>
                            <?php if ($nextSlug !== null): ?>
                                <a href="/faq/<?= e($nextSlug) ?>" style="text-decoration:none;"><?= e(getLocal($techArticles[$nextSlug], 'title')) ?> →</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </article>
        </div>
    </section>
<?php else: ?>
    <section class="sx-section" id="tech-articles">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Kullanılan ve Test Edilen Teknolojiler', 'Technologies Used & Tested', 'Eingesetzte & getestete Technologien', az: 'İstifadə Edilən & Test Olunan Texnologiyalar') ?></h2>
            <p class="sx-lead"><?= t('Her bileşenin AiPBX\'teki rolünü, gerçek ölçümlerini ve deneysel durumunu ayrı makalelerde inceleyin.', 'Read dedicated deep-dives on each core component, real measurements, and experimental prototypes.', 'Ausführliche Artikel zu jeder Komponente, realen Messwerten und experimentellen Prototypen.', az: 'Hər komponentin AiPBX-dəki rolunu, real ölçmələrini və təcrübi statusunu ayrı məqalələrdə oxuyun.') ?></p>
            <div class="sx-apps">
                <div class="sx-app">
                    <div>
                        <span style="display:inline-block;background:#0f172a;color:#fff;font-size:.7rem;font-weight:700;padding:3px 9px;border-radius:999px;letter-spacing:.04em;"><?= t('MİMARİ · KAPASİTE', 'CONTROL PLANE · SIZING', 'ARCHITEKTUR · KAPAZITÄT', az: 'MEMARLIQ · TUTUM') ?></span>
                    </div>
                    <h3><i class="fa-solid fa-server" style="color:#0f172a"></i> <?= t('Neden PHP? (4 vCPU / 4 GB RAM Kapasitesi)', 'Why PHP? (Architecture & 4 GB Server Sizing)', 'Warum PHP? (Architektur & Kapazität)', az: 'Niyə PHP? (Memarlıq & 4 GB Server Tutumu)') ?></h3>
                    <p><?= t('PHP hiçbir sıcak ses/sinyalleşme yolunda değildir: SIP/RTP C\'de, sohbet Go\'da, canlı AI Python/ONNX\'te koşar. 4 vCPU / 4 GB RAM sunucu için gerçek insan & AI ajan sayıları.', 'PHP is never in the SIP, RTP, chat, or live AI voice hot path — C (Asterisk/Nginx), Go, and Python/ONNX do the heavy lifting. Real agent capacity on 4 vCPU / 4 GB RAM.', 'PHP liegt nie im SIP-, RTP-, Chat- oder Live-KI-Pfad — C, Go und Python/ONNX übernehmen die Echtzeitarbeit. Reale Kapazitätswerte für 4 vCPU / 4 GB RAM.', az: 'PHP heç vaxt səs/siqnalizasiya yolunda deyil — C, Go və Python/ONNX real vaxt yükünü daşıyır.') ?></p>
                    <div class="row">
                        <a href="/why-php" class="sx-btn sx-btn-primary"><i class="fa-solid fa-book-open"></i> <?= t('Makaleyi oku', 'Read article', 'Artikel lesen', az: 'Məqaləni oxu') ?></a>
                    </div>
                </div>
                <?php foreach ($techArticles as $slug => $art): ?>
                    <div class="sx-app">
                        <div>
                            <span style="display:inline-block;background:<?= e($art['badgeBg']) ?>;color:#fff;font-size:.7rem;font-weight:700;padding:3px 9px;border-radius:999px;letter-spacing:.04em;"><?= t_field($art, 'badge', '') ?></span>
                        </div>
                        <h3><i class="fa-solid <?= e($art['icon']) ?>" style="color:<?= e($art['iconColor']) ?>"></i> <?= t_field($art, 'title', '') ?></h3>
                        <p><?= t_field($art, 'summary', '') ?></p>
                        <div class="row">
                            <a href="/faq/<?= e($slug) ?>" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-arrow-right"></i> <?= t('Makaleyi oku', 'Read article', 'Artikel lesen', az: 'Məqaləni oxu') ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="sx-section alt" id="faq">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Sık Sorulan Sorular', 'Frequently Asked Questions', 'Häufig gestellte Fragen', az: 'Tez-tez verilən suallar') ?></h2>
            <p class="sx-lead"><?= t('Her başlığı açarak özet cevabı görebilir veya teknik makaleye geçebilirsiniz.', 'Open any question for the summary or jump straight to its technical deep-dive.', 'Öffnen Sie eine Frage für die Kurzantwort oder wechseln Sie zum Fachartikel.', az: 'Qısa cavabı görmək və ya texniki məqaləyə keçmək üçün sualı açın.') ?></p>
            <div class="sx-faq">
                <?php foreach ($faq as $i => $f): ?>
                    <details<?= $i === 0 ? ' open' : '' ?>>
                        <summary><?= e(getLocal($f, 'q')) ?></summary>
                        <p>
                            <?= e(getLocal($f, 'a')) ?>
                            <?php if (!empty($f['link'])): ?>
                                <br><a href="<?= e($f['link']) ?>" style="display:inline-block;margin-top:8px;font-weight:700;text-decoration:none;"><?= t('Teknik makaleyi oku →', 'Read technical article →', 'Fachartikel lesen →', az: 'Texniki məqaləni oxu →') ?></a>
                            <?php endif; ?>
                        </p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
