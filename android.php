<?php
/**
 * AiPBX.bid — Android Google Play Kapalı Test (Closed Testing) & Erken Erişim
 * Standard Docs Layout Template — Clean & Focused
 */
$page = 'android';
require_once __DIR__ . '/includes/data.php';

const DB_PATH = '/var/www/aipbx.bid/data/testers.db';
const ADMIN_KEY = 'aipbx2026';
const GOOGLE_GROUP_URL = 'https://groups.google.com/g/aipbx';
const PLAY_OPT_IN_URL = 'https://play.google.com/apps/testing/com.mhrgl.AiPBX';
const PLAY_STORE_URL = 'https://play.google.com/store/apps/details?id=com.mhrgl.AiPBX';

// SQLite Bağlantısı
function get_testers_db(): PDO {
    $db = new PDO('sqlite:' . DB_PATH);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE TABLE IF NOT EXISTS testers (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT UNIQUE NOT NULL,
        name TEXT,
        device TEXT,
        ip TEXT,
        user_agent TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    return $db;
}

// Admin CSV Export
if (isset($_GET['export']) && $_GET['export'] === 'csv' && isset($_GET['key']) && $_GET['key'] === ADMIN_KEY) {
    try {
        $db = get_testers_db();
        $stmt = $db->query("SELECT email FROM testers ORDER BY id ASC");
        $emails = $stmt->fetchAll(PDO::FETCH_COLUMN);

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="aipbx_play_testers_' . date('Ymd_His') . '.csv"');
        $out = fopen('php://output', 'w');
        fputcsv($out, ['Email Address']);
        foreach ($emails as $email) {
            fputcsv($out, [$email]);
        }
        fclose($out);
        exit;
    } catch (Exception $e) {
        die('Export error: ' . htmlspecialchars($e->getMessage()));
    }
}

// AJAX / Form Kayıt İşlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');

    // Honeypot spam kontrolü
    if (!empty($_POST['website'])) {
        echo json_encode(['success' => false, 'message' => 'Spam detected.']);
        exit;
    }

    $email = strtolower(trim($_POST['email'] ?? ''));
    $name = trim($_POST['name'] ?? '');
    $device = trim($_POST['device'] ?? '');
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';

    $errMsgs = [
        'tr' => 'Lütfen geçerli bir Google Play / Gmail e-posta adresi girin.',
        'en' => 'Please enter a valid Google Play / Gmail email address.',
        'de' => 'Bitte geben Sie eine gültige Google Play / Gmail-E-Mail-Adresse ein.',
        'az' => 'Zəhmət olmasa düzgün bir Google Play / Gmail e-poçt ünvanı daxil edin.'
    ];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'success' => false,
            'message' => $errMsgs[$LANG] ?? $errMsgs['tr']
        ]);
        exit;
    }

    $successMsgs = [
        'tr' => 'Kaydınız başarıyla alındı! Projemize destek verdiğiniz için teşekkürler.',
        'en' => 'Your registration was successful! Thank you for supporting our project.',
        'de' => 'Ihre Registrierung war erfolgreich! Vielen Dank für Ihre Unterstützung.',
        'az' => 'Qeydiyyatınız uğurla tamamlandı! Layihəmizə dəstək verdiyiniz üçün təşəkkür edirik.'
    ];

    $alreadyMsgs = [
        'tr' => 'Bu e-posta adresi zaten test listemizde kayıtlı.',
        'en' => 'This email address is already on our tester list.',
        'de' => 'Diese E-Mail-Adresse ist bereits in unserer Testerliste registriert.',
        'az' => 'Bu e-poçt ünvanı artıq test siyahımızda qeydiyyatdan keçib.'
    ];

    try {
        $db = get_testers_db();
        $stmt = $db->prepare("INSERT INTO testers (email, name, device, ip, user_agent) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$email, $name, $device, $ip, $ua]);

        echo json_encode([
            'success' => true,
            'message' => $successMsgs[$LANG] ?? $successMsgs['tr'],
            'opt_in_url' => PLAY_OPT_IN_URL,
            'play_store_url' => PLAY_STORE_URL
        ]);
    } catch (PDOException $e) {
        if ($e->getCode() == 23000 || str_contains($e->getMessage(), 'UNIQUE')) {
            echo json_encode([
                'success' => true,
                'already_registered' => true,
                'message' => $alreadyMsgs[$LANG] ?? $alreadyMsgs['tr'],
                'opt_in_url' => PLAY_OPT_IN_URL,
                'play_store_url' => PLAY_STORE_URL
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Veritabanı hatası: ' . $e->getMessage()
            ]);
        }
    }
    exit;
}

