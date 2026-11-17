<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EMI Calculator Pakistan | Loan Installment Calculator (PKR)</title>
<meta name="description" content="Calculate your monthly loan installment (EMI) for car, home, or personal loans in Pakistan. Free, instant, with a full year-by-year amortization breakdown.">
<link rel="canonical" href="https://YOURDOMAIN.pk/emi-calculator.html">

<meta property="og:type" content="website">
<meta property="og:title" content="EMI Calculator Pakistan | Loan Installment Calculator">
<meta property="og:description" content="Calculate your monthly loan installment (EMI) for car, home, or personal loans in Pakistan. Free, instant, no sign-up.">
<meta property="og:url" content="https://YOURDOMAIN.pk/emi-calculator.html">
<meta property="og:locale" content="en_PK">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "EMI / Loan Installment Calculator Pakistan",
  "applicationCategory": "FinanceApplication",
  "operatingSystem": "Any",
  "url": "https://YOURDOMAIN.pk/emi-calculator.html",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "PKR" },
  "description": "Free EMI calculator for car, home, and personal loans in Pakistan with full amortization breakdown."
}
</script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --navy:#0A1F44; --blue:#1259C3; --blue-light:#3D7DFF;
    --yellow:#FFC72C; --yellow-deep:#E6A800; --black:#0D0F14;
    --ink:#14161C; --ink-soft:#5A6072;
    --line:#D7E1F2; --paper:#F2F7FE; --bg:#DCE6F7; --tint:#E7EFFB;
    --radius:8px;
  }
  *{box-sizing:border-box;}
  html{scroll-behavior:smooth;}
  body{margin:0; background:var(--bg); color:var(--ink); font-family:'Poppins', sans-serif; line-height:1.6;}
  h1,h2,h3{font-family:'Poppins', sans-serif; font-weight:700; margin:0;}
  .mono{font-family:'IBM Plex Mono', monospace; font-variant-numeric: tabular-nums;}
  .wrap{max-width:780px; margin:0 auto; padding:0 20px;}

  nav.site-nav{position:sticky; top:0; z-index:20; background:var(--black); border-bottom:3px solid var(--yellow);}
  nav.site-nav .wrap{display:flex; align-items:center; justify-content:space-between; padding:14px 20px;}
  .site-logo{font-family:'Poppins', sans-serif; font-weight:800; font-size:19px; color:#FFFFFF; text-decoration:none; display:flex; align-items:center; gap:9px;}
  .site-logo .dot{width:9px; height:9px; border-radius:50%; background:var(--yellow); display:inline-block;}
  .nav-links{display:flex; gap:24px; list-style:none; margin:0; padding:0;}
  .nav-links a{font-size:13.5px; color:#C9CFDD; text-decoration:none; font-weight:500;}
  .nav-links a:hover{color:var(--yellow);}
  @media (max-width:600px){.nav-links{display:none;}}

  .hero-band{
    background:linear-gradient(120deg, var(--navy) 0%, var(--blue) 65%, var(--blue-light) 100%);
    padding:46px 0 60px; position:relative;
  }
  .hero-band .wrap{position:relative; z-index:1;}
  .hero-band::after{
    content:""; position:absolute; left:0; right:0; bottom:-1px; height:24px;
    background-image: radial-gradient(circle at 12px 0, transparent 12px, var(--bg) 12.5px);
    background-size:24px 24px; background-repeat:repeat-x;
  }
  .eyebrow{
    font-family:'IBM Plex Mono', monospace; font-size:12px; letter-spacing:0.14em;
    text-transform:uppercase; color:var(--yellow); display:flex; align-items:center; gap:10px;
    margin-bottom:14px; font-weight:600;
  }
  .eyebrow::before{content:""; width:18px; height:2px; background:var(--yellow); display:inline-block;}
  h1.title{font-size:clamp(26px,5vw,36px); max-width:16ch; color:#FFFFFF; font-weight:800; line-height:1.15;}
  .sub{color:rgba(255,255,255,0.88); font-size:15.5px; max-width:52ch; margin-top:12px;}

  .calc-card{
    background:var(--paper); border:1px solid var(--line); border-radius:14px;
    margin:0 0 32px; overflow:hidden;
    box-shadow:0 24px 48px -22px rgba(10,31,68,0.35), 0 4px 14px rgba(10,31,68,0.08);
  }
  .calc-card::before{content:""; display:block; height:6px; background:linear-gradient(90deg, var(--navy) 0%, var(--blue) 45%, var(--yellow) 100%);}
  .calc-inner{padding:28px 26px;}

  .field{margin-bottom:22px;}
  label.field-label{
    display:block; font-size:12.5px; color:var(--ink-soft); margin-bottom:8px;
    font-family:'IBM Plex Mono', monospace; text-transform:uppercase; letter-spacing:0.06em;
  }
  .amount-row{display:flex; align-items:center; gap:10px; border-bottom:2px solid var(--black); padding-bottom:8px;}
  .amount-row span.rs{font-family:'IBM Plex Mono', monospace; font-size:19px; color:var(--ink-soft);}
  input.emi-input{
    flex:1; border:none; background:transparent; font-family:'IBM Plex Mono', monospace;
    font-size:22px; font-weight:600; color:var(--ink); outline:none; min-width:0;
  }
  .slider-row{display:flex; align-items:center; gap:14px;}
  input[type="range"]{flex:1; accent-color:var(--blue);}
  .slider-val{font-family:'IBM Plex Mono', monospace; font-size:15px; font-weight:600; min-width:64px; text-align:right;}

  .results{
    background:var(--tint); border-radius:10px; padding:22px; margin-top:6px;
  }
  .emi-headline{text-align:center; padding-bottom:16px; border-bottom:1px dashed var(--line); margin-bottom:16px;}
  .emi-headline .lbl{font-size:12.5px; color:var(--ink-soft); font-family:'IBM Plex Mono', monospace; text-transform:uppercase; letter-spacing:0.06em;}
  .emi-headline .amt{font-family:'IBM Plex Mono', monospace; font-size:32px; font-weight:700; color:var(--navy); margin-top:4px;}
  .stat-row{display:flex; justify-content:space-between; font-size:14px; padding:7px 0; color:var(--ink-soft);}
  .stat-row .val{font-family:'IBM Plex Mono', monospace; color:var(--ink); font-weight:600;}

  table.amort{width:100%; border-collapse:collapse; font-size:13.5px; margin-top:18px; background:var(--paper); border-radius:8px; overflow:hidden;}
  table.amort th, table.amort td{text-align:right; padding:9px 10px; border-bottom:1px solid var(--line);}
  table.amort th:first-child, table.amort td:first-child{text-align:left;}
  table.amort th{font-family:'IBM Plex Mono', monospace; font-size:10.5px; text-transform:uppercase; letter-spacing:0.05em; color:#fff; background:var(--navy); font-weight:600;}
  table.amort td{font-family:'IBM Plex Mono', monospace; color:var(--ink);}
  table.amort tr:last-child td{border-bottom:none;}
  .amort-wrap{overflow-x:auto; -webkit-overflow-scrolling:touch;}

  section{margin:40px 0;}
  h2.section-title{font-size:20px; margin-bottom:8px; font-weight:800;}
  .section-sub{color:var(--ink-soft); font-size:14px; margin-bottom:16px;}
  .prose p{margin:0 0 14px; font-size:15px; color:var(--ink);}
  .prose strong{color:var(--navy);}

  details{
    border:1px solid var(--line); border-left:4px solid var(--blue); padding:14px 16px;
    margin-bottom:10px; background:var(--tint); border-radius:0 8px 8px 0;
  }
  details:nth-child(3n+2){border-left-color:var(--yellow);}
  details:nth-child(3n+3){border-left-color:var(--black);}
  details summary{cursor:pointer; font-weight:700; font-size:14.5px; list-style:none; display:flex; justify-content:space-between; align-items:center;}
  details summary::-webkit-details-marker{display:none;}
  details summary::after{content:"+"; color:var(--blue); font-size:18px;}
  details[open] summary::after{content:"\2013";}
  details p{margin:10px 0 0; color:var(--ink-soft); font-size:14px;}

  footer{border-top:4px solid var(--yellow); background:var(--black); color:#C9CFDD; padding:34px 0 26px;}
  footer p{font-size:12.5px; color:#9AA1B4; max-width:70ch; margin:0 0 16px;}
  footer a{color:var(--yellow); text-decoration:none; font-size:13px;}
  .back-link{display:inline-block; margin-top:6px;}
</style>
</head>
<body>

<nav class="site-nav">
  <div class="wrap">
    <a href="/" class="site-logo"><span class="dot"></span>Kiabacha</a>
    <ul class="nav-links">
      <li><a href="/">Home</a></li>
      <li><a href="/blog.html">Blog</a></li>
      <li><a href="/#tools">More Tools</a></li>
      <li><a href="#faq">FAQ</a></li>
    </ul>
  </div>
</nav>

<div class="hero-band">
  <div class="wrap">
    <header class="top">
      <div class="eyebrow">Loans &middot; Pakistan</div>
      <h1 class="title">EMI Calculator</h1>
      <p class="sub">Work out your monthly installment for a car, home, or personal loan &mdash; with a full year-by-year breakdown of principal vs. interest.</p>
    </header>
  </div>
</div>

<div class="wrap">

  <div class="calc-card">
    <div class="calc-inner">

      <div class="field">
        <label class="field-label" for="loanAmount">Loan amount</label>
        <div class="amount-row">
          <span class="rs">Rs.</span>
          <input id="loanAmount" class="emi-input" type="text" inputmode="numeric" value="5,000,000">
        </div>
      </div>

      <div class="field">
        <label class="field-label" for="interestRate">Annual interest rate</label>
        <div class="slider-row">
          <input id="interestRate" type="range" min="1" max="30" step="0.1" value="18">
          <span class="slider-val" id="interestRateVal">18%</span>
        </div>
      </div>

      <div class="field">
        <label class="field-label" for="tenure">Loan tenure</label>
        <div class="slider-row">
          <input id="tenure" type="range" min="1" max="25" step="1" value="5">
          <span class="slider-val" id="tenureVal">5 yrs</span>
        </div>
      </div>

      <div class="results">
        <div class="emi-headline">
          <div class="lbl">Monthly Installment</div>
          <div class="amt" id="emiAmount">Rs. 0</div>
        </div>
        <div class="stat-row"><span>Principal amount</span><span class="val" id="principalVal">Rs. 0</span></div>
        <div class="stat-row"><span>Total interest payable</span><span class="val" id="totalInterestVal">Rs. 0</span></div>
        <div class="stat-row"><span>Total amount payable</span><span class="val" id="totalPayableVal">Rs. 0</span></div>
      </div>

      <p style="font-size:12px; color:var(--ink-soft); margin-top:14px;">Estimate based on a standard reducing-balance EMI formula. Your actual bank rate may include processing fees, insurance, or a variable-rate structure not reflected here &mdash; confirm the exact figure with your lender before signing.</p>
    </div>
  </div>

  <section id="amortization">
    <h2 class="section-title">Year-by-Year Breakdown</h2>
    <p class="section-sub">How much of your payment goes to principal vs. interest each year.</p>
    <div class="amort-wrap">
      <table class="amort" id="amortTable">
        <thead>
          <tr><th>Year</th><th>Principal Paid</th><th>Interest Paid</th><th>Remaining Balance</th></tr>
        </thead>
        <tbody id="amortBody"></tbody>
      </table>
    </div>
  </section>

  <section class="prose">
    <h2 class="section-title">How EMI Is Calculated</h2>
    <p>EMI (Equated Monthly Installment) is calculated using the reducing-balance method: <strong>EMI = P &times; r &times; (1+r)&#8319; / ((1+r)&#8319; &minus; 1)</strong>, where P is your loan amount, r is the monthly interest rate (annual rate &divide; 12 &divide; 100), and n is the total number of monthly installments.</p>
    <p>Each installment is the same amount every month, but the <strong>split between principal and interest changes over time</strong> &mdash; early payments are mostly interest, later payments are mostly principal. That's why the year-by-year table above shows more interest paid in Year 1 than in the final year, even though the monthly payment itself never changes.</p>
  </section>

  <section id="faq">
    <h2 class="section-title">Frequently Asked Questions</h2>

    <details open>
      <summary>Does This Include Bank Processing Fees?</summary>
      <p>No. This calculates the pure EMI based on principal, rate, and tenure. Pakistani banks typically charge a processing fee (often 1&ndash;2% of loan amount) and may require insurance, which aren't reflected in this number. Ask your bank for the full cost breakdown before signing.</p>
    </details>

    <details>
      <summary>Is This the Same for Islamic (Shariah-Compliant) Financing?</summary>
      <p>Not exactly. Islamic banks structure car/home financing differently (e.g., Diminishing Musharakah) rather than charging interest directly, though the monthly payment often works out similarly in practice. This calculator is best used as a rough comparison point, not an exact Islamic financing quote.</p>
    </details>

    <details>
      <summary>Why Does My Bank's EMI Differ Slightly From This?</summary>
      <p>Small differences usually come from day-count conventions, rounding methods, or an introductory/variable rate period that isn't flat across the full tenure. For an exact figure, always use your bank's official amortization schedule.</p>
    </details>

    <details>
      <summary>Should I Choose a Longer or Shorter Tenure?</summary>
      <p>A longer tenure lowers your monthly payment but increases total interest paid over the life of the loan &mdash; try both numbers in the slider above and compare the "Total interest payable" figure to see the real tradeoff for your situation.</p>
    </details>
  </section>

</div>

<footer>
  <div class="wrap">
    <p>This is an independent estimator, not financial advice and not affiliated with any bank. Confirm exact terms with your lender before signing any agreement.</p>
    <a class="back-link" href="/">&larr; Back to Kiabacha Home</a>
  </div>
</footer>

<script>
  const loanAmountInput = document.getElementById('loanAmount');
  const interestRateInput = document.getElementById('interestRate');
  const tenureInput = document.getElementById('tenure');
  const interestRateVal = document.getElementById('interestRateVal');
  const tenureVal = document.getElementById('tenureVal');
  const emiAmount = document.getElementById('emiAmount');
  const principalVal = document.getElementById('principalVal');
  const totalInterestVal = document.getElementById('totalInterestVal');
  const totalPayableVal = document.getElementById('totalPayableVal');
  const amortBody = document.getElementById('amortBody');

  function fmt(n){
    return 'Rs. ' + Math.round(n).toLocaleString('en-PK');
  }
  function parseAmount(str){
    const n = parseFloat(str.replace(/[^0-9.]/g,''));
    return isNaN(n) ? 0 : n;
  }

  function calc(){
    const P = parseAmount(loanAmountInput.value);
    const annualRate = parseFloat(interestRateInput.value);
    const years = parseInt(tenureInput.value, 10);
    const n = years * 12;
    const r = (annualRate / 12) / 100;

    interestRateVal.textContent = annualRate + '%';
    tenureVal.textContent = years + (years === 1 ? ' yr' : ' yrs');

    let emi = 0;
    if (r === 0){
      emi = P / n;
    } else {
      const factor = Math.pow(1 + r, n);
      emi = P * r * factor / (factor - 1);
    }

    const totalPayable = emi * n;
    const totalInterest = totalPayable - P;

    emiAmount.textContent = fmt(emi);
    principalVal.textContent = fmt(P);
    totalInterestVal.textContent = fmt(totalInterest);
    totalPayableVal.textContent = fmt(totalPayable);

    // Year-by-year amortization
    let balance = P;
    let rows = '';
    for (let y = 1; y <= years; y++){
      let yearPrincipal = 0;
      let yearInterest = 0;
      for (let m = 1; m <= 12; m++){
        if (balance <= 0) break;
        const interestPortion = balance * r;
        let principalPortion = emi - interestPortion;
        if (principalPortion > balance) principalPortion = balance;
        balance -= principalPortion;
        yearPrincipal += principalPortion;
        yearInterest += interestPortion;
      }
      rows += `<tr>
        <td>Year ${y}</td>
        <td>${fmt(yearPrincipal)}</td>
        <td>${fmt(yearInterest)}</td>
        <td>${fmt(Math.max(balance,0))}</td>
      </tr>`;
    }
    amortBody.innerHTML = rows;
  }

  loanAmountInput.addEventListener('input', calc);
  interestRateInput.addEventListener('input', calc);
  tenureInput.addEventListener('input', calc);
  calc();
</script>
</body>
</html>
