<?php
/**
 * aipbx.bid — Contact & Direct Channels with the Creator & Project Lead.
 */
$page = 'contact';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/content.php';
$head = [
    t('İletişim & Destek', 'Contact & Support', 'Kontakt & Support', az: 'Əlaqə & Dəstək'),
    t('AiPBX kurumsal telefon santrali, teknik destek, VoIP danışmanlığı veya iş birliği için doğrudan iletişim kanalları.',
      'Direct communication channels with the project creator for AiPBX inquiries, enterprise VoIP consultancy, technical support, and partnerships.',
      'Direkte Kommunikationskanäle mit der Projektleitung für AiPBX-Anfragen, VoIP-Beratung, Support und Partnerschaften.',
      az: 'AiPBX korporativ santralı, texniki dəstək, VoIP məsləhəti və ya əməkdaşlıq üçün birbaşa əlaqə vasitələri.')
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
    <?php include __DIR__ . '/includes/sections/contact.php'; ?>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
