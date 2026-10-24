<?php
/**
 * Formularios: solicitudes de cuadrilla y boletín técnico.
 *
 * Las solicitudes se guardan siempre en WordPress (nunca se pierden si el
 * servidor de correo falla) y además se intentan enviar por email.
 *
 * @package triade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Servicios disponibles en el formulario.
 *
 * @return array
 */
function triade_services() {
	return array(
		'montaje-estructuras'     => __( 'Montaje de estructuras', 'triade' ),
		'modulos-solares'         => __( 'Instalación de módulos', 'triade' ),
		'servicios-auxiliares'    => __( 'Servicios auxiliares', 'triade' ),
		'gestion-personal'        => __( 'Gestión de personal', 'triade' ),
		'construccion-estacional' => __( 'Construcción y recolección', 'triade' ),
		'otros'                   => __( 'Otro / A definir', 'triade' ),
	);
}

/**
 * Escalas de cuadrilla disponibles.
 *
 * @return array
 */
function triade_scales() {
	return array(
		'10'           => __( 'Cuadrilla de 10 personas', 'triade' ),
		'20'           => __( 'Cuadrilla de 20 personas', 'triade' ),
		'30'           => __( 'Cuadrilla de 30 personas', 'triade' ),
		'40'           => __( 'Cuadrilla de 40+ personas', 'triade' ),
		'personalizado' => __( 'A definir por proyecto', 'triade' ),
	);
}

/**
 * Registra los tipos de contenido internos.
 */
function triade_register_leads() {
	register_post_type(
		'triade_solicitud',
		array(
			'labels'       => array(
				'name'               => __( 'Solicitudes', 'triade' ),
				'singular_name'      => __( 'Solicitud', 'triade' ),
				'menu_name'          => __( 'Solicitudes', 'triade' ),
				'all_items'          => __( 'Todas las solicitudes', 'triade' ),
				'edit_item'          => __( 'Ver solicitud', 'triade' ),
				'view_item'          => __( 'Ver solicitud', 'triade' ),
				'search_items'       => __( 'Buscar solicitudes', 'triade' ),
				'not_found'          => __( 'Todavía no hay solicitudes.', 'triade' ),
				'not_found_in_trash' => __( 'No hay solicitudes en la papelera.', 'triade' ),
			),
			'public'       => false,
			'show_ui'      => true,
			'show_in_menu' => true,
			'menu_position' => 26,
			'menu_icon'    => 'dashicons-email-alt',
			'supports'     => array( 'title', 'editor' ),
			'map_meta_cap' => true,
			'capability_type' => 'post',
		)
	);

	register_post_type(
		'triade_suscriptor',
		array(
			'labels'       => array(
				'name'          => __( 'Suscriptores', 'triade' ),
				'singular_name' => __( 'Suscriptor', 'triade' ),
				'menu_name'     => __( 'Boletín', 'triade' ),
				'all_items'     => __( 'Suscriptores del boletín', 'triade' ),
				'edit_item'     => __( 'Ver suscriptor', 'triade' ),
				'search_items'  => __( 'Buscar suscriptores', 'triade' ),
				'not_found'     => __( 'Todavía no hay suscriptores.', 'triade' ),
			),
			'public'       => false,
			'show_ui'      => true,
			'show_in_menu' => 'edit.php?post_type=triade_solicitud',
			'supports'     => array( 'title' ),
			'map_meta_cap' => true,
			'capability_type' => 'post',
		)
	);
}
add_action( 'init', 'triade_register_leads' );

/**
 * Procesa una solicitud de cuadrilla.
 *
 * @return array{success:bool,message:string}
 */
