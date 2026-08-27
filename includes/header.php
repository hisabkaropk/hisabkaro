<?php
/**
 * Shared <head> + opening <body> + nav, included by every page.
 *
 * Pages set these variables before requiring this file:
 *   $pageTitle       string   required
 *   $pageDescription string   required
 *   $canonicalPath   string   e.g. '/', '/zakat-calculator.php'
 *   $og              array|null  ['type'=>, 'title'=>, 'description'=>, 'path'=>, 'image'=>(optional)]
 *   $twitter         array|null  ['title'=>, 'description'=>, 'image'=>]
 *   $jsonLd          array    raw JSON strings, each wrapped in its own <script type="application/ld+json">
 *   $pageStyles      array    filenames under assets/css/, loaded in order (include 'common.css' explicitly unless using 'legal.css')
 *   $navVariant      string   'home' | 'calc' | 'content' | 'blog' | 'legal'
 *   $currentPage     string   slug used to mark a nav link active, e.g. 'home', 'blog', 'about'
 */

$pageTitle       = $pageTitle       ?? 'Hisabkaro | Free Financial Calculators for Pakistan';
$pageDescription = $pageDescription ?? 'Free, independent financial calculators and money guides for Pakistan.';
$canonicalPath   = $canonicalPath   ?? '/';
$og              = $og              ?? null;
$twitter         = $twitter         ?? null;
$jsonLd          = $jsonLd          ?? [];
$pageStyles      = $pageStyles      ?? ['common.css'];
$navVariant      = $navVariant      ?? 'content';
$currentPage     = $currentPage     ?? '';

$siteBaseUrl  = 'https://YOURDOMAIN.pk';
$canonicalUrl = $siteBaseUrl . $canonicalPath;

$navPresets = [
    'home' => [
        ['label' => 'Calculator', 'href' => '#calculator'],
        ['label' => 'Updates',    'href' => '#updates'],
        ['label' => 'Tax Slabs',  'href' => '#slabs'],
        ['label' => 'Check NTN',  'href' => '#ntn'],
        ['label' => 'FAQ',        'href' => '#faq'],
        ['label' => 'Blog',       'href' => '/blog.php', 'slug' => 'blog'],
        ['label' => 'More Tools', 'href' => '#tools'],
    ],
    'calc' => [
        ['label' => 'Home',       'href' => '/', 'slug' => 'home'],
        ['label' => 'Blog',       'href' => '/blog.php', 'slug' => 'blog'],
        ['label' => 'More Tools', 'href' => '/#tools'],
        ['label' => 'FAQ',        'href' => '#faq'],
    ],
    'content' => [
        ['label' => 'Home',       'href' => '/', 'slug' => 'home'],
        ['label' => 'Blog',       'href' => '/blog.php', 'slug' => 'blog'],
        ['label' => 'More Tools', 'href' => '/#tools'],
    ],
    'blog' => [
        ['label' => 'Home',       'href' => '/', 'slug' => 'home'],
        ['label' => 'About',      'href' => '/about.php', 'slug' => 'about'],
        ['label' => 'More Tools', 'href' => '/#tools'],
    ],
    'legal' => [
        ['label' => 'Calculator', 'href' => '/#calculator'],
        ['label' => 'FAQ',        'href' => '/#faq'],
        ['label' => 'More Tools', 'href' => '/#tools'],
    ],
];
$navLinks = $navPresets[$navVariant] ?? $navPresets['content'];
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle) ?></title>
<meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
<link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">
<?php if ($og): ?>
<!-- Open Graph -->
<meta property="og:type" content="<?= htmlspecialchars($og['type']) ?>">
<meta property="og:title" content="<?= htmlspecialchars($og['title']) ?>">
<meta property="og:description" content="<?= htmlspecialchars($og['description']) ?>">
<meta property="og:url" content="<?= htmlspecialchars($siteBaseUrl . ($og['path'] ?? $canonicalPath)) ?>">
<meta property="og:locale" content="en_PK">
<?php if (!empty($og['image'])): ?>
<meta property="og:image" content="<?= htmlspecialchars($siteBaseUrl . $og['image']) ?>">
<?php endif; ?>
<?php endif; ?>
<?php if ($twitter): ?>
<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= htmlspecialchars($twitter['title']) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($twitter['description']) ?>">
<meta name="twitter:image" content="<?= htmlspecialchars($siteBaseUrl . $twitter['image']) ?>">
<?php endif; ?>
<?php foreach ($jsonLd as $ld): ?>
<script type="application/ld+json">
<?= $ld ?>

</script>
<?php endforeach; ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<?php foreach ($pageStyles as $css): ?>
<link rel="stylesheet" href="/assets/css/<?= htmlspecialchars($css) ?>">
<?php endforeach; ?>
</head>
<body>

<nav class="site-nav">
  <div class="wrap">
    <a href="/" class="site-logo"><span class="dot"></span>Hisabkaro</a>
    <ul class="nav-links">
      <?php foreach ($navLinks as $link): ?>
      <li><a href="<?= htmlspecialchars($link['href']) ?>"<?= (isset($link['slug']) && $link['slug'] === $currentPage) ? ' class="active"' : '' ?>><?= htmlspecialchars($link['label']) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>
