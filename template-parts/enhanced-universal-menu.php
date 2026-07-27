<?php
/**
 * Persistent flagship navigation.
 */

$offers_page = get_page_by_path('offers');
$offers_href = $offers_page ? get_permalink($offers_page->ID) : home_url('/offers');

$nav_items = array(
    array('label' => 'Home', 'href' => home_url('/'), 'active' => is_front_page()),
    array('label' => 'About', 'href' => home_url('/about'), 'active' => is_page('about')),
    array('label' => 'Contact', 'href' => home_url('/contact'), 'active' => is_page('contact')),
);
?>

<nav id="universalInlineNav" class="universal-inline-nav" aria-label="Primary">
    <ul class="inline-nav-list" role="list">
        <?php foreach ($nav_items as $item) : ?>
            <li>
                <a class="inline-nav-link<?php echo $item['active'] ? ' is-active' : ''; ?>" href="<?php echo esc_url($item['href']); ?>"<?php echo $item['active'] ? ' aria-current="page"' : ''; ?>>
                    <?php echo esc_html($item['label']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

<div class="flagship-quick-cta" aria-label="Quick contact">
    <a class="flagship-quick-cta-link" href="<?php echo esc_url(home_url('/contact')); ?>">Book Project Call</a>
    <p>07903 541305 - please leave a message and we will get back to you asap.</p>
</div>