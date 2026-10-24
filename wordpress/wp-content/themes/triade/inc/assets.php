<?php
/**
 * Carga de estilos y scripts.
 *
 * @package triade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Versión basada en la fecha de modificación del archivo.
 *
 * @param string $relative_path Ruta relativa al tema.
 * @return string
 */
function triade_asset_version( $relative_path ) {
	$file = get_template_directory() . $relative_path;

	return file_exists( $file ) ? (string) filemtime( $file ) : '1.0.0';
}

/**
 * Preconexión a Google Fonts.
 *
 * @param array  $urls          URLs.
 * @param string $relation_type Tipo de relación.
 * @return array
 */
function triade_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.googleapis.com',
			'crossorigin' => 'anonymous',
		);
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'triade_resource_hints', 10, 2 );

/**
 * Estilos y scripts del front-end.
 */
function triade_assets() {
	wp_enqueue_style(
		'triade-fonts',
		'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,200..400,0..1,0&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'triade-tailwind',
		get_template_directory_uri() . '/assets/css/tailwind.css',
		array( 'triade-fonts' ),
		triade_asset_version( '/assets/css/tailwind.css' )
	);

	wp_enqueue_style(
		'triade-style',
		get_template_directory_uri() . '/style.css',
		array( 'triade-tailwind' ),
		wp_get_theme( 'triade' )->get( 'Version' )
	);

	wp_enqueue_script(
		'triade-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		triade_asset_version( '/assets/js/main.js' ),
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);

	wp_localize_script(
		'triade-main',
		'triadeData',
		array(
			'ajaxUrl'          => admin_url( 'admin-ajax.php' ),
			'contactNonce'     => wp_create_nonce( 'triade_contact' ),
			'newsletterNonce'  => wp_create_nonce( 'triade_newsletter' ),
			'isFront'          => is_front_page(),
			'homeUrl'          => home_url( '/' ),
			'strings'          => array(
				'sending'       => __( 'Enviando…', 'triade' ),
				'send'          => __( 'Enviar Solicitud de Cuadrilla', 'triade' ),
				'subscribe'     => __( 'Suscribirme', 'triade' ),
				'subscribing'   => __( 'Guardando…', 'triade' ),
				'genericError'  => __( 'No hemos podido enviar la solicitud. Inténtalo de nuevo o escríbenos por email.', 'triade' ),
				'networkError'  => __( 'Error de conexión. Revisa tu red e inténtalo de nuevo.', 'triade' ),
			),
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'triade_assets' );

/**
 * Precarga la imagen principal en la portada.
 */
function triade_preload_hero() {
	if ( ! is_front_page() ) {
		return;
	}

	printf(
		'<link rel="preload" as="image" href="%s" fetchpriority="high" />' . "\n",
		esc_url( get_template_directory_uri() . '/assets/img/hero-solar.jpg' )
	);
}
add_action( 'wp_head', 'triade_preload_hero', 2 );
