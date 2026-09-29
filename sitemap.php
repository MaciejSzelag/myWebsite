<?php
/**
 * Dynamic XML Sitemap Generator
 * Outputs valid XML Sitemap according to Google Search Console standards,
 * including Image and XHTML namespace extensions.
 */
header('Content-Type: application/xml; charset=utf-8');

require_once __DIR__ . '/config.php';

$articles = get_all_articles();
$last_modified_date = date('Y-m-d');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">

  <!-- Homepage (Primary Landing Page) -->
  <url>
    <loc><?php echo SITE_URL; ?>/</loc>
    <lastmod><?php echo $last_modified_date; ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
    <xhtml:link rel="alternate" hreflang="en-GB" href="<?php echo SITE_URL; ?>/"/>
    <xhtml:link rel="alternate" hreflang="pl-PL" href="<?php echo SITE_URL; ?>/"/>
    <xhtml:link rel="alternate" hreflang="x-default" href="<?php echo SITE_URL; ?>/"/>
    <image:image>
      <image:loc><?php echo SITE_URL; ?>/assets/checkmat_live.png</image:loc>
      <image:title>Checkmat BJJ Plymouth - Bespoke Website by Maciej Szeląg</image:title>
      <image:caption>Official live client website designed and developed for Checkmat BJJ Plymouth academy</image:caption>
    </image:image>
  </url>

  <!-- Technical Blog Hub -->
  <url>
    <loc><?php echo SITE_URL; ?>/blog.php</loc>
    <lastmod><?php echo $last_modified_date; ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.85</priority>
    <xhtml:link rel="alternate" hreflang="en-GB" href="<?php echo SITE_URL; ?>/blog.php"/>
    <xhtml:link rel="alternate" hreflang="x-default" href="<?php echo SITE_URL; ?>/blog.php"/>
    <image:image>
      <image:loc><?php echo SITE_URL; ?>/assets/blog_security.jpg</image:loc>
      <image:title>Web Cybersecurity and Architecture Insights</image:title>
    </image:image>
  </url>

  <!-- Individual Technical Publications -->
  <?php foreach ($articles as $slug => $article): ?>
  <url>
    <loc><?php echo SITE_URL; ?>/article.php?slug=<?php echo urlencode($slug); ?></loc>
    <lastmod><?php echo $last_modified_date; ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.80</priority>
    <xhtml:link rel="alternate" hreflang="en-GB" href="<?php echo SITE_URL; ?>/article.php?slug=<?php echo urlencode($slug); ?>"/>
    <xhtml:link rel="alternate" hreflang="x-default" href="<?php echo SITE_URL; ?>/article.php?slug=<?php echo urlencode($slug); ?>"/>
    <image:image>
      <image:loc><?php echo SITE_URL; ?>/<?php echo htmlspecialchars($article['image']); ?></image:loc>
      <image:title><?php echo htmlspecialchars($article['title']); ?></image:title>
      <image:caption><?php echo htmlspecialchars($article['image_alt']); ?></image:caption>
    </image:image>
  </url>
  <?php endforeach; ?>

</urlset>
