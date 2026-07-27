# 1976 London Theme - Agent Instructions

This is a custom WordPress theme for a service-led portfolio site. Keep changes small, practical, and aligned to the goal of generating paid website work.

## Start Here

- Read [README.md](README.md) for the current theme overview and folder map.
- Primary integration file is [functions.php](functions.php).
- Shared navigation is [template-parts/enhanced-universal-menu.php](template-parts/enhanced-universal-menu.php).

## Validation

- Lint changed PHP files with `php -l path/to/file.php`.
- There is no npm/composer build pipeline in this repo; use targeted linting and browser checks.
- For layout diagnostics, open pages with `?debug=layout` to load [assets/css/debug.css](assets/css/debug.css).
- Responsive QA breakpoints: 320, 375, 481-560, 768, 1024+.

## Architecture Map

- Theme setup, enqueueing, SEO, AJAX, and security logic live in [functions.php](functions.php).
- Core templates: [front-page.php](front-page.php), [page-about.php](page-about.php), [page-contact.php](page-contact.php), [page-gallery.php](page-gallery.php), [page-portfolio.php](page-portfolio.php), [page-websites.php](page-websites.php), [404.php](404.php), [archive.php](archive.php).
- Shared markup lives in [template-parts/content.php](template-parts/content.php) and [template-parts/enhanced-universal-menu.php](template-parts/enhanced-universal-menu.php).
- Core CSS: [assets/css/core.css](assets/css/core.css), [assets/css/layout.css](assets/css/layout.css), [assets/css/components.css](assets/css/components.css).
- Page CSS is loaded conditionally from [functions.php](functions.php).
- JS should stay minimal and vanilla. [assets/js/scripts.js](assets/js/scripts.js) currently handles navigation and overlay recovery.

## Project Conventions

- Use WordPress escaping and sanitization consistently:
	- Output: `esc_html`, `esc_attr`, `esc_url`.
	- Input: `sanitize_text_field`, `sanitize_email`, `sanitize_textarea_field`, `esc_url_raw`, `wp_unslash`.
- For AJAX handlers, verify nonces before processing and return with `wp_send_json_success()` or `wp_send_json_error()`.
- Keep the site focused on commercial outcomes: service pages, proof of work, and contact conversion.
- Do not reintroduce dashboard, analytics, gallery-upload, or prototype/admin test UI into public pages unless explicitly requested.
- Keep modular CSS. If adding a new page stylesheet, enqueue it conditionally in `creative_theme_scripts()`.
- Preserve the current template pattern: `get_header()`, site title/menu include, main content wrappers, `get_footer()`.

## Known Gotchas

- Cache busting depends on `$version` in `creative_theme_scripts()` in [functions.php](functions.php); bump it when CSS/JS changes do not appear.
- Several public AJAX endpoints were removed in Phase 1. Keep new public handlers narrow and authenticated where possible.
- Existing JS includes overlay reset and scroll recovery logic; test menus/modals after editing navigation or page wrappers.
- The archive template now uses an inline no-results message instead of a missing content-none part.

## Change Checklist

- Keep style and naming aligned with nearby code.
- Avoid unrelated refactors.
- Lint edited PHP files.
- Verify changed templates/components render without PHP warnings.
- Summarize what changed and why, with file paths.

## Additional Context

- Historical guidance in [Old-.md's-Not Needed /copilot-instructions.md](Old-.md's-Not%20Needed%20/copilot-instructions.md) is archived and not canonical.
