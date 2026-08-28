<?php
$pageTitle       = 'Blog | Hisabkaro - Money Guides for Pakistan';
$pageDescription = 'Practical money guides for Pakistan -- saving on bills, low-risk investing, tax calculations, and everyday financial literacy.';
$canonicalPath   = '/blog';
$pageStyles      = ['common.css', 'blog.css'];
$navVariant      = 'blog';
$currentPage     = 'blog';
require __DIR__ . '/includes/header.php';
?>

<div class="hero-band">
  <div class="wrap">
    <header class="top">
      <div class="eyebrow">Money Guides</div>
      <h1 class="title">Blog</h1>
      <p class="sub">Practical, Pakistan-specific guides on saving, investing, and understanding your money &mdash; no jargon, no hidden agenda.</p>
    </header>
  </div>
</div>

<div class="wrap">
  <main>
    <div class="post-list">

      <a class="post-card" href="save-electricity-bills-pakistan">
        <span class="post-eyebrow">Household Budgeting</span>
        <h2>How to Save Money on Electricity Bills in Pakistan</h2>
        <p>What NEPRA's 2026 net billing overhaul means for solar, why crossing 200 units matters more than you think, and the peak-hour shift that actually moves your bill.</p>
        <span class="post-meta">6 min read</span>
      </a>

      <a class="post-card" href="low-risk-investment-options-pakistan">
        <span class="post-eyebrow">Investing</span>
        <h2>Best Low-Risk Investment Options for Salaried Persons in Pakistan</h2>
        <p>National Savings certificates, money market funds, and Islamic alternatives &mdash; a practical overview of where to park savings without stock-market risk.</p>
        <span class="post-meta">7 min read</span>
      </a>

      <a class="post-card" href="calculate-net-monthly-income-after-tax">
        <span class="post-eyebrow">Salary &amp; Tax</span>
        <h2>How to Calculate Your Net Monthly Income After Tax</h2>
        <p>The exact five-step process behind the number that lands in your bank account, with a fully worked example using the FY 2026-27 FBR slabs.</p>
        <span class="post-meta">5 min read</span>
      </a>

    </div>
  </main>
</div>

<?php
$footerVariant = 'simple';
$footerText    = "Hisabkaro's blog is educational content, not personalized financial, tax, or legal advice.";
$backHref      = '/';
$backLabel     = 'Back to Hisabkaro Home';
require __DIR__ . '/includes/footer.php';
