<?php
/**
 * Shared Header Component
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}

$title = isset($page_title) ? $page_title : SITE_NAME . ' | ' . SITE_TAGLINE;
$desc = isset($page_desc) ? $page_desc : 'Maciej Szeląg is a web developer based in Plymouth, UK. Crafting bespoke, lightning-fast, and high-converting websites for businesses across Plymouth, Devon, Cornwall, Bristol, Manchester, London & UK-wide.';
$og_img = isset($page_og_image) ? $page_og_image : 'assets/checkmat_live.png';
$canonical = isset($page_canonical) ? $page_canonical : SITE_URL . '/';
$active_nav = isset($current_page) ? $current_page : 'home';

// Home anchor prefix helper: if on home, anchor is "#work", else "index.php#work"
$home_prefix = ($active_nav === 'home') ? '' : 'index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($title); ?></title>
  
  <!-- SEO Meta Tags -->
  <meta name="description" content="<?php echo htmlspecialchars($desc); ?>">
  <meta name="keywords" content="web developer Plymouth, web design Plymouth, website developer Devon, web designer Cornwall, bespoke websites UK, high performance web development, Checkmat BJJ Plymouth website, mobile first websites, cybersecurity web development, AI in web development">
  <meta name="author" content="<?php echo AUTHOR_NAME; ?>">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?php echo htmlspecialchars($canonical); ?>">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo htmlspecialchars($canonical); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($desc); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars($og_img); ?>">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?php echo htmlspecialchars($canonical); ?>">
  <meta property="twitter:title" content="<?php echo htmlspecialchars($title); ?>">
  <meta property="twitter:description" content="<?php echo htmlspecialchars($desc); ?>">
  <meta property="twitter:image" content="<?php echo htmlspecialchars($og_img); ?>">

  <!-- Theme Color -->
  <meta name="theme-color" content="#060911">

  <!-- Google Fonts Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Stylesheet (Cache-busted) -->
  <link rel="stylesheet" href="styles.css?v=<?php echo filemtime(__DIR__ . '/../styles.css'); ?>">

  <!-- JSON-LD Structured Data Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "WebSite",
        "@id": "https://maciejszelag.co.uk/#website",
        "url": "https://maciejszelag.co.uk/",
        "name": "Maciej Szeląg | Web Developer",
        "description": "Bespoke high-performance web development for businesses in Plymouth, Devon, Cornwall and across the UK.",
        "inLanguage": ["en-GB", "pl-PL"]
      },
      {
        "@type": "ProfessionalService",
        "@id": "https://maciejszelag.co.uk/#business",
        "name": "Maciej Szeląg - Web Development & Design",
        "image": "https://maciejszelag.co.uk/assets/checkmat_live.png",
        "url": "https://maciejszelag.co.uk/",
        "priceRange": "££",
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "Plymouth",
          "addressRegion": "Devon",
          "addressCountry": "GB"
        },
        "geo": {
          "@type": "GeoCoordinates",
          "latitude": 50.3755,
          "longitude": -4.1427
        },
        "areaServed": [
          { "@type": "City", "name": "Plymouth" },
          { "@type": "AdministrativeArea", "name": "Devon" },
          { "@type": "AdministrativeArea", "name": "Cornwall" },
          { "@type": "City", "name": "Exeter" },
          { "@type": "City", "name": "Torbay" },
          { "@type": "City", "name": "Truro" },
          { "@type": "City", "name": "Newquay" },
          { "@type": "City", "name": "Saltash" },
          { "@type": "City", "name": "Bristol" },
          { "@type": "City", "name": "London" },
          { "@type": "City", "name": "Manchester" },
          { "@type": "City", "name": "Birmingham" },
          { "@type": "Country", "name": "United Kingdom" }
        ],
        "knowsAbout": [
          "Web Development",
          "Responsive Web Design",
          "Mobile-First Design",
          "Search Engine Optimisation (SEO)",
          "Local SEO Plymouth Devon Cornwall",
          "Core Web Vitals Optimization",
          "Web Security & Anti-Bot Architecture",
          "Practical AI Integration in Web Apps"
        ]
      }
    ]
  }
  </script>
</head>
<body>
  <!-- Accessibility Skip Link -->
  <a href="#main-content" class="skip-link">Skip to main content</a>

  <!-- =========================================================================
       Site Header & Responsive Navigation
       ========================================================================= -->
  <header class="site-header" role="banner">
    <div class="nav-container">
      <!-- Brand Logo -->
      <a href="<?php echo ($active_nav === 'home') ? '#hero' : 'index.php'; ?>" class="brand-logo" aria-label="Maciej Szeląg - Homepage">
        <div class="brand-badge">MS</div>
        <div class="brand-text">Maciej <span>Szeląg</span></div>
      </a>

      <!-- Desktop Navigation Menu -->
      <nav class="desktop-nav" role="navigation" aria-label="Main Navigation">
        <a href="<?php echo $home_prefix; ?>#work" class="nav-link" data-i18n="navWork">Work</a>
        <a href="<?php echo $home_prefix; ?>#benefits" class="nav-link" data-i18n="navWhy">Why Me</a>
        <a href="<?php echo $home_prefix; ?>#about" class="nav-link" data-i18n="navAbout">About</a>
        <a href="<?php echo $home_prefix; ?>#coverage" class="nav-link" data-i18n="navCoverage">Coverage</a>
        <a href="blog.php" class="nav-link <?php echo ($active_nav === 'blog' || $active_nav === 'article') ? 'active' : ''; ?>" data-i18n="navBlog">Blog</a>
        <a href="<?php echo $home_prefix; ?>#faq" class="nav-link" data-i18n="navFaq">FAQ</a>
      </nav>

      <!-- Header Actions: Language Switch & CTA -->
      <div class="header-actions">
        <!-- Language Switcher: EN / PL -->
        <div class="lang-switch" role="group" aria-label="Language Switcher">
          <button type="button" class="lang-btn active" data-lang="en" aria-label="English">EN</button>
          <button type="button" class="lang-btn" data-lang="pl" aria-label="Polish">PL</button>
        </div>

        <!-- Contact CTA -->
        <a href="<?php echo $home_prefix; ?>#contact" class="btn btn-primary btn-sm" data-i18n="navContact">Let's Talk</a>

        <!-- Mobile Hamburger Button -->
        <button id="menu-toggle" class="menu-toggle" aria-label="Open mobile navigation menu" aria-expanded="false" aria-controls="mobile-nav">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-nav" class="mobile-nav-drawer" aria-hidden="true">
      <div class="mobile-nav-links">
        <a href="<?php echo $home_prefix; ?>#work" class="mobile-nav-link">
          <span data-i18n="navWork">Work</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
        <a href="<?php echo $home_prefix; ?>#benefits" class="mobile-nav-link">
          <span data-i18n="navWhy">Why Me</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
        <a href="<?php echo $home_prefix; ?>#about" class="mobile-nav-link">
          <span data-i18n="navAbout">About</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
        <a href="<?php echo $home_prefix; ?>#coverage" class="mobile-nav-link">
          <span data-i18n="navCoverage">Coverage</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
        <a href="blog.php" class="mobile-nav-link <?php echo ($active_nav === 'blog' || $active_nav === 'article') ? 'active' : ''; ?>">
          <span data-i18n="navBlog">Blog</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
        <a href="<?php echo $home_prefix; ?>#faq" class="mobile-nav-link">
          <span data-i18n="navFaq">FAQ</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
      </div>

      <div class="mobile-nav-footer">
        <a href="<?php echo $home_prefix; ?>#contact" class="btn btn-primary" style="width: 100%;" data-i18n="navContact">Let's Talk</a>
        <div style="text-align: center; font-size: 0.8rem; color: var(--text-muted);">
          📍 Plymouth, Devon, UK & Remote Nationwide
        </div>
      </div>
    </div>
  </header>
