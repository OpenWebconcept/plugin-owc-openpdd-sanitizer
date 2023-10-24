<?php

declare(strict_types=1);

return array(

	/**
	 * Server
	 *
	 * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Server
	 *
	 * Note: when server is empty string, it will not add to response header
	 */
	'server'                            => getenv( 'SENTRY_SECURITY_HEADERS_NAME' ) ?? 'Yard | Digital Agency',

	/**
	 * X-Content-Type-Options
	 *
	 * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Content-Type-Options
	 *
	 * Available Value: 'nosniff'
	 */
	'x-content-type-options'            => 'nosniff',

	/**
	 * X-Download-Options
	 *
	 * Reference: https://msdn.microsoft.com/en-us/library/jj542450(v=vs.85).aspx
	 *
	 * Available Value: 'noopen'
	 */
	'x-download-options'                => 'noopen',

	/**
	 * X-Frame-Options
	 *
	 * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Frame-Options
	 *
	 * Available Value: 'deny', 'sameorigin', 'allow-from <uri>'
	 */
	'x-frame-options'                   => 'sameorigin',

	/**
	 * X-Permitted-Cross-Domain-Policies
	 *
	 * Reference: https://www.adobe.com/devnet/adobe-media-server/articles/cross-domain-xml-for-streaming.html
	 *
	 * Available Value: 'all', 'none', 'master-only', 'by-content-type', 'by-ftp-filename'
	 */
	'x-permitted-cross-domain-policies' => 'none',

	/**
	 * X-Powered-By
	 *
	 * Note: it will not add to response header if the value is empty string.
	 */
	'x-powered-by'                      => 'Yard | Digital Agency',

	/**
	 * X-XSS-Protection
	 *
	 * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-XSS-Protection
	 *
	 * Available Value: '1', '0', '1; mode=block'
	 */
	'x-xss-protection'                  => '1; mode=block',

	/**
	 * Referrer-Policy
	 *
	 * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Referrer-Policy
	 *
	 * Available Value: 'no-referrer', 'no-referrer-when-downgrade', 'origin', 'origin-when-cross-origin',
	 *                  'same-origin', 'strict-origin', 'strict-origin-when-cross-origin', 'unsafe-url'
	 */
	'referrer-policy'                   => 'same-origin',

	/**
	 * Clear-Site-Data
	 *
	 * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Clear-Site-Data
	 */
	'clear-site-data'                   => array(
		'enable'            => false,
		'all'               => false,
		'cache'             => true,
		'cookies'           => true,
		'storage'           => true,
		'executionContexts' => true,
	),

	/**
	 * HTTP Strict Transport Security
	 *
	 * Reference: https://developer.mozilla.org/en-US/docs/Web/Security/HTTP_strict_transport_security
	 *
	 * Please ensure your website had set up ssl/tls before enable hsts.
	 */
	'hsts'                              => array(
		'enable'              => true,
		'max-age'             => 31536000,
		'include-sub-domains' => true,
		'preload'             => true,
	),

	/**
	 * Expect-CT
	 *
	 * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Expect-CT
	 */
	'expect-ct'                         => array(
		'enable'     => false,
		'max-age'    => 2147483648,
		'enforce'    => false,
		// report uri must be absolute-URI
		'report-uri' => getenv( 'SENTRY_SECURITY_HEADERS_REPORT' ),
	),

	/**
	 * Permissions Policy
	 *
	 * Reference: https://w3c.github.io/webappsec-permissions-policy/
	 */
	'permissions-policy'                => array(
		'enable'                    => true,

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/accelerometer
		'accelerometer'             => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/autoplay
		'autoplay'                  => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/camera
		'camera'                    => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://www.chromestatus.com/feature/5690888397258752
		'cross-origin-isolated'     => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/document-domain
		'document-domain'           => array(
			'none'    => false,
			'*'       => true,
			'self'    => false,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/encrypted-media
		'encrypted-media'           => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/fullscreen
		'fullscreen'                => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/geolocation
		'geolocation'               => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/gyroscope
		'gyroscope'                 => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		'interest-cohort'           => array(
			'none' => true,
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/magnetometer
		'magnetometer'              => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/microphone
		'microphone'                => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/midi
		'midi'                      => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/payment
		'payment'                   => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/picture-in-picture
		'picture-in-picture'        => array(
			'none'    => false,
			'*'       => true,
			'self'    => false,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/publickey-credentials-get
		'publickey-credentials-get' => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/screen-wake-lock
		'screen-wake-lock'          => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/sync-xhr
		'sync-xhr'                  => array(
			'none'    => false,
			'*'       => true,
			'self'    => false,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/usb
		'usb'                       => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Feature-Policy/xr-spatial-tracking
		'xr-spatial-tracking'       => array(
			'none'    => false,
			'*'       => false,
			'self'    => true,
			'origins' => array(),
		),
	),

	/**
	 * Content Security Policy
	 *
	 * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP
	 */
	'csp'                               => array(
		'enable'                    => true,
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy-Report-Only
		'report-only'               => false,
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/report-to
		'report-to'                 => getenv( 'SENTRY_SECURITY_HEADERS_REPORT' ),
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/report-uri
		'report-uri'                => array(
			getenv( 'SENTRY_SECURITY_HEADERS_REPORT' ),
		),
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/block-all-mixed-content
		'block-all-mixed-content'   => false,
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/upgrade-insecure-requests
		'upgrade-insecure-requests' => true,
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/base-uri
		'base-uri'                  => array(
			'self' => true,
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/child-src
		'child-src'                 => array(
			'self' => true,
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/connect-src
		'connect-src'               => array(
			'self'  => true,
			'allow' => array(
				'*.readspeaker.com',
			),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/default-src
		'default-src'               => array(
			'none'  => true,
			'self'  => true,
			'allow' => array(
				'*.readspeaker.com',
			),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/font-src
		'font-src'                  => array(
			'none'          => false,
			'self'          => true,
			'report-sample' => true,
			'allow'         => array(
				'fonts.gstatic.com',
				'*.readspeaker.com',
			),
			'schemes'       => array(
				'data:',
				// 'https:',
			),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/form-action
		'form-action'               => array(
			'self'  => true,
			'allow' => array(
				'*.readspeaker.com',
			),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/frame-ancestors
		'frame-ancestors'           => array(
			'self' => true,
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/frame-src
		'frame-src'                 => array(
			'self'  => true,
			'allow' => array(
				'*.google.com',
				'*.readspeaker.com',
			),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/img-src
		'img-src'                   => array(
			'none'          => false,
			'self'          => true,
			'report-sample' => true,
			'allow'         => array(
				'*.readspeaker.com',
				'secure.gravatar.com',
			),
			'schemes'       => array(
				'data:',
				// 'https:',
			),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/manifest-src
		'manifest-src'              => array(
			'self' => true,
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/media-src
		'media-src'                 => array(
			'none'          => false,
			'self'          => true,
			'report-sample' => true,
			'allow'         => array(
				'*.readspeaker.com',
			),
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/navigate-to
		'navigate-to'               => array(
			'unsafe-allow-redirects' => false,
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/object-src
		'object-src'                => array(
			'none' => true,
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/plugin-types
		'plugin-types'              => array(
			// 'application/pdf',
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/prefetch-src
		// Deprecated and Non-standard

		// https://w3c.github.io/webappsec-trusted-types/dist/spec/#integration-with-content-security-policy
		'require-trusted-types-for' => array(
			'script' => false,
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/sandbox
		'sandbox'                   => array(
			'enable'                                  => false,
			'allow-downloads-without-user-activation' => false,
			'allow-forms'                             => false,
			'allow-modals'                            => false,
			'allow-orientation-lock'                  => false,
			'allow-pointer-lock'                      => false,
			'allow-popups'                            => false,
			'allow-popups-to-escape-sandbox'          => false,
			'allow-presentation'                      => false,
			'allow-same-origin'                       => false,
			'allow-scripts'                           => false,
			'allow-storage-access-by-user-activation' => false,
			'allow-top-navigation'                    => false,
			'allow-top-navigation-by-user-activation' => false,
		),

		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src
		'script-src'                => array(
			'none'           => false,
			'self'           => true,
			'report-sample'  => true,
			'allow'          => array(
				'*.readspeaker.com',
				'code.jquery.com',
				'siteimproveanalytics.com',
			),
			'schemes'        => array(
				// 'data:',
				// 'https:',
			),
			/* followings are only work for `script` and `style` related directives */
			'unsafe-inline'  => false,
			'unsafe-eval'    => false,
			// https://www.w3.org/TR/CSP3/#unsafe-hashes-usage
			'unsafe-hashes'  => false,
			// Enable `strict-dynamic` will *ignore* `self`, `unsafe-inline`,
			// `allow` and `schemes`. You can find more information from:
			// https://www.w3.org/TR/CSP3/#strict-dynamic-usage
			'strict-dynamic' => false,
		),
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src-attr
		'script-src-attr'           => array(
			'none'          => false,
			'self'          => true,
			'report-sample' => true,
			'allow'         => array(
				'*.readspeaker.com',
				'code.jquery.com',
				'siteimproveanalytics.com',
			),
			'schemes'       => array(
				// 'data:',
				// 'https:',
			),
			/* followings are only work for `script` and `style` related directives */
			'unsafe-inline' => false,
		),
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src-elem
		'script-src-elem'           => array(),
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src
		'style-src'                 => array(
			'none'          => false,
			'self'          => true,
			'report-sample' => true,
			'allow'         => array(
				'fonts.googleapis.com',
				'*.readspeaker.com',
			),
			'unsafe-inline' => false,
		),
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src-attr
		'style-src-attr'            => array(
			'none'          => false,
			'self'          => true,
			'unsafe-inline' => false,
			'report-sample' => true,
		),
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src-elem
		'style-src-elem'            => array(),
		// https://w3c.github.io/webappsec-trusted-types/dist/spec/#trusted-types-csp-directive
		'trusted-types'             => array(
			'enable'           => false,
			'allow-duplicates' => false,
			'default'          => false,
			'policies'         => array(),
		),
		// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/worker-src
		'worker-src'                => array(
			'none' => true,
		),
	),
);
