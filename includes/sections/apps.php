<?php
/** aipbx.bid — mobile apps. Uses includes/content.php. */
?>
    <section class="sx-section" id="apps">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Mobil uygulamalar ve bağlayıcılar', 'Mobile apps & connectors', 'Mobile Apps & Connectoren', az: 'Mobil tətbiqlər və qoşucular') ?></h2>
            <p class="sx-lead"><?= t('Dahiliniz cebinizde: arama, görüntülü arama, sohbet ve rehber. Uygulama yalnızca kendi santralinize bağlanır.', 'Your extension in your pocket: calls, video calls, chat and the directory. The app talks only to your own PBX.', 'Ihre Nebenstelle in der Tasche: Anrufe, Videoanrufe, Chat und Telefonbuch. Die App spricht nur mit Ihrer eigenen Anlage.', az: 'Daxili nömrəniz cibinizdə: zəng, görüntülü zəng, söhbət və kataloq. Tətbiq yalnız öz santralınıza qoşulur.') ?></p>
            <div class="sx-phones">
                <div class="sx-phone"><img src="/img/app_dialer.jpg" width="449" height="1024" loading="lazy" alt="<?= e($L(['tr' => 'Android uygulaması: tuş takımı', 'en' => 'Android app: keypad', 'de' => 'Android-App: Wähltastatur', 'az' => 'Android tətbiqi: klaviatura'])) ?>"></div>
                <div class="sx-phone"><img src="/img/app_history.jpg" width="449" height="1024" loading="lazy" alt="<?= e($L(['tr' => 'Android uygulaması: arama geçmişi', 'en' => 'Android app: call history', 'de' => 'Android-App: Anrufliste', 'az' => 'Android tətbiqi: zəng tarixçəsi'])) ?>"></div>
                <div class="sx-phone"><img src="/img/app_chat.jpg" width="449" height="1024" loading="lazy" alt="<?= e($L(['tr' => 'Android uygulaması: sohbet', 'en' => 'Android app: chat', 'de' => 'Android-App: Chat', 'az' => 'Android tətbiqi: söhbət'])) ?>"></div>
            </div>
            <div class="sx-apps">
                <div class="sx-app">
                    <h3><i class="fa-brands fa-android" style="color:#16a34a"></i> Android</h3>
                    <p><?= t('Google Play Store\'dan indirin ya da APK dosyasını doğrudan edinin.', 'Get it on Google Play Store or download the APK directly.', 'Im Google Play Store herunterladen oder die APK direkt beziehen.', az: 'Google Play Store-dan yükləyin və ya APK faylını birbaşa əldə edin.') ?></p>
                    <div class="row">
                        <a href="<?= PLAY_STORE_URL ?>" target="_blank" rel="noopener" class="sx-btn sx-btn-primary"><i class="fa-brands fa-google-play"></i> Google Play</a>
                        <a href="<?= e(download_url('aipbx-latest.apk', GITHUB_ANDROID_REPO)) ?>" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-download"></i> APK</a>
                    </div>
                </div>
                <div class="sx-app">
                    <h3><i class="fa-brands fa-apple" style="color:#0f172a"></i> iOS</h3>
                    <p><?= t('Henüz App Store\'da değil; kaynak kodu GitHub\'da, imzasız IPA ve Simulator paketleri Sürümler sayfasında (Xcode ile imzalama gerekir).', 'Not on the App Store yet; source is on GitHub with unsigned IPA and Simulator builds on Releases (requires Xcode signing).', 'Noch nicht im App Store; Quellcode auf GitHub sowie unsignierte IPA- und Simulator-Builds unter Releases (Xcode-Signatur erforderlich).', az: 'Hələ App Store-da deyil; mənbə kodu GitHub-da, imzasız IPA və Simulator paketləri Buraxılışlar səhifəsindədir (Xcode imzalaması tələb olunur).') ?></p>
                    <div class="row">
                        <a href="https://github.com/<?= e(GITHUB_IOS_REPO) ?>/releases/latest" target="_blank" rel="noopener" class="sx-btn sx-btn-primary"><i class="fa-solid fa-download"></i> <?= t('Sürümler (IPA)', 'Releases (IPA)', 'Releases (IPA)', az: 'Buraxılışlar (IPA)') ?></a>
                        <a href="https://github.com/<?= e(GITHUB_IOS_REPO) ?>" target="_blank" rel="noopener" class="sx-btn sx-btn-ghost"><i class="fa-brands fa-github"></i> GitHub</a>
                    </div>
                </div>
                <div class="sx-app">
                    <h3><i class="fa-solid fa-plug" style="color:#714b67"></i> Odoo</h3>
                    <p><?= t('Odoo 17, 18 ve 19 için ücretsiz bağlayıcı: tıkla-ara, arayanın kartı, çağrı geçmişi ve ses kayıtları. CRM modülü çağrıları fırsatlara yazar.', 'Free connector for Odoo 17, 18 and 19: click-to-call, caller pop-up, call history and recordings. The CRM module puts calls on opportunities.', 'Kostenloser Connector für Odoo 17, 18 und 19: Click-to-Call, Anrufer-Pop-up, Anrufliste und Aufnahmen. Das CRM-Modul legt Anrufe an Verkaufschancen ab.', az: 'Odoo 17, 18 və 19 üçün pulsuz qoşucu: kliklə zəng, zəng edənin kartı, zəng tarixçəsi və səs yazıları. CRM modulu zəngləri imkanlara yazır.') ?></p>
                    <div class="row">
                        <a href="<?= ODOO_CONNECTOR_URL ?>" target="_blank" rel="noopener" class="sx-btn sx-btn-primary"><i class="fa-solid fa-store"></i> AiPBX Connector</a>
                        <a href="<?= ODOO_CONNECTOR_CRM_URL ?>" target="_blank" rel="noopener" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-store"></i> AiPBX Connector - CRM</a>
                        <a href="https://github.com/<?= e(GITHUB_ODOO_REPO) ?>" target="_blank" rel="noopener" class="sx-btn sx-btn-ghost"><i class="fa-brands fa-github"></i> GitHub</a>
                    </div>
                </div>
                <div class="sx-app">
                    <h3><i class="fa-solid fa-cubes" style="color:#0284c7"></i> ERPNext / Frappe</h3>
                    <p><?= t('Kendi sunucunuzdaki ERPNext ve Frappe Cloud için ücretsiz bağlayıcı: tıkla-ara, arayanın kartı, ses kayıtlı ve AI özetli Call Log, cevapsız çağrı ToDo\'su ve rehber eşitleme.', 'Free connector for self-hosted ERPNext and Frappe Cloud: click-to-call, caller pop-up, Call Log with recordings and AI summaries, missed-call ToDo, and contact sync.', 'Kostenloser Connector für Self-Hosted ERPNext und Frappe Cloud: Click-to-Call, Anrufer-Pop-up, Call Log mit Aufnahmen & KI-Zusammenfassung, ToDo bei verpassten Anrufen und Kontaktabgleich.', az: 'Öz serverinizdəki ERPNext və Frappe Cloud üçün pulsuz qoşucu: kliklə zəng, zəng edənin kartı, səs yazılı və AI xülasəli Call Log, cavabsız zəng ToDo-su və əlaqə sinxronizasiyası.') ?></p>
                    <div class="row">
                        <a href="https://github.com/<?= e(GITHUB_FRAPPE_REPO) ?>" target="_blank" rel="noopener" class="sx-btn sx-btn-primary"><i class="fa-brands fa-github"></i> GitHub</a>
                        <a href="/docs/crm-integrations" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-book"></i> <?= t('Kurulum kılavuzu', 'Setup guide', 'Anleitung', az: 'Quraşdırma bələdçisi') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
