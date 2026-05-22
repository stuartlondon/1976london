<?php
/**
 * Template Name: Contact v2.0 - Professional Edition
 * 
 * Enhanced contact page for 1976 London
 * Professional glassmorphism design matching gallery/dashboard standards
 * Inspired by Dragica site copyright page with white stripe animation
 */
get_header();
?>

<!-- Animated White Stripe Background - TEMPORARILY COMMENTED OUT FOR PERFORMANCE -->
<!-- <div class="contact-animated-background">
    <div class="white-stripes">
        <div class="stripe stripe-1"></div>
        <div class="stripe stripe-2"></div>
        <div class="stripe stripe-3"></div>
        <div class="stripe stripe-4"></div>
        <div class="stripe stripe-5"></div>
    </div>
</div> -->

<!-- Man of Steel Gradient Background (#780206 → #061161) -->
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
        
        <!-- Enhanced Contact Page Content -->
        <div class="dashboard-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Dashboard Header -->
                    <div class="dashboard-header">
                        <div class="dashboard-title">
                            <h1>💬 Let's Create Together</h1>
                        </div>
                        <div class="dashboard-subtitle">
                            Ready to transform your digital vision into reality with cutting-edge technology and creative excellence
                        </div>
                    </div>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            
            <!-- Dashboard Section for Contact Form -->
            <div class="dashboard-section">
                <h2>🚀 Start Your Project</h2>
                <p>Whether it's a stunning website, powerful dashboard system, or innovative web application – let's bring your ideas to life</p>
                            
                            <!-- WordPress Content Integration -->
                            <?php if (get_the_content()) : ?>
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Professional Contact Form -->
                            <div class="contact-form-professional">
                                <?php
                                // Status messages for form submissions handled by functions.php
                                $status = $_GET['contact_status'] ?? '';
                                if ($status === 'success') {
                                    echo '<div class="contact-status success">
                                        <div class="status-icon">✅</div>
                                        <div class="status-content">
                                            <h3>Message Sent Successfully!</h3>
                                            <p>Thank you for reaching out! I\'ve received your project inquiry and will get back to you within 24 hours.</p>
                                        </div>
                                    </div>';
                                } elseif ($status === 'error') {
                                    echo '<div class="contact-status error">
                                        <div class="status-icon">❌</div>
                                        <div class="status-content">
                                            <h3>Delivery Failed</h3>
                                            <p>Sorry, there was a technical issue sending your message. Please try again or contact me directly.</p>
                                        </div>
                                    </div>';
                                } elseif ($status === 'missing') {
                                    echo '<div class="contact-status warning">
                                        <div class="status-icon">⚠️</div>
                                        <div class="status-content">
                                            <h3>Missing Information</h3>
                                            <p>Please fill in all required fields (Name, Email, and Message).</p>
                                        </div>
                                    </div>';
                                } elseif ($status === 'spam') {
                                    echo '<div class="contact-status error">
                                        <div class="status-icon">🛡️</div>
                                        <div class="status-content">
                                            <h3>Spam Detected</h3>
                                            <p>Your submission was flagged by our spam protection. Please try again.</p>
                                        </div>
                                    </div>';
                                }
                                ?>
                                
                                <form class="professional-contact-form" action="<?php echo esc_url(get_permalink()); ?>" method="post">
                                    <input type="hidden" name="artist_contact_form_submitted" value="1">
                                    <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                                    
                                    <!-- Enhanced Honeypot -->
                                    <div class="honeypot-field">
                                        <label for="website">Website (leave blank)</label>
                                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                                    </div>
                                    
                                    <!-- Personal Information Section -->
                                    <div class="form-section">
                                        <h3>👤 Contact Information</h3>
                                        <div class="form-grid">
                                            <div class="form-group">
                                                <label for="name">Full Name *</label>
                                                <input type="text" id="name" name="name" required 
                                                       value="<?php echo isset($_POST['name']) ? esc_attr($_POST['name']) : ''; ?>"
                                                       placeholder="Your full name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email Address *</label>
                                                <input type="email" id="email" name="email" required 
                                                       value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>"
                                                       placeholder="your@email.com">
                                            </div>
                                        </div>
                                        <div class="form-grid">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="tel" id="phone" name="phone" 
                                                       value="<?php echo isset($_POST['phone']) ? esc_attr($_POST['phone']) : ''; ?>"
                                                       placeholder="Optional contact number">
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Company/Organization</label>
                                                <input type="text" id="company" name="company" 
                                                       value="<?php echo isset($_POST['company']) ? esc_attr($_POST['company']) : ''; ?>"
                                                       placeholder="Optional company name">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Project Details Section -->
                                    <div class="form-section">
                                        <h3>🎯 Project Details</h3>
                                        <div class="form-group">
                                            <label for="subject">Project Title</label>
                                            <input type="text" id="subject" name="subject" 
                                                   value="<?php echo isset($_POST['subject']) ? esc_attr($_POST['subject']) : ''; ?>"
                                                   placeholder="Brief title for your project">
                                        </div>
                                        
                                        <div class="form-grid">
                                            <div class="form-group">
                                                <label for="project-type">Project Type</label>
                                                <select id="project-type" name="project-type">
                                                    <option value="">Select project type</option>
                                                    <option value="website-design" <?php selected($_POST['project-type'] ?? '', 'website-design'); ?>>🌐 Website Design & Development</option>
                                                    <option value="dashboard-system" <?php selected($_POST['project-type'] ?? '', 'dashboard-system'); ?>>📊 Dashboard/Management System</option>
                                                    <option value="web-application" <?php selected($_POST['project-type'] ?? '', 'web-application'); ?>>⚡ Custom Web Application</option>
                                                    <option value="wordpress-site" <?php selected($_POST['project-type'] ?? '', 'wordpress-site'); ?>>🎨 WordPress Site</option>
                                                    <option value="e-commerce" <?php selected($_POST['project-type'] ?? '', 'e-commerce'); ?>>🛒 E-commerce Solution</option>
                                                    <option value="api-integration" <?php selected($_POST['project-type'] ?? '', 'api-integration'); ?>>🔗 API Integration</option>
                                                    <option value="maintenance" <?php selected($_POST['project-type'] ?? '', 'maintenance'); ?>>🔧 Website Maintenance</option>
                                                    <option value="consultation" <?php selected($_POST['project-type'] ?? '', 'consultation'); ?>>💡 Technical Consultation</option>
                                                    <option value="collaboration" <?php selected($_POST['project-type'] ?? '', 'collaboration'); ?>>🤝 Partnership/Collaboration</option>
                                                    <option value="other" <?php selected($_POST['project-type'] ?? '', 'other'); ?>>🎯 Other/Custom Project</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="budget">Budget Range</label>
                                                <select id="budget" name="budget">
                                                    <option value="">Select budget range</option>
                                                    <option value="under-1k" <?php selected($_POST['budget'] ?? '', 'under-1k'); ?>>💰 Under £1,000</option>
                                                    <option value="1k-5k" <?php selected($_POST['budget'] ?? '', '1k-5k'); ?>>💰 £1,000 - £5,000</option>
                                                    <option value="5k-10k" <?php selected($_POST['budget'] ?? '', '5k-10k'); ?>>💰 £5,000 - £10,000</option>
                                                    <option value="10k-25k" <?php selected($_POST['budget'] ?? '', '10k-25k'); ?>>💰 £10,000 - £25,000</option>
                                                    <option value="25k-plus" <?php selected($_POST['budget'] ?? '', '25k-plus'); ?>>💰 £25,000+</option>
                                                    <option value="discuss" <?php selected($_POST['budget'] ?? '', 'discuss'); ?>>💬 Let's Discuss</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="timeline">Project Timeline</label>
                                            <select id="timeline" name="timeline">
                                                <option value="">Select timeline</option>
                                                <option value="asap" <?php selected($_POST['timeline'] ?? '', 'asap'); ?>>🚀 ASAP/Urgent</option>
                                                <option value="1-month" <?php selected($_POST['timeline'] ?? '', '1-month'); ?>>📅 Within 1 Month</option>
                                                <option value="2-3-months" <?php selected($_POST['timeline'] ?? '', '2-3-months'); ?>>📅 2-3 Months</option>
                                                <option value="3-6-months" <?php selected($_POST['timeline'] ?? '', '3-6-months'); ?>>📅 3-6 Months</option>
                                                <option value="6-months-plus" <?php selected($_POST['timeline'] ?? '', '6-months-plus'); ?>>📅 6+ Months</option>
                                                <option value="flexible" <?php selected($_POST['timeline'] ?? '', 'flexible'); ?>>⏰ Flexible</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <!-- Message Section -->
                                    <div class="form-section">
                                        <h3>💬 Tell Me About Your Vision</h3>
                                        <div class="form-group">
                                            <label for="message">Project Description *</label>
                                            <textarea id="message" name="message" rows="8" required 
                                                      placeholder="Describe your project vision, specific requirements, target audience, key features, technical preferences, or any questions you have. The more detail you provide, the better I can understand and help with your project!"><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="contact-submit-professional">
                                        <span class="btn-icon">🚀</span>
                                        <span class="btn-text">Send Project Inquiry</span>
                                        <span class="btn-arrow">→</span>
                                    </button>
                                </form>
                                
                                <!-- Contact Information Cards -->
                                <div class="contact-info-grid">
                            <div class="info-card response-card">
                                <div class="info-icon">⚡</div>
                                <h3>Quick Response</h3>
                                <p>I typically respond to project inquiries within 24 hours with initial thoughts and next steps.</p>
                            </div>
                            <div class="info-card process-card">
                                <div class="info-icon">🔄</div>
                                <h3>Collaborative Process</h3>
                                <p>Every project starts with a detailed discovery call to understand your vision and requirements.</p>
                            </div>
                            <div class="info-card quality-card">
                                <div class="info-icon">✨</div>
                                <h3>Quality Focused</h3>
                                <p>Professional development with modern technologies, responsive design, and exceptional user experience.</p>
                            </div>
                        </div>
                        
                    </div> <!-- Close dashboard-section -->
                        
                        <?php if (current_user_can('administrator')): ?>
                        <!-- Enhanced Admin Email Test Section -->
                        <div class="admin-email-test-v2">
                            <div class="admin-header">
                                <h3>🔧 Email System Diagnostics (Admin Only)</h3>
                                <p>Advanced email testing and debugging tools for contact form functionality.</p>
                            </div>
                            
                            <?php if (isset($_POST['test_email_now'])): ?>
                                <?php
                                $error_message = '';
                                add_action('wp_mail_failed', function($wp_error) use (&$error_message) {
                                    $error_message = $wp_error->get_error_message();
                                });
                                
                                $test_result = wp_mail(get_option('admin_email'), 'Email Test - ' . date('H:i:s'), 
                                    'Test email sent from enhanced contact page at ' . date('Y-m-d H:i:s') . "\n\nIf you receive this, your WordPress email system is working!");
                                ?>
                                <div class="test-result <?php echo $test_result ? 'success' : 'error'; ?>">
                                    <div class="result-icon"><?php echo $test_result ? '✅' : '❌'; ?></div>
                                    <div class="result-content">
                                        <strong>WordPress Mail Test:</strong> <?php echo $test_result ? 'SUCCESS! wp_mail() function worked correctly.' : 'FAILED! wp_mail() function returned an error.'; ?>
                                        <?php if (!$test_result && $error_message): ?>
                                            <br><span class="error-detail">Error Details: <?php echo esc_html($error_message); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (isset($_POST['test_php_mail'])): ?>
                                <?php
                                $headers = "From: " . get_bloginfo('name') . " <noreply@" . parse_url(home_url(), PHP_URL_HOST) . ">\r\n";
                                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                                $php_result = mail(get_option('admin_email'), 'PHP Mail Test - ' . date('H:i:s'), 
                                    'Direct PHP mail() test sent at ' . date('Y-m-d H:i:s'), $headers);
                                ?>
                                <div class="test-result <?php echo $php_result ? 'success' : 'error'; ?>">
                                    <div class="result-icon"><?php echo $php_result ? '✅' : '❌'; ?></div>
                                    <div class="result-content">
                                        <strong>Server Mail Test:</strong> <?php echo $php_result ? 'SUCCESS! Server can send emails directly.' : 'FAILED! Server cannot send emails.'; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="email-test-controls">
                                <form method="post" class="test-form">
                                    <button type="submit" name="test_email_now" class="test-btn primary">
                                        <span class="btn-icon">📧</span>
                                        Test WordPress Mail
                                    </button>
                                    <button type="submit" name="test_php_mail" class="test-btn secondary">
                                        <span class="btn-icon">🔧</span>
                                        Test Server Mail
                                    </button>
                                </form>
                            </div>
                            
                            <div class="debug-info-v2">
                                <h4>📊 System Information</h4>
                                <div class="debug-grid">
                                    <div class="debug-item">
                                        <strong>Server:</strong> <?php echo $_SERVER['SERVER_NAME']; ?>
                                    </div>
                                    <div class="debug-item">
                                        <strong>PHP mail():</strong> <?php echo function_exists('mail') ? '✅ Available' : '❌ Not Available'; ?>
                                    </div>
                                    <div class="debug-item">
                                        <strong>Admin Email:</strong> <?php echo get_option('admin_email'); ?>
                                    </div>
                                    <div class="debug-item">
                                        <strong>WordPress Version:</strong> <?php echo get_bloginfo('version'); ?>
                                    </div>
                                    <div class="debug-item">
                                        <strong>PHP Version:</strong> <?php echo PHP_VERSION; ?>
                                    </div>
                                    <div class="debug-item">
                                        <strong>Site URL:</strong> <?php echo home_url(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                    </div>
        
        </div> <!-- Close dashboard-content -->
        
    </main>
</div>



<?php get_footer(); ?>