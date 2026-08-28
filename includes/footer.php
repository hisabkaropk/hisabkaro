<?php
/**
 * Shared footer + closing </body></html>, included by every page.
 *
 * Pages set these variables before requiring this file:
 *   $footerVariant string  'full' | 'simple' | 'legal'  (default 'simple')
 *   $footerText    string  raw HTML for the disclaimer paragraph -- 'simple' variant only
 *   $backHref      string  e.g. '/' or '/blog'             -- 'simple' variant only
 *   $backLabel     string  e.g. 'Back to Hisabkaro Home'    -- 'simple' variant only
 *   $pageScript    string|null  filename under assets/js/ to load before </body>
 */

$footerVariant = $footerVariant ?? 'simple';
$pageScript    = $pageScript    ?? null;
?>

<?php if ($footerVariant === 'full'): ?>
<footer>
  <div class="wrap">
    <p style="font-size:12.5px; color:#9AA1B4; margin:0 0 28px; max-width:70ch;">This is an independent estimator, not an official FBR tool and not tax advice. For filing your return, consult a licensed tax practitioner or FBR's IRIS portal.</p>
    <div class="footer-grid">
      <div class="footer-col footer-brand">
        <a href="/" class="site-logo"><span class="dot"></span>Hisabkaro</a>
        <p>A free, independent salary tax calculator for Pakistan &mdash; updated every year when the federal budget lands.</p>
      </div>
      <div class="footer-col">
        <h4>Tools</h4>
        <ul>
          <li><a href="#calculator">Salary Calculator</a></li>
          <li><a href="#slabs">Tax Slabs FY26-27</a></li>
          <li><a href="#tools">More Tools</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Resources</h4>
        <ul>
          <li><a href="#faq">FAQ</a></li>
          <li><a href="/blog">Blog</a></li>
          <li><a href="/about">About Us</a></li>
          <li><a href="https://iris.fbr.gov.pk" target="_blank" rel="noopener">FBR IRIS Portal</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Site</h4>
        <ul>
          <li><a href="/privacy-policy">Privacy Policy</a></li>
          <li><a href="/terms">Terms of Use</a></li>
          <li><a href="/contact">Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; 2026 Hisabkaro. Not affiliated with FBR.</span>
      <span>Estimates based on Finance Act 2026 &middot; Last updated August 2026</span>
    </div>
  </div>
</footer>

<?php elseif ($footerVariant === 'legal'): ?>
<footer>
  <div class="wrap">&copy; 2026 Hisabkaro. Not affiliated with FBR.</div>
</footer>

<?php else: /* 'simple' */ ?>
<footer>
  <div class="wrap">
    <p><?= $footerText ?? '' ?></p>
    <a href="<?= htmlspecialchars($backHref ?? '/') ?>">&larr; <?= htmlspecialchars($backLabel ?? 'Back to Hisabkaro Home') ?></a>
  </div>
</footer>

<?php endif; ?>

<?php if ($pageScript): ?>
<script src="/assets/js/<?= htmlspecialchars($pageScript) ?>"></script>
<?php endif; ?>
</body>
</html>
