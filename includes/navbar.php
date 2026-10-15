<?php
/**
 * AiPBX.bid — Universal Navigation Bar Include
 * Features announcement banner, brand identity, quick anchors, docs dropdown, SVG flags, and mobile drawer.
 */
global $LANG, $company, $PAGE_SLUG;
$langNames = ['tr' => 'Türkçe (TR)', 'en' => 'English (EN)', 'de' => 'Deutsch (DE)', 'az' => 'Azərbaycan dili (AZ)'];
$langFlags = [
    'tr' => '<svg class="flag-icon" viewBox="0 0 1200 800" width="20" height="14" aria-hidden="true"><rect width="1200" height="800" fill="#E30A17"/><circle cx="480" cy="400" r="200" fill="#fff"/><circle cx="520" cy="400" r="160" fill="#E30A17"/><polygon fill="#fff" points="583,400 641,335 600,400 641,465" transform="rotate(18,610,400)"/></svg>',
    'en' => '<svg class="flag-icon" viewBox="0 0 60 30" width="20" height="14" aria-hidden="true"><rect width="60" height="30" fill="#012169"/><path d="M0,0 L60,30 M60,0 L0,30" stroke="#fff" stroke-width="6"/><path d="M0,0 L60,30 M60,0 L0,30" stroke="#C8102E" stroke-width="4"/><path d="M30,0 v30 M0,15 h60" stroke="#fff" stroke-width="10"/><path d="M30,0 v30 M0,15 h60" stroke="#C8102E" stroke-width="6"/></svg>',
    'de' => '<svg class="flag-icon" viewBox="0 0 900 600" width="20" height="14" aria-hidden="true"><rect width="900" height="600" fill="#fff"/><rect width="900" height="200" fill="#ed2939"/><rect y="400" width="900" height="200" fill="#ed2939"/></svg>', 'az' => '<svg class="flag-icon" viewBox="0 0 1200 800" width="20" height="14" aria-hidden="true"><rect width="1200" height="800" fill="#00B5E2"/><rect y="267" width="1200" height="266" fill="#EF3340"/><rect y="533" width="1200" height="267" fill="#509E2F"/><circle cx="580" cy="400" r="92" fill="#fff"/><circle cx="604" cy="400" r="76" fill="#EF3340"/><polygon fill="#fff" points="680,354 673,382 647,367 662,393 634,400 662,407 647,433 673,418 680,446 687,418 713,433 698,407 726,400 698,393 713,367 687,382"/></svg>',
];
?>
<!-- Top Announcement Banner -->
<div class="top-banner">
    <div class="top-banner-inner">
        <span class="banner-desktop">
            <i class="fa-solid fa-sparkles"></i> <strong>AiPBX v<?= e($company['version']) ?></strong> — 
            <?= t('Açık Kaynak Kurumsal IP Santral & Birleşik İletişim', 'Open-Source Enterprise IP PBX & Unified Communications', 'Open-Source Enterprise IP-Telefonie & Unified Communications', az: 'Açıq Mənbəli Korporativ IP Santral & Vahid Kommunikasiya') ?>
            • <a href="/android" style="display:inline-flex; align-items:center; gap:5px; background:linear-gradient(135deg, #10b981 0%, #059669 100%); color:#ffffff; padding:2px 10px; border-radius:12px; font-weight:700; text-decoration:none; margin:0 6px; font-size:0.78rem; box-shadow:0 2px 8px rgba(16,185,129,0.35);"><i class="fa-brands fa-google-play"></i> <?= t('Android Teste Katılın!', 'Join Android Beta!', 'Android-Test beitreten!', az: 'Android Testə Qoşulun!') ?></a> • <a href="https://mhrgl.com" target="_blank" rel="noopener">mhrgl.com</a>
        </span>
        <span class="banner-mobile">
            <strong>AiPBX v<?= e($company['version']) ?></strong> • <a href="/android" style="color:#34d399; font-weight:700; text-decoration:underline;"><i class="fa-brands fa-google-play"></i> <?= t('Android Teste Katılın', 'Join Android Beta', 'Android-Test', az: 'Android Testə Qoşulun') ?></a>
        </span>
    </div>
