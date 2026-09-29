<?php
/**
 * Shared Footer Component
 */
$home_prefix = (isset($current_page) && $current_page === 'home') ? '' : 'index.php';
?>
  <!-- =========================================================================
       Footer
       ========================================================================= -->
  <footer class="site-footer" role="contentinfo">
    <div class="container">
      <div class="footer-top">
        <div class="footer-brand">
          <a href="<?php echo ($home_prefix === '') ? '#hero' : 'index.php'; ?>" class="brand-logo">
            <div class="brand-badge">MS</div>
            <div class="brand-text">Maciej <span>Szeląg</span></div>
          </a>
          <p>Bespoke, High-Performance Websites · Plymouth, Devon, Cornwall & UK-wide.</p>
        </div>

        <div class="footer-links">
          <a href="<?php echo $home_prefix; ?>#work" class="footer-link" data-i18n="navWork">Work</a>
          <a href="<?php echo $home_prefix; ?>#benefits" class="footer-link" data-i18n="navWhy">Why Me</a>
          <a href="<?php echo $home_prefix; ?>#about" class="footer-link" data-i18n="navAbout">About</a>
          <a href="<?php echo $home_prefix; ?>#coverage" class="footer-link" data-i18n="navCoverage">Coverage</a>
          <a href="blog.php" class="footer-link" data-i18n="navBlog">Blog</a>
          <a href="<?php echo $home_prefix; ?>#faq" class="footer-link" data-i18n="navFaq">FAQ</a>
          <a href="<?php echo $home_prefix; ?>#contact" class="footer-link" data-i18n="navContact">Contact</a>
        </div>
      </div>

      <div class="footer-bottom">
        <div>
          © <?php echo date('Y'); ?> Maciej Szeląg. All rights reserved. · 📍 Plymouth, Devon, UK
        </div>
        <a href="#hero" class="back-to-top" aria-label="Back to top of page">
          <span>Back to top</span>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="18 15 12 9 6 15"></polyline></svg>
        </a>
      </div>
    </div>
  </footer>

  <!-- Toast Notification (Copy Feedback) -->
  <div id="toast-notice" class="toast-notice" role="alert" aria-live="assertive">
    <svg class="toast-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
    <span id="toast-message">Copied to clipboard!</span>
  </div>

  <!-- JavaScript (Cache-busted) -->
  <script src="script.js?v=<?php echo filemtime(__DIR__ . '/../script.js'); ?>"></script>
</body>
</html>
