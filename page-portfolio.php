<?php

/**
 * Template Name: Portfolio
 * 
 * Portfolio page for 1976 London - external profiles and professional presence
 */
get_header();
?>

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

        <!-- Portfolio Content with Dashboard Styling -->
        <div class="dashboard-content">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <!-- Beautiful Page Header - Gallery Style -->
                    <div class="dashboard-header">
                        <div class="dashboard-title">
                            <h1>💼 Creative Technologist Portfolio</h1>
                        </div>
                        <div class="dashboard-subtitle">
                            Professional profiles, client work, and creative development showcase
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <!-- Dashboard Section for Portfolio Links -->
            <div class="dashboard-section">
                <h2>🌟 Professional Presence</h2>
                <p>External portfolio links and professional profiles</p>

                <!-- Portfolio Grid Layout -->
                <div class="portfolio-grid">

                    <!-- Main Portfolio Content -->
                    <div class="portfolio-main">
                        <?php if (get_the_content()) : ?>
                            <div class="portfolio-intro">
                                <?php the_content(); ?>
                            </div>
                        <?php else : ?>
                            <div class="portfolio-intro">
                                <h2>🚀 External Portfolio Links</h2>
                                <p>Connect with professional profiles, client testimonials, and live project showcases across multiple platforms. Each link represents a different aspect of creative technology expertise.</p>

                                <h3>🎯 Professional Network</h3>
                                <p>Established presence on key professional platforms with proven track record in WordPress development, creative design, and technical problem-solving. Portfolio demonstrates range from individual projects to enterprise solutions.</p>
                            </div>
                        <?php endif; ?>

                        <!-- External Portfolio Links -->
                        <div class="portfolio-links">
                            <h3>🔗 Portfolio Platforms</h3>

                            <div class="links-grid">
                                <div class="portfolio-link-card">
                                    <div class="link-header">
                                        <h4>💼 Upwork Profile</h4>
                                        <span class="link-type">Freelance Platform</span>
                                    </div>
                                    <p>Top Rated freelancer specializing in WordPress development, creative themes, and performance optimization. 100% job success rate with 25+ completed projects and excellent client reviews.</p>
                                    <div class="link-action">
                                        <a href="https://www.upwork.com/freelancers/~01d3e9362798a7a655?mp_source=share" target="_blank" rel="noopener noreferrer" class="portfolio-btn">
                                            View Profile →
                                        </a>
                                    </div>
                                </div>

                                <div class="portfolio-link-card">
                                    <div class="link-header">
                                        <h4>📂 GitHub Repository</h4>
                                        <span class="link-type">Code Portfolio</span>
                                    </div>
                                    <p>Open source WordPress themes, custom development projects, and innovative code solutions. Features the 1976 London theme, dashboard systems, and modern web development techniques.</p>
                                    <div class="link-action">
                                        <a href="https://github.com/stuartlondon/1976london" target="_blank" rel="noopener noreferrer" class="portfolio-btn">
                                            Browse Code →
                                        </a>
                                    </div>
                                </div>

                                <div class="portfolio-link-card">
                                    <div class="link-header">
                                        <h4>💻 LinkedIn Profile</h4>
                                        <span class="link-type">Professional Network</span>
                                    </div>
                                    <p>Professional background, recommendations, and industry connections. Focus on creative technology, WordPress development, and innovative digital solutions.</p>
                                    <div class="link-action">
                                        <a href="https://linkedin.com/in/stuart-hunt-1976uk" target="_blank" rel="noopener noreferrer" class="portfolio-btn">
                                            Connect →
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Client Testimonials Section -->
                        <div class="testimonials-section">
                            <h3>💬 Client Success Stories</h3>

                            <div class="testimonials-grid">
                                <div class="testimonial-card">
                                    <div class="testimonial-quote">
                                        <p>"Outstanding WordPress development with innovative glassmorphism design. Delivered exactly what we envisioned for our creative portfolio."</p>
                                    </div>
                                    <div class="testimonial-author">
                                        <strong>Creative Agency Client</strong>
                                        <span>Portfolio Website Project</span>
                                    </div>
                                </div>

                                <div class="testimonial-card">
                                    <div class="testimonial-quote">
                                        <p>"Exceptional technical problem-solving and performance optimization. The modal system works flawlessly across all devices."</p>
                                    </div>
                                    <div class="testimonial-author">
                                        <strong>Professional Artist</strong>
                                        <span>Gallery Website Development</span>
                                    </div>
                                </div>

                                <div class="testimonial-card">
                                    <div class="testimonial-quote">
                                        <p>"Clean code, professional workflow, and innovative solutions. Transformed our vision into a high-performance reality."</p>
                                    </div>
                                    <div class="testimonial-author">
                                        <strong>Business Client</strong>
                                        <span>Custom WordPress Development</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Sidebar -->
                    <div class="portfolio-sidebar">

                        <!-- Portfolio Stats -->
                        <div class="portfolio-stats">
                            <h3>📊 Portfolio Statistics</h3>
                            <ul>
                                <li><strong>Projects Completed:</strong> 25+ WordPress websites</li>
                                <li><strong>Client Satisfaction:</strong> 100% positive feedback</li>
                                <li><strong>Specialization:</strong> Creative portfolio sites</li>
                                <li><strong>Technical Focus:</strong> Performance optimization</li>
                                <li><strong>Design Approach:</strong> Glassmorphism & modern UI</li>
                                <li><strong>Development Style:</strong> Clean, maintainable code</li>
                            </ul>
                        </div>

                        <!-- Skills & Services -->
                        <div class="services-section">
                            <h3>🛠️ Available Services</h3>
                            <div class="services-list">
                                <div class="service-item">
                                    <div class="service-name">WordPress Development</div>
                                    <div class="service-level">Expert</div>
                                </div>
                                <div class="service-item">
                                    <div class="service-name">Custom Theme Creation</div>
                                    <div class="service-level">Advanced</div>
                                </div>
                                <div class="service-item">
                                    <div class="service-name">Performance Optimization</div>
                                    <div class="service-level">Advanced</div>
                                </div>
                                <div class="service-item">
                                    <div class="service-name">Glassmorphism Design</div>
                                    <div class="service-level">Signature</div>
                                </div>
                                <div class="service-item">
                                    <div class="service-name">Responsive Development</div>
                                    <div class="service-level">Expert</div>
                                </div>
                                <div class="service-item">
                                    <div class="service-name">Creative Problem Solving</div>
                                    <div class="service-level">Innovation</div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
</div>
</main>
</div>

<?php get_footer(); ?>