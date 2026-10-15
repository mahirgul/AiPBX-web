<?php
/**
 * AiPBX.bid — Documentation (/docs, /docs/<name>)
 *
 * Single source: this page shows the docs/*.md of the AiPBX repository with the
 * repository's own renderer (web/src/services/DocsService.php), the same text
 * the admin portal shows under Admin → Help and GitHub shows in docs/. Nothing
 * is written here: sync-docs.sh pulls the repository every hour into
 * ../aipbx-docs, so a change to a document reaches GitHub, the portal and this
 * site from one commit. The documents are English only.
 */
$page = 'docs';
require_once __DIR__ . '/includes/data.php';

const DOCS_SRC = __DIR__ . '/../aipbx-docs';
putenv('AIPBX_DOCS_DIR=' . DOCS_SRC . '/docs');
if (!is_file(DOCS_SRC . '/web/src/services/DocsService.php')) {
    // sync-docs.sh has not run yet: point to GitHub instead of failing.
    http_response_code(503);
    header('Retry-After: 3600');
    echo '<!DOCTYPE html><meta charset="utf-8"><title>AiPBX Documentation</title>'
        . '<p>The documentation is being prepared. Meanwhile read it on '
        . '<a href="https://github.com/mahirgul/AiPBX/tree/main/docs">GitHub</a>.</p>';
    exit;
}
require_once DOCS_SRC . '/web/src/services/DocsService.php';
DocsService::$docUrl  = '/docs/';
DocsService::$repoUrl = 'https://github.com/mahirgul/AiPBX/blob/main';

$docs    = DocsService::list();
$current = (string) ($_GET['doc'] ?? '');
if ($current === '') {
    $current = 'README';
}
$query   = trim(mb_substr((string) ($_GET['q'] ?? ''), 0, 100));
$source  = DocsService::source($current);
if ($source === null && $query === '') {
    http_response_code(404);
    $current = 'README';
    $source  = DocsService::source($current) ?? '';
    $notFound = true;
}
$title = $current;
foreach ($docs as $d) {
    if ($d['name'] === $current) {
        $title = $d['title'];
    }
}
$html = $query === '' ? DocsService::render((string) $source) : '';
$results = $query !== '' ? DocsService::search($query) : [];

// "On this page": the second-level headings of the document.
preg_match_all('~<h2 id="([^"]*)">(.*?)</h2>~', $html, $toc, PREG_SET_ORDER);

// SEO: one page per document; the first paragraph is the description.
$firstPara = '';
if (preg_match('~<p>(.*?)</p>~s', $html, $m)) {
    $firstPara = trim(preg_replace('/\s+/', ' ', strip_tags($m[1])));
}
$seoOverride = [
    'title' => $title . ' — AiPBX Documentation',
    'desc'  => mb_strimwidth($firstPara !== '' ? $firstPara : 'AiPBX documentation: ' . $title, 0, 160, '…'),
    'slug'  => '/docs/' . $current,
];
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="<?= $h($LANG) ?>" data-lang="<?= $h($LANG) ?>">
<head>
    <?php include __DIR__ . '/includes/head.php'; ?>
    <?php include __DIR__ . '/includes/seo-helper.php'; ?>
    <?php if ($query !== '' || !empty($notFound)): ?><meta name="robots" content="noindex, follow"><?php endif; ?>
    <link rel="stylesheet" href="/css/docs-md.css?v=1.0.0">
</head>

<body>
    <?php include __DIR__ . '/includes/navbar.php'; ?>

    <div class="docs-layout<?= ($query !== '' || count($toc) < 2) ? ' no-toc' : '' ?>">

        <aside class="docs-sidebar" lang="en">
            <form class="sidebar-search" method="GET" action="/docs">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="search" name="q" value="<?= $h($query) ?>" maxlength="100" placeholder="Search the documentation...">
            </form>
            <div class="sidebar-group">
                <div class="sidebar-title"><span>Documentation</span></div>
                <ul class="sidebar-menu">
                    <?php foreach ($docs as $d): ?>
                        <li><a href="/docs/<?= $h($d['name']) ?>" class="<?= ($query === '' && $d['name'] === $current) ? 'active' : '' ?>"><?= $h($d['title']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </aside>

        <main class="docs-content" lang="en">
            <div class="docs-breadcrumb">
                <a href="/"><?= t('Ana Sayfa', 'Home', 'Startseite', az: 'Ana Səhifə') ?></a> /
                <a href="/docs">Documentation</a>
                <?php if ($query === ''): ?> / <span><?= $h($title) ?></span><?php endif; ?>
            </div>

            <?php if ($LANG !== 'en'): ?>
                <p class="docs-md-lang"><?= t(
                    'Teknik dokümantasyon yalnızca İngilizcedir; GitHub ve AiPBX portalındaki (Yönetim → Yardım) metinle aynıdır.',
                    'The technical documentation is in English only.',
                    'Die technische Dokumentation ist nur auf Englisch verfügbar; sie ist identisch mit GitHub und dem AiPBX-Portal (Admin → Help).',
                    az: 'Texniki sənədlər yalnız ingilis dilindədir; GitHub və AiPBX portalındakı (Admin → Help) mətnlə eynidir.'
                ) ?></p>
            <?php endif; ?>

            <?php if ($query !== ''): ?>
                <div class="docs-header"><h1>Search: <?= $h($query) ?></h1></div>
                <section class="docs-section docs-md">
                    <?php if ($results === []): ?><p>Nothing found.</p><?php endif; ?>
                    <?php foreach ($results as $r): ?>
                        <h3><a href="/docs/<?= $h($r['name']) ?>"><?= $h($r['title']) ?></a></h3>
                        <ul>
                            <?php foreach ($r['hits'] as $hit): ?>
                                <li><a href="/docs/<?= $h($r['name']) ?><?= $hit['anchor'] !== '' ? '#' . $h($hit['anchor']) : '' ?>"><?= $h(mb_strimwidth($hit['line'], 0, 220, '…')) ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                </section>
            <?php else: ?>
                <?php if (!empty($notFound)): ?><p class="docs-md-lang">This document does not exist; here is the overview.</p><?php endif; ?>
                <article class="docs-section docs-md"><?= $html ?></article>
                <p class="docs-md-edit">
                    <a href="https://github.com/mahirgul/AiPBX/blob/main/docs/<?= $h($current) ?>.md" target="_blank" rel="noopener">
                        <i class="fa-brands fa-github"></i> View or edit this page on GitHub
                    </a>
                </p>
            <?php endif; ?>
        </main>

        <?php if ($query === '' && count($toc) >= 2): ?>
            <div class="docs-toc">
                <div class="toc-title">On This Page</div>
                <ul class="toc-list">
                    <?php foreach ($toc as $t): ?>
                        <li><a href="#<?= $t[1] ?>"><?= strip_tags($t[2]) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
