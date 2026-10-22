<?php
/** aipbx.bid — feature cards. Uses includes/content.php. */
?>
    <section class="sx-section alt" id="features">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Bir santralde ne gerekiyorsa', 'Everything a phone system needs', 'Alles, was eine Telefonanlage braucht', az: 'Santralda lazım olan hər şey') ?></h2>
            <p class="sx-lead"><?= t('Asterisk üzerine kurulu, tek bir portaldan yönetilir.', 'Built on Asterisk, managed from one web portal.', 'Auf Asterisk aufgebaut, über ein Webportal verwaltet.', az: 'Asterisk üzərində qurulub, bir portaldan idarə olunur.') ?></p>
            <div class="sx-grid">
                <?php foreach ($features as [$icon, $color, $title, $text]): ?>
                    <div class="sx-card">
                        <div class="ico" style="background:<?= $color ?>"><i class="fa-solid <?= $icon ?>"></i></div>
                        <h3><?= $title ?></h3>
                        <p><?= $text ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
