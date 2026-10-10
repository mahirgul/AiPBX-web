<?php
/**
 * AiPBX.bid — Comprehensive Telephony Feature Suite
 * Deep technical documentation of all 20 modules, IVR, ALPN, Teams SBC, and Star Codes.
 */
$page = 'features';
require_once __DIR__ . '/includes/data.php';

// In-page module navigation (sidebar + "On this page"), one label per language
$moduleNav = [
    ['extensions', 'Dahili Hat Yönetimi', 'Extension Management', 'Nebenstellenverwaltung', 'Daxili Nömrə İdarəetməsi'],
    ['ivr', 'Çok Seviyeli IVR', 'Multi-Level IVR', 'Mehrstufiges IVR', 'Çoxsəviyyəli IVR'],
    ['routing', 'Çağrı Yönlendirme (Routing)', 'Call Routing', 'Anrufweiterleitung (Routing)', 'Zəng Marşrutlaşdırması (Routing)'],
    ['webrtc', 'WebRTC Softphone', 'WebRTC Softphone', 'WebRTC-Softphone', 'WebRTC Softphone'],
    ['fax', 'Dijital Faks (T.38)', 'Digital Fax', 'Digitales Fax (T.38)', 'Rəqəmsal Faks (T.38)'],
    ['feature-codes', 'Yıldız Kodları (* Kodları)', 'Feature Codes (* Codes)', 'Sterncodes (*-Codes)', 'Ulduz Kodları (* Kodları)'],
    ['passkey', 'Biyometrik Passkey (FIDO2)', 'Biometric Passkeys', 'Biometrische Passkeys (FIDO2)', 'Biometrik Passkey (FIDO2)'],
    ['oauth', 'Google OAuth 2.0 Giriş', 'Google OAuth 2.0', 'Google OAuth 2.0 Login', 'Google OAuth 2.0 Giriş'],
    ['go-chat', 'Go WebSocket Sohbet', 'Go Real-Time Chat', 'Go-Echtzeit-Chat', 'Go WebSocket Söhbət'],
    ['call-barring', 'Arama Yetkilendirme', 'Call Barring', 'Wählberechtigungen', 'Zəng Səlahiyyətləri'],
    ['alpn', 'Port 443 ALPN Çoklama', 'Port 443 ALPN Stream', 'Port 443 ALPN-Multiplexing', 'Port 443 ALPN Multipleksləşdirmə'],
    ['in-dialer-chat', 'Dahili Dialer İçi Sohbet', 'In-Dialer Chat Room', 'In-Dialer-Chat', 'Dialer Daxili Söhbət'],
    ['call-journey', 'Görsel CDR LinkedID Çizelgesi', 'Visual CDR LinkedID', 'Visuelles CDR (LinkedID)', 'Vizual CDR LinkedID Qrafiki'],
    ['boss-secretary', 'Sekreter-Yönetici &amp; VIP', 'Boss-Secretary &amp; VIP', 'Chef-Sekretär &amp; VIP', 'Katib-Rəhbər &amp; VIP'],
    ['confbridge', 'Sesli Konferans', 'Voice Conferences', 'Sprachkonferenzen', 'Səsli Konfrans'],
    ['voicemail', 'Sesli Posta MP3 (*97)', 'Voicemail MP3 (*97)', 'Voicemail MP3 (*97)', 'Səsli Poçt MP3 (*97)'],
    ['spy-whisper', 'Süpervizör Dinleme (*90-92)', 'Supervisor Spy (*90-92)', 'Supervisor Mithören (*90-92)', 'Supervayzer Dinləməsi (*90-92)'],
    ['ring-groups', 'Çalma Grupları (Ring Groups)', 'Ring Groups', 'Rufgruppen (Ring Groups)', 'Çalma Qrupları (Ring Groups)'],
    ['transit-routing', 'Transit Hat Yönlendirme', 'Transit Routing', 'Transit-Routing', 'Tranzit Xətt Marşrutlaşdırması'],
    ['msteams', 'MS Teams Direct Routing SBC', 'MS Teams Direct Routing', 'MS Teams Direct Routing', 'MS Teams Direct Routing SBC'],
    ['cloud-tts', 'Bulut TTS (Metinden Sese)', 'Cloud TTS (Text to Speech)', 'Cloud-TTS (Text zu Sprache)', 'Bulud TTS (Mətndən Səsə)'],
    ['ai-apps', 'Yapay Zekâ Sesli İstekler (AI IVR)', 'AI Voice Requests (AI IVR)', 'KI-Sprachanfragen (Voice Requests)', 'Süni İntellekt Səsli İstəklər'],
];
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($LANG) ?>" data-lang="<?= htmlspecialchars($LANG) ?>">
<head>
    <?php include __DIR__ . '/includes/head.php'; ?>
    <?php include __DIR__ . '/includes/seo-helper.php'; ?>
</head>


