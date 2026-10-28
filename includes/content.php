<?php
/**
 * aipbx.bid — content shared by the pages: features, screenshots, FAQ, install
 * command. The pages (index, features, install, videos, mobile) pick sections
 * from includes/sections/.
 */
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
        t('Portal, uygulamalar ve tarayıcı aramaları tek port 443 üzerinden şifreli; fail2ban, güvenlik duvarı, passkey ve iki adımlı giriş. Gece arama koruması ve trunk limitleri kaçak aramayı erken durdurur.', 'Portal, apps and browser calls encrypted over one port, 443; fail2ban, firewall, passkeys and two-step sign-in. Night dialling protection and trunk limits stop toll fraud early.', 'Portal, Apps und Browser-Anrufe verschlüsselt über einen Port, 443; fail2ban, Firewall, Passkeys und Zwei-Faktor-Anmeldung. Nachtsperre und Trunk-Limits stoppen Gebührenbetrug früh.', az: 'Portal, tətbiqlər və brauzer zəngləri tək port 443 üzərindən şifrəli; fail2ban, firewall, passkey və iki addımlı giriş. Gecə zəng qoruması və trunk limitləri saxta zəngləri erkən dayandırır.')],
    ['fa-database', '#4f46e5',
        t('Otomasyon ve veri', 'Automation and data', 'Automatisierung und Daten', az: 'Avtomatlaşdırma və məlumat'),
        t('IVR arayanın numarasını kendi veritabanınızda ya da HTTP ile sorgulayıp ona göre yönlendirir; zamanlanmış betikler korumalı alanda, root olmadan çalışır.', 'IVRs look up the caller in your own database or over HTTP and route on the answer; scheduled scripts run in a sandbox, never as root.', 'IVRs schlagen den Anrufer in Ihrer eigenen Datenbank oder per HTTP nach und leiten danach weiter; geplante Skripte laufen in einer Sandbox, nie als root.', az: 'IVR zəng edəni öz verilənlər bazanızda və ya HTTP ilə yoxlayıb cavaba görə yönləndirir; planlaşdırılmış skriptlər qorunan mühitdə, root olmadan işləyir.')],
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

$installCmd = 'curl -fsSL aipbx.bid/i | sudo bash';
