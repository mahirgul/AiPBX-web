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

    $groupReqMsgs = [
        'tr' => 'Lütfen önce 1. Adımdaki kırmızı butona tıklayarak Google Grubu\'na katılın.',
        'en' => 'Please first join the Google Group by clicking the Step 1 button.',
        'de' => 'Bitte treten Sie zuerst über die Schaltfläche in Schritt 1 der Google-Gruppe bei.',
        'az' => 'Zəhmət olmasa əvvəlcə 1-ci Addımdakı düyməyə klikləyərək Google Qrupuna qoşulun.'
    ];

    if (empty($_POST['group_confirmed']) || $_POST['group_confirmed'] !== '1') {
        echo json_encode([
            'success' => false,
            'message' => $groupReqMsgs[$LANG] ?? $groupReqMsgs['tr']
        ]);
        exit;
    }

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
        'tr' => 'Kaydınız başarıyla alındı! Demo santral hesabınız oluşturuluyor. 1. Adımda Google Grubu\'na katıldığınız Google hesabınızla aşağıdaki bağlantılardan uygulamayı hemen indirebilirsiniz.',
        'en' => 'Registration received! Your demo PBX account is being created. You can now download the app below using the Google account you joined the group with.',
        'de' => 'Registrierung erhalten! Ihr Demo-Konto wird erstellt. Sie können die App jetzt unten mit dem Google-Konto aus Schritt 1 herunterladen.',
        'az' => 'Qeydiyyatınız qəbul edildi! Demo santral hesabınız yaradılır. 1-ci Addımda Google Qrupuna qoşulduğunuz Google hesabı ilə tətbiqi yükləyə bilərsiniz.'
    ];

    $alreadyMsgs = [
        'tr' => 'Bu e-posta adresi zaten test listemizde kayıtlı. 1. Adımda gruba katıldıysanız aşağıdaki bağlantılardan doğrudan indirebilirsiniz.',
        'en' => 'This email is already registered. If you joined the group in Step 1, you can download immediately below.',
        'de' => 'Diese E-Mail-Adresse ist bereits registriert. Wenn Sie der Gruppe beigetreten sind, können Sie unten direkt herunterladen.',
        'az' => 'Bu e-poçt ünvanı artıq qeydiyyatdan keçib. 1-ci Addımda qrupa qoşulmusunuzsa, dərhal yükləyə bilərsiniz.'
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
    .docs-layout.android-single { display: block; max-width: 900px; margin: 0 auto; }
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

    <div class="docs-layout android-single">

        <!-- Left Sidebar Navigation -->

        <!-- Main Content Area -->
        <main class="docs-content">
            <div class="docs-breadcrumb">
                <a href="/">
                    <span data-lang="tr">Ana Sayfa</span><span data-lang="en">Home</span><span data-lang="de">Startseite</span><span data-lang="az">Ana Səhifə</span>
                </a> / 
                <a href="/#apps">
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

            <!-- KART 1: 1. Adım — AiPBX Google Grubu (Zorunlu) -->
            <div class="docs-section" id="google-group" style="margin-bottom: 20px;">
                <div class="android-card" style="border: 2px solid rgba(234, 67, 53, 0.4); background: #ffffff;">
                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 12px;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <span style="font-size: 2rem; line-height: 1;">👥</span>
                            <div>
                                <h3 style="margin: 0; font-size: 1.18rem; font-weight: 800; color: #0f172a;">
                                    <?= t('1. Adım: AiPBX Google Grubu (Zorunlu)', 'Step 1: AiPBX Google Group (Required)', 'Schritt 1: AiPBX Google-Gruppe (Erforderlich)', az: '1-ci Addım: AiPBX Google Qrupu (Məcburi)') ?>
                                </h3>
                                <p style="margin: 2px 0 0; font-size: 0.85rem; color: var(--text-muted); font-family: 'JetBrains Mono', monospace;">groups.google.com/g/aipbx</p>
                            </div>
                        </div>
                        <span id="groupStepBadge" class="tag-badge" style="background:#fee2e2; color:#b91c1c; border:1px solid #fca5a5;">
                            <i class="fa-solid fa-triangle-exclamation" style="margin-right:4px;"></i> <?= t('Önce Buraya Katılın', 'Join Here First', 'Zuerst beitreten', az: 'Əvvəlcə Bura Qoşulun') ?>
                        </span>
                    </div>

                    <div style="background: #fff5f5; border-left: 4px solid #ea4335; padding: 12px 16px; border-radius: 6px; margin-bottom: 16px;">
                        <p style="color: #991b1b; font-size: 0.92rem; margin: 0; line-height: 1.55; font-weight: 600;" data-lang="tr">
                            ⚠️ Google Play kapalı test kuralları gereği, testçi yetkinizin açılması için Google Grubu'na katılmanız zorunludur. Alttaki forma mail yazsanız dahi, Google hesabınızla bu gruba katılmadığınız sürece Google Play Store uygulamayı indirmenize izin vermez.
                        </p>
                        <p style="color: #991b1b; font-size: 0.92rem; margin: 0; line-height: 1.55; font-weight: 600;" data-lang="en">
                            ⚠️ Per Google Play Closed Testing rules, joining the Google Group is required to unlock tester access. Even if you submit your email below, Google Play will not allow you to download unless you join the group with your Google account.
                        </p>
                        <p style="color: #991b1b; font-size: 0.92rem; margin: 0; line-height: 1.55; font-weight: 600;" data-lang="de">
                            ⚠️ Gemäß den Richtlinien für Google Play Closed Testing müssen Sie der Google-Gruppe beitreten. Ohne Beitritt mit Ihrem Google-Konto erlaubt der Play Store keinen Download.
                        </p>
                        <p style="color: #991b1b; font-size: 0.92rem; margin: 0; line-height: 1.55; font-weight: 600;" data-lang="az">
                            ⚠️ Google Play qapalı test qaydalarına əsasən, testçi icazənizin açılması üçün Google Qrupuna qoşulmağınız məcburidir. Qrupa qoşulmadığınız halda Google Play tətbiqi yükləməyə icazə verməyəcək.
                        </p>
                    </div>

                    <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                        <a href="<?= GOOGLE_GROUP_URL ?>" target="_blank" rel="noopener" id="btnJoinGroup" class="btn-primary android-full-btn" style="background: linear-gradient(135deg, #ea4335 0%, #c5221f 100%); box-shadow: 0 4px 16px rgba(234, 67, 53, 0.35); font-size: 1rem; padding: 14px 26px; font-weight: 700;">
                            <i class="fa-brands fa-google" style="font-size: 1.15rem;"></i>
                            <span><?= t('1. Adım: Google Grubuna Katıl (Zorunlu) →', 'Step 1: Join Google Group (Required) →', 'Schritt 1: Google-Gruppe beitreten (Erforderlich) →', az: '1-ci Addım: Google Qrupuna Qoşul (Məcburi) →') ?></span>
                        </a>
                        <button type="button" id="btnAlreadyJoined" class="btn-secondary" style="font-size: 0.88rem; padding: 10px 16px; border: 1px dashed #94a3b8; background: transparent; color: #475569; cursor: pointer;">
                            <i class="fa-solid fa-check-double" style="margin-right: 4px;"></i>
                            <?= t('Zaten gruba katıldım, 2. Adıma geç', 'Already joined the group, proceed to Step 2', 'Bereits beigetreten, weiter zu Schritt 2', az: 'Artıq qrupa qoşulmuşam, 2-ci Addıma keç') ?>
                        </button>
                    </div>
                </div>
            </div>

            <!-- KART 2: 2. Adım — Google Play / Gmail E-posta Adresi * -->
            <div class="docs-section" id="signup-form" style="margin-bottom: 20px;">
                <div class="android-card" id="step2Card" style="transition: all 0.3s ease;">
                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 12px;">
                        <h3 style="margin: 0; font-size: 1.15rem; font-weight: 800; color: #0f172a;">
                            <?= t('2. Adım: Google Play / Gmail E-posta Adresi', 'Step 2: Google Play / Gmail Email Address', 'Schritt 2: Google Play / Gmail-E-Mail-Adresse', az: '2-ci Addım: Google Play / Gmail E-poçt Ünvanı') ?> <span style="color: #ef4444;">*</span>
                        </h3>
                        <span id="step2Badge" class="tag-badge" style="background: #f1f5f9; color: #64748b;">
                            <i class="fa-solid fa-lock" style="margin-right: 4px;"></i> <?= t('1. Adım Bekleniyor', 'Step 1 Required', 'Schritt 1 erforderlich', az: '1-ci Addım Tələb Olunur') ?>
                        </span>
                    </div>

                    <!-- Kilit / Bilgilendirme Uyarısı -->
                    <div id="step2LockNotice" style="background: #fffbeb; border: 1px solid #fde68a; color: #92400e; padding: 12px 16px; border-radius: 8px; margin-bottom: 14px; font-size: 0.92rem; display: flex; align-items: center; gap: 10px;">
                        <i class="fa-solid fa-lock" style="font-size: 1.1rem; color: #d97706; flex-shrink: 0;"></i>
                        <span>
                            <?= t(
                                'Bu formun açılması için lütfen önce yukarıdaki <strong>1. Adım: Google Grubuna Katıl</strong> butonuna tıklayın. Gruba katıldıktan sonra form kilidi otomatik olarak açılacaktır.',
                                'To unlock this form, please click the <strong>Step 1: Join Google Group</strong> button above. Once clicked, this form will be unlocked automatically.',
                                'Um dieses Formular freizuschalten, klicken Sie bitte oben auf <strong>Schritt 1: Google-Gruppe beitreten</strong>.',
                                az: 'Bu formun açılması üçün zəhmət olmasa yuxarıdakı <strong>1-ci Addım: Google Qrupuna Qoşul</strong> düyməsinə klikləyin.'
                            ) ?>
                        </span>
                    </div>

                    <!-- Kilit Açıldı Onay Uyarısı (Başlangıçta gizli) -->
                    <div id="step2UnlockedNotice" style="display: none; background: #f0fdf4; border: 1px solid #86efac; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 14px; font-size: 0.92rem;">
                        <i class="fa-solid fa-circle-check" style="color: #16a34a; margin-right: 6px;"></i>
                        <?= t(
                            '<strong>1. Adım Onaylandı!</strong> Lütfen Google Grubu\'na katıldığınız aynı Gmail adresinizi girin (bu adrese demo santral hesabı tanımlanacaktır):',
                            '<strong>Step 1 Confirmed!</strong> Please enter the same Gmail address you used for the Google Group (a demo PBX account will be created):',
                            '<strong>Schritt 1 bestätigt!</strong> Bitte geben Sie dieselbe Gmail-Adresse ein, mit der Sie der Gruppe beigetreten sind:',
                            az: '<strong>1-ci Addım Təsdiqləndi!</strong> Zəhmət olmasa Google Qrupuna qoşulduğunuz eyni Gmail ünvanını daxil edin:'
                        ) ?>
                    </div>

                    <form id="testerSignupForm" method="POST" style="display: flex; flex-direction: column; gap: 14px;">
                        <!-- Honeypot -->
                        <div style="display: none;">
                            <label>Leave this empty: <input type="text" name="website" autocomplete="off"></label>
                        </div>
                        <input type="hidden" name="group_confirmed" id="groupConfirmedInput" value="0">

                        <div>
                            <div class="android-form-row" style="display: flex; gap: 10px; flex-wrap: wrap;">
                                <input type="email" id="formEmail" name="email" required placeholder="adiniz@gmail.com" disabled
                                    style="flex: 1 1 240px; min-width: 0; width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 12px 16px; font-size: 0.95rem; font-family: inherit; color: #0f172a; background: #e2e8f0; opacity: 0.7; cursor: not-allowed; transition: all 0.2s; outline: none; box-sizing: border-box;">
                                <button type="submit" id="submitBtn" class="btn-primary android-full-btn" disabled style="flex: 0 0 auto; padding: 12px 22px; font-size: 0.95rem; white-space: nowrap; opacity: 0.6; cursor: not-allowed;">
                                    <i class="fa-solid fa-paper-plane"></i>
                                    <span><?= t('Test Listesine Kaydol & Demo Al', 'Register & Get Demo Account', 'Registrieren & Demo erhalten', az: 'Testə Yazıl & Demo Al') ?></span>
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
                            <strong style="color: #166534; font-size: 0.95rem;"><?= t('Kaydınız ve Demo Santral Hesabınız Hazır!', 'Registration & Demo PBX Account Ready!', 'Registrierung & Demo-Account bereit!', az: 'Qeydiyyatınız və Demo Hesabınız Hazırdır!') ?></strong>
                        </div>
                        <p style="margin: 0 0 14px 0; font-size: 0.88rem; color: #15803d; line-height: 1.5;">
                            <?= t(
                                '1. Adımda Google Grubu\'na katıldığınız Google hesabınızla aşağıdaki bağlantılardan uygulamayı hemen indirebilirsiniz:',
                                'With the Google account you used to join the Google Group in Step 1, you can now download the app via the links below:',
                                'Mit dem Google-Konto aus Schritt 1 können Sie die App jetzt über folgende Links laden:',
                                az: '1-ci Addımda Google Qrupuna qoşulduğunuz Google hesabı ilə tətbiqi dərhal yükləyə bilərsiniz:'
                            ) ?>
                        </p>
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
                                    v<?= e($company['androidVersion'] ?? '1.0.79') ?> · Package: com.mhrgl.AiPBX
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

        </main>

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
        const emailInput = document.getElementById('formEmail');
        const lockNotice = document.getElementById('step2LockNotice');
        const unlockedNotice = document.getElementById('step2UnlockedNotice');
        const groupConfirmed = document.getElementById('groupConfirmedInput');
        const groupStepBadge = document.getElementById('groupStepBadge');
        const step2Badge = document.getElementById('step2Badge');
        const btnJoinGroup = document.getElementById('btnJoinGroup');
        const btnAlreadyJoined = document.getElementById('btnAlreadyJoined');
        const step2Card = document.getElementById('step2Card');

        function unlockStep2(autoScroll) {
            sessionStorage.setItem('aipbx_group_joined', '1');
            if (groupConfirmed) groupConfirmed.value = '1';
            
            if (emailInput) {
                emailInput.disabled = false;
                emailInput.style.background = '#ffffff';
                emailInput.style.opacity = '1';
                emailInput.style.cursor = 'text';
            }
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
                submitBtn.style.cursor = 'pointer';
            }
            if (lockNotice) lockNotice.style.display = 'none';
            if (unlockedNotice) unlockedNotice.style.display = 'block';
            
            if (groupStepBadge) {
                groupStepBadge.className = 'tag-badge tag-green';
                groupStepBadge.style.background = '#dcfce7';
                groupStepBadge.style.color = '#15803d';
                groupStepBadge.style.borderColor = '#86efac';
                groupStepBadge.innerHTML = '<i class="fa-solid fa-check"></i> ' + (document.documentElement.lang === 'tr' ? '1. Adım Tamam' : 'Step 1 Done');
            }
            if (step2Badge) {
                step2Badge.className = 'tag-badge tag-green';
                step2Badge.style.background = '#dcfce7';
                step2Badge.style.color = '#15803d';
                step2Badge.style.borderColor = '#86efac';
                step2Badge.innerHTML = '<i class="fa-solid fa-unlock"></i> ' + (document.documentElement.lang === 'tr' ? 'Aktif' : 'Active');
            }
            if (step2Card) {
                step2Card.style.borderColor = '#10b981';
                step2Card.style.boxShadow = '0 0 0 2px rgba(16, 185, 129, 0.2)';
            }
            if (autoScroll && emailInput) {
                setTimeout(function() {
                    emailInput.focus();
                    if (step2Card) {
                        step2Card.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }, 300);
            }
        }

        // Kullanıcı daha önce gruba tıkladıysa kilidi açık tut
        if (sessionStorage.getItem('aipbx_group_joined') === '1') {
            unlockStep2(false);
        }

        if (btnJoinGroup) {
            btnJoinGroup.addEventListener('click', function() {
                unlockStep2(true);
            });
        }

        if (btnAlreadyJoined) {
            btnAlreadyJoined.addEventListener('click', function(e) {
                e.preventDefault();
                unlockStep2(true);
            });
        }

        if (!form) return;

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            if (groupConfirmed && groupConfirmed.value !== '1') {
                alertBox.style.display = 'block';
                alertBox.style.background = '#fef2f2';
                alertBox.style.border = '1px solid #fecaca';
                alertBox.style.color = '#991b1b';
                alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation" style="margin-right:6px;"></i> Lütfen önce 1. Adımdaki Google Grubu butonuna tıklayın.';
                return;
            }

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