<body>
    <!-- Top Announcement Banner & Main Navigation Bar -->
    <?php include __DIR__ . '/includes/navbar.php'; ?>

    <div class="docs-layout">
        <!-- Left Sidebar Navigation -->
        <aside class="docs-sidebar">
            <div class="sidebar-search">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="text" id="sidebarSearch" placeholder="<?= e(['tr' => 'Dokümantasyonda ara...', 'en' => 'Search the docs...', 'de' => 'Dokumentation durchsuchen...', 'az' => 'Sənədlərdə axtar...'][$LANG]) ?>">
            </div>

            <div class="sidebar-group">
                <div class="sidebar-title">
                    <span data-lang="tr">Platform &amp; Mimari</span>
                    <span data-lang="en">Platform &amp; Architecture</span>
                    <span data-lang="de">Plattform &amp; Architektur</span><span data-lang="az">Platforma &amp; Arxitektura</span>
                </div>
                <ul class="sidebar-menu">
                    <li><a href="/"><span data-lang="tr">🏠 Genel Bakış (Home)</span><span data-lang="en">🏠 Overview (Home)</span><span data-lang="de">🏠 Übersicht (Home)</span><span data-lang="az">🏠 Ümumi Baxış (Home)</span></a></li>
                    <li><a href="/features" class="active"><span data-lang="tr">⚡ 20 Santral Modülü</span><span data-lang="en">⚡ 20 PBX Modules</span><span data-lang="de">⚡ 20 PBX-Module</span><span data-lang="az">⚡ 20 Santral Modulu</span></a></li>
                    <li><a href="/tables"><span data-lang="tr">📊 Karşılaştırma &amp; Tablolar</span><span data-lang="en">📊 Tables &amp; Specs</span><span data-lang="de">📊 Tabellen &amp; Matrix</span><span data-lang="az">📊 Müqayisə &amp; Cədvəllər</span></a></li>
                    <li><a href="/architecture"><span data-lang="tr">🏗️ Sistem Mimarisi &amp; ALPN</span><span data-lang="en">🏗️ Architecture &amp; ALPN</span><span data-lang="de">🏗️ Architektur &amp; ALPN</span><span data-lang="az">🏗️ Sistem Arxitekturası &amp; ALPN</span></a></li>
                </ul>
            </div>

            <div class="sidebar-group">
                <div class="sidebar-title">
                    <span data-lang="tr">20 Temel Modül Listesi</span>
                    <span data-lang="en">20 Flagship Modules</span>
                    <span data-lang="de">20 Kernmodule</span><span data-lang="az">20 Əsas Modulun Siyahısı</span>
                </div>
                <ul class="sidebar-menu">
                    <?php foreach ($moduleNav as $i => [$anchor, $tr, $en, $de, $az]): ?>
                        <li><a href="#<?= $anchor ?>"><?= $i + 1 ?>. <?= t($tr, $en, $de, az: $az) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="sidebar-group">
                <div class="sidebar-title">
                    <span data-lang="tr">Uygulamalar &amp; Dokümanlar</span>
                    <span data-lang="en">Apps &amp; Guides</span>
                    <span data-lang="de">Apps &amp; Anleitungen</span><span data-lang="az">Tətbiqlər &amp; Sənədlər</span>
                </div>
                <ul class="sidebar-menu">
                    <li><a href="/mobile-apps"><span data-lang="tr">📱 Mobil Softphone (Android/iOS)</span><span data-lang="en">📱 Mobile Softphone</span><span data-lang="de">📱 Mobil-Softphone</span><span data-lang="az">📱 Mobil Softphone (Android/iOS)</span></a></li>
                    <li><a href="/callcenter"><span data-lang="tr">🎧 Çağrı Merkezi &amp; Mola (*22)</span><span data-lang="en">🎧 Call Center &amp; Breaks</span><span data-lang="de">🎧 Callcenter &amp; Pausen</span><span data-lang="az">🎧 Çağrı Mərkəzi &amp; Fasilə (*22)</span></a></li>
                    <li><a href="/installation"><span data-lang="tr">⚙️ Kurulum &amp; Yapılandırma</span><span data-lang="en">⚙️ Installation Guide</span><span data-lang="de">⚙️ Installationsanleitung</span><span data-lang="az">⚙️ Quraşdırma &amp; Konfiqurasiya</span></a></li>
                    <li><a href="/security"><span data-lang="tr">🛡️ Güvenlik &amp; CCIS Gateway</span><span data-lang="en">🛡️ Security &amp; CCIS</span><span data-lang="de">🛡️ Sicherheit &amp; CCIS</span><span data-lang="az">🛡️ Təhlükəsizlik &amp; CCIS Gateway</span></a></li>
                    <li><a href="/msteams"><span data-lang="tr">🔷 Microsoft Teams Entegrasyonu</span><span data-lang="en">🔷 Microsoft Teams Integration</span><span data-lang="de">🔷 Microsoft Teams</span><span data-lang="az">🔷 Microsoft Teams İnteqrasiyası</span></a></li>
                    <li><a href="/api-docs"><span data-lang="tr">💻 REST API &amp; WebSocket</span><span data-lang="en">💻 REST API &amp; WebSocket</span><span data-lang="de">💻 REST-API &amp; WebSocket</span><span data-lang="az">💻 REST API &amp; WebSocket</span></a></li>
                </ul>
            </div>
        </aside>

        <!-- Main Documentation Content -->
        <main class="docs-content">
            <div class="docs-header">
                <div class="breadcrumb">
                    <a href="/">AiPBX</a>
                    <span>/</span>
                    <span data-lang="tr">Özellikler</span>
                    <span data-lang="en">Features</span>
                    <span data-lang="de">Funktionen</span><span data-lang="az">Xüsusiyyətlər</span>
                </div>

                <h1 class="docs-title">
                    <span data-lang="tr">Santral Özellikleri &amp; Çekirdek Modüller</span>
                    <span data-lang="en">Enterprise PBX Features &amp; Core Modules</span>
                    <span data-lang="de">Enterprise PBX-Funktionen &amp; Kernmodule</span><span data-lang="az">Santral Xüsusiyyətləri &amp; Əsas Modullar</span>
                </h1>

                <p class="lead" data-lang="tr">
                    AiPBX; kısıtlayıcı güvenlik duvarlarını aşan Port 443 ALPN stream çoklama, biyometrik Passkey kimlik doğrulaması, Asterisk 22 çekirdeği, dahili dialer içi anlık mesajlaşma ve Microsoft Teams Direct Routing desteğiyle modern işletmelerin tüm telekomünikasyon ihtiyaçlarını tek çatı altında çözer.
                </p>
                <p class="lead" data-lang="en">
                    AiPBX unites Port 443 ALPN stream multiplexing, FIDO2/WebAuthn biometric passkeys, Asterisk 22 core, integrated in-dialer chat, and turnkey Microsoft Teams Direct Routing into a sovereign, high-concurrency communications platform.
                </p>
                <p class="lead" data-lang="de">
                    AiPBX bündelt Port 443 ALPN-Multiplexing, biometrische Passkeys, Asterisk 22, In-Dialer Chat und Microsoft Teams Direct Routing in einer souveränen, hochskalierbaren Enterprise-Telefonanlage.
                </p><p class="lead" data-lang="az">AiPBX məhdudlaşdırıcı təhlükəsizlik divarlarını aşan Port 443 ALPN stream multipleksləşdirmə, biometrik Passkey kimlik təsdiqi, Asterisk 22 nüvəsi, yığım ekranı daxilində ani mesajlaşma və Microsoft Teams Direct Routing dəstəyi ilə müasir müəssisələrin bütün telekommunikasiya ehtiyaclarını bir çatı altında həll edir.</p>
            </div>

            <section class="docs-section" id="extensions">
                <h2>
                    <span data-lang="tr">1. Dahili (Extension) Yönetimi</span>
                    <span data-lang="en">1. Extension Management</span>
                    <span data-lang="de">1. Nebenstellen-Verwaltung</span><span data-lang="az">1. Daxili Nömrə (Extension) İdarəetməsi</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        AiPBX dahili sistemi, Asterisk 22 PJSIP yığını üzerine kuruludur. Kullanıcılar ister masalarındaki donanımsal IP telefondan, ister tarayıcı üzerinden, ister mobil cihazlarından aynı dahili numarasıyla görüşme yapabilirler:
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        AiPBX extensions are powered by Asterisk 22 PJSIP. Users can place and receive calls using their single extension number across physical desk phones, web browsers, and native mobile apps:
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        AiPBX-Nebenstellen basieren auf Asterisk 22 PJSIP. Benutzer können unter ihrer einheitlichen Durchwahl über Tischtelefone, Web-Browser und native Mobil-Apps telefonieren:
                    </p>
                </div><div data-lang="az"><p>AiPBX daxili nömrə sistemi Asterisk 22 PJSIP steki üzərində qurulub. İstifadəçilər istər masadakı aparat IP telefondan, istər brauzerdən, istərsə də mobil cihazlarından eyni daxili nömrə ilə danışa bilərlər:</p></div>

                <div class="docs-table-wrapper">
                    <table class="docs-table">
                        <thead>
                            <tr>
                                <th>
                                    <span data-lang="tr">Dahili Tipi</span>
                                    <span data-lang="en">Extension Type</span>
                                    <span data-lang="de">Nebenstellentyp</span><span data-lang="az">Daxili Nömrə Növü</span>
                                </th>
                                <th>
                                    <span data-lang="tr">Protokol &amp; Taşıyıcı</span>
                                    <span data-lang="en">Protocol &amp; Transport</span>
                                    <span data-lang="de">Protokoll &amp; Transport</span><span data-lang="az">Protokol &amp; Nəqliyyat</span>
                                </th>
                                <th>
                                    <span data-lang="tr">Kullanım Alanı</span>
                                    <span data-lang="en">Target Devices</span>
                                    <span data-lang="de">Zielgeräte</span><span data-lang="az">İstifadə Sahəsi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Hardware SIP Phone</strong></td>
                                <td>SIP / PJSIP (UDP, TCP, TLS)</td>
                                <td>Yealink, Fanvil, Grandstream, Cisco, Snom, Gigaset DECT.</td>
                            </tr>
                            <tr>
                                <td><strong>WebRTC Webphone</strong></td>
                                <td>WSS (Port 443 ALPN) + DTLS-SRTP</td>
                                <td>
                                    <span data-lang="tr">Eklentisiz Chrome, Edge, Firefox, Safari tarayıcı aramaları.</span>
                                    <span data-lang="en">Zero-plugin browser calling in Chrome, Edge, Firefox, Safari.</span>
                                    <span data-lang="de">Plugin-freies Telefonieren im Browser (Chrome, Edge, Firefox, Safari).</span><span data-lang="az">Əlavəsiz Chrome, Edge, Firefox, Safari brauzer zəngləri.</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Mobile Client</strong></td>
                                <td>WSS / TURNS + FCM / APNs Push</td>
                                <td>AiPBX Android (Kotlin) &amp; iOS (Swift) native apps.</td>
                            </tr>
                            <tr>
                                <td><strong>Digital Fax</strong></td>
                                <td>T.38 / Spooler</td>
                                <td>
                                    <span data-lang="tr">Gelen faksları PDF olarak e-postaya ileten dijital faks dahili.</span>
                                    <span data-lang="en">Digital fax extension routing inbound faxes as PDF to email.</span>
                                    <span data-lang="de">Digitale Fax-Nebenstelle zur Weiterleitung eingehender Faxe als PDF.</span><span data-lang="az">Daxil olan faksları PDF kimi e-poçta göndərən rəqəmsal faks daxili nömrəsi.</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Section 2: Çok Seviyeli IVR -->
            <section class="docs-section" id="ivr">
                <h2>
                    <span data-lang="tr">2. Çok Seviyeli Sesli Yanıt Sistemi (IVR)</span>
                    <span data-lang="en">2. Multi-Level Interactive Voice Response (IVR)</span>
                    <span data-lang="de">2. Mehrstufiges Sprachmenü (IVR)</span><span data-lang="az">2. Çoxsəviyyəli Səsli Cavab Sistemi (IVR)</span>
                </h2>
                <div data-lang="tr">
                    <ul>
                        <li><strong>Sonsuz Derinlikte Alt Menüler:</strong> Departmanlara ve dillere göre kırılan çok katmanlı ağaç yapısı.</li>
                        <li><strong>Rakam Tuşlama Zaman Aşımı (Digit Timeout):</strong> Tuşlama yapılması için tanınan bekleme süresi (1–15 saniye) hassasiyetle ayarlanabilir.</li>
                        <li><strong>Doğrudan Dahili Arama (Direct Dial):</strong> Anons çalarken dahiliyi bilen arayan doğrudan tuşlama yaparak hedefe bağlanabilir.</li>
                        <li><strong>Geçersiz Tuşlama &amp; Zaman Aşımı:</strong> Hatalı tuşlamalarda veya yanıtsızlıkta operatöre veya kuyruğa güvenli yönlendirme.</li>
                        <li><strong>Mesai &amp; Tatil Koşulları:</strong> Çalışma saatleri ve resmi tatiller için özel anonslar ve gece nöbetçi yönlendirmeleri.</li>
                    </ul>
                </div>
                <div data-lang="en">
                    <ul>
                        <li><strong>Unlimited Sub-Menus:</strong> Multi-tiered routing tree for departments, languages, and locations.</li>
                        <li><strong>Digit Timeout Parameter:</strong> Configurable wait duration (1–15 seconds) for customer DTMF input.</li>
                        <li><strong>Direct Extension Dialing:</strong> Callers who know their party's extension can dial it at any time during the prompt.</li>
                        <li><strong>Timeout &amp; Invalid Fallbacks:</strong> Safe routing to operators or voicemails on invalid input or timeout.</li>
                        <li><strong>Business Hours &amp; Holidays:</strong> Automated switching between working hours, lunch breaks, and holidays.</li>
                    </ul>
                </div>
                <div data-lang="de">
                    <ul>
                        <li><strong>Unbegrenzte Untermenüs:</strong> Mehrstufiger Verteilungsbaum nach Abteilungen, Sprachen und Standorten.</li>
                        <li><strong>Ziffern-Timeout-Parameter:</strong> Einstellbare Wartezeit (1–15 Sekunden) für DTMF-Tastatureingaben.</li>
                        <li><strong>Direkte Durchwahl:</strong> Anrufer mit bekannter Durchwahlnummer können diese jederzeit direkt eingeben.</li>
                        <li><strong>Timeout- &amp; Fehleingabe-Fallback:</strong> Zuverlässige Weiterleitung an die Zentrale bei Falscheingabe.</li>
                        <li><strong>Geschäftszeiten &amp; Feiertage:</strong> Automatische Umschaltung zwischen Tag-, Nacht- und Feiertagsmodus.</li>
                    </ul>
                </div><div data-lang="az"><ul><li><strong>Sonsuz Dərinlikdə Alt Menyular:</strong> Şöbələrə və dillərə görə bölünən çoxqatlı ağac strukturu.</li><li><strong>Rəqəm Yığma Vaxt Limiti (Digit Timeout):</strong> Yığım üçün ayrılan gözləmə müddəti (1–15 saniyə) dəqiq tənzimlənə bilər.</li><li><strong>Birbaşa Daxili Zəng (Direct Dial):</strong> Anons səslənərkən daxili nömrəni bilən zəng edən birbaşa yığaraq hədəfə qoşula bilər.</li><li><strong>Yanlış Yığım &amp; Vaxt Aşımı:</strong> Səhv yığımda və ya cavabsızlıqda operatora və ya növbəyə etibarlı yönləndirmə.</li><li><strong>İş Saatı &amp; Bayram Şərtləri:</strong> İş saatları və rəsmi bayramlar üçün xüsusi anonslar və gecə növbətçisinə yönləndirmələr.</li></ul></div>
            </section>

            <!-- Section 3: Gelen & Giden Arama Yönlendirme -->
            <section class="docs-section" id="routing">
                <h2>
                    <span data-lang="tr">3. Gelen (DID) ve Giden Arama Yönlendirme</span>
                    <span data-lang="en">3. Inbound (DID) &amp; Outbound Call Routing</span>
                    <span data-lang="de">3. Eingehendes (DID) &amp; Ausgehendes Routing</span><span data-lang="az">3. Daxil Olan (DID) və Çıxan Zəng Marşrutlaşdırması</span>
                </h2>
                <div class="docs-table-wrapper">
                    <table class="docs-table">
                        <thead>
                            <tr>
                                <th>
                                    <span data-lang="tr">Modül</span>
                                    <span data-lang="en">Routing Tier</span>
                                    <span data-lang="de">Routing-Ebene</span><span data-lang="az">Modul</span>
                                </th>
                                <th>
                                    <span data-lang="tr">Yetenekler &amp; Filtreler</span>
                                    <span data-lang="en">Capabilities &amp; Logic</span>
                                    <span data-lang="de">Funktionsumfang</span><span data-lang="az">İmkanlar &amp; Süzgəclər</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Inbound DID Routes</strong></td>
                                <td>
                                    <span data-lang="tr">Türk Telekom, Netgsm vb. dış hat numaralarını Regex ile eşler; IVR, kuyruk veya doğrudan dahiliye yönlendirir.</span>
                                    <span data-lang="en">Regex pattern matching for external telecom provider DIDs; routes to IVRs, queues, or ring groups.</span>
                                    <span data-lang="de">Regex-Musterabgleich für Telefonnummern (DIDs); leitet an IVR, Warteschlangen oder Gruppen weiter.</span><span data-lang="az">Operatorların xarici xətt nömrələrini Regex ilə uyğunlaşdırır; IVR, növbə və ya birbaşa daxili nömrəyə yönləndirir.</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Outbound Routes</strong></td>
                                <td>
                                    <span data-lang="tr">Dahili ve departman bazlı giden çağrı kuralları (Şehiriçi, GSM, Uluslararası yetki ayrımı).</span>
                                    <span data-lang="en">Department-level outbound dial rules (Local, Mobile, International permissions).</span>
                                    <span data-lang="de">Abteilungsbezogene Wahlregeln (Ortsnetz, Mobilfunk, Auslandssperren).</span><span data-lang="az">Daxili nömrə və şöbə əsaslı çıxan zəng qaydaları (şəhərdaxili, mobil, beynəlxalq icazə ayrımı).</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Trunk Failover</strong></td>
                                <td>
                                    <span data-lang="tr">Birincil hatta arıza veya kesinti olduğunda otomatik olarak 2. ve 3. yedek trunk'a geçiş yapar.</span>
                                    <span data-lang="en">Automatic failover to secondary and tertiary SIP trunks if primary trunk is unavailable.</span>
                                    <span data-lang="de">Automatischer Wechsel zu sekundären SIP-Trunks bei Leitungsstörungen.</span><span data-lang="az">Əsas xətdə nasazlıq və ya kəsinti olduqda avtomatik olaraq 2-ci və 3-cü ehtiyat trunk-a keçir.</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Section 4: WebRTC Softphone -->
            <section class="docs-section" id="webrtc">
                <h2>
                    <span data-lang="tr">4. WebRTC Tarayıcı Telefonu (Softphone)</span>
                    <span data-lang="en">4. WebRTC In-Browser Softphone</span>
                    <span data-lang="de">4. WebRTC Browser-Softphone</span><span data-lang="az">4. WebRTC Brauzer Telefonu (Softphone)</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        AiPBX web yönetim paneline gömülü WebRTC telefonu ile ek hiçbir uygulama yüklemeden doğrudan görüşme yapabilirsiniz:
                    </p>
                    <ul>
                        <li><strong>Opus HD Ses:</strong> Bant genişliği dalgalanmalarında bile yüksek kaliteli insan sesi.</li>
                        <li><strong>DTMF Tuş Takımı:</strong> Sesli yanıtlarda anında tuşlama.</li>
                        <li><strong>Gelişmiş Kontroller:</strong> Bekletme (Hold), Sessize alma (Mute), Aktarma (Blind &amp; Attended Transfer).</li>
                        <li><strong>Ses Donanımı Seçimi:</strong> Kulaklık ve mikrofon aygıtlarını tarayıcı içinden değiştirme.</li>
                    </ul>
                </div>
                <div data-lang="en">
                    <p>
                        A native WebRTC softphone is integrated directly into the web management portal:
                    </p>
                    <ul>
                        <li><strong>Opus HD Audio:</strong> Crystal-clear voice quality adapting dynamically to network conditions.</li>
                        <li><strong>DTMF Keypad:</strong> Instant in-call touch-tone dialing.</li>
                        <li><strong>Call Controls:</strong> Hold, Mute, Blind Transfer, and Attended (Warm) Transfer.</li>
                        <li><strong>Audio Device Selector:</strong> Select headset, microphone, and speakers dynamically.</li>
                    </ul>
                </div>
                <div data-lang="de">
                    <p>
                        Ein voll ausgestattetes WebRTC-Softphone ist direkt im Web-Management-Portal integriert:
                    </p>
                    <ul>
                        <li><strong>Opus HD Audio:</strong> Erstklassige Sprachqualität mit automatischer Bitraten-Anpassung.</li>
                        <li><strong>DTMF-Tastatur:</strong> Sofortige Tonwahl für Sprachmenüs.</li>
                        <li><strong>Gesprächssteuerung:</strong> Halten, Stummschalten, Weiterleiten (Direkt &amp; mit Rücksprache).</li>
                        <li><strong>Audiogeräteauswahl:</strong> Dynamische Auswahl von Headset, Mikrofon und Lautsprecher.</li>
                    </ul>
                </div><div data-lang="az"><p>AiPBX veb idarəetmə panelinə yerləşdirilmiş WebRTC telefonu ilə heç bir əlavə tətbiq quraşdırmadan birbaşa danışa bilərsiniz:</p><ul><li><strong>Opus HD Səs:</strong> Bant genişliyi dalğalanmalarında belə yüksək keyfiyyətli insan səsi.</li><li><strong>DTMF Klaviaturası:</strong> Səsli cavab menyularında dərhal yığım.</li><li><strong>Təkmil İdarəetmə:</strong> Gözlətmə (Hold), Səssizləşdirmə (Mute), Ötürmə (Blind &amp; Attended Transfer).</li><li><strong>Səs Avadanlığı Seçimi:</strong> Qulaqlıq və mikrofon cihazlarını brauzer daxilindən dəyişmək.</li></ul></div>
            </section>

            <!-- Section 5: Dijital Faks -->
            <section class="docs-section" id="fax">
                <h2>
                    <span data-lang="tr">5. Dijital Faks Sunucusu (FoIP / T.38)</span>
                    <span data-lang="en">5. Digital Fax Server (FoIP / T.38)</span>
                    <span data-lang="de">5. Digitaler Faxserver (FoIP / T.38)</span><span data-lang="az">5. Rəqəmsal Faks Serveri (FoIP / T.38)</span>
                </h2>
                <div data-lang="tr">
                    <ul>
                        <li><strong>Gelen Faks (Fax-to-Email):</strong> Gelen fakslar otomatik olarak PDF'e dönüştürülür ve e-posta adreslerine iletilir.</li>
                        <li><strong>Giden Faks (Web-to-Fax):</strong> Web panelinden PDF yüklenip numara girilerek otomatik gönderim sağlanır.</li>
                    </ul>
                </div>
                <div data-lang="en">
                    <ul>
                        <li><strong>Inbound Fax (Fax-to-Email):</strong> Incoming T.38 faxes are digitized into PDF documents and delivered via email.</li>
                        <li><strong>Outbound Fax (Web-to-Fax):</strong> Upload PDF documents via web dashboard; Asterisk spools and transmits with delivery receipts.</li>
                    </ul>
                </div>
                <div data-lang="de">
                    <ul>
                        <li><strong>Eingehendes Fax (Fax-to-Email):</strong> Eingehende T.38-Faxe werden als PDF digitalisiert und per E-Mail zugestellt.</li>
                        <li><strong>Ausgehendes Fax (Web-to-Fax):</strong> PDF-Upload im Web-Dashboard zum automatischen Faxversand mit Sendeprotokoll.</li>
                    </ul>
                </div><div data-lang="az"><ul><li><strong>Daxil Olan Faks (Fax-to-Email):</strong> Daxil olan fakslar avtomatik olaraq PDF-ə çevrilir və e-poçt ünvanlarına göndərilir.</li><li><strong>Çıxan Faks (Web-to-Fax):</strong> Veb paneldən PDF yükləyib nömrə daxil etməklə avtomatik göndərmə təmin olunur.</li></ul></div>
            </section>

            <!-- Section 6: Yıldız Kodlar Tablosu -->
            <section class="docs-section" id="feature-codes">
                <h2>
                    <span data-lang="tr">6. Santral Özellik Kodları (Feature Codes / Yıldız Kodlar)</span>
                    <span data-lang="en">6. Feature Codes (Star Codes Directory)</span>
                    <span data-lang="de">6. Leistungsmerkmale (Stern-Codes)</span><span data-lang="az">6. Santral Funksiya Kodları (Feature Codes / Ulduz Kodlar)</span>
                </h2>
                <div class="docs-table-wrapper">
                    <table class="docs-table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>
                                    <span data-lang="tr">Özellik Adı</span>
                                    <span data-lang="en">Feature Name</span>
                                    <span data-lang="de">Funktion</span><span data-lang="az">Funksiyanın Adı</span>
                                </th>
                                <th>
                                    <span data-lang="tr">Roller</span>
                                    <span data-lang="en">Allowed Roles</span>
                                    <span data-lang="de">Erlaubte Rollen</span><span data-lang="az">Rollar</span>
                                </th>
                                <th>
                                    <span data-lang="tr">Açıklama</span>
                                    <span data-lang="en">Description</span>
                                    <span data-lang="de">Beschreibung</span><span data-lang="az">Təsvir</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
