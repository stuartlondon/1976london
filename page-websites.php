<?php

/**
 * Template Name: Websites
 * 
 * Interactive Web Gallery - Showcase of professional website development
 * Features 96% viewport live previews and enhanced card design
 */
get_header();
?>

<!-- Future Tech Ice Stone Background - TEMPORARILY COMMENTED OUT FOR PERFORMANCE -->
<!-- <div class="future-tech-background">
    <div class="tech-stripes">
        <div class="tech-stripe stripe-1"></div>
        <div class="tech-stripe stripe-2"></div>
        <div class="tech-stripe stripe-3"></div>
        <div class="tech-stripe stripe-4"></div>
        <div class="tech-stripe stripe-5"></div>
        <div class="tech-stripe stripe-6"></div>
    </div>
</div> -->

<!-- Man of Steel Gradient Background -->
<div class="man-of-steel-gradient"></div>

<div class="site-title">
    <a href="<?php echo esc_url(home_url('/', 'relative')); ?>" style="color: inherit; text-decoration: none;">
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

        <!-- Websites Gallery Content with Beautiful Dashboard Styling -->
        <div class="dashboard-content">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <!-- Beautiful Page Header -->
                    <div class="dashboard-header">
                        <div class="dashboard-title">
                            <h1>🌐 Professional Websites</h1>
                        </div>
                        <div class="dashboard-subtitle">
                            Modern WordPress development with stunning design and functionality
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <!-- Dashboard Section for Websites -->
            <div class="dashboard-section">
                <h2>🌐 Website Portfolio</h2>
                <p>Interactive previews of professional websites crafted with modern technology</p>

                <!-- 2x2 Website Portfolio Grid -->
                <div class="websites-2x2-grid">

                    <!-- Top Row -->
                    <!-- 1976 Image Theme - Top Left -->
                    <div class="dashboard-card website-card-2x2">
                        <div class="card-preview">
                            <div class="site-preview-thumb images-1976-preview" onclick="openSitePreview('images1976', 'https://images.1976.london', '1976 Image Theme - Creative Photography & Image Portfolio')">
                                <!-- Preview shows 1976 Image Theme -->
                            </div>
                            <div class="card-overlay">
                                <button class="card-action-btn" onclick="openSitePreview('images1976', 'https://images.1976.london', '1976 Image Theme - Creative Photography & Image Portfolio')">🌐 Live Preview</button>
                                <a href="https://images.1976.london" class="card-action-btn" target="_blank">🔗 Visit Site</a>
                            </div>
                        </div>
                        <div class="card-info">
                            <h4 class="card-title">1976 Image Theme</h4>
                            <p class="card-description">A photography and image portfolio theme with a horizontal preview reel and a clean ice-blue visual language.</p>
                            <div class="card-practices">
                                <span class="practice-tag">CSS3</span>
                                <span class="practice-tag">UI Motion</span>
                                <span class="practice-tag">Portfolio UX</span>
                            </div>
                            <div class="card-meta">
                                <span class="update-status">✅ Live</span>
                                <span class="update-time">Image Portfolio</span>
                            </div>
                        </div>
                    </div>

                    <!-- 1976 Video Theme - Top Right -->
                    <div class="dashboard-card website-card-2x2">
                        <div class="card-preview">
                            <div class="site-preview-thumb videos-1976-preview" onclick="openSitePreview('videos1976', 'https://videos.1976.london', '1976 Video Theme - Cinematic Motion Portfolio')">
                                <!-- Preview shows 1976 Video Theme -->
                            </div>
                            <div class="card-overlay">
                                <button class="card-action-btn" onclick="openSitePreview('videos1976', 'https://videos.1976.london', '1976 Video Theme - Cinematic Motion Portfolio')">🌐 Live Preview</button>
                                <a href="https://videos.1976.london" class="card-action-btn" target="_blank">🔗 Visit Site</a>
                            </div>
                        </div>
                        <div class="card-info">
                            <h4 class="card-title">1976 Video Theme</h4>
                            <p class="card-description">Cinematic motion portfolio built to hold attention with short-form video, visual atmosphere, and motion-led storytelling.</p>
                            <div class="card-practices">
                                <span class="practice-tag">Story-led Design</span>
                                <span class="practice-tag">Motion UI</span>
                                <span class="practice-tag">Brand Tone</span>
                            </div>
                            <div class="card-meta">
                                <span class="update-status">✅ Live</span>
                                <span class="update-time">Video Portfolio</span>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <!-- Dragica Carlin - Row 2 Left -->
                    <div class="dashboard-card website-card-2x2">
                        <div class="card-preview">
                            <div class="site-preview-thumb dragica-preview" onclick="openSitePreview('dragicacarlin', 'https://dragicacarlin.com', 'Professional Art Portfolio - Dragica Carlin')">
                                <!-- Preview will show actual website screenshot -->
                            </div>
                            <div class="card-overlay">
                                <button class="card-action-btn" onclick="openSitePreview('dragicacarlin', 'https://dragicacarlin.com', 'Professional Art Portfolio - Dragica Carlin')">🌐 Live Preview</button>
                                <a href="https://dragicacarlin.com" class="card-action-btn" target="_blank">🔗 Visit Site</a>
                            </div>
                        </div>
                        <div class="card-info">
                            <h4 class="card-title">Dragica Carlin</h4>
                            <p class="card-description">Professional artist portfolio with ACF Pro galleries and responsive design</p>
                            <div class="card-practices">
                                <span class="practice-tag">ACF Pro</span>
                                <span class="practice-tag">Gallery CMS</span>
                                <span class="practice-tag">Responsive</span>
                            </div>
                            <div class="card-meta">
                                <span class="update-status">✅ Live</span>
                                <span class="update-time">Art Portfolio</span>
                            </div>
                        </div>
                    </div>

                    <!-- Ben Stockley - Top Right -->
                    <div class="dashboard-card website-card-2x2">
                        <div class="card-preview">
                            <div class="site-preview-thumb ben-preview" onclick="openSitePreview('benstockley', 'https://benstockley.com', 'Ben Stockley - Filmmaker Portfolio')">
                                <!-- Preview will show actual website screenshot -->
                            </div>
                            <div class="card-overlay">
                                <button class="card-action-btn" onclick="openSitePreview('benstockley', 'https://benstockley.com', 'Ben Stockley - Filmmaker Portfolio')">🌐 Live Preview</button>
                                <a href="https://benstockley.com" class="card-action-btn" target="_blank">🔗 Visit Site</a>
                            </div>
                        </div>
                        <div class="card-info">
                            <h4 class="card-title">Ben Stockley</h4>
                            <p class="card-description">Dynamic filmmaker portfolio showcasing video work and creative projects</p>
                            <div class="card-practices">
                                <span class="practice-tag">Video Showcase</span>
                                <span class="practice-tag">Creative Direction</span>
                                <span class="practice-tag">Mobile-first</span>
                            </div>
                            <div class="card-meta">
                                <span class="update-status">✅ Live</span>
                                <span class="update-time">Film Portfolio</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Row -->
                    <!-- Reds Plastering - Bottom Left -->
                    <div class="dashboard-card website-card-2x2">
                        <div class="card-preview">
                            <div class="site-preview-thumb reds-preview" onclick="openSitePreview('redsplastering', 'https://redsplastering.co.uk', 'Reds Plastering - Trade Services')">
                                <!-- Preview will show actual website screenshot -->
                            </div>
                            <div class="card-overlay">
                                <button class="card-action-btn" onclick="openSitePreview('redsplastering', 'https://redsplastering.co.uk', 'Reds Plastering - Trade Services')">🌐 Live Preview</button>
                                <a href="https://redsplastering.co.uk" class="card-action-btn" target="_blank">🔗 Visit Site</a>
                            </div>
                        </div>
                        <div class="card-info">
                            <h4 class="card-title">Reds Plastering</h4>
                            <p class="card-description">Professional trade services website with contact systems and business info</p>
                            <div class="card-practices">
                                <span class="practice-tag">Local SEO</span>
                                <span class="practice-tag">Lead Capture</span>
                                <span class="practice-tag">Business CMS</span>
                            </div>
                            <div class="card-meta">
                                <span class="update-status">✅ Live</span>
                                <span class="update-time">Trade Services</span>
                            </div>
                        </div>
                    </div>

                    <!-- David Austen - Row 2 Right -->
                    <div class="dashboard-card website-card-2x2">
                        <div class="card-preview">
                            <div class="site-preview-thumb austen-preview" onclick="openSitePreview('davidausten', 'https://davidaustenstudio.com', 'David Austen Studio - Artist Portfolio')">
                                <!-- Preview will show actual website screenshot -->
                            </div>
                            <div class="card-overlay">
                                <button class="card-action-btn" onclick="openSitePreview('davidausten', 'https://davidaustenstudio.com', 'David Austen Studio - Artist Portfolio')">🌐 Live Preview</button>
                                <a href="https://davidaustenstudio.com" class="card-action-btn" target="_blank">🔗 Visit Site</a>
                            </div>
                        </div>
                        <div class="card-info">
                            <h4 class="card-title">David Austen</h4>
                            <p class="card-description">Artist studio website with gallery management and exhibition information</p>
                            <div class="card-practices">
                                <span class="practice-tag">Artist CMS</span>
                                <span class="practice-tag">Exhibitions</span>
                                <span class="practice-tag">Content Strategy</span>
                            </div>
                            <div class="card-meta">
                                <span class="update-status">✅ Live</span>
                                <span class="update-time">Art Studio</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

    </main>
