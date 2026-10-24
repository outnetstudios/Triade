<?php
/**
 * Configuración base del tema.
 *
 * @package triade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Soporte del tema y menús.
 */
function triade_setup() {
	load_theme_textdomain( 'triade', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', array( 'height' => 96, 'width' => 320, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus(
		array(
			'primary' => __( 'Menú Principal', 'triade' ),
			'legal'   => __( 'Menú Legal (pie)', 'triade' ),
		)
	);

	add_image_size( 'triade-card', 900, 600, true );
	add_image_size( 'triade-wide', 1400, 800, true );
}
add_action( 'after_setup_theme', 'triade_setup' );

/**
 * Ancho de contenido.
 */
function triade_content_width() {
	$GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'triade_content_width', 0 );

/**
 * Longitud del extracto.
 *
 * @param int $length Longitud.
 * @return int
 */
function triade_excerpt_length( $length ) {
	return is_admin() ? $length : 28;
}
add_filter( 'excerpt_length', 'triade_excerpt_length' );

/**
 * Puntos suspensivos del extracto.
 *
 * @return string
 */
function triade_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'triade_excerpt_more' );

/**
 * Imagen destacada por defecto en listados.
 *
 * @param string $html    HTML.
 * @param int    $post_id ID.
 * @return string
 */
function triade_post_thumbnail_fallback( $html, $post_id ) {
	if ( $html ) {
		return $html;
	}

	$image = get_template_directory_uri() . '/assets/img/hero-solar.jpg';

	return sprintf(
		'<img src="%1$s" alt="%2$s" width="1408" height="768" loading="lazy" decoding="async" class="w-full h-48 object-cover">',
		esc_url( $image ),
		esc_attr( get_the_title( $post_id ) )
	);
}
add_filter( 'post_thumbnail_html', 'triade_post_thumbnail_fallback', 10, 2 );

/**
 * Clases de body para identificar la portada.
 *
 * @param array $classes Clases.
 * @return array
 */
function triade_body_classes( $classes ) {
	$classes[] = 'triade';

	if ( is_front_page() ) {
		$classes[] = 'is-triade-front';
	}

	return $classes;
}
add_filter( 'body_class', 'triade_body_classes' );

/**
 * Quita el generador de WordPress del HTML público.
 */
remove_action( 'wp_head', 'wp_generator' );
