<?php get_header(); ?>

<!-- Man of Steel Gradient Background -->
<div class="man-of-steel-gradient"></div>

<div class="site-title">
    <a href="<?php echo esc_url( home_url( '/', 'relative' ) ); ?>" style="color: inherit; text-decoration: none;">
        <span class="main-title">1976</span>
        <span class="sub-title">London</span>
    </a>
</div>

<div class="home-intro" role="note" aria-label="Homepage introduction">
    Welcome to 1976.london &mdash; a creative development space where I explore modern web techniques, clean design, and custom WordPress builds.
</div>

<!-- Universal Hamburger Menu Button -->
<button class="universal-hamburger" aria-label="Open menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<?php
// Include the enhanced universal menu
get_template_part('template-parts/enhanced-universal-menu');
?>

<?php get_footer(); ?>