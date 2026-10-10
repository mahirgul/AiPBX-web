<?php
/**
 * AiPBX.bid — Minimalist & High-Performance Corporate Landing Page
 * Clean, fast, modern homepage linking to deep technical subpages.
 * Powered by centralized data.json, full trilingual support (TR/EN/DE), and Schema.org SEO.
 */
$page = 'home';
require_once __DIR__ . '/includes/data.php';
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($LANG) ?>" data-lang="<?= htmlspecialchars($LANG) ?>">
<head>
    <?php include __DIR__ . '/includes/head.php'; ?>
    <?php include __DIR__ . '/includes/seo-helper.php'; ?>
</head>
<body>

    <!-- Header & Navigation -->
    <?php include __DIR__ . '/includes/navbar.php'; ?>

    <main>
        <!-- ── HERO SECTION (CLEAN & MINIMALIST) ─────────────────────────── -->
        <header class="hero" id="overview">
            <div class="hero-tag">
                <i class="fa-solid fa-sparkles" style="color:var(--primary);"></i>
                <?= t(
                    '✨ Açık Kaynak Kurumsal İletişim • Geliştirici: <a href="https://mhrgl.com" target="_blank" rel="noopener">Mahir Gül</a>',
                    '✨ Open Source Enterprise Communications • Created by <a href="https://mhrgl.com" target="_blank" rel="noopener">Mahir Gül</a>',
                    '✨ Open-Source Enterprise-Kommunikation • Entwickelt von <a href="https://mhrgl.com" target="_blank" rel="noopener">Mahir Gül</a>'
                , az: '✨ Açıq Mənbəli Korporativ Kommunikasiya • Tərtibatçı: <a href="https://mhrgl.com" target="_blank" rel="noopener">Mahir Gül</a>') ?>
            </div>

            <!-- Android Closed Beta Erken Erişim Duyurusu -->
            <div class="hero-android-card" style="max-width: 880px; margin: 18px auto 26px; background: linear-gradient(135deg, rgba(16, 185, 129, 0.12) 0%, rgba(2, 132, 199, 0.08) 100%); border: 1px solid rgba(16, 185, 129, 0.35); border-radius: 16px; padding: 16px 24px; display: flex; align-items: center; justify-content: space-between; gap: 18px; flex-wrap: wrap; box-shadow: 0 4px 20px rgba(16, 185, 129, 0.08);">
                <div style="display: flex; align-items: center; gap: 14px; text-align: left; flex: 1; min-width: 260px;">
                    <span style="font-size: 2.2rem; line-height: 1; flex-shrink: 0;">📱</span>
                    <div>
                        <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                            <strong style="color: #0f172a; font-size: 1.05rem;"><?= t('Android Google Play Kapalı Test Sürecimize Katılın, Bize Destek Olun!', 'Join Our Android Closed Testing & Help Us Test!', 'Nehmen Sie am Android-Closed-Test teil und helfen Sie uns!', az: 'Android Google Play Qapalı Test Prosesimizə Qoşulun, Bizə Dəstək Olun!') ?></strong>
                            <span class="tag-badge tag-green"><?= t('Google Play Erken Erişim', 'Google Play Beta', 'Google Play Beta', az: 'Google Play Erkən Giriş') ?></span>
                        </div>
                        <p style="margin: 4px 0 0; color: #475569; font-size: 0.9rem; line-height: 1.5;">
                            <?= t('AiPBX kurumsal mobil uygulamamız Google Play Store yayını öncesi kapalı testtedir. Test grubumuza katılarak hemen deneyimleyin ve geri bildirimlerinizle geliştirmemize katkı sağlayın.', 'Try out the AiPBX enterprise mobile app before official Google Play release. Join our testing track or submit your email to help test and shape the app.', 'Testen Sie das AiPBX Enterprise-Softphone vor dem offiziellen Release. Treten Sie unserer Testgruppe bei und unterstützen Sie uns mit Ihrem Feedback.', az: 'AiPBX korporativ mobil tətbiqimizi Google Play Store buraxılışından əvvəl sınayın. Test qrupumuza qoşularaq və ya e-poçt ünvanınızı qeyd edərək rəylərinizlə bizə dəstək olun.') ?>
                        </p>
                    </div>
                </div>
                <a href="/android" class="btn-primary" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 12px 24px; font-size: 0.95rem; white-space: nowrap; box-shadow: 0 4px 16px rgba(16, 185, 129, 0.35); flex-shrink: 0;">
                    <i class="fa-brands fa-google-play" style="margin-right: 6px;"></i>
                    <?= t('Teste Katıl / Kaydol →', 'Join as Tester →', 'Tester werden →', az: 'Test İstifadəçisi Ol →') ?>
                </a>
            </div>

            <h1 data-lang="tr">Açık Kaynak Kurumsal IP Santral, <span>Amacına Uygun Tasarlandı.</span></h1>
            <h1 data-lang="en">Open Source Enterprise IP PBX, <span>Engineered with Purpose.</span></h1>
            <h1 data-lang="de">Open-Source-Telefonanlage für Unternehmen, <span>Konsequent Durchdacht.</span></h1><h1 data-lang="az">Açıq Mənbəli Korporativ IP Santral, <span>Məqsədə Uyğun Layihələndirilib.</span></h1>

            <p data-lang="tr">Asterisk 22, Port 443 Nginx L4 ALPN stream çoklama, WebRTC, Passkey biyometrik kimlik doğrulama, Yerel ve Bulut Yapay Zekâ ses motoru (Sesli İstekler / AI IVR), Go anlık sohbet motoru ve yerel Android/iOS softphone istemcilerini birleştiren modern kurumsal santral.</p>
            <p data-lang="en">A high-concurrency, web-managed IP PBX uniting Asterisk 22, Port 443 ALPN stream multiplexing, WebRTC, Passkeys, On-Premises &amp; Cloud AI Voice Engine (Voice Requests / AI IVR), Go instant messaging, and native Android &amp; iOS softphone clients.</p>
            <p data-lang="de">Eine hochskalierbare Enterprise IP-Telefonanlage mit Asterisk 22, Port 443 ALPN-Multiplexing, WebRTC, biometrischen Passkeys, Go-Echtzeitchat und nativen Mobil-Softphones.</p><p data-lang="az">Asterisk 22, Port 443 Nginx L4 ALPN stream multipleksləşdirmə, WebRTC, Passkey biometrik kimlik təsdiqi, Go ani söhbət mühərriki və yerli Android/iOS softphone müştərilərini birləşdirən müasir korporativ santral.</p>

            <div class="hero-actions">
                <a href="#install" class="btn-primary">
                    <i class="fa-solid fa-bolt" style="margin-right:6px;"></i>
                    <?= t('Hızlı Kuruluma Git', 'Quick Install (5 Min)', 'Jetzt Installieren', az: 'Sürətli Quraşdırmaya Keç') ?>
                </a>
                <a href="/tables" class="btn-primary" style="background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); border-color: #0284c7;">
                    <i class="fa-solid fa-table-list" style="margin-right:6px;"></i>
                    <?= t('Karşılaştırma & Tablolar', 'Tables & Specs', 'Tabellen & Matrix', az: 'Müqayisə & Cədvəllər') ?>
                </a>
                <a href="/features" class="btn-secondary">
                    <i class="fa-solid fa-microchip" style="margin-right:6px;"></i>
                    <?= t('Özellikler', 'Features', 'Funktionen', az: 'Xüsusiyyətlər') ?>
                </a>
                <a href="/architecture" class="btn-secondary">
                    <i class="fa-solid fa-sitemap" style="margin-right:6px;"></i>
                    <?= t('Sistem Mimarisi', 'Architecture', 'Architektur', az: 'Sistem Arxitekturası') ?>
                </a>
                <a href="/mobile-apps" class="btn-secondary">
                    <i class="fa-solid fa-mobile-screen" style="margin-right:6px;"></i>
                    <?= t('Mobil Softphone', 'Mobile Apps', 'Mobil-Apps', az: 'Mobil Softphone') ?>
                </a>
            </div>

            <!-- Terminal Card: One-Liner Turnkey Quick Install -->
            <div class="terminal-container" id="install" style="max-width: 880px; margin: 38px auto 10px auto; border-radius: 18px; box-shadow: 0 20px 50px rgba(15, 23, 42, 0.25);">
                <div class="terminal-header">
                    <div class="terminal-dots">
                        <span class="terminal-dot dot-red"></span>
                        <span class="terminal-dot dot-yellow"></span>
                        <span class="terminal-dot dot-green"></span>
                    </div>
                    <span class="terminal-title">bash — Quick One-Line Turnkey Install (Ubuntu 26.04 LTS)</span>
                    <button class="terminal-copy" id="btnCopyCurl" type="button" onclick="copyInstallCmd('btnCopyCurl', '<?= htmlspecialchars($company['turnkeyCommand'] ?? '') ?>')">Copy</button>
                </div>
                <div class="terminal-body" style="padding: 22px 26px; font-size: 0.95rem; line-height: 1.8;">
                    <span class="terminal-comment"># <?= t('Tek satırda tam otomatik santral kurulumu (Turnkey installer)', 'One-liner turnkey PBX installation', 'Vollautomatische PBX-Einzeiler-Installation', az: 'Bir sətirdə tam avtomatik santral quraşdırması (Turnkey installer)') ?></span><br>
                    <span class="terminal-cmd" style="color: #38bdf8; font-weight: 600; font-size: 1.05rem;"><?= htmlspecialchars($company['turnkeyCommand'] ?? '') ?></span><br><br>
                    <span class="terminal-comment"># <?= t('Veya kaynak koddan derleyerek kurulum (Alternative git clone)', 'Alternative git clone from source', 'Alternativ aus dem Quellcode via Git', az: 'Və ya mənbə kodundan kompilyasiya edərək quraşdırma (Alternative git clone)') ?></span><br>
                    <span class="terminal-cmd" style="color: #94a3b8;"><?= htmlspecialchars($company['gitCloneCommand'] ?? '') ?></span>
                </div>
            </div>
        </header>

        <!-- ── STATS BAR ─────────────────────────────────────────────────── -->
        <section style="background: #ffffff; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); padding: 40px 24px;">
            <div style="max-width: 1280px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px; text-align: center;">
                <?php foreach ($stats as $st): ?>
                <div style="padding: 12px;">
                    <div style="font-size: clamp(2rem, 3.2vw, 2.6rem); font-weight: 800; color: #0f172a; line-height: 1.1; letter-spacing: -0.5px;"><?= htmlspecialchars($st['value']) ?></div>
                    <div style="font-size: 1rem; font-weight: 700; color: var(--primary); margin-top: 6px;"><?= t_field($st, 'label') ?></div>
                    <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 4px;"><?= t_field($st, 'sub') ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- ── WHAT'S NEW IN THE LATEST RELEASE ──────────────────────────── -->
        <?php
            $whatsNew = [
                ['icon' => 'fa-robot', 'color' => '#7c3aed',
                 'title' => ['Yapay Zekâ & Sesli İstekler', 'AI & Voice Requests', 'KI & Sprachanfragen', 'az' => 'Süni İntellekt & Səsli İstəklər'],
                 'items' => [
                    ['Yeni Sesli İstekler (Voice Requests / AI IVR): arayan kişinin konuşmasını yerel STT ile anlama, sesli yanıtlama ve personeli e-posta ile uyararak aktarma', 'New Voice Requests (AI IVR): recognises caller requests via on-premises STT, answers by voice, emails staff and routes calls', 'Neue Sprachanfragen (KI-IVR): erkennt Anliegen per lokalem STT, antwortet per Stimme, mailt Mitarbeitern und leitet weiter', 'az' => 'Yeni Səsli İstəklər (Voice Requests / AI IVR): zəng edənin səsini yerli STT ilə anlama, səsli cavablama və heyətə e-poçtla bildiriş göndərərək yönləndirmə'],
                    ['Değerli Anonslar: CRM/veritabanı sorgusu ile dinamik bakiye, müşteri adı ve randevu tarihi okuma', 'Dynamic announcements: reads balances, customer names and dates via real-time CRM lookup queries', 'Dynamische Ansagen: liest Kontostand, Namen und Termine per Echtzeit-CRM-Abfrage vor', 'az' => 'Dinamik Anonslar: CRM/verilənlər bazası sorğusu ilə dinamik balans, ad və görüş tarixini səsləndirmə'],
                    ['Sunucuda yerel Vosk STT ve Piper/Kokoro TTS ses modelleri — sıfır bulut bağımlılığı ve tam KVKK/GDPR uyumu', 'On-premises Vosk STT and Piper/Kokoro TTS models — zero external cloud reliance and full GDPR sovereignty', 'Lokale Vosk-STT- und Piper/Kokoro-TTS-Modelle auf dem Server — volle Datensouveränität ohne Cloud-Kosten', 'az' => 'Serverdə yerli Vosk STT və Piper/Kokoro TTS səs modelləri — sıfır bulud asılılığı və tam məxfilik'],
                    ['Bulut AI entegrasyonu: Google Gemini, OpenAI, Deepgram, Groq (Whisper), ElevenLabs ve Azure', 'Cloud AI integrations: Google Gemini, OpenAI, Deepgram, Groq (Whisper), ElevenLabs, and Azure', 'Cloud-KI-Anbieter: Google Gemini, OpenAI, Deepgram, Groq (Whisper), ElevenLabs und Azure', 'az' => 'Bulud AI inteqrasiyaları: Google Gemini, OpenAI, Deepgram, Groq (Whisper), ElevenLabs və Azure'],
                 ]],
                ['icon' => 'fa-mobile-screen', 'color' => '#10b981',
                 'title' => ['Mobil & Google Play', 'Mobile & Google Play', 'Mobil & Google Play', 'az' => 'Mobil & Google Play'],
                 'items' => [
                    ['AiPBX Android v1.0.58 Google Play Kapalı Test (Closed Testing) erken erişim kanalı açıldı', 'AiPBX Android v1.0.58 launched on Google Play Closed Testing track for early testers', 'AiPBX Android v1.0.58 im Google Play Closed-Testing Track für Vorab-Tester verfügbar', 'az' => 'AiPBX Android v1.0.58 Google Play Qapalı Test (Closed Testing) erkən giriş kanalı açıldı'],
                    ['Google Grubu (groups.google.com/g/aipbx) veya /android kayıt formu ile beklemeden testçi yetkisi', 'Instant authorization via Google Group (groups.google.com/g/aipbx) or web signup form', 'Sofortige Tester-Autorisierung über die Google-Gruppe oder das Web-Anmeldeformular', 'az' => 'Google Qrupu (groups.google.com/g/aipbx) və ya /android qeydiyyat forması ilə dərhal testçi icazəsi'],
                    ['Arkaplan uyku uyarısı ve pil optimizasyonu iyileştirmeleri; FCM / APNs anında uyandırma', 'Battery optimization & sleep wake-up improvements; zero-battery-drain FCM/APNs push', 'Verbesserte Akku-Optimierung und Hintergrund-Aufweckung per FCM/APNs', 'az' => 'Batareya optimallaşdırması və arxa fon oyanma təkmilləşdirmələri; FCM / APNs ani oyatma'],
                 ]],
                ['icon' => 'fa-headphones', 'color' => '#0284c7',
                 'title' => ['Ses & Web Widget', 'Audio & Web Widget', 'Audio & Web-Widget', 'az' => 'Səs & Veb Vidjet'],
                 'items' => [
                    ['Doğal Türkçe sayı ve para okuma: "₺1.234,50" → "bin iki yüz otuz dört lira elli kuruş"; Euro, Dolar ve gruplu telefon numaraları', 'Natural currency & number speech: "₺1,234.50" spoken naturally; formatted currencies and grouped digits', 'Natürliche Sprachausgabe für Beträge, Währungen, Datumsangaben und Telefonnummern', 'az' => 'Təbii türkcə rəqəm və məbləğ oxunuşu: "₺1.234,50" → "bin iki yüz otuz dörd lirə əlli quruş"; valyutalar və qruplaşdırılmış nömrələr'],
                    ['Web Sitesi Çağrı Widget\'ı (widget.js): mikrofon izin durumu tespiti ve tek tıkla doğrudan WebRTC arama', 'Website Calling Widget (widget.js): precise microphone status checks and one-click in-browser calls', 'Website-Anruf-Widget (widget.js): Mikrofonstatus-Erkennung und 1-Klick-WebRTC-Verbindung', 'az' => 'Veb Sayt Zəng Vidceti (widget.js): mikrofon icazəsinin yoxlanılması və tək kliklə birbaşa WebRTC zəng'],
                    ['Marka ayarlarında Geniş (Wide wordmark) ve Kare logo desteği', 'Brand settings supports Wide wordmark and Square logo shapes', 'Markeneinstellungen unterstützen Wide- und Square-Logo-Formate', 'az' => 'Brend tənzimləmələrində Geniş (Wide) və Kvadrat loqo dəstəyi'],
                 ]],
                ['icon' => 'fa-chart-line', 'color' => '#f59e0b',
                 'title' => ['Raporlar & Santral', 'Reports & Telephony', 'Berichte & PBX', 'az' => 'Hesabatlar & Santral'],
                 'items' => [
                    ['Kuyruk Rapor Merkezi: SLA, cevaplanan/kaçan çağrılar, temsilci bekleme/konuşma süreleri', 'Queue Report Centre: SLA, answered/abandoned calls, agent wait and talk duration metrics', 'Warteschlangen-Reporting: SLA, angenommene/verpasste Anrufe und Agenten-Auswertungen', 'az' => 'Növbə Hesabat Mərkəzi: SLA, cavablanan/buraxılan zənglər və operator statistikası'],
                    ['Kaçan çağrılarda otomatik geri arama takibi ve tekrar arayanlar analizi', 'Lost call callback tracking and repeat caller frequency metrics', 'Rückruf-Verfolgung verpasster Anrufe und Wiederholungsanrufer-Analyse', 'az' => 'Buraxılmış zənglərdə avtomatik geri zəng izlənməsi və təkrar zəng edənlər'],
                    ['Portaldan Lets Encrypt sertifika yönetimi ve otomatik geri dönüşlü güncelleme', 'In-portal TLS certificate management and automated backup updates via sudo aipbx-update', 'Zertifikatsverwaltung im Portal und Systemaktualisierung per sudo aipbx-update', 'az' => 'Portaldan Let\'s Encrypt sertifikat idarəetməsi və sudo aipbx-update ilə sistem yeniləməsi'],
                 ]],
            ];
        ?>
        <section class="section-wrapper" id="whats-new">
            <div class="section-header-center">
                <div class="section-eyebrow">
                    <i class="fa-solid fa-tag"></i>
                    <?= t('SÜRÜM', 'RELEASE', 'RELEASE', az: 'VERSİYA') ?> v<?= htmlspecialchars($company['version'] ?? '') ?>
                </div>
                <h2 class="section-title-large">
                    <?= t('AiPBX ' . htmlspecialchars($company['version'] ?? '') . ' ile Gelen Yenilikler', 'What\'s New in AiPBX ' . htmlspecialchars($company['version'] ?? ''), 'Neu in AiPBX ' . htmlspecialchars($company['version'] ?? ''), az: 'AiPBX ' . htmlspecialchars($company['version'] ?? '') . ' ilə Gələn Yeniliklər') ?>
                </h2>
                <p class="section-subtitle-muted">
                    <?= t(
                        'Sesli İstekler (Voice Requests / AI IVR), yerel ve bulut AI ses modelleri, Android Google Play Kapalı Testi, Web Sitesi Çağrı Widget\'ı ve doğal Türkçe para/sayı seslendirmesi. Portaldan <strong>Yönetim → Sistem Güncelleme</strong> veya <code>sudo aipbx-update</code> ile güncelleyin.',
                        'Voice Requests (AI IVR), on-premises and cloud speech models, Android Google Play closed beta, website calling widget, and natural currency speech. Update from <strong>Admin → System Update</strong> or with <code>sudo aipbx-update</code>.',
                        'Sprachanfragen (Voice Requests / KI-IVR), lokale und Cloud-KI-Modelle, Android Google Play Closed-Beta, Website-Call-Widget und natürliche Währungssprachausgabe. Aktualisieren über <strong>Verwaltung → Systemaktualisierung</strong> oder per <code>sudo aipbx-update</code>.',
                        az: 'Səsli İstəklər (Voice Requests / AI IVR), yerli və bulud AI modelləri, Android Google Play Qapalı Testi, Veb sayt zəng vidceti və təbii türkcə səsləndirmə. Portaldan <strong>İdarəetmə → Sistem Yeniləməsi</strong> və ya <code>sudo aipbx-update</code> ilə yeniləyin.') ?>
                </p>
            </div>

            <div class="tech-cards-grid">
                <?php foreach ($whatsNew as $grp): ?>
                <div class="tech-card" style="--card-accent: <?= $grp['color'] ?>;">
                    <div class="tech-card-header">
                        <div class="tech-icon-box"><i class="fa-solid <?= $grp['icon'] ?>"></i></div>
                    </div>
                    <h3 class="tech-card-title"><?= t(...$grp['title']) ?></h3>
                    <ul class="tech-card-desc" style="padding-left: 18px; margin: 0; display: grid; gap: 6px;">
                        <?php foreach ($grp['items'] as $it): ?>
                        <li><?= t(...$it) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>
            </div>

            <div style="text-align: center; margin-top: 28px;">
                <a href="https://github.com/mahirgul/AiPBX/releases/tag/v<?= htmlspecialchars($company['version'] ?? '') ?>" target="_blank" rel="noopener" class="btn-secondary">
                    <i class="fa-brands fa-github" style="margin-right:6px;"></i>
                    <?= t('Tüm Sürüm Notları', 'Full Release Notes', 'Alle Versionshinweise', az: 'Bütün Buraxılış Qeydləri') ?>
                </a>
            </div>
        </section>

        <!-- ── FLAGSHIP TECHNOLOGIES SHOWCASE ───────────────────────────── -->
        <section class="section-wrapper" id="features">
            <div class="section-header-center">
                <div class="section-eyebrow">
                    <i class="fa-solid fa-bolt"></i>
                    <?= t('YENİ NESİL MİMARİ', 'NEXT-GEN ARCHITECTURE', 'NEXT-GEN ARCHITEKTUR', az: 'YENİ NƏSİL ARXİTEKTURA') ?>
                </div>
                <h2 class="section-title-large">
                    <?= t('En Son Eklenen Teknolojik Yetenekler', 'Flagship Technological Innovations', 'Neueste Technologische Kernfunktionen', az: 'Ən Son Əlavə Olunan Texnoloji İmkanlar') ?>
                </h2>
                <p class="section-subtitle-muted">
                    <?= t(
                        'AiPBX, modern kurumsal iletişimin en kritik ihtiyaçlarını sıfır lisans maliyeti ve tam bağımsızlıkla çözen güçlü bileşenlerle donatıldı.',
                        'Engineered to conquer modern enterprise telecom hurdles with zero license fees, strict data sovereignty, and open protocols.',
                        'Entwickelt für moderne Enterprise-Anforderungen: Ohne Lizenzgebühren, mit voller Datensouveränität und offenen Protokollen.'
                    , az: 'AiPBX müasir korporativ kommunikasiyanın ən kritik ehtiyaclarını sıfır lisenziya xərci və tam müstəqilliklə həll edən güclü komponentlərlə təchiz olunub.') ?>
                </p>
            </div>

            <div class="tech-cards-grid">
                <?php foreach ($flagshipFeatures as $feat): ?>
                <div class="tech-card" style="--card-accent: <?= htmlspecialchars($feat['color']) ?>;">
                    <div class="tech-card-header">
                        <div class="tech-icon-box">
                            <i class="<?= (!empty($feat['iconBrand']) ? 'fa-brands' : 'fa-solid') ?> <?= htmlspecialchars($feat['icon']) ?>"></i>
                        </div>
                        <span class="tech-badge"><?= htmlspecialchars($feat['badge']) ?></span>
                    </div>
                    <h3 class="tech-card-title"><?= t_field($feat, 'title') ?></h3>
                    <p class="tech-card-desc"><?= t_field($feat, 'desc') ?></p>
                    <div style="margin-top: 18px; padding-top: 14px; border-top: 1px solid var(--border);">
                        <?php
                            $targetLink = '/features';
                            if ($feat['id'] === 'alpn') $targetLink = '/architecture';
                            elseif ($feat['id'] === 'msteams') $targetLink = '/msteams';
                            elseif ($feat['id'] === 'call_spy') $targetLink = '/callcenter';
                            elseif ($feat['id'] === 'mobile_apps') $targetLink = '/mobile-apps';
                            elseif ($feat['id'] === 'system_update') $targetLink = '/installation#update';
                        ?>
                        <a href="<?= $targetLink ?>" style="color: <?= htmlspecialchars($feat['color']) ?>; font-weight: 700; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                            <span><?= t('Teknik Detayları İncele', 'View Technical Deep Dive', 'Technische Details ansehen', az: 'Texniki Detallara Bax') ?></span>
                            <i class="fa-solid fa-arrow-right" style="font-size: 0.78rem;"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- ── SPOTLIGHT: JSON TABLES SYSTEM ─────────────────────────────── -->
        <section class="section-wrapper" id="tables" style="background: #f8fafc; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); max-width: 100%; padding-left: max(24px, calc((100% - 1280px) / 2)); padding-right: max(24px, calc((100% - 1280px) / 2));">
            <div style="max-width: 1200px; margin: 0 auto;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; align-items: center;">
                    <div>
                        <div class="section-eyebrow">
                            <i class="fa-solid fa-table-list"></i>
                            <?= t('JSON TABLO SİSTEMİ', 'JSON TABLE SYSTEM', 'JSON-TABELLENSYSTEM', az: 'JSON CƏDVƏL SİSTEMİ') ?>
                        </div>
                        <h2 style="font-size: clamp(2rem, 3.2vw, 2.6rem); font-weight: 800; color: var(--text-heading); line-height: 1.25; margin-bottom: 18px; letter-spacing: -0.5px;">
                            <?= t(
                                'Karşılaştırma Matrisi & <span>Teknik Parametreler</span>',
                                'Feature Comparison Matrix & <span>System Parameters</span>',
                                'Vergleichsmatrix & <span>Systemparameter</span>'
                            , az: 'Müqayisə Matrisi & <span>Texniki Parametrlər</span>') ?>
                        </h2>
                        <p style="font-size: 1.05rem; color: var(--text-muted); line-height: 1.7; margin-bottom: 24px;">
                            <?= t(
                                'AiPBX platformunun Cisco, Avaya ve bulut santrallerle (RingCentral, 8x8) detaylı karşılaştırması, Port 443 ALPN stream çoklama haritası, santral yıldız kodları (*90, *22, *23), arama yetkilendirme (Call Barring) ve donanım gereksinimleri bağımsız tablolarda toplandı.',
                                'Comprehensive side-by-side comparison with Cisco, Avaya, and Cloud PBX SaaS, along with Port 443 ALPN mapping, telephony star codes (*90/*22/*23), outbound call barring, and hardware specs.',
                                'Detaillierter Vergleich mit klassischen Systemen und Cloud-PBX, ergänzt durch Port-443-ALPN-Diagramme, Funktionstastencodes (*90/*22/*23), Wählberechtigungsgruppen und Systemanforderungen.'
                            , az: 'AiPBX platformasının Cisco, Avaya və bulud santralları (RingCentral, 8x8) ilə ətraflı müqayisəsi, Port 443 ALPN stream multipleksləşdirmə xəritəsi, santral ulduz kodları (*90, *22, *23), zəng icazələri (Call Barring) və avadanlıq tələbləri ayrı cədvəllərdə toplanıb.') ?>
                        </p>

                        <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 30px;">
                            <div style="display: flex; align-items: center; gap: 10px; font-size: 0.95rem; color: var(--text-heading);">
                                <i class="fa-solid fa-circle-check" style="color: #10b981;"></i>
                                <span><?= t('5 Dinamik Tablo (Matris, Portlar, Yıldız Kodları, Yetki, Donanım)', '5 Dynamic Tables (Matrix, Ports, Star Codes, Barring, Sizing)', '5 Dynamische Tabellen (Matrix, Ports, Codes, Rechte, Hardware)', az: '5 Dinamik Cədvəl (Matris, Portlar, Ulduz Kodları, İcazə, Avadanlıq)') ?></span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px; font-size: 0.95rem; color: var(--text-heading);">
                                <i class="fa-solid fa-circle-check" style="color: #10b981;"></i>
                                <span><?= t('Anlık Canlı Metin Filtreleme ve Arama', 'Instant Real-Time Keyword Filter & Search', 'Echtzeit-Stichwortsuche in Tabellen', az: 'Ani Canlı Mətn Süzgəci və Axtarış') ?></span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px; font-size: 0.95rem; color: var(--text-heading);">
                                <i class="fa-solid fa-circle-check" style="color: #10b981;"></i>
                                <span><?= t('TR / EN / DE Otomatik IP ve Dil Desteği', 'Instant TR / EN / DE Multilingual Switching', 'Dreisprachig mit synchroner Umschaltung', az: 'TR / EN / DE / AZ Avtomatik IP və Dil Dəstəyi') ?></span>
                            </div>
                        </div>

                        <a href="/tables" class="btn-primary" style="display: inline-flex; align-items: center; gap: 8px; font-weight: 700; padding: 14px 28px; font-size: 1rem;">
                            <i class="fa-solid fa-table-list"></i>
                            <span><?= t('Tüm Tabloları & Karşılaştırmayı Aç →', 'Explore Full Tables & Comparison Matrix →', 'Alle Tabellen & Matrix Öffnen →', az: 'Bütün Cədvəlləri & Müqayisəni Aç →') ?></span>
                        </a>
                    </div>

                    <!-- Visual Teaser Cards of the Tables -->
                    <div style="display: grid; grid-template-columns: 1fr; gap: 16px;">
                        <a href="/tables" style="background:#ffffff; border:1px solid var(--border); border-radius:16px; padding:20px 24px; text-decoration:none; display:flex; align-items:center; justify-content:space-between; transition: all 0.2s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.03);" onmouseover="this.style.borderColor='var(--primary)'; this.style.transform='translateX(4px)';" onmouseout="this.style.borderColor='var(--border)'; this.style.transform='none';">
                            <div style="display:flex; align-items:center; gap:16px;">
                                <div style="width:44px; height:44px; border-radius:12px; background:rgba(2,132,199,0.1); color:var(--primary); display:flex; align-items:center; justify-content:center; font-size:1.2rem;">
                                    <i class="fa-solid fa-scale-balanced"></i>
                                </div>
                                <div>
                                    <div style="font-weight:700; color:var(--text-heading); font-size:1rem;"><?= t('Karşılaştırma Matrisi', 'Comparison Matrix', 'Vergleichsmatrix', az: 'Müqayisə Matrisi') ?></div>
                                    <div style="font-size:0.82rem; color:var(--text-muted);"><?= t('AiPBX vs Eski Santraller vs Bulut SaaS', 'AiPBX vs Legacy vs Cloud SaaS', 'AiPBX vs Klassisch vs Cloud SaaS', az: 'AiPBX vs Köhnə Santrallar vs Bulud SaaS') ?></div>
                                </div>
                            </div>
                            <span class="status-badge yes"><?= t('İncele', 'View', 'Öffnen', az: 'Bax') ?></span>
                        </a>

                        <a href="/tables" style="background:#ffffff; border:1px solid var(--border); border-radius:16px; padding:20px 24px; text-decoration:none; display:flex; align-items:center; justify-content:space-between; transition: all 0.2s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.03);" onmouseover="this.style.borderColor='#10b981'; this.style.transform='translateX(4px)';" onmouseout="this.style.borderColor='var(--border)'; this.style.transform='none';">
                            <div style="display:flex; align-items:center; gap:16px;">
                                <div style="width:44px; height:44px; border-radius:12px; background:rgba(16,185,129,0.1); color:#059669; display:flex; align-items:center; justify-content:center; font-size:1.2rem;">
                                    <i class="fa-solid fa-network-wired"></i>
                                </div>
                                <div>
                                    <div style="font-weight:700; color:var(--text-heading); font-size:1rem;"><?= t('Ağ Portları & ALPN Çoklama', 'Network Ports & ALPN Stream', 'Netzwerk-Ports & ALPN', az: 'Şəbəkə Portları & ALPN Multipleksləşdirmə') ?></div>
                                    <div style="font-size:0.82rem; color:var(--text-muted);"><?= t('Port 443, SIP TLS 5061, SRTP, Go Chat', 'Port 443, SIP TLS 5061, SRTP, Go Chat', 'Port 443, SIP TLS 5061, SRTP, Chat', az: 'Port 443, SIP TLS 5061, SRTP, Go Chat') ?></div>
                                </div>
                            </div>
                            <span class="status-badge yes"><?= t('İncele', 'View', 'Öffnen', az: 'Bax') ?></span>
                        </a>

                        <a href="/tables" style="background:#ffffff; border:1px solid var(--border); border-radius:16px; padding:20px 24px; text-decoration:none; display:flex; align-items:center; justify-content:space-between; transition: all 0.2s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.03);" onmouseover="this.style.borderColor='#f59e0b'; this.style.transform='translateX(4px)';" onmouseout="this.style.borderColor='var(--border)'; this.style.transform='none';">
                            <div style="display:flex; align-items:center; gap:16px;">
                                <div style="width:44px; height:44px; border-radius:12px; background:rgba(245,158,11,0.1); color:#d97706; display:flex; align-items:center; justify-content:center; font-size:1.2rem;">
                                    <i class="fa-solid fa-asterisk"></i>
                                </div>
                                <div>
                                    <div style="font-weight:700; color:var(--text-heading); font-size:1rem;"><?= t('Yıldız Kodları Kılavuzu', 'Star Codes Directory', 'Funktionstastencodes', az: 'Ulduz Kodları Bələdçisi') ?></div>
                                    <div style="font-size:0.82rem; color:var(--text-muted);"><?= t('*90 Dinleme, *22/*23 Mola, *97/*98 Sesli Mesaj', '*90 Spy, *22/*23 Breaks, *97 Voicemail', '*90 Spy, *22/*23 Pausen, *97 Voicemail', az: '*90 Dinləmə, *22/*23 Fasilə, *97/*98 Səsli Poçt') ?></div>
                                </div>
                            </div>
                            <span class="status-badge yes"><?= t('İncele', 'View', 'Öffnen', az: 'Bax') ?></span>
                        </a>

                        <a href="/tables" style="background:#ffffff; border:1px solid var(--border); border-radius:16px; padding:20px 24px; text-decoration:none; display:flex; align-items:center; justify-content:space-between; transition: all 0.2s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.03);" onmouseover="this.style.borderColor='#6366f1'; this.style.transform='translateX(4px)';" onmouseout="this.style.borderColor='var(--border)'; this.style.transform='none';">
                            <div style="display:flex; align-items:center; gap:16px;">
                                <div style="width:44px; height:44px; border-radius:12px; background:rgba(99,102,241,0.1); color:#6366f1; display:flex; align-items:center; justify-content:center; font-size:1.2rem;">
                                    <i class="fa-solid fa-server"></i>
                                </div>
                                <div>
                                    <div style="font-weight:700; color:var(--text-heading); font-size:1rem;"><?= t('Arama Yetkisi & Donanım Rehberi', 'Dial Barring & System Specs', 'Wählberechtigung & Hardware', az: 'Zəng İcazəsi & Avadanlıq Bələdçisi') ?></div>
                                    <div style="font-size:0.82rem; color:var(--text-muted);"><?= t('6 Yetki Kademesi & 4 Sunucu Ölçeği', '6 Permission Tiers & 4 Hardware Scales', '6 Stufen & 4 Hardware-Skalen', az: '6 İcazə Pilləsi & 4 Server Miqyası') ?></div>
                                </div>
                            </div>
                            <span class="status-badge yes"><?= t('İncele', 'View', 'Öffnen', az: 'Bax') ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── ARCHITECTURE SNAPSHOT ─────────────────────────────────────── -->
        <section class="section-wrapper" id="architecture">
            <div class="section-header-center">
                <div class="section-eyebrow">
                    <i class="fa-solid fa-code-fork"></i>
                    <?= t('MİMARİ BAKIŞ', 'ARCHITECTURE SNAPSHOT', 'ARCHITEKTUR-ÜBERSICHT', az: 'ARXİTEKTURA BAXIŞI') ?>
                </div>
                <h2 class="section-title-large">
                    <?= t('Port 443 L4 ALPN Stream Çoklama Mimarisi', 'Port 443 L4 ALPN Stream Multiplexing', 'Port 443 L4 ALPN Stream Multiplexing', az: 'Port 443 L4 ALPN Stream Multipleksləşdirmə Arxitekturası') ?>
                </h2>
                <p class="section-subtitle-muted">
                    <?= t(
                        'Portal, WebRTC aramaları, sohbet ve TURNS medya aktarımı tek bir TCP 443 portundan: yalnızca 443\'e izin veren ağlarda da çalışır.',
                        'Portal, WebRTC calls, chat and TURNS media relay over a single TCP port 443 — works on networks that only allow 443.',
                        'Portal, WebRTC-Anrufe, Chat und TURNS-Medienrelay über einen einzigen TCP-Port 443 – auch in Netzen, die nur 443 erlauben.'
                    , az: 'Portal, WebRTC zəngləri, söhbət və TURNS media ötürülməsi tək TCP 443 portundan: yalnız 443-ə icazə verən şəbəkələrdə də işləyir.') ?>
                </p>
            </div>

            <!-- Architecture ASCII Flow Diagram -->
            <div class="diagram-terminal" style="max-width: 960px; margin: 0 auto 30px auto;">
                <div style="font-size:0.75rem; text-transform:uppercase; color:#94a3b8; margin-bottom:12px; font-weight:700;">
                    <i class="fa-solid fa-diagram-project" style="color:#38bdf8; margin-right:6px;"></i>
                    <?= t('AiPBX Port 443 L4 ALPN Stream & Bileşen Yönlendirme Şeması', 'AiPBX Port 443 L4 ALPN Stream & Component Routing Flow', 'AiPBX Port 443 L4 ALPN Stream & Routing-Diagramm', az: 'AiPBX Port 443 L4 ALPN Stream & Komponent Marşrutlaşdırma Sxemi') ?>
                </div>
                <pre>
   [ <?= ['tr' => 'İstemciler: Web Tarayıcı / Mobil App / Masaüstü IP Tel / Teams', 'en' => 'Clients: Web Browser / Mobile App / Desk IP Phone / Teams', 'de' => 'Clients: Webbrowser / Mobile App / IP-Tischtelefon / Teams', 'az' => 'Müştərilər: Veb Brauzer / Mobil Tətbiq / Masaüstü IP Tel / Teams'][$LANG] ?> ]
                                │
                                ▼  (<?= ['tr' => 'Tek Port', 'en' => 'Single Port', 'de' => 'Ein Port', 'az' => 'Tək Port'][$LANG] ?>: TCP 443)
              ┌────────────────────────────────────┐
              │   Nginx L4 Stream (ssl_preread)    │
              │<?= ['tr' => '  TLS ClientHello ALPN Denetimi     ', 'en' => '  TLS ClientHello ALPN Inspection   ', 'de' => '  TLS-ClientHello-ALPN-Prüfung      ', 'az' => '  TLS ClientHello ALPN Yoxlaması    '][$LANG] ?>│
              └─────────────────┬──────────────────┘
                                │
                    ┌───────────┴───────────┐
                    ▼ (ALPN: http/1.1, h2)  ▼ (<?= ['tr' => 'ALPN yok', 'en' => 'no ALPN', 'de' => 'kein ALPN', 'az' => 'ALPN yoxdur'][$LANG] ?>)
  ┌──────────────────────────────┐    ┌──────────────────┐
  │ Apache :8443                 │    │ coturn TURNS     │
  │  /       → <?= ['tr' => 'Web Portal (PHP 8)', 'en' => 'Web Portal (PHP 8)', 'de' => 'Webportal (PHP 8) ', 'az' => 'Veb Portal (PHP 8)'][$LANG] ?>│    │ :5349            │
  │  /ws     → Asterisk WebRTC   │    │ <?= ['tr' => '(WebRTC medya)   ', 'en' => '(WebRTC media)   ', 'de' => '(WebRTC-Medien)  ', 'az' => '(WebRTC media)   '][$LANG] ?>│
  │  /chat/* → Go Chat :8086     │    └──────────────────┘
  └──────────────────────────────┘
                 │
                 ▼
  ┌──────────────────────────────┐    ┌──────────────────┐
  │ Asterisk 22 (PJSIP)          │◄───┤ SIP 5060 / 5061  │
  │ MariaDB 11 · FCM / APNs Push │    │ <?= ['tr' => 'IP tel, trunk,   ', 'en' => 'IP phones, trunks', 'de' => 'IP-Tel., Trunks, ', 'az' => 'IP tel, trunk,   '][$LANG] ?>│
  └──────────────────────────────┘    │ MS Teams         │
                                      └──────────────────┘
                </pre>
            </div>

            <div style="text-align: center; margin-top: 24px;">
                <a href="/architecture" class="btn-primary" style="display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-sitemap"></i>
                    <span><?= t('Kapsamlı Sistem Mimarisini İncele (Detaylı Kılavuz) →', 'Explore Full Architecture & Sequence Diagrams →', 'Vollständige Systemarchitektur öffnen →', az: 'Ətraflı Sistem Arxitekturasına Bax (Ətraflı Bələdçi) →') ?></span>
                </a>
            </div>
        </section>

        <!-- ── CURATED FAQ SECTION ───────────────────────────────────────── -->
        <section class="section-wrapper" id="faq" style="background: #f8fafc; border-top: 1px solid var(--border);">
            <div class="section-header-center">
                <div class="section-eyebrow">
                    <i class="fa-solid fa-circle-question"></i>
                    <?= t('MERAK EDİLENLER', 'FAQ', 'HÄUFIG GESTELLTE FRAGEN', az: 'ÇOX SORUŞULANLAR') ?>
                </div>
                <h2 class="section-title-large">
                    <?= t('Sıkça Sorulan Sorular', 'Frequently Asked Questions', 'Häufig gestellte Fragen', az: 'Tez-tez Verilən Suallar') ?>
                </h2>
                <p class="section-subtitle-muted">
                    <?= t(
                        'AiPBX platformunun mimarisi, kurulum süreci, güvenliği ve açık kaynak lisansı hakkında en çok merak edilen konular.',
                        'Direct answers regarding AiPBX architecture, turnkey deployment, security posture, and MIT licensing.',
                        'Häufige Fragen zu Architektur, Installation, Unternehmenssicherheit und MIT-Lizenzierung von AiPBX.'
                    , az: 'AiPBX platformasının arxitekturası, quraşdırma prosesi, təhlükəsizliyi və açıq mənbə lisenziyası haqqında ən çox soruşulan mövzular.') ?>
                </p>
            </div>

            <div class="faq-accordion" style="max-width: 900px; margin: 0 auto;">
                <?php foreach (array_slice($faq, 0, 5) as $idx => $fItem): ?>
                <div class="faq-item <?= ($idx === 0) ? 'active' : '' ?>">
                    <div class="faq-question">
                        <?= t_field($fItem, 'q') ?>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <div data-lang="tr"><p><?= nl2br(htmlspecialchars($fItem['aTR'] ?? ($fItem['a'] ?? ''))) ?></p></div>
                        <div data-lang="en"><p><?= nl2br(htmlspecialchars($fItem['aEN'] ?? ($fItem['aTR'] ?? ''))) ?></p></div>
                        <div data-lang="de"><p><?= nl2br(htmlspecialchars($fItem['aDE'] ?? ($fItem['aEN'] ?? ''))) ?></p></div><div data-lang="az"><p><?= nl2br(htmlspecialchars($fItem['aAZ'] ?? ($fItem['aTR'] ?? ''))) ?></p></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div style="text-align: center; margin-top: 36px;">
                <p style="font-size: 0.95rem; color: var(--text-muted); margin-bottom: 16px;">
                    <?= t('Daha fazla teknik bilgi veya adım adım kurulum yönergeleri mi arıyorsunuz?', 'Looking for more in-depth guides or step-by-step setup tutorials?', 'Suchen Sie nach weiteren technischen Leitfäden oder Anleitungen?', az: 'Daha çox texniki məlumat və ya addım-addım quraşdırma təlimatları axtarırsınız?') ?>
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 12px; justify-content: center;">
                    <a href="/installation" class="btn-secondary">
                        <i class="fa-solid fa-terminal" style="margin-right: 6px;"></i>
                        <?= t('Kurulum Kılavuzu', 'Installation Guide', 'Installationsanleitung', az: 'Quraşdırma Bələdçisi') ?>
                    </a>
                    <a href="/msteams" class="btn-secondary">
                        <i class="fa-brands fa-microsoft" style="margin-right: 6px;"></i>
                        Microsoft Teams Direct Routing
                    </a>
                    <a href="/security" class="btn-secondary">
                        <i class="fa-solid fa-shield-halved" style="margin-right: 6px;"></i>
                        <?= t('Güvenlik & SBC', 'Security & SBC', 'Sicherheit & SBC', az: 'Təhlükəsizlik & SBC') ?>
                    </a>
                </div>
            </div>
        </section>

        <!-- ── FINAL CALL TO ACTION (CTA) ────────────────────────────────── -->
        <section style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; padding: 80px 24px; text-align: center; border-top: 1px solid #334155;">
            <div style="max-width: 820px; margin: 0 auto;">
                <h2 style="font-size: clamp(2rem, 3.2vw, 2.75rem); font-weight: 800; margin-bottom: 18px; letter-spacing: -0.5px;">
                    <?= t(
                        'Kurumsal İletişiminizi Bugün Özgürleştirin.',
                        'Liberate Your Enterprise Telephony Today.',
                        'Befreien Sie Ihre Unternehmenskommunikation noch heute.'
                    , az: 'Korporativ Kommunikasiyanızı Bu Gün Azad Edin.') ?>
                </h2>
                <p style="font-size: 1.15rem; color: #94a3b8; line-height: 1.7; margin-bottom: 34px;">
                    <?= t(
                        'Tek bir komutla kendi donanımınızda veya bulut sunucunuzda dakikalar içinde yüksek kapasiteli, güvenli ve lisanssız IP santralinizi devreye alın.',
                        'Deploy your private, high-concurrency, license-free IP PBX on bare-metal or cloud instances in minutes with a single command.',
                        'Installieren Sie Ihre private, lizenzfreie Telefonanlage mit voller Kapazität auf eigener Hardware oder Cloud in wenigen Minuten.'
                    , az: 'Tək bir əmrlə öz avadanlığınızda və ya bulud serverinizdə dəqiqələr ərzində yüksək tutumlu, təhlükəsiz və lisenziyasız IP santralınızı işə salın.') ?>
                </p>

                <div style="display:flex; flex-wrap:wrap; gap:16px; justify-content:center; align-items:center;">
                    <a href="#install" class="btn-primary" style="background:#38bdf8; color:#0f172a; border-color:#38bdf8; font-weight:700;">
                        <i class="fa-solid fa-bolt" style="margin-right:6px;"></i>
                        <?= t('Hızlı Kuruluma Git', 'Get Started (5 Min)', 'Jetzt Installieren', az: 'Sürətli Quraşdırmaya Keç') ?>
                    </a>
                    <a href="https://github.com/mahirgul/AiPBX" target="_blank" rel="noopener" class="btn-secondary" style="color:#ffffff; border-color:#475569; background:rgba(255,255,255,0.06);">
                        <i class="fa-brands fa-github" style="margin-right:6px;"></i>
                        <?= t('GitHub Deposu & Kaynak Kod', 'GitHub Repository & Code', 'GitHub Repository & Quellcode', az: 'GitHub Deposu & Mənbə Kodu') ?>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Universal Footer -->
    <?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
