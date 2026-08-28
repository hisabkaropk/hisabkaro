<?php
$pageTitle       = 'Take-Home Salary Calculator Pakistan 2026-27 | FBR Tax Slabs';
$pageDescription = 'Calculate your exact take-home salary in Pakistan for tax year 2026-27 using the official FBR income tax slabs. Free, instant, no sign-up.';
$canonicalPath   = '/';
$og = [
    'type'        => 'website',
    'title'       => $pageTitle,
    'description' => $pageDescription,
    'path'        => '/',
    'image'       => '/og-image.png',
];
$twitter = [
    'title'       => 'Take-Home Salary Calculator Pakistan 2026-27',
    'description' => 'Instant FBR salary tax calculator for Pakistan, FY 2026-27 slabs.',
    'image'       => '/og-image.png',
];
$jsonLd = [
<<<'JSON'
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Pakistan Salary Tax Calculator FY 2026-27",
  "applicationCategory": "FinanceApplication",
  "operatingSystem": "Any",
  "url": "https://hisabkaro.pk/",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "PKR" },
  "description": "Free calculator for take-home salary in Pakistan using official FBR income tax slabs for tax year 2026-27."
}
JSON,
<<<'JSON'
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Is the 9% surcharge really gone?",
      "acceptedAnswer": { "@type": "Answer", "text": "Yes, for salaried individuals only, starting Tax Year 2027 (July 2026-June 2027). It previously applied to annual income above Rs. 10 million. Non-salaried filers still face it." }
    },
    {
      "@type": "Question",
      "name": "What does the withholding tax calculator cover?",
      "acceptedAnswer": { "@type": "Answer", "text": "Bank Profit / Profit on Debt (Section 151) and Dividends (Section 150), which have clean well-documented filer and non-filer rates. Services, contracts, property, and vehicle WHT use value-based brackets and are not yet covered." }
    },
    {
      "@type": "Question",
      "name": "What's the difference between a filer and non-filer?",
      "acceptedAnswer": { "@type": "Answer", "text": "Filers are on FBR's Active Taxpayer List. Non-filers face higher withholding tax rates on things like property transactions, vehicle purchases, and banking transactions, not on salary tax itself, which is the same slab table either way." }
    },
    {
      "@type": "Question",
      "name": "Do IT exporters and freelancers use these slabs?",
      "acceptedAnswer": { "@type": "Answer", "text": "No. Freelancers and business owners are taxed under a separate, steeper schedule. IT and IT-enabled exporters registered with PSEB typically pay 0.25% on foreign-currency export receipts instead." }
    },
    {
      "@type": "Question",
      "name": "Does this include EOBI or provident fund deductions?",
      "acceptedAnswer": { "@type": "Answer", "text": "Both can be added as optional fields. EOBI's employee share is fixed at Rs. 407 per month for FY 2026-27, calculated on the federal minimum wage rather than actual salary. Provident Fund is a voluntary, employer-specific percentage." }
    },
    {
      "@type": "Question",
      "name": "How often do these slabs change?",
      "acceptedAnswer": { "@type": "Answer", "text": "Typically once a year, announced in the federal budget each June and effective from July 1." }
    },
    {
      "@type": "Question",
      "name": "Do I still need to file a tax return if my employer deducts tax?",
      "acceptedAnswer": { "@type": "Answer", "text": "Generally yes. Salaried individuals with taxable income are still required to file an annual return even if tax was already withheld by an employer. The standard deadline is 30 September following the end of the tax year." }
    },
    {
      "@type": "Question",
      "name": "Is my bonus taxed the same as my regular salary?",
      "acceptedAnswer": { "@type": "Answer", "text": "Yes. Bonuses and most allowances form part of taxable salary income for the year received and are taxed at the same progressive slab rates." }
    },
    {
      "@type": "Question",
      "name": "What happens if I miss the tax return filing deadline?",
      "acceptedAnswer": { "@type": "Answer", "text": "Late or non-filing can trigger a penalty and removal from the Active Taxpayer List, pushing you onto higher non-filer withholding rates until restored." }
    },
    {
      "@type": "Question",
      "name": "What's the difference between NTN and STRN?",
      "acceptedAnswer": { "@type": "Answer", "text": "NTN is for income tax and, for individuals, is simply your CNIC. STRN is a separate Sales Tax Registration Number required only for businesses registered for sales tax/GST." }
    },
    {
      "@type": "Question",
      "name": "Is provident fund money taxable?",
      "acceptedAnswer": { "@type": "Answer", "text": "It depends on classification. Recognized provident funds are generally tax-exempt up to legal limits, while unrecognized funds are treated differently." }
    }
  ]
}
JSON,
];
$pageStyles  = ['common.css', 'index.css'];
$navVariant  = 'home';
$currentPage = 'home';
require __DIR__ . '/includes/header.php';
?>

