const SLABS = [
  {upTo: 600000,    rate: 0,    base: 0},
  {upTo: 1200000,   rate: 0.01, base: 0},
  {upTo: 2200000,   rate: 0.11, base: 6000},
  {upTo: 3200000,   rate: 0.20, base: 116000},
  {upTo: 4100000,   rate: 0.25, base: 316000},
  {upTo: 5600000,   rate: 0.29, base: 541000},
  {upTo: 7000000,   rate: 0.32, base: 976000},
  {upTo: Infinity,  rate: 0.35, base: 1424000}
];
const THRESHOLDS = [0,600000,1200000,2200000,3200000,4100000,5600000,7000000];

const grossInput = document.getElementById('gross');
const ledger = document.getElementById('ledger');
const netEl = document.getElementById('netpay');
const stampEl = document.getElementById('stamp');
const pfInput = document.getElementById('pfPercent');
const eobiInput = document.getElementById('eobiCheck');
const zakatInput = document.getElementById('zakatPercent');
const EOBI_EMPLOYEE_SHARE = 407; // 1% of federal minimum wage (Rs. 40,700), FY 2026-27

function fmt(n){
  return 'Rs. ' + Math.round(n).toLocaleString('en-PK');
}

function parseAmount(str){
  const n = parseFloat(str.replace(/[^0-9.]/g,''));
  return isNaN(n) ? 0 : n;
}

function calc(){
  const gross = parseAmount(grossInput.value);
  const annual = gross * 12;

  let bracketIndex = 0;
  for (let i = 0; i < THRESHOLDS.length; i++){
    if (annual > THRESHOLDS[i]) bracketIndex = i;
  }
  const slab = SLABS[bracketIndex];
  const over = Math.max(0, annual - THRESHOLDS[bracketIndex]);
  const annualTax = slab.base + over * slab.rate;
  const monthlyTax = annualTax / 12;
  const effRate = annual > 0 ? (annualTax / annual) * 100 : 0;

  const pfPercent = parseFloat(pfInput.value) || 0;
  const pfAmount = gross * (pfPercent / 100);
  const eobiAmount = eobiInput.checked ? EOBI_EMPLOYEE_SHARE : 0;
  const zakatPercent = parseFloat(zakatInput.value) || 0;
  const zakatAmount = gross * (zakatPercent / 100);

  const totalDeductions = monthlyTax + pfAmount + eobiAmount + zakatAmount;
  const net = gross - totalDeductions;

  let rows = `
    <div class="ledger-row"><span>Annual gross salary</span><span class="val">${fmt(annual)}</span></div>
    <div class="ledger-row"><span>Tax bracket</span><span class="val">${(slab.rate*100).toFixed(0)}% marginal</span></div>
    <div class="ledger-row active"><span>Estimated annual tax</span><span class="val">${fmt(annualTax)}</span></div>
    <div class="ledger-row active"><span>Monthly tax withheld</span><span class="val">${fmt(monthlyTax)}</span></div>
    <div class="ledger-row"><span>Effective tax rate</span><span class="val">${effRate.toFixed(2)}%</span></div>
  `;
  if (pfAmount > 0){
    rows += `<div class="ledger-row active"><span>Provident Fund (${pfPercent}%)</span><span class="val">${fmt(pfAmount)}</span></div>`;
  }
  if (eobiAmount > 0){
    rows += `<div class="ledger-row active"><span>EOBI employee share</span><span class="val">${fmt(eobiAmount)}</span></div>`;
  }
  if (zakatAmount > 0){
    rows += `<div class="ledger-row active"><span>Zakat provision (${zakatPercent}%)</span><span class="val">${fmt(zakatAmount)}</span></div>`;
  }

  ledger.innerHTML = rows;
  netEl.textContent = fmt(net);

  stampEl.classList.remove('show');
  void stampEl.offsetWidth;
  stampEl.classList.add('show');
}

grossInput.addEventListener('input', calc);
document.getElementById('filer').addEventListener('change', calc);
pfInput.addEventListener('input', calc);
eobiInput.addEventListener('change', calc);
zakatInput.addEventListener('input', calc);
calc();

function switchCalc(name){
  console.log('Switching to calc panel:', name);

  document.querySelectorAll('.calc-tab').forEach(function(btn){
    btn.classList.toggle('active', btn.dataset.panel === name);
  });
  document.querySelectorAll('.panel').forEach(function(panel){
    panel.style.display = (panel.id === 'panel-' + name) ? 'block' : 'none';
  });
}

// Withholding tax rates, Tax Year 2027 (FY 2026-27), Finance Act 2026.
// Scope: Profit on Debt (Sec. 151) and Dividends (Sec. 150) only -- these are
// the two categories with clean, consistently-sourced filer/non-filer rates.
// Services, contracts, property, vehicles, imports/exports use value-based
// brackets and are intentionally NOT covered here to avoid giving a wrong number.
const WHT_RATES = {
  bank_profit: {
    label: 'Bank Profit / Profit on Debt (Sec. 151)',
    filer: 15, nonfiler: 30,
    note: 'Final tax on profit under Rs. 5 million/year; becomes advance tax above that threshold. Applies to savings/PLS account profit and government securities.'
  },
  div_listed: {
    label: 'Dividend — Listed (PSX) Company (Sec. 150)',
    filer: 15, nonfiler: 30,
    note: 'Final tax for individual shareholders on dividends from PSX-listed companies.'
  },
  div_unlisted: {
    label: 'Dividend — Unlisted / Private Company (Sec. 150)',
    filer: 25, nonfiler: 50,
    note: 'Higher rate applies to dividends from unlisted/private companies.'
  },
  div_equity_fund: {
    label: 'Dividend — Equity Mutual Fund (Sec. 150)',
    filer: 15, nonfiler: 30,
    note: 'Same rate as listed companies. Debt-heavy mutual funds (50%+ income from profit on debt) are taxed higher, at 25%/50%.'
  }
};

