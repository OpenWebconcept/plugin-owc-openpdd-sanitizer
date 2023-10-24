<?php
/**
 * Sanitize dependencies.
 *
 * @package OWC_OpenPDD_Sanitizer
 * @author  Yard | Digital Agency
 * @since   0.0.1
 */

declare ( strict_types = 1 );

namespace OWCOpenPDDSanitizer\Sanitize;

use OWCOpenPDDSanitizer\Security\CSP;
use WP_Scripts;

/**
 * Exit when accessed directly.
 */
if ( ! defined( 'ABSPATH' )) {
	exit;
}

use Cedaro\WP\Plugin\AbstractHookProvider;

/**
 * Class to sanitize dependencies.
 *
 * @since 0.0.1
 */
class Dependencies extends AbstractHookProvider
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
		add_action( 'init', array( $this, 'initialize_nonces' ) );
		add_action( 'wp_default_scripts', array( $this, 'remove_dependency_on_jquery_migrate' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'upgrade_scripts_to_latest' ) );

		add_filter( 'script_loader_tag', array( $this, 'theme_script_loader_tag' ), 10, 2 );
	}

	/**
	 * Add CSP to admin-ajax.php and initialize nonces on resources.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function initialize_nonces()
	{
		if (isset( $_SERVER['REQUEST_URI'] ) && strpos( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ), '/wp-admin/admin-ajax.php' ) !== false) {
			header( "Content-Security-Policy: default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self'; font-src 'self'; frame-ancestors 'self';" );
		}

		if (is_admin()) {
			return;
		}

		if ( ! function_exists( 'csp_nonce' )) {
			return;
		}

		$nonce_script = csp_nonce( 'script' );
		$nonce_style  = csp_nonce( 'style' );

		if (ob_get_length() > 0) {
			ob_end_clean();
		}

		ob_start();
		add_action(
			'shutdown',
			function () use ($nonce_script, $nonce_style ) {
				$content     = ob_get_clean();
				$csp_content = CSP::make( $content, esc_attr( $nonce_script ), esc_attr( $nonce_style ) )->add();
				echo $csp_content;
			},
			0
		);
	}

	/**
	 * Remove dependency on jQuery migrate since we don't need backwards compatibility.
	 *
	 * @since 0.0.1
	 *
	 * @param WP_Scripts $scripts
	 * @return void
	 */
	public function remove_dependency_on_jquery_migrate( WP_Scripts $scripts )
	{
		if ( ! is_admin() && ! empty( $scripts->registered['jquery'] )) {
			$scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
		}
	}

	/**
	 * Deregister jQuery migrate and upgrade jQuery to latest version.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function upgrade_scripts_to_latest()
	{
		// jQuery core.
		wp_deregister_script( 'jquery-migrate' );

		$wp_scripts = wp_scripts();

		if (isset( $wp_scripts->registered['jquery'] )) {
			$wp_scripts->registered['jquery']->src = 'https://code.jquery.com/jquery-3.7.1.min.js';
		}

		if (isset( $wp_scripts->registered['jquery-ui-core'] )) {
			$wp_scripts->registered['jquery-ui-core']->src = 'https://code.jquery.com/ui/1.13.2/jquery-ui.min.js';
		}
	}

	/**
	 * Add SRI and Cross-Origin attributes to CDN scripts.
	 *
	 * @since 0.0.1
	 *
	 * @param string $tag
	 * @param string $handle
	 * @return string;
	 */
	public function theme_script_loader_tag( string $tag, string $handle )
	{
		if ( ! is_admin()) {
			$scripts_to_load = array(
				array(
					( 'name' )      => 'jquery',
					( 'integrity' ) => 'sha384-1H217gwSVyLSIfaLxHbE7dRb3v4mYCKbpQvzx0cegeju1MVsGrX5xXxAvs/HgeFs',
				),
				array(
					( 'name' )      => 'jquery-ui-core',
					( 'integrity' ) => 'sha384-4D3G3GikQs6hLlLZGdz5wLFzuqE9v4yVGAcOH86y23JqBDPzj9viv0EqyfIa6YUL',
				),
			);

			$key = array_search( $handle, array_column( $scripts_to_load, 'name' ), true );

			if (false !== $key) {
				$tag = str_replace( '></script>', ' integrity=\'' . $scripts_to_load[ $key ]['integrity'] . '\' crossorigin=\'anonymous\'></script>', $tag );
			}
		}

		return $tag;
	}
}
