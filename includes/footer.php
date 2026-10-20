<?php
/**
 * aipbx.bid — footer (all pages): a few links and the release from GitHub.
 */
$rel = latest_release();
?>
<div class="sx-footer" role="contentinfo">
    <div class="sx-wrap sx-footer-in">
        <div>
            <strong style="color:#0f172a;">AiPBX</strong>
            <?php if (!empty($rel['tag'])): ?> · <a href="https://github.com/mahirgul/AiPBX/releases/tag/<?= e($rel['tag']) ?>" target="_blank" rel="noopener"><?= e($rel['tag']) ?></a><?php endif; ?>
            · <?= t('MIT lisansı', 'MIT License', 'MIT-Lizenz', az: 'MIT lisenziyası') ?>
            · <a href="https://github.com/sponsors/mahirgul" target="_blank" rel="noopener" style="color:#ea4aaa; font-weight:600;"><i class="fa-solid fa-heart" style="margin-right:3px;"></i><?= t('Sponsor Ol', 'Sponsor', 'Sponsorn', az: 'Sponsor ol') ?></a>
        </div>
        <div class="sx-footer-links">
            <a href="/docs"><?= t('Dokümantasyon', 'Documentation', 'Dokumentation', az: 'Sənədlər') ?></a>
            <a href="https://github.com/mahirgul/AiPBX/releases" target="_blank" rel="noopener"><?= t('Sürüm notları', 'Release notes', 'Versionshinweise', az: 'Buraxılış qeydləri') ?></a>
            <a href="/android"><?= t('Android testi', 'Android test', 'Android-Test', az: 'Android testi') ?></a>
            <a href="https://github.com/mahirgul/AiPBX/issues" target="_blank" rel="noopener"><?= t('Hata bildir', 'Report an issue', 'Fehler melden', az: 'Xəta bildir') ?></a>
            <a href="https://github.com/sponsors/mahirgul" target="_blank" rel="noopener" style="color:#ea4aaa; font-weight:600;"><i class="fa-solid fa-heart"></i> <?= t('Sponsor Ol', 'Sponsor', 'Sponsorn', az: 'Sponsor ol') ?></a>
            <a href="https://github.com/mahirgul/AiPBX" target="_blank" rel="noopener">GitHub</a>
        </div>
    </div>
</div>
<script src="/js/site.js?v=1"></script>