<?php foreach ($tables['starCodes'] ?? [] as $sc): ?>
                            <tr>
                                <td><span class="code-pill"><?= e($sc['code']) ?></span></td>
                                <td><?= t_field($sc, 'name') ?></td>
                                <td><?= t_field($sc, 'role') ?></td>
                                <td><?= t_field($sc, 'desc') ?></td>
                            </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Section 7: Biyometrik Passkey (WebAuthn / FIDO2) -->
            <section class="docs-section" id="passkey">
                <h2>
                    <span data-lang="tr">7. Biyometrik Passkey (WebAuthn / FIDO2) &amp; 2FA</span>
                    <span data-lang="en">7. Biometric Passkey (WebAuthn / FIDO2) &amp; 2FA</span>
                    <span data-lang="de">7. Biometrische Passkeys (WebAuthn / FIDO2) &amp; 2FA</span><span data-lang="az">7. Biometrik Passkey (WebAuthn / FIDO2) &amp; 2FA</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        AiPBX, kurumsal santral yönetim paneline <strong>FIDO2 / WebAuthn</strong> standardında şifresiz biyometrik oturum açma yeteneği kazandırmıştır. Bu sayede klasik şifre çalınması, kaba kuvvet (brute-force) veya oltalama (phishing) saldırıları matematiksel olarak engellenir:
                    </p>
                    <ul>
                        <li><strong>Platform Doğrulayıcılar:</strong> Apple Touch ID / Face ID, Windows Hello parmak izi/yüz tanıma, Android Biyometrik Kilit.</li>
                        <li><strong>Dolaşabilir Donanım Anahtarları:</strong> YubiKey, Google Titan ve FIDO2 sertifikalı USB/NFC güvenlik anahtarları.</li>
                        <li><strong>TOTP Çift Kademeli Savunma:</strong> Google Authenticator, Microsoft Authenticator ve 1Password ile 6 haneli zaman damgalı tek kullanımlık kodlar.</li>
                    </ul>
                </div>
                <div data-lang="en">
                    <p>
                        AiPBX provides phishing-resistant, passwordless authentication governed by the <strong>FIDO2 / WebAuthn</strong> W3C standard. Credential stuffing and brute-force attacks are rendered cryptographically impossible:
                    </p>
                    <ul>
                        <li><strong>Platform Authenticators:</strong> Apple Touch ID / Face ID, Windows Hello biometric sensor, Android Fingerprint/Face unlock.</li>
                        <li><strong>Roaming Security Keys:</strong> YubiKey, Google Titan, and standard FIDO2 USB/NFC hardware tokens.</li>
                        <li><strong>TOTP Two-Factor Backup:</strong> Time-based one-time password fallback via Google Authenticator, Microsoft Authenticator, or Bitwarden.</li>
                    </ul>
                </div>
                <div data-lang="de">
                    <p>
                        AiPBX bietet passwortlose, phishing-resistente Authentifizierung nach dem <strong>FIDO2 / WebAuthn</strong>-Standard für das Webportal und Mobilgeräte:
                    </p>
                    <ul>
                        <li><strong>Plattform-Authentifikatoren:</strong> Apple Touch ID / Face ID, Windows Hello und Android-Biometrie.</li>
                        <li><strong>Hardware-Sicherheitsschlüssel:</strong> YubiKey, Google Titan und standardisierte FIDO2 USB/NFC-Tokens.</li>
                        <li><strong>TOTP Zwei-Faktor-Absicherung:</strong> Zeitbasierte 6-stellige Einmalcodes über Authenticator-Apps.</li>
                    </ul>
                </div><div data-lang="az"><p>AiPBX korporativ santral idarəetmə panelinə <strong>FIDO2 / WebAuthn</strong> standartında parolsuz biometrik giriş imkanı qazandırıb. Bu sayədə klassik parol oğurluğu, kobud güc (brute-force) və ya fişinq (phishing) hücumları riyazi olaraq qarşısı alınır:</p><ul><li><strong>Platforma Doğrulayıcıları:</strong> Apple Touch ID / Face ID, Windows Hello barmaq izi/üz tanıma, Android Biometrik Kilid.</li><li><strong>Daşına Bilən Aparat Açarları:</strong> YubiKey, Google Titan və FIDO2 sertifikatlı USB/NFC təhlükəsizlik açarları.</li><li><strong>TOTP İkipilləli Müdafiə:</strong> Google Authenticator, Microsoft Authenticator və 1Password ilə 6 rəqəmli, zaman möhürlü birdəfəlik kodlar.</li></ul></div>
            </section>

            <!-- Section 8: Google OAuth 2.0 -->
            <section class="docs-section" id="oauth">
                <h2>
                    <span data-lang="tr">8. Google OAuth 2.0 Tek Tıkla Kurumsal Giriş</span>
                    <span data-lang="en">8. Google OAuth 2.0 Enterprise Single Sign-On</span>
                    <span data-lang="de">8. Google OAuth 2.0 Enterprise Single Sign-On</span><span data-lang="az">8. Google OAuth 2.0 ilə Bir Kliklə Korporativ Giriş</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        Google Workspace kullanan kurumlar için personellerin tek tek şifre ezberlemesine gerek kalmaz. Dahili üzerinde tanımlı kurumsal e-posta adresi (@sirket.com) Google hesabıyla eşleştiği anda Web Portal, Android ve iOS softphone istemcilerinde tek tıkla oturum açılabilir.
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        Organizations utilizing Google Workspace can authenticate seamlessly. Whenever an extension's assigned email address matches an active corporate Google account, users log into the Web Portal and mobile apps with a single click.
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        Für Unternehmen mit Google Workspace entfällt das Verwalten separater SIP-Passwörter. Stimmt die Nebenstellen-E-Mail mit dem Firmen-Google-Konto überein, genügt ein Klick zum Login im Webportal sowie in Mobil-Apps.
                    </p>
                </div><div data-lang="az"><p>Google Workspace istifadə edən təşkilatlarda əməkdaşların ayrı-ayrı parol əzbərləməsinə ehtiyac qalmır. Daxili nömrədə müəyyən edilmiş korporativ e-poçt ünvanı (@sirket.az) Google hesabı ilə uyğunlaşdığı anda Veb Portalda, Android və iOS softphone müştərilərində bir kliklə daxil olmaq mümkündür.</p></div>
            </section>

            <!-- Section 9: Go Chat Engine -->
            <section class="docs-section" id="go-chat">
                <h2>
                    <span data-lang="tr">9. Go Anlık Sohbet &amp; Mesajlaşma Motoru (aipbx-chat)</span>
                    <span data-lang="en">9. Go WebSocket Real-Time Chat Engine (aipbx-chat)</span>
                    <span data-lang="de">9. Go WebSocket Echtzeit-Chat-Engine (aipbx-chat)</span><span data-lang="az">9. Go Ani Söhbət &amp; Mesajlaşma Mühərriki (aipbx-chat)</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        AiPBX mimarisine entegre edilen bağımsız Go mikroservisi (<code>aipbx-chat</code>), TCP Port 8086 üzerinden yüksek eşzamanlılıklı kurumsal mesajlaşma sunar:
                    </p>
                    <ul>
                        <li><strong>Goroutine Eşzamanlılığı:</strong> Minimum RAM tüketimi ile on binlerce anlık WebSocket bağlantısını yönetir.</li>
                        <li><strong>1'e 1 ve Grup Sohbetleri:</strong> Departman ve proje bazlı 256 kişiye kadar şifreli sohbet odaları.</li>
                        <li><strong>Medya &amp; Ek Dosya Desteği:</strong> Resim sıkıştırma, sesli mesaj kayıtları ve belge paylaşımı.</li>
                        <li><strong>FCM / APNs Entegrasyonu:</strong> Uygulama kapalıyken bile anında mobil uyandırma ve push bildirimi iletimi.</li>
                    </ul>
                </div>
                <div data-lang="en">
                    <p>
                        Engineered in Go, the standalone <code>aipbx-chat</code> daemon runs on TCP Port 8086 delivering high-concurrency instant messaging:
                    </p>
                    <ul>
                        <li><strong>Goroutine Scalability:</strong> Multiplexes tens of thousands of active WebSockets with lightweight memory consumption.</li>
                        <li><strong>Direct &amp; Group Channels:</strong> 1-on-1 private messaging and department group channels up to 256 users.</li>
                        <li><strong>Attachments &amp; Voice Notes:</strong> Automated client-side media compression and document transfers.</li>
                        <li><strong>FCM / APNs Delivery:</strong> Instant push wakeup when recipient apps are backgrounded or killed.</li>
                    </ul>
                </div>
                <div data-lang="de">
                    <p>
                        Der in Go geschriebene <code>aipbx-chat</code>-Dienst auf TCP Port 8086 bietet sicheres, hochskalierbares Messaging im Firmennetzwerk:
                    </p>
                    <ul>
                        <li><strong>Goroutine-Effizienz:</strong> Tausende gleichzeitige WebSocket-Verbindungen bei minimalem Arbeitsspeicher.</li>
                        <li><strong>1-zu-1 &amp; Gruppenräume:</strong> Verschlüsselte Direktnachrichten und Gruppen bis 256 Teilnehmer.</li>
                        <li><strong>Dateiversand &amp; Sprachmemos:</strong> Automatische Medienkomprimierung und Dateianhänge.</li>
                        <li><strong>Push-Integration:</strong> Zuverlässiges Wecken der Mobilgeräte über FCM und Apple APNs.</li>
                    </ul>
                </div><div data-lang="az"><p>AiPBX arxitekturasına inteqrasiya edilmiş müstəqil Go mikroxidməti (<code>aipbx-chat</code>) TCP Port 8086 üzərindən yüksək eyni vaxtlılıqlı korporativ mesajlaşma təqdim edir:</p><ul><li><strong>Goroutine Paralelliyi:</strong> Minimum RAM istehlakı ilə on minlərlə ani WebSocket bağlantısını idarə edir.</li><li><strong>Təkbətək və Qrup Söhbətləri:</strong> Şöbə və layihə əsaslı, 256 nəfərədək şifrəli söhbət otaqları.</li><li><strong>Media &amp; Əlavə Fayl Dəstəyi:</strong> Şəkil sıxılması, səsli mesaj yazıları və sənəd paylaşımı.</li><li><strong>FCM / APNs İnteqrasiyası:</strong> Tətbiq bağlı olarkən belə dərhal mobil oyatma və push bildirişinin çatdırılması.</li></ul></div>
            </section>

            <!-- Section 10: Call Barring & JSON Table CTA -->
            <section class="docs-section" id="call-barring">
                <h2>
                    <span data-lang="tr">10. Dinamik Arama Yetkilendirme (Call Barring) &amp; Karşılaştırma Matrisi</span>
                    <span data-lang="en">10. Granular Outbound Call Barring &amp; Feature Matrix</span>
                    <span data-lang="de">10. Wählberechtigungsgruppen &amp; Funktionsmatrix</span><span data-lang="az">10. Dinamik Zəng İcazələri (Call Barring) &amp; Müqayisə Matrisi</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        AiPBX, santral dahililerini 6 kademeli yetki gruplarına (Dahili, Acil, Şehir İçi, Şehirlerarası, GSM, Uluslararası) ayırarak şirket bütçesini suiistimallere karşı korur. Detaylı teknik özellikleri, ağ port haritasını ve Cisco/Avaya karşılaştırmasını görmek için interaktif JSON tablosunu inceleyin:
                    </p>
                    <p style="margin-top: 14px;">
                        <a href="/tables" class="btn-primary" style="display:inline-flex; align-items:center; gap:8px;">
                            <i class="fa-solid fa-table-list"></i>
                            <span>AiPBX İnteraktif JSON Tablo Sistemi &amp; Matrisi Aç →</span>
                        </a>
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        AiPBX enforces 6-tier outbound dialing policies to protect telecom budgets. Explore the interactive JSON table system for side-by-side matrices, network port breakdowns, and hardware sizing:
                    </p>
                    <p style="margin-top: 14px;">
                        <a href="/tables" class="btn-primary" style="display:inline-flex; align-items:center; gap:8px;">
                            <i class="fa-solid fa-table-list"></i>
                            <span>Open Full Interactive JSON Table System &amp; Matrix →</span>
                        </a>
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        AiPBX sichert Ihre Telefonie durch 6 Wählberechtigungsstufen vor Gebührenmissbrauch. Öffnen Sie unser interaktives JSON-Tabellensystem für den vollständigen Vergleich mit klassischen Anlagen:
                    </p>
                    <p style="margin-top: 14px;">
                        <a href="/tables" class="btn-primary" style="display:inline-flex; align-items:center; gap:8px;">
                            <i class="fa-solid fa-table-list"></i>
                            <span>Interaktives JSON-Tabellensystem öffnen →</span>
                        </a>
                    </p>
                </div><div data-lang="az"><p>AiPBX santral daxili nömrələrini 6 pilləli icazə qruplarına (Daxili, Təcili, Şəhərdaxili, Şəhərlərarası, Mobil, Beynəlxalq) ayıraraq şirkət büdcəsini sui-istifadəyə qarşı qoruyur. Ətraflı texniki xüsusiyyətləri, şəbəkə port xəritəsini və Cisco/Avaya müqayisəsini görmək üçün interaktiv JSON cədvəlinə baxın:</p><p style="margin-top: 14px;"><a href="/tables" class="btn-primary" style="display:inline-flex; align-items:center; gap:8px;"><i class="fa-solid fa-table-list"></i><span>AiPBX İnteraktiv JSON Cədvəl Sistemi &amp; Matrisini Aç →</span></a></p></div>
            </section>

            
            <!-- Section 11: Port 443 Nginx L4 Stream & ALPN Multiplexing -->
            <section class="docs-section" id="alpn">
                <h2>
                    <span data-lang="tr">11. Port 443 Nginx L4 Stream &amp; ALPN Protokol Çoklama</span>
                    <span data-lang="en">11. Port 443 Nginx L4 Stream &amp; ALPN Multiplexing</span>
                    <span data-lang="de">11. Port 443 Nginx L4 Stream &amp; ALPN-Multiplexing</span><span data-lang="az">11. Port 443 Nginx L4 Stream &amp; ALPN Protokol Multipleksləşdirməsi</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        Otel, hastane, havalimanı ve banka ağları gibi kısıtlayıcı ortamlarda dışa doğru çoğu zaman yalnızca TCP 443 açıktır. AiPBX'te 443'ü Nginx L4 stream modülü dinler ve <code>ssl_preread</code> ile TLS el sıkışmasındaki ALPN alanını bağlantıyı çözmeden okur. ALPN varsa (tarayıcılar ve mobil uygulamalar) trafik Apache'ye (:8443) gider; Apache web portalını sunar, <code>/ws</code> yolunu Asterisk WebRTC'ye, <code>/chat</code> yolunu Go sohbet servisine aktarır. ALPN yoksa trafik coturn TURNS'e (:5349) gider ve WebRTC medyası bu kısıtlı ağlarda da akar. Gerçek istemci IP'si PROXY protokolüyle taşınır. Masaüstü IP telefonlar, trunk'lar ve Microsoft Teams standart SIP portlarını (5060/5061) kullanır.
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        Strict enterprise firewalls and guest networks often allow nothing but outbound TCP 443. In AiPBX, Nginx's L4 stream module listens on 443 and uses <code>ssl_preread</code> to read the TLS ClientHello ALPN field without terminating TLS. With ALPN (browsers and mobile apps) traffic goes to Apache (:8443), which serves the portal and proxies <code>/ws</code> to Asterisk WebRTC and <code>/chat</code> to the Go chat service. Without ALPN it goes to coturn TURNS (:5349), so WebRTC media also flows on those networks. The real client IP is passed on with the PROXY protocol. Desk IP phones, trunks and Microsoft Teams use the standard SIP ports (5060/5061).
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        Restriktive Firmenfirewalls und Gastnetze erlauben oft nur ausgehendes TCP 443. Bei AiPBX lauscht das Nginx-L4-Stream-Modul auf 443 und liest per <code>ssl_preread</code> das ALPN-Feld des TLS-ClientHello, ohne TLS zu terminieren. Mit ALPN (Browser und Apps) geht der Verkehr an Apache (:8443), das das Portal ausliefert und <code>/ws</code> an Asterisk-WebRTC sowie <code>/chat</code> an den Go-Chatdienst weiterleitet. Ohne ALPN geht er an coturn TURNS (:5349), sodass WebRTC-Medien auch in solchen Netzen fließen. Die echte Client-IP wird per PROXY-Protokoll übergeben. IP-Tischtelefone, Trunks und Microsoft Teams nutzen die Standard-SIP-Ports (5060/5061).
                    </p>
                </div><div data-lang="az"><p>Otel, xəstəxana, hava limanı və bank şəbəkələri kimi məhdudlaşdırıcı mühitlərdə çölə doğru çox vaxt yalnız TCP 443 açıqdır. AiPBX-də 443-ü Nginx L4 stream modulu dinləyir və <code>ssl_preread</code> ilə TLS əl sıxışmasındakı ALPN sahəsini bağlantını açmadan oxuyur. ALPN varsa (brauzerlər və mobil tətbiqlər), trafik Apache-yə (:8443) gedir; Apache veb portalı təqdim edir, <code>/ws</code> yolunu Asterisk WebRTC-yə, <code>/chat</code> yolunu Go söhbət xidmətinə ötürür. ALPN yoxdursa, trafik coturn TURNS-ə (:5349) gedir və WebRTC mediası bu məhdud şəbəkələrdə də axır. Müştərinin real IP-si PROXY protokolu ilə daşınır. Masaüstü IP telefonlar, trunk-lar və Microsoft Teams standart SIP portlarından (5060/5061) istifadə edir.</p></div>

                <div class="docs-code-box">
                    <div class="docs-code-header">
                        <span>/etc/nginx/aipbx-stream.conf — <?= t('install.sh tarafından oluşturulur', 'generated by install.sh', 'von install.sh erzeugt', az: 'install.sh tərəfindən yaradılır') ?></span>
                        <button class="docs-code-copy" type="button">Copy</button>
                    </div>
                    <div class="docs-code-body">
                        <pre><code>stream {
    map $ssl_preread_alpn_protocols $aipbx_backend {
        default     127.0.0.1:8443;    # ALPN present: Apache (portal, /ws WebRTC, /chat)
        ""          127.0.0.1:15349;   # no ALPN: TURNS (via PROXY-stripping relay)
        ~stun\.turn 127.0.0.1:15349;   # RFC 7443 TURN clients
    }

    server {
        listen 443;
        listen [::]:443;
        ssl_preread on;
        proxy_pass $aipbx_backend;
        proxy_protocol on;             # real client IP for Apache / Fail2ban
        proxy_timeout 3600s;
    }

    server {
        listen 127.0.0.1:15349 proxy_protocol;
        proxy_pass 127.0.0.1:5349;     # coturn TURNS
    }
}</code></pre>
                    </div>
                </div>

                <ul class="docs-list">
                    <li>
                        <strong data-lang="tr">Sıfır Port Kirliliği:</strong>
                        <strong data-lang="en">Zero Port Sprawl:</strong>
                        <strong data-lang="de">Minimale Firewall-Regeln:</strong><strong data-lang="az">Sıfır Port Çirklənməsi:</strong>
                        <span data-lang="tr">Web, WebRTC, sohbet ve TURNS için dışarıya tek bir TCP 443 portu yeterlidir.</span>
                        <span data-lang="en">Web, WebRTC, chat and TURNS need only TCP 443 from the outside.</span>
                        <span data-lang="de">Web, WebRTC, Chat und TURNS brauchen nach außen nur TCP 443.</span><span data-lang="az">Veb, WebRTC, söhbət və TURNS üçün çölə tək bir TCP 443 portu kifayətdir.</span>
                    </li>
                    <li>
                        <strong data-lang="tr">Donanım Hızında Geçiş:</strong>
                        <strong data-lang="en">Line-Rate Throughput:</strong>
                        <strong data-lang="de">Kernel-Level TCP Forwarding:</strong><strong data-lang="az">Aparat Sürətində Keçid:</strong>
                        <span data-lang="tr">Nginx TLS'i çözmez; şifreleme Apache ve coturn'e kadar bozulmadan taşınır.</span>
                        <span data-lang="en">Nginx never decrypts TLS; encryption stays intact up to Apache and coturn.</span>
                        <span data-lang="de">Nginx entschlüsselt TLS nicht; die Verschlüsselung bleibt bis Apache und coturn intakt.</span><span data-lang="az">Nginx TLS-i açmır; şifrələmə Apache və coturn-a qədər pozulmadan daşınır.</span>
                    </li>
                </ul>
            </section>

            <!-- Section 12: In-Dialer Chat & Mobile Softphone -->
            <section class="docs-section" id="in-dialer-chat">
                <h2>
                    <span data-lang="tr">12. Dahili Dialer İçi Sohbet Odası &amp; Mobil Softphone</span>
                    <span data-lang="en">12. Integrated In-Dialer Chat &amp; Mobile Softphone</span>
                    <span data-lang="de">12. In-Dialer Chatraum &amp; Mobile Softphones</span><span data-lang="az">12. Yığım Ekranında Söhbət Otağı &amp; Mobil Softphone</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        AiPBX yerel Android (Kotlin) ve iOS (Swift) uygulamaları, arama ekranı içine yerleştirilmiş gerçek zamanlı dahili sohbet odası sunar. Kullanıcı telefon görüşmesi yaparken aynı anda arama ekranından ayrılmadan veya çağrıyı bekletmeye almadan karşı tarafa anlık metin mesajı, adres, müşteri kodu veya görsel aktarabilir. Arka planda bağımsız Go WebSocket mikroservisi çalıştığı için ses kanalında (WebRTC Opus) en ufak bir takılma veya gecikme yaşanmaz.
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        AiPBX native Android (Kotlin) and iOS (Swift) clients feature an in-dialer collaborative chatroom. While on an active voice call, agents and team members can exchange instant messages, clipboard data, customer account IDs, and photos without leaving the dialer or placing the call on hold. Powered by an isolated Go WebSocket daemon with sub-millisecond dispatch.
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        Die nativen AiPBX Mobil-Apps für Android und iOS bieten einen integrierten Chat-Tab direkt in der Wähltastatur. Während eines aktiven Gesprächs können Mitarbeiter Textnachrichten, Tickets, Links oder Fotos austauschen, ohne das Gespräch zu unterbrechen. Gestützt auf den eigenständigen Go-WebSocket-Dienst.
                    </p>
                </div><div data-lang="az"><p>AiPBX-in yerli Android (Kotlin) və iOS (Swift) tətbiqləri zəng ekranının içinə yerləşdirilmiş real vaxt daxili söhbət otağı təqdim edir. İstifadəçi telefonla danışarkən zəng ekranından çıxmadan və zəngi gözlətməyə almadan qarşı tərəfə ani mətn mesajı, ünvan, müştəri kodu və ya şəkil göndərə bilər. Arxa planda müstəqil Go WebSocket mikroxidməti işlədiyi üçün səs kanalında (WebRTC Opus) ən kiçik ilişmə və ya gecikmə olmur.</p></div>

                <div class="docs-code-box">
                    <div class="docs-code-header">
                        <span>Go WebSocket In-Dialer Chat Protocol Payload</span>
                        <button class="docs-code-copy" type="button">Copy</button>
                    </div>
                    <div class="docs-code-body">
                        <pre><code>{
  "type": "dialer_chat",
  "call_id": "c7f918bc-21a4-4e78-9e12-38d58c89b210",
  "sender_ext": "1002",
  "receiver_ext": "1005",
  "timestamp": 1727173200,
  "payload": {
    "message": "Müşterinin fatura numarası: #TR-99412. Siparişi onaylıyorum.",
    "attachments": []
  }
}</code></pre>
                    </div>
                </div>
            </section>

            <!-- Section 13: Visual CDR LinkedID Call Journey Timeline -->
            <section class="docs-section" id="call-journey">
                <h2>
                    <span data-lang="tr">13. Görsel CDR LinkedID Çağrı Yolculuğu (Call Journey Timeline)</span>
                    <span data-lang="en">13. Visual CDR LinkedID Call Journey Timeline</span>
                    <span data-lang="de">13. Visuelle CDR LinkedID Gesprächsverlauf-Zeitleiste</span><span data-lang="az">13. Vizual CDR LinkedID Zəng Səyahəti (Call Journey Timeline)</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        Geleneksel santrallerde bir arama aktarıldığında veya kuyruğa girdiğinde CDR kayıtları parçalanır ve aramanın baştan sona serüvenini takip etmek imkansızlaşır. AiPBX, Asterisk <code>LinkedID</code> mimarisi ile bir çağrının tüm bacaklarını (DID girişi, IVR menü tuşlaması, çalma grubu, transfer edilen dahili, bekletme süresi ve sonlandırma nedeni) tek bir görsel zaman çizelgesinde (Interactive Timeline) haritalandırır.
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        Legacy PBXs fragment CDR records whenever a call is transferred, parked, or queued. AiPBX groups all call segments under Asterisk's unique <code>LinkedID</code>, rendering an end-to-end interactive timeline: ingress trunk, IVR navigation, queue wait duration, agent answer, consultative transfer, and hangup cause.
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        Herkömmliche TK-Anlagen zersplittern CDR-Daten bei Weiterleitungen. AiPBX bündelt alle Anrufsegmente unter der Asterisk-<code>LinkedID</code> in einer übersichtlichen Zeitleiste: DID-Eingang, IVR-Auswahl, Warteschlangenzeit, Agentenannahme, Rückfrage und Auflegen.
                    </p>
                </div><div data-lang="az"><p>Ənənəvi santrallarda zəng ötürüldükdə və ya növbəyə daxil olduqda CDR qeydləri parçalanır və zəngin əvvəldən axıra qədər yolunu izləmək mümkünsüz olur. AiPBX Asterisk <code>LinkedID</code> arxitekturası ilə zəngin bütün hissələrini (DID girişi, IVR menyu yığımı, zəng qrupu, ötürülən daxili nömrə, gözləmə müddəti və bitmə səbəbi) bir vizual zaman şkalasında (Interactive Timeline) xəritələşdirir.</p></div>

                <div class="docs-code-box">
                    <div class="docs-code-header">
                        <span>MariaDB SQL — LinkedID Call Journey Aggregation Query</span>
                        <button class="docs-code-copy" type="button">Copy</button>
                    </div>
                    <div class="docs-code-body">
                        <pre><code>SELECT 
    c.uniqueid, c.linkedid, c.calldate, c.src, c.dst, 
    c.duration, c.billsec, c.disposition, c.lastapp, c.lastdata