function triade_contact_process() {
	$nonce = isset( $_POST['triade_contact_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['triade_contact_nonce'] ) ) : '';

	if ( ! wp_verify_nonce( $nonce, 'triade_contact' ) ) {
		return array(
			'success' => false,
			'message' => __( 'La sesión ha caducado. Recarga la página e inténtalo de nuevo.', 'triade' ),
		);
	}

	// Trampa para bots: si se rellena, respondemos como si todo hubiera ido bien.
	if ( ! empty( $_POST['website'] ) ) {
		return array(
			'success' => true,
			'message' => __( 'Solicitud recibida.', 'triade' ),
		);
	}

	$name     = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$company  = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$email    = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone    = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$service  = isset( $_POST['service'] ) ? sanitize_key( wp_unslash( $_POST['service'] ) ) : '';
	$scale    = isset( $_POST['scale'] ) ? sanitize_key( wp_unslash( $_POST['scale'] ) ) : '';
	$message  = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$privacy  = ! empty( $_POST['privacy'] );
	$services = triade_services();
	$scales   = triade_scales();

	if ( '' === $name || '' === $company || '' === $phone || '' === $message ) {
		return array(
			'success' => false,
			'message' => __( 'Completa todos los campos obligatorios.', 'triade' ),
		);
	}

	if ( ! is_email( $email ) ) {
		return array(
			'success' => false,
			'message' => __( 'El correo electrónico no es válido.', 'triade' ),
		);
	}

	if ( ! $privacy ) {
		return array(
			'success' => false,
			'message' => __( 'Debes aceptar la política de privacidad para enviar la solicitud.', 'triade' ),
		);
	}

	if ( ! isset( $services[ $service ] ) ) {
		$service = 'otros';
	}

	if ( ! isset( $scales[ $scale ] ) ) {
		$scale = 'personalizado';
	}

	$ip      = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	$limit   = 'triade_contact_' . md5( $ip . '|' . $email );
	$attempt = (int) get_transient( $limit );

	if ( $attempt >= 5 ) {
		return array(
			'success' => false,
			'message' => __( 'Hemos recibido varias solicitudes seguidas. Espera unos minutos o escríbenos directamente por email.', 'triade' ),
		);
	}

	set_transient( $limit, $attempt + 1, 10 * MINUTE_IN_SECONDS );

	$post_id = wp_insert_post(
		array(
			'post_type'    => 'triade_solicitud',
			'post_status'  => 'publish',
			'post_title'   => sprintf( '%s · %s', $name, $company ),
			'post_content' => $message,
			'post_author'  => 0,
		),
		true
	);

	if ( is_wp_error( $post_id ) ) {
		return array(
			'success' => false,
			'message' => __( 'No hemos podido guardar la solicitud. Inténtalo de nuevo en unos minutos.', 'triade' ),
		);
	}

	$meta = array(
		'_triade_name'    => $name,
		'_triade_company' => $company,
		'_triade_email'   => $email,
		'_triade_phone'   => $phone,
		'_triade_service' => $service,
		'_triade_scale'   => $scale,
		'_triade_privacy' => $privacy ? '1' : '0',
		'_triade_ip'      => $ip,
	);

	foreach ( $meta as $key => $value ) {
		update_post_meta( $post_id, $key, $value );
	}

	$to = triade_get( 'email' );

	if ( is_email( $to ) && apply_filters( 'triade_send_contact_email', true, $post_id, $meta ) ) {
		$subject = sprintf(
			/* translators: 1: nombre, 2: empresa */
			__( 'Nueva solicitud de cuadrilla · %1$s · %2$s', 'triade' ),
			$name,
			$company
		);

		$body = implode(
			"\n",
			array(
				'Nueva solicitud recibida desde la web de TRIADE.',
				'',
				'Nombre: ' . $name,
				'Empresa: ' . $company,
				'Email: ' . $email,
				'Teléfono: ' . $phone,
				'Servicio: ' . $services[ $service ],
				'Escala: ' . $scales[ $scale ],
				'',
				'Detalles del proyecto:',
				$message,
				'',
				'Ver en WordPress: ' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ),
			)
		);

		try {
			wp_mail(
				$to,
				$subject,
				$body,
				array(
					'Content-Type: text/plain; charset=UTF-8',
					sprintf( 'Reply-To: %1$s <%2$s>', $name, $email ),
				)
			);
		} catch ( \Throwable $e ) {
			// La solicitud ya está guardada; un fallo de correo no debe romper el formulario.
			error_log( 'TRIADE contact mail error: ' . $e->getMessage() );
		}
	}

	/**
	 * Permite conectar las solicitudes con un CRM, Slack o un webhook.
	 *
	 * @param int   $post_id ID de la solicitud.
	 * @param array $meta    Datos del formulario.
	 */
	do_action( 'triade_contact_created', $post_id, $meta );

	return array(
		'success' => true,
		'message' => __( '¡Solicitud enviada! Un coordinador de TRIADE contactará con tu equipo en menos de 24 horas laborables.', 'triade' ),
	);
}

/**
 * Respuesta AJAX de la solicitud.
 */
function triade_ajax_contact() {
	$result = triade_contact_process();

	wp_send_json( $result, $result['success'] ? 200 : 422 );
}
add_action( 'wp_ajax_triade_contact', 'triade_ajax_contact' );
add_action( 'wp_ajax_nopriv_triade_contact', 'triade_ajax_contact' );

/**
 * Fallback sin JavaScript.
 */
function triade_post_contact() {
	$result   = triade_contact_process();
	$redirect = wp_get_referer();

	if ( ! $redirect ) {
		$redirect = home_url( '/#contacto' );
	}

	$redirect = remove_query_arg( 'contacto', $redirect );
	$redirect = add_query_arg( 'contacto', $result['success'] ? 'ok' : 'error', $redirect );

	wp_safe_redirect( $redirect . '#contacto' );
	exit;
}
add_action( 'admin_post_triade_contact', 'triade_post_contact' );
add_action( 'admin_post_nopriv_triade_contact', 'triade_post_contact' );

/**
 * Procesa una suscripción al boletín.
 *
 * @return array{success:bool,message:string}
 */
function triade_newsletter_process() {
	$nonce = isset( $_POST['triade_newsletter_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['triade_newsletter_nonce'] ) ) : '';

	if ( ! wp_verify_nonce( $nonce, 'triade_newsletter' ) ) {
		return array(
			'success' => false,
			'message' => __( 'La sesión ha caducado. Recarga la página e inténtalo de nuevo.', 'triade' ),
		);
	}

	if ( ! empty( $_POST['website'] ) ) {
		return array(
			'success' => true,
			'message' => __( 'Suscripción guardada.', 'triade' ),
		);
	}

	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';

	if ( ! is_email( $email ) ) {
		return array(
			'success' => false,
			'message' => __( 'Introduce un correo electrónico válido.', 'triade' ),
		);
	}

	$existing = get_posts(
		array(
			'post_type'      => 'triade_suscriptor',
			'post_status'    => 'any',
			'title'          => $email,
			'posts_per_page' => 1,
			'fields'         => 'ids',
		)
	);

	if ( empty( $existing ) ) {
		wp_insert_post(
			array(
				'post_type'    => 'triade_suscriptor',
				'post_status'  => 'publish',
				'post_title'   => $email,
				'post_content' => '',
				'post_author'  => 0,
			)
		);
	}

	return array(
		'success' => true,
		'message' => __( '¡Gracias! Te hemos añadido al boletín técnico de TRIADE.', 'triade' ),
	);
}

/**
 * Respuesta AJAX del boletín.
 */
function triade_ajax_newsletter() {
	$result = triade_newsletter_process();

	wp_send_json( $result, $result['success'] ? 200 : 422 );
}
add_action( 'wp_ajax_triade_newsletter', 'triade_ajax_newsletter' );
add_action( 'wp_ajax_nopriv_triade_newsletter', 'triade_ajax_newsletter' );

/**
 * Fallback sin JavaScript del boletín.
 */
function triade_post_newsletter() {
	$result   = triade_newsletter_process();
	$redirect = wp_get_referer();

	if ( ! $redirect ) {
		$redirect = home_url( '/' );
	}

	$redirect = remove_query_arg( 'boletin', $redirect );
	$redirect = add_query_arg( 'boletin', $result['success'] ? 'ok' : 'error', $redirect );

	wp_safe_redirect( $redirect );
	exit;
}
add_action( 'admin_post_triade_newsletter', 'triade_post_newsletter' );
add_action( 'admin_post_nopriv_triade_newsletter', 'triade_post_newsletter' );

/**
 * Columnas de solicitudes.
 *
 * @param array $columns Columnas.
 * @return array
 */
function triade_solicitud_columns( $columns ) {
	return array(
		'cb'             => $columns['cb'],
		'title'          => __( 'Solicitante', 'triade' ),
		'triade_company' => __( 'Empresa', 'triade' ),
		'triade_email'   => __( 'Email', 'triade' ),
		'triade_phone'   => __( 'Teléfono', 'triade' ),
		'triade_service' => __( 'Servicio', 'triade' ),
		'triade_scale'   => __( 'Escala', 'triade' ),
		'date'           => __( 'Fecha', 'triade' ),
	);
}
add_filter( 'manage_triade_solicitud_posts_columns', 'triade_solicitud_columns' );

/**
 * Contenido de las columnas.
 *
 * @param string $column  Columna.
 * @param int    $post_id ID.
 */
function triade_solicitud_column_content( $column, $post_id ) {
	$services = triade_services();
	$scales   = triade_scales();

	switch ( $column ) {
		case 'triade_company':
			echo esc_html( get_post_meta( $post_id, '_triade_company', true ) );
			break;
		case 'triade_email':
			$email = get_post_meta( $post_id, '_triade_email', true );
			printf( '<a href="mailto:%1$s">%1$s</a>', esc_attr( $email ) );
			break;
		case 'triade_phone':
			$phone = get_post_meta( $post_id, '_triade_phone', true );
			printf( '<a href="tel:%1$s">%2$s</a>', esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ), esc_html( $phone ) );
			break;
		case 'triade_service':
			$service = get_post_meta( $post_id, '_triade_service', true );
			echo esc_html( isset( $services[ $service ] ) ? $services[ $service ] : $service );
			break;
		case 'triade_scale':
			$scale = get_post_meta( $post_id, '_triade_scale', true );
			echo esc_html( isset( $scales[ $scale ] ) ? $scales[ $scale ] : $scale );
			break;
	}
}
add_action( 'manage_triade_solicitud_posts_custom_column', 'triade_solicitud_column_content', 10, 2 );

/**
 * Metadatos en la ficha de la solicitud.
 */
function triade_solicitud_meta_box() {
	add_meta_box(
		'triade_solicitud_detalle',
		__( 'Datos de contacto', 'triade' ),
		'triade_solicitud_meta_box_html',
		'triade_solicitud',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'triade_solicitud_meta_box' );

/**
 * HTML del metabox.
 *
 * @param WP_Post $post Entrada.
 */
function triade_solicitud_meta_box_html( $post ) {
	$services = triade_services();
	$scales   = triade_scales();
	$service  = get_post_meta( $post->ID, '_triade_service', true );
	$scale    = get_post_meta( $post->ID, '_triade_scale', true );

	$rows = array(
		__( 'Nombre', 'triade' )   => get_post_meta( $post->ID, '_triade_name', true ),
		__( 'Empresa', 'triade' )  => get_post_meta( $post->ID, '_triade_company', true ),
		__( 'Email', 'triade' )    => get_post_meta( $post->ID, '_triade_email', true ),
		__( 'Teléfono', 'triade' ) => get_post_meta( $post->ID, '_triade_phone', true ),
		__( 'Servicio', 'triade' ) => isset( $services[ $service ] ) ? $services[ $service ] : $service,
		__( 'Escala', 'triade' )   => isset( $scales[ $scale ] ) ? $scales[ $scale ] : $scale,
		__( 'IP', 'triade' )       => get_post_meta( $post->ID, '_triade_ip', true ),
	);

	echo '<table class="widefat striped"><tbody>';

	foreach ( $rows as $label => $value ) {
		printf(
			'<tr><th scope="row" style="width:140px">%1$s</th><td>%2$s</td></tr>',
			esc_html( $label ),
			esc_html( $value )
		);
	}

	echo '</tbody></table>';
	printf(
		'<p style="margin-top:1em"><a class="button button-primary" href="mailto:%1$s">%2$s</a></p>',
		esc_attr( get_post_meta( $post->ID, '_triade_email', true ) ),
		esc_html__( 'Responder por email', 'triade' )
	);
}

/**
 * Columnas de suscriptores.
 *
 * @param array $columns Columnas.
 * @return array
 */
function triade_suscriptor_columns( $columns ) {
	return array(
		'cb'    => $columns['cb'],
		'title' => __( 'Email', 'triade' ),
		'date'  => __( 'Alta', 'triade' ),
	);
}
add_filter( 'manage_triade_suscriptor_posts_columns', 'triade_suscriptor_columns' );

/**
 * Widget del escritorio con las últimas solicitudes.
 */
function triade_dashboard_widget() {
	wp_add_dashboard_widget(
		'triade_ultimas_solicitudes',
		__( 'TRIADE · Últimas solicitudes', 'triade' ),
		'triade_dashboard_widget_render'
	);
}
add_action( 'wp_dashboard_setup', 'triade_dashboard_widget' );

/**
 * Render del widget.
 */
function triade_dashboard_widget_render() {
	$requests = get_posts(
		array(
			'post_type'      => 'triade_solicitud',
			'posts_per_page' => 5,
			'post_status'    => 'publish',
		)
	);

	if ( empty( $requests ) ) {
		echo '<p>' . esc_html__( 'Todavía no hay solicitudes.', 'triade' ) . '</p>';
		return;
	}

	echo '<ul style="margin:0">';

	foreach ( $requests as $request ) {
		printf(
			'<li style="padding:8px 0;border-bottom:1px solid #f0f0f1"><a href="%1$s"><strong>%2$s</strong></a><br><span style="color:#646970">%3$s · %4$s</span></li>',
			esc_url( get_edit_post_link( $request->ID ) ),
			esc_html( $request->post_title ),
			esc_html( get_post_meta( $request->ID, '_triade_email', true ) ),
			esc_html( get_the_date( '', $request ) )
		);
	}

	echo '</ul>';
	printf(
		'<p><a class="button" href="%s">%s</a></p>',
		esc_url( admin_url( 'edit.php?post_type=triade_solicitud' ) ),
		esc_html__( 'Ver todas', 'triade' )
	);
}
