<?php
/**
 * Local PHP Built-in Server Router
 * Enables clean routing, sitemap, robots, and custom 404 handler for local testing.
 */
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$filePath = __DIR__ . $uri;

// 1. Static file check (CSS, JS, PNG, JPG, WEBP, SVG, ICO, Manifest, Robots)
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    // Deliver appropriate Content-Type for specific static files if needed
    if (str_ends_with($uri, '.webmanifest')) {
        header('Content-Type: application/manifest+json');
    } elseif (str_ends_with($uri, '.svg')) {
        header('Content-Type: image/svg+xml');
    }
    return false;
}

// 2. Specific System Handlers
if ($uri === '/sitemap.xml') {
    require __DIR__ . '/sitemap.php';
    exit;
}

if ($uri === '/robots.txt') {
    header('Content-Type: text/plain; charset=utf-8');
    readfile(__DIR__ . '/robots.txt');
    exit;
}

// 3. Application Core Routes
if ($uri === '/' || $uri === '/index' || $uri === '/index.php') {
    require __DIR__ . '/index.php';
    exit;
}

if ($uri === '/blog' || $uri === '/blog.php') {
    require __DIR__ . '/blog.php';
    exit;
}

if ($uri === '/article' || $uri === '/article.php') {
    require __DIR__ . '/article.php';
    exit;
}

if ($uri === '/404' || $uri === '/404.php') {
    require __DIR__ . '/404.php';
    exit;
}

// 4. Any other non-existent route -> 404
http_response_code(404);
require __DIR__ . '/404.php';
exit;