FROM cdr c
WHERE c.linkedid = '1727171420.482'
ORDER BY c.calldate ASC;</code></pre>
                    </div>
                </div>
            </section>

            <!-- Section 14: Boss-Secretary Mode & VIP Whitelist -->
            <section class="docs-section" id="boss-secretary">
                <h2>
                    <span data-lang="tr">14. Sekreter-Yönetici Modu &amp; VIP Filtreleme (Screening)</span>
                    <span data-lang="en">14. Boss-Secretary Screening &amp; VIP Whitelist</span>
                    <span data-lang="de">14. Chef-Sekretärin-Schaltung &amp; VIP-Ausnahmeliste</span><span data-lang="az">14. Katib-Rəhbər Rejimi &amp; VIP Süzgəcləmə (Screening)</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        Üst düzey yöneticilerin doğrudan rahatsız edilmesini önleyen çift aşamalı çağrı filtreleme sistemi. Yönetici dahili numarasına gelen tüm aramalar otomatik olarak yetkili asistan veya sekreterin softphone'una yönlendirilir. Sekreter çağrıyı karşılayıp danışıklı aktarma (*21) ile yöneticiye iletir. Yönetici panelinden tanımlanan VIP numaralar (Yönetim Kurulu, Aile, Kritik Ortaklar) ise sekreter filtresini doğrudan atlayarak yöneticinin telefonunu doğrudan çaldırır.
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        Executive call screening intercepts all inbound calls to C-level extensions, diverting them to an authorized executive assistant. Assistants screen and bridge callers using attended transfer (*21). VIP whitelist entries (Board members, strategic clients) automatically bypass the assistant filter and ring the executive's deskphone and mobile app directly.
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        Zweistufige Anruffilterung für Führungskräfte: Eingehende Anrufe werden primär an das Vorzimmer/Sekretariat weitergeleitet. Nach Vorabprüfung vermittelt die Assistenz den Anrufer weiter. Hinterlegte VIP-Rufnummern umgehen den Filter automatisch.
                    </p>
                </div><div data-lang="az"><p>Yüksək vəzifəli rəhbərlərin birbaşa narahat edilməsinin qarşısını alan ikimərhələli zəng süzgəcləmə sistemi. Rəhbərin daxili nömrəsinə gələn bütün zənglər avtomatik olaraq səlahiyyətli assistentin və ya katibin softphone-una yönləndirilir. Katib zəngi qəbul edib məsləhətli ötürmə (*21) ilə rəhbərə çatdırır. Rəhbər panelində müəyyən edilmiş VIP nömrələr (İdarə Heyəti, Ailə, Əsas Tərəfdaşlar) isə katib süzgəcini birbaşa keçərək rəhbərin telefonunu zəng çaldırır.</p></div>

                <div class="docs-code-box">
                    <div class="docs-code-header">
                        <span>/etc/asterisk/extensions_boss_secretary.conf</span>
                        <button class="docs-code-copy" type="button">Copy</button>
                    </div>
                    <div class="docs-code-body">
                        <pre><code>[sub-boss-screening]
