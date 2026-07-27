# 1976 London Theme

This repository contains the WordPress theme used for [1976.london](https://1976.london). The current version is focused on the core public experience: the homepage, an about page, and a contact page with a working enquiry form.

**Version:** 2.0.8  
**Author:** Stuart Hunt — [1976 London](https://1976.london)  
**Contact:** stuart@1976.london  
**GitHub:** [stuartlondon/1976london](https://github.com/stuartlondon/1976london)

## Included templates

- front-page.php — homepage
- page-about.php — about page
- page-contact.php — contact page with enquiry form
- header.php, footer.php, functions.php — shared theme setup and form handling

## Contact form

The contact form sends submissions to stuart@1976.london and includes basic protection such as nonce verification, a honeypot field, and simple rate limiting.

## Simplified structure

```text
1976-london-theme/
├── assets/
│   ├── css/
│   │   ├── core.css
│   │   ├── layout.css
│   │   ├── components.css
│   │   └── pages/
│   │       ├── about.css
│   │       ├── contact.css
│   │       └── homepage.css
│   └── js/
│       └── scripts.js
├── template-parts/
│   └── enhanced-universal-menu.php
├── front-page.php
├── page-about.php
├── page-contact.php
├── functions.php
├── style.css
└── README.md
```
