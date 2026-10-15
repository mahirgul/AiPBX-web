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
