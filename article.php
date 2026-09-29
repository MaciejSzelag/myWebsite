<?php
/**
 * Dedicated Full Article Reading Page
 */
require_once __DIR__ . '/config.php';

$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
$article = get_article_by_slug($slug);

// If invalid slug, redirect cleanly to blog hub
if (!$article) {
    header("Location: blog.php");
    exit;
}

$page_title = $article['title'] . ' | ' . AUTHOR_NAME . ' Blog';
$page_desc = $article['excerpt'];
$page_og_image = $article['image'];
$page_canonical = SITE_URL . '/article.php?slug=' . urlencode($article['slug']);
$current_page = 'article';

require_once __DIR__ . '/includes/header.php';

// Find other articles for "Related / Next Article" navigation
$all_articles = get_all_articles();
$other_articles = array_filter($all_articles, function($item) use ($slug) {
    return $item['slug'] !== $slug;
});
$next_article = reset($other_articles);
?>

<main id="main-content">
  <article class="section article-single-section">
    <div class="container article-container">
      
      <!-- Breadcrumbs -->
      <nav class="breadcrumb-bar" aria-label="Breadcrumbs">
        <a href="index.php">Home</a>
        <span class="breadcrumb-sep">/</span>
        <a href="blog.php">Blog</a>
        <span class="breadcrumb-sep">/</span>
        <span class="breadcrumb-current"><?php echo htmlspecialchars($article['category']); ?></span>
      </nav>

      <!-- Article Header -->
      <header class="article-hero-header reveal-on-scroll">
        <div class="article-meta-row">
          <span class="blog-tag <?php echo $article['tag_class']; ?>">
            <?php echo htmlspecialchars($article['category_tag']); ?>
          </span>
          <span class="blog-read-time">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            <?php echo htmlspecialchars($article['read_time']); ?>
          </span>
          <span class="blog-post-date"><?php echo htmlspecialchars($article['date']); ?></span>
        </div>

        <h1 class="article-main-title">
          <?php echo htmlspecialchars($article['title']); ?>
        </h1>

        <p class="article-main-subtitle">
          <?php echo htmlspecialchars($article['subtitle']); ?>
        </p>

        <!-- Author Byline -->
        <div class="article-byline">
          <div class="byline-avatar">MS</div>
          <div class="byline-info">
            <div class="byline-name"><?php echo AUTHOR_NAME; ?></div>
            <div class="byline-role"><?php echo AUTHOR_ROLE; ?> · <?php echo AUTHOR_LOCATION; ?></div>
          </div>
        </div>
      </header>

      <!-- Featured Image Display -->
      <div class="article-cover-wrap reveal-on-scroll">
        <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['image_alt']); ?>" width="1200" height="675" class="article-cover-img">
        <div class="article-cover-caption">
          <span><?php echo htmlspecialchars($article['image_alt']); ?></span>
        </div>
      </div>

      <!-- Article Main Content Stream -->
      <div class="article-content-body reveal-on-scroll">
        <?php foreach ($article['content'] as $block): ?>
          <?php if ($block['type'] === 'lead'): ?>
            <p class="article-lead-text"><?php echo $block['text']; ?></p>
          <?php elseif ($block['type'] === 'heading'): ?>
            <h2><?php echo htmlspecialchars($block['text']); ?></h2>
          <?php elseif ($block['type'] === 'paragraph'): ?>
            <p><?php echo $block['text']; ?></p>
          <?php elseif ($block['type'] === 'callout'): ?>
            <div class="article-callout-box">
              <div class="callout-icon">💡</div>
              <div>
                <h4><?php echo htmlspecialchars($block['title']); ?></h4>
                <p><?php echo $block['text']; ?></p>
              </div>
            </div>
          <?php elseif ($block['type'] === 'list'): ?>
            <ul class="article-bullet-list">
              <?php foreach ($block['items'] as $item): ?>
                <li><?php echo $item; ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <!-- Article Action & Sharing Bar -->
      <div class="article-action-bar reveal-on-scroll">
        <a href="blog.php" class="btn btn-secondary btn-sm">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
          <span>Back to All Articles</span>
        </a>

        <button type="button" id="copy-article-link-btn" class="btn btn-secondary btn-sm" aria-label="Copy article link to clipboard">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
          <span>Copy Article Link</span>
        </button>
      </div>

      <!-- Next Article Recommendation -->
      <?php if ($next_article): ?>
        <div class="next-article-box reveal-on-scroll">
          <div class="next-article-label">Next Recommended Article</div>
          <div class="next-article-card">
            <img src="<?php echo htmlspecialchars($next_article['image']); ?>" alt="<?php echo htmlspecialchars($next_article['image_alt']); ?>" width="200" height="112" class="next-article-thumb">
            <div>
              <span class="blog-tag <?php echo $next_article['tag_class']; ?>" style="font-size: 0.72rem; padding: 0.2rem 0.5rem;">
                <?php echo htmlspecialchars($next_article['category']); ?>
              </span>
              <h3 style="font-size: 1.15rem; margin-block: 0.4rem; color: var(--text-white);">
                <a href="article.php?slug=<?php echo urlencode($next_article['slug']); ?>">
                  <?php echo htmlspecialchars($next_article['title']); ?>
                </a>
              </h3>
              <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.5;">
                <?php echo htmlspecialchars($next_article['excerpt']); ?>
              </p>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <!-- Bottom Consultation CTA -->
      <div class="article-cta-box reveal-on-scroll">
        <h3>Need High-Performance Architecture for Your Business?</h3>
        <p>Whether you need to harden your existing web app against automated threats or build a bespoke, fast-loading platform engineered for AI search discovery, I work directly with you.</p>
        <a href="index.php#contact" class="btn btn-primary">
          <span>Start a Direct Conversation</span>
          <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
      </div>

    </div>
  </article>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
