<?php
/** aipbx.bid — FAQ section on /features and quick links to deep-dive technology articles. */
?>
    <section class="sx-section" id="faq">
        <div class="sx-wrap">
            <h2 class="sx-h2"><?= t('Sık sorulanlar', 'Questions', 'Häufige Fragen', az: 'Tez-tez verilən suallar') ?></h2>
            <p class="sx-lead"><?= t('Mimari ve teknolojiler hakkında tüm makaleler SSS bölümünde.', 'Dedicated deep-dives on every technology we use and test live under FAQ.', 'Alle Fachartikel zu eingesetzten und getesteten Technologien im FAQ-Bereich.', az: 'İstifadə etdiyimiz və sınaqdan keçirdiyimiz bütün texnologiyalar haqqında məqalələr.') ?></p>
            <div class="sx-faq">
                <?php foreach ($faq as $i => $f): ?>
                    <details<?= $i === 0 ? ' open' : '' ?>>
                        <summary><?= e(getLocal($f, 'q')) ?></summary>
                        <p>
                            <?= e(getLocal($f, 'a')) ?>
                            <?php if (!empty($f['link'])): ?>
                                <br><a href="<?= e($f['link']) ?>" style="display:inline-block;margin-top:8px;font-weight:700;text-decoration:none;"><?= t('Teknik makaleyi oku →', 'Read technical article →', 'Fachartikel lesen →', az: 'Texniki məqaləni oxu →') ?></a>
                            <?php endif; ?>
                        </p>
                    </details>
                <?php endforeach; ?>
            </div>
            <div style="max-width:780px;margin:22px auto 0;display:flex;flex-wrap:wrap;gap:8px;justify-content:center;">
                <a href="/why-php" class="sx-btn sx-btn-ghost" style="padding:8px 14px;font-size:.86rem;"><?= t('Neden PHP?', 'Why PHP?', 'Warum PHP?', az: 'Niyə PHP?') ?></a>
                <a href="/faq/quic" class="sx-btn sx-btn-ghost" style="padding:8px 14px;font-size:.86rem;">VoIP over QUIC</a>
                <a href="/faq/port-443-alpn" class="sx-btn sx-btn-ghost" style="padding:8px 14px;font-size:.86rem;">Port 443 ALPN</a>
                <a href="/faq/onnx-local-tts" class="sx-btn sx-btn-ghost" style="padding:8px 14px;font-size:.86rem;">ONNX Local TTS</a>
                <a href="/faq/silero-smart-turn" class="sx-btn sx-btn-ghost" style="padding:8px 14px;font-size:.86rem;">Silero VAD & Smart Turn</a>
                <a href="/faq/go-chat" class="sx-btn sx-btn-ghost" style="padding:8px 14px;font-size:.86rem;">Go WebSocket Chat</a>
                <a href="/faq" class="sx-btn sx-btn-primary" style="padding:8px 14px;font-size:.86rem;"><?= t('Tüm 12 teknoloji makalesi →', 'All 12 technology articles →', 'Alle 12 Technologie-Artikel →', az: 'Bütün 12 texnologiya məqaləsi →') ?></a>
            </div>
        </div>
    </section>