</div>

<!-- Site Preview Modal - Reusing existing modal system -->
<div id="sitePreviewModal" class="site-preview-modal" onclick="closeSitePreview()">
    <div class="preview-modal-content" onclick="event.stopPropagation()">
        <div class="preview-modal-header">
            <div class="preview-info">
                <h3 id="previewTitle">Site Preview</h3>
                <span id="previewUrl" class="preview-url"></span>
            </div>
            <div class="preview-controls">
                <button id="externalLinkBtn" class="control-btn" title="Open in new tab">
                    <span>🔗</span>
                </button>
                <button class="control-btn mobile-toggle" onclick="toggleMobileView()" title="Toggle mobile view">
                    <span>📱</span>
                </button>
                <button class="control-btn close-btn" onclick="closeSitePreview()" title="Close preview">
                    <span>×</span>
                </button>
            </div>
        </div>
        <div class="preview-iframe-container">
            <iframe id="sitePreviewFrame" src="" frameborder="0" allowfullscreen></iframe>
            <div id="loadingIndicator" class="loading-indicator">
                <div class="spinner"></div>
                <p>Loading site preview...</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Site Preview Functions (Enhanced for Website Gallery)
    function openSitePreview(projectId, url, title) {
        const modal = document.getElementById('sitePreviewModal');
        const iframe = document.getElementById('sitePreviewFrame');
        const titleElement = document.getElementById('previewTitle');
        const urlElement = document.getElementById('previewUrl');
        const externalBtn = document.getElementById('externalLinkBtn');
        const loadingIndicator = document.getElementById('loadingIndicator');

        // Set content
        titleElement.textContent = title;
        urlElement.textContent = url;
        externalBtn.onclick = () => window.open(url, '_blank');

        // Show modal
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';

        // Special handling for Reds Plastering only - use screenshots due to hosting restrictions
        if (projectId === 'redsplastering') {
            loadingIndicator.style.display = 'none';

            // Replace iframe container with screenshot display
            iframe.style.display = 'none';

            // Create screenshot display
            const screenshotDiv = document.createElement('div');
            screenshotDiv.className = 'screenshot-preview';
            screenshotDiv.innerHTML = `
            <img id="redsScreenshot" 
                 src="<?php echo get_template_directory_uri(); ?>/images/reds-plastering-large.png" 
                 alt="Reds Plastering Website Desktop View" 
                 class="reds-screenshot desktop-view" />
            <p class="screenshot-note">📸 Website Screenshot Preview - <a href="${url}" target="_blank">Visit live site</a></p>
        `;

            iframe.parentNode.appendChild(screenshotDiv);

            // Set initial mobile button state
            const mobileBtn = document.querySelector('.mobile-toggle span');
            mobileBtn.textContent = '📱';

            // Set up mobile toggle functionality for Reds Plastering
            window.redsToggleMobile = function() {
                const screenshot = document.getElementById('redsScreenshot');
                const mobileBtn = document.querySelector('.mobile-toggle');

                if (screenshot.src.includes('large.png')) {
                    // Switch to mobile view
                    screenshot.src = '<?php echo get_template_directory_uri(); ?>/images/reds-plastering-mobile.png';
                    screenshot.alt = 'Reds Plastering Website Mobile View';
                    screenshot.className = 'reds-screenshot mobile-view';
                    mobileBtn.style.background = 'rgba(102, 126, 234, 0.8)';
                    mobileBtn.style.color = 'white';
                    mobileBtn.querySelector('span').textContent = '💻';
                } else {
                    // Switch back to desktop view
                    screenshot.src = '<?php echo get_template_directory_uri(); ?>/images/reds-plastering-large.png';
                    screenshot.alt = 'Reds Plastering Website Desktop View';
                    screenshot.className = 'reds-screenshot desktop-view';
                    mobileBtn.style.background = '';
                    mobileBtn.style.color = '';
                    mobileBtn.querySelector('span').textContent = '📱';
                }
            };

            return;
        }

        // Normal iframe loading for other sites
        loadingIndicator.style.display = 'flex';

        iframe.onload = () => {
            loadingIndicator.style.display = 'none';
        };

        iframe.onerror = () => {
            loadingIndicator.innerHTML = '<p>Site preview unavailable. <a href="' + url + '" target="_blank">Visit site directly</a></p>';
        };

        iframe.src = url;
    }

    function closeSitePreview() {
        const modal = document.getElementById('sitePreviewModal');
        const iframe = document.getElementById('sitePreviewFrame');

        modal.style.display = 'none';
        iframe.src = '';

        // Clean up Reds Plastering specific elements
        const screenshotPreview = document.querySelector('.screenshot-preview');
        if (screenshotPreview) {
            screenshotPreview.remove();
        }

        // Show iframe again (in case it was hidden for Reds)
        iframe.style.display = 'block';

        // Clean up the mobile toggle function
        if (window.redsToggleMobile) {
            delete window.redsToggleMobile;
        }

        // Reset mobile button icon
        const mobileBtn = document.querySelector('.mobile-toggle span');
        if (mobileBtn) {
            mobileBtn.textContent = '📱';
        }

        document.body.style.overflow = 'auto';
    }

    function toggleMobileView() {
        // Check if we're viewing Reds Plastering screenshots
        if (window.redsToggleMobile) {
            window.redsToggleMobile();
            return;
        }

        // Check if we're viewing a screenshot (any site with screenshots)
        const siteScreenshot = document.getElementById('siteScreenshot');
        if (siteScreenshot) {
            // For screenshots, just show a message that it's a static preview
            const btn = document.querySelector('.mobile-toggle span');
            btn.textContent = '�'; // Camera icon to show it's a screenshot

            // You could add mobile screenshot switching here later if needed
            return;
        }

        // Normal iframe mobile toggle for sites without screenshots
        const iframe = document.getElementById('sitePreviewFrame');
        const container = iframe.parentElement;

        container.classList.toggle('mobile-view');

        const btn = document.querySelector('.mobile-toggle span');
        if (container.classList.contains('mobile-view')) {
            btn.textContent = '💻';
        } else {
            btn.textContent = '📱';
        }
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeSitePreview();
        }
    });

    // Add hover effects for cards
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.website-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>



<?php get_footer(); ?>