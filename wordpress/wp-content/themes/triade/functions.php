<?php
/**
 * TRIADE parent theme.
 *
 * @package triade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function triade_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	register_nav_menus(
		array(
			'primary' => __( 'Menú Principal', 'triade' ),
		)
	);
}
add_action( 'after_setup_theme', 'triade_setup' );

function triade_assets() {
	wp_enqueue_style(
		'triade-fonts',
		'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,200..400,0..1,0&display=swap',
		array(),
		null
	);

	wp_enqueue_script( 'triade-tailwind', 'https://cdn.tailwindcss.com', array(), null, true );
	wp_enqueue_script(
		'triade-tailwind-config',
		get_template_directory_uri() . '/assets/js/tailwind-config.js',
		array( 'triade-tailwind' ),
		'1.0.0',
		true
	);

	wp_enqueue_style(
		'triade-style',
		get_template_directory_uri() . '/style.css',
		array( 'triade-fonts' ),
		wp_get_theme( 'triade' )->get( 'Version' )
	);

	wp_enqueue_script(
		'triade-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		'1.0.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'triade_assets' );

/**
 * Menú por defecto (usado si no hay un menú asignado en Apariencia > Menús).
 */
function triade_default_nav() {
	$items = array(
		array(
			'label'  => __( 'Inicio', 'triade' ),
			'url'    => '#inicio',
			'active' => true,
		),
		array(
			'label' => __( 'Nuestra Empresa', 'triade' ),
			'url'   => '#nuestra-empresa',
		),
		array(
			'label' => __( 'Servicios', 'triade' ),
			'url'   => '#servicios',
		),
		array(
			'label' => __( 'Equipo', 'triade' ),
			'url'   => '#equipo',
		),
		array(
			'label' => __( 'Cuadrillas', 'triade' ),
			'url'   => '#cuadrillas',
		),
		array(
			'label' => __( 'Contacto', 'triade' ),
			'url'   => '#contacto',
		),
	);

	foreach ( $items as $item ) {
		$active = ! empty( $item['active'] );

		printf(
			'<a %1$sclass="%2$s" href="%3$s">%4$s</a>',
			$active ? 'aria-current="page" ' : '',
			$active
				? 'transition-colors text-primary font-bold bg-surface-container-low px-space-sm py-space-xs rounded-lg'
				: 'font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors',
			esc_url( $item['url'] ),
			esc_html( $item['label'] )
		);
	}
}

/**
 * Los elementos del menú se pintan como hermanos directos del nav (flex).
 */
function triade_nav_menu_css_class( $classes ) {
	$classes[] = 'contents';
	return $classes;
}
add_filter( 'nav_menu_css_class', 'triade_nav_menu_css_class', 10, 1 );

function triade_nav_menu_link_atts( $atts, $item ) {
	$is_home = is_front_page() && ( (int) $item->object_id === (int) get_option( 'page_on_front' ) || 'home' === $item->url || home_url( '/' ) === $item->url );

	if ( $is_home ) {
		$atts['class']       = 'transition-colors text-primary font-bold bg-surface-container-low px-space-sm py-space-xs rounded-lg';
		$atts['aria-current'] = 'page';
	} else {
		$atts['class'] = 'font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'triade_nav_menu_link_atts', 10, 2 );

/**
 * Datos de contacto (usados en header/footer).
 */
function triade_phone() {
	return get_theme_mod( 'triade_phone', '+34 854 401 426' );
}

function triade_phone_link() {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', triade_phone() );
}
