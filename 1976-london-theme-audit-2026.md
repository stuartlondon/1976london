# 1976 London Theme Audit 2026

## Goal Context
This audit is framed around one commercial objective:

A condensed, lightweight 1976.london website that advertises custom WordPress websites, template-based websites, small business websites, creative portfolio websites, and general web design services.

Current theme direction includes several internal tools and experimental systems that are useful for learning, but add weight, maintenance burden, and conversion friction for a service-led site.

## 1. Current Folder Structure
Runtime-relevant structure (excluding .git internals):

```text
1976-london-theme/
├── 404.php
├── archive.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── page-about.php
├── page-contact.php
├── page-gallery.php
├── page-portfolio.php
├── page-projects.php
├── page-websites.php
├── style.css
├── README.md
├── AGENTS.md
├── assets/
│   ├── css/
│   │   ├── core.css
│   │   ├── layout.css
│   │   ├── components.css
│   │   ├── dashboard-modal.css
│   │   ├── debug.css
│   │   └── pages/
│   │       ├── about.css
│   │       ├── contact.css
│   │       ├── gallery.css
│   │       ├── homepage.css
│   │       ├── portfolio.css
│   │       ├── projects.css
│   │       ├── text.css
│   │       └── websites.css
│   ├── js/
│   │   ├── scripts.js
│   │   └── dashboard-modal.js
│   └── inc/   (empty)
├── template-parts/
│   ├── content.php
│   └── enhanced-universal-menu.php
├── images/
│   └── (portfolio screenshots and theme preview images)
├── card design/
│   ├── card-design.html
│   └── card-design.css
├── Old-.md's-Not Needed /
│   ├── code-audit.prompt.md
│   ├── copilot-instructions.md
│   ├── new-page.prompt.md
│   └── session-journal.prompt.md
├── .github/
│   ├── agents/   (empty)
│   └── prompts/  (empty)
├── .vscode/
│   └── settings.json
└── .DS_Store
```

## 2. All Theme Templates And What Each One Does

| File | What it does now | Business relevance for redesign |
|---|---|---|
| 404.php | Custom branded not-found page using dashboard-style wrappers and universal menu. | Useful, keep simplified. |
| archive.php | Default archive loop; references template part for content and non-existent content-none fallback. | Low priority but should remain functional. |
| front-page.php | Minimal home shell with gradient, title, intro line, universal menu. | Core landing page, critical. |
| page-websites.php | Heavy showcase page with 6 cards, external live-preview modal iframe system, inline script. | High relevance to selling work, but needs major simplification/refactor. |
| page-contact.php | Large lead form plus admin-only email diagnostics in frontend template. | High relevance; keep form, remove diagnostics from public template. |
| page-about.php | Very long technical narrative and milestone-heavy content. | Keep page concept, rewrite content for client outcomes. |
| page-portfolio.php | Profile links/testimonials/services list in dashboard layout. | Keep concept, tighten copy and structure. |
| page-projects.php | Strategy/roadmap/subdomain planning content, experimental direction. | Not core to conversion goal; likely remove or merge into About. |
| page-gallery.php | 6-slot gallery tied to dashboard-upload options. | Optional; can be removed if Websites page already showcases work. |
| header.php | Standard head and body open; no visual site header output. | Keep. |
| footer.php | Footer + GitHub corner + full dashboard modal markup globally injected. | Keep footer; remove global dashboard modal for lightweight redesign. |
| index.php | Silence fallback only. | Keep as safety fallback. |
| template-parts/enhanced-universal-menu.php | Modal-based universal nav, includes dashboard menu card button. | Keep menu concept; remove dashboard entry for production sales site. |
| template-parts/content.php | Generic post content output. | Keep, minor cleanup later. |

## 3. All CSS Files And Whether They Are Still Needed