exten => _100[1-5],1,NoOp(Boss Secretary Screening for ${EXTEN})
 same => n,Set(IS_VIP=${DB(vip_whitelist/${CALLERID(num)})})
 same => n,GotoIf($["${IS_VIP}" = "1"]?direct_boss)
 same => n,Dial(PJSIP/2000,25,tT) ; Ring Executive Assistant
 same => n,Hangup()
 same => n(direct_boss),Dial(PJSIP/${EXTEN},30,tTkK)
 same => n,Hangup()</code></pre>
                    </div>
                </div>
            </section>

            <!-- Section 15: Dynamic Voice Conferences & Web Moderator -->
            <section class="docs-section" id="confbridge">
                <h2>
                    <span data-lang="tr">15. Dinamik Sesli Konferans Odaları &amp; Canlı Web Moderatör</span>
                    <span data-lang="en">15. Dynamic Voice Conferences &amp; Web Moderator</span>
                    <span data-lang="de">15. Dynamische Sprachkonferenzräume &amp; Web-Moderator</span><span data-lang="az">15. Dinamik Səsli Konfrans Otaqları &amp; Canlı Veb Moderator</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        Asterisk <code>app_confbridge</code> ile sesli toplantı odaları. Her odanın portalda tanımlanan bir numarası vardır; dahili veya harici kullanıcılar oda numarasını tuşlayarak PIN doğrulamasıyla konferansa katılır. Web yönetim panelindeki Canlı Moderatör ekranı üzerinden kimin konuştuğu canlı olarak izlenebilir, tek tıkla tüm katılımcılar sessize alınabilir (Mute All) veya istenmeyen numaralar odadan atılabilir (Kick).
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        Voice conference rooms powered by Asterisk <code>app_confbridge</code>. Each room has a number set in the portal; extensions and external callers dial it, enter the PIN and join. The real-time Web Moderator console displays active speaker meters, one-click global mute, and individual kick controls.
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        Sprachkonferenzräume über Asterisk <code>app_confbridge</code>. Jeder Raum hat eine im Portal festgelegte Nummer; Teilnehmer wählen sie und geben die PIN ein. Die intuitive Web-Moderatorkonsole bietet Pegelanzeigen für aktive Sprecher, globale Stummschaltung (Mute-All) und Teilnehmerverwaltung.
                    </p>
                </div><div data-lang="az"><p>Asterisk <code>app_confbridge</code> ilə səsli görüş otaqları. Hər otağın portalda müəyyən edilmiş nömrəsi var; daxili və ya xarici istifadəçilər otaq nömrəsini yığaraq PIN təsdiqi ilə konfransa qoşulur. Veb idarəetmə panelindəki Canlı Moderator ekranından kimin danışdığını canlı izləmək, bir kliklə bütün iştirakçıları səssizləşdirmək (Mute All) və ya arzuolunmaz nömrələri otaqdan çıxarmaq (Kick) mümkündür.</p></div>
            </section>

            <!-- Section 16: Advanced Voicemail-to-Email MP3 & Web Player -->
            <section class="docs-section" id="voicemail">
                <h2>
                    <span data-lang="tr">16. Gelişmiş Sesli Posta (Voicemail-to-Email MP3 &amp; Web Player *97)</span>
                    <span data-lang="en">16. Advanced Voicemail-to-Email MP3 &amp; Web Player (*97)</span>
                    <span data-lang="de">16. Voicemail-to-Email MP3 &amp; Web-Audioplayer (*97)</span><span data-lang="az">16. Təkmil Səsli Poçt (Voicemail-to-Email MP3 &amp; Web Player *97)</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        Kullanıcı meşgul, cevapsız veya çevrimdışı olduğunda arayan kişi kişiselleştirilmiş sesli mesaja yönlendirilir. Kaydedilen mesaj arka planda otomatik olarak hafif, yüksek kaliteli MP3 formatına dönüştürülür ve arayanın numarası, arama tarihi ve süresiyle birlikte personelin kurumsal e-posta adresine gönderilir. Ayrıca kullanıcılar telefonlarından <code>*97</code> tuşlayarak veya web portalındaki ses dalgası (waveform) oynatıcısından mesajlarını anında dinleyebilir.
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        When an extension is unanswered, busy, or unreachable, callers are guided to an interactive mailbox. Audio recordings are immediately encoded into compact MP3s and dispatched via SMTP with caller ID, timestamp, and duration. Extensions can inspect and play voicemails directly via <code>*97</code> IVR or the in-browser audio player.
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        Hinterlassene Sprachnachrichten werden automatisch als MP3 kodiert und inklusive Rufnummer, Datum und Gesprächsdauer per E-Mail an den Empfänger geschickt. Nebenstellen können Nachrichten über die Kurzwahl <code>*97</code> oder direkt im Web-Portal über den integrierten Waveform-Player abhören.
                    </p>
                </div><div data-lang="az"><p>İstifadəçi məşğul olduqda, cavab vermədikdə və ya oflayn olduqda zəng edən şəxs fərdiləşdirilmiş səsli mesaja yönləndirilir. Yazılan mesaj arxa planda avtomatik olaraq yüngül, yüksək keyfiyyətli MP3 formatına çevrilir və zəng edənin nömrəsi, zəngin tarixi və müddəti ilə birlikdə əməkdaşın korporativ e-poçt ünvanına göndərilir. Bundan əlavə, istifadəçilər telefonlarından <code>*97</code> yığaraq və ya veb portaldakı səs dalğası (waveform) pleyerindən mesajlarını dərhal dinləyə bilərlər.</p></div>
            </section>

            <!-- Section 17: Supervisor Call Spy, Whisper & Barge-in (*90) -->
            <section class="docs-section" id="spy-whisper">
                <h2>
                    <span data-lang="tr">17. Süpervizör Çağrı Dinleme, Fısıldama ve Müdahale (*90 / *91 / *92)</span>
                    <span data-lang="en">17. Supervisor Call Spy, Whisper &amp; Barge-in (*90 / *91 / *92)</span>
                    <span data-lang="de">17. Supervisor Mithören, Flüstern &amp; Aufschalten (*90 / *91 / *92)</span><span data-lang="az">17. Supervayzer Zəng Dinləmə, Pıçıltı və Müdaxilə (*90 / *91 / *92)</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        Süpervizör ve yönetici rolündeki kullanıcılar için 3 modlu canlı görüşme denetimi (Asterisk <code>ChanSpy</code>). Kodu tuşlayın, ardından dahili numarasını girin:
                        <br>1. <strong>Dinleme (<code>*90</code>):</strong> görüşmeyi sessizce dinler.
                        <br>2. <strong>Fısıldama (<code>*91</code>):</strong> yalnızca temsilci duyar; müşteri süpervizörü duymaz.
                        <br>3. <strong>Dahil Olma (<code>*92</code>):</strong> görüşmeye üçüncü taraf olarak katılır; iki taraf da duyar.
                        <br>Aynı işlemler çağrı merkezi panosundaki Dinle / Fısılda / Dahil Ol butonlarıyla da yapılır. Diğer roller bu kodları çevirdiğinde yalnızca bip sesi duyar.
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        Three live monitoring modes (Asterisk <code>ChanSpy</code>) for users with the supervisor or admin role. Dial the code, then enter the extension:
                        <br>1. <strong>Listen (<code>*90</code>):</strong> hear the call silently.
                        <br>2. <strong>Whisper (<code>*91</code>):</strong> only the agent hears you; the caller does not.
                        <br>3. <strong>Barge (<code>*92</code>):</strong> join as a third party; both sides hear you.
                        <br>The same actions are available from the Listen / Whisper / Barge buttons on the call center board. Other roles only hear a beep.
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        Drei Live-Modi (Asterisk <code>ChanSpy</code>) für Benutzer mit Supervisor- oder Admin-Rolle. Code wählen, dann die Nebenstelle eingeben:
                        <br>1. <strong>Mithören (<code>*90</code>):</strong> das Gespräch still mithören.
                        <br>2. <strong>Flüstern (<code>*91</code>):</strong> nur der Agent hört Sie, der Anrufer nicht.
                        <br>3. <strong>Aufschalten (<code>*92</code>):</strong> als Dritter beitreten; beide Seiten hören Sie.
                        <br>Dieselben Aktionen gibt es über die Schaltflächen im Callcenter-Board. Andere Rollen hören nur einen Signalton.
                    </p>
                </div><div data-lang="az"><p>Supervayzer və rəhbər rolundakı istifadəçilər üçün 3 rejimli canlı söhbət nəzarəti (Asterisk <code>ChanSpy</code>). Kodu yığın, sonra daxili nömrəni daxil edin:<br>1. <strong>Dinləmə (<code>*90</code>):</strong> söhbəti səssizcə dinləyir.<br>2. <strong>Pıçıltı (<code>*91</code>):</strong> yalnız operator eşidir; müştəri supervayzeri eşitmir.<br>3. <strong>Qoşulma (<code>*92</code>):</strong> söhbətə üçüncü tərəf kimi qoşulur; hər iki tərəf eşidir.<br>Eyni əməliyyatlar çağrı mərkəzi panelindəki Dinlə / Pıçılda / Qoşul düymələri ilə də edilir. Digər rollar bu kodları yığdıqda yalnız siqnal səsi eşidir.</p></div>

                <div class="docs-code-box">
                    <div class="docs-code-header">
                        <span>/etc/asterisk/pbx/extensions_featurecodes.conf — <?= t('portal tarafından üretilir', 'generated by the portal', 'vom Portal erzeugt', az: 'portal tərəfindən yaradılır') ?></span>
                        <button class="docs-code-copy" type="button">Copy</button>
                    </div>
                    <div class="docs-code-body">
                        <pre><code>exten => *90,1,NoOp(Feature Code spy by ${CALLERID(num)})
 same => n,GotoIf($["${USER_ROLE}" = "admin" | "${USER_ROLE}" = "cc_manager"]?allowed_spy)
 same => n,Answer()
 same => n,Playback(beep)
 same => n,Hangup()
 same => n(allowed_spy),Answer()
 same => n,Read(SPYTARGET,,10,,3,10)
 same => n,ChanSpy(PJSIP/${SPYTARGET},b)      ; *91: qwb (whisper)  *92: qBb (barge)
 same => n,Hangup()</code></pre>
                    </div>
                </div>
            </section>

            <!-- Section 18: Ring Groups (Ring-All, Round-Robin, Hunt) -->
            <section class="docs-section" id="ring-groups">
                <h2>
                    <span data-lang="tr">18. Çalma Grupları (Ring Groups: Ring-All, Round-Robin, Hunt)</span>
                    <span data-lang="en">18. Enterprise Ring Groups (Ring-All, Round-Robin, Hunt)</span>
                    <span data-lang="de">18. Erweiterte Rufgruppen (Ring-All, Round-Robin, Kaskade)</span><span data-lang="az">18. Zəng Qrupları (Ring Groups: Ring-All, Round-Robin, Hunt)</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        Departmanlara (Satış, Destek, Muhasebe) gelen çağrıların adil ve kesintisiz dağıtımı için 4 esnek strateji:
                        <br>• <strong>Ring-All (Tümünü Çaldır):</strong> Gruptaki tüm telefonlar aynı anda çalar, ilk açan çağrıyı alır.
                        <br>• <strong>Round-Robin (Sıralı Eşit Dağıtım):</strong> Aramalar temsilcilere sırayla eşit olarak iletilir.
                        <br>• <strong>Linear Hunt (Öncelik Sıralı):</strong> Önceden belirlenen sıra listesine göre (örn. Kıdemli Uzman &gt; Yedek Temsilci) çağrı iletilir.
                        <br>• <strong>Memory Hunt (Kademeli Ekleme):</strong> İlk 10 saniye 1. dahili çalar, yanıtlanmazsa 1. çalmaya devam ederken 2. dahili de çalmaya başlar.
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        4 intelligent call distribution strategies engineered for departmental inbound routing:
                        <br>• <strong>Ring-All:</strong> Rings all group members simultaneously; first pickup claims the call.
                        <br>• <strong>Round-Robin:</strong> Cyclically balances incoming call volume evenly across available agents.
                        <br>• <strong>Linear Hunt:</strong> Traverses extensions sequentially in configured priority order.
                        <br>• <strong>Memory Hunt:</strong> Rings tier 1, and if unanswered, continues ringing tier 1 while escalating to tier 2.
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        Vier flexible Rufgruppenstrategien für Vertrieb, Support und Verwaltung:
                        <br>• <strong>Ring-All:</strong> Gleichzeitiger Ruf aller Nebenstellen.
                        <br>• <strong>Round-Robin:</strong> Zyklische Gleichverteilung der Anruflast.
                        <br>• <strong>Linear Hunt:</strong> Feste Prioritätenreihenfolge.
                        <br>• <strong>Memory Hunt:</strong> Kaskadierende Hinzunahme weiterer Apparate bei Nichtannahme.
                    </p>
                </div><div data-lang="az"><p>Şöbələrə (Satış, Dəstək, Mühasibat) gələn zənglərin ədalətli və fasiləsiz paylanması üçün 4 çevik strategiya:<br>• <strong>Ring-All (Hamısına Zəng):</strong> Qrupdakı bütün telefonlar eyni anda zəng çalır, ilk açan zəngi qəbul edir.<br>• <strong>Round-Robin (Növbəli Bərabər Paylama):</strong> Zənglər operatorlara növbə ilə bərabər ötürülür.<br>• <strong>Linear Hunt (Prioritet Sırası):</strong> Əvvəlcədən müəyyən edilmiş sıra siyahısına görə (məs. Baş Mütəxəssis &gt; Ehtiyat Operator) zəng ötürülür.<br>• <strong>Memory Hunt (Pilləli Əlavə):</strong> İlk 10 saniyə 1-ci daxili nömrə zəng çalır, cavab verilməzsə 1-ci zəng çalmağa davam edərkən 2-ci daxili nömrə də zəng çalmağa başlayır.</p></div>
            </section>

            <!-- Section 19: Trunk-to-Trunk Transit Routing & DID Trimming -->
            <section class="docs-section" id="transit-routing">
                <h2>
                    <span data-lang="tr">19. Hatlar Arası Transit Yönlendirme &amp; DID Normalizasyonu</span>
                    <span data-lang="en">19. Trunk-to-Trunk Transit Routing &amp; DID Normalization</span>
                    <span data-lang="de">19. Trunk-to-Trunk Transit-Routing &amp; DID-Normalisierung</span><span data-lang="az">19. Xətlərarası Tranzit Marşrutlaşdırma &amp; DID Normallaşdırılması</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        Farklı telekom operatörleri, şubeler arası IP tünelleri ve harici PBX sistemleri arasında köprü görevi gören taşıyıcı sınıfı yönlendirme mimarisi. Gelen DID numarasındaki ülke kodları (+90, 0090, 0), operatör prefiksleri regex ifadeleriyle kırpılır veya standart E.164 uluslararası biçimine dönüştürülür. Gelen çağrı santralde sonlanmadan başka bir SIP Trunk üzerinden anında harici GSM veya şube santraline yönlendirilebilir.
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        Carrier-grade transit switching interconnecting disparate SIP trunks, branch office gateways, and external legacy PBXs. Powerful regular expressions strip or prepend regional dial prefixes (e.g. leading zeros, country codes) enforcing strict E.164 compliance before handing calls off to downstream transit trunks.
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        Hochperformantes Transit-Switching zwischen unterschiedlichen SIP-Trunk-Providern und Niederlassungen. Regex-basierte Bereinigung von Ländervorwahlen (+49, 0049, 0) und Normalisierung auf E.164 vor der Weiterleitung an Partnersysteme.
                    </p>
                </div><div data-lang="az"><p>Müxtəlif telekom operatorları, filiallararası IP tunelləri və xarici PBX sistemləri arasında körpü rolunu oynayan daşıyıcı səviyyəli marşrutlaşdırma arxitekturası. Daxil olan DID nömrəsindəki ölkə kodları (+994, 00994, 0) və operator prefiksləri regex ifadələri ilə kəsilir və ya standart E.164 beynəlxalq formatına çevrilir. Daxil olan zəng santralda bitmədən başqa bir SIP Trunk üzərindən dərhal xarici mobil nömrəyə və ya filial santralına yönləndirilə bilər.</p></div>
            </section>

            <!-- Section 20: Microsoft Teams Direct Routing TLS/SRTP SBC Gateway -->
            <section class="docs-section" id="msteams">
                <h2>
                    <span data-lang="tr">20. Microsoft Teams Direct Routing TLS/SRTP SBC Ağ Geçidi</span>
                    <span data-lang="en">20. Microsoft Teams Direct Routing TLS/SRTP SBC Gateway</span>
                    <span data-lang="de">20. Microsoft Teams Direct Routing TLS/SRTP SBC-Gateway</span><span data-lang="az">20. Microsoft Teams Direct Routing TLS/SRTP SBC Şlüzü</span>
                </h2>
                <div data-lang="tr">
                    <p>
                        AiPBX, ek bir pahalı harici SBC (Session Border Controller) donanımına gerek duymadan Microsoft 365 Teams Direct Routing entegrasyonu sağlar. SIP TLS Port 5061, Microsoft güvenilir kök sertifikaları (DigiCert / Baltimore) ve SRTP AES_CM_128 medya şifreleme gereksinimlerini doğrudan Asterisk 22 PJSIP çekirdeğinde karşılar. Teams masaüstü ve mobil kullanıcıları kurumsal santral dahilileriyle ve telekom dış hatlarıyla kesintisiz görüşebilir.
                    </p>
                </div>
                <div data-lang="en">
                    <p>
                        AiPBX provides a native, hardware-free Microsoft 365 Teams Direct Routing SBC interface. Asterisk 22 PJSIP natively terminates Microsoft Teams SIP signaling over TLS 5061 with trusted CA chains and encrypts media using SRTP AES_CM_128. Enables Teams desktop and mobile users to place and receive corporate PBX calls effortlessly.
                    </p>
                </div>
                <div data-lang="de">
                    <p>
                        Direkte Anbindung an Microsoft 365 Teams ohne teure Drittanbieter-SBC-Hardware. Vollständige Unterstützung von SIP TLS auf Port 5061, Microsoft Root-CAs und SRTP AES_CM_128 Sprachverschlüsselung für nahtlose Telefonie im Teams-Client.
                    </p>
                </div><div data-lang="az"><p>AiPBX əlavə bahalı xarici SBC (Session Border Controller) avadanlığına ehtiyac olmadan Microsoft 365 Teams Direct Routing inteqrasiyası təmin edir. SIP TLS Port 5061, Microsoft-un etibarlı kök sertifikatları (DigiCert / Baltimore) və SRTP AES_CM_128 media şifrələmə tələbləri birbaşa Asterisk 22 PJSIP nüvəsində qarşılanır. Teams masaüstü və mobil istifadəçiləri korporativ santral daxili nömrələri və telekom xarici xətləri ilə fasiləsiz danışa bilərlər.</p></div>

                <div class="docs-code-box">
                    <div class="docs-code-header">
                        <span>PowerShell — Microsoft Teams PSTN Gateway Provisioning</span>
                        <button class="docs-code-copy" type="button">Copy</button>
                    </div>
                    <div class="docs-code-body">
                        <pre><code># 1. Register AiPBX SBC Gateway in Microsoft 365 Tenant
