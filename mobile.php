<?php
/**
 * aipbx.bid — the Android and iOS apps.
 */
$page = 'mobile';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/content.php';
$head = [t('AiPBX mobil: Android ve iOS SIP softphone', 'AiPBX mobile: Android and iOS SIP softphone', 'AiPBX mobil: SIP-Softphone für Android und iOS', az: 'AiPBX mobil: Android və iOS SIP softphone'),
    t('Dahiliniz cebinizde: SIP ve WebRTC ile sesli ve görüntülü arama, sohbet ve rehber; uygulama yalnızca kendi santralinize bağlanır.', 'Your extension in your pocket: voice and video calls over SIP and WebRTC, chat and the directory; the app talks only to your own PBX.', 'Ihre Nebenstelle in der Tasche: Sprach- und Videoanrufe über SIP und WebRTC, Chat und Telefonbuch; nur mit Ihrer eigenen Anlage.', az: 'Daxili nömrəniz cibinizdə: SIP və WebRTC ilə səsli və görüntülü zəng, söhbət və kataloq; tətbiq yalnız öz santralınıza qoşulur.')];
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
    <?php include __DIR__ . '/includes/sections/apps.php'; ?>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
