<?php
$pageTitle       = 'Zakat Calculator Pakistan | Nisab-Based Zakat Calculation';
$pageDescription = 'Calculate your annual Zakat on cash, gold, silver, and business assets using the correct Nisab threshold. Free, instant, based on standard Islamic jurisprudence.';
$canonicalPath   = '/zakat-calculator.php';
$og = [
    'type'        => 'website',
    'title'       => 'Zakat Calculator Pakistan',
    'description' => 'Calculate your annual Zakat on cash, gold, silver, and business assets using the correct Nisab threshold.',
    'path'        => $canonicalPath,
];
$jsonLd = [
<<<'JSON'
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Zakat Calculator Pakistan",
  "applicationCategory": "FinanceApplication",
  "operatingSystem": "Any",
  "url": "https://YOURDOMAIN.pk/zakat-calculator.php",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "PKR" },
  "description": "Free Zakat calculator for cash, gold, silver, and business assets using Nisab-based Islamic jurisprudence."
}
JSON,
];
$pageStyles  = ['common.css', 'zakat-calculator.css'];
$navVariant  = 'calc';
$currentPage = 'zakat';
require __DIR__ . '/includes/header.php';
?>

<div class="hero-band">
  <div class="wrap">
    <header class="top">
      <div class="eyebrow">Zakat &middot; Pakistan</div>
      <h1 class="title">Zakat Calculator</h1>
      <p class="sub">Work out your annual Zakat on cash, gold, silver, and business assets &mdash; checked against the correct Nisab threshold.</p>
    </header>
  </div>
</div>

