<?php
$errors  = [];
$success = false;
$old     = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['name']    = trim($_POST['name'] ?? '');
    $old['email']   = trim($_POST['email'] ?? '');
    $old['subject'] = trim($_POST['subject'] ?? '');
    $old['message'] = trim($_POST['message'] ?? '');
    $honeypot       = trim($_POST['website'] ?? ''); // hidden field -- real visitors leave this blank

    if ($honeypot === '') {
        if ($old['name'] === '') {
            $errors[] = 'Please enter your name.';
        }
        if ($old['email'] === '' || !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address.';
        }
        if ($old['message'] === '') {
            $errors[] = 'Please enter a message.';
        }

        if (!$errors) {
            $safeName  = str_replace(["\r", "\n"], '', $old['name']);
            $safeEmail = str_replace(["\r", "\n"], '', $old['email']);
            $subjectLine = 'Contact form: ' . ($old['subject'] !== '' ? $old['subject'] : 'Message from ' . $safeName);
            $body    = "Name: {$old['name']}\nEmail: {$old['email']}\nSubject: {$old['subject']}\n\n{$old['message']}\n";
            $headers = "From: {$safeName} <{$safeEmail}>\r\nReply-To: {$safeEmail}\r\n";

            $success = @mail('connect@hisabkaro.pk', $subjectLine, $body, $headers);
            if ($success) {
                $old = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];
            } else {
                $errors[] = "Sorry, something went wrong sending your message. Please email us directly at connect@hisabkaro.pk instead.";
            }
        }
    } else {
        // Honeypot tripped -- silently pretend success so bots don't learn anything.
        $success = true;
        $old = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];
    }
}

$pageTitle       = 'Contact Us | Hisabkaro';
$pageDescription = 'Get in touch with the Hisabkaro team — questions, feedback, corrections, or partnership queries about our free Pakistan financial calculators.';
$canonicalPath   = '/contact';
$pageStyles      = ['common.css', 'contact.css'];
$navVariant      = 'content';
$currentPage     = 'contact';
require __DIR__ . '/includes/header.php';
?>

<div class="hero-band">
  <div class="wrap">
    <header class="top">
      <div class="eyebrow">Get in Touch</div>
      <h1 class="title">Contact Us</h1>
      <p class="sub">Questions, feedback, or spotted an error in a calculator? We'd like to hear about it.</p>
    </header>
  </div>
</div>

<div class="wrap">
  <main>

    <div class="card contact-card">

      <?php if ($success): ?>
        <div class="form-notice form-success">
          <strong>Thanks &mdash; your message is on its way.</strong> We read every message and try to reply within a few days.
        </div>
      <?php endif; ?>

      <?php if ($errors): ?>
        <div class="form-notice form-error">
          <strong>Please fix the following:</strong>
          <ul>
            <?php foreach ($errors as $error): ?>
              <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form class="contact-form" method="post" action="/contact" novalidate>

        <div class="field">
          <label class="field-label" for="name">Your name</label>
          <input class="form-input" type="text" id="name" name="name" value="<?= htmlspecialchars($old['name']) ?>" required autocomplete="name">
        </div>

        <div class="field">
          <label class="field-label" for="email">Email address</label>
          <input class="form-input" type="email" id="email" name="email" value="<?= htmlspecialchars($old['email']) ?>" required autocomplete="email">
        </div>

        <div class="field">
          <label class="field-label" for="subject">Subject <span class="optional">(optional)</span></label>
          <input class="form-input" type="text" id="subject" name="subject" value="<?= htmlspecialchars($old['subject']) ?>">
        </div>

        <div class="field">
          <label class="field-label" for="message">Message</label>
          <textarea class="form-input form-textarea" id="message" name="message" rows="6" required><?= htmlspecialchars($old['message']) ?></textarea>
        </div>

        <!-- Honeypot: hidden from real visitors via CSS, left blank by them; bots that fill every field trip it. -->
        <div class="hp-field" aria-hidden="true">
          <label for="website">Website</label>
          <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
        </div>

        <button type="submit" class="btn-submit">Send Message</button>
      </form>

    </div>

    <div class="card">
      <h2 class="section-title">Other Ways to Reach Us</h2>
      <p>Prefer email? Write to us directly at <a href="mailto:connect@hisabkaro.pk" style="color:var(--blue); font-weight:600;">connect@hisabkaro.pk</a>.</p>
      <p>For questions about how a specific calculator works, check its FAQ section first &mdash; most common questions are already answered there.</p>
    </div>

  </main>
</div>

<?php
$footerVariant = 'simple';
$footerText    = "We aim to reply to every message, but as a free independent project response times can vary. For urgent tax filing questions, contact FBR or a licensed tax practitioner directly.";
$backHref      = '/';
$backLabel     = 'Back to Hisabkaro Home';
require __DIR__ . '/includes/footer.php';
