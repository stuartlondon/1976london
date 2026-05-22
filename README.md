# 1976 London Theme

This is my custom WordPress theme for [`1976.london`](https://1976.london) — a personal creative portfolio and development showcase. I built this site from scratch (with a lot of learning along the way) to explore modern web techniques, glassmorphism design, and clean WordPress development.

**Version:** 2.0.7  
**Author:** Stuart Hunt — [1976 London](https://1976.london)  
**Contact:** stuart@1976.london  
**GitHub:** [stuartlondon/1976london](https://github.com/stuartlondon/1976london)

---

## What This Theme Does

- Custom page templates for: Home, Websites, Gallery, Contact, About, Portfolio, Projects
- Universal hamburger navigation menu (modal-based, accessible `<a>` and `<button>` elements)
- Dashboard modal system for content management and analytics
- Modular CSS — each page only loads the styles it needs (keeps things fast)
- Secure contact form with honeypot, rate limiting, nonce verification, and sanitisation
- GitHub icon (fixed bottom-right) linking to this repo

---

## Project Structure

```
1976-london-theme/
├── assets/
│   ├── css/
│   │   ├── core.css          # Typography, globals, universal menu, base UI
│   │   ├── layout.css        # Spacing, containers, breakpoints, dashboard layout
│   │   ├── components.css    # Reusable cards, buttons, controls
│   │   ├── dashboard-modal.css
│   │   ├── debug.css         # Layout debug helpers (load with ?debug=layout)
│   │   └── pages/            # Page-specific styles (loaded only on relevant page)
│   │       ├── homepage.css
│   │       ├── websites.css
│   │       ├── gallery.css
│   │       ├── contact.css
│   │       ├── portfolio.css
│   │       ├── projects.css
│   │       ├── about.css
│   │       └── text.css
│   └── js/
│       ├── scripts.js         # Universal menu, scroll handling, keyboard nav
│       └── dashboard-modal.js # Dashboard modal system
├── template-parts/
│   ├── enhanced-universal-menu.php   # Shared navigation modal
│   └── content.php                   # Default post content template
├── page-about.php
├── page-contact.php
├── page-gallery.php
├── page-portfolio.php
├── page-projects.php
├── page-websites.php
├── front-page.php     # Homepage
├── 404.php            # Styled 404 — matches site design
├── archive.php        # Category/date archive pages
├── index.php          # WordPress fallback
├── header.php
├── footer.php
├── functions.php      # Theme setup, CSS/JS enqueue, AJAX, contact form handler
└── style.css          # Theme declaration (styles loaded via modular system)
```

---

## CSS Architecture

Styles are loaded via `functions.php` using `wp_enqueue_style()` with smart conditional loading:

- **`core.css`** — Always loaded. Typography, colours, universal menu, footer, base UI elements.
- **`layout.css`** — Always loaded. Grid systems, containers, responsive breakpoints.
- **`components.css`** — Always loaded. Cards, modals, buttons, shared patterns.
- **`pages/*.css`** — Loaded only on the matching page (e.g. `gallery.css` only on `/gallery`).

Cache-busting is handled by the version string in `creative_theme_scripts()` in `functions.php`. When CSS/JS changes don't appear, bump the version number and hard-refresh.

---

## Key PHP Functions

| Function | Purpose |
|----------|---------|
| `theme_1976_setup()` | Theme support, menu registration, custom logo |
| `creative_theme_scripts()` | Enqueue all CSS and JS with smart page-detection |
| `theme_1976_clean_styles()` | Dequeue unwanted WordPress default styles |
| `create_weekly_updates_post_type()` | Registers the Weekly Updates custom post type |
| Contact form handler (anonymous, hooked to `init`) | Processes form, validates, sends email |

---

## Responsive QA Breakpoints

| Width | Notes |
|-------|-------|
| 320px | Baseline smallest phone |
| 375px | iPhone SE / common small phone |
| 481px–560px | Mid-mobile — modal and card behaviour |
| 768px | Tablet portrait |
| 1024px | Tablet landscape / small desktop |

---

## Local Development

This theme runs inside a WordPress installation. Typical workflow with [LocalWP](https://localwp.com/):

1. Start your local WordPress site in LocalWP.
2. Ensure `1976-london-theme` is the active theme in WordPress Admin → Appearance → Themes.
3. Edit files in this directory.
4. Hard refresh browser (`Cmd+Shift+R` on Mac) after CSS/JS changes.
5. Add `?debug=layout` to any URL to load debug overlay styles.

---

## Git Workflow

This repo uses Git for version control. Basic workflow:

```bash
git status                        # See what files have changed
git add .                         # Stage all changes
git add filename.php              # Stage a specific file
git commit -m "What I changed"    # Save a named snapshot
git log --oneline                 # View commit history
git diff                          # See exactly what changed
```

Make a commit whenever you finish a meaningful change — before testing on production, after fixing a bug, or after adding a new feature.

---

## Contact Form Security

The contact form in `functions.php` includes:
- **Nonce verification** — prevents forged form submissions
- **Honeypot field** — catches bots that fill in all fields
- **Rate limiting** — 1 submission per minute per IP (via WordPress transients)
- **Input sanitisation** — all fields cleaned before use
- **Spam keyword detection** — flags suspicious messages for review
- **Dual delivery** — sends to both `admin_email` and `stuart@1976.london`

---

## Status

🟢 **Active development** — theme cleaned up, properly branded, and committed to Git. Next step: upload gallery images via the Dashboard.

Built with a lot of coffee, curiosity, and VS Code. Still learning — but enjoying every bit of it. 🚀