<div class="wrap">

  <div class="calc-card">
    <div class="calc-inner">

      <div class="field">
        <label class="field-label" for="cashAssets">Cash, bank balances &amp; receivables</label>
        <div class="amount-row"><span class="rs">Rs.</span><input id="cashAssets" class="zk-input" type="text" inputmode="numeric" value="0"></div>
      </div>

      <div class="field-grid">
        <div class="field">
          <label class="field-label" for="goldGrams">Gold owned (grams)</label>
          <div class="amount-row"><span class="rs">g</span><input id="goldGrams" class="zk-input" type="text" inputmode="numeric" value="0"></div>
        </div>
        <div class="field">
          <label class="field-label" for="goldPrice">Gold price (Rs./gram)</label>
          <div class="amount-row"><span class="rs">Rs.</span><input id="goldPrice" class="zk-input" type="text" inputmode="numeric" value="0"></div>
        </div>
      </div>

      <div class="field-grid">
        <div class="field">
          <label class="field-label" for="silverGrams">Silver owned (grams)</label>
          <div class="amount-row"><span class="rs">g</span><input id="silverGrams" class="zk-input" type="text" inputmode="numeric" value="0"></div>
        </div>
        <div class="field">
          <label class="field-label" for="silverPrice">Silver price (Rs./gram)</label>
          <div class="amount-row"><span class="rs">Rs.</span><input id="silverPrice" class="zk-input" type="text" inputmode="numeric" value="0"></div>
        </div>
      </div>

      <div class="field">
        <label class="field-label" for="businessAssets">Business inventory / investments (net of debt)</label>
        <div class="amount-row"><span class="rs">Rs.</span><input id="businessAssets" class="zk-input" type="text" inputmode="numeric" value="0"></div>
      </div>

      <div class="field">
        <label class="field-label" for="liabilities">Short-term debts owed by you (subtracted)</label>
        <div class="amount-row"><span class="rs">Rs.</span><input id="liabilities" class="zk-input" type="text" inputmode="numeric" value="0"></div>
      </div>

      <label class="field-label" style="margin-bottom:10px;">Nisab basis</label>
      <div class="nisab-toggle">
        <label class="radio-opt"><input type="radio" name="nisabBasis" value="silver" checked> Silver (612.36g) &mdash; lower threshold</label>
        <label class="radio-opt"><input type="radio" name="nisabBasis" value="gold"> Gold (87.48g)</label>
      </div>

      <div class="results">
        <div class="zk-headline">
          <div class="lbl">Zakat Payable</div>
          <div class="amt" id="zakatAmount">Rs. 0</div>
          <span class="status-pill" id="zakatStatus"></span>
        </div>
        <div class="stat-row"><span>Total Zakatable wealth</span><span class="val" id="totalWealth">Rs. 0</span></div>
        <div class="stat-row"><span>Nisab threshold (your basis)</span><span class="val" id="nisabValue">Rs. 0</span></div>
        <div class="stat-row"><span>Zakat rate</span><span class="val">2.5%</span></div>
      </div>

      <p style="font-size:12px; color:var(--ink-soft); margin-top:14px;">This assumes you've held this wealth for one lunar year (Hawl). Enter today's gold/silver price yourself &mdash; check a jeweller's association rate or your bank before calculating, since prices move daily and this calculator doesn't fetch them automatically.</p>
    </div>
  </div>

  <section class="prose">
    <h2 class="section-title">How Zakat Is Calculated Here</h2>
    <p>Zakat is due at <strong>2.5% of qualifying wealth</strong> held for a full lunar year, once that wealth exceeds the Nisab threshold. Nisab can be measured two ways: the value of <strong>87.48 grams of gold</strong>, or the value of <strong>612.36 grams of silver</strong> &mdash; the silver measure is lower, so more scholars recommend it as the more cautious default when your wealth is mixed (cash plus some gold), which is why it's selected by default above.</p>
    <p>Debts you owe (short-term, due soon) are subtracted from your total before the Nisab check, since Zakat is due on <strong>net</strong> wealth, not gross assets.</p>
  </section>

  <section id="faq">
    <h2 class="section-title">Frequently Asked Questions</h2>

    <details open>
      <summary>Why Does This Ask Me to Enter the Gold/Silver Price?</summary>
      <p>Gold and silver prices change daily and vary slightly between dealers. Rather than showing you a number that's wrong by the time you read it, we ask you to enter today's rate from a source you trust &mdash; your local jeweller's association rate is the standard reference most people use in Pakistan.</p>
    </details>

    <details>
      <summary>Should I Use the Gold or Silver Nisab?</summary>
      <p>Both are valid in Islamic jurisprudence. Silver gives a lower threshold, meaning Zakat becomes due sooner &mdash; many scholars consider this the more cautious choice for people whose wealth is a mix of cash and a small amount of gold. If your wealth is almost entirely gold, some prefer using the gold Nisab instead. If unsure, ask a scholar you trust.</p>
    </details>

    <details>
      <summary>Do I Need to Pay Zakat on Jewellery I Wear?</summary>
      <p>This is genuinely disputed among scholars &mdash; some hold that gold/silver jewellery in regular personal use is exempt, others hold that all gold/silver is Zakatable regardless of use. This calculator includes all gold/silver you enter; if you follow the "jewellery in use is exempt" view, simply exclude that portion from the amount you enter.</p>
    </details>

    <details>
      <summary>What Counts as a "Short-Term Debt" I Can Subtract?</summary>
      <p>Debts due within the near term &mdash; money you owe and must repay soon, like a personal loan installment or credit card balance. Long-term debts like the remaining 15 years of a home loan are generally not fully deducted; only the portion due imminently. If your situation is complex, a scholar or Islamic finance advisor can help you apply this correctly.</p>
    </details>
  </section>

</div>

<?php
$footerVariant = 'simple';
$footerText    = "This is an independent calculator based on standard Zakat methodology, not a religious ruling (fatwa). For your specific situation, especially disputed points like jewellery-in-use or complex business assets, consult a scholar you trust.";
$backHref      = '/';
$backLabel     = 'Back to Hisabkaro Home';
$pageScript    = 'zakat-calculator.js';
require __DIR__ . '/includes/footer.php';
