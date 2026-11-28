<?php
/**
 * aipbx.bid — Complete Integrations Catalog (AiPBX v1.82.5).
 * Covers CRM/ERP (Odoo, ERPNext/Frappe, n8n), VoIP Billing (ClientFence/FOSSBilling),
 * Microsoft Teams, Cisco CallManager, SSO/LDAP, AI Voice & ElevenLabs Hold Music,
 * Web Widgets, SMS/SMTP/CNAM/S3, REST API v1, Webhooks, and Modular Plugins.
 */
$page = 'integrations';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/content.php';
$head = [
    t('AiPBX Entegrasyonları: Odoo, ERPNext, Microsoft Teams, CRM, SSO, AI & API',
      'AiPBX Integrations: Odoo, ERPNext, Microsoft Teams, CRM, SSO, AI & API',
      'AiPBX Integrationen: Odoo, ERPNext, Microsoft Teams, CRM, SSO, KI & API',
      az: 'AiPBX İnteqrasiyaları: Odoo, ERPNext, Microsoft Teams, CRM, SSO, AI & API'),
    t('AiPBX santralinizi Odoo 17/18/19, ERPNext / Frappe, ClientFence VoIP Billing, Microsoft Teams Direct Routing, Cisco CUCM, HubSpot/Zoho/n8n, SAML 2.0/OIDC SSO, AI ajanlar ve REST API v1 ile bağlayın.',
      'Connect AiPBX with Odoo 17/18/19, ERPNext / Frappe, ClientFence VoIP Billing, Microsoft Teams Direct Routing, Cisco CUCM, HubSpot/Zoho/n8n, SAML 2.0/OIDC SSO, AI agents, and REST API v1.',
      'Verbinden Sie AiPBX mit Odoo 17/18/19, ERPNext / Frappe, ClientFence VoIP Billing, Microsoft Teams Direct Routing, Cisco CUCM, HubSpot/Zoho/n8n, SAML 2.0/OIDC SSO, KI-Agenten und REST API v1.',
      az: 'AiPBX-i Odoo 17/18/19, ERPNext / Frappe, ClientFence VoIP Billing, Microsoft Teams Direct Routing, Cisco CUCM, HubSpot/Zoho/n8n, SAML 2.0/OIDC SSO, AI agentlər və REST API v1 ilə birləşdirin.')
];

