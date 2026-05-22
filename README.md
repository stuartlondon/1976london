# 1976 London Theme

Custom WordPress theme for `1976.london`, focused on creative portfolio presentation, glassmorphism UI patterns, and modular dashboard/menu systems.

## Overview
This theme includes:
- Custom page templates for portfolio, projects, websites, contact, and gallery pages
- Responsive universal menu and dashboard modal systems
- Modular CSS architecture (`core`, `layout`, `components`, page-level styles)
- WordPress AJAX integrations for dashboard/gallery workflows

## Project Structure
- `functions.php`: theme setup, enqueue logic, AJAX hooks, integrations
- `assets/css/`: modular styling
- `assets/js/`: client-side interactions
- `template-parts/`: shared PHP template pieces
- `page-*.php`: custom page templates

## CSS Architecture
- `assets/css/core.css`: typography, globals, universal menu, footer, base UI
- `assets/css/layout.css`: spacing, containers, breakpoints, dashboard layout
- `assets/css/components.css`: reusable cards, controls, shared components
- `assets/css/pages/*.css`: page-specific styling

## Responsive QA Focus
Current responsive emphasis:
- 320px baseline QA
- 375px secondary QA
- 481px to 560px mid-mobile QA for modal/card behavior
- Universal menu clipping safeguards down to very small widths

## Local Development
This is a WordPress theme intended to run inside a WordPress installation.

Typical local workflow:
1. Run local WordPress stack.
2. Activate `1976-london-theme` in WordPress admin.
3. Edit theme files in this repository.
4. Hard refresh browser after CSS changes.

## Caching Note
Static assets are versioned via `creative_theme_scripts()` in `functions.php`.
When CSS/JS updates do not appear immediately, bump the version string and hard refresh.

## Documentation
Key docs in repo root:
- `1976_local_dev_stack_guide.md`
- `GO-LIVE-RUN-SHEET.md`
- `PRODUCTION-GO-LIVE-CHECKLIST.md`
- `REBRAND-MIGRATION-PLAN.md`
- `Universal-menu-production-instructions.md`

## Status
Active UI polish and production hardening for go-live.
