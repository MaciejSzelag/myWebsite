<?php
/**
 * Hero Section Component
 * Mobile-First conversion header with interactive performance audit card
 */
?>
<!-- -----------------------------------------------------------------------
     Hero Section
     ----------------------------------------------------------------------- -->
<section id="hero" class="hero-section">
  <div class="container">
    <div class="hero-grid">
      
      <!-- Hero Left Column: Copy & Actions -->
      <div class="hero-content">
        <div class="badge-pill">
          <span class="badge-pulse" aria-hidden="true"></span>
          <span data-i18n="heroBadge">Available for new projects · 📍 Plymouth, UK & Remote</span>
        </div>

        <h1 class="hero-title" data-i18n="heroTitle">
          Crafting <span class="gradient-text">High-Performance Websites</span> for Growing Businesses.
        </h1>

        <p class="hero-lead" data-i18n="heroLead">
          Hi, I'm <strong>Maciej Szeląg</strong> — a web developer based in Plymouth, UK and a Software Development student. I build bespoke, fast, and high-converting websites designed to turn visitors into loyal customers for small and medium businesses.
        </p>

        <div class="hero-actions">
          <a href="#work" class="btn btn-primary">
            <span data-i18n="heroBtnWork">View Featured Work</span>
            <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
          </a>
          <a href="#contact" class="btn btn-secondary" data-i18n="heroBtnContact">Get in Touch</a>
        </div>

        <!-- Value Chips -->
        <div class="hero-chips">
          <div class="chip-item">
            <svg class="chip-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
            <span data-i18n="chipMobile">100% Mobile-First Experience</span>
          </div>
          <div class="chip-item">
            <svg class="chip-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
            <span data-i18n="chipSpeed">Fast & Conversion-Optimized</span>
          </div>
          <div class="chip-item">
            <svg class="chip-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
            <span data-i18n="chipLocal">Plymouth, Devon, Cornwall & UK</span>
          </div>
        </div>
      </div>

      <!-- Hero Right Column: Interactive Tech Card -->
      <div class="hero-visual">
        <div class="hero-code-card reveal-on-scroll">
          <div class="card-topbar">
            <div class="topbar-dots">
              <span class="topbar-dot dot-red"></span>
              <span class="topbar-dot dot-yellow"></span>
              <span class="topbar-dot dot-green"></span>
            </div>
            <span class="topbar-file">performance-audit.json</span>
          </div>

          <div class="hero-metrics-list">
            <div class="metric-row">
              <div class="metric-info">
                <div class="metric-icon-wrap">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                </div>
                <div>
                  <div class="metric-name" data-i18n="metricMobileTitle">Mobile-First UX</div>
                  <div class="metric-sub" data-i18n="metricMobileSub">Flawless on all screen sizes</div>
                </div>
              </div>
              <div class="metric-val">100%</div>
            </div>

            <div class="metric-row">
              <div class="metric-info">
                <div class="metric-icon-wrap">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <div>
                  <div class="metric-name" data-i18n="metricSpeedTitle">Google Lighthouse</div>
                  <div class="metric-sub" data-i18n="metricSpeedSub">Sub-second load times</div>
                </div>
              </div>
              <div class="metric-val">100/100</div>
            </div>

            <div class="metric-row">
              <div class="metric-info">
                <div class="metric-icon-wrap">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <div>
                  <div class="metric-name" data-i18n="metricBespokeTitle">Bespoke Code</div>
                  <div class="metric-sub" data-i18n="metricBespokeSub">Zero bloated page builders</div>
                </div>
              </div>
              <div class="metric-val">Custom</div>
            </div>

            <div class="metric-row">
              <div class="metric-info">
                <div class="metric-icon-wrap">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
                <div>
                  <div class="metric-name" data-i18n="metricSeoTitle">Local SEO Ready</div>
                  <div class="metric-sub" data-i18n="metricSeoSub">Plymouth, Devon & UK-wide</div>
                </div>
              </div>
              <div class="metric-val">Rank #1</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
