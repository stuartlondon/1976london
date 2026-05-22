<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#404-not-found
 *
 * @package 1976_London_Theme
 */

get_header(); ?>

<!-- Man of Steel Gradient Background -->
<div class="man-of-steel-gradient"></div>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/', 'relative' ) ); ?>" style="color: inherit; text-decoration: none;">
        <span class="main-title">1976</span>
        <span class="sub-title">London</span>
    </a>
</div>

<button class="universal-hamburger" aria-label="Open menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<?php get_template_part( 'template-parts/enhanced-universal-menu' ); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="dashboard-content">
            <div class="dashboard-header">
                <div class="dashboard-title">
                    <h1>🔍 Page Not Found</h1>
                </div>
                <div class="dashboard-subtitle">
                    Sorry — that page does not exist or may have moved.
                </div>
            </div>

            <div class="dashboard-section">
                <h2>Let's get you back on track</h2>
                <p>Try searching below, or use the menu to find what you're looking for.</p>
                <?php get_search_form(); ?>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
