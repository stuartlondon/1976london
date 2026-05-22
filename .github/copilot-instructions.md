# 1976 London Theme — Project Guidelines

## About This Project

This is a custom WordPress theme for `1976.london`, a personal creative portfolio site.
Built by Stuart Hunt — a developer who is actively learning and building at the same time.

**Key fact for Copilot:** Stuart is a motivated learner who has built real, solid things (the contact form security is genuinely good), but may not know the "official" name for things he's implemented intuitively. Explain concepts clearly when introducing them. Don't just fix — explain what you fixed and why, in plain language a junior dev can understand on the train home.

---

## Tech Stack

- **WordPress** (custom theme, no page builder)
- **PHP** for templates and theme logic
- **Vanilla CSS** — modular architecture (core / layout / components / pages)
- **Vanilla JavaScript** — no frameworks
- **LocalWP** for local development
- **Git** for version control (set up May 2026 — relatively new to it)

---

## Theme Conventions

### PHP / WordPress
- Text domain: `1976-london-theme`
- Package name: `1976_London_Theme`
- Function prefix: `theme_1976_` (e.g. `theme_1976_setup()`)
- Security: always use `esc_url()`, `esc_html()`, `sanitize_text_field()` etc.
- Always call `wp_head()` and `wp_footer()` — never remove them
- The theme uses `get_template_part()` for shared components

### Every Page Template Follows This Pattern
```php
get_header();
// Man of Steel gradient background div
// Site title (1976 / London) linking to home_url
// Universal hamburger button
// get_template_part('template-parts/enhanced-universal-menu')
// Main content inside #primary > #main
get_footer();
```
Do not deviate from this pattern when creating new page templates.

### CSS Architecture
- Core styles: `assets/css/core.css` — always loaded
- Layout: `assets/css/layout.css` — always loaded
- Components: `assets/css/components.css` — always loaded
- Page styles: `assets/css/pages/[pagename].css` — loaded only on matching page
- New page CSS must be registered in `creative_theme_scripts()` in `functions.php`
- Version string for cache busting lives in `creative_theme_scripts()` — bump it when CSS changes

### Design Language
- Dark glassmorphism aesthetic
- Background: "Man of Steel" gradient (`#780206` → `#061161`) via `.man-of-steel-gradient`
- All UI elements use frosted glass / backdrop-filter blur
- Emoji are used intentionally in headings (e.g. 🎨 🚀 💬) — keep them
- Font families: Inter and Poppins (loaded via Google Fonts in style.css)

---

## Navigation
- The universal menu lives in `template-parts/enhanced-universal-menu.php`
- Menu items must be `<a href="...">` tags (not `<div onclick>`) for accessibility and SEO
- The Dashboard card uses `<button>` because it opens a modal, not a page

---

## What NOT to Do
- Don't suggest page builders, Elementor, or ACF unless asked
- Don't replace the custom CSS system with Tailwind or Bootstrap
- Don't add jQuery — vanilla JS only
- Don't add plugins without being asked
- Don't use `mycustomtheme` or `Artist_Theme` anywhere — those are old starter template names
- Don't leave `get_sidebar()` calls — there is no sidebar.php in this theme

---

## Communication Style

Stuart learns best when:
- Things are explained in plain English alongside the code fix
- Analogies are used (e.g. "this is like Track Changes in Word")
- The *why* is explained, not just the *what*
- Session journals are offered after complex sessions — he reads them on the train

Be encouraging — this is a real person building a real site to get real work. The effort is genuine.
