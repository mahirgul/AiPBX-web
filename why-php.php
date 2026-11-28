<?php
/**
 * aipbx.bid — Architecture & Sizing: Why PHP? (control plane vs. C/Go/Python hot paths).
 */
$page = 'why-php';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/content.php';
$head = [
    t('Neden PHP?', 'Why PHP?', 'Warum PHP?', az: 'Niyə PHP?'),
    t(
        'AiPBX\'te PHP hiçbir ses, sinyalleşme, sohbet veya canlı AI akışında yer almaz — yalnızca yönetim kontrol düzlemidir. 4 vCPU / 4 GB RAM sunucuda gerçek ajan kapasitesi.',
        'In AiPBX, PHP is never in the media, SIP signaling, WebSocket chat, or live AI voice hot path — it is strictly the control plane. Real sizing numbers on a 4 vCPU / 4 GB RAM server.',
        'In AiPBX liegt PHP niemals im Medien-, SIP-, Chat- oder Live-KI-Sprachpfad — es bildet ausschließlich die Steuerungsebene. Reale Kapazitätswerte auf einem 4-vCPU- / 4-GB-RAM-Server.',
        az: 'AiPBX-də PHP heç bir səs, siqnalizasiya, söhbət və ya canlı AI axınında iştirak etmir — yalnız idarəetmə müstəvisidir. 4 vCPU / 4 GB RAM serverdə real agent tutumu.'
    ),
];
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

    <section class="sx-section">
        <div class="sx-wrap">
            <article class="sx-article">
                <h2><?= t('1. Neden sürekli "Neden PHP?" diye soruluyor?', '1. Why do people keep asking "Why PHP?"', '1. Warum wird immer wieder „Warum PHP?“ gefragt?', az: '1. Niyə davamlı "Niyə PHP?" deyə soruşulur?') ?></h2>
                <p><?= t('Bunun iki temel sebebi var:', 'There are two main reasons:', 'Dafür gibt es zwei Hauptgründe:', az: 'Bunun iki əsas səbəbi var:') ?></p>
                <ol>
                    <li><strong><?= t('Yanlış mimari varsayım:', 'Wrong architectural assumption:', 'Falsche Architekturannahme:', az: 'Yanlış memarlıq fərziyyəsi:') ?></strong> <?= t('İnsanlar "PHP tabanlı PBX" ifadesini görünce SIP sinyalleşmesinin, RTP ses akışının, çağrı kuyruklarının veya sohbetin PHP üzerinden aktığını sanıyor.', 'When people see "PHP-based PBX," they assume SIP signaling, RTP audio streams, call queues, or real-time chat flow through PHP.', 'Wer „PHP-basierte Telefonanlage“ hört, vermutet oft, dass SIP-Signalisierung, RTP-Audioströme, Warteschlangen oder Chat durch PHP laufen.', az: 'İnsanlar "PHP əsaslı PBX" ifadəsini gördükdə SIP siqnalizasiyasının, RTP səs axınının, çağrı növbələrinin və ya söhbətin PHP üzərindən keçdiyini düşünür.') ?></li>
                    <li><strong><?= t('Eski FreePBX / PHP 5 travması:', 'Legacy FreePBX / PHP 5 trauma:', 'Altes FreePBX- / PHP-5-Trauma:', az: 'Köhnə FreePBX / PHP 5 travması:') ?></strong> <?= t('Eski FreePBX kurulumlarındaki yavaş ekranlar ve 15 yıl önceki PHP önyargısı hâlâ refleks olarak geliyor.', 'Slow screens in old FreePBX setups and 15-year-old PHP stereotypes still trigger an automatic reflex.', 'Träge Oberflächen alter FreePBX-Installationen und 15 Jahre alte PHP-Vorurteile lösen noch immer einen Reflex aus.', az: 'Köhnə FreePBX quraşdırmalarındakı yavaş ekranlar və 15 il əvvəlki PHP qərəzi hələ də refleks kimi ortaya çıxır.') ?></li>
                </ol>

                <p><strong><?= t('AiPBX\'teki gerçek durum ise şu — PHP hiçbir sıcak medya/sinyalleşme yolunda (hot path) değil:', 'Here is the actual reality in AiPBX — PHP is never in the media or signaling hot path:', 'Die Realität in AiPBX sieht anders aus — PHP befindet sich niemals im Medien- oder Signalisierungs-Hot-Path:', az: 'AiPBX-dəki real vəziyyət isə belədir — PHP heç bir media/siqnalizasiya yolunda (hot path) deyil:') ?></strong></p>
                <ul>
                    <li><strong><?= t('SIP / RTP / WebRTC medya ve çağrı kuyrukları:', 'SIP / RTP / WebRTC media and call queues:', 'SIP / RTP / WebRTC-Medien und Warteschlangen:', az: 'SIP / RTP / WebRTC media və zəng növbələri:') ?></strong> <?= t('C (Asterisk 22 LTS + PJSIP + coturn).', 'C (Asterisk 22 LTS + PJSIP + coturn).', 'C (Asterisk 22 LTS + PJSIP + coturn).', az: 'C (Asterisk 22 LTS + PJSIP + coturn).') ?></li>
                    <li><strong><?= t('Port 443 ALPN / SNI çoklama:', 'Port 443 ALPN / SNI multiplexing:', 'Port-443-ALPN-/-SNI-Multiplexing:', az: 'Port 443 ALPN / SNI multipleksləşdirmə:') ?></strong> <?= t('C (Nginx stream modülü).', 'C (Nginx stream module).', 'C (Nginx-Stream-Modul).', az: 'C (Nginx stream modulu).') ?></li>
                    <li><strong><?= t('Gerçek zamanlı ekip sohbeti ve çevrimiçi durum (WebSocket):', 'Real-time team chat and presence (WebSocket):', 'Echtzeit-Teamchat und Präsenzstatus (WebSocket):', az: 'Real vaxt komanda söhbəti və onlayn status (WebSocket):') ?></strong> <?= t('Go (aipbx-chat).', 'Go (aipbx-chat).', 'Go (aipbx-chat).', az: 'Go (aipbx-chat).') ?></li>
                    <li><strong><?= t('Canlı AI sesli ajanlar ve yerel TTS/VAD (ARI / AudioSocket 20 ms ses akışı):', 'Live AI voice agents and local TTS/VAD (ARI / AudioSocket 20 ms PCM streams):', 'Live-KI-Sprachagenten und lokale TTS/VAD (ARI / AudioSocket 20-ms-Audioströme):', az: 'Canlı AI səsli agentlər və yerli TTS/VAD (ARI / AudioSocket 20 ms səs axını):') ?></strong> <?= t('Python asyncio + C++ ONNX Runtime (aipbx-ai).', 'Python asyncio + C++ ONNX Runtime (aipbx-ai).', 'Python asyncio + C++ ONNX Runtime (aipbx-ai).', az: 'Python asyncio + C++ ONNX Runtime (aipbx-ai).') ?></li>
                    <li><strong><?= t('PHP 8\'in tek işi kontrol düzlemi (Control Plane):', 'PHP 8 is strictly the Control Plane:', 'PHP 8 ist ausschließlich die Steuerungsebene (Control Plane):', az: 'PHP 8-in yeganə işi idarəetmə müstəvisidir (Control Plane):') ?></strong> <?= t('Yönetim ekranı formları, REST API CRUD, raporlar ve Apply dendiğinde /etc/asterisk/pbx/*.conf dosyalarını üretmek. Bir görüşme sürerken PHP neredeyse %0 CPU harcar.', 'Admin portal forms, REST API CRUD, reports, and generating /etc/asterisk/pbx/*.conf files when you click Apply. While calls are running, PHP uses near-0% CPU.', 'Verwaltungsformulare, REST-API-CRUD, Berichte und das Erzeugen der /etc/asterisk/pbx/*.conf-Dateien bei Apply. Während Gespräche laufen, verbraucht PHP nahezu 0 % CPU.', az: 'İdarəetmə ekranı formları, REST API CRUD, hesabatlar və Apply zamanı /etc/asterisk/pbx/*.conf fayllarını yaratmaq. Danışıq zamanı PHP demək olar ki %0 CPU sərf edir.') ?></li>
                </ul>

                <div class="sx-callout">
                    <strong><?= t('Dürüst tek sınır:', 'The one honest bottleneck:', 'Die eine ehrliche Grenze:', az: 'Dürüst yeganə sərhəd:') ?></strong> <?= t('Çok sayıda çağrı merkezi ajanı aynı anda tarayıcıda canlı pano/ajan ekranını açıp birkaç saniyede bir AJAX yenileme yaparsa, PHP/Apache worker\'ları ve MariaDB sorguları yük alır — fakat bu bile aktif telefon görüşmelerini (Asterisk/RTP) kesmez, yalnızca web arayüzünü yavaşlatır.', 'If many call-center agents keep the live wallboard or agent console open in browsers polling AJAX every few seconds, PHP/Apache workers and MariaDB queries take the load — yet even then, active phone calls in Asterisk/RTP are completely unaffected; only the portal UI slows down.', 'Wenn viele Callcenter-Agenten gleichzeitig Live-Wallboards mit sekündlichem AJAX-Polling offen halten, tragen PHP/Apache-Worker und MariaDB diese Last — doch selbst dann bleiben laufende Telefonate in Asterisk/RTP völlig unberührt; nur die Weboberfläche wird langsamer.', az: 'Çox sayda çağrı mərkəzi operatoru eyni anda canlı paneli açıb bir neçə saniyədə bir AJAX sorğusu göndərərsə, yük PHP/Apache və MariaDB üzərinə düşür — lakin bu da aktiv telefon zənglərini (Asterisk/RTP) kəsmir, yalnız veb interfeysi ləngidir.') ?>
                </div>

                <h2><?= t('2. 4 vCPU / 4 GB RAM sunucuda kabaca kaç "agent" çalışır?', '2. How many "agents" can run on a 4 vCPU / 4 GB RAM server?', '2. Wie viele „Agenten“ laufen auf einem 4-vCPU- / 4-GB-RAM-Server?', az: '2. 4 vCPU / 4 GB RAM serverdə təxminən neçə "agent" işləyir?') ?></h2>
                <p><?= t('Taban servisler (Linux + MariaDB + Asterisk 22 + Apache/PHP + Nginx + Go aipbx-chat + coturn) toplamda kabaca 1.0 – 1.3 GB RAM kullanır; geriye yaklaşık 2.5 – 3.0 GB RAM ve 4 çekirdek kalır.', 'The base services (Linux + MariaDB + Asterisk 22 + Apache/PHP + Nginx + Go aipbx-chat + coturn) use roughly 1.0–1.3 GB of RAM combined, leaving ~2.5–3.0 GB of RAM and 4 CPU cores for workload headroom.', 'Die Basisdienste (Linux + MariaDB + Asterisk 22 + Apache/PHP + Nginx + Go aipbx-chat + coturn) benötigen zusammen rund 1,0–1,3 GB RAM; es bleiben etwa 2,5–3,0 GB RAM und 4 Kerne.', az: 'Əsas xidmətlər (Linux + MariaDB + Asterisk 22 + Apache/PHP + Nginx + Go aipbx-chat + coturn) təxminən 1.0–1.3 GB RAM istifadə edir; geridə ~2.5–3.0 GB RAM və 4 nüvə qalır.') ?></p>

                <h3><?= t('A) İnsan Çağrı Merkezi Ajanları (Call Center Agents)', 'A) Human Call Center Agents', 'A) Menschliche Callcenter-Agenten', az: 'A) İnsan Çağrı Mərkəzi Operatorları') ?></h3>
                <div class="sx-table-wrap">
                    <table class="sx-table">
                        <thead>
                            <tr>
                                <th><?= t('Senaryo', 'Scenario', 'Szenario', az: 'Ssenari') ?></th>
                                <th><?= t('Rahat Eşzamanlı Kapasite', 'Comfortable Concurrency', 'Komfortable Kapazität', az: 'Rahat Eyni Vaxtlı Tutum') ?></th>
                                <th><?= t('Darboğaz Nerede?', 'Where is the bottleneck?', 'Wo liegt der Engpass?', az: 'Darboğaz Haradadır?') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= t('Kayıtlı / panelde açık ajan', 'Registered / logged-in portal agents', 'Registrierte / im Portal angemeldete Agenten', az: 'Qeydiyyatlı / paneldə açıq operator') ?></td>
                                <td><strong><?= t('~80 – 150 ajan', '~80 – 150 agents', '~80 – 150 Agenten', az: '~80 – 150 operator') ?></strong></td>
                                <td><?= t('Portal AJAX yenilemeleri + MariaDB (Go aipbx-chat bu donanımda 1.000+ eşzamanlı WebSocket bağlantısını rahat taşır)', 'Portal AJAX polling + MariaDB (Go aipbx-chat easily handles 1,000+ concurrent WebSockets on this hardware)', 'Portal-AJAX-Polling + MariaDB (Go aipbx-chat trägt über 1.000 gleichzeitige WebSockets problemlos)', az: 'Portal AJAX sorğuları + MariaDB (Go aipbx-chat bu avadanlıqda 1.000+ WebSocket bağlantısını rahat daşıyır)') ?></td>
                            </tr>
                            <tr>
                                <td><?= t('Aktif konuşan ajan (WebRTC + Opus↔G.711 transcoding + ses kaydı)', 'Active talking agents (WebRTC + Opus↔G.711 transcoding + recording)', 'Aktive Agenten im Gespräch (WebRTC + Opus↔G.711-Transcoding + Aufnahme)', az: 'Aktiv danışan operator (WebRTC + Opus↔G.711 transcoding + səs yazısı)') ?></td>
                                <td><strong><?= t('~40 – 70 eşzamanlı çağrı', '~40 – 70 concurrent calls', '~40 – 70 gleichzeitige Anrufe', az: '~40 – 70 eyni vaxtlı zəng') ?></strong></td>
                                <td><?= t('Asterisk codec dönüştürme (transcoding) + SRTP şifreleme CPU\'su', 'Asterisk codec transcoding + SRTP encryption CPU', 'Asterisk Codec-Transcoding + SRTP-CPU', az: 'Asterisk kodek çevirməsi + SRTP şifrələmə CPU-su') ?></td>
                            </tr>
                            <tr>
                                <td><?= t('Aktif konuşan ajan (Masaüstü SIP / G.711 passthrough, transcoding yok)', 'Active talking agents (Desk SIP / G.711 passthrough, no transcoding)', 'Aktive Agenten im Gespräch (Tisch-SIP / G.711 Passthrough ohne Transcoding)', az: 'Aktiv danışan operator (Masaüstü SIP / G.711 passthrough, transcoding yoxdur)') ?></td>
                                <td><strong><?= t('~80 – 120 eşzamanlı çağrı', '~80 – 120 concurrent calls', '~80 – 120 gleichzeitige Anrufe', az: '~80 – 120 eyni vaxtlı zəng') ?></strong></td>
                                <td><?= t('Ağ I/O + Asterisk kanal I/O', 'Network & Asterisk channel I/O', 'Netzwerk- & Asterisk-Kanal-I/O', az: 'Şəbəkə I/O + Asterisk kanal I/O') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3><?= t('B) Yapay Zekâ Sesli Ajanları (AI Voice Agents — Eşzamanlı Çağrı)', 'B) AI Voice Agents (Concurrent Active Calls)', 'B) KI-Sprachagenten (Gleichzeitige Anrufe)', az: 'B) Süni İntellekt Səsli Agentlər (Eyni Vaxtlı Zənglər)') ?></h3>
                <p><?= t('Burada da belirleyici olan PHP değil, ses sentezinin yerel mi bulut mu olduğudur (belgelerimizdeki gerçek 2 çekirdekli ONNX ölçümlerine dayanır):', 'Here again, the limiting factor is not PHP — it is whether speech synthesis runs locally or via cloud APIs (based on our real 2-core ONNX benchmarks in the documentation):', 'Auch hier ist nicht PHP der limitierende Faktor, sondern ob die Sprachausgabe lokal oder in der Cloud läuft (basierend auf unseren realen 2-Kern-ONNX-Messungen):', az: 'Burada da müəyyənedici olan PHP deyil, səs sintezinin yerli yoxsa bulud üzərindən işləməsidir (sənədlərdəki real 2 nüvəli ONNX ölçmələrinə əsasən):') ?></p>

                <div class="sx-table-wrap">
                    <table class="sx-table">
                        <thead>
                            <tr>
                                <th><?= t('AI Modu', 'AI Mode', 'KI-Modus', az: 'AI Rejimi') ?></th>
                                <th><?= t('Rahat Eşzamanlı AI Çağrısı', 'Comfortable Concurrency', 'Komfortable Kapazität', az: 'Rahat Eyni Vaxtlı Zəng') ?></th>
                                <th><?= t('Darboğaz Nerede?', 'Where is the bottleneck?', 'Wo liegt der Engpass?', az: 'Darboğaz Haradadır?') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= t('Cloud Realtime (OpenAI Realtime / Gemini Live / xAI) veya tamamen Cloud Cascade', 'Cloud Realtime (OpenAI Realtime / Gemini Live / xAI) or full Cloud Cascade', 'Cloud Realtime (OpenAI Realtime / Gemini Live / xAI) oder reines Cloud-Cascade', az: 'Cloud Realtime (OpenAI Realtime / Gemini Live / xAI) və ya tam Cloud Cascade') ?></td>
                                <td><strong><?= t('~25 – 50 eşzamanlı çağrı', '~25 – 50 concurrent calls', '~25 – 50 gleichzeitige Anrufe', az: '~25 – 50 eyni vaxtlı zəng') ?></strong><br><small><?= t('(Silero VAD / Smart Turn açıksa ~15 – 25)', '(~15 – 25 with local Silero VAD / Smart Turn enabled)', '(~15 – 25 mit lokalem Silero VAD / Smart Turn)', az: '(Silero VAD / Smart Turn aktivdirsə ~15 – 25)') ?></small></td>
                                <td><?= t('Sunucu CPU\'sundan önce genelde harici API hız limitine (rate-limit) takılır', 'Usually hits provider API rate limits before server CPU', 'Stößt meist eher an API-Rate-Limits als an Server-CPU', az: 'Server CPU-sundan əvvəl adətən provayder API limitinə dirənir') ?></td>
                            </tr>
                            <tr>
                                <td><?= t('Cascade + Yerel EMA Lightning (TR, ONNX ~115–250 MB RAM, 2 çekirdekte 11–12×)', 'Cascade + Local EMA Lightning (TR, ONNX ~115–250 MB RAM, 11–12× real time on 2 cores)', 'Cascade + Lokales EMA Lightning (TR, ONNX ~115–250 MB RAM, 11–12× auf 2 Kernen)', az: 'Cascade + Yerli EMA Lightning (TR, ONNX ~115–250 MB RAM, 2 nüvədə 11–12×)') ?></td>
                                <td><strong><?= t('~6 – 10 eşzamanlı konuşan', '~6 – 10 speaking simultaneously', '~6 – 10 gleichzeitig sprechend', az: '~6 – 10 eyni anda danışan') ?></strong><br><small><?= t('(~10 – 15 aktif çağrı)', '(~10 – 15 active calls)', '(~10 – 15 aktive Anrufe)', az: '(~10 – 15 aktiv zəng)') ?></small></td>
                                <td><?= t('CPU ONNX TTS sentez gecikmesi', 'CPU ONNX TTS inference latency', 'CPU-ONNX-TTS-Latenz', az: 'CPU ONNX TTS sintez gecikməsi') ?></td>
                            </tr>
                            <tr>
                                <td><?= t('Cascade + Yerel Piper (DE/EN, ONNX ~120–170 MB RAM, 2 çekirdekte 13–16×)', 'Cascade + Local Piper (DE/EN, ONNX ~120–170 MB RAM, 13–16× real time on 2 cores)', 'Cascade + Lokales Piper (DE/EN, ONNX ~120–170 MB RAM, 13–16× auf 2 Kernen)', az: 'Cascade + Yerli Piper (DE/EN, ONNX ~120–170 MB RAM, 2 nüvədə 13–16×)') ?></td>
                                <td><strong><?= t('~10 – 18 eşzamanlı çağrı', '~10 – 18 concurrent calls', '~10 – 18 gleichzeitige Anrufe', az: '~10 – 18 eyni vaxtlı zəng') ?></strong></td>
                                <td><?= t('CPU ONNX TTS sentez yükü', 'CPU ONNX TTS synthesis load', 'CPU-ONNX-TTS-Last', az: 'CPU ONNX TTS sintez yükü') ?></td>
                            </tr>
                            <tr>
                                <td><?= t('Cascade + Yerel Kokoro (EN, ONNX ~460–650 MB sabit RAM, 2 çekirdekte 1.7×)', 'Cascade + Local Kokoro (EN, ONNX ~460–650 MB shared RAM, 1.7× real time on 2 cores)', 'Cascade + Lokales Kokoro (EN, ONNX ~460–650 MB RAM, 1,7× auf 2 Kernen)', az: 'Cascade + Yerli Kokoro (EN, ONNX ~460–650 MB RAM, 2 nüvədə 1.7×)') ?></td>
                                <td><strong><?= t('~2 – 4 eşzamanlı çağrı', '~2 – 4 concurrent calls', '~2 – 4 gleichzeitige Anrufe', az: '~2 – 4 eyni vaxtlı zəng') ?></strong></td>
                                <td><?= t('GPU olmadan CPU\'da ağırdır', 'CPU bound without GPU acceleration', 'Ohne GPU stark CPU-gebunden', az: 'GPU olmadan CPU-da ağırdır') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2><?= t('Özetle', 'In short', 'Kurz gesagt', az: 'Xülasə') ?></h2>
                <div class="sx-callout">
                    <?= t(
                        'PHP, AiPBX\'te hiçbir zaman medya veya sinyalleşme sıcak yolunda değildir. SIP, RTP, WebRTC, kuyruklar ve kod çözme C\'de (Asterisk 22 + Nginx + coturn); gerçek zamanlı sohbet Go\'da; canlı AI ses akışı (ARI / AudioSocket) ve ONNX TTS/VAD Python/C++ içinde çalışır. PHP 8 yalnızca kontrol düzlemidir — aktif çağrılarda sıfıra yakın ek yük, düşük boşta RAM (~1 GB) ve tek küçük VPS veya Raspberry Pi üzerinde kolay kurulum sağlar.',
                        'PHP is never in the media or signaling hot path in AiPBX. SIP, RTP, WebRTC, queues, and transcoding run in C (Asterisk 22 + Nginx + coturn); real-time chat runs in Go; live AI voice streams (ARI / AudioSocket) and ONNX TTS/VAD run in Python/C++. PHP 8 is strictly the control plane (admin UI, REST CRUD, and generating Asterisk configs on Apply) — zero runtime overhead on active calls, low idle RAM (~1 GB for the whole stack), and simple single-server deployment on small VPSs or Raspberry Pi.',
                        'PHP ist in AiPBX niemals im Medien- oder Signalisierungs-Hot-Path. SIP, RTP, WebRTC, Warteschlangen und Transcoding laufen in C (Asterisk 22 + Nginx + coturn); Echtzeit-Chat läuft in Go; Live-KI-Sprachströme (ARI / AudioSocket) und ONNX-TTS/VAD laufen in Python/C++. PHP 8 ist rein die Steuerungsebene — praktisch null Last bei laufenden Gesprächen, geringer RAM-Verbrauch im Leerlauf (~1 GB) und einfaches Single-Server-Deployment selbst auf einem kleinen VPS oder Raspberry Pi.',
                        az: 'PHP AiPBX-də heç vaxt media və ya siqnalizasiya yolunda deyil. SIP, RTP, WebRTC, növbələr və transcoding C-də (Asterisk 22 + Nginx + coturn); real vaxt söhbət Go-da; canlı AI səs axını (ARI / AudioSocket) və ONNX TTS/VAD Python/C++-da işləyir. PHP 8 yalnız idarəetmə müstəvisidir — aktiv zənglərdə sıfıra yaxın əlavə yük, az RAM sərfi (~1 GB) və kiçik VPS və ya Raspberry Pi üzərində rahat quraşdırma deməkdir.'
                    ) ?>
                </div>

                <div class="row" style="display:flex;gap:12px;flex-wrap:wrap;margin-top:28px;">
                    <a href="/docs/system-map" class="sx-btn sx-btn-primary"><i class="fa-solid fa-sitemap"></i> <?= t('Sistem Haritası', 'System Map', 'Systemübersicht', az: 'Sistem Xəritəsi') ?></a>
                    <a href="/docs/local-ai" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-microchip"></i> <?= t('Yerel TTS Ölçümleri', 'Local TTS Benchmarks', 'Lokale-TTS-Benchmarks', az: 'Yerli TTS Ölçmələri') ?></a>
                    <a href="/install" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-terminal"></i> <?= t('Kurulum', 'Install', 'Installation', az: 'Quraşdırma') ?></a>
                </div>
            </article>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
