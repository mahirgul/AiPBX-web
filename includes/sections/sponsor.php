<?php
/** aipbx.bid — sponsor box. Uses includes/content.php. */
?>
    <section class="sx-section alt" id="sponsor">
        <div class="sx-wrap">
            <div class="sx-sponsor-box">
                <div class="sx-sponsor-icon"><i class="fa-solid fa-heart"></i></div>
                <h2 class="sx-h2"><?= t('Sınırsız ve Engelsiz İletişim İçin Bize Destek Olun', 'Support Us for Open & Barrier-Free Communication', 'Unterstützen Sie uns für freie und barrierefreie Kommunikation', az: 'Məhdudiyyətsiz və maneəsiz ünsiyyət üçün bizə dəstək olun') ?></h2>
                <p class="sx-lead"><?= t(
                    'AiPBX; lisans, kullanıcı ve özellik kısıtlaması olmadan herkesin kendi bağımsız santraline sahip olabilmesi için tamamen açık kaynak ve ücretsiz geliştirilmektedir. Altyapı, sunucu giderleri ve mobil uygulama geliştirme süreçlerimize GitHub Sponsors üzerinden destek olarak projenin geleceğine katkıda bulunabilirsiniz.',
                    'AiPBX is developed completely free and open source so that anyone can own their independent PBX without license or user limits. You can contribute to the project\'s future by supporting server infrastructure, maintenance and mobile app development via GitHub Sponsors.',
                    'AiPBX wird vollständig Open Source und kostenlos entwickelt, damit jede Organisation eine eigene unabhängige Telefonanlage ohne Lizenz- oder Benutzerbeschränkungen betreiben kann. Unterstützen Sie Serverinfrastruktur und mobile Entwicklung über GitHub Sponsors.',
                    az: 'AiPBX, lisenziya və istifadəçi məhdudiyyəti olmadan hər kəsin öz müstəqil santralına sahib ola bilməsi üçün tamamilə açıq mənbəli və pulsuz inkişaf etdirilir. Server infrastrukturu və mobil inkişaf proseslərimizə GitHub Sponsors vasitəsilə dəstək ola bilərsiniz.'
                ) ?></p>
                <div class="sx-sponsor-cta">
                    <a href="https://github.com/sponsors/mahirgul" class="sx-btn sx-btn-sponsor" target="_blank" rel="noopener">
                        <i class="fa-solid fa-heart"></i> <?= t('GitHub\'da Sponsor Olun', 'Sponsor on GitHub', 'Auf GitHub sponsern', az: 'GitHub-da sponsor olun') ?>
                    </a>
                    <a href="https://github.com/mahirgul/AiPBX" class="sx-btn sx-btn-ghost" target="_blank" rel="noopener">
                        <i class="fa-brands fa-github"></i> <?= t('Projeyi Yıldızlayın', 'Star on GitHub', 'Auf GitHub mit Stern markieren', az: 'GitHub-da ulduzlayın') ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
