<?php
/**
 * AiPBX.bid — Language-Aware 404 Error Page
 * Standalone: avoids includes/data.php so 404 responses never trigger Accept-Language redirects or cookies.
 */
http_response_code(404);
header('X-Robots-Tag: noindex, nofollow');
header('Content-Type: text/html; charset=UTF-8');

$rawUri = (string) ($_SERVER['REDIRECT_URL'] ?? $_SERVER['REQUEST_URI'] ?? '/');
$path = (string) (parse_url($rawUri, PHP_URL_PATH) ?? '/');

$isDemo = false;
$lang = 'en';

if (preg_match('#^/demo/(en|tr|de)(?:/|$)#i', $path, $m)) {
    $lang = strtolower($m[1]);
    $isDemo = true;
} elseif (preg_match('#^/demo(?:/|$)#i', $path)) {
    $lang = 'en';
    $isDemo = true;
} elseif (preg_match('#^/(tr|de|az)(?:/|$)#i', $path, $m)) {
    $lang = strtolower($m[1]);
}

header('Content-Language: ' . $lang);

$copy = [
    'en' => [
        'title' => 'AiPBX — 404 Page Not Found',
        'heading' => 'Page Not Found',
        'site_text' => 'The page you are looking for may have been removed or its URL may have changed.',
        'demo_text' => 'This page does not exist in the interactive demo, or the link has moved.',
        'demo_btn' => 'Back to Live Demo',
        'home_btn' => 'Back to Home',
        'home_href' => '/',
        'demo_href' => '/demo/en/dashboard/',
    ],
    'tr' => [
        'title' => 'AiPBX — 404 Sayfa Bulunamadı',
        'heading' => 'Sayfa Bulunamadı',
        'site_text' => 'Aradığınız sayfa kaldırılmış veya bağlantı adresi değişmiş olabilir.',
        'demo_text' => 'Bu sayfa canlı demoda bulunmuyor veya bağlantı adresi değişmiş olabilir.',
        'demo_btn' => 'Canlı Demoya Dön',
        'home_btn' => 'Ana Sayfaya Dön',
        'home_href' => '/tr/',
        'demo_href' => '/demo/tr/dashboard/',
    ],
    'de' => [
        'title' => 'AiPBX — 404 Seite nicht gefunden',
        'heading' => 'Seite nicht gefunden',
        'site_text' => 'Die gesuchte Seite wurde möglicherweise entfernt oder ihre Adresse hat sich geändert.',
        'demo_text' => 'Diese Seite existiert in der Live-Demo nicht oder der Link hat sich geändert.',
        'demo_btn' => 'Zurück zur Live-Demo',
        'home_btn' => 'Zur Startseite',
        'home_href' => '/de/',
        'demo_href' => '/demo/de/dashboard/',
    ],
    'az' => [
        'title' => 'AiPBX — 404 Səhifə tapılmadı',
        'heading' => 'Səhifə tapılmadı',
        'site_text' => 'Axtardığınız səhifə silinmiş və ya keçid ünvanı dəyişmiş ola bilər.',
        'demo_text' => 'Bu səhifə canlı demoda mövcud deyil və ya keçid ünvanı dəyişmiş ola bilər.',
        'demo_btn' => 'Canlı Demoya Qayıt',
        'home_btn' => 'Ana Səhifəyə Qayıt',
        'home_href' => '/az/',
        'demo_href' => '/demo/en/dashboard/',
    ],
];

$t = $copy[$lang] ?? $copy['en'];
$e = static fn(string $v): string => htmlspecialchars($v, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="<?= $e($lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $e($t['title']) ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f8fafc;
            color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            text-align: center;
            padding: 20px;
        }
        .error-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 48px 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
            max-width: 520px;
            width: 100%;
        }
        .error-code {
            font-size: 5rem;
            font-weight: 800;
            color: #0284c7;
            line-height: 1;
            margin-bottom: 16px;
        }
        h1 { font-size: 1.5rem; font-weight: 700; color: #0f172a; margin: 0 0 12px; }
        p { color: #64748b; font-size: 0.98rem; line-height: 1.6; margin: 0 0 24px; }
        .actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
        }
        .btn-home, .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 22px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s, border-color 0.2s;
        }
        .btn-home {
            background: #0284c7;
            color: #ffffff;
        }
        .btn-home:hover { background: #0369a1; }
        .btn-secondary {
            background: #f1f5f9;
            color: #0f172a;
            border: 1px solid #cbd5e1;
        }
        .btn-secondary:hover { background: #e2e8f0; }
    </style>
</head>
<body>
    <main class="error-card">
        <div class="error-code">404</div>
        <h1><?= $e($t['heading']) ?></h1>
        <p><?= $e($isDemo ? $t['demo_text'] : $t['site_text']) ?></p>
        <div class="actions">
            <?php if ($isDemo): ?>
            <a href="<?= $e($t['demo_href']) ?>" class="btn-home">
                <i class="fa-solid fa-display" aria-hidden="true"></i>
                <span><?= $e($t['demo_btn']) ?></span>
            </a>
            <a href="<?= $e($t['home_href']) ?>" class="btn-secondary">
                <i class="fa-solid fa-house" aria-hidden="true"></i>
                <span><?= $e($t['home_btn']) ?></span>
            </a>
            <?php else: ?>
            <a href="<?= $e($t['home_href']) ?>" class="btn-home">
                <i class="fa-solid fa-house" aria-hidden="true"></i>
                <span><?= $e($t['home_btn']) ?></span>
            </a>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
