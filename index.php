<?php
/**
 * aipbx.bid — home page.
 *
 * One page for everything a visitor needs: what AiPBX is, what it looks like
 * (screenshots of the public demo, sip.aipbx.bid, with no personal data), how to
 * install it and the mobile apps. Details live in the documentation (/docs,
 * rendered from the AiPBX repository), not here, so this page stays short and
 * does not go out of date. The version shown comes from the latest GitHub
 * release (latest_release() in includes/data.php).
 */
$page = 'index';
require_once __DIR__ . '/includes/data.php';

$rel     = latest_release();
$version = $rel['tag'] ?? '';
$L       = fn(array $v) => $v[$LANG] ?? $v['en'];

$faq = [
    [
        'qTR' => 'AiPBX ücretsiz mi?', 'qEN' => 'Is AiPBX free?', 'qDE' => 'Ist AiPBX kostenlos?', 'qAZ' => 'AiPBX pulsuzdur?',
        'aTR' => 'Evet. AiPBX MIT lisanslı açık kaynak bir projedir: lisans, kullanıcı ya da dahili ücreti yoktur. Kaynak kodu GitHub\'dadır.',
        'aEN' => 'Yes. AiPBX is open source under the MIT license: no licence, user or extension fees. The source code is on GitHub.',
        'aDE' => 'Ja. AiPBX ist Open Source unter der MIT-Lizenz: keine Lizenz-, Benutzer- oder Nebenstellengebühren. Der Quellcode liegt auf GitHub.',
        'aAZ' => 'Bəli. AiPBX MIT lisenziyalı açıq mənbəli layihədir: lisenziya, istifadəçi və ya daxili nömrə haqqı yoxdur. Mənbə kodu GitHub-dadır.',
    ],
    [
        'qTR' => 'Hangi sunucuya kurulur?', 'qEN' => 'What server does it need?', 'qDE' => 'Welchen Server braucht es?', 'qAZ' => 'Hansı server lazımdır?',
        'aTR' => 'Temiz bir Ubuntu Server 26.04 LTS (x86_64). En az 2 vCPU, 2 GB RAM ve 15 GB disk; kurumsal kullanım için 4 vCPU, 4 GB RAM önerilir. Sanal makine de olur.',
        'aEN' => 'A clean Ubuntu Server 26.04 LTS (x86_64). At least 2 vCPU, 2 GB RAM and 15 GB disk; 4 vCPU and 4 GB RAM are recommended for production. A virtual machine is fine.',
        'aDE' => 'Ein frisches Ubuntu Server 26.04 LTS (x86_64). Mindestens 2 vCPU, 2 GB RAM und 15 GB Speicher; für den Betrieb werden 4 vCPU und 4 GB RAM empfohlen. Eine VM genügt.',
        'aAZ' => 'Təmiz Ubuntu Server 26.04 LTS (x86_64). Ən azı 2 vCPU, 2 GB RAM və 15 GB disk; korporativ istifadə üçün 4 vCPU və 4 GB RAM tövsiyə olunur. Virtual maşın da olar.',
    ],
    [
        'qTR' => 'İnternet olmadan çalışır mı?', 'qEN' => 'Does it work without internet access?', 'qDE' => 'Funktioniert es ohne Internet?', 'qAZ' => 'İnternetsiz işləyir?',
        'aTR' => 'Evet. Kurulumdan sonra santral, telefonlar, yerel yapay zekâ modelleri ve portaldaki Yardım sayfası internet olmadan çalışır. Bulut servisleri isteğe bağlıdır.',
        'aEN' => 'Yes. After installation the PBX, the phones, the local AI models and the Help pages in the portal work without internet access. Cloud services are optional.',
        'aDE' => 'Ja. Nach der Installation laufen Telefonanlage, Telefone, lokale KI-Modelle und die Hilfe im Portal ohne Internet. Cloud-Dienste sind optional.',
        'aAZ' => 'Bəli. Quraşdırmadan sonra santral, telefonlar, yerli süni intellekt modelləri və portaldakı Kömək səhifəsi internetsiz işləyir. Bulud xidmətləri isteğe bağlıdır.',
    ],
    [
        'qTR' => 'Mevcut santralimle ya da operatörümle çalışır mı?', 'qEN' => 'Does it work with my existing PBX or provider?', 'qDE' => 'Funktioniert es mit meiner Anlage oder meinem Anbieter?', 'qAZ' => 'Mövcud santralım və ya operatorumla işləyir?',
        'aTR' => 'SIP trunk veren her operatörle ve SIP konuşan santrallerle (NEC …) bağlanır; Microsoft Teams Direct Routing da desteklenir.',
        'aEN' => 'It connects to any provider that offers a SIP trunk and to PBXes that speak SIP (NEC …); Microsoft Teams Direct Routing is supported too.',
        'aDE' => 'Es verbindet sich mit jedem Anbieter mit SIP-Trunk und mit Anlagen, die SIP sprechen (NEC …); Microsoft Teams Direct Routing wird ebenfalls unterstützt.',
        'aAZ' => 'SIP trunk verən istənilən operatorla və SIP danışan santrallarla (NEC …) qoşulur; Microsoft Teams Direct Routing da dəstəklənir.',
    ],
];

