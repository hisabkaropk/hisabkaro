const CURRENCIES = [
  {code:'PKR', label:'PKR — Pakistani Rupee'},
  {code:'USD', label:'USD — US Dollar'},
  {code:'SAR', label:'SAR — Saudi Riyal'},
  {code:'AED', label:'AED — UAE Dirham'},
  {code:'GBP', label:'GBP — British Pound'},
  {code:'EUR', label:'EUR — Euro'},
  {code:'CNY', label:'CNY — Chinese Yuan'},
  {code:'AUD', label:'AUD — Australian Dollar'},
  {code:'CAD', label:'CAD — Canadian Dollar'}
];

const fromSelect = document.getElementById('cvFrom');
const toSelect = document.getElementById('cvTo');
const amountInput = document.getElementById('cvAmount');
const resultsBox = document.getElementById('resultsBox');
const swapBtn = document.getElementById('cvSwap');

CURRENCIES.forEach(function(c){
  const opt1 = document.createElement('option');
  opt1.value = c.code; opt1.textContent = c.label;
  fromSelect.appendChild(opt1);
  const opt2 = document.createElement('option');
  opt2.value = c.code; opt2.textContent = c.label;
  toSelect.appendChild(opt2);
});
fromSelect.value = 'USD';
toSelect.value = 'PKR';

let ratesCache = null; // { base: 'USD', rates: {PKR: x, ...}, date: '...' }

function parseAmount(str){
  const n = parseFloat(String(str).replace(/[^0-9.]/g,''));
  return isNaN(n) ? 0 : n;
}

function fetchRates(base){
  const codes = CURRENCIES.map(function(c){return c.code;}).filter(function(c){return c !== base;});
  const url = 'https://api.frankfurter.dev/v1/latest?base=' + base + '&symbols=' + codes.join(',');
  return fetch(url).then(function(res){
    if (!res.ok) throw new Error('Rate fetch failed');
    return res.json();
  });
}

function render(){
  const from = fromSelect.value;
  const to = toSelect.value;
  const amount = parseAmount(amountInput.value);

  if (!ratesCache || ratesCache.base !== from){
    resultsBox.innerHTML = '<p class="cv-status">Loading current rates&hellip;</p>';
    fetchRates(from).then(function(data){
      ratesCache = { base: from, rates: data.rates, date: data.date };
      ratesCache.rates[from] = 1;
      renderResult();
    }).catch(function(){
      resultsBox.innerHTML = '<p class="cv-status">Couldn\'t load live rates right now — this needs the page served over http(s), and Frankfurter\'s API to be reachable. Try again shortly.</p>';
    });
  } else {
    renderResult();
  }
}

function renderResult(){
  const to = toSelect.value;
  const amount = parseAmount(amountInput.value);
  if (!ratesCache || !ratesCache.rates || ratesCache.rates[to] === undefined){
    resultsBox.innerHTML = '<p class="cv-status">Rate not available for this pair right now.</p>';
    return;
  }
  const rate = ratesCache.rates[to];
  const converted = amount * rate;

  let quickRows = '';
  CURRENCIES.forEach(function(c){
    if (c.code === fromSelect.value) return;
    const r = ratesCache.rates[c.code];
    if (r === undefined) return;
    quickRows += `<div class="qr-row"><span>1 ${fromSelect.value} =</span><span class="val">${r.toLocaleString('en-PK', {maximumFractionDigits: 4})} ${c.code}</span></div>`;
  });

  resultsBox.innerHTML = `
    <div class="cv-headline">
      <div class="lbl">${amount.toLocaleString('en-PK')} ${fromSelect.value} =</div>
      <div class="amt">${converted.toLocaleString('en-PK', {maximumFractionDigits: 2})} ${to}</div>
    </div>
    <div class="cv-rate">1 ${fromSelect.value} = ${rate.toLocaleString('en-PK', {maximumFractionDigits: 4})} ${to} &middot; ECB reference, ${ratesCache.date}</div>
    <div class="quick-rates">${quickRows}</div>
  `;
}

swapBtn.addEventListener('click', function(){
  const f = fromSelect.value;
  fromSelect.value = toSelect.value;
  toSelect.value = f;
  render();
});

amountInput.addEventListener('input', renderResult);
fromSelect.addEventListener('change', render);
toSelect.addEventListener('change', renderResult);
render();
