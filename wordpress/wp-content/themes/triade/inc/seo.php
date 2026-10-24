<?php
/**
 * SEO básico, metadatos sociales y datos estructurados.
 *
 * @package triade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Descripción para buscadores y redes sociales.
 *
 * @return string
 */
function triade_meta_description() {
	if ( is_front_page() ) {
		return __( 'TRIADE es especialista en montaje de estructuras y módulos solares fotovoltaicos, servicios auxiliares y gestión de cuadrillas técnicas homologadas en España.', 'triade' );
	}

	if ( is_singular() ) {
		$excerpt = get_the_excerpt();

		if ( $excerpt ) {
			return wp_strip_all_tags( $excerpt );
		}
	}

	$description = get_bloginfo( 'description', 'display' );

	return $description ? wp_strip_all_tags( $description ) : get_bloginfo( 'name', 'display' );
}

/**
 * URL de la imagen social.
 *
 * @return string
 */
function triade_social_image() {
	if ( is_singular() && has_post_thumbnail() ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'triade-wide' );

		if ( $image ) {
			return $image[0];
		}
	}

	return get_template_directory_uri() . '/assets/img/hero-solar.jpg';
}

/**
 * Metadatos en el head.
 */
function triade_head_meta() {
	$description = triade_meta_description();
	$title       = wp_get_document_title();
	$image       = triade_social_image();
	$url         = is_singular() ? get_permalink() : get_pagenum_link( max( 1, (int) get_query_var( 'paged' ) ) );
	$type        = is_singular() ? 'article' : 'website';
	$site_name   = get_bloginfo( 'name', 'display' );

	echo "\n<!-- TRIADE · metadatos -->\n";
	printf( '<meta name="description" content="%s" />' . "\n", esc_attr( $description ) );
	printf( '<meta name="theme-color" content="%s" />' . "\n", esc_attr( '#006194' ) );

	if ( ! is_singular() ) {
		printf( '<link rel="canonical" href="%s" />' . "\n", esc_url( $url ) );
	}

	printf( '<meta property="og:locale" content="%s" />' . "\n", esc_attr( get_locale() ) );
	printf( '<meta property="og:type" content="%s" />' . "\n", esc_attr( $type ) );
	printf( '<meta property="og:site_name" content="%s" />' . "\n", esc_attr( $site_name ) );
	printf( '<meta property="og:title" content="%s" />' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:description" content="%s" />' . "\n", esc_attr( $description ) );
	printf( '<meta property="og:url" content="%s" />' . "\n", esc_url( $url ) );
	printf( '<meta property="og:image" content="%s" />' . "\n", esc_url( $image ) );
	printf( '<meta property="og:image:width" content="1408" />' . "\n" );
	printf( '<meta property="og:image:height" content="768" />' . "\n" );
	printf( '<meta name="twitter:card" content="summary_large_image" />' . "\n" );
	printf( '<meta name="twitter:title" content="%s" />' . "\n", esc_attr( $title ) );
	printf( '<meta name="twitter:description" content="%s" />' . "\n", esc_attr( $description ) );
	printf( '<meta name="twitter:image" content="%s" />' . "\n", esc_url( $image ) );

	if ( ! has_site_icon() ) {
		printf( '<link rel="icon" href="%s" type="image/svg+xml" />' . "\n", esc_url( get_template_directory_uri() . '/assets/img/favicon.svg' ) );
	}
}
add_action( 'wp_head', 'triade_head_meta', 1 );

/**
 * Datos estructurados de la organización.
 */
function triade_structured_data() {
	$data = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'LocalBusiness',
		'@id'         => home_url( '/#triade' ),
		'name'        => 'TRIADE',
		'legalName'   => triade_get( 'company' ),
		'description' => triade_meta_description(),
		'url'         => home_url( '/' ),
		'logo'        => get_template_directory_uri() . '/assets/img/logo-triade.svg',
		'image'       => get_template_directory_uri() . '/assets/img/hero-solar.jpg',
		'telephone'   => triade_get( 'phone' ),
		'email'       => triade_get( 'email' ),
		'vatID'       => triade_get( 'cif' ),
		'address'     => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => triade_get( 'address' ),
			'addressLocality' => 'Sevilla',
			'addressRegion'   => 'Andalucía',
			'postalCode'      => '41016',
			'addressCountry'  => 'ES',
		),
		'areaServed'  => array(
			'@type' => 'Country',
			'name'  => 'España',
		),
		'knowsAbout'  => array(
			'Montaje de estructuras fotovoltaicas',
			'Instalación de módulos solares',
			'Servicios auxiliares en obra',
			'Gestión de cuadrillas técnicas',
		),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_footer', 'triade_structured_data', 5 );

/**
 * Título de la portada y separador.
 *
 * @param array $parts Partes del título.
 * @return array
 */
function triade_document_title_parts( $parts ) {
	if ( is_front_page() ) {
		$parts['title']   = 'TRIADE';
		$parts['tagline'] = __( 'Montaje Solar y Servicios Auxiliares', 'triade' );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'triade_document_title_parts' );

/**
 * Separador del título.
 *
 * @return string
 */
function triade_document_title_separator() {
	return '·';
}
add_filter( 'document_title_separator', 'triade_document_title_separator' );