| CSS File | Current use | Needed for lightweight redesign? | Recommendation |
|---|---|---|---|
| assets/css/core.css | Global typography, base styling, nav and shared look. | Yes | Keep, trim visual complexity if desired. |
| assets/css/layout.css | Shared layout/breakpoints/containers. | Yes | Keep and simplify spacing system. |
| assets/css/components.css | Shared cards/buttons/common blocks. | Yes | Keep, reduce dashboard-specific styles over time. |
| assets/css/pages/homepage.css | Front-page presentation. | Yes | Keep and refactor for service-first hero. |
| assets/css/pages/websites.css | Very large page stylesheet, includes many aggressive overrides and modal styles. | Partly | Refactor heavily; keep only essential portfolio showcase styling. |
| assets/css/pages/contact.css | Contact form and contact page visuals. | Yes | Keep and simplify for trust/conversion. |
| assets/css/pages/about.css | About page styling. | Yes | Keep if About remains; otherwise merge into core/components. |
| assets/css/pages/portfolio.css | Portfolio page styling. | Maybe | Keep only if separate Portfolio page stays. |
| assets/css/pages/projects.css | Projects roadmap page styling. | No (if Projects removed) | Remove with page-projects.php. |
| assets/css/pages/gallery.css | Gallery page styling linked to dashboard/gallery system. | Maybe | Remove if Gallery page removed; otherwise simplify. |
| assets/css/pages/text.css | Conditionally enqueued for text slug/template, but no page-text.php exists. | Unclear/likely no | Refactor/remove after confirming there is no active Text page content requirement. |
| assets/css/dashboard-modal.css | Global dashboard modal system styling. | No | Remove for lightweight production redesign. |
| assets/css/debug.css | Optional debug overlay via ?debug=layout. | Dev-only | Keep for local dev or move out of production bundle. |
| style.css | Theme metadata + font import + screen-reader utility. | Yes | Keep; consider moving font loading to enqueue for performance control. |

## 4. All JavaScript Files And Whether They Are Still Needed

| JS File | Current use | Needed for lightweight redesign? | Recommendation |
|---|---|---|---|
| assets/js/scripts.js | Universal menu behavior, stale overlay reset, old hamburger/side-panel/lightbox logic, heavy debug logging. | Partly | Refactor aggressively into a small navigation/UX script. |
| assets/js/dashboard-modal.js | Large dashboard app (analytics, gallery upload, extraction, settings/contact/portfolio tools, placeholders). | No | Remove from production redesign. |
| Inline JS in page-websites.php | Modal preview and per-project behavior directly in template. | Partly | Move to a dedicated minimal file and keep only needed showcase behavior. |

## 5. Duplicated Code

1. Repeated template chrome across nearly all page templates:
- Same gradient block.
- Same site title block.
- Same universal hamburger button.
- Same menu template include.

2. Repeated/parallel gallery upload logic in functions.php:
- handle_gallery_auto_upload and handle_gallery_image_upload share large validation and media-upload patterns.

3. Repeated nonce verification and similar AJAX response patterns across multiple handlers.

4. Repeated modal/overlay state handling across scripts.js and dashboard-modal.js.

5. Repeated styling overrides in websites.css with extensive !important chains that indicate layering/duplication issues.

## 6. Any Unused Or Orphaned Files

Likely orphaned or non-runtime:

1. card design/card-design.html
2. card design/card-design.css
3. Old-.md's-Not Needed/* (archived prompts and old instructions)
4. assets/inc (empty directory)
5. .github/agents (empty)
6. .github/prompts (empty)
7. .DS_Store

Potentially orphaned code path:

1. assets/css/pages/text.css is enqueued for text page conditions, but no page-text.php template exists in theme.
2. archive.php references content-none template part, but template-parts/content-none.php is not present.
3. creative_lab_fallback_menu and creative_lab_side_fallback_menu are defined but not used.

## 7. Experimental, Dashboard, Gallery, Modal, Or Prototype Features

Identified as non-essential for a lightweight lead-generation site:

1. Global dashboard modal in footer.php.
2. dashboard-modal.js feature bundle:
- analytics panel
- gallery manager/upload controls
- data extraction tools
- portfolio builder prototype
- settings/contact-center placeholders

3. AJAX endpoints supporting dashboard/gallery management:
- upload_gallery_auto
- upload_gallery_image
- update_card_data
- extract_live_media
- get_dashboard_analytics

4. Page-websites live iframe preview modal and screenshot fallback logic.
5. Projects page roadmap/subdomain concept content.
6. Contact page admin diagnostics panel in frontend template.
7. card design prototype folder.

## 8. Security Concerns

1. Public nopriv AJAX endpoints for upload/update actions:
- upload_gallery_auto
- upload_gallery_image
- update_card_data
These are exposed to unauthenticated users; nonce alone is insufficient if token is exposed in front-end scripts.

2. Front-end admin diagnostics in page-contact.php:
- Uses POST actions for email tests from template-level UI.
- No explicit nonce for admin diagnostic actions.
- Exposes operational details (server, PHP version, admin email) to any logged-in admin viewing frontend.

