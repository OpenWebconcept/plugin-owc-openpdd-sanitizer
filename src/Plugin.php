<?php
/**
 * Main plugin class
 *
 * @package OWC_OpenPDD_Sanitizer
 * @author  Yard | Digital Agency
 * @since   0.0.1
 */

declare ( strict_types = 1 );

namespace OWCOpenPDDSanitizer;

use Cedaro\WP\Plugin\Plugin as BasePlugin;
use Psr\Container\ContainerInterface;

/**
 * Main plugin class - composition root.
 *
 * @since 0.0.1
 */
class Plugin extends BasePlugin implements Composable
{
	/**
	 * Compose the object graph.
	 *
	 * @since 0.0.1
	 */
	public function compose() {
		$container = $this->get_container();

		/**
		 * Start composing the object graph.
		 *
		 * @since 0.0.1
		 *
		 * @param Plugin             $plugin    Main plugin instance.
		 * @param ContainerInterface $container Dependency container.
		 */
		do_action( 'owc_openpdd_sanitizer_compose', $this, $container );

		// Register hook providers.
		$this
			->register_hooks( $container->get( 'hooks.sanitize_dependencies' ) )
			->register_hooks( $container->get( 'hooks.sanitize_http_headers' ) );

		/**
		 * Finished composing the object graph.
		 *
		 * @since 0.0.1
		 *
		 * @param Plugin             $plugin    Main plugin instance.
		 * @param ContainerInterface $container Dependency container.
		 */
		do_action( 'owc_openpdd_sanitizer_composed', $this, $container );
	}
}
