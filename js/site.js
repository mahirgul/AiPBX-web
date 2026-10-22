// aipbx.bid — menu, language list, screenshot tabs and copy buttons.
(function () {
    var nav = document.getElementById('sxNav');
    var burger = document.getElementById('sxBurger');
    if (nav && burger) {
        burger.addEventListener('click', function () {
            var open = nav.classList.toggle('open');
            burger.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
        // Closing on a link: the home page links are anchors on the same page.
        document.querySelectorAll('#sxMobile a').forEach(function (a) {
            a.addEventListener('click', function () { nav.classList.remove('open'); burger.setAttribute('aria-expanded', 'false'); });
        });
    }

    var lang = document.getElementById('sxLang');
    if (lang) {
        lang.querySelector('button').addEventListener('click', function (e) { e.stopPropagation(); lang.classList.toggle('open'); });
        document.addEventListener('click', function () { lang.classList.remove('open'); });
    }

    document.querySelectorAll('[data-shot-tab]').forEach(function (tab) {
        tab.addEventListener('click', function () {
            var id = tab.getAttribute('data-shot-tab');
            document.querySelectorAll('[data-shot-tab]').forEach(function (t) { t.classList.toggle('active', t === tab); t.setAttribute('aria-selected', t === tab ? 'true' : 'false'); });
            document.querySelectorAll('.sx-shot').forEach(function (s) { s.classList.toggle('active', s.id === id); });
        });
    });

    document.querySelectorAll('[data-copy]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var text = btn.getAttribute('data-copy');
            var done = function () { var o = btn.textContent; btn.textContent = '✓'; setTimeout(function () { btn.textContent = o; }, 1800); };
            if (navigator.clipboard) { navigator.clipboard.writeText(text).then(done); }
        });
    });
})();

// Videos: load the YouTube player only after a click (no third-party request before).
(function () {
    document.querySelectorAll('.sx-video[data-yt]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var id = btn.getAttribute('data-yt'), hl = btn.getAttribute('data-lang') || 'en';
            var f = document.createElement('iframe');
            f.src = 'https://www.youtube-nocookie.com/embed/' + encodeURIComponent(id) + '?autoplay=1&rel=0&cc_load_policy=1&hl=' + encodeURIComponent(hl);
            f.allow = 'autoplay; encrypted-media; picture-in-picture; fullscreen';
            f.allowFullscreen = true;
            f.title = btn.getAttribute('aria-label') || 'Video';
            var box = document.createElement('div');
            box.className = 'sx-video';
            box.appendChild(f);
            btn.replaceWith(box);
        });
    });
})();
