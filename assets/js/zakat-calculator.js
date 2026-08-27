function fmt(n){ return 'Rs. ' + Math.round(n).toLocaleString('en-PK'); }
function parseAmount(str){ const n = parseFloat(String(str).replace(/[^0-9.]/g,'')); return isNaN(n) ? 0 : n; }

const ids = ['cashAssets','goldGrams','goldPrice','silverGrams','silverPrice','businessAssets','liabilities'];
const inputs = {};
ids.forEach(function(id){ inputs[id] = document.getElementById(id); });

const zakatAmount = document.getElementById('zakatAmount');
const zakatStatus = document.getElementById('zakatStatus');
const totalWealth = document.getElementById('totalWealth');
const nisabValue = document.getElementById('nisabValue');

const GOLD_NISAB_GRAMS = 87.48;
const SILVER_NISAB_GRAMS = 612.36;
const ZAKAT_RATE = 0.025;

function calc(){
  const cash = parseAmount(inputs.cashAssets.value);
  const goldGrams = parseAmount(inputs.goldGrams.value);
  const goldPrice = parseAmount(inputs.goldPrice.value);
  const silverGrams = parseAmount(inputs.silverGrams.value);
  const silverPrice = parseAmount(inputs.silverPrice.value);
  const business = parseAmount(inputs.businessAssets.value);
  const debts = parseAmount(inputs.liabilities.value);

  const goldValue = goldGrams * goldPrice;
  const silverValue = silverGrams * silverPrice;
  const total = cash + goldValue + silverValue + business - debts;

  const basis = document.querySelector('input[name="nisabBasis"]:checked').value;
  let nisab = 0;
  if (basis === 'gold'){
    nisab = goldPrice > 0 ? GOLD_NISAB_GRAMS * goldPrice : 0;
  } else {
    nisab = silverPrice > 0 ? SILVER_NISAB_GRAMS * silverPrice : 0;
  }

  totalWealth.textContent = fmt(Math.max(total,0));
  nisabValue.textContent = nisab > 0 ? fmt(nisab) : 'Enter a price above';

  if (nisab > 0 && total >= nisab){
    const due = total * ZAKAT_RATE;
    zakatAmount.textContent = fmt(due);
    zakatStatus.textContent = 'Zakat is due';
    zakatStatus.className = 'status-pill status-due';
  } else {
    zakatAmount.textContent = fmt(0);
    zakatStatus.textContent = nisab > 0 ? 'Below Nisab — not due' : 'Enter gold/silver price to check Nisab';
    zakatStatus.className = 'status-pill status-notdue';
  }
}

ids.forEach(function(id){ inputs[id].addEventListener('input', calc); });
document.querySelectorAll('input[name="nisabBasis"]').forEach(function(r){ r.addEventListener('change', calc); });
calc();