$categories = [
    [
        'id' => 'crm-erp',
        'heading' => t('CRM & ERP Entegrasyonları', 'CRM & ERP Integrations', 'CRM- & ERP-Integrationen', az: 'CRM & ERP İnteqrasiyaları'),
        'lead' => t('Arayan müşteri kartı, tek tıkla arama, çağrı kaydı ve ses kayıtlarını doğrudan CRM ve ERP sistemlerinize aktarın.', 'Screen pop, click-to-call, call logs, and recordings synced directly to your CRM and ERP.', 'Anrufer-Pop-up, Click-to-Call, Anrufprotokolle und Aufnahmen direkt in Ihrem CRM und ERP.', az: 'Zəng edənin kartı, kliklə zəng, zəng tarixçəsi və səs yazılarını birbaşa CRM və ERP sisteminizə ötürün.'),
        'items' => [
            [
                'wide' => false,
                'badge' => 'ODOO 17 · 18 · 19',
                'badgeBg' => '#714B67',
                'icon' => 'fa-solid fa-plug',
                'iconColor' => '#714b67',
                'title' => t('Odoo ERP & CRM Resmi Bağlayıcılar', 'Odoo ERP & CRM Official Connectors', 'Offizielle Odoo ERP & CRM Connectoren', az: 'Odoo ERP & CRM Rəsmi Qoşucular'),
                'desc' => t(
                    'Odoo App Store üzerindeki ücretsiz resmi modüller: tıkla-ara, gelen çağrıda müşteri kartı açma, çağrı geçmişi ve ses kayıtları. CRM modülü tüm aramaları doğrudan fırsatlara (leads/opportunities) işler.',
                    'Free official modules on the Odoo App Store: click-to-call, incoming caller pop-up, call history, and voice recordings. The CRM module logs calls directly onto leads and opportunities.',
                    'Kostenlose offizielle Module im Odoo App Store: Click-to-Call, Anrufer-Pop-up, Anrufliste und Aufnahmen. Das CRM-Modul verknüpft Anrufe direkt mit Verkaufschancen.',
                    az: 'Odoo App Store-da pulsuz rəsmi modullar: kliklə zəng, gələn zəngdə müştəri kartı, zəng tarixçəsi və səs yazıları. CRM modulu zəngləri imkanlara yazır.'
                ),
                'links' => [
                    [ODOO_CONNECTOR_URL, 'fa-solid fa-store', 'AiPBX Connector', true, true],
                    [ODOO_CONNECTOR_CRM_URL, 'fa-solid fa-store', 'AiPBX Connector - CRM', false, true],
                    ['https://github.com/' . GITHUB_ODOO_REPO, 'fa-brands fa-github', 'GitHub', false, true],
                    ['https://www.odoo.com/r/aff-aipbx', 'fa-solid fa-rocket', t('Odoo\'yu Ücretsiz Dene', 'Try Odoo Free', 'Odoo kostenlos testen', az: 'Odoo-nu Pulsuz Sına'), false, true],
                ],
            ],
            [
                'wide' => false,
                'badge' => 'ERPNEXT · FRAPPE',
                'badgeBg' => '#0284c7',
                'icon' => 'fa-solid fa-cubes',
                'iconColor' => '#0284c7',
                'title' => t('ERPNext / Frappe Resmi Bağlayıcı', 'ERPNext / Frappe Official Connector', 'Offizieller ERPNext / Frappe Connector', az: 'ERPNext / Frappe Rəsmi Qoşucusu'),
                'desc' => t(
                    'Kendi sunucunuzdaki ERPNext ve Frappe Cloud için ücretsiz bağlayıcı: tıkla-ara, gelen çağrı kartı, ses kayıtlı ve AI özetli Call Log, cevapsız çağrılarda otomatik ToDo ve Contacts/Leads rehber eşitleme.',
                    'Free connector for self-hosted ERPNext and Frappe Cloud: click-to-call, native caller screen pop, Call Log with recordings and AI summaries, missed-call ToDo, and Contacts/Leads sync.',
                    'Kostenloser Connector für Self-Hosted ERPNext und Frappe Cloud: Click-to-Call, Anrufer-Pop-up, Call Log mit Aufnahmen & KI-Zusammenfassung, ToDo bei verpassten Anrufen und Kontaktabgleich.',
                    az: 'Öz serverinizdəki ERPNext və Frappe Cloud üçün pulsuz qoşucu: kliklə zəng, zəng edənin kartı, səs yazılı və AI xülasəli Call Log, cavabsız zəng ToDo-su və əlaqə sinxronizasiyası.'
                ),
                'links' => [
                    ['https://github.com/' . GITHUB_FRAPPE_REPO, 'fa-brands fa-github', 'GitHub', true, true],
                    ['/docs/crm-integrations', 'fa-solid fa-book', t('CRM Kurulum Kılavuzu', 'CRM Setup Guide', 'CRM-Anleitung', az: 'CRM Quraşdırma Bələdçisi'), false, false],
                ],
            ],
            [
                'wide' => false,
                'badge' => 'CRM · N8N · MAKE · ZAPIER',
                'badgeBg' => '#0284c7',
                'icon' => 'fa-solid fa-diagram-project',
                'iconColor' => '#0284c7',
                'title' => t('HubSpot, Zoho CRM, Pipedrive, Bitrix24 & Salesforce', 'HubSpot, Zoho CRM, Pipedrive, Bitrix24 & Salesforce', 'HubSpot, Zoho CRM, Pipedrive, Bitrix24 & Salesforce', az: 'HubSpot, Zoho CRM, Pipedrive, Bitrix24 & Salesforce'),
                'desc' => t(
                    'Her CRM için ayrı bağlantı paketi (API anahtarı + HMAC-SHA256 imzalı webhook). Hazır n8n, Make ve Zapier akışlarıyla aramaları, ses kayıtlarını, AI özetlerini ve rehberi çift yönlü eşitleyin.',
                    'Dedicated connection pack per CRM (API key + HMAC-SHA256 signed webhooks). Sync calls, recordings, AI summaries, and contacts bi-directionally via n8n, Make, or Zapier.',
                    'Eigenes Verbindungspaket pro CRM (API-Key + HMAC-SHA256-signierte Webhooks). Synchronisieren Sie Anrufe, Aufnahmen, KI-Zusammenfassungen und Kontakte über n8n, Make oder Zapier.',
                    az: 'Hər CRM üçün ayrıca bağlantı paketi (API açarı + HMAC-SHA256 imzalı webhook). n8n, Make və Zapier ilə zəngləri, səs yazılarını və AI xülasələrini sinxronlaşdırın.'
                ),
                'links' => [
                    ['/docs/crm-integrations', 'fa-solid fa-book', t('CRM & n8n Rehberi', 'CRM & n8n Guide', 'CRM- & n8n-Anleitung', az: 'CRM & n8n Bələdçisi'), false, false],
                ],
            ],
            [
                'wide' => false,
                'badge' => 'REST API v1 & WEBHOOKS',
                'badgeBg' => '#0f172a',
                'icon' => 'fa-solid fa-code',
                'iconColor' => '#0f172a',
                'title' => t('REST API v1, İmzalı Webhook\'lar & Mobil QR API', 'REST API v1, Signed Webhooks & Mobile QR API', 'REST API v1, Signierte Webhooks & QR-API', az: 'REST API v1, İmzalı Webhook-lar & Mobil QR API'),
                'desc' => t(
                    'call.ringing, call.offered, call.answered, call.completed, recording.ready ve call.ai_completed olayları; POST /api/v1/calls/originate ile tıkla-ara ve POST /api/v1/extensions/{id}/pairing ile tek kullanımlık mobil QR bağlantısı.',
                    'Real-time call.ringing, call.offered, call.answered, call.completed, recording.ready, and call.ai_completed events; click-to-call via POST /api/v1/calls/originate and one-time mobile QR onboarding via POST /api/v1/extensions/{id}/pairing.',
                    'Echtzeit-Events (call.ringing, answered, completed, recording.ready, call.ai_completed), Click-to-Call über POST /api/v1/calls/originate und einmaliges mobiles QR-Pairing über POST /api/v1/extensions/{id}/pairing.',
                    az: 'Real vaxt zəng hadisələri, POST /api/v1/calls/originate ilə zəng başlatma və POST /api/v1/extensions/{id}/pairing ilə birdəfəlik mobil QR qoşulma API-si.'
                ),
                'links' => [
                    ['/docs/rest-api-v1', 'fa-solid fa-terminal', t('REST API v1 Referansı', 'REST API v1 Reference', 'REST API v1 Referenz', az: 'REST API v1 İstinadı'), false, false],
                ],
            ],
        ],
    ],
    [
        'id' => 'uc-pbx',
        'heading' => t('Kurumsal Santral & Birleşik İletişim (UC)', 'Unified Communications & Enterprise PBX', 'Unified Communications & Telefonanlagen', az: 'Korporativ Santral & Vahid Rabitə'),
        'lead' => t('Mevcut Microsoft Teams ve Cisco altyapılarınızla kesintisiz SIP/SBC bağlantısı.', 'Seamless SIP and SBC interconnect with Microsoft Teams and Cisco CallManager.', 'Nahtlose SIP- und SBC-Kopplung mit Microsoft Teams und Cisco CallManager.', az: 'Mövcud Microsoft Teams və Cisco infrastrukturu ilə fasiləsiz SIP/SBC əlaqəsi.'),
        'items' => [
            [
                'wide' => false,
                'badge' => 'MS TEAMS SBC',
                'badgeBg' => '#4f46e5',
                'icon' => 'fa-solid fa-users-rectangle',
                'iconColor' => '#4f46e5',
                'title' => t('Microsoft Teams Direct Routing & Adaptive Cards', 'Microsoft Teams Direct Routing & Adaptive Cards', 'Microsoft Teams Direct Routing & Adaptive Cards', az: 'Microsoft Teams Direct Routing & Adaptive Cards'),
                'desc' => t(
                    'AiPBX\'i Microsoft Teams Direct Routing için Session Border Controller (SBC) olarak bağlayın; ayrıca Teams kanallarına anlık çağrı, faks ve sesli mesaj Adaptive Card bildirimleri gönderin (ms-teams eklentisi).',
                    'Connect AiPBX as a Session Border Controller (SBC) for Microsoft Teams Direct Routing and push real-time call, fax, and voicemail Adaptive Cards to Teams channels (ms-teams plugin).',
                    'Verbinden Sie AiPBX als Session Border Controller (SBC) für Microsoft Teams Direct Routing und senden Sie Echtzeit-Adaptive-Cards für Anrufe, Fax und Voicemail in Teams-Kanäle.',
                    az: 'AiPBX-i Microsoft Teams Direct Routing üçün SBC kimi qoşun və Teams kanallarına real vaxt zəng, faks və səsli poçt Adaptive Card bildirişləri göndərin.'
                ),
                'links' => [
                    ['/docs/trunks', 'fa-solid fa-network-wired', t('SIP & SBC Dokümanı', 'SIP & SBC Docs', 'SIP & SBC Doku', az: 'SIP & SBC Sənədləri'), false, false],
                ],
            ],
            [
                'wide' => false,
                'badge' => 'CISCO CUCM',
                'badgeBg' => '#0369a1',
                'icon' => 'fa-solid fa-server',
                'iconColor' => '#0369a1',
                'title' => t('Cisco CallManager (CUCM) SIP Trunk Bağlantısı', 'Cisco CallManager (CUCM) Interconnect', 'Cisco CallManager (CUCM) Kopplung', az: 'Cisco CallManager (CUCM) İnteqrasiyası'),
                'desc' => t(
                    'Cisco Unified Communications Manager ile çift yönlü SIP trunk bağlantısı, dahili numara yönlendirme ve aşamalı santral geçişi (coexistence) için hazır yapılandırma rehberi.',
                    'Bidirectional SIP trunking with Cisco Unified Communications Manager for extension routing, shared trunks, and zero-downtime migration/coexistence.',
                    'Bidirektionales SIP-Trunking mit Cisco Unified Communications Manager für Nebenstellen-Routing und schrittweise Migration ohne Ausfallzeiten.',
                    az: 'Cisco Unified Communications Manager ilə iki istiqamətli SIP trunk, daxili nömrə yönləndirmə və fasiləsiz keçid.'
                ),
                'links' => [
                    ['/docs/cisco-callmanager', 'fa-solid fa-book-open', t('Cisco CUCM Rehberi', 'Cisco CUCM Guide', 'Cisco CUCM Anleitung', az: 'Cisco CUCM Bələdçisi'), false, false],
                ],
            ],
        ],
    ],
    [
        'id' => 'sso-directory',
        'heading' => t('Kurumsal Kimlik Doğrulama (SSO) & Dizin', 'Enterprise SSO & Directory Sync', 'Enterprise-SSO & Verzeichnisdienste', az: 'Korporativ SSO & Kataloq Sinxronizasiyası'),
        'lead' => t('Kullanıcılarınızı mevcut kurumsal kimlik sağlayıcılarınızla tek tıkla oturum açtırın ve rehberleri eşitleyin.', 'Authenticate users with your corporate identity provider and sync directories automatically.', 'Melden Sie Benutzer über Ihren bestehenden Identity Provider an und synchronisieren Sie Verzeichnisse.', az: 'İstifadəçiləri korporativ kimlik təminatçınızla bir kliklə daxil edin və kataloqları sinxronlaşdırın.'),
        'items' => [
            [
                'wide' => false,
                'badge' => 'SAML 2.0 & OIDC',
                'badgeBg' => '#2563eb',
                'icon' => 'fa-solid fa-key',
                'iconColor' => '#2563eb',
                'title' => t('SAML 2.0 & OpenID Connect (Entra ID, Okta, Keycloak, Authentik)', 'SAML 2.0 & OpenID Connect (Entra ID, Okta, Keycloak, Authentik)', 'SAML 2.0 & OpenID Connect (Entra ID, Okta, Keycloak, Authentik)', az: 'SAML 2.0 & OpenID Connect (Entra ID, Okta, Keycloak, Authentik)'),
                'desc' => t(
                    'saml-auth ve oidc-auth eklentileri ile Microsoft Entra ID (Azure AD), Okta, Keycloak, Authentik ve ADFS üzerinden JIT otomatik kullanıcı oluşturma destekli kurumsal Tek Oturum Açma (SSO).',
                    'Enterprise Single Sign-On with Just-In-Time (JIT) user provisioning via saml-auth and oidc-auth plugins for Microsoft Entra ID, Okta, Keycloak, Authentik, and ADFS.',
                    'Enterprise Single Sign-On mit JIT-Provisioning über saml-auth und oidc-auth für Microsoft Entra ID, Okta, Keycloak, Authentik und ADFS.',
                    az: 'Microsoft Entra ID, Okta, Keycloak, Authentik və ADFS üçün saml-auth və oidc-auth plaginləri ilə JIT təminatlı korporativ SSO.'
                ),
                'links' => [
                    ['/docs/sso', 'fa-solid fa-shield-halved', t('SSO Kurulum Rehberi', 'SSO Setup Guide', 'SSO-Einrichtung', az: 'SSO Quraşdırma Bələdçisi'), false, false],
                ],
            ],
            [
                'wide' => false,
                'badge' => 'GOOGLE & LDAP / AD',
                'badgeBg' => '#16a34a',
                'icon' => 'fa-brands fa-google',
                'iconColor' => '#16a34a',
                'title' => t('Google Workspace OAuth 2.0 & LDAP / Active Directory', 'Google Workspace OAuth 2.0 & LDAP / Active Directory', 'Google Workspace OAuth 2.0 & LDAP / Active Directory', az: 'Google Workspace OAuth 2.0 & LDAP / Active Directory'),
                'desc' => t(
                    'Portal ve mobil uygulamalar için Google Workspace OAuth 2.0 girişi (google-auth); dahili sohbet ve Asterisk rehberi için LDAP / Active Directory kullanıcı senkronizasyonu.',
                    'Google Workspace OAuth 2.0 sign-in for portal and mobile apps (google-auth), plus LDAP / Active Directory sync for internal chat and Asterisk directory.',
                    'Google Workspace OAuth 2.0 Anmeldung für Portal und Mobile Apps (google-auth) sowie LDAP / Active Directory Synchronisation.',
                    az: 'Portal və mobil tətbiqlər üçün Google Workspace OAuth 2.0 girişi (google-auth) və daxili kataloq üçün LDAP / Active Directory sinxronizasiyası.'
                ),
                'links' => [
                    ['/docs/phonebook', 'fa-solid fa-address-book', t('Rehber & LDAP', 'Directory & LDAP', 'Telefonbuch & LDAP', az: 'Kataloq & LDAP'), false, false],
                ],
            ],
        ],
    ],
    [
        'id' => 'ai-voice',
        'heading' => t('Yapay Zekâ & Ses Otomasyonu Modülleri', 'AI & Voice Automation Plugins', 'KI- & Sprachautomatisierungs-Module', az: 'Süni İntellekt & Səs Avtomatlaşdırma Modulları'),
        'lead' => t('Sunucuda çalışan yerel TTS ve Silero VAD/Smart Turn modelleri ile Realtime ve Cascade bulut AI sağlayıcıları.', 'On-premise Local TTS (EMA, Piper, Kokoro) with Silero VAD/Smart Turn, plus Realtime and Cascade cloud AI providers.', 'Lokale Sprachausgabe (EMA, Piper, Kokoro) mit Silero VAD/Smart Turn sowie Realtime- und Cascade-Cloud-KI.', az: 'Serverdə işləyən yerli TTS və Silero VAD/Smart Turn modelləri ilə Realtime və Cascade bulud AI təminatçıları.'),
        'items' => [
            [
                'wide' => false,
                'badge' => 'LOCAL TTS & CLOUD AI · MOH',
                'badgeBg' => '#059669',
                'icon' => 'fa-solid fa-brain',
                'iconColor' => '#059669',
                'title' => t('Yerel TTS (ailocal), Bulut AI (aicloud) & ElevenLabs Bekleme Müziği', 'Local TTS (ailocal), Cloud AI (aicloud) & ElevenLabs Hold Music', 'Lokale TTS (ailocal), Cloud-KI (aicloud) & ElevenLabs Wartemusik', az: 'Yerli TTS (ailocal), Bulud AI (aicloud) & ElevenLabs Gözləmə Musiqisi'),
                'desc' => t(
                    'ARI / AudioSocket üzerinden Realtime (OpenAI, Gemini Live, xAI) veya Cascade sesli ajanlar; sunucuda EMA/Piper/Kokoro + Silero VAD; ai-tts stüdyosunda 8 anons şablonu, ElevenLabs bekleme müziği (MOH) üretimi ve Bilgi Bankası RAG (ai-knowledge).',
                    'Realtime (OpenAI, Gemini Live, xAI) and Cascade voice agents over ARI / AudioSocket; on-premise EMA, Piper, Kokoro & Silero VAD; ai-tts studio with 8 prompt templates and ElevenLabs Hold Music (MOH) generator; plus Knowledge Base RAG (ai-knowledge).',
                    'Realtime- (OpenAI, Gemini Live, xAI) und Cascade-Sprachagenten über ARI/AudioSocket; lokales EMA/Piper/Kokoro + Silero VAD; ai-tts mit 8 Ansagevorlagen und ElevenLabs-Wartemusik (MOH) sowie RAG-Wissensdatenbank.',
                    az: 'ARI / AudioSocket üzərindən Realtime və Cascade səsli agentlər; serverdə EMA/Piper/Kokoro + Silero VAD; ai-tts studiyasında 8 şablon və ElevenLabs gözləmə musiqisi (MOH).'
                ),
                'links' => [
                    ['/docs/local-ai', 'fa-solid fa-microchip', t('Yerel TTS', 'Local TTS', 'Lokale TTS', az: 'Yerli TTS'), false, false],
                    ['/docs/cloud-ai', 'fa-solid fa-cloud', t('Bulut AI', 'Cloud AI', 'Cloud-KI', az: 'Bulud AI'), false, false],
                    ['/docs/cloud-tts', 'fa-solid fa-music', t('TTS & MOH Stüdyo', 'TTS & MOH Studio', 'TTS- & MOH-Studio', az: 'TTS & MOH Studiya'), false, false],
                ],
            ],
            [
                'wide' => false,
                'badge' => 'AUTO-QA & VOICEMAIL',
                'badgeBg' => '#0d9488',
                'icon' => 'fa-solid fa-wand-magic-sparkles',
                'iconColor' => '#0d9488',
                'title' => t('Çağrı Analizi (Auto-QA), AI Sesli Mesaj & PBX Asistanı', 'Call Analysis (Auto-QA), AI Voicemail & PBX Assistant', 'Anrufanalyse (Auto-QA), KI-Voicemail & PBX-Assistent', az: 'Zəng Analizi (Auto-QA), AI Səsli Poçt & PBX Assistenti'),
                'desc' => t(
                    'Görüşme kayıtlarını otomatik yazıya dökün, özetleyin ve kalite puanı (Auto-QA) üretin (ai-call-analysis); ajan bazlı AI çağrı kaydı ve CDR oynatma; sesli mesaj özetleri (ai-voicemail) ve doğal dille santral yönetimi (pbx-assistant).',
                    'Automatic call transcription, summaries, and Auto-QA scoring (ai-call-analysis), per-agent call recording with CDR playback, executive voicemail summaries (ai-voicemail), and natural-language PBX Assistant (pbx-assistant).',
                    'Automatische Transkription, Zusammenfassung und Auto-QA-Bewertung (ai-call-analysis), agentenbasierte KI-Aufnahme, Voicemail-Zusammenfassung (ai-voicemail) und KI-Assistent (pbx-assistant).',
                    az: 'Zəng yazılarını avtomatik mətnə çevirin, xülasə və keyfiyyət balı yaradın (ai-call-analysis), agent zəng yazısı, səsli mesaj xülasələri (ai-voicemail) və PBX Assistenti (pbx-assistant).'
                ),
                'links' => [
                    ['/features', 'fa-solid fa-sparkles', t('Tüm AI Özellikleri', 'All AI Features', 'Alle KI-Funktionen', az: 'Bütün AI Xüsusiyyətləri'), false, false],
                    ['/docs/ai-settings', 'fa-solid fa-robot', t('AI Mimarisi', 'AI Settings', 'KI-Einstellungen', az: 'AI Tənzimləmələri'), false, false],
                ],
            ],
        ],
    ],
    [
        'id' => 'web-messaging-data',
        'heading' => t('Web, Mesajlaşma, Harici Veri & Depolama', 'Web, Messaging, External Data & Storage', 'Web, Messaging, Externe Daten & Speicher', az: 'Veb, Mesajlaşma, Xarici Verilənlər & Saxlama'),
        'lead' => t('Web sitenizden tek tıkla arama, SMS/SMTP geçitleri, harici veritabanı CNAM sorgusu ve S3 arşivleme.', 'Click-to-call website widgets, SMS/SMTP gateways, external DB caller ID lookup, and S3 archiving.', 'Click-to-Call-Web-Widgets, SMS-/SMTP-Gateways, externe Datenbank-CNAM-Abfrage und S3-Archivierung.', az: 'Veb saytdan kliklə zəng, SMS/SMTP keçidləri, xarici DB CNAM sorğusu və S3 arxivləşdirmə.'),
        'items' => [
            [
                'wide' => false,
                'badge' => 'WEB WIDGETS & WORDPRESS',
                'badgeBg' => '#e11d48',
                'icon' => 'fa-solid fa-window-maximize',
                'iconColor' => '#e11d48',
                'title' => t('Web & WordPress Tıkla-Ara Widget\'ları', 'Website & WordPress Click-to-Call Widgets', 'Website- & WordPress-Click-to-Call-Widgets', az: 'Veb & WordPress Kliklə Zəng Vidcetləri'),
                'desc' => t(
                    'Herhangi bir web sitesine veya WordPress\'e domain beyaz listesi (origin allowlist) ve günlük limit korumalı WebRTC sesli arama düğmesi veya geri arama formu yerleştirin (web-widgets eklentisi).',
                    'Embed WebRTC audio call buttons and callback forms on any website or WordPress site with origin allowlists and daily rate limits (web-widgets plugin).',
                    'Betten Sie WebRTC-Anrufbuttons und Rückrufformulare auf jeder Website oder WordPress-Seite mit Origin-Allowlist und Tageslimits ein.',
                    az: 'İstənilən veb sayta və ya WordPress-ə domen icazə siyahısı və günlük limit qorumalı WebRTC zəng düyməsi və geri zəng formu yerləşdirin.'
                ),
                'links' => [
                    ['/docs/web-widgets', 'fa-solid fa-code', t('Widget Dokümanı', 'Widget Docs', 'Widget-Doku', az: 'Vidcet Sənədləri'), false, false],
                ],
            ],
            [
                'wide' => false,
                'badge' => 'SMS · SMTP · CNAM · S3',
                'badgeBg' => '#b45309',
                'icon' => 'fa-solid fa-database',
                'iconColor' => '#b45309',
                'title' => t('SMS, E-posta/Faks, Harici DB (CNAM) & S3 Depolama', 'SMS, Email/Fax, External DB (CNAM) & S3 Storage', 'SMS, E-Mail/Fax, Externe DB (CNAM) & S3-Speicher', az: 'SMS, E-poçt/Faks, Xarici DB (CNAM) & S3 Saxlama'),
                'desc' => t(
                    'SMS sağlayıcı entegrasyonu, SMTP e-posta ve T.38 fax-to-email, harici SQL/HTTP veritabanlarından anlık arayan adı sorgulama (CNAM) ve ses kayıtları için S3 uyumlu bulut depolama.',
                    'SMS gateway integration, SMTP email and T.38 fax-to-email, real-time Caller ID (CNAM) lookup from external SQL/HTTP databases, and S3-compatible object storage for recordings.',
                    'SMS-Gateway-Integration, SMTP-E-Mail und T.38 Fax-to-Email, Echtzeit-CNAM-Abfrage aus externen SQL/HTTP-Datenbanken und S3-kompatibler Objektspeicher.',
                    az: 'SMS keçidi, SMTP e-poçt və T.38 fax-to-email, xarici SQL/HTTP verilənlər bazalarından CNAM sorğusu və S3 uyğun bulud saxlama.'
                ),
                'links' => [
                    ['/docs/sms', 'fa-solid fa-comment-sms', 'SMS', false, false],
                    ['/docs/external-databases', 'fa-solid fa-database', 'External DB', false, false],
                    ['/docs/cnam', 'fa-solid fa-id-card', 'CNAM', false, false],
                    ['/docs/file-storage', 'fa-solid fa-hard-drive', 'S3 Storage', false, false],
                ],
            ],
        ],
    ],
    [
        'id' => 'plugins-infra',
        'heading' => t('Modüler Eklenti SDK, Telefonlar & Bulut', 'Modular Plugin SDK, Hardware & Cloud', 'Modulares Plugin-SDK, Hardware & Cloud', az: 'Modul Plagin SDK, Telefonlar & Bulud'),
        'lead' => t('Kendi .zip eklentinizi geliştirin, Ed25519 imzalı katalogdan VoIP Billing/Auto-Dialer kurun ve IP telefonları otomatik yönetin.', 'Build custom .zip plugins, install VoIP Billing & Auto-Dialer from the signed catalog, and auto-provision desk phones.', 'Eigene .zip-Plugins entwickeln, VoIP Billing & Auto-Dialer aus dem signierten Katalog installieren und Tischtelefone provisionieren.', az: 'Öz .zip plagininizi yaradın, imzalı kataloqdan VoIP Billing və Auto-Dialer quraşdırın.'),
        'items' => [
            [
                'wide' => false,
                'badge' => 'PLUGIN SDK · BILLING',
                'badgeBg' => '#6d28d9',
                'icon' => 'fa-solid fa-puzzle-piece',
                'iconColor' => '#6d28d9',
                'title' => t('Eklenti Kataloğu, VoIP Billing (ClientFence) & Özel .zip SDK', 'Signed Plugin Catalog, VoIP Billing (ClientFence) & .zip SDK', 'Signierter Plugin-Katalog, VoIP Billing & .zip-SDK', az: 'İmzalı Plagin Kataloqu, VoIP Billing & .zip SDK'),
                'desc' => t(
                    '13 resmi eklentiye ek olarak imzalı topluluk kataloğu: VoIP Billing (ClientFence / FOSSBilling taslak fatura), Auto-Dialer & AMD, CNAM, SMS/MMS, LDAP Sync ve Operatör Şablonları; ya da kendi plugin.json tabanlı .zip eklentinizi yükleyin.',
                    'Signed community catalog alongside 13 official plugins: VoIP Billing (ClientFence / FOSSBilling draft invoices), Auto-Dialer & AMD, CNAM, SMS/MMS, LDAP Sync, and Provider Templates; or upload your own plugin.json .zip package.',
                    'Signierter Community-Katalog neben 13 offiziellen Plugins: VoIP Billing (ClientFence / FOSSBilling), Auto-Dialer & AMD, CNAM, SMS/MMS, LDAP Sync und Provider-Vorlagen; oder eigenes plugin.json .zip-Paket hochladen.',
                    az: '13 rəsmi plaginlə yanaşı imzalı icma kataloqu: VoIP Billing (ClientFence / FOSSBilling), Auto-Dialer & AMD, CNAM, SMS/MMS, LDAP Sync və ya öz plugin.json .zip paketiniz.'
                ),
                'links' => [
                    ['/docs/plugin-development', 'fa-solid fa-wrench', t('Eklenti Geliştirici Rehberi', 'Plugin Developer Guide', 'Plugin-Entwicklerhandbuch', az: 'Plagin Tərtibatçı Bələdçisi'), false, false],
                    ['https://github.com/mahirgul/AiPBX-plugins', 'fa-brands fa-github', t('Topluluk Eklentileri', 'Community Plugins', 'Community-Plugins', az: 'İcma Plaginləri'), false, true],
                ],
            ],
            [
                'wide' => false,
                'badge' => 'PHONES & CLOUD',
                'badgeBg' => '#0284c7',
                'icon' => 'fa-solid fa-mobile-screen-button',
                'iconColor' => '#0284c7',
                'title' => t('Android, iOS, IP Telefonlar & UpCloud ($250 Kredi)', 'Android, iOS, IP Phones & UpCloud ($250 Credit)', 'Android, iOS, IP-Telefone & UpCloud (250 $ Guthaben)', az: 'Android, iOS, IP Telefonlar & UpCloud ($250 Kredit)'),
                'desc' => t(
                    'Google Play Android, iOS SwiftUI/CallKit (IPA & Simulator), WebRTC ve Yealink (OpenVPN .tar dahil) / Fanvil / Grandstream / Cisco otomatik provizyon. Ubuntu/Debian/Raspberry Pi ve Incus/LXD üzerine tek komutla kurulum; UpCloud\'da $250 kredi.',
                    'Google Play Android, iOS SwiftUI/CallKit (IPA & Simulator builds), WebRTC, and Yealink (incl. OpenVPN .tar) / Fanvil / Grandstream / Cisco auto-provisioning. One-command deploy on Ubuntu/Debian/Raspberry Pi/Incus, plus $250 free UpCloud credit.',
                    'Google Play Android, iOS SwiftUI/CallKit (IPA & Simulator), WebRTC und Yealink (inkl. OpenVPN-.tar) / Fanvil / Grandstream / Cisco Auto-Provisioning. Ein-Befehl-Installation sowie 250 $ UpCloud-Startguthaben.',
                    az: 'Google Play Android, iOS SwiftUI/CallKit (IPA & Simulator), WebRTC və Yealink/Fanvil/Grandstream/Cisco avtomatik sazlama. Ubuntu/Debian/Raspberry Pi quraşdırması və UpCloud $250 kredit.'
                ),
                'links' => [
                    ['/mobile', 'fa-solid fa-mobile-retro', t('Mobil Uygulamalar', 'Mobile Apps', 'Mobile Apps', az: 'Mobil Tətbiqlər'), false, false],
                    ['https://github.com/' . GITHUB_IOS_REPO . '/releases/latest', 'fa-brands fa-apple', t('iOS (IPA)', 'iOS (IPA)', 'iOS (IPA)', az: 'iOS (IPA)'), false, true],
                    ['/docs/phones', 'fa-solid fa-phone', t('IP Telefonlar', 'Desk Phones', 'Tischtelefone', az: 'IP Telefonlar'), false, false],
                    ['https://signup.upcloud.com/?promo=affiliate-aipbx250&amp;utm_source=aipbx&amp;utm_medium=affiliate&amp;utm_campaign=affiliate-aipbx250', 'fa-solid fa-cloud', 'UpCloud ($250)', false, true],
                ],
            ],
        ],
    ],
];
?>
<!DOCTYPE html>
<html lang="<?= e($LANG) ?>" data-lang="<?= e($LANG) ?>">
<head>
    <?php include __DIR__ . '/includes/head.php'; ?>
    <?php include __DIR__ . '/includes/seo-helper.php'; ?>