New-CsOnlinePSTNGateway -Fqdn "sbc.aipbx.bid" -SipSignalingPort 5061 `
    -MaxConcurrentSessions 100 -Enabled $true

# 2. Assign Voice Routing Policy to Teams User
Set-CsPhoneNumberAssignment -Identity "<!--email_off-->user@company.com<!--/email_off-->" -PhoneNumber "+902129990001" -PhoneNumberType DirectRouting
Grant-CsOnlineVoiceRoutingPolicy -Identity "<!--email_off-->user@company.com<!--/email_off-->" -PolicyName "AiPBX-PSTN-Policy"</code></pre>
                    </div>
                </div>
            </section>


            <!-- Pagination -->
            <section class="docs-section" id="cloud-tts">
                <h2>
                    <span data-lang="tr">21. Bulut TTS: Metinden Anons</span>
                    <span data-lang="en">21. Cloud TTS: Announcements from Text</span>
                    <span data-lang="de">21. Cloud-TTS: Ansagen aus Text</span><span data-lang="az">21. Bulud TTS: Mətndən Anons</span>
                </h2>
                <p data-lang="tr"><strong>Yapay Zekâ → Cloud TTS</strong> sayfası yazdığınız metni bulut seslendirme servisleriyle sese çevirir. Sonucu sayfada dinleyebilir, MP3 olarak indirebilir ya da tek tıkla <strong>Sesler</strong> sayfasına kaydedip IVR, kuyruk ve zaman koşullarında kullanabilirsiniz. Stüdyo kaydına gerek kalmaz, tüm anonslar aynı sesle olur.</p>
                <p data-lang="en">The <strong>AI → Cloud TTS</strong> page turns your text into speech with cloud text-to-speech services. Listen on the page, download the MP3, or save it to <strong>Sounds</strong> in one click for IVRs, queues and time conditions. No studio recording, and every announcement in the same voice.</p>
                <p data-lang="de">Die Seite <strong>KI → Cloud TTS</strong> wandelt Ihren Text mit Cloud-Sprachdiensten in Sprache um. Auf der Seite anhören, als MP3 laden oder mit einem Klick unter <strong>Sounds</strong> für IVR, Warteschlangen und Zeitsteuerungen speichern. Keine Studioaufnahme, alle Ansagen in derselben Stimme.</p><p data-lang="az"><strong>Süni İntellekt → Cloud TTS</strong> səhifəsi yazdığınız mətni bulud səsləndirmə xidmətləri ilə səsə çevirir. Nəticəni səhifədə dinləyə, MP3 kimi yükləyə və ya bir kliklə <strong>Səslər</strong> səhifəsinə yazıb IVR, növbə və zaman şərtlərində istifadə edə bilərsiniz. Studiya yazısına ehtiyac qalmır, bütün anonslar eyni səslə olur.</p>
                <ul class="docs-list" data-lang="tr">
                    <li><strong>Sağlayıcılar:</strong> Google Cloud Text-to-Speech (API anahtarı veya servis hesabı), Amazon Polly, Microsoft Azure AI Speech, ElevenLabs ve OpenAI. Sesler her sağlayıcıdan canlı listelenir.</li>
                    <li><strong>Anons olarak kaydetme:</strong> ses 8 kHz mono WAV'a çevrilip özel sesler klasörüne yazılır ve yüklenmiş bir dosya gibi <em>Uygula</em> ile devreye girer.</li>
                    <li><strong>Güvenli anahtarlar:</strong> erişim bilgileri veritabanı dışındaki bir anahtarla (libsodium) şifrelenir ve tarayıcıya hiç geri gönderilmez.</li>
                    <li><strong>Kullanım geçmişi:</strong> servisler karakter başına ücretlendirdiği için her seslendirmenin karakter sayısı, süresi ve yapan kişi tutulur.</li>
                    <li>AiPBX'in eksiksiz Türkçe sistem istemleri de bu özellikle tek bir sesle üretildi.</li>
                </ul>
                <ul class="docs-list" data-lang="en">
                    <li><strong>Providers:</strong> Google Cloud Text-to-Speech (API key or service account), Amazon Polly, Microsoft Azure AI Speech, ElevenLabs and OpenAI. Voices are listed live from each provider.</li>
                    <li><strong>Save as announcement:</strong> the audio is converted to 8 kHz mono WAV in the custom sounds folder and goes live with <em>Apply</em>, like an uploaded file.</li>
                    <li><strong>Safe credentials:</strong> encrypted (libsodium) with a key kept outside the database, never sent back to the browser.</li>
                    <li><strong>Usage history:</strong> the services bill per character, so every synthesis keeps its character count, duration and author.</li>
                    <li>AiPBX's complete Turkish system prompt set was generated with this feature, in a single voice.</li>
                </ul>
                <ul class="docs-list" data-lang="de">
                    <li><strong>Anbieter:</strong> Google Cloud Text-to-Speech (API-Schlüssel oder Dienstkonto), Amazon Polly, Microsoft Azure AI Speech, ElevenLabs und OpenAI. Stimmen werden live vom Anbieter geladen.</li>
                    <li><strong>Als Ansage speichern:</strong> Der Ton wird in 8-kHz-Mono-WAV umgewandelt und wie eine hochgeladene Datei mit <em>Übernehmen</em> aktiv.</li>
                    <li><strong>Sichere Zugangsdaten:</strong> mit einem Schlüssel außerhalb der Datenbank verschlüsselt (libsodium), nie an den Browser zurückgegeben.</li>
                    <li><strong>Verlauf:</strong> Die Dienste rechnen pro Zeichen ab, daher wird für jede Synthese Zeichenzahl, Dauer und Ersteller gespeichert.</li>
                    <li>Der vollständige türkische Ansagensatz von AiPBX wurde mit dieser Funktion in einer Stimme erzeugt.</li>
                </ul><ul class="docs-list" data-lang="az"><li><strong>Provayderlər:</strong> Google Cloud Text-to-Speech (API açarı və ya xidmət hesabı), Amazon Polly, Microsoft Azure AI Speech, ElevenLabs və OpenAI. Səslər hər provayderdən canlı siyahılanır.</li><li><strong>Anons kimi yadda saxlama:</strong> səs 8 kHz mono WAV-a çevrilib xüsusi səslər qovluğuna yazılır və yüklənmiş fayl kimi <em>Tətbiq et</em> ilə işə düşür.</li><li><strong>Təhlükəsiz açarlar:</strong> giriş məlumatları verilənlər bazasından kənardakı açarla (libsodium) şifrələnir və brauzerə heç vaxt geri göndərilmir.</li><li><strong>İstifadə tarixçəsi:</strong> xidmətlər simvol başına ödənişli olduğu üçün hər səsləndirmənin simvol sayı, müddəti və onu edən şəxs saxlanılır.</li><li>AiPBX-in tam türkcə sistem anonsları da bu funksiya ilə vahid səslə hazırlanıb.</li></ul>
            </section>

            <!-- Section 22: Yapay Zekâ Sesli İstekler (Voice Requests / AI IVR) -->
            <section class="docs-section" id="ai-apps">
                <h2>
                    <span data-lang="tr">22. Yapay Zekâ Sesli İstekler &amp; Değerli Anonslar (AI IVR)</span>
                    <span data-lang="en">22. AI Voice Requests &amp; Dynamic Announcements (AI IVR)</span>
                    <span data-lang="de">22. KI-Sprachanfragen &amp; Dynamische Ansagen (KI-IVR)</span>
                    <span data-lang="az">22. Süni İntellekt Səsli İstəklər &amp; Dinamik Anonslar (AI IVR)</span>
                </h2>
                <p data-lang="tr">AiPBX, çağrıları doğrudan karşılayan, arayanın doğal dilde ne istediğini anlayıp sesli yanıt veren veya ilgili personeli e-posta ile uyararak çağrıyı aktaran gelişmiş <strong>Yapay Zekâ Sesli İstekler (Voice Requests)</strong> motoruna sahiptir. Harici bulut servislerine bağımlı olmadan sunucu üzerinde yerel Vosk STT ve Piper/Kokoro TTS ses modelleriyle çalışır; tam KVKK/GDPR egemenliği sağlar.</p>
                <p data-lang="en">AiPBX features an on-premises <strong>AI Voice Requests</strong> engine that takes live calls, understands what callers need through real-time speech recognition, responds by voice, emails staff with summaries, and routes calls intelligently. Runs entirely on-server with Vosk STT and Piper/Kokoro TTS, ensuring zero cloud dependency and strict GDPR compliance.</p>
                <p data-lang="de">AiPBX bietet ein integriertes <strong>KI-Sprachanfragen (Voice Requests)</strong>-System, das Anrufe live entgegennimmt, das Anliegen des Anrufers per Spracherkennung versteht, per Sprachmodell antwortet, Mitarbeiter per E-Mail benachrichtigt und weiterleitet. Funktioniert vollständig lokal mit Vosk STT und Piper/Kokoro TTS ohne Cloud-Kosten.</p>
                <p data-lang="az">AiPBX zəngləri birbaşa qarşılayan, zəng edənin təbii dildə nə istədiyini anlayıb səsli cavab verən və ya heyətə e-poçtla bildiriş göndərərək yönləndirən qabaqcıl <strong>Süni İntellekt Səsli İstəklər (Voice Requests)</strong> mühərrikinə malikdir. Xarici bulud xidmətlərindən asılı olmadan yerli Vosk STT və Piper/Kokoro TTS modelləri ilə işləyir.</p>

                <ul class="docs-list" data-lang="tr">
                    <li><strong>Sesli İstekler (Voice Requests):</strong> Arayan "Odaya iki havlu daha gönderir misiniz?" der; sistem "Havlu" talebini anahtar kelime ve örnek cümlelerle anlar, arayana sesli teyit verir, kat hizmetlerine oda numarasıyla e-posta atar.</li>
                    <li><strong>Değerli Anonslar (Dynamic Lookup):</strong> CRM veya muhasebe API'sine <code>?caller=...&did=...</code> ile bağlanıp canlı bakiye, müşteri ismi veya randevu okuma: <em>"Sayın {caller_name}, borcunuz {amount}. Son ödeme tarihi {date}."</em></li>
                    <li><strong>Doğal Sayı &amp; Tutar Okuma:</strong> Türkçe para ve sayılar doğal telaffuzla seslendirilir: "₺1.234,50" → "bin iki yüz otuz dört lira elli kuruş"; Euro, Dolar ve gruplu telefon numaraları.</li>
                    <li><strong>Web Sitesi Canlı Çağrı Widget'ı (<code>widget.js</code>):</strong> Web sitenize ekleyeceğiniz tek satır kod ile müşterileriniz mikrofon izinleriyle tarayıcıdan santralinizi doğrudan ve ücretsiz arayabilir.</li>
                    <li><strong>Google Play Android Softphone:</strong> Mobil istemcimiz WebRTC, FCM push uyandırma ve Google Play Closed Testing erken erişim kanalındadır (<a href="/android" style="color:var(--primary); font-weight:700;">/android</a> üzerinden testçi olabilirsiniz).</li>
                </ul>
                <ul class="docs-list" data-lang="en">
                    <li><strong>Voice Requests (AI IVR):</strong> Callers state their request naturally; the local AI matches keywords and intent, replies by voice, sends notification emails with recordings, and routes calls.</li>
                    <li><strong>Dynamic Lookup Announcements:</strong> Connects to CRM/ERP APIs with <code>?caller=...&did=...</code> to read live balances, customer names, or appointment dates.</li>
                    <li><strong>Natural Currency &amp; Number Speech:</strong> Reads amounts, dates, and phone numbers fluently in Turkish, English, and German.</li>
                    <li><strong>Website Calling Widget (<code>widget.js</code>):</strong> Embed a WebRTC calling button on your website for instant, in-browser customer calls to your queues.</li>
                    <li><strong>Google Play Android Softphone:</strong> Native Kotlin softphone with FCM push and WebRTC is available on Google Play Closed Testing (<a href="/android" style="color:var(--primary); font-weight:700;">join via /android</a>).</li>
                </ul>
                <ul class="docs-list" data-lang="de">
                    <li><strong>Sprachanfragen (Voice Requests):</strong> Anrufer formulieren ihr Anliegen frei; lokale Sprachmodelle erkennen die Absicht, antworten per Audio und benachrichtigen zuständige Mitarbeiter.</li>
                    <li><strong>Dynamische Ansagen:</strong> Live-Abfrage an CRM- oder ERP-Systeme zur Ausgabe von Kontoständen, Kundennamen oder Terminen.</li>
                    <li><strong>Natürliche Zahlen- und Währungsausgabe:</strong> Flüssige Ansage von Beträgen, Währungen und Telefonnummern.</li>
                    <li><strong>Website-Anruf-Widget (<code>widget.js</code>):</strong> Direkte browserbasierte WebRTC-Verbindung von Ihrer Website zur Telefonanlage.</li>
                    <li><strong>Google Play Android Softphone:</strong> Natives Softphone im Google Play Closed-Testing verfügbar (<a href="/android" style="color:var(--primary); font-weight:700;">über /android beitreten</a>).</li>
                </ul>
                <ul class="docs-list" data-lang="az">
                    <li><strong>Səsli İstəklər (Voice Requests):</strong> Zəng edən müraciətini sərbəst şəkildə deyir; yerli AI açar sözlərlə tələbi anlayır, səsli cavab verir və cavabdeh şəxsə e-poçtla xəbərdarlıq göndərir.</li>
                    <li><strong>Dinamik Anonslar:</strong> CRM sistemlərinə qoşularaq real vaxtda balans, ad və görüş tarixinin oxunması.</li>
                    <li><strong>Təbii Rəqəm və Valyuta Səsləndirməsi:</strong> Məbləğ, tarix və telefon nömrələrinin axıcı oxunuşu.</li>
                    <li><strong>Veb Sayt Zəng Vidceti (<code>widget.js</code>):</strong> Saytınızdan birbaşa brauzer üzərindən WebRTC ilə santrala zəng imkanı.</li>
                    <li><strong>Google Play Android Softphone:</strong> Yerli mobil tətbiqimiz Google Play Qapalı Test mərhələsindədir (<a href="/android" style="color:var(--primary); font-weight:700;">/android</a> keçidi ilə qoşula bilərsiniz).</li>
                </ul>
            </section>

            <div class="docs-pagination">
                <a href="/" class="pagination-btn">
                    <span class="pagination-label">
                        <span data-lang="tr">Önceki Sayfa</span>
                        <span data-lang="en">Previous</span>
                        <span data-lang="de">Vorherige</span><span data-lang="az">Əvvəlki Səhifə</span>
                    </span>
                    <span class="pagination-title">
                        <span data-lang="tr">🏠 Genel Bakış (Home)</span>
                        <span data-lang="en">🏠 Overview (Home)</span>
                        <span data-lang="de">🏠 Übersicht (Home)</span><span data-lang="az">🏠 Ümumi Baxış (Home)</span>
                    </span>
                </a>
                <a href="/tables" class="pagination-btn next">
                    <span class="pagination-label">
                        <span data-lang="tr">Sonraki Sayfa</span>
                        <span data-lang="en">Next</span>
                        <span data-lang="de">Nächste</span><span data-lang="az">Növbəti Səhifə</span>
                    </span>
                    <span class="pagination-title">
                        <span data-lang="tr">📊 Karşılaştırma &amp; Tablolar</span>
                        <span data-lang="en">📊 Tables &amp; Specs</span>
                        <span data-lang="de">📊 Tabellen &amp; Matrix</span><span data-lang="az">📊 Müqayisə &amp; Cədvəllər</span>
                    </span>
                </a>
            </div>
        </main>

        <!-- Right Sticky Table of Contents -->
        <div class="docs-toc">
            <div class="toc-title">
                <span data-lang="tr">Bu Sayfada (<?= count($moduleNav) ?> Modül)</span>
                <span data-lang="en">On This Page (<?= count($moduleNav) ?> Modules)</span>
                <span data-lang="de">Auf dieser Seite (<?= count($moduleNav) ?> Module)</span><span data-lang="az">Bu Səhifədə (<?= count($moduleNav) ?> Modul)</span>
            </div>
            <ul class="toc-list">
                <?php foreach ($moduleNav as $i => [$anchor, $tr, $en, $de, $az]): ?>
                    <li><a href="#<?= $anchor ?>"><?= $i + 1 ?>. <?= t($tr, $en, $de, az: $az) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Universal Footer -->
    <?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