$features = [
    ['fa-phone-volume', '#0284c7',
        t('Eksiksiz santral', 'A complete PBX', 'Komplette Telefonanlage', az: 'Tam santral'),
        t('Dahililer, IVR, kuyruklar, zaman koşulları, konferans, sekreter, yönlendirme ve sesli mesaj.', 'Extensions, IVR, queues, time conditions, conferences, boss–secretary, forwarding and voicemail.', 'Nebenstellen, IVR, Warteschlangen, Zeitsteuerung, Konferenzen, Chef–Sekretär, Weiterleitung und Voicemail.', az: 'Daxili nömrələr, IVR, növbələr, vaxt şərtləri, konfrans, katibə, yönləndirmə və səsli poçt.')],
    ['fa-tty', '#0f172a',
        t('Masaüstü telefonlar', 'Desk phones', 'Tischtelefone', az: 'Masaüstü telefonlar'),
        t('Yealink, Grandstream, Fanvil, Snom, Poly ve NEC otomatik kurulur; DHCP, TFTP ve NTP sunucusu dahil.', 'Yealink, Grandstream, Fanvil, Snom, Poly and NEC provision themselves; DHCP, TFTP and NTP server included.', 'Yealink, Grandstream, Fanvil, Snom, Poly und NEC werden automatisch eingerichtet; DHCP-, TFTP- und NTP-Server inklusive.', az: 'Yealink, Grandstream, Fanvil, Snom, Poly və NEC avtomatik qurulur; DHCP, TFTP və NTP serveri daxildir.')],
    ['fa-mobile-screen', '#059669',
        t('Tarayıcı ve mobil', 'Browser and mobile', 'Browser und Mobil', az: 'Brauzer və mobil'),
        t('Portaldan WebRTC ile arama, Android ve iOS uygulaması, görüntülü arama ve ekip sohbeti.', 'Call from the portal over WebRTC, Android and iOS apps, video calls and team chat.', 'Anrufe im Portal per WebRTC, Android- und iOS-App, Videoanrufe und Team-Chat.', az: 'Portaldan WebRTC ilə zəng, Android və iOS tətbiqi, görüntülü zəng və komanda söhbəti.')],
    ['fa-wand-magic-sparkles', '#7c3aed',
        t('Yapay zekâ', 'AI', 'KI', az: 'Süni intellekt'),
        t('Arayanı anlayan sesli menüler; konuşma tanıma ve seslendirme sunucuda, internetsiz. Bulut servisleri isteğe bağlı.', 'Voice menus that understand the caller; speech recognition and text to speech on the server, offline. Cloud services optional.', 'Sprachmenüs, die den Anrufer verstehen; Spracherkennung und Sprachausgabe auf dem Server, offline. Cloud optional.', az: 'Zəng edəni anlayan səsli menyular; nitq tanıma və səsləndirmə serverdə, internetsiz. Bulud xidmətləri isteğe bağlı.')],
    ['fa-headset', '#db2777',
        t('Çağrı merkezi', 'Call centre', 'Callcenter', az: 'Çağrı mərkəzi'),
        t('Canlı pano, temsilci ekranı, mola kodları, dinleme ve SLA raporları; PDF ve Excel çıktısı.', 'Live wallboard, agent screen, break codes, listen-in and SLA reports with PDF and Excel export.', 'Live-Wallboard, Agentenansicht, Pausencodes, Mithören und SLA-Berichte mit PDF- und Excel-Export.', az: 'Canlı panel, operator ekranı, fasilə kodları, dinləmə və SLA hesabatları; PDF və Excel çıxışı.')],
    ['fa-fax', '#ea580c',
        t('Faks', 'Fax', 'Fax', az: 'Faks'),
        t('Gelen faks PDF olarak e-postaya ve portala; portaldan PDF ya da metin faks gönderme.', 'Incoming faxes as PDF by e-mail and in the portal; send PDFs or text as fax from the portal.', 'Eingehende Faxe als PDF per E-Mail und im Portal; PDFs oder Text aus dem Portal faxen.', az: 'Gələn faks PDF kimi e-poçta və portala; portaldan PDF və ya mətn faks göndərmə.')],
    ['fa-shield-halved', '#16a34a',
        t('Güvenli', 'Secure', 'Sicher', az: 'Təhlükəsiz'),
        t('Portal, uygulamalar ve tarayıcı aramaları tek port 443 üzerinden şifreli; fail2ban, güvenlik duvarı, passkey ve iki adımlı giriş.', 'Portal, apps and browser calls encrypted over one port, 443; fail2ban, firewall, passkeys and two-step sign-in.', 'Portal, Apps und Browser-Anrufe verschlüsselt über einen Port, 443; fail2ban, Firewall, Passkeys und Zwei-Faktor-Anmeldung.', az: 'Portal, tətbiqlər və brauzer zəngləri tək port 443 üzərindən şifrəli; fail2ban, firewall, passkey və iki addımlı giriş.')],
    ['fa-heart-pulse', '#0891b2',
        t('Kendini izler', 'Looks after itself', 'Überwacht sich selbst', az: 'Özünü izləyir'),
        t('Sağlık kontrolleri ve alarm e-postaları, gece yedekleri, portaldan tek tıkla güncelleme.', 'Health checks and alarm e-mails, nightly backups, one-click updates from the portal.', 'Zustandsprüfungen und Alarm-E-Mails, nächtliche Backups, Updates mit einem Klick im Portal.', az: 'Sağlamlıq yoxlamaları və xəbərdarlıq e-poçtları, gecə ehtiyat nüsxələri, portaldan bir kliklə yeniləmə.')],
];

