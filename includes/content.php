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
        'aTR' => 'Temiz bir 64-bit Ubuntu (26.04+), Debian (13+), Raspberry Pi OS veya Armbian. x86_64 ve ARM64 (Raspberry Pi 4/5 dahil) desteklenir. En az 2 vCPU (veya 4 çekirdek ARM), 2 GB RAM ve 15 GB disk; kurumsal kullanım için 4 vCPU, 4 GB RAM önerilir. Sanal makine veya Raspberry Pi olur.',
        'aEN' => 'A clean 64-bit OS: Ubuntu Server (26.04 LTS+), Debian 13+, Raspberry Pi OS (64-bit), or Armbian. Both x86_64 and ARM64 (including Raspberry Pi 4/5) are supported. At least 2 vCPU, 2 GB RAM and 15 GB disk; 4 vCPU and 4 GB RAM recommended for production. Virtual machines and SBCs are fine.',
        'aDE' => 'Ein frisches 64-Bit-OS: Ubuntu Server (26.04 LTS+), Debian 13+, Raspberry Pi OS (64-Bit) oder Armbian. Sowohl x86_64 als auch ARM64 (inkl. Raspberry Pi 4/5) werden unterstützt. Mindestens 2 vCPU, 2 GB RAM und 15 GB Speicher. Eine VM oder ein Pi genügt.',
        'aAZ' => 'Təmiz 64-bit OS: Ubuntu Server (26.04 LTS+), Debian 13+, Raspberry Pi OS (64-bit) və ya Armbian. Həm x86_64, həm də ARM64 (Raspberry Pi 4/5 daxil) dəstəklənir. Ən azı 2 vCPU, 2 GB RAM və 15 GB disk.',
    ],
    [
        'qTR' => 'İnternet olmadan çalışır mı?', 'qEN' => 'Does it work without internet access?', 'qDE' => 'Funktioniert es ohne Internet?', 'qAZ' => 'İnternetsiz işləyir?',
        'aTR' => 'Evet. Kurulumdan sonra santral, telefonlar, yerel ses (TTS) modelleri ve portaldaki Yardım sayfası internet olmadan çalışır. Bulut servisleri isteğe bağlıdır.',
        'aEN' => 'Yes. After installation the PBX, the phones, the local voice (text-to-speech) models and the Help pages in the portal work without internet access. Cloud services are optional.',
        'aDE' => 'Ja. Nach der Installation laufen Telefonanlage, Telefone, lokale Sprachausgabe-Modelle und die Hilfe im Portal ohne Internet. Cloud-Dienste sind optional.',
        'aAZ' => 'Bəli. Quraşdırmadan sonra santral, telefonlar, yerli səsləndirmə modelləri və portaldakı Kömək səhifəsi internetsiz işləyir. Bulud xidmətləri isteğe bağlıdır.',
    ],
    [
        'qTR' => 'Mevcut santralimle ya da operatörümle çalışır mı?', 'qEN' => 'Does it work with my existing PBX or provider?', 'qDE' => 'Funktioniert es mit meiner Anlage oder meinem Anbieter?', 'qAZ' => 'Mövcud santralım və ya operatorumla işləyir?',
        'aTR' => 'SIP trunk veren her operatörle ve SIP konuşan santrallerle (NEC …) bağlanır; Microsoft Teams Direct Routing da desteklenir.',
        'aEN' => 'It connects to any provider that offers a SIP trunk and to PBXes that speak SIP (NEC …); Microsoft Teams Direct Routing is supported too.',
        'aDE' => 'Es verbindet sich mit jedem Anbieter mit SIP-Trunk und mit Anlagen, die SIP sprechen (NEC …); Microsoft Teams Direct Routing wird ebenfalls unterstützt.',
        'aAZ' => 'SIP trunk verən istənilən operatorla və SIP danışan santrallarla (NEC …) qoşulur; Microsoft Teams Direct Routing da dəstəklənir.',
    ],
    [
        'qTR' => 'Neden PHP kullanılıyor? Performans sorunu olur mu?', 'qEN' => 'Why PHP? Does it hurt telephony performance?', 'qDE' => 'Warum PHP? Gibt es Performance-Probleme?', 'qAZ' => 'Niyə PHP istifadə olunur? Performans problemi yaradırmı?',
        'aTR' => 'AiPBX\'te PHP hiçbir zaman ses, SIP sinyalleşme, sohbet veya canlı AI yolunda değildir — yalnızca kontrol düzlemidir (formlar, REST API ve Apply anında Asterisk ayar üretimi). SIP/RTP/WebRTC C\'de (Asterisk 22 + Nginx + coturn), sohbet Go\'da, canlı AI ve ONNX TTS/VAD Python/C++\'ta çalışır. 4 vCPU / 4 GB RAM sunucuda ~40–70 WebRTC veya ~80–120 SIP çağrısı rahat taşınır.',
        'aEN' => 'In AiPBX, PHP is never in the media or signaling hot path — it is strictly the control plane (admin UI, REST CRUD, and generating Asterisk configs on Apply). SIP/RTP/WebRTC run in C (Asterisk 22 + Nginx + coturn), real-time chat runs in Go, and live AI/ONNX TTS run in Python/C++. A 4 vCPU / 4 GB RAM server handles ~40–70 concurrent WebRTC calls or ~80–120 SIP passthrough calls.',
        'aDE' => 'In AiPBX liegt PHP niemals im Medien- oder Signalisierungspfad, sondern ist rein die Steuerungsebene. SIP/RTP/WebRTC laufen in C (Asterisk 22 + Nginx + coturn), Echtzeit-Chat in Go und Live-KI/ONNX in Python/C++. Ein 4-vCPU-/4-GB-RAM-Server trägt ~40–70 gleichzeitige WebRTC- oder ~80–120 SIP-Anrufe.',
        'aAZ' => 'AiPBX-də PHP heç vaxt səs, SIP siqnalizasiya, söhbət və ya canlı AI yolunda deyil — yalnız idarəetmə müstəvisidir. SIP/RTP/WebRTC C-də, söhbət Go-da, canlı AI və ONNX TTS Python/C++-da işləyir. 4 vCPU / 4 GB RAM serverdə ~40–70 WebRTC və ya ~80–120 SIP zəngi rahat işləyir.',
        'link' => '/why-php',
    ],
    [
        'qTR' => 'VoIP over QUIC (AiPBX-QUIC) nasıl çalışıyor ve üretimde mi?', 'qEN' => 'How does VoIP over QUIC (AiPBX-QUIC) work, and is it in production?', 'qDE' => 'Wie funktioniert VoIP über QUIC (AiPBX-QUIC)?', 'qAZ' => 'VoIP over QUIC (AiPBX-QUIC) necə işləyir?',
        'aTR' => 'AiPBX-QUIC, tek bir UDP 443 portundan SIP sinyalleşmesini QUIC stream\'lerinde, RTP sesi ise gecikmesiz QUIC Datagramlarında (RFC 9000 / 9221) taşıyarak Wi-Fi ↔ 4G/5G geçişlerini koparmamayı hedefleyen deneysel Go ağ geçidimizdir. Yapılandırma testleri geçer; canlı Asterisk çağrı doğrulaması yol haritasındadır, üretimde ise Port 443 ALPN + WSS/TURNS çalışır.',
        'aEN' => 'AiPBX-QUIC is our experimental standalone Go gateway using QUIC streams for SIP and QUIC Datagrams (RFC 9000 / 9221) for RTP over a single UDP 443 port to survive Wi-Fi ↔ 4G/5G handoffs. Config/unit tests pass while live two-way Asterisk calls remain on the roadmap; production uses Port 443 ALPN + WSS/TURNS.',
        'aDE' => 'AiPBX-QUIC ist unser experimentelles Go-Gateway (RFC 9000 / 9221), das SIP über QUIC-Streams und RTP über QUIC-Datagramme auf UDP 443 bündelt. Live-Zweiwege-Anrufe stehen auf der Roadmap; produktiv läuft Port 443 ALPN + WSS/TURNS.',
        'aAZ' => 'AiPBX-QUIC, UDP 443 üzərindən SIP və RTP trafikini QUIC (RFC 9000 / 9221) ilə daşıyan təcrübi Go şlüzüdür. Canlı Asterisk səs zəngi yol xəritəsindədir; istehsalatda Port 443 ALPN + WSS/TURNS işləyir.',
        'link' => '/faq/quic',
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
        t('Arayanı anlayan sesli menüler ve AI ajanlar; sunucuda veya bulutta seslendirme, hazır anons şablonları, ElevenLabs bekleme müziği (MOH) üretimi, konuşma tanıma ve dil modelleri.', 'Voice menus and AI agents that understand the caller; local or cloud text-to-speech, ready prompt templates, ElevenLabs hold music (MOH) generation, speech recognition and language models.', 'Sprachmenüs und KI-Agenten, die den Anrufer verstehen; lokale oder Cloud-Sprachausgabe, fertige Ansagevorlagen, ElevenLabs-Wartemusik (MOH), Spracherkennung und Sprachmodelle.', az: 'Zəng edəni anlayan səsli menyular və AI agentlər; serverdə və ya buludda səsləndirmə, hazır anons şablonları, ElevenLabs gözləmə musiqisi (MOH) yaradılması, nitq tanıma və dil modelləri.')],
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
        t('Odoo ve ERPNext bağlayıcıları, REST API ve webhook\'lar; IVR\'da veritabanı/HTTP sorgusu ve korumalı zamanlanmış betikler.', 'Odoo and ERPNext connectors, REST API and webhooks; database or HTTP caller lookups in IVRs and sandboxed scheduled scripts.', 'Odoo- und ERPNext-Connectoren, REST-API und Webhooks; Datenbank-/HTTP-Abfragen im IVR und geplante Skripte in einer Sandbox.', az: 'Odoo və ERPNext qoşucuları, REST API və webhook-lar; IVR-da verilənlər bazası/HTTP sorğusu və qorunan planlaşdırılmış skriptlər.')],
    ['fa-heart-pulse', '#0891b2',
        t('Kendini izler', 'Looks after itself', 'Überwacht sich selbst', az: 'Özünü izləyir'),
        t('Sağlık kontrolleri ve alarm e-postaları, gece yedekleri, portaldan tek tıkla güncelleme.', 'Health checks and alarm e-mails, nightly backups, one-click updates from the portal.', 'Zustandsprüfungen und Alarm-E-Mails, nächtliche Backups, Updates mit einem Klick im Portal.', az: 'Sağlamlıq yoxlamaları və xəbərdarlıq e-poçtları, gecə ehtiyat nüsxələri, portaldan bir kliklə yeniləmə.')],
];