function parseWhtAmount(str){
  const n = parseFloat(str.replace(/[^0-9.]/g,''));
  return isNaN(n) ? 0 : n;
}

// --- WHT calculator (single filer/non-filer toggle) ---
const whtType = document.getElementById('whtType');
const whtAmountInput = document.getElementById('whtAmount');
const whtFilerCheck = document.getElementById('whtFiler');
const whtLedger = document.getElementById('whtLedger');
const whtNetEl = document.getElementById('whtNet');
const whtNoteEl = document.getElementById('whtNote');

function calcWht(){
  const cat = WHT_RATES[whtType.value];
  const gross = parseWhtAmount(whtAmountInput.value);
  const isFiler = whtFilerCheck.checked;
  const rate = isFiler ? cat.filer : cat.nonfiler;
  const taxAmount = gross * (rate / 100);
  const net = gross - taxAmount;

  whtLedger.innerHTML = `
    <div class="ledger-row"><span>Category</span><span class="val">${cat.label}</span></div>
    <div class="ledger-row"><span>Status</span><span class="val">${isFiler ? 'Filer' : 'Non-Filer'}</span></div>
    <div class="ledger-row active"><span>WHT rate applied</span><span class="val">${rate}%</span></div>
    <div class="ledger-row active"><span>Tax withheld</span><span class="val">Rs. ${Math.round(taxAmount).toLocaleString('en-PK')}</span></div>
  `;
  whtNetEl.textContent = 'Rs. ' + Math.round(net).toLocaleString('en-PK');
  whtNoteEl.textContent = cat.note + ' This calculator covers only these Section 150/151 categories — not services, contracts, property, or vehicle WHT, which use separate value-based brackets.';
}

whtType.addEventListener('change', calcWht);
whtAmountInput.addEventListener('input', calcWht);
whtFilerCheck.addEventListener('change', calcWht);
calcWht();

// --- Filer vs Non-Filer comparison (shows both side by side) ---
const cmpType = document.getElementById('cmpType');
const cmpAmountInput = document.getElementById('cmpAmount');
const compareGrid = document.getElementById('compareGrid');

function calcCompare(){
  const cat = WHT_RATES[cmpType.value];
  const gross = parseWhtAmount(cmpAmountInput.value);
  const filerTax = gross * (cat.filer / 100);
  const nonfilerTax = gross * (cat.nonfiler / 100);
  const filerNet = gross - filerTax;
  const nonfilerNet = gross - nonfilerTax;
  const diff = nonfilerTax - filerTax;

  compareGrid.innerHTML = `
    <div class="compare-card filer-card">
      <div class="cc-label">Filer Receives</div>
      <div class="cc-amount">Rs. ${Math.round(filerNet).toLocaleString('en-PK')}</div>
      <div class="cc-rate">${cat.filer}% withheld</div>
    </div>
    <div class="compare-card nonfiler-card">
      <div class="cc-label">Non-Filer Receives</div>
      <div class="cc-amount">Rs. ${Math.round(nonfilerNet).toLocaleString('en-PK')}</div>
      <div class="cc-rate">${cat.nonfiler}% withheld</div>
    </div>
    <div class="compare-diff">Being a non-filer costs Rs. ${Math.round(diff).toLocaleString('en-PK')} extra on this transaction</div>
  `;
}

cmpType.addEventListener('change', calcCompare);
cmpAmountInput.addEventListener('input', calcCompare);
calcCompare();

// --- Latest Updates: reads updates.json (same folder) and renders cards.
// To keep this genuinely current, updates.json needs to be refreshed --
// either by hand, or by a scheduled script (see fetch_fbr_updates.py).
// This fetch requires the site to be served over http(s); it will fail
// if you open this page directly as a local file (file://) instead of via a PHP server.
(function loadUpdates(){
  const list = document.getElementById('updatesList');
  fetch('updates.json')
    .then(function(res){
      if (!res.ok) throw new Error('Failed to load');
      return res.json();
    })
    .then(function(items){
      if (!items || !items.length){
        list.innerHTML = '<p class="updates-error">No updates yet.</p>';
        return;
      }
      items.sort(function(a,b){ return new Date(b.date) - new Date(a.date); });
      const html = items.slice(0, 6).map(function(item){
        const d = new Date(item.date);
        const dateLabel = d.toLocaleDateString('en-GB', {day:'2-digit', month:'short', year:'numeric'});
        return `
          <a class="update-card" href="${item.url}" target="_blank" rel="noopener">
            <div class="update-date">${dateLabel}</div>
            <div class="update-body">
              <span class="update-tag">${item.tag}</span>
              <h3>${item.title}</h3>
              <p>${item.summary}</p>
            </div>
          </a>
        `;
      }).join('');
      list.innerHTML = html + '<a class="updates-footer-link" href="https://www.fbr.gov.pk/pr" target="_blank" rel="noopener">See all FBR press releases &rarr;</a>';
    })
    .catch(function(){
      list.innerHTML = '<p class="updates-error">Updates couldn\'t be loaded right now — this page needs to be served over http(s) (not opened as a local file) for updates.json to load. <a href="https://www.fbr.gov.pk/pr" target="_blank" rel="noopener">See FBR press releases directly →</a></p>';
    });
})();
