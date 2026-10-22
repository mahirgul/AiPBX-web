<?php
/** aipbx.bid — videos (click-to-load YouTube). Uses includes/content.php. */
?>
    <?php $vids = array_filter(array_map(fn($k) => video_id($k, $LANG), array_combine($videoKinds ?? ['install', 'tour'], $videoKinds ?? ['install', 'tour']))); ?>
    <?php if ($vids): ?>
    <section class="sx-section" id="videos">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Videolar', 'Videos', 'Videos', az: 'Videolar') ?></h2>
            <p class="sx-lead"><?= t('Kurulumu ve paneli adım adım, altyazılı anlatımla izleyin.', 'Watch the installation and the portal step by step, narrated and subtitled.', 'Installation und Portal Schritt für Schritt, mit Sprecher und Untertiteln.', az: 'Quraşdırmanı və paneli addım-addım, səsli izah və altyazı ilə izləyin.') ?></p>
            <div class="sx-videos">
                <?php foreach ($vids as $kind => $vid): ?>
                <figure class="sx-video-card">
                    <button type="button" class="sx-video" data-yt="<?= e($vid) ?>" data-lang="<?= e($LANG) ?>" aria-label="<?= e(['tr' => 'Videoyu oynat', 'en' => 'Play video', 'de' => 'Video abspielen', 'az' => 'Videonu oynat'][$LANG]) ?>">
                        <img src="https://i.ytimg.com/vi/<?= e($vid) ?>/hqdefault.jpg" alt="" loading="lazy" width="480" height="360">
                        <span class="sx-play"><i class="fa-solid fa-play"></i></span>
                    </button>
                    <figcaption><?= $kind === 'install'
                        ? t('Adım adım kurulum', 'Step-by-step installation', 'Schritt-für-Schritt-Installation', az: 'Addım-addım quraşdırma')
                        : t('Menü turu', 'Menu tour', 'Menütour', az: 'Menyu turu') ?></figcaption>
                </figure>
                <?php endforeach; ?>
            </div>
            <p class="sx-video-note"><?= t('Video, oynat düğmesine basınca YouTube\'dan yüklenir.', 'The video loads from YouTube when you press play.', 'Das Video wird erst beim Abspielen von YouTube geladen.', az: 'Video oynat düyməsini basanda YouTube-dan yüklənir.') ?>
                <a href="<?= YOUTUBE_CHANNEL ?>" target="_blank" rel="noopener"><i class="fa-brands fa-youtube"></i> <?= t('YouTube kanalımız', 'Our YouTube channel', 'Unser YouTube-Kanal', az: 'YouTube kanalımız') ?></a></p>
        </div>
    </section>
    <?php endif; ?>