// Admin Panel Kontrolü
$isAdmin = (isset($_GET['admin']) && $_GET['admin'] === ADMIN_KEY);
$adminTesters = [];
if ($isAdmin) {
    try {
        $db = get_testers_db();
        $adminTesters = $db->query("SELECT * FROM testers ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $adminTesters = [];
    }
}
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($LANG) ?>" data-lang="<?= htmlspecialchars($LANG) ?>">
<head>
    <?php include __DIR__ . '/includes/head.php'; ?>
    <?php include __DIR__ . '/includes/seo-helper.php'; ?>
    <style>
    /* Mobile-first optimizations for Android Test page */
    .android-card {
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 24px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
    }
    .android-full-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border-radius: 8px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s;
        box-sizing: border-box;
    }
    .download-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 12px;
    }
    @media (max-width: 860px) {
        .docs-layout {
            display: block !important;
            padding: 16px 14px 40px !important;
        }
        .docs-sidebar, .docs-toc {
            display: none !important;
        }
        .docs-content {
            max-width: 100% !important;
            padding: 0 !important;
        }
        .docs-header {
            margin-bottom: 16px !important;
        }
        .docs-header h1 {
            font-size: 1.55rem !important;
            line-height: 1.25 !important;
        }
        .docs-breadcrumb {
            font-size: 0.82rem !important;
            margin-bottom: 12px !important;
            flex-wrap: wrap;
        }
        .android-card {
            padding: 18px 14px !important;
            border-radius: 12px !important;
        }
        .android-form-row {
            flex-direction: column !important;
        }
        .android-form-row input,
        .android-form-row button {
            width: 100% !important;
            min-width: 100% !important;
        }
        .android-full-btn {
            width: 100% !important;
            justify-content: center !important;
            text-align: center !important;
            padding: 12px 16px !important;
        }
        .download-grid {
            grid-template-columns: 1fr !important;
        }
    }
    </style>
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
                    <li>
                        <a href="/">
                            <span data-lang="tr">🏠 Genel Bakış (Overview)</span>
                            <span data-lang="en">🏠 Overview (Home)</span>
                            <span data-lang="de">🏠 Übersicht (Home)</span><span data-lang="az">🏠 Ümumi Baxış (Overview)</span>
                        </a>
                    </li>
                    <li>
                        <a href="/architecture" class="">
                            <span data-lang="tr">🏗️ Sistem Mimarisi &amp; ALPN</span>
                            <span data-lang="en">🏗️ Architecture &amp; ALPN</span>
                            <span data-lang="de">🏗️ Architektur &amp; ALPN</span><span data-lang="az">🏗️ Sistem Arxitekturası &amp; ALPN</span>
                        </a>
                    </li>
                    <li>
                        <a href="/features" class="">
                            <span data-lang="tr">⚡ Santral Modülleri</span>
                            <span data-lang="en">⚡ PBX Modules</span>
                            <span data-lang="de">⚡ PBX-Module</span><span data-lang="az">⚡ Santral Modulları</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-group">
                <div class="sidebar-title">
                    <span data-lang="tr">Çağrı Merkezi &amp; Kuyruk</span>
                    <span data-lang="en">Call Center &amp; Queues</span>
                    <span data-lang="de">Callcenter &amp; Warteschlangen</span><span data-lang="az">Çağrı Mərkəzi &amp; Növbə</span>
                </div>
                <ul class="sidebar-menu">
                    <li>
                        <a href="/callcenter" class="">
                            <span data-lang="tr">🎧 Kuyruk Yönetimi</span>
                            <span data-lang="en">🎧 Queue Operations</span>
                            <span data-lang="de">🎧 Warteschlangen-Betrieb</span><span data-lang="az">🎧 Növbə İdarəetməsi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/callcenter#break-codes" class="">
                            <span data-lang="tr">⏸️ Mola Kodları (*22/*23) <span class="sidebar-badge">Yeni</span></span>
                            <span data-lang="en">⏸️ Break Codes (*22/*23) <span class="sidebar-badge">New</span></span>
                            <span data-lang="de">⏸️ Pausencodes (*22/*23) <span class="sidebar-badge">Neu</span></span><span data-lang="az">⏸️ Fasilə Kodları (*22/*23) <span class="sidebar-badge">Yeni</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="/callcenter#wallboard">
                            <span data-lang="tr">📊 Canlı Wallboard &amp; SLA</span>
                            <span data-lang="en">📊 Live Wallboard &amp; SLA</span>
                            <span data-lang="de">📊 Live-Wallboard &amp; SLA</span><span data-lang="az">📊 Canlı Wallboard &amp; SLA</span>
                        </a>
                    </li>
                    <li>
                        <a href="/callcenter#supervisor">
                            <span data-lang="tr">👁️ Süpervizör &amp; Spy (*90)</span>
                            <span data-lang="en">👁️ Supervisor &amp; Spy (*90)</span>
                            <span data-lang="de">👁️ Supervisor &amp; Spy (*90)</span><span data-lang="az">👁️ Supervayzer &amp; Spy (*90)</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-group">
                <div class="sidebar-title">
                    <span data-lang="tr">Mobil İstemciler</span>
                    <span data-lang="en">Mobile Clients</span>
                    <span data-lang="de">Mobile Clients</span><span data-lang="az">Mobil Müştərilər</span>
                </div>
                <ul class="sidebar-menu">
                    <li>
                        <a href="/android" class="active">
                            <span data-lang="tr">🤖 Google Play Kapalı Test <span class="sidebar-badge">Yeni</span></span>
                            <span data-lang="en">🤖 Google Play Closed Test <span class="sidebar-badge">New</span></span>
                            <span data-lang="de">🤖 Google Play Closed-Test <span class="sidebar-badge">Neu</span></span><span data-lang="az">🤖 Google Play Qapalı Test <span class="sidebar-badge">Yeni</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="/mobile-apps" class="">
                            <span data-lang="tr">📱 Android &amp; iOS İstemcileri</span>
                            <span data-lang="en">📱 Android &amp; iOS Clients</span>
                            <span data-lang="de">📱 Android &amp; iOS Clients</span><span data-lang="az">📱 Android &amp; iOS Müştəriləri</span>
                        </a>
                    </li>
                    <li>
                        <a href="/mobile-apps#downloads">
                            <span data-lang="tr">⬇️ APK / IPA / Simulator</span>
                            <span data-lang="en">⬇️ APK / IPA / Simulator</span>
                            <span data-lang="de">⬇️ APK / IPA / Simulator</span><span data-lang="az">⬇️ APK / IPA / Simulator</span>
                        </a>
                    </li>
                    <li>
                        <a href="/mobile-apps#android">
                            <span data-lang="tr">🤖 Kotlin Native &amp; FCM Push</span>
                            <span data-lang="en">🤖 Kotlin Native &amp; FCM Push</span>
                            <span data-lang="de">🤖 Kotlin Native &amp; FCM-Push</span><span data-lang="az">🤖 Kotlin Native &amp; FCM Push</span>
                        </a>
                    </li>
                    <li>
                        <a href="/mobile-apps#ios">
                            <span data-lang="tr">🍏 Swift &amp; CallKit</span>
                            <span data-lang="en">🍏 Swift &amp; CallKit</span>
                            <span data-lang="de">🍏 Swift &amp; CallKit</span><span data-lang="az">🍏 Swift &amp; CallKit</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-group">
                <div class="sidebar-title">
                    <span data-lang="tr">Yönetim &amp; Güvenlik</span>
                    <span data-lang="en">Admin &amp; Security</span>
                    <span data-lang="de">Admin &amp; Sicherheit</span><span data-lang="az">İdarəetmə &amp; Təhlükəsizlik</span>
                </div>
                <ul class="sidebar-menu">
                    <li>
                        <a href="/installation" class="">
                            <span data-lang="tr">🚀 Hızlı Kurulum (install.sh)</span>
                            <span data-lang="en">🚀 Quick Install (install.sh)</span>
                            <span data-lang="de">🚀 Schnellinstallation (install.sh)</span><span data-lang="az">🚀 Sürətli Quraşdırma (install.sh)</span>
                        </a>
                    </li>
                    <li>
                        <a href="/installation#ports">
                            <span data-lang="tr">🌐 Port &amp; Güvenlik Duvarı</span>
                            <span data-lang="en">🌐 Ports &amp; Firewall</span>
                            <span data-lang="de">🌐 Ports &amp; Firewall</span><span data-lang="az">🌐 Port &amp; Təhlükəsizlik Divarı</span>
                        </a>
                    </li>
                    <li>
                        <a href="/security" class="">
                            <span data-lang="tr">🛡️ Güvenlik &amp; Fail2ban</span>
                            <span data-lang="en">🛡️ Security &amp; Fail2ban</span>
                            <span data-lang="de">🛡️ Sicherheit &amp; Fail2ban</span><span data-lang="az">🛡️ Təhlükəsizlik &amp; Fail2ban</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-group">
                <div class="sidebar-title">
                    <span data-lang="tr">Geliştirici &amp; API</span>
                    <span data-lang="en">Developer &amp; API</span>
                    <span data-lang="de">Entwickler &amp; API</span><span data-lang="az">Tərtibatçı &amp; API</span>
                </div>
                <ul class="sidebar-menu">
                    <li>
                        <a href="/api-docs" class="">
                            <span data-lang="tr">🔌 REST API Referansı</span>
                            <span data-lang="en">🔌 REST API Reference</span>
                            <span data-lang="de">🔌 REST-API Referenz</span><span data-lang="az">🔌 REST API Sorğu Kitabçası</span>
                        </a>
                    </li>
                    <li>
                        <a href="/api-docs#websocket">
                            <span data-lang="tr">💬 Go WebSocket Protokolü</span>
                            <span data-lang="en">💬 Go WebSocket Protocol</span>
                            <span data-lang="de">💬 Go WebSocket Protokoll</span><span data-lang="az">💬 Go WebSocket Protokolu</span>
                        </a>
                    </li>
                    <li>
                        <a href="/api-docs#tests">
                            <span data-lang="tr">🧪 PHPUnit Testleri (142 Test)</span>
                            <span data-lang="en">🧪 PHPUnit Test Suite</span>
                            <span data-lang="de">🧪 PHPUnit Test-Suite</span><span data-lang="az">🧪 PHPUnit Testləri (142 Test)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="docs-content">
            <div class="docs-breadcrumb">
                <a href="/">
                    <span data-lang="tr">Ana Sayfa</span><span data-lang="en">Home</span><span data-lang="de">Startseite</span><span data-lang="az">Ana Səhifə</span>
                </a> / 
                <a href="/mobile-apps">
                    <span data-lang="tr">Mobil</span><span data-lang="en">Mobile</span><span data-lang="de">Mobil</span><span data-lang="az">Mobil</span>
                </a> / 
                <span>
                    <span data-lang="tr">Android Test</span><span data-lang="en">Android Test</span><span data-lang="de">Android-Test</span><span data-lang="az">Android Test</span>
                </span>
            </div>

            <div class="docs-header" style="margin-bottom: 20px;">
                <h1>
                    <span data-lang="tr">🤖 AiPBX Android Test</span>
                    <span data-lang="en">🤖 AiPBX Android Test</span>
                    <span data-lang="de">🤖 AiPBX Android Test</span>
                    <span data-lang="az">🤖 AiPBX Android Test</span>
                </h1>
            </div>

            <!-- KART 1: AiPBX Google Grubu (aipbx) -->
            <div class="docs-section" id="google-group" style="margin-bottom: 20px;">
                <div class="android-card">
                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 12px;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <span style="font-size: 2rem; line-height: 1;">👥</span>
                            <div>
                                <h3 style="margin: 0; font-size: 1.18rem; font-weight: 800; color: #0f172a;">AiPBX Google Grubu (aipbx)</h3>
                                <p style="margin: 2px 0 0; font-size: 0.85rem; color: var(--text-muted); font-family: 'JetBrains Mono', monospace;">groups.google.com/g/aipbx</p>
                            </div>
                        </div>
                        <span class="tag-badge tag-green"><?= t('Anında Yetkilendirme', 'Instant Access', 'Sofortiger Zugang', az: 'Dərhal Giriş') ?></span>
                    </div>

                    <p style="color: #475569; font-size: 0.92rem; margin-bottom: 18px; line-height: 1.55;" data-lang="tr">
                        Google Grubu'na katıldığınız anda Android telefonunuzdaki Google Play Store hesabınız otomatik olarak test kullanıcısı olarak yetkilendirilir.
                    </p>
                    <p style="color: #475569; font-size: 0.92rem; margin-bottom: 18px; line-height: 1.55;" data-lang="en">
                        Joining the Google Group automatically authorizes the Google Play Store account on your Android phone as a tester.
                    </p>
                    <p style="color: #475569; font-size: 0.92rem; margin-bottom: 18px; line-height: 1.55;" data-lang="de">
                        Sobald Sie der Google-Gruppe beitreten, wird Ihr Google Play Store-Konto automatisch als Tester autorisiert.
                    </p>
                    <p style="color: #475569; font-size: 0.92rem; margin-bottom: 18px; line-height: 1.55;" data-lang="az">
                        Google Qrupuna qoşulduğunuz anda Android telefonunuzdakı Google Play Store hesabınız avtomatik olaraq test istifadəçisi kimi aktivləşir.
                    </p>

                    <a href="<?= GOOGLE_GROUP_URL ?>" target="_blank" rel="noopener" class="btn-primary android-full-btn" style="background: linear-gradient(135deg, #ea4335 0%, #c5221f 100%); box-shadow: 0 4px 16px rgba(234, 67, 53, 0.35); font-size: 0.95rem; padding: 12px 24px;">
                        <i class="fa-brands fa-google" style="font-size: 1.1rem;"></i>
                        <span><?= t('Google Grubuna Katıl', 'Join Google Group', 'Der Google-Gruppe beitreten', az: 'Google Qrupuna Qoşul') ?></span>
                    </a>
                </div>
            </div>

            <!-- KART 2: Google Play / Gmail E-posta Adresi * -->
            <div class="docs-section" id="signup-form" style="margin-bottom: 20px;">
                <div class="android-card">
                    <form id="testerSignupForm" method="POST" style="display: flex; flex-direction: column; gap: 14px;">
                        <!-- Honeypot -->
                        <div style="display: none;">
                            <label>Leave this empty: <input type="text" name="website" autocomplete="off"></label>
                        </div>

                        <div>
                            <label for="formEmail" style="display: block; font-weight: 700; font-size: 0.95rem; color: #0f172a; margin-bottom: 8px;">
                                <?= t('Google Play / Gmail E-posta Adresi', 'Google Play / Gmail Email Address', 'Google Play / Gmail-E-Mail-Adresse', az: 'Google Play / Gmail E-poçt Ünvanı') ?> <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="android-form-row" style="display: flex; gap: 10px; flex-wrap: wrap;">
                                <input type="email" id="formEmail" name="email" required placeholder="adiniz@gmail.com"
                                    style="flex: 1 1 240px; min-width: 0; width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 12px 16px; font-size: 0.95rem; font-family: inherit; color: #0f172a; background: #f8fafc; transition: all 0.2s; outline: none; box-sizing: border-box;">
                                <button type="submit" id="submitBtn" class="btn-primary android-full-btn" style="flex: 0 0 auto; padding: 12px 22px; font-size: 0.95rem; white-space: nowrap;">
                                    <i class="fa-solid fa-paper-plane"></i>
                                    <span><?= t('Test Listesine Kaydol', 'Join Tester List', 'In Testerliste eintragen', az: 'Test Siyahısına Yazıl') ?></span>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Alert Box -->
                    <div id="formAlert" style="display: none; margin-top: 16px; padding: 14px 16px; border-radius: 8px; font-size: 0.92rem;"></div>

                    <!-- Instant Success Action Box -->
                    <div id="successActionBox" style="display: none; margin-top: 18px; padding: 16px 18px; background: #f0fdf4; border: 1px solid #86efac; border-radius: 10px;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                            <span style="font-size: 1.25rem;">🎉</span>
                            <strong style="color: #166534; font-size: 0.95rem;"><?= t('Kaydınız Onaylandı! Doğrudan İndirebilirsiniz:', 'Registration Confirmed! Download Links:', 'Registrierung bestätigt!', az: 'Qeydiyyatınız Təsdiqləndi! Keçidlər:') ?></strong>
                        </div>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            <a href="<?= PLAY_OPT_IN_URL ?>" target="_blank" rel="noopener" class="btn-primary android-full-btn" style="background: #0284c7; padding: 10px 18px; font-size: 0.88rem;">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                <span><?= t('Web Üzerinden Teste Katıl', 'Join on Web', 'Im Web beitreten', az: 'Vebdə Testə Qoşul') ?></span>
                            </a>
                            <a href="<?= PLAY_STORE_URL ?>" target="_blank" rel="noopener" class="btn-primary android-full-btn" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 10px 18px; font-size: 0.88rem;">
                                <i class="fa-brands fa-google-play"></i>
                                <span><?= t('Google Play\'den İndir', 'Download on Google Play', 'Im Play Store laden', az: 'Google Play-dən Yüklə') ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TEŞEKKÜR KARTI: Projemize destek verdiğiniz için teşekkürler -->
            <div style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.08) 0%, rgba(2, 132, 199, 0.06) 100%); border: 1px solid rgba(16, 185, 129, 0.3); border-radius: 14px; padding: clamp(16px, 4vw, 22px); text-align: center; margin: 20px 0;">
                <div style="font-size: 1.7rem; margin-bottom: 6px;">🤝</div>
                <h3 style="margin: 0; font-size: clamp(1.05rem, 3.5vw, 1.25rem); font-weight: 800; color: #0f172a;">
                    <span data-lang="tr">Projemize destek verdiğiniz için teşekkürler.</span>
                    <span data-lang="en">Thank you for supporting our project.</span>
                    <span data-lang="de">Vielen Dank für Ihre Unterstützung unseres Projekts.</span>
                    <span data-lang="az">Layihəmizə dəstək verdiyiniz üçün təşəkkür edirik.</span>
                </h3>
            </div>

            <!-- İNDİRME BAĞLANTILARI: en alta da evet indirme linklerini tekrar koyalım -->
            <div class="docs-section" id="downloads" style="margin-bottom: 28px;">
                <div class="android-card">
                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 16px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <span style="font-size: 1.6rem; line-height: 1;">⬇️</span>
                            <div>
                                <h3 style="margin: 0; font-size: 1.15rem; font-weight: 800; color: #0f172a;">
                                    <span data-lang="tr">AiPBX Android İndir</span>
                                    <span data-lang="en">Download AiPBX Android</span>
                                    <span data-lang="de">AiPBX Android Herunterladen</span>
                                    <span data-lang="az">AiPBX Android Yüklə</span>
                                </h3>
                                <p style="margin: 2px 0 0; font-size: 0.82rem; color: var(--text-muted); font-family: 'JetBrains Mono', monospace;">
                                    v<?= e($company['androidVersion'] ?? '1.0.58') ?> · Package: com.mhrgl.AiPBX
                                </p>
                            </div>
                        </div>
                        <span class="tag-badge tag-green"><?= e(android_build_label()) ?></span>
                    </div>

                    <div class="download-grid">
                        <!-- 1. Google Play Store -->
                        <a href="<?= PLAY_STORE_URL ?>" target="_blank" rel="noopener" class="btn-primary android-full-btn" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 12px 18px; font-size: 0.92rem;">
                            <i class="fa-brands fa-google-play" style="font-size: 1.1rem;"></i>
                            <span><?= t('Google Play\'den İndir', 'Download on Google Play', 'Im Play Store laden', az: 'Google Play-dən Yüklə') ?></span>
                        </a>

                        <!-- 2. Web Test Opt-In -->
                        <a href="<?= PLAY_OPT_IN_URL ?>" target="_blank" rel="noopener" class="btn-primary android-full-btn" style="background: #0284c7; padding: 12px 18px; font-size: 0.92rem;">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            <span><?= t('Web Üzerinden Teste Katıl', 'Join on Web', 'Im Web beitreten', az: 'Vebdə Testə Qoşul') ?></span>
                        </a>

                        <!-- 3. Doğrudan APK İndir -->
                        <a href="<?= e(download_url('aipbx-latest.apk')) ?>" class="btn-primary android-full-btn" style="background: #0f172a; padding: 12px 18px; font-size: 0.92rem;">
                            <i class="fa-solid fa-download"></i>
                            <span><?= t('Doğrudan APK İndir', 'Download Direct APK', 'Direktes APK Laden', az: 'Birbaşa APK Yüklə') ?> (<?= e(download_size('aipbx-latest.apk')) ?>)</span>
                        </a>
                    </div>
                </div>
            </div>

            <?php if ($isAdmin): ?>
            <!-- SECTION: Admin Panel -->
            <section class="docs-section" id="admin-panel">
                <h2>
                    <span>🔒 Yönetici Paneli — Kayıtlı Test Kullanıcıları</span>
                    <span class="tag-badge tag-green" style="margin-left: 8px;"><?= count($adminTesters) ?> Kullanıcı</span>
                </h2>

                <div style="background: #ffffff; border: 1px solid var(--border); border-radius: 12px; padding: 24px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04); margin: 20px 0;">
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px; margin-bottom: 20px;">
                        <p style="margin: 0; color: #475569;">
                            Google Play Console kapalı test listesine toplu ekleme yapmak için CSV dosyasını indirebilirsiniz.
                        </p>
                        <a href="/android?export=csv&key=<?= ADMIN_KEY ?>" class="btn-primary" style="background: #0284c7;">
                            <i class="fa-solid fa-file-csv"></i>
                            <span>Google Play Uyumlu CSV İndir</span>
                        </a>
                    </div>

                    <div class="docs-table-wrapper">
                        <table class="docs-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>E-posta</th>
                                    <th>Ad Soyad</th>
                                    <th>Cihaz</th>
                                    <th>IP</th>
                                    <th>Kayıt Tarihi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($adminTesters)): ?>
                                <tr>
                                    <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 20px;">Henüz kayıtlı test kullanıcısı yok.</td>
                                </tr>
                                <?php else: ?>
                                <?php foreach ($adminTesters as $t): ?>
                                <tr>
                                    <td><strong><?= e($t['id']) ?></strong></td>
                                    <td><code style="color: #0284c7;"><?= e($t['email']) ?></code></td>
                                    <td><?= e($t['name'] ?: '—') ?></td>
                                    <td><?= e($t['device'] ?: '—') ?></td>
                                    <td><small style="color: var(--text-muted);"><?= e($t['ip']) ?></small></td>
                                    <td><small><?= e($t['created_at']) ?></small></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <!-- Docs Pagination -->
            <div class="docs-pagination">
                <a href="/mobile-apps" class="pagination-btn">
                    <span class="pagination-label">
                        <span data-lang="tr">← Önceki</span>
                        <span data-lang="en">← Previous</span>
                        <span data-lang="de">← Zurück</span><span data-lang="az">← Əvvəlki</span>
                    </span>
                    <span class="pagination-title">
                        <span data-lang="tr">Mobil Softphone Uygulamaları</span>
                        <span data-lang="en">Mobile Softphone Apps</span>
                        <span data-lang="de">Mobile Softphone-Apps</span><span data-lang="az">Mobil Softphone Tətbiqləri</span>
                    </span>
                </a>
                <a href="/installation" class="pagination-btn next">
                    <span class="pagination-label">
                        <span data-lang="tr">Sonraki →</span>
                        <span data-lang="en">Next →</span>
                        <span data-lang="de">Weiter →</span><span data-lang="az">Növbəti →</span>
                    </span>
                    <span class="pagination-title">
                        <span data-lang="tr">Kurulum Rehberi (install.sh)</span>
                        <span data-lang="en">Installation Guide</span>
                        <span data-lang="de">Installationsanleitung</span><span data-lang="az">Quraşdırma Bələdçisi</span>
                    </span>
                </a>
            </div>

        </main>

        <!-- Right Table of Contents (Sticky) -->
        <div class="docs-toc">
            <div class="toc-title">
                <span data-lang="tr">Bu Sayfada</span><span data-lang="en">On This Page</span><span data-lang="de">Auf dieser Seite</span><span data-lang="az">Bu Səhifədə</span>
            </div>
            <ul class="toc-list">
                <li><a href="#google-group">AiPBX Google Grubu</a></li>
                <li><a href="#signup-form"><?= t('E-posta ile Kayıt', 'Email Registration', 'E-Mail-Registrierung', az: 'E-poçtla Qeydiyyat') ?></a></li>
                <li><a href="#downloads"><?= t('İndirme Linkleri', 'Download Links', 'Download-Links', az: 'Yükləmə Keçidləri') ?></a></li>
                <?php if ($isAdmin): ?>
                <li><a href="#admin-panel">Yönetici Paneli</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <!-- Universal Footer -->
    <?php include __DIR__ . '/includes/footer.php'; ?>

    <!-- Interactive Form Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('testerSignupForm');
        const alertBox = document.getElementById('formAlert');
        const successBox = document.getElementById('successActionBox');
        const submitBtn = document.getElementById('submitBtn');

        if (!form) return;

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.7';
            const origHtml = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>Kaydediliyor...</span>';

            alertBox.style.display = 'none';

            try {
                const formData = new FormData(form);
                const res = await fetch('/android', {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });

                const data = await res.json();

                alertBox.style.display = 'block';
                if (data.success) {
                    alertBox.style.background = '#f0fdf4';
                    alertBox.style.border = '1px solid #86efac';
                    alertBox.style.color = '#166534';
                    alertBox.innerHTML = '<i class="fa-solid fa-circle-check" style="margin-right:6px;"></i> ' + data.message;
                    
                    if (successBox) {
                        successBox.style.display = 'block';
                        successBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                    form.reset();
                } else {
                    alertBox.style.background = '#fef2f2';
                    alertBox.style.border = '1px solid #fecaca';
                    alertBox.style.color = '#991b1b';
                    alertBox.innerHTML = '<i class="fa-solid fa-circle-exclamation" style="margin-right:6px;"></i> ' + (data.message || 'Hata oluştu.');
                }
            } catch (err) {
                alertBox.style.display = 'block';
                alertBox.style.background = '#fef2f2';
                alertBox.style.border = '1px solid #fecaca';
                alertBox.style.color = '#991b1b';
                alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation" style="margin-right:6px;"></i> Bağlantı hatası: Lütfen tekrar deneyin.';
            } finally {
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
                submitBtn.innerHTML = origHtml;
            }
        });
    });
    </script>
</body>
</html>
