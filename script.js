/**
 * Maciej Szeląg — Modern Web Developer Portfolio
 * Production-ready Vanilla JavaScript
 * Features: Bot-protected contact disclosure, Mobile Menu Drawer,
 * FAQ Accordion, Coverage Filter, Bilingual Switcher (EN/PL), Scroll Spy,
 * Interactive Technical Blog Reader Modal, and Toast Notifications.
 */

document.addEventListener('DOMContentLoaded', () => {
  let currentLang = 'en';

  // ------------------------------------------------------------------------
  // 1. Anti-Bot Obfuscation Engine for Contact Info
  // ------------------------------------------------------------------------
  const _c = {
    // 07877320658
    pParts: ['MDc4Nzc=', 'MzIwNjU4'], 
    pDisplay: '+44 7877 320658',
    pRaw: '07877320658',
    // maciej_szelag@outlook.com
    eUser: 'bWFjaWVqX3N6ZWxhZw==',
    eDomain: 'b3V0bG9vay5jb20='
  };

  const decodeB64 = (str) => {
    try {
      return atob(str);
    } catch (e) {
      return '';
    }
  };

  const getPhone = () => {
    return decodeB64(_c.pParts[0]) + decodeB64(_c.pParts[1]);
  };

  const getEmail = () => {
    return decodeB64(_c.eUser) + '@' + decodeB64(_c.eDomain);
  };

  let phoneRevealed = false;
  let emailRevealed = false;

  const phoneValueEl = document.getElementById('phone-display');
  const emailValueEl = document.getElementById('email-display');
  const callBtn = document.getElementById('call-btn');
  const emailBtn = document.getElementById('email-btn');
  const copyPhoneBtn = document.getElementById('copy-phone-btn');
  const copyEmailBtn = document.getElementById('copy-email-btn');

  // Reveal or call phone
  if (callBtn) {
    callBtn.addEventListener('click', () => {
      const fullPhone = getPhone();
      if (!phoneRevealed) {
        phoneRevealed = true;
        if (phoneValueEl) {
          phoneValueEl.textContent = _c.pDisplay;
          phoneValueEl.classList.add('revealed');
        }
        callBtn.setAttribute('href', 'tel:' + fullPhone);
        showToast(currentLang === 'pl' ? 'Numer telefonu odsłonięty!' : 'Phone number revealed!');
      } else {
        window.location.href = 'tel:' + fullPhone;
      }
    });
  }

  // Copy phone number
  if (copyPhoneBtn) {
    copyPhoneBtn.addEventListener('click', () => {
      const fullPhone = getPhone();
      navigator.clipboard.writeText(fullPhone).then(() => {
        showToast(currentLang === 'pl' ? 'Skopiowano numer do schowka!' : 'Phone number copied to clipboard!');
        if (phoneValueEl && !phoneRevealed) {
          phoneRevealed = true;
          phoneValueEl.textContent = _c.pDisplay;
        }
      }).catch(() => {
        copyFallback(fullPhone, currentLang === 'pl' ? 'Skopiowano numer do schowka!' : 'Phone number copied!');
      });
    });
  }

  // Reveal or open mail client
  if (emailBtn) {
    emailBtn.addEventListener('click', () => {
      const fullEmail = getEmail();
      if (!emailRevealed) {
        emailRevealed = true;
        if (emailValueEl) {
          emailValueEl.textContent = fullEmail;
          emailValueEl.classList.add('revealed');
        }
        emailBtn.setAttribute('href', 'mailto:' + fullEmail);
        showToast(currentLang === 'pl' ? 'Adres e-mail odsłonięty!' : 'Email address revealed!');
      } else {
        window.location.href = 'mailto:' + fullEmail;
      }
    });
  }

  // Copy email address
  if (copyEmailBtn) {
    copyEmailBtn.addEventListener('click', () => {
      const fullEmail = getEmail();
      navigator.clipboard.writeText(fullEmail).then(() => {
        showToast(currentLang === 'pl' ? 'Skopiowano e-mail do schowka!' : 'Email copied to clipboard!');
        if (emailValueEl && !emailRevealed) {
          emailRevealed = true;
          emailValueEl.textContent = fullEmail;
        }
      }).catch(() => {
        copyFallback(fullEmail, currentLang === 'pl' ? 'Skopiowano e-mail do schowka!' : 'Email copied!');
      });
    });
  }

  function copyFallback(text, successMsg) {
    const tempInput = document.createElement('input');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    showToast(successMsg);
  }

  // ------------------------------------------------------------------------
  // 2. Toast Notification
  // ------------------------------------------------------------------------
  const toast = document.getElementById('toast-notice');
  const toastMsg = document.getElementById('toast-message');
  let toastTimer = null;

  function showToast(message) {
    if (!toast || !toastMsg) return;
    toastMsg.textContent = message;
    toast.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => {
      toast.classList.remove('show');
    }, 2800);
  }

  // ------------------------------------------------------------------------
  // 3. Mobile Navigation Drawer & Hamburger
  // ------------------------------------------------------------------------
  const menuToggle = document.getElementById('menu-toggle');
  const mobileNav = document.getElementById('mobile-nav');
  const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

  function toggleMobileMenu(forceClose = false) {
    if (!menuToggle || !mobileNav) return;
    const isOpen = forceClose ? false : !menuToggle.classList.contains('open');
    
    if (isOpen) {
      menuToggle.classList.add('open');
      menuToggle.setAttribute('aria-expanded', 'true');
      mobileNav.classList.add('open');
      mobileNav.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    } else {
      menuToggle.classList.remove('open');
      menuToggle.setAttribute('aria-expanded', 'false');
      mobileNav.classList.remove('open');
      mobileNav.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }
  }

  if (menuToggle) {
    menuToggle.addEventListener('click', () => toggleMobileMenu());
  }

  mobileNavLinks.forEach(link => {
    link.addEventListener('click', () => toggleMobileMenu(true));
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      if (menuToggle && menuToggle.classList.contains('open')) {
        toggleMobileMenu(true);
      }
      closeArticleModal();
    }
  });

  // ------------------------------------------------------------------------
  // 4. Header Scroll Style & Scroll Spy
  // ------------------------------------------------------------------------
  const header = document.querySelector('.site-header');
  const sections = document.querySelectorAll('section[id]');
  const desktopLinks = document.querySelectorAll('.desktop-nav .nav-link');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 30) {
      header?.classList.add('scrolled');
    } else {
      header?.classList.remove('scrolled');
    }

    let currentId = '';
    const scrollPos = window.scrollY + 200;

    sections.forEach(section => {
      const top = section.offsetTop;
      const height = section.offsetHeight;
      if (scrollPos >= top && scrollPos < top + height) {
        currentId = section.getAttribute('id');
      }
    });

    desktopLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === `#${currentId}`) {
        link.classList.add('active');
      }
    });
  }, { passive: true });

  // ------------------------------------------------------------------------
  // 5. Interactive FAQ Accordion
  // ------------------------------------------------------------------------
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach(item => {
    const trigger = item.querySelector('.faq-trigger');
    const panel = item.querySelector('.faq-panel');

    if (!trigger || !panel) return;

    trigger.addEventListener('click', () => {
      const isActive = item.classList.contains('active');

      faqItems.forEach(otherItem => {
        if (otherItem !== item) {
          otherItem.classList.remove('active');
          const otherTrigger = otherItem.querySelector('.faq-trigger');
          const otherPanel = otherItem.querySelector('.faq-panel');
          if (otherTrigger) otherTrigger.setAttribute('aria-expanded', 'false');
          if (otherPanel) otherPanel.style.maxHeight = null;
        }
      });

      if (!isActive) {
        item.classList.add('active');
        trigger.setAttribute('aria-expanded', 'true');
        panel.style.maxHeight = panel.scrollHeight + 'px';
      } else {
        item.classList.remove('active');
        trigger.setAttribute('aria-expanded', 'false');
        panel.style.maxHeight = null;
      }
    });
  });

  // ------------------------------------------------------------------------
  // 6. Regional Coverage Filter Tabs
  // ------------------------------------------------------------------------
  const tabBtns = document.querySelectorAll('.tab-btn');
  const coverageCards = document.querySelectorAll('.coverage-card');

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetRegion = btn.dataset.region;

      tabBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      coverageCards.forEach(card => {
        const cardRegion = card.dataset.region;
        if (targetRegion === 'all' || cardRegion === targetRegion) {
          card.style.display = 'flex';
          setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
          }, 10);
        } else {
          card.style.opacity = '0';
          card.style.transform = 'translateY(10px)';
          setTimeout(() => {
            card.style.display = 'none';
          }, 250);
        }
      });
    });
  });

  // ------------------------------------------------------------------------
  // 7. Technical Blog Articles & Modal Reader
  // ------------------------------------------------------------------------
  const articlesData = {
    security: {
      tag: "Cybersecurity & Web Architecture",
      tagClass: "tag-security",
      date: "October 2026 · 6 min read",
      author: "Maciej Szeląg",
      title: "Securing Modern Web Apps: Essential Defenses for Growing Businesses",
      content: `
        <p>A common misconception among small and medium-sized business owners is believing that cyber criminals only target global corporations. In reality, modern automated threat actors rarely seek individual high-profile targets manually — they deploy automated bots that scan the entire internet 24/7 for vulnerabilities in unmaintained templates, outdated plugins, and insecure client-side implementations.</p>
        
        <div class="key-takeaway-box">
          <strong>Key Insight:</strong> Over 43% of automated cyber attacks target small businesses, yet less than 15% of SMB websites have adequate defenses against automated scraping, cross-site scripting, and credential stuffing.
        </div>

        <h3>1. Moving Beyond Generic Passwords & Basic SSL</h3>
        <p>While an SSL certificate (HTTPS) is a mandatory baseline today, it simply encrypts transit between the user and your server. It does not prevent data exfiltration, DOM injection, or malicious bot harvesting. True website security requires multi-layered application-level hardening:</p>
        <ul>
          <li><strong>Content Security Policy (CSP):</strong> Enforcing strict CSP headers prevents unauthorized third-party scripts from executing malicious code or intercepting user interactions.</li>
          <li><strong>HTTP Strict Transport Security (HSTS):</strong> Guarantees that browsers never communicate over insecure, unencrypted HTTP protocols.</li>
          <li><strong>Cross-Site Scripting (XSS) Sanitization:</strong> Strict encoding and escaping of any dynamic data rendered on the screen.</li>
        </ul>

        <h3>2. Bot Protection Without Ruining User Experience</h3>
        <p>Traditional CAPTCHAs with frustrating image puzzles cause up to a 30% drop in user conversions. Modern web engineering solves this using intelligent, invisible bot defenses: client-side obfuscation (such as Base64/ROT13 data reconstitution), cryptographic honeypots, and token-based rate limiting. Legitimate visitors browse effortlessly, while automated harvesters see only randomized noise.</p>

        <h3>3. The Security Advantage of Custom Vanilla Architecture</h3>
        <p>Websites built with dozens of third-party plugins (e.g. bloated WordPress installs) create a massive attack surface: every plugin is a potential zero-day vulnerability waiting to be exploited. By building websites with clean, bespoke semantic code, your attack surface shrinks by over 90%, ensuring bulletproof stability and protecting client trust.</p>

        <div class="key-takeaway-box">
          <strong>Summary Takeaway:</strong> Security is not a plugin you install at the end — it is an architectural foundation engineered into the very first lines of HTML, CSS, and JavaScript.
        </div>
      `
    },
    ai: {
      tag: "Artificial Intelligence & Web Engineering",
      tagClass: "tag-ai",
      date: "October 2026 · 7 min read",
      author: "Maciej Szeląg",
      title: "Pragmatic AI for Modern Websites: Leveraging LLMs & Generative Search",
      content: `
        <p>Artificial Intelligence is undergoing a massive shift from experimental hype into pragmatic, conversion-driving web infrastructure. For small and medium businesses in 2026, the question is no longer whether AI will affect their market, but how quickly their website can adapt to the era of Generative Search and intelligent automated workflows.</p>

        <div class="key-takeaway-box">
          <strong>The Shift in Search:</strong> Generative AI engines (Google Gemini AI Overviews, SearchGPT, Perplexity) do not just match keywords; they evaluate semantic context, domain authority, and structured data to synthesize direct answers for users.
        </div>

        <h3>1. Optimizing for Generative Engine Optimization (GEO)</h3>
        <p>Traditional SEO focused on keyword density and backlink volume. Modern GEO requires websites to be structured so Large Language Models can easily parse, verify, and cite your business as the authoritative local provider:</p>
        <ul>
          <li><strong>Rich Schema.org Hierarchies:</strong> Providing explicit JSON-LD graph models for LocalBusiness, Service, AreaServed, and FAQ enables AI engines to answer user prompts with your exact pricing, schedules, and service areas.</li>
          <li><strong>Semantic HTML5 Structure:</strong> Proper landmark hierarchy (<code>h1</code>, <code>article</code>, <code>section</code>) allows AI scrapers to ingest high-value content with zero ambiguity.</li>
          <li><strong>High Information Gain:</strong> AI models prioritize first-party expertise and tangible client results over generic filler copy.</li>
        </ul>

        <h3>2. Practical Client-Facing AI Integrations</h3>
        <p>Rather than slapping an intrusive generic chat widget onto a page, forward-thinking businesses implement targeted, lightweight AI features:</p>
        <ul>
          <li><strong>Smart Inquiry Triage:</strong> Analyzing customer inquiries in real time to categorize urgency and recommend ideal appointment slots or quotes instantly.</li>
          <li><strong>Dynamic Semantic Search:</strong> Allowing visitors to search products or services using natural questions (e.g., "beginner classes on Tuesday evenings in Plymouth") rather than rigid filters.</li>
          <li><strong>Automated Multimodal Previews:</strong> Instant generation of personalized mockups or service estimates.</li>
        </ul>

        <h3>3. The Golden Rule: AI as an Accelerator, Not a Replacement for Craft</h3>
        <p>The internet is flooded with generic, bland AI-generated text. Websites that win in search and convert visitors into paying clients are those that combine clean, human-crafted brand voice with raw software engineering performance. Fast load times, bespoke aesthetics, and verified technical authority will always beat automated boilerplate.</p>

        <div class="key-takeaway-box">
          <strong>Summary Takeaway:</strong> Use AI to eliminate friction, automate workflows, and dominate generative search — while keeping your website lightning-fast and genuinely authentic to your brand.
        </div>
      `
    }
  };

  // Article Modal Helpers (Supports index.html modal and provides graceful fallbacks)
  const articleModal = document.getElementById('article-modal');
  const modalTag = document.getElementById('modal-tag');
  const modalDate = document.getElementById('modal-date');
  const modalTitle = document.getElementById('modal-title');
  const modalBody = document.getElementById('modal-body');
  const modalCloseBtn = document.getElementById('modal-close-btn');

  function openArticleModal(key) {
    if (!articleModal || !articlesData[key]) return;
    const data = articlesData[key];
    if (modalTag) {
      modalTag.textContent = data.tag;
      modalTag.className = 'blog-tag ' + data.tagClass;
    }
    if (modalDate) modalDate.textContent = data.date;
    if (modalTitle) modalTitle.textContent = data.title;
    if (modalBody) modalBody.innerHTML = data.content;
    articleModal.classList.add('active');
    articleModal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }

  function closeArticleModal() {
    if (!articleModal) return;
    articleModal.classList.remove('active');
    articleModal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  if (modalCloseBtn) {
    modalCloseBtn.addEventListener('click', closeArticleModal);
  }

  if (articleModal) {
    articleModal.addEventListener('click', (e) => {
      if (e.target === articleModal) {
        closeArticleModal();
      }
    });
  }

  const readModalBtns = document.querySelectorAll('[data-article-key]');
  readModalBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      openArticleModal(btn.dataset.articleKey);
    });
  });

  // ------------------------------------------------------------------------
  // 7. Blog Page Filtering & Search Controls (blog.php & article.php)
  // ------------------------------------------------------------------------
  const blogTabBtns = document.querySelectorAll('.blog-tab-btn');
  const blogCards = document.querySelectorAll('.blog-article-card');
  const blogSearchInput = document.getElementById('blog-search-input');
  let currentCategory = 'all';

  function filterBlogArticles() {
    const query = blogSearchInput ? blogSearchInput.value.trim().toLowerCase() : '';

    blogCards.forEach(card => {
      const category = card.dataset.category || '';
      const title = card.dataset.title || '';
      const excerpt = card.dataset.excerpt || '';

      const matchesCat = (currentCategory === 'all') || (category === currentCategory);
      const matchesSearch = !query || title.includes(query) || excerpt.includes(query);

      if (matchesCat && matchesSearch) {
        card.style.display = 'flex';
        setTimeout(() => {
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        }, 10);
      } else {
        card.style.opacity = '0';
        card.style.transform = 'translateY(10px)';
        setTimeout(() => {
          card.style.display = 'none';
        }, 200);
      }
    });
  }

  blogTabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      blogTabBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      currentCategory = btn.dataset.filter;
      filterBlogArticles();
    });
  });

  if (blogSearchInput) {
    blogSearchInput.addEventListener('input', () => {
      filterBlogArticles();
    });
  }

  // Copy Article Link (article.php)
  const copyArticleLinkBtn = document.getElementById('copy-article-link-btn');
  if (copyArticleLinkBtn) {
    copyArticleLinkBtn.addEventListener('click', () => {
      navigator.clipboard.writeText(window.location.href).then(() => {
        showToast(currentLang === 'pl' ? 'Link do artykułu skopiowany!' : 'Article link copied to clipboard!');
      }).catch(() => {
        copyFallback(window.location.href, currentLang === 'pl' ? 'Link skopiowany!' : 'Article link copied!');
      });
    });
  }

  // ------------------------------------------------------------------------
  // 8. Progressive Scroll Reveal Observer
  // ------------------------------------------------------------------------
  const revealElements = document.querySelectorAll('.reveal-on-scroll');

  if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          entry.target.classList.remove('will-reveal');
          obs.unobserve(entry.target);
        }
      });
    }, {
      root: null,
      threshold: 0.05,
      rootMargin: '0px 0px 50px 0px'
    });

    revealElements.forEach(el => {
      const rect = el.getBoundingClientRect();
      // Only elements below the viewport are queued for smooth reveal
      if (rect.top > window.innerHeight) {
        el.classList.add('will-reveal');
        observer.observe(el);
      } else {
        el.classList.add('revealed');
      }
    });
  } else {
    revealElements.forEach(el => el.classList.add('revealed'));
  }

  // ------------------------------------------------------------------------
  // 9. Bilingual Switcher (EN / PL)
  // (Blog articles remain in English as requested: "w jezyku angielskim tylko blog")
  // ------------------------------------------------------------------------
  const translations = {
    en: {
      navWork: "Work",
      navWhy: "Why Me",
      navAbout: "About",
      navCoverage: "Coverage",
      navBlog: "Blog",
      navFaq: "FAQ",
      navContact: "Let's Talk",
      heroBadge: "Available for new projects · 📍 Plymouth, UK & Remote",
      heroTitle: "Crafting <span class=\"gradient-text\">High-Performance Websites</span> for Growing Businesses.",
      heroLead: "Hi, I'm <strong>Maciej Szeląg</strong> — a web developer based in Plymouth, UK and a Software Development student. I build bespoke, fast, and high-converting websites designed to turn visitors into loyal customers for small and medium businesses.",
      heroBtnWork: "View Featured Work",
      heroBtnContact: "Get in Touch",
      chipMobile: "100% Mobile-First Experience",
      chipSpeed: "Fast & Conversion-Optimized",
      chipLocal: "Plymouth, Devon, Cornwall & UK",
      metricMobileTitle: "Mobile-First UX",
      metricMobileSub: "Flawless on all screen sizes",
      metricSpeedTitle: "Google Lighthouse",
      metricSpeedSub: "Sub-second load times",
      metricBespokeTitle: "Bespoke Code",
      metricBespokeSub: "Zero bloated page builders",
      metricSeoTitle: "Local SEO Ready",
      metricSeoSub: "Plymouth, Devon & UK-wide",
      workBadge: "Latest Featured Work",
      workTitle: "Checkmat BJJ Plymouth",
      workSubtitle: "Official Academy Website & Member Hub",
      workTagLive: "Live Client Project",
      workTagGym: "Martial Arts & Fitness",
      workDesc: "A dynamic, high-performance website built for Plymouth's premier Brazilian Jiu-Jitsu academy. Designed to establish an elite digital presence, clarify class schedules, and drive free trial class bookings for adults, juniors, and kids.",
      workBullet1Title: "Clear Timetables & Schedules",
      workBullet1Desc: "Effortless access to fundamentals, advanced, and open mat training sessions.",
      workBullet2Title: "Free Trial Onboarding",
      workBullet2Desc: "Streamlined calls-to-action that guide new students directly to gym signups.",
      workBullet3Title: "Flawless Performance",
      workBullet3Desc: "Rapid loading times and seamless responsive layout on all smartphones and laptops.",
      workBtnVisit: "Visit bjjplymouth.co.uk",
      whyBadge: "Value For Your Business",
      whyTitle: "Why Small & Medium Businesses Choose To Work With Me",
      whySubtitle: "Your website is your best salesperson. Here is how I help your business stand out, gain trust, and thrive online.",
      benefit1Title: "Bespoke Modern Design",
      benefit1Desc: "No generic, clunky templates. Your website is custom-crafted to mirror your business's quality, commanding authority in your industry.",
      benefit2Title: "Conversion & Growth Focus",
      benefit2Desc: "Visually stunning is only half the battle. Every button, section, and headline is structured to guide visitors into calling, booking, or buying.",
      benefit3Title: "Lightning-Fast Speed",
      benefit3Desc: "Visitors leave slow sites within 3 seconds. My websites are lightweight, optimized, and load instantaneously on mobile networks.",
      benefit4Title: "Search & Local Visibility",
      benefit4Desc: "Engineered with modern semantic standards so local clients in Plymouth, Devon, Cornwall, or major UK cities easily find you on Google.",
      aboutBadge: "About Me",
      aboutTitle: "Merging Clean Digital Aesthetics with Solid Software Engineering.",
      aboutBio1: "I am a web developer living in Plymouth, Devon, UK. I partner directly with small and medium business owners who want to elevate their brand and win more clients online without dealing with complicated agencies or impersonal freelancers.",
      aboutBio2: "I believe every company deserves an online home that reflects their true standard of work — fast, elegant, and effortlessly easy for clients to navigate.",
      pillar1Title: "Software Development Student",
      pillar1Desc: "Pursuing academic studies in software development gives me a rigorous foundation in clean architecture, performance optimization, and problem solving that goes far beyond surface-level web design.",
      pillar2Title: "Based in Plymouth, Devon (UK)",
      pillar2Desc: "Available for face-to-face meetings in Plymouth and across the South West, as well as seamlessly delivering projects remotely for businesses across the UK and internationally.",
      stackTitle: "Technical Expertise & Standards",
      coverageBadge: "Local & UK-Wide Coverage",
      coverageTitle: "Serving Businesses Across Plymouth, Devon, Cornwall & Major UK Hubs",
      coverageSubtitle: "Delivering dedicated local expertise and high-performance websites for ambitious businesses throughout the South West and nationwide.",
      tabAll: "All Areas",
      tabPlymouth: "Plymouth & Surrounds",
      tabDevon: "Devon County",
      tabCornwall: "Cornwall County",
      tabUK: "Major UK Cities",
      cov1Title: "Plymouth & Surrounds",
      cov1Desc: "Direct local partnership for businesses across Plymouth city centre, Barbican, Plympton, Plymstock, and Dartmoor gateway towns.",
      cov2Title: "Devon County",
      cov2Desc: "High-converting websites for businesses in Exeter, Torbay, South Hams, Tavistock, and commercial hubs across Devon.",
      cov3Title: "Cornwall County",
      cov3Desc: "Supporting thriving independent businesses and trades in Saltash, Truro, Newquay, Falmouth, St Austell, and throughout Cornwall.",
      cov4Title: "Major UK Cities & Remote",
      cov4Desc: "Collaborating seamlessly with companies in London, Manchester, Birmingham, Bristol, Leeds, and nationwide across the UK.",
      blogBadge: "Technical Insights & Articles",
      blogTitle: "Engineering, Security & Emerging AI in Web Tech",
      blogSubtitle: "Deep-dives into modern web architecture, proactive cyber defense, and practical AI implementations for forward-thinking businesses.",
      blogNotice: "Articles published in English",
      faqBadge: "Local FAQ",
      faqTitle: "Frequently Asked Questions",
      faqSubtitle: "Everything you need to know about getting a bespoke website built in Plymouth, Devon, Cornwall, and across the UK.",
      faqQ1: "Do you work with businesses across Devon and Cornwall?",
      faqA1: "Yes! While I am based in Plymouth, I partner with small and medium enterprises throughout all surrounding counties, including Exeter, Torbay, Saltash, Truro, Newquay, and across South West England.",
      faqQ2: "Do you build websites for businesses in London, Manchester, Bristol, and across the UK?",
      faqA2: "Absolutely. With modern remote collaboration tools, video calls, and asynchronous milestones, I deliver high-performance websites for clients in London, Manchester, Birmingham, Bristol, Leeds, and throughout the UK.",
      faqQ3: "Can we meet in person in Plymouth or the South West?",
      faqA3: "Yes, I regularly meet clients in Plymouth (city centre, Barbican, Royal William Yard) and across Devon for project kickoff discussions and design consultations.",
      faqQ4: "How does a custom website help my business rank locally on Google?",
      faqA4: "Unlike bloated template builders, custom code provides clean semantic HTML5, sub-second Core Web Vitals, localized Schema.org microdata, and fast mobile rendering — key signals Google rewards for local search rankings.",
      faqQ5: "What types of small and medium businesses do you build for?",
      faqA5: "I build bespoke websites for fitness academies, trades, professional services, hospitality, local retailers, clinics, and startups looking to convert visitors into inquiries and paying customers.",
      contactBadge: "Start A Conversation",
      contactTitle: "Ready to Elevate Your Business Online?",
      contactSubtitle: "Whether you need a brand-new website or a total redesign of your existing page, reach out directly. No complicated forms — just direct communication.",
      securityText: "Bot-Protected Direct Channels · No Automated Spam",
      phoneLabel: "Direct Phone / WhatsApp",
      callBtnText: "Call / Reveal",
      copyBtnText: "Copy",
      emailLabel: "Direct Email Address",
      emailBtnText: "Email / Reveal",
      instagramText: "Connect on Instagram",
      locationText: "Based in Plymouth, Devon, UK",
      error404Badge: "Error 404 · Page Not Found",
      error404Title: "Lost in Cyberspace? <span class=\"gradient-text\">Page Not Found</span>",
      error404Lead: "The URL you entered might be mistyped, moved, or deleted. Don't worry — choose a destination below to get back on track.",
      error404BtnHome: "Back to Homepage",
      error404BtnWork: "Featured Work",
      error404BtnContact: "Contact Maciej",
      error404Suggested: "Or explore these technical publications:"
    },
    pl: {
      navWork: "Realizacje",
      navWhy: "Dlaczego ja",
      navAbout: "O mnie",
      navCoverage: "Zasięg",
      navBlog: "Blog",
      navFaq: "FAQ",
      navContact: "Porozmawiajmy",
      heroBadge: "Dostępny do nowych projektów · 📍 Plymouth, UK & Zdalnie",
      heroTitle: "Nowoczesne, <span class=\"gradient-text\">Szybkie Strony WWW</span> dla Rozwijających się Firm.",
      heroLead: "Cześć, jestem <strong>Maciej Szeląg</strong> — web developer mieszkający w Plymouth w Wielkiej Brytanii i student Software Development. Tworzę dedykowane, błyskawiczne i nastawione na konwersję strony www, które zamieniają odwiedzających w lojalnych klientów.",
      heroBtnWork: "Zobacz Realizacje",
      heroBtnContact: "Skontaktuj się",
      chipMobile: "100% Podejście Mobile-First",
      chipSpeed: "Szybkość i Optymalizacja Konwersji",
      chipLocal: "Plymouth, Devon, Kornwalia i całe UK",
      metricMobileTitle: "Mobile-First UX",
      metricMobileSub: "Perfekcyjne na każdym smartfonie",
      metricSpeedTitle: "Google Lighthouse",
      metricSpeedSub: "Ładowanie poniżej sekundy",
      metricBespokeTitle: "Autorski Kod",
      metricBespokeSub: "Zero ociężałych kreatorów",
      metricSeoTitle: "Gotowe na Lokalne SEO",
      metricSeoSub: "Plymouth, Devon i całe UK",
      workBadge: "Wyróżniony Projekt",
      workTitle: "Checkmat BJJ Plymouth",
      workSubtitle: "Oficjalna Strona Akademii & Centrum Klubowicza",
      workTagLive: "Projekt Wdrożony",
      workTagGym: "Sztuki Walki & Fitness",
      workDesc: "Dynamiczna, wydajna strona www zbudowana dla czołowej akademii Brazilian Jiu-Jitsu w Plymouth. Zaprojektowana, by zbudować silną pozycję online, uporządkować grafik zajęć i generować zapisy na bezpłatny trening próbny.",
      workBullet1Title: "Przejrzysty Grafik Treningów",
      workBullet1Desc: "Łatwy dostęp do terminów zajęć początkujących, zaawansowanych i open mat.",
      workBullet2Title: "Zapisy na Trening Próbny",
      workBullet2Desc: "Skuteczne przyciski call-to-action prowadzące nowych adeptów prosto do rejestracji.",
      workBullet3Title: "Perfekcyjna Wydajność",
      workBullet3Desc: "Błyskawiczne ładowanie i płynny układ responsywny na telefonach oraz laptopach.",
      workBtnVisit: "Odwiedź bjjplymouth.co.uk",
      whyBadge: "Wartość Dla Twojej Firmy",
      whyTitle: "Dlaczego Małe i Średnie Firmy Wybierają Współpracę Ze Mną",
      whySubtitle: "Twoja strona to Twój najlepszy handlowiec. Oto jak pomagam Twojej firmie wyróżnić się, zdobyć zaufanie i rosnąć w sieci.",
      benefit1Title: "Dedykowany Nowoczesny Design",
      benefit1Desc: "Bez powtarzalnych, ociężałych szablonów. Każda strona jest projektowana indywidualnie pod Twoją markę, budując autorytet w branży.",
      benefit2Title: "Skupienie na Konwersji",
      benefit2Desc: "Piękny wygląd to tylko połowa sukcesu. Każdy nagłówek i przycisk jest zaplanowany tak, by zachęcać do kontaktu, telefonu lub zakupu.",
      benefit3Title: "Błyskawiczna Prędkość",
      benefit3Desc: "Użytkownicy opuszczają wolne strony po 3 sekundach. Moje witryny są ultralekkie i otwierają się natychmiast, także na łączu mobilnym.",
      benefit4Title: "Widoczność w Google (SEO)",
      benefit4Desc: "Budowane zgodnie z najnowszymi standardami semantycznymi, by klienci z Plymouth, Devonu, Kornwalii czy dużych miast UK bez trudu znaleźli Cię w wyszukiwarce.",
      aboutBadge: "O Mnie",
      aboutTitle: "Łączenie czystej estetyki z solidną inżynierią oprogramowania.",
      aboutBio1: "Jestem web developerem mieszkającym w Plymouth, Devon, UK. Współpracuję bezpośrednio z właścicielami firm, którzy chcą wzmocnić swoją markę online bez pośrednictwa drogich agencji czy przypadkowych freelancerów.",
      aboutBio2: "Wierzę, że każda firma zasługuje na stronę www odzwierciedlającą wysoki standard jej usług — szybką, elegancką i intuicyjną dla odwiedzających.",
      pillar1Title: "Student Software Development",
      pillar1Desc: "Studia w dziedzinie tworzenia oprogramowania dają mi solidne fundamenty w czystej architekturze kodu, optymalizacji wydajności i rozwiązywaniu problemów technicznych.",
      pillar2Title: "Lokalnie w Plymouth, Devon (UK)",
      pillar2Desc: "Możliwość osobistych spotkań w Plymouth i regionie South West, a także wygodna współpraca zdalna z firmami w całej Wielkiej Brytanii i Polsce.",
      stackTitle: "Technologie i Standardy",
      coverageBadge: "Obszar Działania",
      coverageTitle: "Obsługa Firm w Plymouth, Devonie, Kornwalii oraz w Dużych Miastach UK",
      coverageSubtitle: "Dedykowana lokalna znajomość rynku i wysokiej klasy strony internetowe dla ambitnych biznesów w South West i całym UK.",
      tabAll: "Wszystkie Obszary",
      tabPlymouth: "Plymouth i Okolice",
      tabDevon: "Hrabstwo Devon",
      tabCornwall: "Kornwalia",
      tabUK: "Główne Miasta UK",
      cov1Title: "Plymouth i Okolice",
      cov1Desc: "Bezpośrednia lokalna współpraca z firmami w centrum Plymouth, na Barbicanie, Plympton, Plymstock i okolicach.",
      cov2Title: "Hrabstwo Devon",
      cov2Desc: "Strony generujące klientów dla firm w Exeter, Torbay, South Hams, Tavistock i innych ośrodkach Devonu.",
      cov3Title: "Kornwalia",
      cov3Desc: "Wsparcie dla lokalnych przedsiębiorców, usługodawców i rzemieślników w Saltash, Truro, Newquay, Falmouth i St Austell.",
      cov4Title: "Duże Miasta UK i Zdalnie",
      cov4Desc: "Sprawna realizacja projektów dla firm w Londynie, Manchesterze, Birmingham, Bristolu, Leeds i w całym UK.",
      blogBadge: "Blog Techniczny",
      blogTitle: "Architektura WWW, Bezpieczeństwo i AI",
      blogSubtitle: "Praktyczne artykuły o nowoczesnej inżynierii stron, proaktywnym cyberbezpieczeństwie i wdrożeniach AI dla rozwijających się firm.",
      blogNotice: "Artykuły publikowane w języku angielskim",
      faqBadge: "Najczęstsze Pytania",
      faqTitle: "Często Zadawane Pytania (FAQ)",
      faqSubtitle: "Wszystko, co warto wiedzieć o tworzeniu dedykowanej strony internetowej w Plymouth, Devonie i UK.",
      faqQ1: "Czy realizujesz projekty na terenie Devonu i Kornwalii?",
      faqA1: "Tak! Choć mieszkam w Plymouth, współpracuję z firmami w całym regionie South West, w tym w Exeter, Torbay, Saltash, Truro, Newquay i okolicach.",
      faqQ2: "Czy tworzysz strony dla firm z Londynu, Manchesteru, Bristolu i całego UK?",
      faqA2: "Jak najbardziej. Dzięki sprawnej komunikacji online, wideokonferencjom i regularnym raportom postępów z powodzeniem realizuję projekty w całym UK.",
      faqQ3: "Czy możemy spotkać się osobiście w Plymouth?",
      faqA3: "Tak, chętnie spotykam się z klientami na terenie Plymouth (Centrum, Barbican, Royal William Yard) oraz Devonu, aby omówić projekt.",
      faqQ4: "Jak dedykowana strona pomaga w pozycji w Google (SEO)?",
      faqA4: "Czysty, semantyczny kod HTML5, błyskawiczne Core Web Vitals, lokalne mikrodane Schema.org i brak zbędnych wtyczek to kluczowe elementy, które Google promuje w wynikach lokalnych.",
      faqQ5: "Dla jakich branż tworzysz strony?",
      faqA5: "Projektuję dla akademii sportowych, fachowców, firm usługowych, gastronomii, gabinetów oraz małych i średnich przedsiębiorstw stawiających na nowych klientów.",
      contactBadge: "Rozpocznij Rozmowę",
      contactTitle: "Gotowy Na Nowoczesną Stronę Dla Twojej Firmy?",
      contactSubtitle: "Niezależnie od tego, czy potrzebujesz nowej strony od zera, czy odświeżenia obecnej witryny — skontaktuj się bezpośrednio. Bez zbędnych formularzy.",
      securityText: "Bezpośredni Kontakt Chroniony Przed Botami i Spamem",
      phoneLabel: "Telefon / WhatsApp",
      callBtnText: "Zadzwoń / Pokaż",
      copyBtnText: "Kopiuj",
      emailLabel: "Bezpośredni Adres E-mail",
      emailBtnText: "Napisz / Pokaż",
      instagramText: "Zobacz Instagram",
      locationText: "Baza: Plymouth, Devon, UK",
      error404Badge: "Błąd 404 · Strona nie znaleziona",
      error404Title: "Zagubiony w sieci? <span class=\"gradient-text\">Strona nie istnieje</span>",
      error404Lead: "Wpisany adres URL mógł zostać zmieniony, przeniesiony lub usunięty. Wybierz jedną z opcji poniżej, aby wrócić na właściwą stronę.",
      error404BtnHome: "Powrót do strony głównej",
      error404BtnWork: "Wybrane realizacje",
      error404BtnContact: "Skontaktuj się ze mną",
      error404Suggested: "Lub sprawdź artykuły techniczne:"
    }
  };

  const langBtns = document.querySelectorAll('.lang-btn');

  function setLanguage(lang) {
    if (!translations[lang]) return;
    currentLang = lang;
    localStorage.setItem('ms_portfolio_lang', lang);

    langBtns.forEach(btn => {
      if (btn.dataset.lang === lang) {
        btn.classList.add('active');
      } else {
        btn.classList.remove('active');
      }
    });

    document.documentElement.lang = lang;

    const elements = document.querySelectorAll('[data-i18n]');
    elements.forEach(el => {
      const key = el.dataset.i18n;
      if (translations[lang][key]) {
        el.innerHTML = translations[lang][key];
      }
    });
  }

  langBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      setLanguage(btn.dataset.lang);
    });
  });

  const savedLang = localStorage.getItem('ms_portfolio_lang');
  if (savedLang && translations[savedLang]) {
    setLanguage(savedLang);
  }
});