</div>

<!-- Main Navigation Bar -->
<nav>
    <a href="/" class="logo" aria-label="AiPBX Home">
        <img src="/img/logo-68.png" alt="AiPBX" width="34" height="38">
        <span>AiPBX</span>
        <span class="logo-badge">v<?= e(implode('.', array_slice(explode('.', $company['version']), 0, 2))) ?></span>
    </a>

    <ul class="nav-links">
        <li>
            <a href="/" class="<?= (!isset($page) || $page === 'home') ? 'active' : '' ?>">
                <?= t('Genel Bakış', 'Overview', 'Übersicht', az: 'Ümumi Baxış') ?>
            </a>
        </li>
        <li>
            <a href="/features" class="<?= (isset($page) && $page === 'features') ? 'active' : '' ?>">
                <?= t('Özellikler', 'Features', 'Funktionen', az: 'Xüsusiyyətlər') ?>
            </a>
        </li>
        <li>
            <a href="/tables" class="<?= (isset($page) && $page === 'tables') ? 'active' : '' ?>">
                <?= t('Karşılaştırma & Tablolar', 'Tables & Specs', 'Tabellen', az: 'Müqayisə & Cədvəllər') ?>
            </a>
        </li>
        <li>
            <a href="/architecture" class="<?= (isset($page) && $page === 'architecture') ? 'active' : '' ?>">
                <?= t('Mimari', 'Architecture', 'Architektur', az: 'Arxitektura') ?>
            </a>
        </li>
        <li>
            <a href="/mobile-apps" class="<?= (isset($page) && $page === 'mobile') ? 'active' : '' ?>">
                <?= t('Mobil', 'Mobile Apps', 'Mobil-Apps', az: 'Mobil') ?>
            </a>
        </li>
        <li>
            <a href="/msteams" class="<?= (isset($page) && $page === 'teams') ? 'active' : '' ?>">
                <i class="fa-brands fa-microsoft" style="color: #6264a7; margin-right: 4px;"></i><span>Teams</span>
            </a>
        </li>
        <li class="nav-dropdown">
            <button class="nav-dropdown-btn <?= (isset($page) && in_array($page, ['docs', 'installation', 'callcenter', 'security', 'api'])) ? 'active' : '' ?>" type="button" aria-haspopup="true">
                <?= t('Dokümantasyon', 'Docs', 'Handbuch', az: 'Sənədlər') ?>
                <i class="fa-solid fa-chevron-down" style="font-size:10px; margin-left:3px;"></i>
            </button>
            <div class="nav-dropdown-menu">
                <a href="/docs" class="nav-dropdown-item <?= (isset($page) && $page === 'docs') ? 'active' : '' ?>">
                    <i class="fa-solid fa-book" style="color:#0f172a; font-size:1.1rem; width:20px; text-align:center;"></i>
                    <div>
                        <div style="font-weight:700; color:#0f172a;"><?= t('Teknik Dokümantasyon', 'Technical Documentation', 'Technische Dokumentation', az: 'Texniki Sənədlər') ?></div>
                        <small style="color:#64748b; font-size:0.76rem;"><?= t('Yönetici kılavuzu ve sorun giderme (İngilizce)', 'Admin guide & troubleshooting', 'Admin-Handbuch & Fehlersuche (Englisch)', az: 'Admin bələdçisi və problemlərin həlli (ingiliscə)') ?></small>
                    </div>
                </a>
                <a href="/installation" class="nav-dropdown-item <?= (isset($page) && $page === 'installation') ? 'active' : '' ?>">
                    <i class="fa-solid fa-terminal" style="color:#0284c7; font-size:1.1rem; width:20px; text-align:center;"></i>
                    <div>
                        <div style="font-weight:700; color:#0f172a;"><?= t('Kurulum Kılavuzu', 'Installation Guide', 'Installationsanleitung', az: 'Quraşdırma Bələdçisi') ?></div>
                        <small style="color:#64748b; font-size:0.76rem;">Ubuntu 26.04 LTS</small>
                    </div>
                </a>
                <a href="/msteams" class="nav-dropdown-item <?= (isset($page) && $page === 'teams') ? 'active' : '' ?>">
                    <i class="fa-brands fa-microsoft" style="color:#6264a7; font-size:1.1rem; width:20px; text-align:center;"></i>
                    <div>
                        <div style="font-weight:700; color:#0f172a;">Microsoft Teams Direct Routing</div>
                        <small style="color:#64748b; font-size:0.76rem;"><?= t('Yerleşik SBC & Çift Yönlü Köprü', 'Built-in SBC & 2-Way Bridge', 'Integriertes SBC & 2-Wege-Gateway', az: 'Daxili SBC & İkitərəfli Körpü') ?></small>
                    </div>
                </a>
                <a href="/mobile-apps" class="nav-dropdown-item <?= (isset($page) && $page === 'mobile') ? 'active' : '' ?>">
                    <i class="fa-solid fa-mobile-screen" style="color:#10b981; font-size:1.1rem; width:20px; text-align:center;"></i>
                    <div>
                        <div style="font-weight:700; color:#0f172a;"><?= t('Mobil Softphone', 'Mobile Softphone', 'Mobile Softphones', az: 'Mobil Softphone') ?></div>
                        <small style="color:#64748b; font-size:0.76rem;">Android (Kotlin) &amp; iOS (Swift)</small>
                    </div>
                </a>
                <a href="/callcenter" class="nav-dropdown-item <?= (isset($page) && $page === 'callcenter') ? 'active' : '' ?>">
                    <i class="fa-solid fa-headset" style="color:#ec4899; font-size:1.1rem; width:20px; text-align:center;"></i>
                    <div>
                        <div style="font-weight:700; color:#0f172a;"><?= t('Çağrı Merkezi & Kuyruklar', 'Call Center & Queues', 'Callcenter & Warteschlangen', az: 'Çağrı Mərkəzi & Növbələr') ?></div>
                        <small style="color:#64748b; font-size:0.76rem;"><?= t('*22/*23 Mola & *90 Dinleme', '*22/*23 Breaks & *90 Spy', '*22/*23 Pausen & *90 Spy', az: '*22/*23 Fasilə & *90 Dinləmə') ?></small>
                    </div>
                </a>
                <a href="/security" class="nav-dropdown-item <?= (isset($page) && $page === 'security') ? 'active' : '' ?>">
                    <i class="fa-solid fa-shield-halved" style="color:#f59e0b; font-size:1.1rem; width:20px; text-align:center;"></i>
                    <div>
                        <div style="font-weight:700; color:#0f172a;"><?= t('Güvenlik & SBC Savunması', 'Security & SBC Defense', 'Sicherheit & SBC-Schutz', az: 'Təhlükəsizlik & SBC Müdafiəsi') ?></div>
                        <small style="color:#64748b; font-size:0.76rem;">Fail2ban, TLS 1.3, Passkeys</small>
                    </div>
                </a>
                <a href="/api-docs" class="nav-dropdown-item <?= (isset($page) && $page === 'api') ? 'active' : '' ?>">
                    <i class="fa-solid fa-code" style="color:#6366f1; font-size:1.1rem; width:20px; text-align:center;"></i>
                    <div>
                        <div style="font-weight:700; color:#0f172a;">REST API &amp; WebSocket</div>
                        <small style="color:#64748b; font-size:0.76rem;"><?= t('Entegrasyon, Webhook & Go Chat', 'Integrations, Webhooks & Chat', 'Integrationen, Webhooks & Chat', az: 'İnteqrasiya, Webhook & Go Chat') ?></small>
                    </div>
                </a>
            </div>
        </li>
    </ul>

    <div class="nav-actions">
        <!-- SVG Flag Language Dropdown (TR, EN, DE with Austrian Flag) -->
        <div class="lang-selector" id="langSelector">
            <button class="lang-btn" id="langSelectorBtn" aria-label="<?= e($langNames[$LANG]) ?> — Select Language" aria-haspopup="true" type="button">
                <span class="lang-flag" id="currentLangFlag"><?= $langFlags[$LANG] ?></span>
                <span class="lang-code" id="currentLangCode"><?= strtoupper($LANG) ?></span>
                <i class="fa-solid fa-chevron-down" style="font-size:10px; margin-left:2px;"></i>
            </button>
            <div class="lang-dropdown" id="langDropdown">
