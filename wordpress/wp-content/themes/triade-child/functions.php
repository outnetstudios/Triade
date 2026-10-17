<?php
/**
 * TRIADE Child theme.
 *
 * @package triade-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function triade_child_assets() {
	wp_enqueue_style(
		'triade-parent',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme( 'triade' )->get( 'Version' )
	);

	wp_enqueue_style(
		'triade-child',
		get_stylesheet_uri(),
		array( 'triade-parent' ),
		wp_get_theme( 'triade-child' )->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'triade_child_assets', 20 );
