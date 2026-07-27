<?php get_header(); ?>

<!-- Man of Steel Gradient Background -->
<div class="man-of-steel-gradient"></div>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/', 'relative' ) ); ?>" style="color: inherit; text-decoration: none;">
        <span class="main-title">1976</span>
        <span class="sub-title">London</span>
    </a>
</div>

<!-- Universal Hamburger Menu Button -->
<button class="universal-hamburger" aria-label="Open navigation menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<?php
// Include the enhanced universal menu
get_template_part('template-parts/enhanced-universal-menu');
?>

<div id="primary" class="content-area home-primary">
    <main id="main" class="site-main home-main">
        <section class="home-hero" aria-labelledby="home-hero-title">
            <p class="hero-eyebrow">London Based WordPress Partner</p>
            <h1 id="home-hero-title">Websites That Look Expensive, Load Fast, and Win Real Clients</h1>
            <p class="hero-copy">I build conversion-focused WordPress websites for creatives, studios, and small businesses that need more than a pretty homepage. Your site should sell while you sleep.</p>
            <div class="hero-actions">
                <a class="hero-cta primary" href="<?php echo esc_url( home_url( '/offers' ) ); ?>">See Offers</a>
                <a class="hero-cta secondary" href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Book A Project Call</a>
            </div>
        </section>

        <section class="home-proof" aria-label="Trust indicators">
            <div class="proof-card">
                <span class="proof-number">24h</span>
                <span class="proof-label">Response Window</span>
            </div>
            <div class="proof-card">
                <span class="proof-number">3</span>
                <span class="proof-label">Clear Packages</span>
            </div>
            <div class="proof-card">
                <span class="proof-number">1</span>
                <span class="proof-label">Owner-Operator Build</span>
            </div>
        </section>

        <section class="home-services" aria-labelledby="home-services-title">
            <h2 id="home-services-title">What I Build</h2>
            <div class="services-grid">
                <article class="service-item">
                    <h3>Custom WordPress Websites</h3>
                    <p>Built from your goals, audience, and tone. Fast, secure, and easy to update.</p>
                </article>
                <article class="service-item">
                    <h3>Template-Based Launch Sites</h3>
                    <p>Lower-cost structured builds with professional finish and conversion-first content.</p>
                </article>
                <article class="service-item">
                    <h3>Small Business Websites</h3>
                    <p>Service pages, trust messaging, and lead capture tuned for local and remote clients.</p>
                </article>
                <article class="service-item">
                    <h3>Creative Portfolio Websites</h3>
                    <p>Showcase work with strong narrative and cleaner calls-to-action for paid commissions.</p>
                </article>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>