<?php
/**
 * Dedicated Technical Blog Page
 * Architecture, Cybersecurity & Artificial Intelligence
 */
require_once __DIR__ . '/config.php';

$page_title = 'Technical Blog | Web Security & AI Architecture | Maciej Szeląg';
$page_desc = 'Technical articles and guides on web cybersecurity, proactive bot defense, and practical AI integrations for growing businesses. Written by Maciej Szeląg.';
$page_og_image = 'assets/blog_security.jpg';
$page_canonical = SITE_URL . '/blog.php';
$current_page = 'blog';

require_once __DIR__ . '/includes/header.php';
$articles = get_all_articles();
?>

<main id="main-content">
  <!-- Blog Hero Section -->
  <section class="section blog-hero-section">
    <div class="container">
      
      <!-- Breadcrumbs -->
      <nav class="breadcrumb-bar" aria-label="Breadcrumbs">
        <a href="index.php">Home</a>
        <span class="breadcrumb-sep">/</span>
        <span class="breadcrumb-current">Blog</span>
      </nav>

      <div class="section-header reveal-on-scroll">
        <div class="badge-pill">
          <span class="badge-pulse" aria-hidden="true"></span>
          <span>Technical Insights & Engineering Blog</span>
        </div>
        <h1 class="section-title">
          Web Architecture, <span class="gradient-text">Security</span> & Practical AI
        </h1>
        <p class="section-subtitle">
          In-depth technical guides, proactive cyber defense blueprints, and generative search optimization strategies for ambitious businesses.
        </p>
        <div class="blog-lang-notice">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
          <span>All technical publications are maintained in English</span>
        </div>
      </div>

      <!-- Blog Filter Controls -->
      <div class="blog-controls-bar reveal-on-scroll">
        <div class="blog-filter-tabs">
          <button type="button" class="blog-tab-btn active" data-filter="all">All Topics (<?php echo count($articles); ?>)</button>
          <button type="button" class="blog-tab-btn" data-filter="Cybersecurity">Cybersecurity (1)</button>
          <button type="button" class="blog-tab-btn" data-filter="Artificial Intelligence">Artificial Intelligence (1)</button>
        </div>
        <div class="blog-search-box">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          <input type="text" id="blog-search-input" placeholder="Search insights..." aria-label="Search articles">
        </div>
      </div>

      <!-- Articles Grid -->
      <div class="blog-cards-grid" id="articles-grid">
        <?php foreach ($articles as $slug => $article): ?>
          <article class="blog-article-card reveal-on-scroll" data-category="<?php echo htmlspecialchars($article['category']); ?>" data-title="<?php echo htmlspecialchars(strtolower($article['title'])); ?>" data-excerpt="<?php echo htmlspecialchars(strtolower($article['excerpt'])); ?>">
            <!-- Article Image -->
            <a href="article.php?slug=<?php echo urlencode($slug); ?>" class="blog-card-image-wrap" tabindex="-1" aria-hidden="true">
              <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['image_alt']); ?>" width="600" height="338" loading="lazy">
              <span class="blog-image-overlay-badge <?php echo $article['tag_class']; ?>">
                <?php echo htmlspecialchars($article['category']); ?>
              </span>
            </a>

            <!-- Article Body -->
            <div class="blog-card-content">
              <div class="blog-meta-header">
                <span class="blog-read-time">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                  <?php echo htmlspecialchars($article['read_time']); ?>
                </span>
                <span class="blog-post-date"><?php echo htmlspecialchars($article['date']); ?></span>
              </div>

              <h2 class="blog-card-title">
                <a href="article.php?slug=<?php echo urlencode($slug); ?>">
                  <?php echo htmlspecialchars($article['title']); ?>
                </a>
              </h2>

              <p class="blog-card-excerpt">
                <?php echo htmlspecialchars($article['excerpt']); ?>
              </p>

              <div class="blog-highlights">
                <?php foreach ($article['highlights'] as $highlight): ?>
                  <span class="blog-chip"><?php echo htmlspecialchars($highlight); ?></span>
                <?php endforeach; ?>
              </div>

              <div class="blog-card-footer">
                <a href="article.php?slug=<?php echo urlencode($slug); ?>" class="btn btn-secondary btn-sm" style="width: 100%;">
                  <span>Read Full Article</span>
                  <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <!-- Author Spotlight Banner -->
      <div class="blog-author-box reveal-on-scroll">
        <div class="author-avatar-wrap">
          <div class="brand-badge" style="width: 3.5rem; height: 3.5rem; font-size: 1.4rem;">MS</div>
        </div>
        <div class="author-details">
          <h3>Written by <?php echo AUTHOR_NAME; ?></h3>
          <p class="author-bio">
            <?php echo AUTHOR_ROLE; ?> based in <?php echo AUTHOR_LOCATION; ?>. Building bespoke, lightning-fast web applications with clean architecture, enterprise-grade security, and local SEO dominance.
          </p>
          <div class="author-actions">
            <a href="index.php#contact" class="btn btn-primary btn-sm">Start a Conversation</a>
            <a href="<?php echo INSTAGRAM_URL; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-sm">Instagram (@websites_ms)</a>
          </div>
        </div>
      </div>

    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