<?php foreach (SITE_LANGS as $l): ?>
                <a class="lang-option<?= $l === $LANG ? ' active' : '' ?>" href="<?= e(lang_url($PAGE_SLUG, $l)) ?>" hreflang="<?= $l ?>" lang="<?= $l ?>" data-set-lang="<?= $l ?>"<?= $l === $LANG ? ' aria-current="true"' : '' ?>>
                    <span class="flag"><?= $langFlags[$l] ?></span>
                    <span><?= e($langNames[$l]) ?></span>
                    <i class="fa-solid fa-check check"></i>
                </a>
<?php endforeach; ?>
            </div>
        </div>

        <!-- GitHub Repo Button -->
        <a href="https://github.com/mahirgul/AiPBX" target="_blank" rel="noopener" class="btn-github desktop-only" title="GitHub Repository">
            <i class="fa-brands fa-github"></i>
            <span>GitHub</span>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="mobile-toggle-btn" id="mobileToggleBtn" aria-label="Toggle Menu" type="button">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>

<!-- Mobile Navigation Drawer -->
<div class="mobile-drawer" id="mobileDrawer">
    <div class="mobile-drawer-header">
        <a href="/" class="logo">
            <img src="/img/logo-68.png" alt="AiPBX" width="30" height="34" loading="lazy">
            <span>AiPBX</span>
            <span class="logo-badge">v<?= e(implode('.', array_slice(explode('.', $company['version']), 0, 2))) ?></span>
        </a>
        <button class="mobile-drawer-close" id="mobileDrawerClose" aria-label="Close menu">&times;</button>
    </div>

    <!-- Mobile Language Bar with SVG Flags -->
    <div class="mobile-lang-bar">