$shots = [
    ['portal-health', t('Sağlık kontrolleri', 'Health checks', 'Zustandsprüfungen', az: 'Sağlamlıq yoxlamaları'),
        t('Santral kendini izler; bir sorun olduğunda e-posta gönderir.', 'The PBX watches itself and sends an e-mail when something is wrong.', 'Die Anlage überwacht sich selbst und meldet Probleme per E-Mail.', az: 'Santral özünü izləyir; problem olduqda e-poçt göndərir.')],
    ['portal-local-ai', t('Yerel yapay zekâ', 'Local AI', 'Lokale KI', az: 'Yerli süni intellekt'),
        t('Konuşma tanıma ve seslendirme modellerini indirip sunucuda çalıştırın.', 'Download speech recognition and text-to-speech models and run them on the server.', 'Modelle für Spracherkennung und Sprachausgabe herunterladen und auf dem Server betreiben.', az: 'Nitq tanıma və səsləndirmə modellərini yükləyib serverdə işlədin.')],
    ['portal-network-services', t('Telefon ağı', 'Phone network', 'Telefonnetz', az: 'Telefon şəbəkəsi'),
        t('Masaüstü telefonlar için DHCP, TFTP, FTP, NTP ve telefon kayıtları.', 'DHCP, TFTP, FTP, NTP and phone logs for desk phones.', 'DHCP, TFTP, FTP, NTP und Telefonprotokolle für Tischtelefone.', az: 'Masaüstü telefonlar üçün DHCP, TFTP, FTP, NTP və telefon jurnalları.')],
    ['portal-help', t('Yerleşik yardım', 'Built-in help', 'Eingebaute Hilfe', az: 'Daxili kömək'),
        t('Dokümantasyon sunucunun içinde: internet olmasa da hata ararken elinizin altında.', 'The documentation is on the server itself: at hand while debugging, even without internet.', 'Die Dokumentation liegt auf dem Server: bei der Fehlersuche griffbereit, auch ohne Internet.', az: 'Sənədlər serverin özündədir: internet olmasa da xəta axtararkən əlinizin altında.')],
];

