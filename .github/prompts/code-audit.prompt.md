---
description: "Run a plain-English code audit of the 1976 London theme — find bugs, stale references, and things to improve"
name: "Code Audit"
agent: "agent"
---

Do a thorough audit of all the PHP, CSS, and JavaScript files in this WordPress theme.

## Check for:

**Bugs**
- Unclosed HTML tags or divs
- Missing files that are being called (e.g. `get_sidebar()`, `get_template_part()`)
- PHP functions that don't exist in the theme
- Broken or missing `wp_head()` / `wp_footer()` calls

**Stale / leftover references**
- Any mention of `mycustomtheme`, `Artist_Theme`, `Artist Theme`, or `artist_theme_`
- Package names that aren't `1976_London_Theme`
- Text domains that aren't `1976-london-theme`
- Debug messages or console.log labels that reference old names

**Accessibility**
- Navigation elements that use `<div onclick>` instead of `<a href>` or `<button>`
- Images missing `alt` attributes
- Interactive elements missing `aria-label`

**Security**
- User input that isn't sanitised before use
- Links that aren't wrapped in `esc_url()`
- Text output not wrapped in `esc_html()`

**Code quality**
- Duplicate code blocks
- Large commented-out sections that could be removed
- Inline `<style>` blocks that belong in a CSS file

## Report format

Write the report in plain English — like explaining to a junior developer, not a senior architect. For each issue:
- Say **what** the problem is
- Say **where** it is (filename + line number if possible)
- Say **why** it matters in plain language
- Say **what** the fix is

End with a summary table: what's good ✅, what needs fixing ⚠️, what's broken ❌.

Then ask if I'd like to fix everything now.
