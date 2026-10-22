<?php
/**
 * aipbx.bid — features, portal screenshots, FAQ and sponsoring.
 */
$page = 'features';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/content.php';
$head = [t('AiPBX özellikleri: yapay zekâ destekli açık kaynak IP santral', 'AiPBX features: the open-source IP PBX with AI', 'AiPBX Funktionen: die Open-Source-IP-Telefonanlage mit KI', az: 'AiPBX xüsusiyyətləri: süni intellektli açıq mənbəli IP santral'),
    t('SIP ve VoIP santralde ne gerekiyorsa tek portalda: dahililer, SIP trunk, IVR, kuyruklar, çağrı merkezi, faks, WebRTC ve yerel yapay zekâ.', 'Everything a SIP and VoIP phone system needs, in one portal: extensions, SIP trunks, IVR, queues, a call center, fax, WebRTC and local AI.', 'Alles, was eine SIP- und VoIP-Telefonanlage braucht, in einem Portal: Nebenstellen, SIP-Trunks, IVR, Warteschlangen, Callcenter, Fax, WebRTC und lokale KI.', az: 'SIP və VoIP santralda lazım olan hər şey bir portalda: daxili nömrələr, SIP trunk, IVR, növbələr, çağrı mərkəzi, faks, WebRTC və yerli süni intellekt.')];
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
    <?php include __DIR__ . '/includes/sections/features.php'; ?>
    <?php include __DIR__ . '/includes/sections/screens.php'; ?>
    <?php include __DIR__ . '/includes/sections/faq.php'; ?>
    <?php include __DIR__ . '/includes/sections/sponsor.php'; ?>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
