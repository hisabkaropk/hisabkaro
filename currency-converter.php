<?php
$pageTitle       = 'Currency Converter Pakistan | PKR to USD, SAR, AED, GBP';
$pageDescription = 'Convert PKR to USD, SAR, AED, GBP, EUR and more. Free currency converter with daily reference rates, useful for overseas Pakistanis and remittances.';
$canonicalPath   = '/currency-converter';
$og = [
    'type'        => 'website',
    'title'       => 'Currency Converter Pakistan',
    'description' => 'Convert PKR to USD, SAR, AED, GBP, EUR and more, with daily reference rates.',
    'path'        => $canonicalPath,
];
$jsonLd = [
<<<'JSON'
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Currency Converter Pakistan",
  "applicationCategory": "FinanceApplication",
  "operatingSystem": "Any",
  "url": "https://hisabkaro.pk/currency-converter",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "PKR" },
  "description": "Free currency converter for PKR to USD, SAR, AED, GBP, EUR and more, using daily ECB reference rates."
}
JSON,
];
$pageStyles  = ['common.css', 'currency-converter.css'];
$navVariant  = 'calc';
$currentPage = 'currency-converter';
require __DIR__ . '/includes/header.php';
?>

<div class="hero-band">
  <div class="wrap">
    <header class="top">
      <div class="eyebrow">Currency &middot; Pakistan</div>
      <h1 class="title">Currency Converter</h1>
      <p class="sub">Convert PKR to major currencies and back &mdash; useful for remittances, travel budgeting, and overseas Pakistanis.</p>
    </header>
  </div>
</div>

<div class="wrap">

  <div class="calc-card">
    <div class="calc-inner">

      <div class="convert-row">
        <div class="convert-field">
          <label class="field-label" for="cvAmount">Amount</label>
          <div class="amount-row">
            <input id="cvAmount" class="cv-input" type="text" inputmode="numeric" value="1000">
          </div>
        </div>
        <div class="convert-field" style="flex:0 0 110px;">
          <label class="field-label" for="cvFrom">From</label>
          <select id="cvFrom" class="cv-select"></select>
        </div>
        <button class="swap-btn" id="cvSwap" type="button" title="Swap currencies">&#8646;</button>
        <div class="convert-field" style="flex:0 0 110px;">
          <label class="field-label" for="cvTo">To</label>
          <select id="cvTo" class="cv-select"></select>
        </div>
      </div>

      <div class="results" id="resultsBox">
        <p class="cv-status">Loading current rates&hellip;</p>
      </div>

    </div>
  </div>

  <section class="prose">
    <h2 class="section-title">About These Rates</h2>
    <p style="font-size:14.5px; color:var(--ink-soft);">Rates are sourced live from <strong>Frankfurter</strong>, an open-source API using European Central Bank reference rates, updated once per business day. These are official reference rates, not real-time interbank or open-market rates &mdash; the actual rate your bank or an exchange company in Pakistan quotes you (especially for USD, which trades on both interbank and open markets in Pakistan) may differ. Use this for budgeting and estimates, not for pricing an actual transaction.</p>
  </section>

  <section id="faq">
    <h2 class="section-title">Frequently Asked Questions</h2>

    <details open>
      <summary>Why Is the Rate Here Different From My Bank's Rate?</summary>
      <p>This tool shows the ECB daily reference rate, which is a standardized benchmark. Banks and exchange companies in Pakistan add their own margin and may use open-market rates that move throughout the day, so their quoted rate will almost always differ slightly &mdash; sometimes significantly for cash transactions.</p>
    </details>

    <details>
      <summary>How Often Do These Rates Update?</summary>
      <p>Once per business day, around the European market close. They don't update on weekends or European holidays, so the rate you see on a Sunday reflects Friday's close.</p>
    </details>

    <details>
      <summary>Is This Good for Sending Remittances?</summary>
      <p>Use it as a rough budgeting reference only. For an actual remittance, compare the specific rate your remittance service or bank offers at the time of transfer &mdash; that's what determines what actually lands in Pakistan.</p>
    </details>
  </section>

</div>

<?php
$footerVariant = 'simple';
$footerText    = "Exchange rate data via Frankfurter (ECB reference rates). This is an independent tool, not affiliated with any bank or exchange company, and rates shown may differ from actual transaction rates.";
$backHref      = '/';
$backLabel     = 'Back to Hisabkaro Home';
$pageScript    = 'currency-converter.js';
require __DIR__ . '/includes/footer.php';
