<?php
/**
 * AiPBX.bid — Universal SEO Helper (Tüm sayfalar için)
 * Her sayfada $page değişkeni set edilmiş olmalı.
 * Merkezi SEO veri tablosu — kolayca güncellenebilir.
 */

$pageSeoMap = [
    'index' => [
        'tr' => [
            'title'    => 'AiPBX — %100 Ücretsiz Açık Kaynak Yapay Zekâ Destekli IP Santral | VoIP SIP Asterisk 22',
            'desc'     => '%100 ücretsiz ve açık kaynak (MIT) yapay zeka destekli kurumsal VoIP SIP IP santral platformu. Asterisk 22, Whisper AI ses tanıma, WebRTC softphone, Port 443 ALPN, Android & iOS istemcileri.',
            'keywords' => 'AiPBX, %100 free, açık kaynak IP santral, open source PBX, yapay zeka destekli santral, ai powered pbx, ai supported voip, VoIP santral, SIP santral, SIP trunk, PJSIP, Asterisk 22, WebRTC softphone, ücretsiz IP santral, kurumsal telefon santrali',
        ],
        'en' => [
            'title'    => 'AiPBX — 100% Free Open Source AI-Powered IP PBX | VoIP SIP Asterisk 22',
            'desc'     => '100% free and open-source (MIT) AI-powered enterprise VoIP SIP IP PBX platform. Asterisk 22, Whisper AI voice recognition, WebRTC softphones, Port 443 ALPN, Android & iOS mobile apps.',
            'keywords' => 'AiPBX, 100% free pbx, open source ip pbx, opensource voip, ai powered pbx, ai supported telephony, voip, sip, sip trunk, pjsip, asterisk 22, webrtc softphone, free business phone system, enterprise voip solution',
        ],
        'de' => [
            'title'    => 'AiPBX — 100% Kostenlose Open-Source KI-Telefonanlage | VoIP SIP Asterisk 22',
            'desc'     => '100% kostenlose, Open-Source und KI-gestützte Enterprise VoIP SIP Telefonanlage. Asterisk 22, Whisper KI-Spracherkennung, WebRTC-Softphone, Port 443 ALPN und native mobile Apps. Keine Lizenzgebühren, MIT-Lizenz.',
            'keywords' => 'AiPBX, 100% free, Open Source IP TK-Anlage, KI Telefonanlage, ai powered voip, Asterisk 22, WebRTC Telefonie, Port 443 SIP, Enterprise Kommunikation, VoIP SIP',
        ],
        'az' => [
            'title'    => 'AiPBX — 100% Pulsuz Açıq Mənbəli Süni İntellekt Dəstəkli IP Santral | VoIP SIP',
            'desc'     => '100% pulsuz, açıq mənbəli və süni intellekt dəstəkli korporativ VoIP SIP santral platforması. Asterisk 22, Whisper AI səs tanıma, WebRTC softphone, Port 443 ALPN və mobil tətbiqlər. MIT lisenziyalı.',
            'keywords' => 'AiPBX, 100% pulsuz, açıq mənbəli IP santral, süni intellekt santral, ai powered pbx, VoIP santral, SIP santral, SIP trunk, PJSIP, Asterisk 22, WebRTC softphone',
        ],
        'slug' => '/',
    ],
    'features' => [
        'tr' => [
            'title'    => 'Santral Özellikleri & Modüller — AiPBX Kurumsal IP Santral',
            'desc'     => 'AiPBX kurumsal santral modülleri: Port 443 ALPN, Dahili Sohbet, Görsel CDR (LinkedID), Konferans, Süpervizör Dinleme (*90), Çalma Grupları ve MS Teams SBC.',
            'keywords' => 'AiPBX özellikler, IP santral modülleri, ALPN SIP, ChanSpy, ConfBridge, CDR LinkedID, Ring Groups, MS Teams SBC, Boss-Secretary',
        ],
        'en' => [
            'title'    => 'Enterprise Features & Modules — AiPBX IP PBX',
            'desc'     => 'AiPBX telephony suite: Port 443 ALPN, In-Dialer Chat, Visual CDR (LinkedID), Conferences, Supervisor Spy (*90), Ring Groups and MS Teams SBC.',
            'keywords' => 'AiPBX features, IP PBX modules, ALPN SIP, ChanSpy, ConfBridge, CDR LinkedID, Ring Groups, MS Teams SBC, Boss-Secretary',
        ],
        'de' => [
            'title'    => 'Funktionen & Kernmodule — AiPBX Enterprise IP-Telefonanlage',
            'desc'     => 'AiPBX Telefonie-Suite: Port 443 ALPN, In-App-Chat, Visuelles CDR, Konferenz, Supervisor Mithören (*90), Rufgruppen und MS Teams SBC.',
            'keywords' => 'AiPBX Funktionen, IP TK-Anlage Module, ALPN SIP, ChanSpy, ConfBridge, CDR LinkedID, Rufgruppen, MS Teams SBC',
        ],
        'az' => [
            'title'    => 'Santral Xüsusiyyətləri & Modullar — AiPBX Korporativ IP Santral',
            'desc'     => 'AiPBX korporativ santral modulları: Port 443 ALPN, Daxili Söhbət, Vizual CDR (LinkedID), Konfrans, Supervayzer Dinləməsi (*90), Zəng Qrupları və MS Teams SBC.',
            'keywords' => 'AiPBX xüsusiyyətləri, IP santral modulları, ALPN SIP, ChanSpy, ConfBridge, CDR LinkedID, Ring Groups, MS Teams SBC, Boss-Secretary',
        ],
        'slug' => '/features',
    ],
    'architecture' => [
        'tr' => [
            'title'    => 'Sistem Mimarisi — Port 443 ALPN, Asterisk 22, WebRTC | AiPBX',
            'desc'     => 'AiPBX mimarisi: tek Port 443 üzerinden ALPN çoklama (HTTPS, WebRTC, SIP/TLS), PJSIP çift uç nokta, Go WebSocket sohbet ve iki katmanlı MariaDB.',
            'keywords' => 'AiPBX mimari, ALPN stream çoklama, Nginx L4 SIP, WebRTC Asterisk, PJSIP, MariaDB iki veritabanı, Go WebSocket chat',
        ],
        'en' => [
            'title'    => 'System Architecture — Port 443 ALPN, Asterisk 22 | AiPBX',
            'desc'     => 'AiPBX layered architecture: Port 443 ALPN stream multiplexing (HTTP/2, WebRTC, SIP/TLS), PJSIP dual endpoint, Go WebSocket IM, dual-database MariaDB model.',
            'keywords' => 'AiPBX architecture, ALPN stream multiplexing, Nginx L4 SIP, WebRTC Asterisk, PJSIP dual endpoint, MariaDB dual database, Go WebSocket chat',
        ],
        'de' => [
            'title'    => 'Systemarchitektur — Port 443 ALPN, Asterisk 22 | AiPBX',
            'desc'     => 'AiPBX Schichtarchitektur: Port 443 ALPN-Multiplexing (HTTP/2, WebRTC, SIP/TLS), PJSIP Dual-Endpunkt, Go WebSocket-Chat, Zwei-Datenbank-MariaDB-Modell.',
            'keywords' => 'AiPBX Architektur, ALPN Stream-Multiplexing, Nginx L4 SIP, WebRTC Asterisk, PJSIP, MariaDB Dual-Datenbank, Go WebSocket Chat',
        ],
        'az' => [
            'title'    => 'Sistem Arxitekturası — Port 443 ALPN, Asterisk 22, WebRTC | AiPBX',
            'desc'     => 'AiPBX arxitekturası: tək Port 443 üzərindən ALPN multipleksləşdirmə (HTTPS, WebRTC, SIP/TLS), PJSIP ikili son nöqtə, Go WebSocket söhbəti və ikiqatlı MariaDB.',
            'keywords' => 'AiPBX arxitektura, ALPN stream multipleksləşdirmə, Nginx L4 SIP, WebRTC Asterisk, PJSIP, MariaDB iki verilənlər bazası, Go WebSocket chat',
        ],
        'slug' => '/architecture',
    ],
    'callcenter' => [
        'tr' => [
            'title'    => 'Çağrı Merkezi — ACD Kuyruk, Mola Kodları, Wallboard | AiPBX',
            'desc'     => 'AiPBX çağrı merkezi: Statik/dinamik ACD kuyruk, *22 mola ve *23 moladan dönüş, anlık wallboard, *90 Spy/Whisper/Barge süpervizör dinleme.',
            'keywords' => 'AiPBX çağrı merkezi, ACD kuyruk, mola kodu *22, wallboard, ChanSpy *90, süpervizör dinleme, çağrı merkezi Asterisk',
        ],
        'en' => [
            'title'    => 'Call Center — ACD Queues, Break Codes, Wallboard | AiPBX',
            'desc'     => 'AiPBX call center: Static/dynamic ACD queues, *22 break and *23 resume, live wallboard, *90 Spy/Whisper/Barge supervisor monitoring.',
            'keywords' => 'AiPBX call center, ACD queue, break code *22, wallboard, ChanSpy *90, supervisor monitoring, Asterisk call center',
        ],
        'de' => [
            'title'    => 'Callcenter — ACD-Warteschlangen, Pausencodes | AiPBX',
            'desc'     => 'AiPBX Callcenter: Statische/dynamische ACD-Warteschlangen, *22 Pause und *23 Rückkehr, Live-Wallboard, *90 Spy/Whisper/Barge Supervisor-Überwachung.',
            'keywords' => 'AiPBX Callcenter, ACD Warteschlange, Pausencode *22, Wallboard, ChanSpy *90, Supervisor Mithören, Asterisk Callcenter',
        ],
        'az' => [
            'title'    => 'Çağrı Mərkəzi — ACD Növbə, Fasilə Kodları, Wallboard | AiPBX',
            'desc'     => 'AiPBX çağrı mərkəzi: statik/dinamik ACD növbə, *22 fasilə və *23 fasilədən qayıdış, canlı wallboard, *90 Spy/Whisper/Barge supervayzer dinləməsi.',
            'keywords' => 'AiPBX çağrı mərkəzi, ACD növbə, fasilə kodu *22, wallboard, ChanSpy *90, supervayzer dinləməsi, Asterisk çağrı mərkəzi',
        ],
        'slug' => '/callcenter',
    ],
    'mobile-apps' => [
        'tr' => [
            'title'    => 'Mobil Softphone — Android & iOS Uygulaması | AiPBX',
            'desc'     => 'AiPBX native Android (Kotlin) ve iOS (Swift) softphone: WebRTC Opus ses/video, FCM/APNs push, dahili sohbet, G.729 ve Turnkey App kurulumu.',
            'keywords' => 'AiPBX mobil softphone, Android VoIP uygulaması, iOS softphone, WebRTC mobile, FCM push bildirim, PJSIP Android, kurumsal softphone',
        ],
        'en' => [
            'title'    => 'Mobile Softphone — Android & iOS App | AiPBX',
            'desc'     => 'AiPBX native Android (Kotlin) & iOS (Swift) softphone: WebRTC Opus audio/video, FCM/APNs push, in-dialer chat, G.729 and Turnkey App installation.',
            'keywords' => 'AiPBX mobile softphone, Android VoIP app, iOS softphone, WebRTC mobile, FCM push notification, PJSIP Android, enterprise softphone',
        ],
        'de' => [
            'title'    => 'Mobiles Softphone — Android & iOS App | AiPBX',
            'desc'     => 'AiPBX natives Android (Kotlin) & iOS (Swift) Softphone: WebRTC Opus Audio/Video, FCM/APNs Push, In-Dialer-Chat, G.729 und Turnkey App-Installation.',
            'keywords' => 'AiPBX mobiles Softphone, Android VoIP App, iOS Softphone, WebRTC mobil, FCM Push-Benachrichtigung, PJSIP Android, Enterprise Softphone',
        ],
        'az' => [
            'title'    => 'Mobil Softphone — Android & iOS Tətbiqi | AiPBX',
            'desc'     => 'AiPBX native Android (Kotlin) və iOS (Swift) softphone: WebRTC Opus səs/video, FCM/APNs push, daxili söhbət, G.729 və Turnkey App quraşdırması.',
            'keywords' => 'AiPBX mobil softphone, Android VoIP tətbiqi, iOS softphone, WebRTC mobile, FCM push bildirişi, PJSIP Android, korporativ softphone',
        ],
        'slug' => '/mobile-apps',
    ],
    'android' => [
        'tr' => [
            'title'    => 'Android Google Play Kapalı Test & Erken Erişim | AiPBX',
            'desc'     => 'AiPBX Android kurumsal softphone uygulamasının Google Play kapalı test (Closed Testing) sürecine katılın. Google Grubu veya kayıt formuyla hemen erişim sağlayın.',
            'keywords' => 'AiPBX Android, Google Play kapalı test, closed testing track, AiPBX tester kayıt, Android PBX erken erişim',
        ],
        'en' => [
            'title'    => 'Android Google Play Closed Testing & Early Access | AiPBX',
            'desc'     => 'Join the Google Play closed testing track for AiPBX Android enterprise softphone. Get instant access via Google Group or tester registration form.',
            'keywords' => 'AiPBX Android, Google Play closed testing, closed track, AiPBX tester signup, Android PBX early access',
        ],
        'de' => [
            'title'    => 'Android Google Play Closed-Testing & Vorabzugang | AiPBX',
            'desc'     => 'Nehmen Sie am Google Play Closed Testing für das AiPBX Android Enterprise-Softphone teil. Sofortiger Zugang über Google Group oder Registrierungsformular.',
            'keywords' => 'AiPBX Android, Google Play Closed-Testing, Closed Track, AiPBX Tester Anmeldung, Android PBX Vorabzugang',
        ],
        'az' => [
            'title'    => 'Android Google Play Qapalı Test & Erkən Giriş | AiPBX',
            'desc'     => 'AiPBX Android korporativ softphone tətbiqinin Google Play qapalı test (Closed Testing) prosesinə qoşulun. Google Qrupu və ya qeydiyyat forması ilə dərhal giriş əldə edin.',
            'keywords' => 'AiPBX Android, Google Play qapalı test, closed testing track, AiPBX tester qeydiyyat, Android PBX erkən giriş',
        ],
        'slug' => '/android',
    ],
    'msteams' => [
        'tr' => [
            'title'    => 'Microsoft Teams Direct Routing & SBC Entegrasyonu | AiPBX',
            'desc'     => 'AiPBX MS Teams Direct Routing: SIP TLS 5061, DigiCert/Baltimore CA, New-CsOnlinePSTNGateway PowerShell, PJSIP trunk ve Asterisk REFER transfer desteği.',
            'keywords' => 'AiPBX Microsoft Teams, Direct Routing SBC, SIP TLS Teams, CsOnlinePSTNGateway, Asterisk Teams entegrasyonu, kurumsal Teams sesli arama',
        ],
        'en' => [
            'title'    => 'Microsoft Teams Direct Routing & SBC Integration | AiPBX',
            'desc'     => 'AiPBX MS Teams Direct Routing: SIP TLS 5061, DigiCert/Baltimore CA, New-CsOnlinePSTNGateway PowerShell, PJSIP trunk and Asterisk REFER transfer support.',
            'keywords' => 'AiPBX Microsoft Teams, Direct Routing SBC, SIP TLS Teams, CsOnlinePSTNGateway, Asterisk Teams integration, enterprise Teams voice',
        ],
        'de' => [
            'title'    => 'Microsoft Teams Direct Routing & SBC-Integration | AiPBX',
            'desc'     => 'AiPBX MS Teams Direct Routing: SIP TLS 5061, DigiCert/Baltimore CA, New-CsOnlinePSTNGateway PowerShell, PJSIP Trunk und Asterisk REFER Transfer.',
            'keywords' => 'AiPBX Microsoft Teams, Direct Routing SBC, SIP TLS Teams, CsOnlinePSTNGateway, Asterisk Teams Integration, Enterprise Teams Sprachanrufe',
        ],
        'az' => [
            'title'    => 'Microsoft Teams Direct Routing & SBC İnteqrasiyası | AiPBX',
            'desc'     => 'AiPBX MS Teams Direct Routing: SIP TLS 5061, DigiCert/Baltimore CA, New-CsOnlinePSTNGateway PowerShell, PJSIP trunk və Asterisk REFER ötürmə dəstəyi.',
            'keywords' => 'AiPBX Microsoft Teams, Direct Routing SBC, SIP TLS Teams, CsOnlinePSTNGateway, Asterisk Teams inteqrasiyası, korporativ Teams səsli zəng',
        ],
        'slug' => '/msteams',
    ],
    'security' => [
        'tr' => [
            'title'    => 'Güvenlik & SBC Koruması — FIDO2 Passkey, TLS 1.3, SRTP | AiPBX',
            'desc'     => 'AiPBX güvenlik katmanı: FIDO2/WebAuthn Passkey, Google OAuth 2.0, TLS 1.3, SRTP AES_CM_128, Fail2ban SIP koruması ve Session Border Controller.',
            'keywords' => 'AiPBX güvenlik, FIDO2 passkey, WebAuthn VoIP, TLS 1.3 SIP, SRTP şifreleme, Fail2ban Asterisk, SBC koruması, VoIP güvenlik',
        ],
        'en' => [
            'title'    => 'Security & SBC Protection — FIDO2 Passkey, TLS 1.3, SRTP | AiPBX',
            'desc'     => 'AiPBX security layer: FIDO2/WebAuthn Passkeys, Google OAuth 2.0, TLS 1.3, SRTP AES_CM_128, Fail2ban SIP protection and Session Border Controller.',
            'keywords' => 'AiPBX security, FIDO2 passkey, WebAuthn VoIP, TLS 1.3 SIP, SRTP encryption, Fail2ban Asterisk, SBC protection, VoIP security',
        ],
        'de' => [
            'title'    => 'Sicherheit & SBC-Schutz — FIDO2 Passkey, TLS 1.3, SRTP | AiPBX',
            'desc'     => 'AiPBX Sicherheitsschicht: FIDO2/WebAuthn Passkeys, Google OAuth 2.0, TLS 1.3, SRTP AES_CM_128, Fail2ban SIP-Schutz und Session Border Controller.',
            'keywords' => 'AiPBX Sicherheit, FIDO2 Passkey, WebAuthn VoIP, TLS 1.3 SIP, SRTP Verschlüsselung, Fail2ban Asterisk, SBC Schutz, VoIP Sicherheit',
        ],
        'az' => [
            'title'    => 'Təhlükəsizlik & SBC Müdafiəsi — FIDO2 Passkey, TLS 1.3, SRTP | AiPBX',
            'desc'     => 'AiPBX təhlükəsizlik qatı: FIDO2/WebAuthn Passkey, Google OAuth 2.0, TLS 1.3, SRTP AES_CM_128, Fail2ban SIP müdafiəsi və Session Border Controller.',
            'keywords' => 'AiPBX təhlükəsizlik, FIDO2 passkey, WebAuthn VoIP, TLS 1.3 SIP, SRTP şifrələmə, Fail2ban Asterisk, SBC müdafiəsi, VoIP təhlükəsizliyi',
        ],
        'slug' => '/security',
    ],
    'api-docs' => [
        'tr' => [
            'title'    => 'REST API & WebSocket Dokümantasyonu | AiPBX Geliştirici Kılavuzu',
            'desc'     => 'AiPBX REST API ve WebSocket kılavuzu: JWT kimlik doğrulama, dahili yönetimi, gerçek zamanlı olaylar ve CTI entegrasyonu için geliştirici referansı.',
            'keywords' => 'AiPBX API, REST API PBX, WebSocket VoIP, JWT kimlik doğrulama santral, CTI entegrasyonu, Asterisk API, VoIP geliştirici kılavuzu',
        ],
        'en' => [
            'title'    => 'REST API & WebSocket Documentation | AiPBX Developer Guide',
            'desc'     => 'AiPBX REST API & WebSocket integration guide: JWT authentication, extension management, real-time events, CTI integration and softphone developer reference.',
            'keywords' => 'AiPBX API, REST API PBX, WebSocket VoIP, JWT authentication PBX, CTI integration, Asterisk API, VoIP developer guide',
        ],
        'de' => [
            'title'    => 'REST API & WebSocket Dokumentation | AiPBX Entwicklerhandbuch',
            'desc'     => 'AiPBX REST-API & WebSocket-Leitfaden: JWT-Authentifizierung, Nebenstellenverwaltung, Echtzeit-Events und CTI-Integration für Entwickler.',
            'keywords' => 'AiPBX API, REST API TK-Anlage, WebSocket VoIP, JWT Authentifizierung, CTI Integration, Asterisk API, VoIP Entwicklerhandbuch',
        ],
        'az' => [
            'title'    => 'REST API & WebSocket Sənədləri | AiPBX Tərtibatçı Bələdçisi',
            'desc'     => 'AiPBX REST API və WebSocket bələdçisi: JWT kimlik təsdiqi, daxili nömrə idarəetməsi, real vaxt hadisələri və CTI inteqrasiyası üçün tərtibatçı arayışı.',
            'keywords' => 'AiPBX API, REST API PBX, WebSocket VoIP, JWT kimlik təsdiqi santral, CTI inteqrasiyası, Asterisk API, VoIP tərtibatçı bələdçisi',
        ],
        'slug' => '/api-docs',
    ],
    'installation' => [
        'tr' => [
            'title'    => 'Kurulum Kılavuzu — Ubuntu 26.04 LTS | AiPBX',
            'desc'     => 'AiPBX tek komutla kurulur: Ubuntu 26.04 LTS üzerinde Asterisk 22, MariaDB, WebRTC, coturn, Let\'s Encrypt TLS ve Go sohbet servisi otomatik kurulur.',
            'keywords' => 'AiPBX kurulum, Ubuntu 26.04 Asterisk kurulum, Turnkey PBX installer, Asterisk 22 kurulum, IP santral kurulumu, tek satır PBX',
        ],
        'en' => [
            'title'    => 'Installation Guide — Ubuntu 26.04 LTS | AiPBX',
            'desc'     => 'Install AiPBX with one command on Ubuntu 26.04 LTS: Asterisk 22, MariaDB, WebRTC, coturn, Let\'s Encrypt TLS and the Go chat service are set up for you.',
            'keywords' => 'AiPBX installation, Ubuntu 26.04 Asterisk install, Turnkey PBX installer, Asterisk 22 setup, IP PBX installation, one-liner PBX',
        ],
        'de' => [
            'title'    => 'Installationsanleitung — Ubuntu 26.04 LTS | AiPBX',
            'desc'     => 'AiPBX mit einem Befehl auf Ubuntu 26.04 LTS installieren: Asterisk 22, MariaDB, WebRTC, coturn, Let\'s-Encrypt-TLS und Go-Chat werden automatisch eingerichtet.',
            'keywords' => 'AiPBX Installation, Ubuntu 26.04 Asterisk installieren, Turnkey TK-Anlage Installer, Asterisk 22 Setup, IP TK-Anlage Installation',
        ],
        'az' => [
            'title'    => 'Quraşdırma Bələdçisi — Ubuntu 26.04 LTS | AiPBX',
            'desc'     => 'AiPBX tək əmrlə quraşdırılır: Ubuntu 26.04 LTS üzərində Asterisk 22, MariaDB, WebRTC, coturn, Let\'s Encrypt TLS və Go söhbət xidməti avtomatik quraşdırılır.',
            'keywords' => 'AiPBX quraşdırma, Ubuntu 26.04 Asterisk quraşdırması, Turnkey PBX installer, Asterisk 22 quraşdırması, IP santral quraşdırması, bir sətirlik PBX',
        ],
        'slug' => '/installation',
    ],
    'tables' => [
        'tr' => [
            'title'    => 'Karşılaştırma & Teknik Tablolar — Özellik Matrisi | AiPBX',
            'desc'     => 'AiPBX özellik karşılaştırma tabloları: Codec desteği (G.711, G.729, Opus, H.264), yıldız kodları (*97, *22, *90), Asterisk modülleri ve güvenlik protokolleri.',
            'keywords' => 'AiPBX karşılaştırma tablosu, IP santral özellik matrisi, Asterisk codec listesi, VoIP yıldız kodları, Asterisk modülleri, PBX protokol desteği',
        ],
        'en' => [
            'title'    => 'Comparison & Technical Specs — Feature Matrix | AiPBX',
            'desc'     => 'AiPBX feature comparison tables: Codec support (G.711, G.729, Opus, H.264), star codes (*97, *22, *90), Asterisk modules and security protocols.',
            'keywords' => 'AiPBX comparison table, IP PBX feature matrix, Asterisk codec list, VoIP star codes, Asterisk modules, PBX protocol support',
        ],
        'de' => [
            'title'    => 'Vergleich & Technische Spezifikationen — Funktionsmatrix | AiPBX',
            'desc'     => 'AiPBX Funktionsvergleichstabellen: Codec-Unterstützung (G.711, G.729, Opus, H.264), Sternbefehle (*97, *22, *90), Asterisk-Module und Sicherheitsprotokolle.',
            'keywords' => 'AiPBX Vergleichstabelle, IP TK-Anlage Funktionsmatrix, Asterisk Codec-Liste, VoIP Sternbefehle, Asterisk Module, TK-Anlage Protokollunterstützung',
        ],
        'az' => [
            'title'    => 'Müqayisə & Texniki Cədvəllər — Xüsusiyyət Matrisi | AiPBX',
            'desc'     => 'AiPBX xüsusiyyət müqayisə cədvəlləri: kodek dəstəyi (G.711, G.729, Opus, H.264), ulduz kodları (*97, *22, *90), Asterisk modulları və təhlükəsizlik protokolları.',
            'keywords' => 'AiPBX müqayisə cədvəli, IP santral xüsusiyyət matrisi, Asterisk kodek siyahısı, VoIP ulduz kodları, Asterisk modulları, PBX protokol dəstəyi',
        ],
        'slug' => '/tables',
    ],
];

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
$version       = $company['version'] ?? '1.0.0';

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