</head>
<body class="sx-page">
<?php include __DIR__ . '/includes/navbar.php'; ?>

<main>
    <?php include __DIR__ . '/includes/sections/pagehead.php'; ?>

    <?php foreach ($categories as $idx => $cat): ?>
    <section class="sx-section<?= $idx % 2 === 1 ? ' alt' : '' ?>" id="<?= e($cat['id']) ?>">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= $cat['heading'] ?></h2>
            <p class="sx-lead"><?= $cat['lead'] ?></p>
            <div class="sx-apps">
                <?php foreach ($cat['items'] as $item): ?>
                    <div class="sx-app<?= $item['wide'] ? ' sx-app-wide' : '' ?>">
                        <div style="margin-bottom:8px;">
                            <span style="display:inline-block;background:<?= $item['badgeBg'] ?>;color:#fff;font-size:.7rem;font-weight:700;padding:3px 9px;border-radius:999px;letter-spacing:.04em;"><?= e($item['badge']) ?></span>
                        </div>
                        <h3><i class="<?= $item['icon'] ?>" style="color:<?= $item['iconColor'] ?>;margin-right:6px;"></i><?= $item['title'] ?></h3>
                        <p><?= $item['desc'] ?></p>
                        <div class="row">
                            <?php foreach ($item['links'] as [$href, $icon, $label, $primary, $ext]): ?>
                                <a href="<?= $href ?>"<?= $ext ? ' target="_blank" rel="noopener"' : '' ?> class="sx-btn <?= $primary ? 'sx-btn-primary' : 'sx-btn-ghost' ?>">
                                    <i class="<?= $icon ?>"></i> <?= $label ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endforeach; ?>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
