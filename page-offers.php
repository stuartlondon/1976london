<?php
/**
 * Template Name: Offers
 *
 * Service packages for the flagship 3-page site.
 */
get_header();
?>

<div class="man-of-steel-gradient"></div>

<div class="site-title">
    <a href="<?php echo esc_url(home_url('/', 'relative')); ?>" style="color: inherit; text-decoration: none;">
        <span class="main-title">1976</span>
        <span class="sub-title">London</span>
    </a>
</div>

<button class="universal-hamburger" aria-label="Open navigation menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<?php get_template_part('template-parts/enhanced-universal-menu'); ?>

<div id="primary" class="content-area offers-primary">
    <main id="main" class="site-main offers-main">
        <section class="offers-hero" aria-labelledby="offers-title">
            <p class="offers-eyebrow">Clear Pricing. No Guesswork.</p>
            <h1 id="offers-title">Website Offers Built To Win Paid Client Work</h1>
            <p class="offers-intro">Choose a starting package and we tailor from there. Every build is focused on speed, clarity, and real inquiries.</p>
        </section>

        <section class="offers-grid" aria-label="Service packages">
            <article class="offer-card">
                <h2>Starter Launch</h2>
                <p class="offer-price">From £995</p>
                <p class="offer-tagline">Template-Based Website</p>
                <p class="offer-for">Best for: New small businesses that need to launch quickly and look credible.</p>
                <ul>
                    <li>Up to 5 pages</li>
                    <li>Mobile-responsive layout</li>
                    <li>Basic SEO setup</li>
                    <li>Contact form and analytics</li>
                    <li>Timeline: 10-14 days</li>
                </ul>

                <div class="offer-examples" aria-label="Starter Launch examples">
                    <h3>Example Builds</h3>
                    <ul>
                        <li><a href="https://videos.1976.london/" target="_blank" rel="noopener noreferrer">videos.1976.london</a></li>
                        <li><a href="https://images.1976.london/" target="_blank" rel="noopener noreferrer">images.1976.london</a></li>
                    </ul>
                </div>

                <p class="offer-note">Final quote confirmed after your brief.</p>
                <a class="offer-cta" href="<?php echo esc_url(home_url('/contact')); ?>">Start Starter Launch</a>
            </article>

            <article class="offer-card">
                <h2>Portfolio Pro</h2>
                <p class="offer-price">From £1,495</p>
                <p class="offer-tagline">Creative Portfolio Website</p>
                <p class="offer-for">Best for: Creatives who need stronger presentation and more inbound enquiries.</p>
                <ul>
                    <li>Project showcase architecture</li>
                    <li>Case-study style project pages</li>
                    <li>Lead-focused contact pathways</li>
                    <li>Handover guidance and launch support</li>
                    <li>Timeline: 2-3 weeks</li>
                </ul>

                <div class="offer-examples" aria-label="Portfolio Pro examples">
                    <h3>Example Builds</h3>
                    <ul>
                        <li><a href="https://dragicacarlin.com/" target="_blank" rel="noopener noreferrer">dragicacarlin.com</a></li>
                        <li><a href="https://www.redsplastering.co.uk/" target="_blank" rel="noopener noreferrer">redsplastering.co.uk (new build in progress)</a></li>
                    </ul>
                </div>

                <p class="offer-note">Final quote confirmed after your brief.</p>
                <a class="offer-cta" href="<?php echo esc_url(home_url('/contact')); ?>">Build Portfolio Pro</a>
            </article>

            <article class="offer-card featured">
                <h2>Business Growth</h2>
                <p class="offer-price">From £2,495</p>
                <p class="offer-tagline">Custom WordPress Build</p>
                <p class="offer-for">Best for: Businesses that need a conversion-focused website that drives qualified leads.</p>
                <ul>
                    <li>Conversion-focused page structure</li>
                    <li>Custom components and design direction</li>
                    <li>Content strategy and copy support</li>
                    <li>Performance and accessibility pass</li>
                    <li>Timeline: 3-4 weeks</li>
                </ul>

                <div class="offer-examples" aria-label="Business Growth examples">
                    <h3>Example Builds</h3>
                    <ul>
                        <li><a href="https://benstockley.com/" target="_blank" rel="noopener noreferrer">benstockley.com</a></li>
                        <li><a href="http://test.1976.london/" target="_blank" rel="noopener noreferrer">test.1976.london (legacy flagship)</a></li>
                    </ul>
                </div>

                <p class="offer-note">Final quote confirmed after your brief.</p>
                <a class="offer-cta" href="<?php echo esc_url(home_url('/contact')); ?>">Book Business Growth</a>
            </article>
        </section>

        <section class="offers-footer-cta" aria-label="Call to action">
            <h2>Need something outside these packages?</h2>
            <p>I also build bespoke solutions for studios, campaigns, and service businesses with unusual requirements.</p>
            <a class="footer-cta" href="<?php echo esc_url(home_url('/contact')); ?>">Request A Custom Quote</a>
        </section>
    </main>
</div>

<?php get_footer(); ?>
