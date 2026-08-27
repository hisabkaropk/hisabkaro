<?php
$pageTitle       = 'Provident Fund & EOBI Pension Calculator Pakistan';
$pageDescription = 'Project your Provident Fund balance at retirement, or estimate your EOBI pension using the official formula. Free calculators for Pakistan.';
$canonicalPath   = '/provident-fund-pension-calculator.php';
$og = [
    'type'        => 'website',
    'title'       => 'Provident Fund & EOBI Pension Calculator Pakistan',
    'description' => 'Project your Provident Fund balance at retirement, or estimate your EOBI pension.',
    'path'        => $canonicalPath,
];
$jsonLd = [
<<<'JSON'
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Provident Fund and EOBI Pension Calculator Pakistan",
  "applicationCategory": "FinanceApplication",
  "operatingSystem": "Any",
  "url": "https://YOURDOMAIN.pk/provident-fund-pension-calculator.php",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "PKR" },
  "description": "Free Provident Fund growth projector and EOBI pension estimator for Pakistan."
}
JSON,
];
$pageStyles  = ['common.css', 'provident-fund-pension-calculator.css'];
$navVariant  = 'calc';
$currentPage = 'provident-fund-pension-calculator';
require __DIR__ . '/includes/header.php';
?>

<div class="hero-band">
  <div class="wrap">
    <header class="top">
      <div class="eyebrow">Retirement &middot; Pakistan</div>
      <h1 class="title">Provident Fund &amp; EOBI Pension</h1>
      <p class="sub">Project your Provident Fund growth, or estimate your EOBI pension using the official Ministry formula.</p>
    </header>
  </div>
</div>

