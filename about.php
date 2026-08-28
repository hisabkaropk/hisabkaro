<?php
$pageTitle       = 'About Us | Hisabkaro';
$pageDescription = 'Hisabkaro.pk is a free, independent home for financial calculators and practical money guides built for Pakistani households, freelancers, and salaried individuals.';
$canonicalPath   = '/about';
$pageStyles      = ['common.css', 'about.css'];
$navVariant      = 'content';
$currentPage     = 'about';
require __DIR__ . '/includes/header.php';
?>

<div class="hero-band">
  <div class="wrap">
    <header class="top">
      <div class="eyebrow">About</div>
      <h1 class="title">About Us</h1>
      <p class="sub">Welcome to hisabkaro.pk &mdash; your trusted destination for practical financial planning, smart budgeting tools, and everyday money insights in Pakistan.</p>
    </header>
  </div>
</div>

<div class="wrap">
  <main>

    <div class="card">
      <h2 class="section-title">Our Mission</h2>
      <p>Navigating personal finances, rising inflation, and changing tax rules can feel overwhelming. Our mission at hisabkaro.pk is simple: to help everyday households, freelancers, and salaried individuals answer one crucial question &mdash; <strong>"Kya Bacha?"</strong> (What's left saved?)</p>
      <p>We aim to empower individuals across Pakistan to take full control of their hard-earned money by making financial calculations, expense tracking, and savings strategies accessible to everyone &mdash; completely free of cost.</p>
    </div>

    <div class="card">
      <h2 class="section-title">What We Provide</h2>
      <ul class="feature-list">
        <li>
          <div class="feat-icon">1</div>
          <div class="feat-text">
            <h3>Interactive Financial Tools</h3>
            <p>From salary tax calculators updated with current FBR rules to inflation impact tools and monthly budget planners, our web utilities simplify complex calculations in seconds.</p>
          </div>
        </li>
        <li>
          <div class="feat-icon">2</div>
          <div class="feat-text">
            <h3>Actionable Money Guides</h3>
            <p>Practical advice on reducing daily expenses, smart saving habits, low-risk investment options, and financial literacy tailored specifically to the Pakistani market.</p>
          </div>
        </li>
        <li>
          <div class="feat-icon">3</div>
          <div class="feat-text">
            <h3>Simple &amp; Transparent Solutions</h3>
            <p>No complex jargon or hidden costs &mdash; just clear, easy-to-use tools designed for quick everyday use.</p>
          </div>
        </li>
      </ul>
    </div>

    <div class="card">
      <h2 class="section-title">A Note on Accuracy</h2>
      <p>Every calculator here is built with real, sourced figures from FBR, NEPRA, EOBI, and other official bodies &mdash; and where a number changes too often to trust (like gold prices or bank profit rates), we ask you to enter today's figure yourself rather than showing you something stale. Where we haven't verified a rate carefully enough, we say so rather than guess. See our <a href="terms" style="color:var(--blue); font-weight:600;">Terms of Use</a> for the full picture on what these tools are (and aren't).</p>
    </div>

  </main>
</div>

<?php
$footerVariant = 'simple';
$footerText    = "Hisabkaro is an independent, free resource. Not affiliated with FBR, NEPRA, EOBI, or any government body.";
$backHref      = '/';
$backLabel     = 'Back to Hisabkaro Home';
require __DIR__ . '/includes/footer.php';
