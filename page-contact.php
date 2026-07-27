<?php
/**
 * Template Name: Contact
 *
 * Flagship contact page for the 3-page client-facing site.
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

<div id="primary" class="content-area flagship-contact-primary">
    <main id="main" class="site-main flagship-contact-main">
        <section class="flagship-contact-hero" aria-labelledby="contact-title">
            <p class="contact-eyebrow">Ready To Start</p>
            <h1 id="contact-title">Tell Me What You Need, I Will Reply Within 24 Hours</h1>
            <p>Whether you need a custom WordPress build, a cleaner template-based launch, or a portfolio that actually converts, this form is the fastest way to get moving.</p>
        </section>

        <?php
        $status = $_GET['contact_status'] ?? '';
        if ($status === 'success') {
            echo '<div class="flagship-contact-status success"><strong>Message sent.</strong> I have your brief and will reply within 24 hours.</div>';
        } elseif ($status === 'error') {
            echo '<div class="flagship-contact-status error"><strong>Delivery issue.</strong> Please try again, or email me directly at stuart@1976.london.</div>';
        }
        ?>

        <section class="flagship-contact-shell" aria-label="Contact form and process">
            <form class="flagship-contact-form" action="<?php echo esc_url(get_permalink()); ?>" method="post">
                <input type="hidden" name="artist_contact_form_submitted" value="1">
                <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>

                <div class="honeypot-field">
                    <label for="website">Website (leave blank)</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>

                <div class="flagship-contact-grid two-up">
                    <div class="flagship-field">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" required value="<?php echo isset($_POST['name']) ? esc_attr($_POST['name']) : ''; ?>" placeholder="Your name">
                    </div>

                    <div class="flagship-field">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" placeholder="you@business.com">
                    </div>
                </div>

                <div class="flagship-contact-grid two-up">
                    <div class="flagship-field">
                        <label for="project-type">Project Type</label>
                        <select id="project-type" name="project-type">
                            <option value="">Select one</option>
                            <option value="custom-wordpress" <?php selected($_POST['project-type'] ?? '', 'custom-wordpress'); ?>>Custom WordPress Website</option>
                            <option value="template-based" <?php selected($_POST['project-type'] ?? '', 'template-based'); ?>>Template-Based Website</option>
                            <option value="small-business" <?php selected($_POST['project-type'] ?? '', 'small-business'); ?>>Small Business Website</option>
                            <option value="portfolio" <?php selected($_POST['project-type'] ?? '', 'portfolio'); ?>>Creative Portfolio Website</option>
                            <option value="other" <?php selected($_POST['project-type'] ?? '', 'other'); ?>>Other</option>
                        </select>
                    </div>

                    <div class="flagship-field">
                        <label for="budget">Budget</label>
                        <select id="budget" name="budget">
                            <option value="">Select one</option>
                            <option value="1k-3k" <?php selected($_POST['budget'] ?? '', '1k-3k'); ?>>1k - 3k</option>
                            <option value="3k-6k" <?php selected($_POST['budget'] ?? '', '3k-6k'); ?>>3k - 6k</option>
                            <option value="6k-plus" <?php selected($_POST['budget'] ?? '', '6k-plus'); ?>>6k+</option>
                            <option value="lets-discuss" <?php selected($_POST['budget'] ?? '', 'lets-discuss'); ?>>Let us discuss</option>
                        </select>
                    </div>
                </div>

                <div class="flagship-field">
                    <label for="timeline">Timeline</label>
                    <select id="timeline" name="timeline">
                        <option value="">Select one</option>
                        <option value="asap" <?php selected($_POST['timeline'] ?? '', 'asap'); ?>>ASAP</option>
                        <option value="2-4-weeks" <?php selected($_POST['timeline'] ?? '', '2-4-weeks'); ?>>2-4 weeks</option>
                        <option value="1-2-months" <?php selected($_POST['timeline'] ?? '', '1-2-months'); ?>>1-2 months</option>
                        <option value="flexible" <?php selected($_POST['timeline'] ?? '', 'flexible'); ?>>Flexible</option>
                    </select>
                </div>

                <div class="flagship-field">
                    <label for="message">Project Brief *</label>
                    <textarea id="message" name="message" rows="7" required placeholder="What do you need your website to do, and who do you want it to attract?"><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
                </div>

                <button type="submit" class="flagship-contact-submit">Send Project Brief</button>
            </form>

            <aside class="flagship-contact-aside" aria-label="How this works">
                <h2>What Happens Next</h2>
                <ol>
                    <li>You send your brief.</li>
                    <li>I reply with recommendations and next steps.</li>
                    <li>We confirm scope, timeline, and launch plan.</li>
                </ol>
                <p class="contact-direct-note">Prefer direct email? Reach me at <a href="mailto:stuart@1976.london">stuart@1976.london</a>.</p>
                <p class="contact-direct-note">Prefer phone? Call 07903 541305 - please leave a message and we will get back to you asap.</p>
            </aside>
        </section>
    </main>
</div>

<?php get_footer(); ?>