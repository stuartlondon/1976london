---
description: "Create a new WordPress page template for 1976 London theme following the established pattern"
name: "New Page Template"
argument-hint: "Page name (e.g. 'Services', 'Blog', 'Clients')"
agent: "agent"
---

Create a new WordPress page template for the 1976 London theme.

The page name / slug is: **$ARGUMENTS**

## What to create:

1. **`page-[slug].php`** — the PHP template file, following this exact pattern from the existing pages:
   - PHP doc block with `Template Name:`, package `1976_London_Theme`
   - `get_header()`
   - Man of Steel gradient: `<div class="man-of-steel-gradient"></div>`
   - Site title linking to `home_url('/', 'relative')`
   - Universal hamburger button with `aria-label="Open menu"`
   - `get_template_part('template-parts/enhanced-universal-menu')`
   - Main content inside `<div id="primary" class="content-area"><main id="main" class="site-main">`
   - Content wrapped in `<div class="dashboard-content">` with a `dashboard-header` and `dashboard-section`
   - `get_footer()`

2. **`assets/css/pages/[slug].css`** — page-specific styles
   - Start with a comment block identifying the file
   - Include at minimum a placeholder comment for page-specific rules

3. **Update `functions.php`** — add the CSS enqueue inside `creative_theme_scripts()`:
   - Follow the same pattern as the other pages (e.g. `is_page('[slug]') || is_page_template('page-[slug].php')`)
   - Bump the version string by 0.0.1

After creating the files, explain:
- What each file does and why
- How to activate the template in WordPress (Pages → Add New → Page Attributes → Template)
- What content to add next