<div class="wrap">

  <div class="calc-tabs">
    <button class="calc-tab active" type="button" data-panel="pf" onclick="switchTab('pf')">Provident Fund</button>
    <button class="calc-tab" type="button" data-panel="eobi" onclick="switchTab('eobi')">EOBI Pension</button>
  </div>

  <div class="calc-card">

    <div class="calc-inner panel active" id="panel-pf">
      <div class="field">
        <label class="field-label" for="pfBalance">Current Provident Fund balance</label>
        <div class="amount-row"><span class="rs">Rs.</span><input id="pfBalance" class="pf-input" type="text" inputmode="numeric" value="500,000"></div>
      </div>
      <div class="field">
        <label class="field-label" for="pfMonthly">Monthly contribution (yours + employer)</label>
        <div class="amount-row"><span class="rs">Rs.</span><input id="pfMonthly" class="pf-input" type="text" inputmode="numeric" value="15,000"></div>
      </div>
      <div class="field">
        <label class="field-label" for="pfRate">Expected annual profit rate</label>
        <div class="slider-row"><input id="pfRate" type="range" min="1" max="25" step="0.5" value="14"><span class="slider-val" id="pfRateVal">14%</span></div>
      </div>
      <div class="field">
        <label class="field-label" for="pfYears">Years until retirement</label>
        <div class="slider-row"><input id="pfYears" type="range" min="1" max="40" step="1" value="15"><span class="slider-val" id="pfYearsVal">15 yrs</span></div>
      </div>
      <div class="results">
        <div class="pf-headline">
          <div class="lbl">Projected Balance at Retirement</div>
          <div class="amt" id="pfFutureValue">Rs. 0</div>
        </div>
        <div class="stat-row"><span>Total contributed (from today)</span><span class="val" id="pfContributed">Rs. 0</span></div>
        <div class="stat-row"><span>Growth from profit/interest</span><span class="val" id="pfGrowth">Rs. 0</span></div>
      </div>
      <p style="font-size:12px; color:var(--ink-soft); margin-top:14px;">GPF profit rates for government employees are announced annually by the Finance Division and change year to year &mdash; enter your actual current rate, or your own fund's rate if it's a private-sector scheme. This calculator doesn't assume or fetch a specific rate for you.</p>
    </div>

    <div class="calc-inner panel" id="panel-eobi">
      <div class="field">
        <label class="field-label" for="eobiWage">Average monthly insured wage</label>
        <div class="amount-row"><span class="rs">Rs.</span><input id="eobiWage" class="pf-input" type="text" inputmode="numeric" value="40,700"></div>
      </div>
      <div class="field">
        <label class="field-label" for="eobiYears">Years of insurable service</label>
        <div class="slider-row"><input id="eobiYears" type="range" min="1" max="45" step="1" value="20"><span class="slider-val" id="eobiYearsVal">20 yrs</span></div>
      </div>
      <div class="results">
        <div class="pf-headline">
          <div class="lbl">Estimated Monthly Pension</div>
          <div class="amt" id="eobiPension">Rs. 0</div>
        </div>
        <div class="stat-row"><span>Formula result (before minimum floor)</span><span class="val" id="eobiFormulaResult">Rs. 0</span></div>
        <div class="stat-row"><span>Current minimum pension floor</span><span class="val">Rs. 11,500</span></div>
      </div>
      <div class="floor-note" id="eobiFloorNote" style="display:none;">Your formula result is below the minimum &mdash; you'd receive the Rs. 11,500 floor instead.</div>
      <p style="font-size:12px; color:var(--ink-soft); margin-top:14px;">Based on EOBI's published formula: (Average Monthly Insured Wage &times; Years of Service) &divide; 50, floored at the current minimum pension. "Insured wage" is the wage EOBI actually recorded contributions against, which may be lower than your real gross salary &mdash; check your EOBI contribution history for the exact figure. Minimum pension was last revised to Rs. 11,500/month in early 2026 and may change again.</p>
    </div>

  </div>

  <section class="prose">
    <h2 class="section-title">How These Are Calculated</h2>
    <p><strong>Provident Fund</strong> compounds your existing balance plus monthly contributions at your chosen annual profit rate, month by month, to project the balance at retirement.</p>
    <p><strong>EOBI Pension</strong> uses the Ministry of Overseas Pakistanis and Human Resource Development's published formula: your average monthly insured wage multiplied by years of insurable service, divided by 50. If that result comes out below the current minimum pension, EOBI pays the minimum instead.</p>
  </section>

  <section id="faq">
    <h2 class="section-title">Frequently Asked Questions</h2>

    <details open>
      <summary>What Profit Rate Should I Use for My Provident Fund?</summary>
      <p>For GPF (government employees), check the Finance Division's latest annual notification &mdash; it changes yearly. For a private-sector Provident Fund, ask your HR/payroll team for the fund's actual declared rate. Don't guess; a small difference in rate compounds into a large difference over 15-20 years.</p>
    </details>

    <details>
      <summary>Is My EOBI "Insured Wage" the Same as My Actual Salary?</summary>
      <p>Not necessarily. EOBI contributions and the resulting insured wage record can differ from your real gross salary, especially if your employer under-reported wages historically. Check your actual EOBI contribution history (via the EOBI portal or app) for the exact insured wage figure used in your pension calculation.</p>
    </details>

    <details>
      <summary>Can the Minimum Pension Change Again?</summary>
      <p>Yes &mdash; it's periodically revised by the federal government, most recently to Rs. 11,500/month in early 2026 (a 15% increase from Rs. 10,000). Treat this calculator's minimum as current as of publishing, not a permanent number.</p>
    </details>
  </section>

</div>

<?php
$footerVariant = 'simple';
$footerText    = "This is an independent estimator, not affiliated with EOBI or any government pension scheme. For your official pension record, check the EOBI portal (eobi.gov.pk) or your GPF/pension department directly.";
$backHref      = '/';
$backLabel     = 'Back to Hisabkaro Home';
$pageScript    = 'provident-fund-pension-calculator.js';
require __DIR__ . '/includes/footer.php';
