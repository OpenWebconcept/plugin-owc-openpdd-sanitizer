<?php
/**
 * Sanitize HTTP Headers.
 *
 * @package OWC_OpenPDD_Sanitizer
 * @author  Yard | Digital Agency
 * @since   0.0.1
 */

declare ( strict_types = 1 );

namespace OWCOpenPDDSanitizer\Sanitize;

/**
 * Exit when accessed directly.
 */
if ( ! defined( 'ABSPATH' )) {
	exit;
}

use Cedaro\WP\Plugin\AbstractHookProvider;
use Bepsvpt\SecureHeaders\SecureHeaders;

/**
 * Class to sanitize HTTP headers.
 *
 * @since 0.0.1
 */
class HttpHeaders extends AbstractHookProvider
{
	/**
	 * Register hooks.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function register_hooks()
	{
		add_action( 'send_headers', array( $this, 'send_headers' ) );
	}

	/**
	 * Send the new HTTP headers.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function send_headers()
	{
		if (is_admin()) {
			return;
		}

		return SecureHeaders::fromFile( OWC_OPENPDD_SANITIZER_DIR_PATH . '/config/secure-headers.php' )->send();
	}
}
