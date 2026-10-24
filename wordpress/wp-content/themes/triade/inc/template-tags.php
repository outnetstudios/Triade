<?php
/**
 * Helpers y componentes de plantilla de TRIADE.
 *
 * @package triade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Valores por defecto de los datos corporativos.
 *
 * @param string $key Clave.
 * @return string
 */
function triade_default( $key ) {
	$defaults = array(
		'phone'   => '+34 854 401 426',
		'email'   => 'info@triade.org.es',
		'address' => 'Calle Astronomía Número 1, Torre 3, Planta 8, Módulo 4',
		'city'    => 'Sevilla, España',
		'company' => 'Trabajadores Inmigrantes Aportando al Desarrollo SL',
		'cif'     => 'B-88540142',
		'hours'   => 'Lunes a viernes · 08:00–18:00',
	);

	return isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
}

/**
 * Devuelve un dato corporativo editable desde el Personalizador.
 *
 * @param string $key Clave.
 * @return string
 */
function triade_get( $key ) {
	return get_theme_mod( 'triade_' . $key, triade_default( $key ) );
}

/**
 * Teléfono listo para enlazar con tel:.
 *
 * @return string
 */
function triade_phone_link() {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', triade_get( 'phone' ) );
}

/**
 * Devuelve un ancla que funciona tanto en la portada como en el resto del sitio.
 *
 * @param string $id Identificador de sección.
 * @return string
 */
function triade_anchor( $id ) {
	return is_front_page() ? '#' . $id : home_url( '/#' . $id );
}

/**
 * Elementos del menú principal.
 *
 * Usa el menú asignado en Apariencia → Menús y, si no existe, la estructura
 * de la portada. Así el tema funciona recién instalado y sigue siendo editable.
 *
 * @return array
 */
function triade_nav_items() {
	$items = array();

	if ( has_nav_menu( 'primary' ) ) {
		$locations = get_nav_menu_locations();

		if ( ! empty( $locations['primary'] ) ) {
			$menu_items = wp_get_nav_menu_items( $locations['primary'] );

			if ( $menu_items ) {
				foreach ( $menu_items as $menu_item ) {
					if ( (int) $menu_item->menu_item_parent > 0 ) {
						continue;
					}

					$fragment = wp_parse_url( $menu_item->url, PHP_URL_FRAGMENT );

					$items[] = array(
						'label'   => $menu_item->title,
						'url'     => $menu_item->url,
						'section' => $fragment ? $fragment : '',
					);
				}
			}
		}
	}

	if ( empty( $items ) ) {
		$items = array(
			array(
				'label'   => __( 'Inicio', 'triade' ),
				'url'     => home_url( '/' ),
				'section' => '',
			),
			array(
				'label'   => __( 'Nuestra Empresa', 'triade' ),
				'url'     => home_url( '/#nuestra-empresa' ),
				'section' => 'nuestra-empresa',
			),
			array(
				'label'   => __( 'Servicios', 'triade' ),
				'url'     => home_url( '/#servicios' ),
				'section' => 'servicios',
			),
			array(
				'label'   => __( 'Equipo', 'triade' ),
				'url'     => home_url( '/#equipo' ),
				'section' => 'equipo',
			),
			array(
				'label'   => __( 'Cuadrillas', 'triade' ),
				'url'     => home_url( '/#cuadrillas' ),
				'section' => 'cuadrillas',
			),
			array(
				'label'   => __( 'Contacto', 'triade' ),
				'url'     => home_url( '/#contacto' ),
				'section' => 'contacto',
			),
		);
	}

	return apply_filters( 'triade_nav_items', $items );
}

/**
 * Pinta la navegación principal.
 *
 * @param string $variant desktop|mobile.
 */
function triade_render_nav( $variant = 'desktop' ) {
	$is_mobile = 'mobile' === $variant;

	foreach ( triade_nav_items() as $item ) {
		$is_active = is_front_page() && empty( $item['section'] );
		$classes   = $is_mobile ? 'nav-link-mobile' : 'nav-link';

		if ( $is_active ) {
			$classes .= ' is-active';
		}

		printf(
			'<a class="%1$s" href="%2$s" data-nav-section="%3$s"%4$s>%5$s%6$s</a>',
			esc_attr( $classes ),
			esc_url( $item['url'] ),
			esc_attr( $item['section'] ),
			$is_active ? ' aria-current="page"' : '',
			esc_html( $item['label'] ),
			$is_mobile ? '<span class="material-symbols-outlined text-[18px]" aria-hidden="true">chevron_right</span>' : ''
		);
	}
}

/**
 * URL del logotipo o icono del sitio.
 *
 * @return string
 */
function triade_logo_url() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );

	if ( $custom_logo_id ) {
		$image = wp_get_attachment_image_src( $custom_logo_id, 'full' );

		if ( $image ) {
			return $image[0];
		}
	}

	return '';
}
