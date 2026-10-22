<?php
/** aipbx.bid — portal screenshots. Uses includes/content.php. */
?>
    <section class="sx-section" id="screenshots">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Ekranlar', 'Screenshots', 'Screenshots', az: 'Ekranlar') ?></h2>
            <p class="sx-lead"><?= t('Demo santralden, olduğu gibi.', 'From the demo PBX, as they are.', 'Aus der Demo-Anlage, unverändert.', az: 'Demo santraldan, olduğu kimi.') ?></p>
            <div class="sx-tabs" role="tablist">
                <?php foreach ($shots as $i => [$id, $label]): ?>
                    <button type="button" class="sx-tab<?= $i === 0 ? ' active' : '' ?>" role="tab" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" data-shot-tab="shot-<?= $id ?>"><?= $label ?></button>
                <?php endforeach; ?>
            </div>
            <?php foreach ($shots as $i => [$id, $label, $caption]): ?>
                <figure class="sx-shot<?= $i === 0 ? ' active' : '' ?>" id="shot-<?= $id ?>" style="margin:0;">
                    <div class="sx-frame">
                        <div class="sx-frame-bar"><i></i><i></i><i></i></div>
                        <img src="/img/shots/<?= $id ?>.jpg" width="1440" height="900" loading="lazy" alt="<?= e(strip_tags($label)) ?>">
                    </div>
                    <figcaption><?= $caption ?></figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </section>
