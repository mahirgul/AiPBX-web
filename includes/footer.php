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
            <a href="<?= YOUTUBE_CHANNEL ?>" target="_blank" rel="noopener">YouTube</a>
            <a href="https://github.com/mahirgul/AiPBX" target="_blank" rel="noopener">GitHub</a>
        </div>
    </div>
    <div class="sx-wrap" style="margin-top: 24px; padding-top: 18px; border-top: 1px solid var(--sx-line); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
        <div style="font-size: .88rem; color: var(--sx-muted);">
            <?= t('Açık kaynak IP santral ve Birleşik İletişim Platformu', 'Open-source IP PBX & Unified Communications Platform', 'Open-Source-Telefonanlage & Unified Communications Plattform', az: 'Açıq mənbəli IP santral və Vahid Rabitə Platforması') ?>
        </div>
        <div>
            <a href="https://showbuild.co" target="_blank" rel="noopener" aria-label="Featured on ShowBuild" style="display:inline-flex;align-items:center;gap:10px;padding:10px 16px;border-radius:5px;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif;line-height:1.2;text-decoration:none;border:1px solid #10263f;background:#ffffff;color:#10263f;"><span style="display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:5px;font-size:14px;font-weight:700;letter-spacing:.02em;flex-shrink:0;background:#10263f;color:#ffffff;">SB</span><span style="display:flex;flex-direction:column;gap:1px;"><span style="font-size:9px;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:#647284;">Featured on</span><span style="font-size:15px;font-weight:700;letter-spacing:-.02em;color:#10263f;">ShowBuild</span></span></a>
        </div>
    </div>
</div>
<script src="/js/site.js?v=1"></script>
