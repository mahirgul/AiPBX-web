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
                <div style="margin-top: 32px; padding-top: 24px; border-top: 1px dashed #fbcfe8;">
                    <div style="display: inline-flex; align-items: center; gap: 8px; font-size: .84rem; font-weight: 700; color: #7e22ce; text-transform: uppercase; letter-spacing: .06em; margin-bottom: 8px;">
                        <i class="fa-solid fa-cloud"></i> <?= t('Önerilen Bulut Altyapısı', 'Recommended Cloud Infrastructure', 'Empfohlene Cloud-Infrastruktur', az: 'Tövsiyə Olunan Bulud İnfrastrukturu') ?>
                    </div>
                    <p style="font-size: .92rem; color: #475569; max-width: 640px; margin: 0 auto 16px; line-height: 1.5;">
                        <?= t('AiPBX santralinizi barındırmak için <strong>UpCloud</strong> yüksek performanslı bulut sunucularını tercih edebilirsiniz. $250 ücretsiz deneme kredisi ile hemen başlayın.',
                              'Deploy your AiPBX instances on <strong>UpCloud</strong> high-performance cloud servers. Start now with $250 free trial credits.',
                              'Hosten Sie Ihre AiPBX-Instanzen auf den hochperformanten Cloud-Servern von <strong>UpCloud</strong>. Starten Sie jetzt mit $250 Gratisguthaben.',
                              az: 'AiPBX santralınızı yerləşdirmək üçün <strong>UpCloud</strong> yüksək performanslı bulud serverlərini seçə bilərsiniz. $250 pulsuz kreditlə başlayın.') ?>
                    </p>
                    <a href="https://signup.upcloud.com/?promo=affiliate-aipbx250&amp;utm_source=aipbx&amp;utm_medium=affiliate&amp;utm_campaign=affiliate-aipbx250" class="sx-btn" style="background:#7e22ce; color:#fff; border-color:#7e22ce; font-weight:600; padding:10px 20px; font-size:.9rem; text-decoration:none;" target="_blank" rel="noopener sponsored">
                        <i class="fa-solid fa-server" style="margin-right:6px;"></i> UpCloud ($250 Credit · Promo: affiliate-aipbx250)
                    </a>
                </div>
            </div>
        </div>
    </section>
