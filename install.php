<?php
/**
 * aipbx.bid — installation: command, steps, requirements and the install video.
 */
$page = 'install';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/content.php';
$head = [t('AiPBX kurulumu: IP santral tek komutla', 'Install AiPBX: an IP PBX in one command', 'AiPBX installieren: eine IP-Telefonanlage mit einem Befehl', az: 'AiPBX quraşdırılması: bir əmrlə IP santral'),
    t('Temiz bir Linux sunucuda (Ubuntu 26.04+, Debian 13+, Raspberry Pi OS) Asterisk 22, PJSIP, WebRTC, SIP/TLS, sertifika ve güvenlik duvarı birlikte kurulur; yaklaşık 15 dakika sürer.',
      'On a clean Linux server (Ubuntu 26.04+, Debian 13+, Raspberry Pi OS) it sets up Asterisk 22, PJSIP, WebRTC, SIP over TLS, certificates and the firewall; it takes about 15 minutes.',
      'Auf einem frischen Linux-Server (Ubuntu 26.04+, Debian 13+, Raspberry Pi OS) richtet es Asterisk 22, PJSIP, WebRTC, SIP über TLS, Zertifikate und Firewall ein; etwa 15 Minuten.',
      az: 'Təmiz Linux serverdə (Ubuntu 26.04+, Debian 13+, Raspberry Pi OS) Asterisk 22, PJSIP, WebRTC, TLS üzərindən SIP, sertifikat və firewall birlikdə qurulur; təxminən 15 dəqiqə çəkir.')];
$videoKinds = ['install'];
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
    <?php include __DIR__ . '/includes/sections/install.php'; ?>
    <?php include __DIR__ . '/includes/sections/videos.php'; ?>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