<div class="hero-band">
  <div class="wrap">
    <header class="top">
      <div class="eyebrow">Pakistan &middot; FBR Tax Year 2027</div>
      <h1 class="title">What's Your Real Take-Home Salary?</h1>
      <p class="sub">Enter your gross monthly salary. This applies the official FY 2026-27 FBR slabs for salaried individuals &mdash; the same ones effective from July 1, 2026.</p>
    </header>
  </div>
</div>

<div class="wrap">

  <div class="calc-tabs" id="calculator">
    <button class="calc-tab active" type="button" data-panel="salary" onclick="switchCalc('salary')">Salary Tax</button>
    <button class="calc-tab" type="button" data-panel="wht" onclick="switchCalc('wht')">Withholding Tax</button>
    <button class="calc-tab" type="button" data-panel="filer" onclick="switchCalc('filer')">Filer vs Non-Filer</button>
  </div>

  <div class="payslip">

    <div class="payslip-inner panel" id="panel-salary" style="display:block;">
      <div class="payslip-head">
        <h2>Salary Slip Estimate</h2>
        <span class="fy-tag">FY 2026-2027</span>
      </div>

      <label class="field-label" for="gross">Gross monthly salary</label>
      <div class="amount-row">
        <span class="rs">Rs.</span>
        <input id="gross" type="text" inputmode="numeric" value="150,000">
      </div>

      <div class="toggle-row">
        <label class="toggle"><input type="checkbox" id="filer" checked> Active tax filer</label>
      </div>

      <details class="deductions-toggle">
        <summary>Add deductions (Provident Fund, EOBI, Zakat)</summary>
        <div class="deductions-grid">
          <div class="ded-field">
            <label class="field-label" for="pfPercent">Provident Fund &mdash; % of gross</label>
            <input id="pfPercent" type="number" min="0" max="100" step="0.1" value="0" class="ded-input">
          </div>
          <div class="ded-field">
            <label class="toggle" style="margin-bottom:8px;"><input type="checkbox" id="eobiCheck"> EOBI employee share (Rs. 407 fixed)</label>
          </div>
          <div class="ded-field">
            <label class="field-label" for="zakatPercent">Zakat provision &mdash; % of gross (optional)</label>
            <input id="zakatPercent" type="number" min="0" max="100" step="0.1" value="0" class="ded-input">
          </div>
        </div>
      </details>

      <div class="ledger" id="ledger"></div>

      <div class="net-row">
        <span class="label">Take-home pay</span>
        <div class="net-wrap">
          <span class="val" id="netpay">Rs. 0</span>
          <div class="stamp" id="stamp">NET<br>PAY</div>
        </div>
      </div>

      <p class="note">Estimate only. Income tax is calculated on gross salary per FBR's slab table. Provident Fund, EOBI, and zakat are optional fields you can add above &mdash; EOBI uses the fixed FY 2026-27 federal minimum wage base, not your actual salary.</p>

      <div class="share-row">
        <span class="label-txt">Share this:</span>
        <a class="share-btn whatsapp" target="_blank" rel="noopener" href="https://wa.me/?text=Check%20your%20real%20take-home%20salary%20for%202026-27%3A%20https%3A%2F%2FYOURDOMAIN.pk"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91C21.96 6.45 17.5 2 12.04 2zm0 18.13h-.01c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.19 8.19 0 0 1-1.26-4.37c0-4.54 3.7-8.24 8.26-8.24 2.2 0 4.27.86 5.83 2.42a8.19 8.19 0 0 1 2.41 5.83c0 4.55-3.7 8.24-8.24 8.24zm4.52-6.17c-.25-.12-1.47-.72-1.7-.81-.23-.08-.39-.12-.56.13-.17.25-.64.81-.78.97-.14.17-.29.19-.54.06-.25-.12-1.04-.38-1.99-1.22-.74-.65-1.23-1.46-1.38-1.71-.14-.25-.02-.38.11-.5.11-.11.25-.29.37-.43.12-.15.16-.25.25-.42.08-.17.04-.31-.02-.44-.06-.12-.56-1.35-.77-1.85-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.89 2.42 1.02 2.58.12.17 1.75 2.67 4.24 3.75.59.26 1.06.41 1.42.52.6.19 1.14.16 1.57.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.14-1.18-.06-.1-.23-.16-.48-.28z"/></svg>WhatsApp</a>
        <a class="share-btn twitter" target="_blank" rel="noopener" href="https://twitter.com/intent/tweet?text=Check%20your%20real%20take-home%20salary%20for%202026-27&url=https%3A%2F%2FYOURDOMAIN.pk"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M22.46 6c-.77.35-1.6.58-2.46.69.89-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.32 4.5 17.26 4 16.08 4c-2.26 0-4.09 1.83-4.09 4.09 0 .32.04.63.11.93-3.4-.17-6.42-1.8-8.44-4.29-.35.6-.55 1.3-.55 2.05 0 1.42.72 2.68 1.82 3.41-.67-.02-1.3-.2-1.85-.51v.05c0 1.98 1.41 3.64 3.28 4.01-.34.1-.7.14-1.07.14-.26 0-.51-.03-.76-.07.52 1.62 2.02 2.81 3.8 2.84-1.4 1.09-3.15 1.74-5.06 1.74-.33 0-.65-.02-.97-.06C4.34 19.32 6.44 20 8.7 20c8.02 0 12.42-6.65 12.42-12.42 0-.19 0-.38-.01-.56.85-.62 1.59-1.38 2.17-2.26z"/></svg>Twitter</a>
        <a class="share-btn copy" href="#" onclick="navigator.clipboard.writeText(window.location.href); this.textContent='Link copied'; return false;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="11" height="11" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>Copy link</a>
      </div>
    </div>

    <div class="payslip-inner panel" id="panel-wht" style="display:none;">
      <div class="payslip-head">
        <h2>Withholding Tax Estimate</h2>
        <span class="fy-tag">FY 2026-2027</span>
      </div>

      <label class="field-label" for="whtType">Type of income</label>
      <select id="whtType" class="wht-select">
        <option value="bank_profit">Bank Profit / Profit on Debt (Sec. 151)</option>
        <option value="div_listed">Dividend &mdash; Listed (PSX) Company (Sec. 150)</option>
        <option value="div_unlisted">Dividend &mdash; Unlisted / Private Company (Sec. 150)</option>
        <option value="div_equity_fund">Dividend &mdash; Equity Mutual Fund (Sec. 150)</option>
      </select>

      <label class="field-label" for="whtAmount" style="margin-top:18px;">Gross amount received</label>
      <div class="amount-row">
        <span class="rs">Rs.</span>
        <input id="whtAmount" type="text" inputmode="numeric" value="100,000">
      </div>

      <div class="toggle-row">
        <label class="toggle"><input type="checkbox" id="whtFiler" checked> Active tax filer</label>
      </div>

      <div class="ledger" id="whtLedger"></div>

      <div class="net-row">
        <span class="label">Net amount receivable</span>
        <div class="net-wrap">
          <span class="val" id="whtNet">Rs. 0</span>
        </div>
      </div>

      <p class="note" id="whtNote"></p>
    </div>

    <div class="payslip-inner panel" id="panel-filer" style="display:none;">
      <div class="payslip-head">
        <h2>Filer vs Non-Filer Comparison</h2>
        <span class="fy-tag">FY 2026-2027</span>
      </div>

      <label class="field-label" for="cmpType">Type of income</label>
      <select id="cmpType" class="wht-select">
        <option value="bank_profit">Bank Profit / Profit on Debt (Sec. 151)</option>
        <option value="div_listed">Dividend &mdash; Listed (PSX) Company (Sec. 150)</option>
        <option value="div_unlisted">Dividend &mdash; Unlisted / Private Company (Sec. 150)</option>
        <option value="div_equity_fund">Dividend &mdash; Equity Mutual Fund (Sec. 150)</option>
      </select>

      <label class="field-label" for="cmpAmount" style="margin-top:18px;">Gross amount</label>
      <div class="amount-row">
        <span class="rs">Rs.</span>
        <input id="cmpAmount" type="text" inputmode="numeric" value="100,000">
      </div>

      <div class="compare-grid" id="compareGrid"></div>

      <p class="note">This compares withholding tax rates only, for the categories covered by this calculator. Property, vehicle, and services WHT follow the same "filer pays about half" pattern but use value-based brackets not covered here &mdash; check the full FBR rate card for those.</p>
    </div>

  </div>

  <div class="trust-strip">
    <div class="trust-item"><span class="num">FY 2026-27</span><span class="lbl">Official FBR rates</span></div>
    <div class="trust-item"><span class="num">Free</span><span class="lbl">No sign-up required</span></div>
    <div class="trust-item"><span class="num">Live</span><span class="lbl">Calculates as you type</span></div>
    <div class="trust-item"><span class="num">Yearly</span><span class="lbl">Updated each budget</span></div>
  </div>

  <section id="updates">
    <h2 class="section-title">Latest Updates</h2>
    <p class="section-sub">Filtered from FBR's official press releases &mdash; filing, budget, and ATL news only, not customs seizure reports.</p>
    <div id="updatesList" class="updates-list">
      <p class="updates-loading">Loading latest updates&hellip;</p>
    </div>
  </section>

  <section id="slabs">
    <h2 class="section-title">FY 2026-27 Income Tax Slabs</h2>
    <p class="section-sub">For salaried individuals, effective July 1, 2026. The 9% surcharge on high earners has been abolished for this tax year.</p>
    <table class="slabs">
      <thead>
        <tr><th>Annual taxable income</th><th>Tax rate</th></tr>
      </thead>
      <tbody>
        <tr><td>Up to Rs. 600,000</td><td class="rate"><div class="rate-cell"><div class="rate-bar-track"><div class="rate-bar-fill" style="width:0%"></div></div>0%</div></td></tr>
        <tr><td>Rs. 600,000 - 1,200,000</td><td class="rate"><div class="rate-cell"><div class="rate-bar-track"><div class="rate-bar-fill" style="width:3%"></div></div>1%</div></td></tr>
        <tr><td>Rs. 1,200,000 - 2,200,000</td><td class="rate"><div class="rate-cell"><div class="rate-bar-track"><div class="rate-bar-fill" style="width:31%"></div></div>Rs. 6,000 + 11%</div></td></tr>
        <tr><td>Rs. 2,200,000 - 3,200,000</td><td class="rate"><div class="rate-cell"><div class="rate-bar-track"><div class="rate-bar-fill" style="width:57%"></div></div>Rs. 116,000 + 20%</div></td></tr>
        <tr><td>Rs. 3,200,000 - 4,100,000</td><td class="rate"><div class="rate-cell"><div class="rate-bar-track"><div class="rate-bar-fill" style="width:71%"></div></div>Rs. 316,000 + 25%</div></td></tr>
        <tr><td>Rs. 4,100,000 - 5,600,000</td><td class="rate"><div class="rate-cell"><div class="rate-bar-track"><div class="rate-bar-fill" style="width:83%"></div></div>Rs. 541,000 + 29%</div></td></tr>
        <tr><td>Rs. 5,600,000 - 7,000,000</td><td class="rate"><div class="rate-cell"><div class="rate-bar-track"><div class="rate-bar-fill" style="width:91%"></div></div>Rs. 976,000 + 32%</div></td></tr>
        <tr><td>Above Rs. 7,000,000</td><td class="rate"><div class="rate-cell"><div class="rate-bar-track"><div class="rate-bar-fill" style="width:100%"></div></div>Rs. 1,424,000 + 35%</div></td></tr>
      </tbody>
    </table>
  </section>

  <section>
    <h2 class="section-title">How This Is Calculated</h2>
    <p class="section-sub">The short version, in three parts.</p>
    <div class="insight-grid">
      <div class="insight-card">
        <div class="insight-icon">%</div>
        <h3>Progressive, Not Flat</h3>
        <p>Each slab rate only taxes the portion of income inside that band. FBR annualises your salary, applies the table above, then withholds roughly one-twelfth monthly.</p>
      </div>
      <div class="insight-card">
        <div class="insight-icon">&uarr;</div>
        <h3>What Changed This Year</h3>
        <p>The tax-free threshold stays at Rs. 600,000/year. The top 35% rate now starts at Rs. 7 million, up from Rs. 4.1 million &mdash; three new bands soften the jump.</p>
      </div>
      <div class="insight-card">
        <div class="insight-icon">i</div>
        <h3>Who This Applies To</h3>
        <p>Salaried individuals &mdash; more than 75% of taxable income from an employer. Freelancers and business owners outside that threshold use a separate, higher schedule.</p>
      </div>
    </div>
  </section>

  <!-- <div class="ad-slot">Ad slot &mdash; in-content rectangle (300&times;250)</div> -->

  <section id="ntn">
    <h2 class="section-title">Check Your NTN / STRN Status</h2>
    <p class="section-sub">For individuals, your NTN is simply your CNIC &mdash; you don't need to register separately unless you're unregistered.</p>
    <div class="ntn-guide">
      <ol class="ntn-steps">
        <li>Go to FBR's official IRIS portal &mdash; always check the URL is exactly <strong>iris.fbr.gov.pk</strong> before entering any details.</li>
        <li>On the homepage, choose "Registration for Unregistered Person" if you don't have an NTN yet, or "Taxpayer Login" if you're checking existing status.</li>
        <li>Enter your 13-digit CNIC (without dashes) and the captcha shown.</li>
        <li>To check Active Taxpayer List (ATL) status specifically, use the ATL search option inside IRIS &mdash; this affects the withholding tax rate you pay on many transactions.</li>
      </ol>
      <a class="ntn-cta" href="https://iris.fbr.gov.pk" target="_blank" rel="noopener">Open FBR IRIS Portal &rarr;</a>
      <p style="font-size:12px; color:var(--ink-soft); margin:14px 0 0;">This links to FBR's real portal &mdash; we don't process registrations ourselves.</p>
    </div>
  </section>

  <section id="tools">
    <h2 class="section-title">More Free Tools</h2>
    <p class="section-sub">Everything below is live &mdash; click a card to jump straight to it.</p>
    <div class="tools-grid">
      <div class="tool-card" style="cursor:pointer;" onclick="document.getElementById('calculator').scrollIntoView({behavior:'smooth'}); switchCalc('salary');">
        <span class="soon-tag live-tag">Live</span>
        <h3>Salary Tax Calculator</h3>
        <p>Monthly/annual take-home pay with FBR's latest slabs.</p>
      </div>
      <div class="tool-card">
        <span class="soon-tag live-tag">Live</span>
        <h3>NTN / STRN Check</h3>
        <p>Guide + direct link to FBR's official verification portal.</p>
      </div>
      <div class="tool-card" style="cursor:pointer;" onclick="document.getElementById('calculator').scrollIntoView({behavior:'smooth'}); switchCalc('wht');">
        <span class="soon-tag live-tag">Live</span>
        <h3>Withholding Tax (WHT)</h3>
        <p>Bank profit and dividend WHT, filer vs non-filer rates.</p>
      </div>
      <div class="tool-card" style="cursor:pointer;" onclick="document.getElementById('calculator').scrollIntoView({behavior:'smooth'}); switchCalc('filer');">
        <span class="soon-tag live-tag">Live</span>
        <h3>Filer vs Non-Filer</h3>
        <p>See the actual WHT difference on your specific transaction type.</p>
      </div>
      <a class="tool-card" href="emi-calculator" style="text-decoration:none; color:inherit; display:block;">
        <span class="soon-tag live-tag">Live</span>
        <h3>EMI Calculator</h3>
        <p>Monthly installment for car, home, or personal loans, with a year-by-year breakdown.</p>
      </a>
      <a class="tool-card" href="zakat-calculator" style="text-decoration:none; color:inherit; display:block;">
        <span class="soon-tag live-tag">Live</span>
        <h3>Zakat Calculator</h3>
        <p>Nisab-based zakat on cash, gold, silver, and business assets.</p>
      </a>
      <a class="tool-card" href="currency-converter" style="text-decoration:none; color:inherit; display:block;">
        <span class="soon-tag live-tag">Live</span>
        <h3>Currency Converter</h3>
        <p>PKR to USD, SAR, AED, GBP and more, with daily reference rates.</p>
      </a>
      <a class="tool-card" href="sip-cagr-calculator" style="text-decoration:none; color:inherit; display:block;">
        <span class="soon-tag live-tag">Live</span>
        <h3>SIP &amp; CAGR Calculator</h3>
        <p>Mutual fund investment returns and compound growth rate.</p>
      </a>
      <a class="tool-card" href="provident-fund-pension-calculator" style="text-decoration:none; color:inherit; display:block;">
        <span class="soon-tag live-tag">Live</span>
        <h3>Provident Fund &amp; EOBI Pension</h3>
        <p>PF growth projection and EOBI pension estimate at retirement.</p>
      </a>
    </div>
  </section>

  <section id="faq">
    <h2 class="section-title">Frequently Asked Questions</h2>

    <details open>
      <summary>Is the 9% Surcharge Really Gone?</summary>
      <p>Yes &mdash; for salaried individuals only, starting Tax Year 2027 (July 2026&ndash;June 2027). It previously applied to annual income above Rs. 10 million. Non-salaried filers still face it.</p>
    </details>

    <details>
      <summary>What Does the Withholding Tax Calculator Cover?</summary>
      <p>Right now, just Bank Profit / Profit on Debt (Section 151) and Dividends (Section 150) &mdash; the two categories with clean, well-documented filer/non-filer rates. Services, contracts, property, and vehicle WHT involve value-based brackets and exceptions we'd rather research properly than guess at, so they're not included yet.</p>
    </details>

    <details>
      <summary>What's the Difference Between a Filer and Non-Filer?</summary>
      <p>Filers are on FBR's Active Taxpayers List. Non-filers face higher withholding tax rates on things like property transactions, vehicle purchases, and banking transactions &mdash; not on salary tax itself, which is the same slab table either way.</p>
    </details>

    <details>
      <summary>Do IT Exporters and Freelancers Use These Slabs?</summary>
      <p>No. Freelancers and business owners are taxed under a separate, steeper schedule. IT and IT-enabled exporters registered with PSEB typically pay 0.25% on foreign-currency export receipts instead &mdash; a completely different regime from salaried tax.</p>
    </details>

    <details>
      <summary>Does This Include EOBI or Provident Fund Deductions?</summary>
      <p>You can add both as optional fields above the results. EOBI's employee share is fixed at Rs. 407/month for FY 2026-27 &mdash; it's calculated on the federal minimum wage (Rs. 40,700), not your actual salary. Provident Fund is a voluntary, employer-specific percentage you can enter yourself.</p>
    </details>

    <details>
      <summary>How Often Do These Slabs Change?</summary>
      <p>Typically once a year, announced in the federal budget each June and effective from July 1. Bookmark this page &mdash; it's updated each time a new Finance Act passes.</p>
    </details>

    <details>
      <summary>Do I Still Need to File a Tax Return if My Employer Deducts Tax?</summary>
      <p>Generally yes. Salaried individuals with taxable income are still required to file an annual return even if tax was already withheld by an employer &mdash; the return reconciles what was withheld and keeps you on FBR's Active Taxpayer List. The standard deadline is 30 September following the end of the tax year.</p>
    </details>

    <details>
      <summary>Is My Bonus Taxed the Same as My Regular Salary?</summary>
      <p>Yes. Bonuses and most allowances form part of your taxable salary income for the year they're received, and are taxed at the same progressive slab rates &mdash; there isn't a separate "bonus tax" bracket in Pakistan's system.</p>
    </details>

    <details>
      <summary>What Happens if I Miss the Tax Return Filing Deadline?</summary>
      <p>Late or non-filing can trigger a penalty and removal from the Active Taxpayer List, which pushes you onto the higher non-filer withholding rates on banking, property, and vehicle transactions until you're restored. FBR occasionally extends the deadline, but it's safest to file on time rather than wait for one.</p>
    </details>

    <details>
      <summary>What's the Difference Between NTN and STRN?</summary>
      <p>NTN (National Tax Number) is for income tax and identifies you or your business as a taxpayer &mdash; for individuals, it's simply your CNIC. STRN (Sales Tax Registration Number) is separate, required only if you're registered for sales tax/GST as a business. Most salaried individuals only need an NTN.</p>
    </details>

    <details>
      <summary>Is Provident Fund Money Taxable?</summary>
      <p>It depends on how the fund is classified. Contributions and interest in a recognized provident fund are generally tax-exempt up to limits set by law, while unrecognized funds are treated differently. Since the specifics depend on your employer's fund structure, check with your HR or payroll team on how yours is classified.</p>
    </details>
  </section>

  <!-- <div class="ad-slot">Ad slot &mdash; leaderboard (728&times;90 / responsive)</div> -->

</div>

<?php
$footerVariant = 'full';
$pageScript    = 'index.js';
require __DIR__ . '/includes/footer.php';
