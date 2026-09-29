<?php
/**
 * Custom 404 Not Found Page
 * Returns proper HTTP 404 status code, protects SEO with noindex,
 * and provides intuitive navigation pathways and recommended articles.
 */
http_response_code(404);

require_once __DIR__ . '/config.php';

$page_title     = '404 - Page Not Found | ' . SITE_NAME . ' Web Developer';
$page_desc      = 'The page you requested could not be found. Explore bespoke web development services in Plymouth or browse technical articles on cybersecurity and practical AI.';
$page_og_image  = 'assets/checkmat_live.png';
$page_canonical = SITE_URL . '/404.php';
$page_robots    = 'noindex, follow';
$current_page   = '404';

require_once __DIR__ . '/includes/header.php';

$suggested_articles = get_suggested_articles(null, 2);
?>

<main id="main-content">
  <section class="section error-404-section">
    <div class="container">
      
      <!-- Breadcrumbs -->
      <nav class="breadcrumb-bar" aria-label="Breadcrumbs">
        <a href="index.php">Home</a>
        <span class="breadcrumb-sep">/</span>
        <span class="breadcrumb-current">404 Error</span>
      </nav>

      <!-- 404 Hero Card -->
      <div class="error-404-card reveal-on-scroll">
        <div class="badge-pill error-badge">
          <span class="badge-pulse pulse-error" aria-hidden="true"></span>
          <span data-i18n="error404Badge">Error 404 · Page Not Found</span>
        </div>

        <div class="error-404-number" aria-hidden="true">404</div>

        <h1 class="error-404-title" data-i18n="error404Title">
          Lost in Cyberspace? <span class="gradient-text">Page Not Found</span>
        </h1>

        <p class="error-404-lead" data-i18n="error404Lead">
          The URL you entered might be mistyped, moved, or deleted. Don't worry — choose a destination below to get back on track.
        </p>

        <!-- Helpful Navigation Pathways -->
        <div class="error-404-actions">
          <a href="index.php" class="btn btn-primary">
            <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            <span data-i18n="error404BtnHome">Back to Homepage</span>
          </a>

          <a href="index.php#work" class="btn btn-secondary">
            <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
            <span data-i18n="error404BtnWork">Featured Work</span>
          </a>

          <a href="blog.php" class="btn btn-secondary">
            <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
            <span data-i18n="error404BtnBlog">Technical Blog</span>
          </a>

          <a href="index.php#contact" class="btn btn-secondary">
            <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            <span data-i18n="error404BtnContact">Contact Maciej</span>
          </a>
        </div>
      </div>

      <!-- Suggested Articles Section (Value Recovery) -->
      <?php if (!empty($suggested_articles)): ?>
      <div class="error-404-suggested reveal-on-scroll">
        <div class="section-header" style="margin-bottom: 2rem; text-align: center;">
          <h2 class="section-title" style="font-size: 1.5rem;" data-i18n="error404Suggested">
            Or explore these technical publications:
          </h2>
        </div>

        <div class="blog-cards-grid">
          <?php foreach ($suggested_articles as $slug => $article): ?>
            <article class="blog-article-card" data-category="<?php echo htmlspecialchars($article['category']); ?>">
              <a href="article.php?slug=<?php echo urlencode($slug); ?>" class="blog-card-image-wrap" tabindex="-1" aria-hidden="true">
                <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['image_alt']); ?>" width="600" height="338" loading="lazy">
                <span class="blog-image-overlay-badge <?php echo $article['tag_class']; ?>">
                  <?php echo htmlspecialchars($article['category']); ?>
                </span>
              </a>

              <div class="blog-card-content">
                <div class="blog-meta-header">
                  <span class="blog-read-time">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    <?php echo htmlspecialchars($article['read_time']); ?>
                  </span>
                  <span class="blog-post-date"><?php echo htmlspecialchars($article['date']); ?></span>
                </div>

                <h3 class="blog-card-title">
                  <a href="article.php?slug=<?php echo urlencode($slug); ?>">
                    <?php echo htmlspecialchars($article['title']); ?>
                  </a>
                </h3>

                <p class="blog-card-excerpt">
                  <?php echo htmlspecialchars($article['excerpt']); ?>
                </p>

                <div class="blog-card-footer">
                  <a href="article.php?slug=<?php echo urlencode($slug); ?>" class="btn btn-secondary btn-sm" style="width: 100%;">
                    <span>Read Article</span>
                    <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                  </a>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
