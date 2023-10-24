<?php
/**
 * OWC OpenPDD Sanitizer.
 *
 * @package OWC_OpenPDD_Sanitizer
 * @author  Yard | Digital Agency
 * @since   0.0.1
 *
 * Plugin Name:       OWC | OpenPDD Sanitizer
 * Plugin URI:        https://github.com/OpenWebconcept/plugin-owc-openpdd-sanitizer
 * Description:       Sanitize your OpenPDD for security
 * Version:           0.0.1
 * Author:            Yard | Digital Agency
 * Author URI:        https://www.yard.nl/
 * License:           EUPL
 * License URI:       https://github.com/OpenWebconcept/plugin-owc-openpdd-sanitizer/LICENSE.txt
 * Text Domain:       owc-openpdd-sanitizer
 * Domain Path:       /languages
 */

declare ( strict_types = 1 );

namespace OWCOpenPDDSanitizer;

/**
 * If this file is called directly, abort.
 */
if ( ! defined( 'WPINC' )) {
	die;
}

// Define constants.
define( 'OWC_OPENPDD_SANITIZER_VERSION', '0.0.1' );
define( 'OWC_OPENPDD_SANITIZER_REQUIRED_WP_VERSION', '6.0' );
define( 'OWC_OPENPDD_SANITIZER_FILE', __FILE__ );
define( 'OWC_OPENPDD_SANITIZER_DIR_PATH', plugin_dir_path( OWC_OPENPDD_SANITIZER_FILE ) );
define( 'OWC_OPENPDD_SANITIZER_PLUGIN_URL', plugins_url( '/', OWC_OPENPDD_SANITIZER_FILE ) );

if (file_exists( OWC_OPENPDD_SANITIZER_DIR_PATH . '/vendor/autoload.php' )) {
	require_once OWC_OPENPDD_SANITIZER_DIR_PATH . '/vendor/autoload.php';
}

// Autoload mapped classes.
spl_autoload_register( __NAMESPACE__ . '\autoloader_classmap' );

// Load the WordPress plugin administration API.
require_once ABSPATH . 'wp-admin/includes/plugin.php';

// Create a container and register a service provider.
$owc_openpdd_sanitizer_container = new Container();
$owc_openpdd_sanitizer_container->register( new ServiceProvider() );


// Initialize the plugin and inject the container.
$owc_openpdd_sanitizer = plugin()
	->set_basename( plugin_basename( __FILE__ ) )
	->set_directory( plugin_dir_path( __FILE__ ) )
	->set_file( __DIR__ . '/owc-openpdd-sanitizer.php' )
	->set_slug( 'owc-openpdd-sanitizer' )
	->set_url( plugin_dir_url( __FILE__ ) )
	->set_container( $owc_openpdd_sanitizer_container )
	->register_hooks( $owc_openpdd_sanitizer_container->get( 'hooks.activation' ) )
	->register_hooks( $owc_openpdd_sanitizer_container->get( 'hooks.deactivation' ) );

add_action( 'plugins_loaded', array( $owc_openpdd_sanitizer, 'compose' ), 5 );
