<?php
/**
 * Personalizador: datos corporativos editables.
 *
 * @package triade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registra los ajustes del tema.
 *
 * @param WP_Customize_Manager $wp_customize Personalizador.
 */
function triade_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'triade_contacto',
		array(
			'title'       => __( 'Datos de TRIADE', 'triade' ),
			'description' => __( 'Estos datos aparecen en la cabecera, el pie y la sección de contacto.', 'triade' ),
			'priority'    => 30,
		)
	);

	$fields = array(
		'phone'   => array(
			'label'    => __( 'Teléfono', 'triade' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'email'   => array(
			'label'    => __( 'Email de contacto', 'triade' ),
			'type'     => 'email',
			'sanitize' => 'sanitize_email',
		),
		'address' => array(
			'label'    => __( 'Dirección', 'triade' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'city'    => array(
			'label'    => __( 'Ciudad y país', 'triade' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'hours'   => array(
			'label'    => __( 'Horario de atención', 'triade' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'company' => array(
			'label'    => __( 'Razón social', 'triade' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'cif'     => array(
			'label'    => __( 'CIF', 'triade' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
	);

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			'triade_' . $key,
			array(
				'default'           => triade_default( $key ),
				'sanitize_callback' => $field['sanitize'],
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'triade_' . $key,
			array(
				'label'   => $field['label'],
				'section' => 'triade_contacto',
				'type'    => $field['type'],
			)
		);
	}
}
add_action( 'customize_register', 'triade_customize_register' );
