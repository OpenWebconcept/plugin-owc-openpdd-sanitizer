# OWC OpenPDD Sanitizer

Sanitize your [OpenPDD](https://github.com/OpenWebconcept/openpdd) for security.

This plugin does:

- Enforces a strict CSP policy
- Adds a CSP header to /wp-admin/admin-ajax.php
- De-registers jQuery migrate and upgrades jQuery / jQuery UI to their latest versions
- Adds SRI attributes and cross-origin on the jQuery / jQuery UI cdn scripts

This plugin does not:

- Add CSP headers to every asset on your site (you should take care of this)

## 🚨 In progress

This repository is being developed and is not ready for production.

## Environment variables

```env
SENTRY_SECURITY_HEADERS_NAME=<name>
SENTRY_SECURITY_HEADERS_REPORT=<uri>
```
