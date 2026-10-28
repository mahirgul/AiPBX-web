<?php
/** aipbx.bid — contact & channels. Uses includes/content.php. */
?>
<section class="sx-section alt" id="contact">
    <div class="sx-wrap">
        <h2 class="sx-h2"><?= t('İletişim & Destek', 'Contact & Support', 'Kontakt & Support', az: 'Əlaqə & Dəstək') ?></h2>
        <p class="sx-lead"><?= t(
            'AiPBX kurumsal telefon santrali, teknik destek, VoIP danışmanlığı veya iş birliği için doğrudan proje lideri ile iletişime geçebilirsiniz. Aracı formlar olmadan tüm doğrudan iletişim kanallarımız aşağıdadır.',
            'Reach out directly to the project lead for AiPBX inquiries, enterprise VoIP consultancy, technical support, or partnerships. Direct communication channels without intermediary forms.',
            'Wenden Sie sich für Fragen zu AiPBX, VoIP-Beratung, Support oder Partnerschaften direkt an die Projektleitung. Direkte Kanäle ohne Formulare.',
            az: 'AiPBX korporativ santralı, texniki dəstək, VoIP məsləhəti və ya əməkdaşlıq üçün birbaşa layihə rəhbəri ilə əlaqə saxlaya bilərsiniz.'
        ) ?></p>

        <!-- Project Creator Card -->
        <div class="sx-contact-creator">
            <div class="sx-creator-avatar">
                <i class="fa-solid fa-user-tie"></i>
            </div>
            <div class="sx-creator-info">
                <div class="sx-creator-role"><?= t('Proje Kurucusu & Lideri', 'Project Creator & Lead', 'Projektgründer & Leitung', az: 'Layihə Yaradıcısı & Rəhbəri') ?></div>
                <h3 class="sx-creator-name">Mahir Gül</h3>
                <p class="sx-creator-bio"><?= t(
                    '20+ yıllık kurumsal PBX desteği ve VoIP altyapı mühendisliği deneyimi (NEC SV8100/9100/8300/9300/8500/9500, Asterisk, Linux, Rust, Go, PHP).',
                    '20+ years of enterprise PBX support & VoIP infrastructure engineering (NEC SV8100/9100/8300/9300/8500/9500, Asterisk, Linux, Rust, Go, PHP).',
                    '20+ Jahre Erfahrung in Enterprise-Telefonanlagen und VoIP-Infrastruktur (NEC SV8100/9100/8300/9300/8500/9500, Asterisk, Linux, Rust, Go, PHP).',
                    az: '20+ illik korporativ PBX dəstəyi və VoIP infrastruktur mühəndisliyi təcrübəsi (NEC, Asterisk, Linux, Rust, Go, PHP).'
                ) ?></p>
                <div class="sx-creator-links">
                    <a href="https://mhrgl.com" target="_blank" rel="noopener" class="sx-btn sx-btn-ghost"><i class="fa-solid fa-globe"></i> mhrgl.com</a>
                    <a href="https://github.com/mahirgul" target="_blank" rel="noopener" class="sx-btn sx-btn-ghost"><i class="fa-brands fa-github"></i> GitHub (@mahirgul)</a>
                    <a href="https://www.linkedin.com/in/mhrgl/" target="_blank" rel="noopener" class="sx-btn sx-btn-ghost" style="color:#0a66c2;"><i class="fa-brands fa-linkedin"></i> LinkedIn</a>
                </div>
            </div>
        </div>

        <!-- Direct Contact Cards Grid -->
        <div class="sx-contact-grid">
            <!-- LinkedIn -->
            <div class="sx-contact-card">
                <div class="sx-contact-icon linkedin"><i class="fa-brands fa-linkedin"></i></div>
                <h4>LinkedIn</h4>
                <p><?= t('Doğrudan profesyonel mesajlaşma ve ağ bağlantısı.', 'Direct professional messaging and networking.', 'Direkte professionelle Nachrichten und Vernetzung.', az: 'Birbaşa peşəkar mesajlaşma və şəbəkə.') ?></p>
                <div class="sx-contact-val">linkedin.com/in/mhrgl</div>
                <a href="https://www.linkedin.com/in/mhrgl/" target="_blank" rel="noopener" class="sx-contact-btn linkedin">
                    <i class="fa-brands fa-linkedin"></i> <?= t('Profili Aç', 'Open Profile', 'Profil öffnen', az: 'Profili Aç') ?>
                </a>
            </div>

            <!-- Email -->
            <div class="sx-contact-card">
                <div class="sx-contact-icon email"><i class="fa-solid fa-envelope"></i></div>
                <h4>Email</h4>
                <p><?= t('Resmi talepler, teknik destek ve kurumsal sorularınız için.', 'Official inquiries, technical support, and business proposals.', 'Für offizielle Anfragen, Support und Unternehmensfragen.', az: 'Rəsmi müraciətlər və texniki dəstək üçün.') ?></p>
                <div class="sx-contact-val">mahirgul@gmail.com</div>
                <a href="mailto:mahirgul@gmail.com" class="sx-contact-btn email">
                    <i class="fa-solid fa-envelope"></i> <?= t('E-posta Gönder', 'Send Email', 'E-Mail senden', az: 'E-poçt Göndər') ?>
                </a>
            </div>

            <!-- WhatsApp -->
            <div class="sx-contact-card">
                <div class="sx-contact-icon whatsapp"><i class="fa-brands fa-whatsapp"></i></div>
                <h4>WhatsApp</h4>
                <p><?= t('Anlık mesajlaşma ve hızlı teknik danışma.', 'Instant messaging and fast technical consultation.', 'Direktnachrichten und schnelle Beratung.', az: 'Sürətli texniki məsləhət və mesajlaşma.') ?></p>
                <div class="sx-contact-val">+90 537 990 23 52</div>
                <a href="https://wa.me/905379902352" target="_blank" rel="noopener" class="sx-contact-btn whatsapp">
                    <i class="fa-brands fa-whatsapp"></i> WhatsApp Chat
                </a>
            </div>

            <!-- Telegram -->
            <div class="sx-contact-card">
                <div class="sx-contact-icon telegram"><i class="fa-brands fa-telegram"></i></div>
                <h4>Telegram</h4>
                <p><?= t('Doğrudan Telegram mesajlaşması ve dosya paylaşımı.', 'Direct Telegram messaging and communication.', 'Direkte Telegram-Nachrichten.', az: 'Birbaşa Telegram mesajlaşması.') ?></p>
                <div class="sx-contact-val">+90 537 990 23 52</div>
                <a href="https://t.me/+905379902352" target="_blank" rel="noopener" class="sx-contact-btn telegram">
                    <i class="fa-brands fa-telegram"></i> Telegram Chat
                </a>
            </div>

            <!-- Signal -->
            <div class="sx-contact-card">
                <div class="sx-contact-icon signal"><i class="fa-solid fa-lock"></i></div>
                <h4>Signal</h4>
                <p><?= t('Uçtan uca şifreli ve güvenli mesajlaşma.', 'End-to-end encrypted secure messaging.', 'Ende-zu-Ende verschlüsselte Kommunikation.', az: 'Ucdan-uca şifrələnmiş təhlükəsiz rabitə.') ?></p>
                <div class="sx-contact-val">+90 537 990 23 52</div>
                <span class="sx-contact-btn signal-label">
                    <i class="fa-solid fa-shield-halved"></i> +90 537 990 23 52
                </span>
            </div>

            <!-- GitHub Issues -->
            <div class="sx-contact-card">
                <div class="sx-contact-icon github"><i class="fa-brands fa-github"></i></div>
                <h4><?= t('Hata Bildirimi & Topluluk', 'Bug Reports & Community', 'Fehlerberichte & Community', az: 'Xəta Bildirişi & İcma') ?></h4>
                <p><?= t('AiPBX kod tabanındaki hata bildirimleri veya yeni özellik önerileri.', 'Submit bug reports or feature proposals directly on GitHub Issues.', 'Bugs oder Funktionsvorschläge direkt auf GitHub melden.', az: 'AiPBX xəta bildirişləri və ya yeni təkliflər.') ?></p>
                <div class="sx-contact-val">mahirgul/AiPBX/issues</div>
                <a href="https://github.com/mahirgul/AiPBX/issues" target="_blank" rel="noopener" class="sx-contact-btn github">
                    <i class="fa-solid fa-bug"></i> <?= t('GitHub Issues Aç', 'Open GitHub Issues', 'GitHub Issues öffnen', az: 'GitHub Issues Aç') ?>
                </a>
            </div>
        </div>

        <!-- GitHub Sponsor Callout -->
        <div style="margin-top: 48px; background: linear-gradient(135deg, #fff5f7 0%, #ffffff 50%, #fdf2f8 100%); border: 1px solid #fbcfe8; border-radius: var(--sx-radius); padding: 36px 28px; text-align: center;">
            <div style="width: 48px; height: 48px; margin: 0 auto 14px; background: #fce7f3; color: #db2777; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem;">
                <i class="fa-solid fa-heart"></i>
            </div>
            <h3 style="font-size: 1.3rem; margin: 0 0 10px; color: #0f172a;"><?= t('Açık Kaynak Geliştirmeyi Destekleyin', 'Support Open-Source Development', 'Open-Source-Entwicklung unterstützen', az: 'Açıq Mənbəli İnkişafı Dəstəkləyin') ?></h3>
            <p style="font-size: .95rem; color: #475569; max-width: 600px; margin: 0 auto 20px; line-height: 1.5;">
                <?= t('AiPBX\'in bağımsız, ücretsiz ve engelsiz kalması için sunucu ve geliştirme süreçlerimize GitHub Sponsors üzerinden destek olabilirsiniz.',
                      'Help keep AiPBX independent, free, and accessible by supporting our infrastructure and development via GitHub Sponsors.',
                      'Unterstützen Sie die unabhängige und kostenlose Weiterentwicklung von AiPBX über GitHub Sponsors.',
                      az: 'AiPBX-in müstəqil və pulsuz qalması üçün infrastruktur və inkişaf proseslərimizə GitHub Sponsors vasitəsilə dəstək ola bilərsiniz.') ?>
            </p>
            <a href="https://github.com/sponsors/mahirgul" target="_blank" rel="noopener" class="sx-btn sx-btn-sponsor" style="display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-heart"></i> <?= t('GitHub\'da Sponsor Olun', 'Sponsor on GitHub', 'Auf GitHub sponsern', az: 'GitHub-da sponsor olun') ?>
            </a>
        </div>
    </div>
</section>
