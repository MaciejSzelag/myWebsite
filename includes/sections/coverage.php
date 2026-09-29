<?php
/**
 * Coverage Section Component
 * Interactive filter tabs and cards for Plymouth, Devon, Cornwall, and UK
 */
?>
<!-- -----------------------------------------------------------------------
     Coverage Section (Plymouth, Devon, Cornwall & UK Major Cities)
     ----------------------------------------------------------------------- -->
<section id="coverage" class="section coverage-section">
  <div class="container">
    
    <div class="section-header reveal-on-scroll">
      <div class="badge-pill">
        <span data-i18n="coverageBadge">Local & UK-Wide Coverage</span>
      </div>
      <h2 class="section-title" data-i18n="coverageTitle">
        Serving Businesses Across Plymouth, Devon, Cornwall & Major UK Hubs
      </h2>
      <p class="section-subtitle" data-i18n="coverageSubtitle">
        Delivering dedicated local expertise and high-performance websites for ambitious businesses throughout the South West and nationwide.
      </p>
    </div>

    <!-- Filter Tabs -->
    <div class="coverage-tabs reveal-on-scroll">
      <button type="button" class="tab-btn active" data-region="all" data-i18n="tabAll">All Areas</button>
      <button type="button" class="tab-btn" data-region="plymouth" data-i18n="tabPlymouth">Plymouth & Surrounds</button>
      <button type="button" class="tab-btn" data-region="devon" data-i18n="tabDevon">Devon County</button>
      <button type="button" class="tab-btn" data-region="cornwall" data-i18n="tabCornwall">Cornwall County</button>
      <button type="button" class="tab-btn" data-region="uk" data-i18n="tabUK">Major UK Cities</button>
    </div>

    <!-- Coverage Cards Grid -->
    <div class="coverage-grid">
      <!-- Plymouth -->
      <div class="coverage-card reveal-on-scroll" data-region="plymouth">
        <div class="coverage-icon">📍</div>
        <h3 class="coverage-region" data-i18n="cov1Title">Plymouth & Surrounds</h3>
        <p class="coverage-desc" data-i18n="cov1Desc">
          Direct local partnership for businesses across Plymouth city centre, Barbican, Plympton, Plymstock, and Dartmoor gateway towns.
        </p>
        <div class="city-tags">
          <span class="city-tag">City Centre</span>
          <span class="city-tag">Barbican</span>
          <span class="city-tag">Plympton</span>
          <span class="city-tag">Plymstock</span>
          <span class="city-tag">Royal William Yard</span>
          <span class="city-tag">Ivybridge</span>
          <span class="city-tag">Derriford</span>
          <span class="city-tag">Mutley</span>
        </div>
      </div>

      <!-- Devon -->
      <div class="coverage-card reveal-on-scroll" data-region="devon">
        <div class="coverage-icon">🌊</div>
        <h3 class="coverage-region" data-i18n="cov2Title">Devon County</h3>
        <p class="coverage-desc" data-i18n="cov2Desc">
          High-converting websites for businesses in Exeter, Torbay, South Hams, Tavistock, and commercial hubs across Devon.
        </p>
        <div class="city-tags">
          <span class="city-tag">Exeter</span>
          <span class="city-tag">Torbay</span>
          <span class="city-tag">Torquay</span>
          <span class="city-tag">Paignton</span>
          <span class="city-tag">Totnes</span>
          <span class="city-tag">Tavistock</span>
          <span class="city-tag">Newton Abbot</span>
          <span class="city-tag">Dartmouth</span>
        </div>
      </div>

      <!-- Cornwall -->
      <div class="coverage-card reveal-on-scroll" data-region="cornwall">
        <div class="coverage-icon">⛵</div>
        <h3 class="coverage-region" data-i18n="cov3Title">Cornwall County</h3>
        <p class="coverage-desc" data-i18n="cov3Desc">
          Supporting thriving independent businesses and trades in Saltash, Truro, Newquay, Falmouth, St Austell, and throughout Cornwall.
        </p>
        <div class="city-tags">
          <span class="city-tag">Saltash</span>
          <span class="city-tag">Truro</span>
          <span class="city-tag">Newquay</span>
          <span class="city-tag">Falmouth</span>
          <span class="city-tag">St Austell</span>
          <span class="city-tag">Bodmin</span>
          <span class="city-tag">Liskeard</span>
          <span class="city-tag">Penzance</span>
        </div>
      </div>

      <!-- Major UK Cities & Remote -->
      <div class="coverage-card reveal-on-scroll" data-region="uk">
        <div class="coverage-icon">🌐</div>
        <h3 class="coverage-region" data-i18n="cov4Title">Major UK Cities & Remote</h3>
        <p class="coverage-desc" data-i18n="cov4Desc">
          Collaborating seamlessly with companies in London, Manchester, Birmingham, Bristol, Leeds, and nationwide across the UK.
        </p>
        <div class="city-tags">
          <span class="city-tag">London</span>
          <span class="city-tag">Manchester</span>
          <span class="city-tag">Birmingham</span>
          <span class="city-tag">Bristol</span>
          <span class="city-tag">Leeds</span>
          <span class="city-tag">Sheffield</span>
          <span class="city-tag">Cardiff</span>
          <span class="city-tag">Edinburgh</span>
        </div>
      </div>
    </div>

  </div>
</section>
