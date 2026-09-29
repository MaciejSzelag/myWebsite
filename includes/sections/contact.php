<?php
/**
 * Contact Section Component
 * Bot-protected direct communication channels (phone & email with copy buttons)
 */
?>
<!-- -----------------------------------------------------------------------
     Contact Section (Direct Channels, Bot-Protected, No Form)
     ----------------------------------------------------------------------- -->
<section id="contact" class="section contact-section">
  <div class="container">
    
    <div class="contact-card-box reveal-on-scroll">
      <div class="contact-header">
        <div class="badge-pill">
          <span data-i18n="contactBadge">Start A Conversation</span>
        </div>
        <h2 data-i18n="contactTitle">Ready to Elevate Your Business Online?</h2>
        <p data-i18n="contactSubtitle">
          Whether you need a brand-new website or a total redesign of your existing page, reach out directly. No complicated forms — just direct communication.
        </p>
      </div>

      <!-- Anti-Bot Badge -->
      <div class="security-badge">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
        <span data-i18n="securityText">Bot-Protected Direct Channels · No Automated Spam</span>
      </div>

      <!-- Channels Grid -->
      <div class="contact-actions-grid">
        
        <!-- Phone Channel Card -->
        <div class="contact-channel-card">
          <div class="channel-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
          </div>
          <div class="channel-label" data-i18n="phoneLabel">Direct Phone / WhatsApp</div>
          <div id="phone-display" class="channel-value-protected">+44 7877 ••• •••</div>
          <div class="channel-btn-group">
            <button type="button" id="call-btn" class="btn btn-primary btn-sm">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
              <span data-i18n="callBtnText">Call / Reveal</span>
            </button>
            <button type="button" id="copy-phone-btn" class="btn btn-secondary btn-sm" aria-label="Copy phone number">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
              <span data-i18n="copyBtnText">Copy</span>
            </button>
          </div>
        </div>

        <!-- Email Channel Card -->
        <div class="contact-channel-card">
          <div class="channel-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
          </div>
          <div class="channel-label" data-i18n="emailLabel">Direct Email Address</div>
          <div id="email-display" class="channel-value-protected">maciej•••••@outlook.com</div>
          <div class="channel-btn-group">
            <button type="button" id="email-btn" class="btn btn-primary btn-sm">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              <span data-i18n="emailBtnText">Email / Reveal</span>
            </button>
            <button type="button" id="copy-email-btn" class="btn btn-secondary btn-sm" aria-label="Copy email address">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
              <span data-i18n="copyBtnText">Copy</span>
            </button>
          </div>
        </div>

      </div>

      <!-- Meta & Social Links -->
      <div class="contact-meta-bar">
        <div class="meta-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
          <span data-i18n="locationText">Based in Plymouth, Devon, UK</span>
        </div>

        <a href="<?php echo INSTAGRAM_URL; ?>" target="_blank" rel="noopener noreferrer" class="social-link">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
          <span data-i18n="instagramText">Connect on Instagram (@websites_ms)</span>
        </a>
      </div>

    </div>

  </div>
</section>
