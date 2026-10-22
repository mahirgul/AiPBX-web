<?php
/**
 * aipbx.bid — all videos in the page language.
 */
$page = 'videos';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/content.php';
$head = [t('AiPBX videoları', 'AiPBX videos', 'AiPBX Videos', az: 'AiPBX videoları'),
    t('IP santralin kurulumu ve yönetim paneli adım adım, anlatım ve altyazıyla.', 'The IP PBX installation and the admin portal step by step, narrated and subtitled.', 'Installation und Verwaltungsportal der IP-Telefonanlage Schritt für Schritt, mit Sprecher und Untertiteln.', az: 'IP santralın quraşdırılması və idarəetmə paneli addım-addım, səsli izah və altyazı ilə.')];
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
    <?php include __DIR__ . '/includes/sections/videos.php'; ?>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
