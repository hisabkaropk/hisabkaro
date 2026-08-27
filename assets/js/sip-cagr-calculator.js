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

// --- SIP ---
const sipAmount = document.getElementById('sipAmount');
const sipReturn = document.getElementById('sipReturn');
const sipYears = document.getElementById('sipYears');
const sipReturnVal = document.getElementById('sipReturnVal');
const sipYearsVal = document.getElementById('sipYearsVal');
const sipFutureValue = document.getElementById('sipFutureValue');
const sipInvested = document.getElementById('sipInvested');
const sipGrowth = document.getElementById('sipGrowth');

function calcSip(){
  const P = parseAmount(sipAmount.value);
  const annualReturn = parseFloat(sipReturn.value);
  const years = parseInt(sipYears.value, 10);
  const n = years * 12;
  const i = (annualReturn / 12) / 100;

  sipReturnVal.textContent = annualReturn + '%';
  sipYearsVal.textContent = years + (years === 1 ? ' yr' : ' yrs');

  let fv = 0;
  if (i === 0){
    fv = P * n;
  } else {
    fv = P * ((Math.pow(1 + i, n) - 1) / i) * (1 + i);
  }
  const invested = P * n;
  const growth = fv - invested;

  sipFutureValue.textContent = fmt(fv);
  sipInvested.textContent = fmt(invested);
  sipGrowth.textContent = fmt(growth);
}

sipAmount.addEventListener('input', calcSip);
sipReturn.addEventListener('input', calcSip);
sipYears.addEventListener('input', calcSip);
calcSip();

// --- CAGR ---
const cagrStart = document.getElementById('cagrStart');
const cagrEnd = document.getElementById('cagrEnd');
const cagrYears = document.getElementById('cagrYears');
const cagrYearsVal = document.getElementById('cagrYearsVal');
const cagrResult = document.getElementById('cagrResult');
const cagrTotalGrowth = document.getElementById('cagrTotalGrowth');

function calcCagr(){
  const start = parseAmount(cagrStart.value);
  const end = parseAmount(cagrEnd.value);
  const years = parseInt(cagrYears.value, 10);

  cagrYearsVal.textContent = years + (years === 1 ? ' yr' : ' yrs');

  if (start <= 0 || years <= 0){
    cagrResult.textContent = '—';
    cagrTotalGrowth.textContent = '—';
    return;
  }
  const cagr = (Math.pow(end / start, 1 / years) - 1) * 100;
  const totalGrowth = ((end - start) / start) * 100;

  cagrResult.textContent = cagr.toFixed(2) + '%';
  cagrTotalGrowth.textContent = totalGrowth.toFixed(2) + '%';
}

cagrStart.addEventListener('input', calcCagr);
cagrEnd.addEventListener('input', calcCagr);
cagrYears.addEventListener('input', calcCagr);
calcCagr();
