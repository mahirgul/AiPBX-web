#!/bin/sh
# aipbx.bid/docs — keeps the documentation in step with the AiPBX repository.
#
# The site shows docs/*.md of github.com/mahirgul/AiPBX with the repository's
# own renderer (web/src/services/DocsService.php), the same text the AiPBX portal
# shows under Admin → Help. This pulls only those two paths (sparse checkout)
# into ../aipbx-docs and writes sitemap-docs.xml. Run hourly by
# /etc/cron.d/aipbx-docs; nothing on the site is edited by hand for the docs.
set -eu
SRC=/var/www/aipbx.bid/aipbx-docs
WEB=/var/www/aipbx.bid/public_html
REPO=https://github.com/mahirgul/AiPBX.git
BRANCH=${BRANCH:-main}

if [ ! -d "$SRC/.git" ]; then
    git clone -q --depth 1 --filter=blob:none --no-checkout -b "$BRANCH" "$REPO" "$SRC"
    git -C "$SRC" sparse-checkout set --no-cone /docs/ /web/src/services/DocsService.php
    git -C "$SRC" checkout -q "$BRANCH"
fi
git -C "$SRC" fetch -q --depth 1 origin "$BRANCH"
git -C "$SRC" reset -q --hard FETCH_HEAD

# Sitemap of the documents (robots.txt points to it).
php -r '
    putenv("AIPBX_DOCS_DIR=" . $argv[1] . "/docs");
    require $argv[1] . "/web/src/services/DocsService.php";
    $day = trim((string) shell_exec("git -C " . escapeshellarg($argv[1]) . " log -1 --format=%cs"));
    $x = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
    foreach (DocsService::list() as $d) {
        $x .= "  <url><loc>https://aipbx.bid/docs/" . htmlspecialchars($d["name"]) . "</loc><lastmod>$day</lastmod></url>\n";
    }
    file_put_contents($argv[2] . ".tmp", $x . "</urlset>\n");
    rename($argv[2] . ".tmp", $argv[2]);
' "$SRC" "$WEB/sitemap-docs.xml"