3. Heavy use of error_log with user data (email/IP/username) can leak PII into logs and increase operational risk.

4. Use of PHP mail() fallback is pragmatic but less robust than authenticated SMTP/API delivery with proper SPF/DKIM/DMARC alignment.

5. Security headers are partial and include legacy X-XSS-Protection; no CSP is present.

## 9. Any Files Safe To Remove

Safe to remove now (no production impact expected):

1. card design/card-design.html
2. card design/card-design.css
3. Old-.md's-Not Needed/code-audit.prompt.md
4. Old-.md's-Not Needed/copilot-instructions.md
5. Old-.md's-Not Needed/new-page.prompt.md
6. Old-.md's-Not Needed/session-journal.prompt.md
7. .DS_Store
8. Empty assets/inc directory
9. Empty .github/agents directory
10. Empty .github/prompts directory

Conditionally safe to remove during redesign scope:

1. assets/js/dashboard-modal.js
2. assets/css/dashboard-modal.css
3. page-projects.php
4. assets/css/pages/projects.css
5. page-gallery.php and assets/css/pages/gallery.css if Websites page becomes sole proof/work showcase.

## 10. Any Files To Keep For The Redesign

Keep as foundation:

1. header.php
2. footer.php (after removing dashboard modal and keeping simple footer)
3. functions.php (but slim down)
4. style.css
5. front-page.php
6. page-websites.php (refactor into tighter service-and-proof page)
7. page-contact.php (keep lead form, remove diagnostics)
8. page-about.php (rewrite for trust, process, outcomes)
9. template-parts/enhanced-universal-menu.php (remove dashboard item)
10. assets/css/core.css
11. assets/css/layout.css
12. assets/css/components.css
13. assets/css/pages/homepage.css
14. assets/css/pages/websites.css (refactor)
15. assets/css/pages/contact.css
16. images/* that are actively used for portfolio proof

## 11. Any Files To Refactor Later

High-priority refactor targets:

1. functions.php
- Split into modules (enqueue, contact, security, seo, ajax).
- Remove dashboard/gallery prototype endpoints for production profile.
- Add capability checks for any privileged actions.

2. scripts.js
- Strip legacy/unused menu + side-panel + lightbox logic.
- Keep only essential nav/modal behavior.

3. page templates
- Extract repeated title/menu shell into a reusable template part to reduce duplication.

4. page-websites.php
- Move inline script to external file.
- Reduce interaction complexity to conversion-focused case-study cards.

5. assets/css/pages/websites.css
- Reduce !important-heavy patching.
- Replace with cleaner componentized rules.

6. footer.php
- Remove dashboard modal payload from every page.

7. archive.php
- Add template-parts/content-none.php or adjust fallback to avoid missing template path.

## 12. Final Keep / Refactor / Remove Table

| Group | Keep | Refactor | Remove |
|---|---|---|---|
| Core theme | header.php, index.php, style.css | footer.php, functions.php | None |
| Primary pages | front-page.php, page-contact.php, page-websites.php, page-about.php | page-portfolio.php | page-projects.php (recommended) |
| Optional pages | 404.php, archive.php | page-gallery.php | page-gallery.php if not needed for sales funnel |
| Template parts | template-parts/enhanced-universal-menu.php, template-parts/content.php | enhanced-universal-menu.php (remove dashboard card) | None |
| CSS base | core.css, layout.css, components.css | homepage.css, websites.css, contact.css, about.css, portfolio.css | dashboard-modal.css, projects.css, gallery.css, text.css (if unused) |
| JS | Minimalized scripts.js | scripts.js, move inline websites JS to external | dashboard-modal.js |
| Media and docs | images actively used in websites showcase | README.md as dev docs only | card design/*, Old-.md's-Not Needed/*, .DS_Store |
| Empty folders | None | None | assets/inc, .github/agents, .github/prompts |

## Recommended Redesign Direction (Summary)

1. Keep only pages that directly support paid client acquisition: Home, Websites/Work, About, Contact.
2. Remove dashboard/prototype systems from runtime and public UI.
3. Convert content tone from technical playground to clear service offer + proof + process + CTA.
4. Slim scripts/styles to improve speed, maintainability, and clarity.
5. Harden security by removing public upload endpoints and moving diagnostics to wp-admin-only workflows.
