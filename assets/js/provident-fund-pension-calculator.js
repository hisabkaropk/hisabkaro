function switchTab(name){
  document.querySelectorAll('.calc-tab').forEach(function(btn){
    btn.classList.toggle('active', btn.dataset.panel === name);
  });
  document.querySelectorAll('.panel').forEach(function(panel){
    panel.classList.toggle('active', panel.id === 'panel-' + name);
  });
}

function fmt(n){ return 'Rs. ' + Math.round(n).toLocaleString('en-PK'); }
function parseAmount(str){ const n = parseFloat(String(str).replace(/[^0-9.]/g,'')); return isNaN(n) ? 0 : n; }

// --- Provident Fund ---
const pfBalance = document.getElementById('pfBalance');
const pfMonthly = document.getElementById('pfMonthly');
const pfRate = document.getElementById('pfRate');
const pfYears = document.getElementById('pfYears');
const pfRateVal = document.getElementById('pfRateVal');
const pfYearsVal = document.getElementById('pfYearsVal');
const pfFutureValue = document.getElementById('pfFutureValue');
const pfContributed = document.getElementById('pfContributed');
const pfGrowth = document.getElementById('pfGrowth');

function calcPf(){
  const start = parseAmount(pfBalance.value);
  const monthly = parseAmount(pfMonthly.value);
  const annualRate = parseFloat(pfRate.value);
  const years = parseInt(pfYears.value, 10);
  const n = years * 12;
  const r = (annualRate / 12) / 100;

  pfRateVal.textContent = annualRate + '%';
  pfYearsVal.textContent = years + (years === 1 ? ' yr' : ' yrs');

  let balance = start;
  for (let m = 0; m < n; m++){
    balance = balance * (1 + r) + monthly;
  }

  const contributed = start + (monthly * n);
  const growth = balance - contributed;

  pfFutureValue.textContent = fmt(balance);
  pfContributed.textContent = fmt(contributed);
  pfGrowth.textContent = fmt(growth);
}

pfBalance.addEventListener('input', calcPf);
pfMonthly.addEventListener('input', calcPf);
pfRate.addEventListener('input', calcPf);
pfYears.addEventListener('input', calcPf);
calcPf();

// --- EOBI Pension ---
const eobiWage = document.getElementById('eobiWage');
const eobiYears = document.getElementById('eobiYears');
const eobiYearsVal = document.getElementById('eobiYearsVal');
const eobiPension = document.getElementById('eobiPension');
const eobiFormulaResult = document.getElementById('eobiFormulaResult');
const eobiFloorNote = document.getElementById('eobiFloorNote');
const EOBI_MIN_PENSION = 11500;

function calcEobi(){
  const wage = parseAmount(eobiWage.value);
  const years = parseInt(eobiYears.value, 10);
  eobiYearsVal.textContent = years + (years === 1 ? ' yr' : ' yrs');

  const formulaResult = (wage * years) / 50;
  const finalPension = Math.max(formulaResult, EOBI_MIN_PENSION);

  eobiFormulaResult.textContent = fmt(formulaResult);
  eobiPension.textContent = fmt(finalPension);
  eobiFloorNote.style.display = formulaResult < EOBI_MIN_PENSION ? 'block' : 'none';
}

eobiWage.addEventListener('input', calcEobi);
eobiYears.addEventListener('input', calcEobi);
calcEobi();
