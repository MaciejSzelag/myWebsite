<?php
/**
 * Maciej Szeląg — Web Development Portfolio & Blog
 * Application Configuration & Data Store
 */

// Site Configuration
define('SITE_NAME', 'Maciej Szeląg');
define('SITE_TAGLINE', 'Web Developer Plymouth, Devon & Cornwall | Bespoke High-Performance Websites');
define('SITE_URL', 'https://maciejszelag.co.uk');
define('AUTHOR_NAME', 'Maciej Szeląg');
define('AUTHOR_ROLE', 'Web Developer & Software Development Student');
define('AUTHOR_LOCATION', 'Plymouth, Devon, UK');
define('INSTAGRAM_URL', 'https://www.instagram.com/websites_ms/');

// Technical Articles Data Store (English Only as requested)
$blog_articles = [
    'web-security-essentials' => [
        'id' => 1,
        'slug' => 'web-security-essentials',
        'category' => 'Cybersecurity',
        'category_tag' => 'Cybersecurity · Web Architecture',
        'tag_class' => 'tag-security',
        'title' => 'Securing Modern Web Apps: Essential Defenses for Growing Businesses',
        'subtitle' => 'Proactive cyber defense, anti-bot architecture, and zero-trust engineering for small and medium enterprises.',
        'date' => 'October 2026',
        'read_time' => '6 min read',
        'image' => 'assets/blog_security.jpg',
        'image_alt' => 'Cybersecurity and web development glowing digital shield and code protection matrix',
        'excerpt' => 'Why automated scrapers, credential stuffers, and zero-day vulnerabilities target small businesses more than ever — and the practical security architecture required to protect user data without frustrating real human clients.',
        'highlights' => ['Strict CSP & HSTS', 'Anti-Bot Obfuscation', 'Zero Bloated Plugins', 'XSS & Injection Shield'],
        'content' => [
            [
                'type' => 'lead',
                'text' => 'A common and dangerous misconception among small and medium-sized business owners is believing that cybercriminals exclusively target multinational corporations or banks. In the modern web ecosystem, automated threat actors rarely seek individual targets manually. Instead, they deploy distributed botnets that crawl millions of IP addresses 24/7, actively probing for unpatched plugins, exposed forms, and vulnerable client-side scripts.'
            ],
            [
                'type' => 'callout',
                'title' => 'The Hard Reality of SMB Web Threats',
                'text' => 'According to recent cybersecurity industry telemetry, over 43% of all cyberattacks target small businesses, yet fewer than 15% of business websites possess basic application-level defenses against automated scraping, cross-site scripting (XSS), or credential stuffing.'
            ],
            [
                'type' => 'heading',
                'text' => '1. Beyond SSL: The Fallacy of "The Green Padlock"'
            ],
            [
                'type' => 'paragraph',
                'text' => 'While an SSL/TLS certificate (HTTPS) is an indispensable baseline requirement in 2026, it only secures data in transit between the visitor browser and the server. It does nothing to protect your application from malicious DOM injection, client-side data scraping, or cross-site request forgery.'
            ],
            [
                'type' => 'list',
                'items' => [
                    '<strong>Content Security Policy (CSP):</strong> A strict HTTP response header that instructs the browser to execute only whitelisted, verified scripts — effectively neutralizing over 95% of cross-site scripting (XSS) vectors.',
                    '<strong>HTTP Strict Transport Security (HSTS):</strong> Forces modern browsers to establish encrypted TLS tunnels exclusively, eliminating SSL-stripping and man-in-the-middle downgrade attacks.',
                    '<strong>Subresource Integrity (SRI):</strong> Verifies cryptographic hash signatures of third-party assets (such as CDN fonts or analytics), guaranteeing that compromised CDN servers cannot inject rogue JavaScript into your clients\' sessions.'
                ]
            ],
            [
                'type' => 'heading',
                'text' => '2. Intelligent Bot Defense Without User Friction'
            ],
            [
                'type' => 'paragraph',
                'text' => 'Traditional CAPTCHAs that force visitors to decipher distorted street numbers or select traffic lights severely damage conversion rates. Research demonstrates that visible puzzle CAPTCHAs can reduce contact form completions by up to 28%.'
            ],
            [
                'type' => 'paragraph',
                'text' => 'Modern web developers employ non-intrusive, automated bot defenses: cryptographic honeypots, client-side data reconstitution (such as dynamic Base64/ROT13 hydration upon genuine user touch or click), and behavior-based rate limiting. Legitimate visitors enjoy an instantaneous, seamless experience, while automated scraper bots encounter scrambled garbage data.'
            ],
            [
                'type' => 'heading',
                'text' => '3. The Strategic Security Advantage of Custom Vanilla Code'
            ],
            [
                'type' => 'paragraph',
                'text' => 'Every external plugin, widget, or bloated CMS module integrated into a website introduces an unmonitored attack vector. The vast majority of small business security breaches originate from unpatched, abandoned third-party plugins rather than core server vulnerabilities.'
            ],
            [
                'type' => 'paragraph',
                'text' => 'By engineering websites with clean, bespoke semantic HTML5, CSS3, and native JavaScript/PHP, your external attack surface is reduced by over 90%. Lean, hand-crafted code eliminates unnecessary background listeners, guarantees lightning-fast loading speeds, and ensures your clients\' digital interactions remain private and tamper-proof.'
            ],
            [
                'type' => 'callout',
                'title' => 'Executive Takeaway',
                'text' => 'Security is not an add-on or a monthly subscription widget. It is an architectural discipline designed into the very first lines of code. Protecting your digital presence preserves your reputation, improves SEO rankings, and cements customer trust.'
            ]
        ]
    ],
    'pragmatic-ai-for-business' => [
        'id' => 2,
        'slug' => 'pragmatic-ai-for-business',
        'category' => 'Artificial Intelligence',
        'category_tag' => 'Artificial Intelligence · Web Tech',
        'tag_class' => 'tag-ai',
        'title' => 'Pragmatic AI for Modern Websites: Leveraging LLMs & Generative Search',
        'subtitle' => 'How forward-thinking companies prepare their web infrastructure for AI Answer Engines and smart automation.',
        'date' => 'October 2026',
        'read_time' => '7 min read',
        'image' => 'assets/blog_ai.jpg',
        'image_alt' => 'Artificial intelligence in web development and generative search neural network connections',
        'excerpt' => 'How small and medium companies can leverage practical AI today — optimizing local search discovery for AI-driven engines (SearchGPT, Google Gemini), automating customer workflows, and delivering personalized web experiences.',
        'highlights' => ['Generative Engine Opt (GEO)', 'Semantic Schema Graphs', 'Intelligent Triage', 'Performance Trade-offs'],
        'content' => [
            [
                'type' => 'lead',
                'text' => 'Artificial Intelligence has matured beyond experimental novelty into a foundational layer of modern digital business. For small and medium-sized enterprises in 2026, the strategic imperative is no longer wondering if AI will impact their market, but engineering their web presence to thrive in an era where AI agents and Generative Answer Engines mediate how customers find local services.'
            ],
            [
                'type' => 'callout',
                'title' => 'The Search Paradigm Shift',
                'text' => 'Generative AI search platforms (Google Gemini AI Overviews, SearchGPT, Perplexity) do not merely rank links by keywords. They synthesize context from authoritative sources, evaluating structured data, semantic clarity, and verified business facts before citing recommendations.'
            ],
            [
                'type' => 'heading',
                'text' => '1. Generative Engine Optimization (GEO): The Evolution of SEO'
            ],
            [
                'type' => 'paragraph',
                'text' => 'Traditional search engine optimization rewarded keyword density and volume. Generative engines prioritize high information gain and machine-readable context. To guarantee your business is featured in AI-synthesized responses when local customers ask for recommendations, your website architecture must speak the native language of Large Language Models:'
            ],
            [
                'type' => 'list',
                'items' => [
                    '<strong>Multi-Tier Schema.org Graphs:</strong> Structuring rich JSON-LD data for <code>LocalBusiness</code>, <code>AreaServed</code>, exact geo-coordinates, and direct <code>FAQPage</code> entities allows AI crawlers to extract precise answers without ambiguity.',
                    '<strong>Strict Semantic HTML Hierarchy:</strong> Proper use of <code>&lt;article&gt;</code>, <code>&lt;section&gt;</code>, and single <code>&lt;h1&gt;</code> hierarchy ensures AI parsers identify core value propositions rather than scraping navigation chrome.',
                    '<strong>First-Party Proof & Case Data:</strong> Real-world client case studies (such as live projects, verifiable metrics, and testimonials) provide the verifiable trust signals that AI models require prior to citing providers.'
                ]
            ],
            [
                'type' => 'heading',
                'text' => '2. Practical, Friction-Free Business Automation'
            ],
            [
                'type' => 'paragraph',
                'text' => 'Too many businesses mistake "integrating AI" for embedding a generic, irritating floating chatbot that hallucinates unhelpful answers. Pragmatic AI delivers invisible, high-impact utility behind the scenes:'
            ],
            [
                'type' => 'list',
                'items' => [
                    '<strong>Smart Inquiry Triage:</strong> Pre-processing customer inquiries to determine urgency, categorize service needs, and immediately route clients to appropriate booking calendars.',
                    '<strong>Natural Language Local Search:</strong> Allowing visitors to search products or service timetables with conversational inquiries (e.g., "evening Brazilian Jiu-Jitsu classes for beginners in Plymouth") instead of clicking rigid dropdown filters.',
                    '<strong>Intelligent Asset Optimization:</strong> Utilizing modern machine-learning algorithms to compress and deliver next-generation images at sub-second speeds based on visitor device capabilities.'
                ]
            ],
            [
                'type' => 'heading',
                'text' => '3. The Human Balance: Why AI Boilerplate Fails'
            ],
            [
                'type' => 'paragraph',
                'text' => 'The internet has become inundated with shallow, automated AI content that reads like corporate filler. Consumers and search engines alike penalize generic copy. The businesses that dominate their local markets are those that leverage AI for operational speed and architectural precision, while preserving an authentic, human-crafted brand voice.'
            ],
            [
                'type' => 'callout',
                'title' => 'Executive Takeaway',
                'text' => 'Do not chase AI gimmicks. Invest in clean, lightning-fast semantic web architecture that empowers AI search engines to discover your business, while giving human customers an effortless, delightful digital experience.'
            ]
        ]
    ]
];

// Helper to retrieve all articles
function get_all_articles() {
    global $blog_articles;
    return $blog_articles;
}

// Helper to retrieve single article by slug
function get_article_by_slug($slug) {
    global $blog_articles;
    return isset($blog_articles[$slug]) ? $blog_articles[$slug] : null;
}

// Helper to retrieve suggested articles (excluding current slug if provided)
function get_suggested_articles($exclude_slug = null, $limit = 2) {
    global $blog_articles;
    $articles = $blog_articles;
    if ($exclude_slug && isset($articles[$exclude_slug])) {
        unset($articles[$exclude_slug]);
    }
    return array_slice($articles, 0, $limit, true);
}
