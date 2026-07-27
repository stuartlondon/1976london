<?php

/**
 * 1976 London Theme Functions
 * 
 * Custom WordPress theme for creative professionals featuring
 * integrated dashboard, real-time analytics, and media management.
 * 
 * @package 1976_London_Theme
 * @author Stuart Hunt <contact@1976.london>
 * @version 2.0.0
 * @since 1.0.0
 * @link https://1976.london
 * 
 * Developed by Stuart Hunt - Creative Technologist
 * Specialized WordPress solutions for creative industries
 * © 2025-2026 All Rights Reserved
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// --- Enhanced Contact Form Handler with Gmail Forwarding & Spam Protection ---
add_action('init', function () {
    if (
        isset($_POST['artist_contact_form_submitted']) &&
        isset($_POST['name'], $_POST['email'], $_POST['message']) &&
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['message']) &&
        isset($_POST['contact_nonce']) &&
        wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')
    ) {
        // Basic spam protection
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';

        // Simple honeypot check (add hidden field to form)
        if (!empty($_POST['website'])) {
            error_log('Spam detected (honeypot triggered) from IP: ' . $ip);
            wp_safe_redirect(add_query_arg('contact_status', 'error', wp_get_referer()));
            exit;
        }

        // Rate limiting - only allow 1 submission per minute per IP
        $submission_key = 'contact_submission_' . md5($ip);
        $last_submission = get_transient($submission_key);
        if ($last_submission) {
            error_log('Rate limit exceeded from IP: ' . $ip);
            wp_safe_redirect(add_query_arg('contact_status', 'error', wp_get_referer()));
            exit;
        }
        set_transient($submission_key, time(), 60); // 1 minute cooldown

        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone'] ?? '');
        $company = sanitize_text_field($_POST['company'] ?? '');
        $subject = sanitize_text_field($_POST['subject'] ?? '');
        $project_type = sanitize_text_field($_POST['project-type'] ?? '');
        $budget = sanitize_text_field($_POST['budget'] ?? '');
        $timeline = sanitize_text_field($_POST['timeline'] ?? '');
        $message = sanitize_textarea_field($_POST['message']);

        // Additional spam detection
        $spam_words = ['hello world', 'test', 'generic', 'lorem ipsum', 'click here', 'free money'];
        $combined_text = strtolower($name . ' ' . $subject . ' ' . $message);
        foreach ($spam_words as $spam_word) {
            if (strpos($combined_text, $spam_word) !== false) {
                error_log('Potential spam detected (keyword: ' . $spam_word . ') from: ' . $email);
                // Still process but flag as suspicious
                $subject = '[SUSPICIOUS] ' . $subject;
                break;
            }
        }

        // Log form submission attempt
        error_log('Contact form submitted by: ' . $name . ' (' . $email . ') from IP: ' . $ip);

        // Send the contact enquiry to the primary business inbox.
        $recipients = array(
            'stuart@1976.london'
        );

        $mail_subject = ($subject ? $subject . ' - ' : '') . '1976 London Contact Form';
        $body = "=== 1976 LONDON CONTACT FORM ===\n\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n";
        if ($phone) {
            $body .= "Phone: $phone\n";
        }
        if ($company) {
            $body .= "Company: $company\n";
        }
        $body .= "Project Type: $project_type\n";
        if ($budget) {
            $body .= "Budget: $budget\n";
        }
        if ($timeline) {
            $body .= "Timeline: $timeline\n";
        }
        $body .= "Subject: $subject\n\n";
        $body .= "Message:\n" . $message . "\n\n";
        $body .= "=== TECHNICAL INFO ===\n";
        $body .= "IP Address: $ip\n";
        $body .= "User Agent: $user_agent\n";
        $body .= "Submitted: " . date('Y-m-d H:i:s') . "\n";

        // Enhanced headers for better deliverability
        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'Reply-To: ' . $name . ' <' . $email . '>',
            'From: 1976 London <noreply@' . parse_url(home_url(), PHP_URL_HOST) . '>',
            'X-Mailer: 1976 London Contact Form',
            'X-Originating-IP: ' . $ip
        );

        $success_count = 0;
        if (is_email($email)) {
            // Send to all recipients
            foreach ($recipients as $recipient) {
                error_log('Attempting to send email to: ' . $recipient);

                $individual_success = wp_mail($recipient, $mail_subject, $body, $headers);

                if ($individual_success) {
                    error_log('Email sent successfully to: ' . $recipient);
                    $success_count++;
                } else {
                    error_log('Email failed to: ' . $recipient);

                    // Try fallback with PHP mail()
                    $php_headers = implode("\r\n", array(
                        "From: 1976 London <noreply@" . parse_url(home_url(), PHP_URL_HOST) . ">",
                        "Reply-To: " . $name . " <" . $email . ">",
                        "Content-Type: text/plain; charset=UTF-8",
                        "X-Mailer: 1976 London Contact Form",
                        "X-Originating-IP: " . $ip
                    ));

                    $php_success = mail($recipient, $mail_subject, $body, $php_headers);
                    if ($php_success) {
                        error_log('PHP mail() backup successful to: ' . $recipient);
                        $success_count++;
                    } else {
                        error_log('PHP mail() backup failed to: ' . $recipient);
                    }
                }
            }
        } else {
            error_log('Invalid email address provided: ' . $email);
        }

        // Determine overall success
        $overall_success = $success_count > 0;

        // Redirect back to the form page with status
        $contact_page_url = get_permalink(get_page_by_path('contact'));
        $redirect_url = add_query_arg([
            'contact_status' => $overall_success ? 'success' : 'error',
        ], wp_get_referer() ?: $contact_page_url);

        error_log('Redirecting to: ' . $redirect_url . ' with status: ' . ($overall_success ? 'success' : 'error') . ' (sent to ' . $success_count . ' recipients)');

        wp_safe_redirect($redirect_url);
        exit;
    }
});

// --- Fixed Email Configuration - Use PHP Mail Instead of SMTP ---
// Since server can send emails but SMTP fails, use PHP mail() directly
function configure_wp_mail_php()
{
    add_action('phpmailer_init', 'configure_phpmailer_php_mail');
}
add_action('init', 'configure_wp_mail_php');

function configure_phpmailer_php_mail($phpmailer)
{
    // Use PHP mail() function instead of SMTP since server supports it
    $phpmailer->isMail(); // This tells PHPMailer to use PHP mail() instead of SMTP

    // Set proper From address using your domain
    $domain = parse_url(home_url(), PHP_URL_HOST);
    $phpmailer->From = 'noreply@' . $domain;
    $phpmailer->FromName = get_bloginfo('name');

    // Set proper encoding
    $phpmailer->CharSet = 'UTF-8';
    $phpmailer->Encoding = '8bit';

    // Disable SMTP completely
    $phpmailer->SMTPDebug = 0;

    // Add some basic headers for better deliverability
    $phpmailer->addCustomHeader('X-Mailer', 'WordPress via PHP mail()');
}

// Add email testing functionality to admin
function add_email_test_to_admin()
{
    if (current_user_can('administrator') && isset($_GET['test_email']) && $_GET['test_email'] === 'send') {
        $test_result = wp_mail(
            get_option('admin_email'),
            'Test Email from ' . get_bloginfo('name'),
            'This is a test email sent at ' . date('Y-m-d H:i:s') . ' to verify email functionality.'
        );

        add_action('admin_notices', function () use ($test_result) {
            $class = $test_result ? 'notice-success' : 'notice-error';
            $message = $test_result ? 'Test email sent successfully!' : 'Test email failed to send. Check error logs.';
            echo '<div class="notice ' . $class . ' is-dismissible"><p>' . $message . '</p></div>';
        });
    }
}
add_action('admin_init', 'add_email_test_to_admin');

// Add email test button to admin bar
function add_email_test_admin_bar($wp_admin_bar)
{
    if (current_user_can('administrator')) {
        $wp_admin_bar->add_node(array(
            'id' => 'test_email',
            'title' => 'Test Email',
            'href' => admin_url('?test_email=send'),
        ));
    }
}
add_action('admin_bar_menu', 'add_email_test_admin_bar', 999);

// Theme setup function
function theme_1976_setup()
{
    // Add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // Add support for title tag
    add_theme_support('title-tag');

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Add theme support for menus
    add_theme_support('menus');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', '1976-london-theme'),
        'side-panel' => __('Side Panel Menu', '1976-london-theme'),
    ));

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'theme_1976_setup');

// Register Custom Post Type for Weekly Updates
function create_weekly_updates_post_type()
{
    $labels = array(
        'name'                  => _x('Weekly Updates', 'Post Type General Name', '1976-london-theme'),
        'singular_name'         => _x('Weekly Update', 'Post Type Singular Name', '1976-london-theme'),
        'menu_name'             => __('This Week...', '1976-london-theme'),
        'name_admin_bar'        => __('Weekly Update', '1976-london-theme'),
        'archives'              => __('Weekly Archives', '1976-london-theme'),
        'attributes'            => __('Weekly Attributes', '1976-london-theme'),
        'parent_item_colon'     => __('Parent Weekly Update:', '1976-london-theme'),
        'all_items'             => __('All Weekly Updates', '1976-london-theme'),
        'add_new_item'          => __('Add New Weekly Update', '1976-london-theme'),
        'add_new'               => __('Add New', '1976-london-theme'),
        'new_item'              => __('New Weekly Update', '1976-london-theme'),
        'edit_item'             => __('Edit Weekly Update', '1976-london-theme'),
        'update_item'           => __('Update Weekly Update', '1976-london-theme'),
        'view_item'             => __('View Weekly Update', '1976-london-theme'),
        'view_items'            => __('View Weekly Updates', '1976-london-theme'),
        'search_items'          => __('Search Weekly Updates', '1976-london-theme'),
        'not_found'             => __('Not found', '1976-london-theme'),
        'not_found_in_trash'    => __('Not found in Trash', '1976-london-theme'),
        'featured_image'        => __('Weekly Image', '1976-london-theme'),
        'set_featured_image'    => __('Set weekly image', '1976-london-theme'),
        'remove_featured_image' => __('Remove weekly image', '1976-london-theme'),
        'use_featured_image'    => __('Use as weekly image', '1976-london-theme'),
        'insert_into_item'      => __('Insert into weekly update', '1976-london-theme'),
        'uploaded_to_this_item' => __('Uploaded to this weekly update', '1976-london-theme'),
        'items_list'            => __('Weekly updates list', '1976-london-theme'),
        'items_list_navigation' => __('Weekly updates list navigation', '1976-london-theme'),
        'filter_items_list'     => __('Filter weekly updates list', '1976-london-theme'),
    );

    $args = array(
        'label'                 => __('Weekly Update', '1976-london-theme'),
        'description'           => __('Weekly artistic updates and insights', '1976-london-theme'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-calendar-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Enables Gutenberg editor and mobile app support
        'rest_base'             => 'weekly-updates', // Custom REST API endpoint
        'rest_controller_class' => 'WP_REST_Posts_Controller', // Use standard posts controller
    );

    register_post_type('weekly_update', $args);
}
add_action('init', 'create_weekly_updates_post_type', 0);

// Ensure Weekly Updates appear in mobile app
function ensure_weekly_updates_in_rest_api()
{
    // Force refresh of rewrite rules to ensure REST endpoints work
    if (get_option('weekly_updates_rest_refresh') !== 'done') {
        flush_rewrite_rules();
        update_option('weekly_updates_rest_refresh', 'done');
    }
}
add_action('init', 'ensure_weekly_updates_in_rest_api', 1);

// Add custom capabilities for Weekly Updates
function add_weekly_updates_capabilities()
{
    $role = get_role('administrator');
    if ($role) {
        $role->add_cap('edit_weekly_updates');
        $role->add_cap('edit_others_weekly_updates');
        $role->add_cap('publish_weekly_updates');
        $role->add_cap('read_private_weekly_updates');
        $role->add_cap('delete_weekly_updates');
        $role->add_cap('delete_private_weekly_updates');
        $role->add_cap('delete_published_weekly_updates');
        $role->add_cap('delete_others_weekly_updates');
        $role->add_cap('edit_private_weekly_updates');
        $role->add_cap('edit_published_weekly_updates');
    }
}
add_action('admin_init', 'add_weekly_updates_capabilities');

// Enqueue modular CSS and scripts - NEW ARCHITECTURE!
function creative_theme_scripts()
{
    // Version for cache busting
    $version = '2.1.0'; // Cache bust - phase 2 flagship 3-page foundation

    // Core styles (typography, colors, global elements)
    wp_enqueue_style(
        '1976london-core',
        get_template_directory_uri() . '/assets/css/core.css',
        array(),
        $version
    );

    // Layout styles (grid systems, containers, responsive)
    wp_enqueue_style(
        '1976london-layout',
        get_template_directory_uri() . '/assets/css/layout.css',
        array('1976london-core'),
        $version
    );

    // Component styles (cards, buttons, modals)
    wp_enqueue_style(
        '1976london-components',
        get_template_directory_uri() . '/assets/css/components.css',
        array('1976london-layout'),
        $version
    );

    // Page-specific styles
    if (is_front_page()) {
        wp_enqueue_style(
            '1976london-homepage',
            get_template_directory_uri() . '/assets/css/pages/homepage.css',
            array('1976london-components'),
            $version
        );
    }

    // About page styles
    if (is_page('about') || is_page_template('page-about.php')) {
        wp_enqueue_style(
            '1976london-about',
            get_template_directory_uri() . '/assets/css/pages/about.css',
            array('1976london-components'),
            $version
        );
    }

    // Contact page styles
    if (is_page('contact') || is_page_template('page-contact.php')) {
        wp_enqueue_style(
            '1976london-contact',
            get_template_directory_uri() . '/assets/css/pages/contact.css',
            array('1976london-components'),
            $version
        );
    }

    // Debug styles (only load when needed)
    if (isset($_GET['debug']) && $_GET['debug'] === 'layout') {
        wp_enqueue_style(
            '1976london-debug',
            get_template_directory_uri() . '/assets/css/debug.css',
            array('1976london-components'),
            $version
        );

        // Add debug class to body
        add_filter('body_class', function ($classes) {
            $classes[] = 'debug-layout';
            return $classes;
        });
    }

    // Keep the existing JavaScript
    wp_enqueue_script('1976london-creative-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), $version, true);

}
add_action('wp_enqueue_scripts', 'creative_theme_scripts');

function theme_1976_clean_styles()
{
    // Only remove block library styles if not using Gutenberg blocks
    // This keeps accessibility styles while removing potential @import issues
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'theme_1976_clean_styles', 1);

// ===== PROFESSIONAL SEO OPTIMIZATION =====

// Add professional meta tags and Open Graph data
function creative_theme_seo_head()
{
    global $post;

    // Get page information
    $site_name = get_bloginfo('name');
    $site_description = get_bloginfo('description');
    $site_url = home_url();

    if (is_front_page()) {
        $title = $site_name . ' | ' . $site_description;
        $description = 'Professional WordPress development and creative technology solutions. Specialized in glassmorphism design, performance optimization, and custom theme development.';
        $url = $site_url;
    } elseif (is_page()) {
        $title = get_the_title() . ' | ' . $site_name;
        $description = get_the_excerpt() ?: 'Professional creative technology services and WordPress development by 1976 London.';
        $url = get_permalink();
    } else {
        $title = wp_get_document_title();
        $description = $site_description;
        $url = $site_url;
    }

    // Clean up description
    $description = wp_strip_all_tags($description);
    $description = substr($description, 0, 160);

    echo "\n<!-- 1976 London SEO Meta Tags -->\n";
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">' . "\n";

    // Open Graph meta tags for social sharing
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";
    echo '<meta property="og:locale" content="en_GB">' . "\n";

    // Twitter Card meta tags
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";

    // Canonical URL
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
    echo "<!-- End 1976 London SEO -->\n\n";
}
add_action('wp_head', 'creative_theme_seo_head', 1);

// Add JSON-LD Schema markup for better search engine understanding
function creative_theme_schema_markup()
{
    $site_name = get_bloginfo('name');
    $site_url = home_url();

    // Organization Schema
    $organization_schema = array(
        "@context" => "https://schema.org",
        "@type" => "Organization",
        "name" => $site_name,
        "url" => $site_url,
        "description" => "Professional WordPress development and creative technology solutions specializing in custom themes, performance optimization, and innovative design.",
        "address" => array(
            "@type" => "PostalAddress",
            "addressCountry" => "GB"
        ),
        "contactPoint" => array(
            "@type" => "ContactPoint",
            "contactType" => "customer service",
            "url" => $site_url . "/contact"
        ),
        "sameAs" => array(
            "https://github.com/1976ukstu",
            "https://www.upwork.com/freelancers/~01d3e9362798a7a655",
            "https://linkedin.com/in/stuart-hunt-1976uk"
        )
    );

    // Website Schema
    $website_schema = array(
        "@context" => "https://schema.org",
        "@type" => "WebSite",
        "name" => $site_name,
        "url" => $site_url,
        "description" => get_bloginfo('description'),
        "publisher" => array(
            "@type" => "Organization",
            "name" => $site_name
        )
    );

    echo '<script type="application/ld+json">';
    echo json_encode($organization_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    echo '</script>';
    echo '<script type="application/ld+json">';
    echo json_encode($website_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    echo '</script>';
}
add_action('wp_head', 'creative_theme_schema_markup', 2);

// Add page-specific schema markup
function creative_theme_page_specific_schema()
{
    if (is_page('portfolio')) {
        // Professional Service schema for Portfolio page
        $portfolio_schema = array(
            "@context" => "https://schema.org",
            "@type" => "ProfessionalService",
            "name" => "WordPress Development & Creative Technology",
            "provider" => array(
                "@type" => "Organization",
                "name" => get_bloginfo('name')
            ),
            "serviceType" => "Web Development",
            "description" => "Professional WordPress development, custom theme creation, and creative technology solutions.",
            "areaServed" => array(
                "@type" => "Country",
                "name" => "United Kingdom"
            ),
            "hasOfferCatalog" => array(
                "@type" => "OfferCatalog",
                "name" => "Development Services",
                "itemListElement" => array(
                    array(
                        "@type" => "Offer",
                        "itemOffered" => array(
                            "@type" => "Service",
                            "name" => "WordPress Development"
                        )
                    ),
                    array(
                        "@type" => "Offer",
                        "itemOffered" => array(
                            "@type" => "Service",
                            "name" => "Custom Theme Creation"
                        )
                    ),
                    array(
                        "@type" => "Offer",
                        "itemOffered" => array(
                            "@type" => "Service",
                            "name" => "Performance Optimization"
                        )
                    )
                )
            )
        );

        echo '<script type="application/ld+json">';
        echo json_encode($portfolio_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        echo '</script>';
    }

    if (is_page('contact')) {
        // Contact Page schema
        $contact_schema = array(
            "@context" => "https://schema.org",
            "@type" => "ContactPage",
            "name" => "Contact 1976 London",
            "description" => "Get in touch for professional WordPress development and creative technology services.",
            "mainEntity" => array(
                "@type" => "Organization",
                "name" => get_bloginfo('name'),
                "contactPoint" => array(
                    "@type" => "ContactPoint",
                    "contactType" => "customer service",
                    "url" => home_url('/contact'),
                    "availableLanguage" => "English"
                )
            )
        );

        echo '<script type="application/ld+json">';
        echo json_encode($contact_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        echo '</script>';
    }
}
add_action('wp_head', 'creative_theme_page_specific_schema', 3);

// Add FAQ Schema for services (helps with voice search)
function creative_theme_faq_schema()
{
    if (is_page('about') || is_page('portfolio')) {
        $faq_schema = array(
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "mainEntity" => array(
                array(
                    "@type" => "Question",
                    "name" => "What services does 1976 London offer?",
                    "acceptedAnswer" => array(
                        "@type" => "Answer",
                        "text" => "We specialize in WordPress development, custom theme creation, performance optimization, glassmorphism design, and creative technology solutions."
                    )
                ),
                array(
                    "@type" => "Question",
                    "name" => "Do you work with businesses outside the UK?",
                    "acceptedAnswer" => array(
                        "@type" => "Answer",
                        "text" => "Yes, we work with clients globally, offering remote WordPress development and creative technology services."
                    )
                ),
                array(
                    "@type" => "Question",
                    "name" => "What makes your WordPress development different?",
                    "acceptedAnswer" => array(
                        "@type" => "Answer",
                        "text" => "We focus on clean-code architecture, performance optimization, and innovative glassmorphism design while maintaining professional WordPress standards."
                    )
                )
            )
        );

        echo '<script type="application/ld+json">';
        echo json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        echo '</script>';
    }
}
add_action('wp_head', 'creative_theme_faq_schema', 4);

// Add breadcrumb schema for better navigation understanding
function creative_theme_breadcrumb_schema()
{
    if (!is_front_page() && is_page()) {
        $breadcrumb_schema = array(
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => array(
                array(
                    "@type" => "ListItem",
                    "position" => 1,
                    "name" => "Home",
                    "item" => home_url()
                ),
                array(
                    "@type" => "ListItem",
                    "position" => 2,
                    "name" => get_the_title(),
                    "item" => get_permalink()
                )
            )
        );

        echo '<script type="application/ld+json">';
        echo json_encode($breadcrumb_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        echo '</script>';
    }
}
add_action('wp_head', 'creative_theme_breadcrumb_schema', 5);

// SEO-friendly sitemap generation hint for search engines
function creative_theme_seo_hints()
{
    if (is_front_page()) {
        // Add hreflang for international SEO (if needed later)
        echo '<link rel="alternate" hreflang="en-gb" href="' . home_url() . '" />' . "\n";
        echo '<link rel="alternate" hreflang="en" href="' . home_url() . '" />' . "\n";

        // Preconnect to external domains for performance
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";

        // DNS prefetch for external services
        echo '<link rel="dns-prefetch" href="//github.com">' . "\n";
        echo '<link rel="dns-prefetch" href="//upwork.com">' . "\n";
        echo '<link rel="dns-prefetch" href="//linkedin.com">' . "\n";
    }
}
add_action('wp_head', 'creative_theme_seo_hints', 6);

// Enhanced title tag optimization
function creative_theme_document_title_parts($title_parts)
{
    if (is_front_page()) {
        $title_parts['title'] = '1976 London | Professional WordPress Development & Creative Technology';
        unset($title_parts['tagline']);
    } elseif (is_page('portfolio')) {
        $title_parts['title'] = 'Portfolio | WordPress Development Services | 1976 London';
    } elseif (is_page('contact')) {
        $title_parts['title'] = 'Contact | Get Professional WordPress Development Quote | 1976 London';
    } elseif (is_page('about')) {
        $title_parts['title'] = 'About | Creative Technologist & WordPress Expert | 1976 London';
    }

    return $title_parts;
}
add_filter('document_title_parts', 'creative_theme_document_title_parts');

// ===== CRITICAL SECURITY FIXES =====
// Nonce is now output directly in the contact form via wp_nonce_field() in page-contact.php.

// Add security headers for production
function creative_theme_security_headers()
{
    // Prevent clickjacking
    header('X-Frame-Options: SAMEORIGIN');

    // Prevent MIME type sniffing
    header('X-Content-Type-Options: nosniff');

    // Enable XSS protection
    header('X-XSS-Protection: 1; mode=block');

    // Referrer Policy for privacy
    header('Referrer-Policy: strict-origin-when-cross-origin');
}
add_action('send_headers', 'creative_theme_security_headers');

// Disable file editing from WordPress admin for security
function creative_theme_disable_file_editing()
{
    if (!defined('DISALLOW_FILE_EDIT')) {
        define('DISALLOW_FILE_EDIT', true);
    }
}
add_action('init', 'creative_theme_disable_file_editing');

// Remove WordPress version from head for security
remove_action('wp_head', 'wp_generator');

// Disable XML-RPC for security (already added but ensuring it's here)
add_filter('xmlrpc_enabled', '__return_false');

// Hide WordPress login errors to prevent user enumeration
function creative_theme_hide_login_errors()
{
    return 'Invalid credentials. Please try again.';
}
add_filter('authenticate', function ($user, $username, $password) {
    if (is_wp_error($user) && !empty($username)) {
        error_log('Failed login attempt for username: ' . $username . ' from IP: ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));
    }
    return $user;
}, 30, 3);
add_filter('login_errors', 'creative_theme_hide_login_errors');

// Limit login attempts (basic protection)
function creative_theme_limit_login_attempts()
{
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    $attempts_key = 'login_attempts_' . md5($ip);
    $attempts = get_transient($attempts_key) ?: 0;

    if ($attempts >= 5) {
        wp_die('Too many failed login attempts. Please try again in 15 minutes.', 'Login Blocked', array('response' => 429));
    }

    // Increment attempts on failed login
    add_action('wp_login_failed', function () use ($attempts_key, $attempts) {
        set_transient($attempts_key, $attempts + 1, 15 * MINUTE_IN_SECONDS);
    });

    // Clear attempts on successful login
    add_action('wp_login', function () use ($attempts_key) {
        delete_transient($attempts_key);
    });
}
add_action('wp_authenticate', 'creative_theme_limit_login_attempts', 1);

// Additional custom functions can be added below
