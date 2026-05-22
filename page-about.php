<?php

/**
 * Template Name: About
 * 
 * About page for 1976 London - your story and journey
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

        <!-- About Content with Dashboard Styling -->
        <div class="dashboard-content">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <!-- Beautiful Page Header - Gallery Style -->
                    <div class="dashboard-header">
                        <div class="dashboard-title">
                            <h1>🎨 Technical Excellence & Innovation</h1>
                        </div>
                        <div class="dashboard-subtitle">
                            Advanced WordPress development, performance optimization, and innovative problem-solving
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <!-- Dashboard Section for Technical Showcase -->
            <div class="dashboard-section">
                <h2>💻 Professional Development Portfolio</h2>
                <p>Innovative technical solutions and advanced WordPress engineering</p>

                <!-- About Grid Layout -->
                <div class="about-grid">

                    <!-- Main About Content -->
                    <div class="about-main">
                        <?php if (get_the_content()) : ?>
                            <div class="about-intro">
                                <?php the_content(); ?>
                            </div>
                        <?php else : ?>
                            <div class="about-intro">
                                <h2>🚀 Technical Excellence & Innovation</h2>
                                <p>This site represents advanced WordPress development, performance optimization, and innovative problem-solving. Built on proven architecture with cutting-edge frontend technologies and professional development practices.</p>

                                <h3>🎨 Signature Development Innovations</h3>
                                <p><strong>Glassmorphism Panel System:</strong> Custom CSS implementation featuring multi-layer depth effects, advanced backdrop-filter blur, and responsive transparency management. Creates premium aesthetic with optimal performance.</p>

                                <p><strong>96% Viewport Modal System:</strong> Professional-grade image and content viewing experience with smooth animations, keyboard navigation, and mobile-optimized responsive scaling.</p>

                                <p><strong>Performance-First Architecture:</strong> Strategic removal of resource-heavy animations in favor of smooth, stable user experiences. Cross-device optimization ensuring excellent performance on desktop, tablet, and mobile platforms.</p>

                                <h3>🛠️ Technical Problem-Solving</h3>
                                <p><strong>WordPress Media Library Integration:</strong> Seamless connection between custom gallery systems and WordPress native media management. Dynamic content loading with intelligent fallback systems.</p>

                                <p><strong>Responsive 2x2 Grid Architecture:</strong> Professional layout system adapting from desktop 2x2 display to mobile single-column, maintaining visual hierarchy and user experience consistency.</p>

                                <p><strong>Clean Code Practices:</strong> Modular CSS architecture, performance-safe JavaScript implementation, and WordPress best practices compliance throughout.</p>
                            </div>
                        <?php endif; ?>

                        <!-- Technical Features Showcase -->
                        <div class="technical-features">
                            <h3>💻 Featured Technical Implementations</h3>

                            <div class="feature-grid">
                                <div class="feature-card">
                                    <h4>🚀 Enterprise SEO System</h4>
                                    <p><strong>Innovation:</strong> Custom JSON-LD schema markup, Open Graph optimization, and mobile browser theming for superior search engine visibility.</p>
                                    <p><strong>Result:</strong> Professional-grade SEO that outperforms plugin-based solutions.</p>
                                </div>

                                <div class="feature-card">
                                    <h4>🎨 Glassmorphism Architecture</h4>
                                    <p><strong>Solution:</strong> Multi-layer CSS with backdrop-filter blur, responsive transparency, and cross-device compatibility.</p>
                                    <p><strong>Impact:</strong> Premium aesthetic with optimal performance on all platforms.</p>
                                </div>

                                <div class="feature-card">
                                    <h4>📱 Cross-Platform Design</h4>
                                    <p><strong>Design:</strong> Mobile-first responsive system with breakpoints optimized for phones, tablets, and desktop displays.</p>
                                    <p><strong>Benefit:</strong> Consistent excellence across all devices and screen sizes.</p>
                                </div>

                                <div class="feature-card">
                                    <h4>💬 Professional Contact System</h4>
                                    <p><strong>Achievement:</strong> Advanced form validation, spam protection, and professional email handling with glassmorphism design.</p>
                                    <p><strong>Value:</strong> Enterprise-level client communication with exceptional user experience.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Skills/Interests Section -->
                        <div class="skills-section">
                            <h3>🛠️ Core Development Technologies</h3>
                            <div class="skills-grid">
                                <div class="skill-item advanced">
                                    <h4>WordPress Development</h4>
                                    <p>Custom theme architecture, advanced CSS, performance optimization</p>
                                    <span class="skill-level">Advanced</span>
                                </div>
                                <div class="skill-item advanced">
                                    <h4>Frontend Technologies</h4>
                                    <p>HTML5, CSS3, JavaScript, responsive design, glassmorphism effects</p>
                                    <span class="skill-level">Advanced</span>
                                </div>
                                <div class="skill-item advanced">
                                    <h4>Performance Optimization</h4>
                                    <p>Cross-platform compatibility, mobile-first design, enterprise-level performance tuning</p>
                                    <span class="skill-level">Advanced</span>
                                </div>
                                <div class="skill-item advanced">
                                    <h4>Professional Workflow</h4>
                                    <p>GitHub branching, release packaging, LocalWP development, VS Code + Intelephense tooling</p>
                                    <span class="skill-level">Advanced</span>
                                </div>
                                <div class="skill-item advanced">
                                    <h4>AI-Assisted Development</h4>
                                    <p>Prompt-led implementation, rapid refactoring, code quality checks, and production-safe deployment workflows</p>
                                    <span class="skill-level">Advanced</span>
                                </div>
                                <div class="skill-item advanced">
                                    <h4>Deployment & QA</h4>
                                    <p>Clean zip delivery, cache-busting version control, permissions hardening, and cross-device validation</p>
                                    <span class="skill-level">Advanced</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Side Info -->
                    <div class="about-sidebar">

                        <!-- Profile Image (placeholder) -->
                        <!-- Add profile image here when needed -->

                        <!-- Technical Specifications -->
                        <div class="quick-facts">
                            <h3>⚡ Technical Specifications</h3>
                            <ul>
                                <li><strong>Architecture:</strong> Custom WordPress theme with modular CSS</li>
                                <li><strong>Performance:</strong> Cross-platform optimization (Desktop, Tablet, Mobile)</li>
                                <li><strong>Responsive Design:</strong> Mobile-first with 768px, 1024px breakpoints</li>
                                <li><strong>Modal System:</strong> 96% viewport with backdrop-filter blur</li>
                                <li><strong>Integration:</strong> WordPress Media Library native connection</li>
                                <li><strong>Code Quality:</strong> Professional Git workflow, VS Code development</li>
                                <li><strong>Innovation:</strong> Glassmorphism panels with multi-layer shadows</li>
                            </ul>
                        </div>

                        <!-- Timeline Section -->
                        <div class="timeline-section">
                            <h3>🚀 Development Milestones</h3>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-year">May 2026</div>
                                    <div class="timeline-event">Delivered production-ready v5 release with mobile scroll fixes, color normalization, and hardened deployment workflow</div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year">May 2026</div>
                                    <div class="timeline-event">Introduced clean packaging pipeline, cache-busting release versioning, and GitHub synchronization for safer updates</div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year">May 2026</div>
                                    <div class="timeline-event">Expanded interactive websites showcase with live preview cards and screenshot-backed portfolio entries</div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year">Jan 2026</div>
                                    <div class="timeline-event">Launched sophisticated dashboard system with real-time analytics, media management, and glassmorphism UI</div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year">Dec 2025</div>
                                    <div class="timeline-event">Implemented enterprise-level SEO with custom schema markup and mobile browser theming</div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year">Dec 2025</div>
                                    <div class="timeline-event">Enhanced contact form system with professional glassmorphism design and validation</div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year">Nov 2025</div>
                                    <div class="timeline-event">Developed comprehensive responsive design system with cross-device optimization</div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year">Nov 2025</div>
                                    <div class="timeline-event">Created modular CSS architecture with performance-first approach</div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year">Oct 2025</div>
                                    <div class="timeline-event">Implemented 96% viewport modal system and glassmorphism panel architecture</div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year">Oct 2025</div>
                                    <div class="timeline-event">Established professional development environment with Git workflow</div>
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