$installCmd = 'curl -fsSL https://raw.githubusercontent.com/mahirgul/AiPBX/main/install.sh | sudo bash';
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
    <a href="/android" class="sx-beta">
        <span class="sx-beta-in">
            <i class="fa-brands fa-google-play"></i>
            <span><?= t('<b>Android uygulaması Google Play\'de kapalı testte.</b> Teste katılın, ilk siz deneyin.', '<b>The Android app is in closed testing on Google Play.</b> Join the test and try it first.', '<b>Die Android-App ist im geschlossenen Test auf Google Play.</b> Machen Sie mit und testen Sie zuerst.', az: '<b>Android tətbiqi Google Play-də qapalı testdədir.</b> Testə qoşulun, ilk siz sınayın.') ?></span>
            <span class="sx-beta-btn"><?= t('Teste katıl', 'Join the test', 'Am Test teilnehmen', az: 'Testə qoşul') ?> →</span>
        </span>
    </a>
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
                <a href="#install" class="sx-btn sx-btn-primary"><i class="fa-solid fa-terminal"></i> <?= t('Kurulum', 'Install', 'Installieren', az: 'Quraşdırma') ?></a>
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

    <section class="sx-section alt" id="features">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Bir santralde ne gerekiyorsa', 'Everything a phone system needs', 'Alles, was eine Telefonanlage braucht', az: 'Santralda lazım olan hər şey') ?></h2>
            <p class="sx-lead"><?= t('Asterisk üzerine kurulu, tek bir portaldan yönetilir.', 'Built on Asterisk, managed from one web portal.', 'Auf Asterisk aufgebaut, über ein Webportal verwaltet.', az: 'Asterisk üzərində qurulub, bir portaldan idarə olunur.') ?></p>
            <div class="sx-grid">
                <?php foreach ($features as [$icon, $color, $title, $text]): ?>
                    <div class="sx-card">
                        <div class="ico" style="background:<?= $color ?>"><i class="fa-solid <?= $icon ?>"></i></div>
                        <h3><?= $title ?></h3>
                        <p><?= $text ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="sx-section" id="screenshots">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Ekranlar', 'Screenshots', 'Screenshots', az: 'Ekranlar') ?></h2>
            <p class="sx-lead"><?= t('Demo santralden, olduğu gibi.', 'From the demo PBX, as they are.', 'Aus der Demo-Anlage, unverändert.', az: 'Demo santraldan, olduğu kimi.') ?></p>
            <div class="sx-tabs" role="tablist">
                <?php foreach ($shots as $i => [$id, $label]): ?>
                    <button type="button" class="sx-tab<?= $i === 0 ? ' active' : '' ?>" role="tab" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" data-shot-tab="shot-<?= $id ?>"><?= $label ?></button>
                <?php endforeach; ?>
            </div>
            <?php foreach ($shots as $i => [$id, $label, $caption]): ?>
                <figure class="sx-shot<?= $i === 0 ? ' active' : '' ?>" id="shot-<?= $id ?>" style="margin:0;">
                    <div class="sx-frame">
                        <div class="sx-frame-bar"><i></i><i></i><i></i></div>
                        <img src="/img/shots/<?= $id ?>.jpg" width="1440" height="900" loading="lazy" alt="<?= e(strip_tags($label)) ?>">
                    </div>
                    <figcaption><?= $caption ?></figcaption>
                </figure>
            <?php endforeach; ?>
            <div class="sx-phones">
                <div class="sx-phone"><img src="/img/app_dialer.jpg" width="449" height="1024" loading="lazy" alt="<?= e($L(['tr' => 'Android uygulaması: tuş takımı', 'en' => 'Android app: keypad', 'de' => 'Android-App: Wähltastatur', 'az' => 'Android tətbiqi: klaviatura'])) ?>"></div>
                <div class="sx-phone"><img src="/img/app_history.jpg" width="449" height="1024" loading="lazy" alt="<?= e($L(['tr' => 'Android uygulaması: arama geçmişi', 'en' => 'Android app: call history', 'de' => 'Android-App: Anrufliste', 'az' => 'Android tətbiqi: zəng tarixçəsi'])) ?>"></div>
                <div class="sx-phone"><img src="/img/app_chat.jpg" width="449" height="1024" loading="lazy" alt="<?= e($L(['tr' => 'Android uygulaması: sohbet', 'en' => 'Android app: chat', 'de' => 'Android-App: Chat', 'az' => 'Android tətbiqi: söhbət'])) ?>"></div>
            </div>
        </div>
    </section>

    <section class="sx-section alt" id="install">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Kurulum', 'Install', 'Installation', az: 'Quraşdırma') ?></h2>
            <p class="sx-lead"><?= t('Temiz bir Ubuntu sunucuda tek komut. Gerisini kurulum programı yapar.', 'One command on a clean Ubuntu server. The installer does the rest.', 'Ein Befehl auf einem frischen Ubuntu-Server. Den Rest erledigt der Installer.', az: 'Təmiz Ubuntu serverdə bir əmr. Qalanını quraşdırıcı edir.') ?></p>
            <div class="sx-install">
                <div>
                    <div class="sx-code">
                        <button type="button" class="sx-copy" data-copy="<?= e($installCmd) ?>"><?= t('Kopyala', 'Copy', 'Kopieren', az: 'Kopyala') ?></button>
                        <code><?= e($installCmd) ?></code>
                    </div>
                    <ol class="sx-steps">
                        <li><?= t('Komutu sunucuda root olarak çalıştırın; Asterisk, veritabanı, web portalı ve sertifikalar kurulur.', 'Run the command as root on the server; it installs Asterisk, the database, the web portal and certificates.', 'Den Befehl als root auf dem Server ausführen; er installiert Asterisk, Datenbank, Webportal und Zertifikate.', az: 'Əmri serverdə root kimi işlədin; Asterisk, verilənlər bazası, veb portal və sertifikatlar qurulur.') ?></li>
                        <li><?= t('Tarayıcıda sunucunun adresini açın ve kurulumun sonunda yazdığı yönetici şifresiyle giriş yapın.', 'Open the server\'s address in a browser and sign in with the admin password the installer prints at the end.', 'Die Adresse des Servers im Browser öffnen und mit dem Admin-Passwort anmelden, das der Installer am Ende ausgibt.', az: 'Brauzerdə serverin ünvanını açın və quraşdırıcının sonda yazdığı admin şifrəsi ilə daxil olun.') ?></li>
                        <li><?= t('Hattınızı (SIP trunk) ve dahilileri ekleyin; güncellemeler portaldan tek tıkla gelir.', 'Add your line (SIP trunk) and extensions; updates come with one click in the portal.', 'Leitung (SIP-Trunk) und Nebenstellen anlegen; Updates kommen mit einem Klick im Portal.', az: 'Xəttinizi (SIP trunk) və daxili nömrələri əlavə edin; yeniləmələr portaldan bir kliklə gəlir.') ?></li>
                    </ol>
                </div>
                <div class="sx-req">
                    <h3><?= t('Gereksinimler', 'Requirements', 'Voraussetzungen', az: 'Tələblər') ?></h3>
                    <ul>
                        <li>Ubuntu Server 26.04 LTS (x86_64)</li>
                        <li><?= t('En az 2 vCPU, 2 GB RAM, 15 GB disk', 'At least 2 vCPU, 2 GB RAM, 15 GB disk', 'Mindestens 2 vCPU, 2 GB RAM, 15 GB Speicher', az: 'Ən azı 2 vCPU, 2 GB RAM, 15 GB disk') ?></li>
                        <li><?= t('Önerilen: 4 vCPU, 4 GB RAM, 40 GB SSD', 'Recommended: 4 vCPU, 4 GB RAM, 40 GB SSD', 'Empfohlen: 4 vCPU, 4 GB RAM, 40 GB SSD', az: 'Tövsiyə: 4 vCPU, 4 GB RAM, 40 GB SSD') ?></li>
                        <li><?= t('Dışarıdan erişim için bir alan adı (isteğe bağlı)', 'A domain name for access from outside (optional)', 'Ein Domainname für den Zugriff von außen (optional)', az: 'Xaricdən giriş üçün domen adı (isteğe bağlı)') ?></li>
                    </ul>
                    <a href="https://github.com/mahirgul/AiPBX/blob/main/INSTALL.md" class="sx-btn sx-btn-ghost" target="_blank" rel="noopener"><i class="fa-solid fa-book"></i> <?= t('Kurulum kılavuzu', 'Installation guide', 'Installationsanleitung', az: 'Quraşdırma bələdçisi') ?></a>
                    <a href="/docs" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-life-ring"></i> <?= t('Dokümantasyon', 'Documentation', 'Dokumentation', az: 'Sənədlər') ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="sx-section" id="apps">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Mobil uygulamalar', 'Mobile apps', 'Mobile Apps', az: 'Mobil tətbiqlər') ?></h2>
            <p class="sx-lead"><?= t('Dahiliniz cebinizde: arama, görüntülü arama, sohbet ve rehber. Uygulama yalnızca kendi santralinize bağlanır.', 'Your extension in your pocket: calls, video calls, chat and the directory. The app talks only to your own PBX.', 'Ihre Nebenstelle in der Tasche: Anrufe, Videoanrufe, Chat und Telefonbuch. Die App spricht nur mit Ihrer eigenen Anlage.', az: 'Daxili nömrəniz cibinizdə: zəng, görüntülü zəng, söhbət və kataloq. Tətbiq yalnız öz santralınıza qoşulur.') ?></p>
            <div class="sx-apps">
                <div class="sx-app">
                    <h3><i class="fa-brands fa-android" style="color:#16a34a"></i> Android</h3>
                    <p><?= t('Google Play\'de kapalı testte. Teste katılın ya da APK dosyasını doğrudan indirin.', 'In closed testing on Google Play. Join the test or download the APK directly.', 'Im geschlossenen Test auf Google Play. Am Test teilnehmen oder die APK direkt herunterladen.', az: 'Google Play-də qapalı testdədir. Testə qoşulun və ya APK faylını birbaşa yükləyin.') ?></p>
                    <div class="row">
                        <a href="/android" class="sx-btn sx-btn-primary"><i class="fa-brands fa-google-play"></i> <?= t('Teste katıl', 'Join the test', 'Am Test teilnehmen', az: 'Testə qoşul') ?></a>
                        <a href="<?= e(download_url('aipbx-latest.apk')) ?>" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-download"></i> APK</a>
                    </div>
                </div>
                <div class="sx-app">
                    <h3><i class="fa-brands fa-apple" style="color:#0f172a"></i> iOS</h3>
                    <p><?= t('App Store\'da değil; imzasız IPA dosyası GitHub\'da. Android sürümünün gerisinde.', 'Not on the App Store; an unsigned IPA is on GitHub. Behind the Android app in features.', 'Nicht im App Store; eine unsignierte IPA liegt auf GitHub. Hat weniger Funktionen als die Android-App.', az: 'App Store-da deyil; imzasız IPA faylı GitHub-dadır. Android versiyasından geridədir.') ?></p>
                    <div class="row">
                        <a href="<?= e(download_url('AiPBX-unsigned.ipa')) ?>" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-download"></i> IPA</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sx-section alt" id="sponsor">
        <div class="sx-wrap">
            <div class="sx-sponsor-box">
                <div class="sx-sponsor-icon"><i class="fa-solid fa-heart"></i></div>
                <h2 class="sx-h2"><?= t('Sınırsız ve Engelsiz İletişim İçin Bize Destek Olun', 'Support Us for Open & Barrier-Free Communication', 'Unterstützen Sie uns für freie und barrierefreie Kommunikation', az: 'Məhdudiyyətsiz və maneəsiz ünsiyyət üçün bizə dəstək olun') ?></h2>
                <p class="sx-lead"><?= t(
                    'AiPBX; lisans, kullanıcı ve özellik kısıtlaması olmadan herkesin kendi bağımsız santraline sahip olabilmesi için tamamen açık kaynak ve ücretsiz geliştirilmektedir. Altyapı, sunucu giderleri ve mobil uygulama geliştirme süreçlerimize GitHub Sponsors üzerinden destek olarak projenin geleceğine katkıda bulunabilirsiniz.',
                    'AiPBX is developed completely free and open source so that anyone can own their independent PBX without license or user limits. You can contribute to the project\'s future by supporting server infrastructure, maintenance and mobile app development via GitHub Sponsors.',
                    'AiPBX wird vollständig Open Source und kostenlos entwickelt, damit jede Organisation eine eigene unabhängige Telefonanlage ohne Lizenz- oder Benutzerbeschränkungen betreiben kann. Unterstützen Sie Serverinfrastruktur und mobile Entwicklung über GitHub Sponsors.',
                    az: 'AiPBX, lisenziya və istifadəçi məhdudiyyəti olmadan hər kəsin öz müstəqil santralına sahib ola bilməsi üçün tamamilə açıq mənbəli və pulsuz inkişaf etdirilir. Server infrastrukturu və mobil inkişaf proseslərimizə GitHub Sponsors vasitəsilə dəstək ola bilərsiniz.'
                ) ?></p>
                <div class="sx-sponsor-cta">
                    <a href="https://github.com/sponsors/mahirgul" class="sx-btn sx-btn-sponsor" target="_blank" rel="noopener">
                        <i class="fa-solid fa-heart"></i> <?= t('GitHub\'da Sponsor Olun', 'Sponsor on GitHub', 'Auf GitHub sponsern', az: 'GitHub-da sponsor olun') ?>
                    </a>
                    <a href="https://github.com/mahirgul/AiPBX" class="sx-btn sx-btn-ghost" target="_blank" rel="noopener">
                        <i class="fa-brands fa-github"></i> <?= t('Projeyi Yıldızlayın', 'Star on GitHub', 'Auf GitHub mit Stern markieren', az: 'GitHub-da ulduzlayın') ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="sx-section" id="faq">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Sık sorulanlar', 'Questions', 'Häufige Fragen', az: 'Tez-tez verilən suallar') ?></h2>
            <p class="sx-lead"><?= t('Daha fazlası dokümantasyonda.', 'More in the documentation.', 'Mehr in der Dokumentation.', az: 'Daha çoxu sənədlərdə.') ?></p>
            <div class="sx-faq">
                <?php foreach ($faq as $i => $f): ?>
                    <details<?= $i === 0 ? ' open' : '' ?>>
                        <summary><?= e(getLocal($f, 'q')) ?></summary>
                        <p><?= e(getLocal($f, 'a')) ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
