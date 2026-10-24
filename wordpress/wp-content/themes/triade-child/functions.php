<?php
/**
 * TRIADE Child theme.
 *
 * @package triade-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Carga el CSS del child después del tema padre.
 */
function triade_child_assets() {
	wp_enqueue_style(
		'triade-child',
		get_stylesheet_uri(),
		array( 'triade-style' ),
		wp_get_theme( 'triade-child' )->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'triade_child_assets', 20 );
