<?php
/**
 * aipbx.bid — navigation bar (all pages).
 *
 * Five pages in words (features, install, videos, mobile, docs); sponsor,
 * YouTube and GitHub as icons, so the bar stays uncrowded. The hamburger menu
 * below 860 px is the same list with words.
 */
global $LANG, $PAGE_SLUG, $page;
$langNames = ['tr' => 'Türkçe', 'en' => 'English', 'de' => 'Deutsch', 'az' => 'Azərbaycan'];
$langFlags = [
    'tr' => '<svg class="flag-icon" viewBox="0 0 1200 800" width="20" height="14" aria-hidden="true"><rect width="1200" height="800" fill="#E30A17"/><circle cx="480" cy="400" r="200" fill="#fff"/><circle cx="520" cy="400" r="160" fill="#E30A17"/><polygon fill="#fff" points="583,400 641,335 600,400 641,465" transform="rotate(18,610,400)"/></svg>',
    'en' => '<svg class="flag-icon" viewBox="0 0 60 30" width="20" height="14" aria-hidden="true"><rect width="60" height="30" fill="#012169"/><path d="M0,0 L60,30 M60,0 L0,30" stroke="#fff" stroke-width="6"/><path d="M0,0 L60,30 M60,0 L0,30" stroke="#C8102E" stroke-width="4"/><path d="M30,0 v30 M0,15 h60" stroke="#fff" stroke-width="10"/><path d="M30,0 v30 M0,15 h60" stroke="#C8102E" stroke-width="6"/></svg>',
    'de' => '<svg class="flag-icon" viewBox="0 0 900 600" width="20" height="14" aria-hidden="true"><rect width="900" height="600" fill="#fff"/><rect width="900" height="200" fill="#ed2939"/><rect y="400" width="900" height="200" fill="#ed2939"/></svg>', 'az' => '<svg class="flag-icon" viewBox="0 0 1200 800" width="20" height="14" aria-hidden="true"><rect width="1200" height="800" fill="#00B5E2"/><rect y="267" width="1200" height="266" fill="#EF3340"/><rect y="533" width="1200" height="267" fill="#509E2F"/><circle cx="580" cy="400" r="92" fill="#fff"/><circle cx="604" cy="400" r="76" fill="#EF3340"/><polygon fill="#fff" points="680,354 673,382 647,367 662,393 634,400 662,407 647,433 673,418 680,446 687,418 713,433 698,407 726,400 698,393 713,367 687,382"/></svg>',
];

$navItems = [
    ['/features', t('Özellikler', 'Features', 'Funktionen', az: 'Xüsusiyyətlər'), 'features'],
    ['/install',  t('Kurulum', 'Install', 'Installation', az: 'Quraşdırma'), 'install'],
    ['/videos',   t('Videolar', 'Videos', 'Videos', az: 'Videolar'), 'videos'],
    ['/mobile',   t('Mobil', 'Mobile', 'Mobil', az: 'Mobil'), 'mobile'],
    ['/docs',     t('Belgeler', 'Docs', 'Doku', az: 'Sənədlər'), 'docs'],
];
?>
<header class="sx-nav" id="sxNav">
    <div class="sx-nav-in">
        <a href="/" class="sx-brand" aria-label="AiPBX">
            <img src="/img/logo-68.png" alt="" width="32" height="32"><span>AiPBX</span>
        </a>
        <ul class="sx-links">
            <?php foreach ($navItems as [$href, $label, $key]): ?>
                <li><a href="<?= $href ?>"<?= ($key !== '' && ($page ?? '') === $key) ? ' class="active"' : '' ?>><?= $label ?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="sx-actions">
            <div class="sx-lang" id="sxLang">
                <button class="sx-lang-btn" type="button" aria-haspopup="true" aria-label="Language">
                    <?= $langFlags[$LANG] ?><span><?= strtoupper($LANG) ?></span>
                </button>
                <div class="sx-lang-menu">
                    <?php foreach (SITE_LANGS as $l): ?>
                        <a href="<?= e(lang_url($PAGE_SLUG, $l)) ?>" hreflang="<?= $l ?>" lang="<?= $l ?>"<?= $l === $LANG ? ' class="active" aria-current="true"' : '' ?>><?= $langFlags[$l] ?><?= e($langNames[$l]) ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <a href="https://github.com/sponsors/mahirgul" class="sx-icon sx-icon-heart" target="_blank" rel="noopener" aria-label="Sponsor" title="<?= e(['tr' => 'Sponsor ol', 'en' => 'Sponsor', 'de' => 'Sponsern', 'az' => 'Sponsor ol'][$LANG]) ?>"><i class="fa-solid fa-heart"></i></a>
            <a href="https://signup.upcloud.com/?promo=affiliate-aipbx250&amp;utm_source=aipbx&amp;utm_medium=affiliate&amp;utm_campaign=affiliate-aipbx250" class="sx-icon sx-icon-cloud" target="_blank" rel="noopener sponsored" aria-label="UpCloud" title="<?= e(['tr' => 'UpCloud ($250 Ücretsiz Kredi)', 'en' => 'UpCloud ($250 Free Credit)', 'de' => 'UpCloud ($250 Startguthaben)', 'az' => 'UpCloud ($250 Pulsuz Kredit)'][$LANG]) ?>"><i class="fa-solid fa-cloud"></i></a>
            <a href="<?= YOUTUBE_CHANNEL ?>" class="sx-icon sx-icon-yt" target="_blank" rel="noopener" aria-label="YouTube" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
            <a href="https://github.com/mahirgul/AiPBX" class="sx-icon sx-icon-gh" target="_blank" rel="noopener" aria-label="GitHub" title="GitHub"><i class="fa-brands fa-github"></i></a>
            <button class="sx-burger" id="sxBurger" type="button" aria-label="Menu" aria-expanded="false" aria-controls="sxMobile"><span></span><span></span><span></span></button>
        </div>
    </div>
    <div class="sx-mobile" id="sxMobile">
        <?php foreach ($navItems as [$href, $label]): ?>
            <a href="<?= $href ?>"><?= $label ?></a>
        <?php endforeach; ?>
        <a href="https://github.com/sponsors/mahirgul" class="sx-sponsor" target="_blank" rel="noopener"><i class="fa-solid fa-heart"></i> <?= t('GitHub\'da Sponsor Olun', 'Sponsor on GitHub', 'Auf GitHub sponsern', az: 'GitHub-da sponsor olun') ?></a>
        <a href="https://signup.upcloud.com/?promo=affiliate-aipbx250&amp;utm_source=aipbx&amp;utm_medium=affiliate&amp;utm_campaign=affiliate-aipbx250" class="sx-upcloud" target="_blank" rel="noopener sponsored"><i class="fa-solid fa-cloud"></i> <?= t('UpCloud ($250 Ücretsiz Kredi)', 'UpCloud ($250 Free Credit)', 'UpCloud ($250 Startguthaben)', az: 'UpCloud ($250 Pulsuz Kredit)') ?></a>
        <a href="<?= YOUTUBE_CHANNEL ?>" class="sx-gh" target="_blank" rel="noopener"><i class="fa-brands fa-youtube"></i> YouTube</a>
        <a href="https://github.com/mahirgul/AiPBX" class="sx-gh" target="_blank" rel="noopener"><i class="fa-brands fa-github"></i> GitHub</a>
    </div>
</header>
