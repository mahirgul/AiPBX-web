<?php
/** aipbx.bid — mobile apps. Uses includes/content.php. */
?>
    <section class="sx-section" id="apps">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Mobil uygulamalar', 'Mobile apps', 'Mobile Apps', az: 'Mobil tətbiqlər') ?></h2>
            <p class="sx-lead"><?= t('Dahiliniz cebinizde: arama, görüntülü arama, sohbet ve rehber. Uygulama yalnızca kendi santralinize bağlanır.', 'Your extension in your pocket: calls, video calls, chat and the directory. The app talks only to your own PBX.', 'Ihre Nebenstelle in der Tasche: Anrufe, Videoanrufe, Chat und Telefonbuch. Die App spricht nur mit Ihrer eigenen Anlage.', az: 'Daxili nömrəniz cibinizdə: zəng, görüntülü zəng, söhbət və kataloq. Tətbiq yalnız öz santralınıza qoşulur.') ?></p>
            <div class="sx-phones">
                <div class="sx-phone"><img src="/img/app_dialer.jpg" width="449" height="1024" loading="lazy" alt="<?= e($L(['tr' => 'Android uygulaması: tuş takımı', 'en' => 'Android app: keypad', 'de' => 'Android-App: Wähltastatur', 'az' => 'Android tətbiqi: klaviatura'])) ?>"></div>
                <div class="sx-phone"><img src="/img/app_history.jpg" width="449" height="1024" loading="lazy" alt="<?= e($L(['tr' => 'Android uygulaması: arama geçmişi', 'en' => 'Android app: call history', 'de' => 'Android-App: Anrufliste', 'az' => 'Android tətbiqi: zəng tarixçəsi'])) ?>"></div>
                <div class="sx-phone"><img src="/img/app_chat.jpg" width="449" height="1024" loading="lazy" alt="<?= e($L(['tr' => 'Android uygulaması: sohbet', 'en' => 'Android app: chat', 'de' => 'Android-App: Chat', 'az' => 'Android tətbiqi: söhbət'])) ?>"></div>
            </div>
            <div class="sx-apps">
                <div class="sx-app">
                    <h3><i class="fa-brands fa-android" style="color:#16a34a"></i> Android</h3>
                    <p><?= t('Google Play\'de kapalı testte. Teste katılın ya da APK dosyasını doğrudan indirin.', 'In closed testing on Google Play. Join the test or download the APK directly.', 'Im geschlossenen Test auf Google Play. Am Test teilnehmen oder die APK direkt herunterladen.', az: 'Google Play-də qapalı testdədir. Testə qoşulun və ya APK faylını birbaşa yükləyin.') ?></p>
                    <div class="row">
                        <a href="/android" class="sx-btn sx-btn-primary"><i class="fa-brands fa-google-play"></i> <?= t('Teste katıl', 'Join the test', 'Am Test teilnehmen', az: 'Testə qoşul') ?></a>
                        <a href="<?= e(download_url('aipbx-latest.apk')) ?>" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-download"></i> APK</a>
                    </div>
                </div>
                <div class="sx-app">
                    <h3><i class="fa-brands fa-apple" style="color:#0f172a"></i> iOS</h3>
                    <p><?= t('App Store\'da değil; imzasız IPA dosyası GitHub\'da. Android sürümünün gerisinde.', 'Not on the App Store; an unsigned IPA is on GitHub. Behind the Android app in features.', 'Nicht im App Store; eine unsignierte IPA liegt auf GitHub. Hat weniger Funktionen als die Android-App.', az: 'App Store-da deyil; imzasız IPA faylı GitHub-dadır. Android versiyasından geridədir.') ?></p>
                    <div class="row">
                        <a href="<?= e(download_url('AiPBX-unsigned.ipa')) ?>" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-download"></i> IPA</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
