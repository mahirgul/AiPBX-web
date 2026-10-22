<?php
/** aipbx.bid — install command, steps and requirements. Uses includes/content.php. */
?>
    <section class="sx-section alt" id="install">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Kurulum', 'Install', 'Installation', az: 'Quraşdırma') ?></h2>
            <p class="sx-lead"><?= t('Temiz bir Ubuntu sunucuda tek komut. Gerisini kurulum programı yapar.', 'One command on a clean Ubuntu server. The installer does the rest.', 'Ein Befehl auf einem frischen Ubuntu-Server. Den Rest erledigt der Installer.', az: 'Təmiz Ubuntu serverdə bir əmr. Qalanını quraşdırıcı edir.') ?></p>
            <div class="sx-install">
                <div>
                    <div class="sx-code">
                        <button type="button" class="sx-copy" data-copy="<?= e($installCmd) ?>"><?= t('Kopyala', 'Copy', 'Kopieren', az: 'Kopyala') ?></button>
                        <code><?= e($installCmd) ?></code>
                    </div>
                    <ol class="sx-steps">
                        <li><?= t('Komutu sunucuda root olarak çalıştırın; Asterisk, veritabanı, web portalı ve sertifikalar kurulur.', 'Run the command as root on the server; it installs Asterisk, the database, the web portal and certificates.', 'Den Befehl als root auf dem Server ausführen; er installiert Asterisk, Datenbank, Webportal und Zertifikate.', az: 'Əmri serverdə root kimi işlədin; Asterisk, verilənlər bazası, veb portal və sertifikatlar qurulur.') ?></li>
                        <li><?= t('Tarayıcıda sunucunun adresini açın ve kurulumun sonunda yazdığı yönetici şifresiyle giriş yapın.', 'Open the server\'s address in a browser and sign in with the admin password the installer prints at the end.', 'Die Adresse des Servers im Browser öffnen und mit dem Admin-Passwort anmelden, das der Installer am Ende ausgibt.', az: 'Brauzerdə serverin ünvanını açın və quraşdırıcının sonda yazdığı admin şifrəsi ilə daxil olun.') ?></li>
                        <li><?= t('Hattınızı (SIP trunk) ve dahilileri ekleyin; güncellemeler portaldan tek tıkla gelir.', 'Add your line (SIP trunk) and extensions; updates come with one click in the portal.', 'Leitung (SIP-Trunk) und Nebenstellen anlegen; Updates kommen mit einem Klick im Portal.', az: 'Xəttinizi (SIP trunk) və daxili nömrələri əlavə edin; yeniləmələr portaldan bir kliklə gəlir.') ?></li>
                    </ol>
                </div>
                <div class="sx-req">
                    <h3><?= t('Gereksinimler', 'Requirements', 'Voraussetzungen', az: 'Tələblər') ?></h3>
                    <ul>
                        <li>Ubuntu Server 26.04 LTS (x86_64)</li>
                        <li><?= t('En az 2 vCPU, 2 GB RAM, 15 GB disk', 'At least 2 vCPU, 2 GB RAM, 15 GB disk', 'Mindestens 2 vCPU, 2 GB RAM, 15 GB Speicher', az: 'Ən azı 2 vCPU, 2 GB RAM, 15 GB disk') ?></li>
                        <li><?= t('Önerilen: 4 vCPU, 4 GB RAM, 40 GB SSD', 'Recommended: 4 vCPU, 4 GB RAM, 40 GB SSD', 'Empfohlen: 4 vCPU, 4 GB RAM, 40 GB SSD', az: 'Tövsiyə: 4 vCPU, 4 GB RAM, 40 GB SSD') ?></li>
                        <li><?= t('Dışarıdan erişim için bir alan adı (isteğe bağlı)', 'A domain name for access from outside (optional)', 'Ein Domainname für den Zugriff von außen (optional)', az: 'Xaricdən giriş üçün domen adı (isteğe bağlı)') ?></li>
                    </ul>
                    <a href="https://github.com/mahirgul/AiPBX/blob/main/INSTALL.md" class="sx-btn sx-btn-ghost" target="_blank" rel="noopener"><i class="fa-solid fa-book"></i> <?= t('Kurulum kılavuzu', 'Installation guide', 'Installationsanleitung', az: 'Quraşdırma bələdçisi') ?></a>
                    <a href="/docs" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-life-ring"></i> <?= t('Dokümantasyon', 'Documentation', 'Dokumentation', az: 'Sənədlər') ?></a>
                </div>
            </div>
        </div>
    </section>
