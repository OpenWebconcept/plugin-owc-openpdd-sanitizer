# OWC OpenPDD Sanitizer

Sanitize your [OpenPDD](https://github.com/OpenWebconcept/openpdd) for security.

**This plugin does:**

- Enforces a strict CSP policy
- Upgrades jQuery and jQuery UI to their latest versions
- Adds a CSP header to /wp-admin/admin-ajax.php
- Adds SRI and cross-origin attributes to the jQuery and jQuery UI cdn scripts
- De-registers jQuery migrate

**This plugin does not:**

- Add CSP headers to every asset on your site

## Environment variables

```env
SENTRY_SECURITY_HEADERS_NAME=<name>
SENTRY_SECURITY_HEADERS_REPORT=<uri>
```