<?php foreach (SITE_LANGS as $l): ?>
        <a class="mobile-lang-btn<?= $l === $LANG ? ' active' : '' ?>" href="<?= e(lang_url($PAGE_SLUG, $l)) ?>" hreflang="<?= $l ?>" lang="<?= $l ?>" data-set-lang="<?= $l ?>">
            <?= $langFlags[$l] ?>
            <span><?= strtoupper($l) ?></span>
        </a>
<?php endforeach; ?>
    </div>

    <ul class="mobile-nav-links">
        <li><a href="/" class="mobile-nav-item"><i class="fa-solid fa-house" style="color:#0284c7;"></i> <span><?= t('Genel Bakış', 'Overview', 'Übersicht', az: 'Ümumi Baxış') ?></span></a></li>
        <li><a href="/features" class="mobile-nav-item"><i class="fa-solid fa-bolt" style="color:#f59e0b;"></i> <span><?= t('Özellikler & Modüller', 'Features & Modules', 'Funktionen & Module', az: 'Xüsusiyyətlər & Modullar') ?></span></a></li>
        <li><a href="/tables" class="mobile-nav-item"><i class="fa-solid fa-table-list" style="color:#10b981;"></i> <span><?= t('Karşılaştırma & Tablolar', 'Tables & Specs', 'Tabellen', az: 'Müqayisə & Cədvəllər') ?></span></a></li>
        <li><a href="/architecture" class="mobile-nav-item"><i class="fa-solid fa-sitemap" style="color:#6366f1;"></i> <span><?= t('Sistem Mimarisi', 'Architecture', 'Architektur', az: 'Sistem Arxitekturası') ?></span></a></li>
        <li><a href="/mobile-apps" class="mobile-nav-item"><i class="fa-solid fa-mobile-screen" style="color:#0ea5e9;"></i> <span><?= t('Mobil Softphone', 'Mobile Softphone', 'Mobile Apps', az: 'Mobil Softphone') ?></span></a></li>
        <li><a href="/android" class="mobile-nav-item" style="color: #10b981; font-weight: 700;"><i class="fa-brands fa-google-play" style="color:#10b981;"></i> <span><?= t('Android Kapalı Teste Katıl', 'Join Android Beta', 'Android-Test beitreten', az: 'Android Qapalı Testə Qoşul') ?></span> <span class="sidebar-badge" style="margin-left:auto;">Yeni</span></a></li>
        <li><a href="/msteams" class="mobile-nav-item"><i class="fa-brands fa-microsoft" style="color:#6264a7;"></i> <span>Microsoft Teams Direct Routing</span></a></li>
        <li style="border-top: 1px solid var(--border); margin: 8px 0; padding-top: 8px;">
            <div style="font-size:0.75rem; font-weight:700; color:var(--text-muted); text-transform:uppercase; padding:4px 12px;"><?= t('Kılavuzlar & Dokümantasyon', 'Guides & Documentation', 'Handbücher & Dokumentation', az: 'Bələdçilər & Sənədlər') ?></div>
        </li>
        <li><a href="/docs" class="mobile-nav-item"><i class="fa-solid fa-book" style="color:#0f172a;"></i> <span><?= t('Teknik Dokümantasyon', 'Technical Documentation', 'Technische Dokumentation', az: 'Texniki Sənədlər') ?></span></a></li>
        <li><a href="/installation" class="mobile-nav-item"><i class="fa-solid fa-terminal" style="color:#0284c7;"></i> <span><?= t('Kurulum Kılavuzu', 'Installation Guide', 'Installation', az: 'Quraşdırma Bələdçisi') ?></span></a></li>
        <li><a href="/msteams" class="mobile-nav-item"><i class="fa-brands fa-microsoft" style="color:#6264a7;"></i> <span>Microsoft Teams</span></a></li>
        <li><a href="/mobile-apps" class="mobile-nav-item"><i class="fa-solid fa-mobile-screen" style="color:#10b981;"></i> <span><?= t('Mobil Softphone', 'Mobile Softphone', 'Mobile Apps', az: 'Mobil Softphone') ?></span></a></li>
        <li><a href="/callcenter" class="mobile-nav-item"><i class="fa-solid fa-headset" style="color:#ec4899;"></i> <span><?= t('Çağrı Merkezi & Mola', 'Call Center & Breaks', 'Callcenter & Pausen', az: 'Çağrı Mərkəzi & Fasilə') ?></span></a></li>
        <li><a href="/security" class="mobile-nav-item"><i class="fa-solid fa-shield-halved" style="color:#f59e0b;"></i> <span><?= t('Güvenlik & SBC', 'Security & SBC', 'Sicherheit & SBC', az: 'Təhlükəsizlik & SBC') ?></span></a></li>
        <li><a href="/api-docs" class="mobile-nav-item"><i class="fa-solid fa-code" style="color:#8b5cf6;"></i> <span>REST API &amp; WebSocket</span></a></li>
    </ul>

    <div class="mobile-drawer-actions">
        <a href="https://github.com/mahirgul/AiPBX" target="_blank" rel="noopener" class="btn-github" style="justify-content:center;">
            <i class="fa-brands fa-github"></i>
            <span>GitHub Repository</span>
        </a>
        <a href="https://mhrgl.com" target="_blank" rel="noopener" class="btn-secondary" style="justify-content:center;">
            <i class="fa-solid fa-globe"></i>
            <span>mhrgl.com</span>
        </a>
    </div>
</div>
<div class="mobile-backdrop" id="mobileBackdrop"></div>
