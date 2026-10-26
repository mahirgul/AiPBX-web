# AiPBX Website & Documentation Portal (`aipbx.bid`)

The official marketing website, documentation viewer, and mobile portal for [AiPBX](https://github.com/mahirgul/AiPBX).

🌐 **Live Website:** [https://aipbx.bid](https://aipbx.bid)  
📦 **Main PBX Repository:** [mahirgul/AiPBX](https://github.com/mahirgul/AiPBX)  
🧩 **Plugins Repository:** [mahirgul/AiPBX-plugins](https://github.com/mahirgul/AiPBX-plugins)  
📱 **Google Play Store:** [AiPBX on Google Play](https://play.google.com/store/apps/details?id=com.mhrgl.AiPBX)

---

## 🌟 Overview

- **Landing Page (`index.php`):** Highlighting AiPBX core features, turnkey one-command installation, screenshots of live system management, mobile app showcase, GitHub release versioning, and community sponsor support.
- **Documentation Hub (`docs.php`):** Renders all Markdown documentation files directly from the main `AiPBX` repository in real time. Hourly automated synchronization via cron pulls latest docs without manual deploys.
- **Android App & Store Links:** Direct Google Play Store link and direct APK download.
- **Multilingual Support (i18n):** Full support for Turkish (TR), English (EN), German (DE), and Azerbaijani (AZ). English is the unprefixed default (`/features`); the others live under `/tr/`, `/de/` and `/az/`. A first visit is sent to the browser's language once; old `/en/` links redirect (301) to the unprefixed addresses.
- **SEO & Social Optimization:** Dynamic OpenGraph preview tags, canonical URLs, JSON-LD schemas, and auto-generated XML sitemaps (`sitemap.xml`, `sitemap-docs.xml`).

---

## 🏗️ Structure

```text
├── css/
│   ├── docs-md.css      # Documentation Markdown rendering stylesheet
│   └── site.css         # Modern, responsive site chrome (navbar, footer, hero, cards)
├── data.json            # Structured feature matrices, metadata, and comparisons
├── deploy/
│   ├── aipbx-docs.cron  # Hourly cron definition for pulling docs from GitHub
│   └── sync-docs.sh     # Sync script for GitHub markdown docs and sitemap generation
├── docs.php             # Dynamic Markdown documentation viewer
├── img/                 # Screenshots, app icons, and branding assets
├── includes/
│   ├── data.php         # Release fetcher, translation helpers, language detection
│   ├── footer.php       # Universal footer component with sponsor and partner badges
│   ├── head.php         # HTML meta tags, favicons, fonts, and stylesheets
│   ├── navbar.php       # Sticky responsive navbar with language switcher
│   └── seo-helper.php   # Dynamic metadata, OpenGraph, JSON-LD schema builder
├── index.php            # Homepage
├── js/
│   └── site.js          # Lightweight vanilla JS for mobile menu, tabs, copy buttons
├── robots.txt           # Search engine crawling rules and sitemap pointers
└── sitemap.xml          # Core multi-lingual sitemap
```

---

## 🚀 Deployment

The site runs on PHP 8 with Nginx / Apache behind Cloudflare.

```bash
# Production server document root
/var/www/aipbx.bid/public_html
```

---

## 📄 License

This project is open-source under the [MIT License](https://opensource.org/licenses/MIT).
