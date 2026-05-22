<?php
/**
 * Template Name: Gallery
 * 
 * Creative gallery showcase with 3x2 card grid layout
 * Using percentage-based responsive design for optimal performance
 * 
 * @package 1976_London_Theme
 * @author Stuart Hunt
 * @version 1.0.0
 */

get_header();
?>

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

<?php
// Include the enhanced universal menu
get_template_part('template-parts/enhanced-universal-menu');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        
        <!-- Gallery Content -->
        <div class="gallery-page-content">
            
            <!-- Page Header -->
            <div class="gallery-header">
                <h1 class="gallery-title">🎨 Creative Gallery</h1>
                <p class="gallery-subtitle">Showcasing creative works and visual storytelling</p>
            </div>

            <!-- 3x2 Gallery Grid - Connected to Dashboard Uploads -->
            <div class="gallery-grid">
                
                <?php
                // Get gallery data from dashboard uploads
                $gallery_icons = ['🖼️', '🎯', '🚀', '✨', '🎨', '🌟'];
                $default_tags = ['Creative', 'Design', 'Innovation', 'Portfolio', 'Art', 'Showcase'];
                
                for ($i = 1; $i <= 6; $i++) :
                    // Get stored gallery data
                    $image_url = get_option("gallery_card_{$i}_image", '');
                    $title = get_option("gallery_card_{$i}_title", "Project Title {$i}");
                    $description = get_option("gallery_card_{$i}_description", '');
                    $attachment_id = get_option("gallery_card_{$i}_attachment_id", '');
                    $upload_date = get_option("gallery_card_{$i}_updated", '');
                    
                    // Set default description if empty
                    if (empty($description)) {
                        $description = "Creative project space ready for your content. Upload images through your dashboard to showcase your work here.";
                    }
                    
                    // Determine if card has image
                    $has_image = !empty($image_url);
                    $formatted_date = $upload_date ? date('M Y', strtotime($upload_date)) : '2026';
                ?>
                
                <!-- Gallery Card <?php echo $i; ?> -->
                <div class="gallery-card <?php echo $has_image ? 'has-image' : 'empty-card'; ?>" data-card="<?php echo $i; ?>">
                    <div class="gallery-image-container">
                        <?php if ($has_image) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" 
                                 alt="<?php echo esc_attr($title); ?>" 
                                 class="gallery-image"
                                 loading="lazy">
                            <div class="image-overlay">
                                <span class="upload-date"><?php echo $formatted_date; ?></span>
                            </div>
                        <?php else : ?>
                            <div class="gallery-image-placeholder">
                                <div class="placeholder-icon"><?php echo $gallery_icons[$i-1]; ?></div>
                                <p class="placeholder-text">Upload via Dashboard</p>
                                <small class="placeholder-hint">Position <?php echo $i; ?> - Ready for your image</small>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="gallery-card-content">
                        <h3 class="gallery-card-title"><?php echo esc_html($title); ?></h3>
                        <p class="gallery-card-description"><?php echo esc_html($description); ?></p>
                        <div class="gallery-card-meta">
                            <span class="gallery-tag"><?php echo $default_tags[$i-1]; ?></span>
                            <span class="gallery-date"><?php echo $formatted_date; ?></span>
                            <?php if ($has_image && $attachment_id) : ?>
                                <span class="gallery-status">✅ Live</span>
                            <?php else : ?>
                                <span class="gallery-status pending">⏳ Pending</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <?php endfor; ?>

            </div>

            <!-- Gallery Footer -->
            <div class="gallery-footer">
                <p class="gallery-footer-text">More creative works coming soon. Stay tuned for updates and new project showcases.</p>
            </div>

        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>