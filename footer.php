<footer id="colophon" class="site-footer">
    <div class="site-info">
        <p>&copy; <?php echo date('Y'); ?> 1976 London. All rights reserved.</p>
        <p><?php esc_html_e('Proudly powered by WordPress', '1976-london-theme'); ?></p>
    </div><!-- .site-info -->
</footer><!-- #colophon -->

<!-- GitHub Icon - Fixed Bottom Right -->
<a href="https://github.com/stuartlondon/1976london" target="_blank" rel="noopener noreferrer" class="github-corner-link" aria-label="View source on GitHub">
    <svg class="github-corner-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
    </svg>
</a>

<style>
    .github-corner-link {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.12);
        border: 1.5px solid rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(8px);
        transition: background 0.25s ease, transform 0.25s ease, border-color 0.25s ease;
        text-decoration: none;
    }

    .github-corner-link:hover {
        background: rgba(255, 255, 255, 0.22);
        border-color: rgba(255, 255, 255, 0.5);
        transform: scale(1.12);
    }

    .github-corner-icon {
        width: 20px;
        height: 20px;
        fill: rgba(255, 255, 255, 0.85);
        display: block;
    }
</style>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>