$shots = [
    ['portal-health', t('Sağlık kontrolleri', 'Health checks', 'Zustandsprüfungen', az: 'Sağlamlıq yoxlamaları'),
        t('Santral kendini izler; bir sorun olduğunda e-posta gönderir.', 'The PBX watches itself and sends an e-mail when something is wrong.', 'Die Anlage überwacht sich selbst und meldet Probleme per E-Mail.', az: 'Santral özünü izləyir; problem olduqda e-poçt göndərir.')],
    ['portal-local-ai', t('Yerel TTS', 'Local TTS', 'Lokale Sprachausgabe', az: 'Yerli səsləndirmə'),
        t('Seslendirme (TTS) modellerini indirip sunucuda çalıştırın; konuşma tanıma ve dil modelleri bulut hesaplarıyla çalışır.', 'Download text-to-speech models and run them on the server; speech recognition and language models use cloud accounts.', 'Modelle für die Sprachausgabe herunterladen und auf dem Server betreiben; Spracherkennung und Sprachmodelle laufen über Cloud-Konten.', az: 'Səsləndirmə (TTS) modellərini yükləyib serverdə işlədin; nitq tanıma və dil modelləri bulud hesabları ilə işləyir.')],
    ['portal-network-services', t('Telefon ağı', 'Phone network', 'Telefonnetz', az: 'Telefon şəbəkəsi'),
        t('Masaüstü telefonlar için DHCP, TFTP, FTP, NTP ve telefon kayıtları.', 'DHCP, TFTP, FTP, NTP and phone logs for desk phones.', 'DHCP, TFTP, FTP, NTP und Telefonprotokolle für Tischtelefone.', az: 'Masaüstü telefonlar üçün DHCP, TFTP, FTP, NTP və telefon jurnalları.')],
    ['portal-help', t('Yerleşik yardım', 'Built-in help', 'Eingebaute Hilfe', az: 'Daxili kömək'),
        t('Dokümantasyon sunucunun içinde: internet olmasa da hata ararken elinizin altında.', 'The documentation is on the server itself: at hand while debugging, even without internet.', 'Die Dokumentation liegt auf dem Server: bei der Fehlersuche griffbereit, auch ohne Internet.', az: 'Sənədlər serverin özündədir: internet olmasa da xəta axtararkən əlinizin altında.')],
];

$installCmd = 'curl -fsSL aipbx.bid/i | sudo bash';
