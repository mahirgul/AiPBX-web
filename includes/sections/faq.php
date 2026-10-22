<?php
/** aipbx.bid — FAQ. Uses includes/content.php. */
?>
    <section class="sx-section" id="faq">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Sık sorulanlar', 'Questions', 'Häufige Fragen', az: 'Tez-tez verilən suallar') ?></h2>
            <p class="sx-lead"><?= t('Daha fazlası dokümantasyonda.', 'More in the documentation.', 'Mehr in der Dokumentation.', az: 'Daha çoxu sənədlərdə.') ?></p>
            <div class="sx-faq">
                <?php foreach ($faq as $i => $f): ?>
                    <details<?= $i === 0 ? ' open' : '' ?>>
                        <summary><?= e(getLocal($f, 'q')) ?></summary>
                        <p><?= e(getLocal($f, 'a')) ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
