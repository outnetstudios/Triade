<?php
/**
 * TRIADE parent theme bootstrap.
 *
 * @package triade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TRIADE_VERSION', '1.1.0' );
define( 'TRIADE_DIR', get_template_directory() );
define( 'TRIADE_URI', get_template_directory_uri() );

require_once TRIADE_DIR . '/inc/template-tags.php';
require_once TRIADE_DIR . '/inc/setup.php';
require_once TRIADE_DIR . '/inc/assets.php';
require_once TRIADE_DIR . '/inc/customizer.php';
require_once TRIADE_DIR . '/inc/seo.php';
require_once TRIADE_DIR . '/inc/contact.php';
