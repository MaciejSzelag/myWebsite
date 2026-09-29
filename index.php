<?php
/**
 * Maciej Szeląg — Web Developer Portfolio
 * Main Landing Page (PHP Modular Architecture)
 */
require_once __DIR__ . '/config.php';

$page_title     = 'Maciej Szeląg | Web Developer Plymouth, Devon & Cornwall | Bespoke High-Performance Websites';
$page_desc      = 'Maciej Szeląg is a web developer based in Plymouth, UK. Crafting bespoke, lightning-fast, and high-converting websites for businesses across Plymouth, Devon, Cornwall, Bristol, Manchester, London & UK-wide.';
$page_og_image  = 'assets/checkmat_live.png';
$page_canonical = SITE_URL . '/';
$current_page   = 'home';

require_once __DIR__ . '/includes/header.php';
?>

  <!-- =========================================================================
       Main Content (Modular PHP Architecture)
       ========================================================================= -->
  <main id="main-content">
    <?php
      require_once __DIR__ . '/includes/sections/hero.php';
      require_once __DIR__ . '/includes/sections/work.php';
      require_once __DIR__ . '/includes/sections/benefits.php';
      require_once __DIR__ . '/includes/sections/about.php';
      require_once __DIR__ . '/includes/sections/coverage.php';
      require_once __DIR__ . '/includes/sections/faq.php';
      require_once __DIR__ . '/includes/sections/contact.php';
    ?>
  </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
