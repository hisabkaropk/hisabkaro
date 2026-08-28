<?php
$pageTitle       = 'Privacy Policy | Hisabkaro';
$pageDescription = 'Privacy policy for Hisabkaro\'s free Pakistan salary tax calculator — what data is collected, cookies used, and how to contact us.';
$canonicalPath   = '/privacy-policy';
$pageStyles      = ['legal.css'];
$navVariant      = 'legal';
$currentPage     = 'privacy-policy';
require __DIR__ . '/includes/header.php';
?>

<main class="wrap">
  <div class="eyebrow">Legal</div>
  <h1>Privacy Policy</h1>
  <p class="updated">Last updated: August 2026</p>

  <p>Hisabkaro ("we," "us") provides free tax and salary calculators for use in Pakistan. This page explains what information is involved when you use the site.</p>

  <h2>Information We Collect</h2>
  <p>The calculators on this site run entirely in your browser. Figures you enter (salary, deductions, etc.) are not transmitted to us, stored on any server we operate, or linked to your identity — the math happens locally on your device.</p>
  <p>We do not require account creation, and we do not collect names, CNIC numbers, or financial account details.</p>

  <h2>Cookies and Advertising</h2>
  <p>Like most free websites, this site may use third-party services that set cookies, including:</p>
  <ul>
    <li><strong>Google AdSense</strong> — to display ads that help keep the tools free. Google may use cookies to serve ads based on your visits to this and other sites.</li>
    <li><strong>Google Analytics</strong> (or a similar analytics service) — to understand aggregate traffic patterns (e.g., which pages are visited, roughly where visitors are located). This data is anonymized and not tied to individual identities.</li>
  </ul>
  <p>You can control or disable cookies through your browser settings, or opt out of personalized advertising via <a href="https://adssettings.google.com" target="_blank" rel="noopener">Google's Ads Settings</a>.</p>

  <h2>Third-Party Links</h2>
  <p>This site links to official government resources (such as FBR's IRIS portal) for convenience. We are not responsible for the privacy practices or content of external sites.</p>

  <h2>Children's Privacy</h2>
  <p>This site is not directed at children and we do not knowingly collect information from anyone under 18.</p>

  <h2>Changes to This Policy</h2>
  <p>We may update this policy as the site grows — for example, if we add features that require data storage. Material changes will be reflected on this page with an updated date.</p>

  <h2>Contact</h2>
  <p>Questions about this policy can be sent to <a href="mailto:connect@hisabkaro.pk">connect@hisabkaro.pk</a>.</p>
</main>

<?php
$footerVariant = 'legal';
require __DIR__ . '/includes/footer.php';
