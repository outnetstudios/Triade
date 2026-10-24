<?php
/**
 * Plugin Name:       TRIADE SMTP
 * Plugin URI:        https://triade.org.es
 * Description:       Configura el envío de correo de WordPress mediante SMTP desde el panel de administración. Pensado para TRIADE.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            TRIADE
 * Author URI:        https://triade.org.es
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       triade-smtp
 * Domain Path:       /languages
 *
 * @package Triade_SMTP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TRIADE_SMTP_VERSION', '1.0.0' );
define( 'TRIADE_SMTP_OPTION', 'triade_smtp_options' );

/**
 * Plugin SMTP de TRIADE.
 */
final class Triade_SMTP {

	/**
	 * Instancia única.
	 *
	 * @var Triade_SMTP|null
	 */
	private static $instance = null;

	/**
	 * Devuelve la instancia.
	 *
	 * @return Triade_SMTP
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'action_links' ) );

		add_action( 'phpmailer_init', array( $this, 'configure_phpmailer' ), 999 );
		add_filter( 'wp_mail_from', array( $this, 'filter_from_email' ), 999 );
		add_filter( 'wp_mail_from_name', array( $this, 'filter_from_name' ), 999 );

		add_action( 'admin_post_triade_smtp_test', array( $this, 'handle_test_email' ) );
		add_action( 'wp_mail_failed', array( $this, 'capture_mail_error' ) );
		add_action( 'admin_notices', array( $this, 'admin_notices' ) );
	}

	/**
	 * Valores por defecto.
	 *
	 * @return array
	 */
	public static function default_options() {
		return array(
			'enabled'    => 1,
			'host'       => '',
			'port'       => 587,
			'encryption' => 'tls',
			'auth'       => 1,
			'username'   => '',
			'password'   => '',
			'from_email' => get_option( 'admin_email' ),
			'from_name'  => get_bloginfo( 'name' ),
			'timeout'    => 15,
			'verify_ssl' => 1,
		);
	}

	/**
	 * Opciones actuales, mezcladas con las predeterminadas.
	 *
	 * @return array
	 */
	private function get_options() {
		$saved = get_option( TRIADE_SMTP_OPTION, array() );

		if ( ! is_array( $saved ) ) {
			$saved = array();
		}

		return wp_parse_args( $saved, self::default_options() );
	}

	/**
	 * Registro en la activación.
	 */
	public static function activate() {
		if ( false === get_option( TRIADE_SMTP_OPTION, false ) ) {
			add_option( TRIADE_SMTP_OPTION, self::default_options() );
		}
	}

	/**
	 * Enlace a los ajustes desde la lista de plugins.
	 *
	 * @param array $links Enlaces.
	 * @return array
	 */
	public function action_links( $links ) {
		$links[] = sprintf(
			'<a href="%s">%s</a>',
			esc_url( admin_url( 'options-general.php?page=triade-smtp' ) ),
			esc_html__( 'Configurar', 'triade-smtp' )
		);

		return $links;
	}

	/**
	 * Página de ajustes.
	 */
	public function admin_menu() {
		add_options_page(
			__( 'SMTP TRIADE', 'triade-smtp' ),
			__( 'SMTP TRIADE', 'triade-smtp' ),
			'manage_options',
			'triade-smtp',
			array( $this, 'render_page' )
		);
	}

	/**
	 * CSS del panel.
	 *
	 * @param string $hook Hook de la página.
	 */
	public function enqueue_admin_assets( $hook ) {
		if ( 'settings_page_triade-smtp' !== $hook ) {
			return;
		}

		wp_enqueue_style(
			'triade-smtp-admin',
			plugin_dir_url( __FILE__ ) . 'assets/admin.css',
			array(),
			TRIADE_SMTP_VERSION
		);
	}

	/**
	 * Registra el ajuste y los campos.
	 */
	public function register_settings() {
		register_setting(
			'triade_smtp',
			TRIADE_SMTP_OPTION,
			array(
				'type'              => 'array',
				'sanitize_callback' => array( $this, 'sanitize_options' ),
				'default'           => self::default_options(),
			)
		);

		add_settings_section(
			'triade_smtp_server',
			__( 'Servidor de correo', 'triade-smtp' ),
			array( $this, 'section_server_intro' ),
			'triade-smtp'
		);

		$fields = array(
			'enabled'    => array( __( 'Activar SMTP', 'triade-smtp' ), 'field_enabled' ),
			'host'       => array( __( 'Servidor SMTP', 'triade-smtp' ), 'field_host' ),
			'port'       => array( __( 'Puerto', 'triade-smtp' ), 'field_port' ),
			'encryption' => array( __( 'Cifrado', 'triade-smtp' ), 'field_encryption' ),
			'auth'       => array( __( 'Autenticación', 'triade-smtp' ), 'field_auth' ),
			'username'   => array( __( 'Usuario SMTP', 'triade-smtp' ), 'field_username' ),
			'password'   => array( __( 'Contraseña SMTP', 'triade-smtp' ), 'field_password' ),
			'from_email' => array( __( 'Email remitente', 'triade-smtp' ), 'field_from_email' ),
			'from_name'  => array( __( 'Nombre remitente', 'triade-smtp' ), 'field_from_name' ),
			'timeout'    => array( __( 'Tiempo de espera', 'triade-smtp' ), 'field_timeout' ),
			'verify_ssl' => array( __( 'Certificado SSL', 'triade-smtp' ), 'field_verify_ssl' ),
		);

		foreach ( $fields as $key => $field ) {
			add_settings_field(
				'triade_smtp_' . $key,
				$field[0],
				array( $this, $field[1] ),
				'triade-smtp',
				'triade_smtp_server',
				array( 'label_for' => 'triade-smtp-' . $key )
			);
		}
	}

	/**
	 * Texto introductorio de la sección.
	 */
	public function section_server_intro() {
		echo '<p>' . esc_html__( 'Datos que te ha facilitado tu proveedor de correo. Si no sabes cuáles usar, revisa la ayuda de la derecha.', 'triade-smtp' ) . '</p>';
	}

	/**
	 * Campo: activar.
	 */
	public function field_enabled() {
		$options = $this->get_options();
		?>
		<label for="triade-smtp-enabled">
			<input type="checkbox" id="triade-smtp-enabled" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[enabled]" value="1" <?php checked( ! empty( $options['enabled'] ) ); ?> />
			<?php esc_html_e( 'Usar SMTP para todos los correos de WordPress', 'triade-smtp' ); ?>
		</label>
		<p class="description"><?php esc_html_e( 'Si está desactivado, WordPress seguirá usando el método de correo del servidor.', 'triade-smtp' ); ?></p>
		<?php
	}

	/**
	 * Campo: host.
	 */
	public function field_host() {
		$options = $this->get_options();
		?>
		<input type="text" class="regular-text" id="triade-smtp-host" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[host]" value="<?php echo esc_attr( $options['host'] ); ?>" placeholder="smtp.tuservicio.com" autocomplete="off" />
		<p class="description"><?php esc_html_e( 'Sin “https://” ni barras. También puedes pegar “host:puerto”.', 'triade-smtp' ); ?></p>
		<?php
	}

	/**
	 * Campo: puerto.
	 */
	public function field_port() {
		$options = $this->get_options();
		?>
		<input type="number" class="small-text" id="triade-smtp-port" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[port]" value="<?php echo esc_attr( $options['port'] ); ?>" min="1" max="65535" step="1" />
		<p class="description"><?php esc_html_e( 'Habitual: 587 con TLS, 465 con SSL, 25 sin cifrado.', 'triade-smtp' ); ?></p>
		<?php
	}

	/**
	 * Campo: cifrado.
	 */
	public function field_encryption() {
		$options = $this->get_options();
		$choices = array(
			'tls'  => __( 'TLS / STARTTLS (recomendado, puerto 587)', 'triade-smtp' ),
			'ssl'  => __( 'SSL (puerto 465)', 'triade-smtp' ),
			'none' => __( 'Sin cifrado (solo si tu proveedor lo exige)', 'triade-smtp' ),
		);
		?>
		<select id="triade-smtp-encryption" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[encryption]">
			<?php foreach ( $choices as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $options['encryption'], $value ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
		<?php
	}

	/**
	 * Campo: autenticación.
	 */
	public function field_auth() {
		$options = $this->get_options();
		?>
		<label for="triade-smtp-auth">
			<input type="checkbox" id="triade-smtp-auth" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[auth]" value="1" <?php checked( ! empty( $options['auth'] ) ); ?> />
			<?php esc_html_e( 'El servidor requiere usuario y contraseña', 'triade-smtp' ); ?>
		</label>
		<?php
	}

	/**
	 * Campo: usuario.
	 */
	public function field_username() {
		$options = $this->get_options();
		?>
		<input type="text" class="regular-text" id="triade-smtp-username" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[username]" value="<?php echo esc_attr( $options['username'] ); ?>" autocomplete="off" />
		<p class="description"><?php esc_html_e( 'Normalmente es tu dirección de correo o el usuario que te da el proveedor.', 'triade-smtp' ); ?></p>
		<?php
	}

	/**
	 * Campo: contraseña.
	 */
	public function field_password() {
		$options      = $this->get_options();
		$has_password = ! empty( $options['password'] );
		?>
		<input type="password" class="regular-text" id="triade-smtp-password" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[password]" value="" autocomplete="new-password" placeholder="<?php echo $has_password ? esc_attr__( '•••••••• (guardada)', 'triade-smtp' ) : esc_attr__( 'Contraseña o app password', 'triade-smtp' ); ?>" />
		<?php if ( $has_password ) : ?>
			<p class="description"><?php esc_html_e( 'Hay una contraseña guardada. Deja el campo vacío para conservarla.', 'triade-smtp' ); ?></p>
			<label for="triade-smtp-clear-password">
				<input type="checkbox" id="triade-smtp-clear-password" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[clear_password]" value="1" />
				<?php esc_html_e( 'Borrar la contraseña guardada', 'triade-smtp' ); ?>
			</label>
		<?php endif; ?>
		<p class="description"><?php esc_html_e( 'Usa una contraseña de aplicación del servicio, no la contraseña principal de tu cuenta.', 'triade-smtp' ); ?></p>
		<?php
	}

	/**
	 * Campo: email remitente.
	 */
	public function field_from_email() {
		$options = $this->get_options();
		?>
		<input type="email" class="regular-text" id="triade-smtp-from-email" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[from_email]" value="<?php echo esc_attr( $options['from_email'] ); ?>" autocomplete="off" />
		<p class="description"><?php esc_html_e( 'Debe ser una dirección autorizada por tu proveedor SMTP.', 'triade-smtp' ); ?></p>
		<?php
	}

	/**
	 * Campo: nombre remitente.
	 */
	public function field_from_name() {
		$options = $this->get_options();
		?>
		<input type="text" class="regular-text" id="triade-smtp-from-name" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[from_name]" value="<?php echo esc_attr( $options['from_name'] ); ?>" />
		<?php
	}

	/**
	 * Campo: timeout.
	 */
	public function field_timeout() {
		$options = $this->get_options();
		?>
		<input type="number" class="small-text" id="triade-smtp-timeout" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[timeout]" value="<?php echo esc_attr( $options['timeout'] ); ?>" min="5" max="60" step="1" />
		<span class="description"><?php esc_html_e( 'segundos', 'triade-smtp' ); ?></span>
		<?php
	}

	/**
	 * Campo: verificar SSL.
	 */
	public function field_verify_ssl() {
		$options = $this->get_options();
		?>
		<label for="triade-smtp-verify-ssl">
			<input type="checkbox" id="triade-smtp-verify-ssl" name="<?php echo esc_attr( TRIADE_SMTP_OPTION ); ?>[verify_ssl]" value="1" <?php checked( ! empty( $options['verify_ssl'] ) ); ?> />
			<?php esc_html_e( 'Verificar el certificado del servidor', 'triade-smtp' ); ?>
		</label>
		<p class="description"><?php esc_html_e( 'Déjalo activado. Desactívalo solo si tu proveedor usa un certificado autofirmado.', 'triade-smtp' ); ?></p>
		<?php
	}

	/**
	 * Sanitiza las opciones.
	 *
	 * @param mixed $input Valores enviados.
	 * @return array
	 */
	public function sanitize_options( $input ) {
		$old = $this->get_options();
		$out = $old;

		if ( ! is_array( $input ) ) {
			$input = array();
		}

		$out['enabled'] = empty( $input['enabled'] ) ? 0 : 1;
		$out['auth']    = empty( $input['auth'] ) ? 0 : 1;

		$host = isset( $input['host'] ) && is_scalar( $input['host'] ) ? trim( (string) wp_unslash( $input['host'] ) ) : '';
		$host = preg_replace( '#^smtps?://#i', '', $host );
		$host = rtrim( $host, '/' );

		if ( preg_match( '/^(.+):(\d{1,5})$/', $host, $matches ) && false === strpos( $matches[1], ':' ) ) {
			$host          = $matches[1];
			$input['port'] = $matches[2];
		}

		$out['host'] = sanitize_text_field( $host );

		$port        = isset( $input['port'] ) && is_scalar( $input['port'] ) ? absint( $input['port'] ) : 587;
		$out['port'] = ( $port >= 1 && $port <= 65535 ) ? $port : 587;

		$encryption        = isset( $input['encryption'] ) && is_scalar( $input['encryption'] ) ? sanitize_key( $input['encryption'] ) : 'tls';
		$out['encryption'] = in_array( $encryption, array( 'none', 'ssl', 'tls' ), true ) ? $encryption : 'tls';

		$out['username'] = isset( $input['username'] ) && is_scalar( $input['username'] ) ? sanitize_text_field( wp_unslash( $input['username'] ) ) : '';

		if ( ! empty( $input['clear_password'] ) ) {
			$out['password'] = '';
		} elseif ( isset( $input['password'] ) && is_scalar( $input['password'] ) ) {
			$password = trim( (string) wp_unslash( $input['password'] ) );

			if ( '' !== $password ) {
				$out['password'] = wp_check_invalid_utf8( $password, true );
			}
		}

		$from_email        = isset( $input['from_email'] ) && is_scalar( $input['from_email'] ) ? sanitize_email( wp_unslash( $input['from_email'] ) ) : '';
		$out['from_email'] = ( $from_email && is_email( $from_email ) ) ? $from_email : $old['from_email'];

		$out['from_name'] = isset( $input['from_name'] ) && is_scalar( $input['from_name'] ) ? sanitize_text_field( wp_unslash( $input['from_name'] ) ) : $old['from_name'];

		$timeout           = isset( $input['timeout'] ) && is_scalar( $input['timeout'] ) ? absint( $input['timeout'] ) : 15;
		$out['timeout']    = ( $timeout >= 5 && $timeout <= 60 ) ? $timeout : 15;
		$out['verify_ssl'] = empty( $input['verify_ssl'] ) ? 0 : 1;

		return $out;
	}

	/**
	 * Configura PHPMailer para usar SMTP.
	 *
	 * @param PHPMailer\PHPMailer\PHPMailer $phpmailer Instancia de PHPMailer.
	 */
	public function configure_phpmailer( $phpmailer ) {
		$options = $this->get_options();

		if ( empty( $options['enabled'] ) || empty( $options['host'] ) ) {
			return;
		}

		$phpmailer->isSMTP();
		$phpmailer->Host = $options['host'];
		$phpmailer->Port = (int) $options['port'];

		$phpmailer->SMTPAuth = ! empty( $options['auth'] );

		if ( $phpmailer->SMTPAuth ) {
			$phpmailer->Username = $options['username'];
			$phpmailer->Password = $options['password'];
		}

		if ( 'ssl' === $options['encryption'] ) {
			$phpmailer->SMTPSecure  = 'ssl';
			$phpmailer->SMTPAutoTLS = false;
		} elseif ( 'tls' === $options['encryption'] ) {
			$phpmailer->SMTPSecure  = 'tls';
			$phpmailer->SMTPAutoTLS = true;
		} else {
			$phpmailer->SMTPSecure  = '';
			$phpmailer->SMTPAutoTLS = false;
		}

		$phpmailer->Timeout    = max( 5, (int) $options['timeout'] );
		$phpmailer->CharSet    = 'UTF-8';
		$phpmailer->SMTPOptions = array(
			'ssl' => array(
				'verify_peer'       => ! empty( $options['verify_ssl'] ),
				'verify_peer_name'  => ! empty( $options['verify_ssl'] ),
				'allow_self_signed' => empty( $options['verify_ssl'] ),
			),
		);
	}

	/**
	 * Filtro del email remitente.
	 *
	 * @param string $email Email original.
	 * @return string
	 */
	public function filter_from_email( $email ) {
		$options = $this->get_options();

		if ( ! empty( $options['enabled'] ) && ! empty( $options['host'] ) && is_email( $options['from_email'] ) ) {
			return $options['from_email'];
		}

		return $email;
	}

	/**
	 * Filtro del nombre remitente.
	 *
	 * @param string $name Nombre original.
	 * @return string
	 */
	public function filter_from_name( $name ) {
		$options = $this->get_options();

		if ( ! empty( $options['enabled'] ) && ! empty( $options['host'] ) && ! empty( $options['from_name'] ) ) {
			return $options['from_name'];
		}

		return $name;
	}

	/**
	 * Clave del transient de error.
	 *
	 * @return string
	 */
	private function error_key() {
		return 'triade_smtp_last_error_' . get_current_user_id();
	}

	/**
	 * Guarda el error de wp_mail.
	 *
	 * @param WP_Error $error Error.
	 */
	public function capture_mail_error( $error ) {
		if ( is_wp_error( $error ) ) {
			set_transient( $this->error_key(), $error->get_error_message(), 5 * MINUTE_IN_SECONDS );
		}
	}

	/**
	 * Envía el correo de prueba.
	 */
	public function handle_test_email() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'No tienes permisos para hacer esta prueba.', 'triade-smtp' ) );
		}

		check_admin_referer( 'triade_smtp_test', 'triade_smtp_test_nonce' );

		$to = isset( $_POST['test_email'] ) ? sanitize_email( wp_unslash( $_POST['test_email'] ) ) : '';

		if ( ! $to || ! is_email( $to ) ) {
			$to = get_option( 'admin_email' );
		}

		delete_transient( $this->error_key() );

		$subject = sprintf(
			/* translators: %s: nombre del sitio */
			__( '[%s] Prueba de configuración SMTP', 'triade-smtp' ),
			wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES )
		);

		$message = implode(
			"\n",
			array(
				__( 'Este es un correo de prueba enviado desde el panel de WordPress de TRIADE.', 'triade-smtp' ),
				'',
				__( 'Si lo recibes, la configuración SMTP funciona correctamente.', 'triade-smtp' ),
				'',
				sprintf(
					/* translators: %s: URL del sitio */
					__( 'Sitio: %s', 'triade-smtp' ),
					home_url( '/' )
				),
			)
		);

		$sent  = wp_mail( $to, $subject, $message, array( 'Content-Type: text/plain; charset=UTF-8' ) );
		$error = get_transient( $this->error_key() );

		if ( ! $sent && ! $error ) {
			$error = __( 'WordPress no pudo enviar el correo, pero el servidor no devolvió un detalle adicional.', 'triade-smtp' );
		}

		set_transient(
			'triade_smtp_test_result_' . get_current_user_id(),
			array(
				'success' => (bool) $sent,
				'message' => $sent
					? sprintf(
						/* translators: %s: email destinatario */
						__( 'Correo de prueba enviado a %s. Revisa la bandeja de entrada y la carpeta de spam.', 'triade-smtp' ),
						$to
					)
					: $error,
			),
			5 * MINUTE_IN_SECONDS
		);

		$redirect = wp_get_referer();

		if ( ! $redirect ) {
			$redirect = admin_url( 'options-general.php?page=triade-smtp' );
		}

		wp_safe_redirect( $redirect );
		exit;
	}

	/**
	 * Avisos de prueba y configuración.
	 */
	public function admin_notices() {
		$result_key = 'triade_smtp_test_result_' . get_current_user_id();
		$result     = get_transient( $result_key );

		if ( $result && is_array( $result ) ) {
			delete_transient( $result_key );

			$class = ! empty( $result['success'] ) ? 'notice-success' : 'notice-error';
			printf(
				'<div class="notice %1$s is-dismissible"><p><strong>%2$s</strong> %3$s</p></div>',
				esc_attr( $class ),
				esc_html__( 'SMTP TRIADE:', 'triade-smtp' ),
				esc_html( isset( $result['message'] ) ? $result['message'] : '' )
			);
		}
	}

	/**
	 * Página de administración.
	 */
	public function render_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$options    = $this->get_options();
		$configured = ! empty( $options['enabled'] ) && ! empty( $options['host'] );
		$has_pass   = ! empty( $options['password'] );
		?>
		<div class="wrap triade-smtp-wrap">
			<h1><?php esc_html_e( 'SMTP TRIADE', 'triade-smtp' ); ?></h1>
			<p class="description"><?php esc_html_e( 'Configura el servidor de correo saliente. Después podrás enviar un correo de prueba sin salir de esta página.', 'triade-smtp' ); ?></p>

			<div class="triade-smtp-status <?php echo $configured ? 'is-on' : 'is-off'; ?>">
				<span class="triade-smtp-badge"><?php echo $configured ? esc_html__( 'Configurado', 'triade-smtp' ) : esc_html__( 'Sin configurar', 'triade-smtp' ); ?></span>
				<span>
					<?php
					if ( $configured ) {
						printf(
							/* translators: 1: host, 2: puerto */
							esc_html__( 'Servidor: %1$s:%2$s', 'triade-smtp' ),
							esc_html( $options['host'] ),
							esc_html( (string) $options['port'] )
						);
					} else {
						esc_html_e( 'Añade el host y las credenciales de tu proveedor para activar el envío.', 'triade-smtp' );
					}
					?>
				</span>
			</div>

			<?php settings_errors(); ?>

			<div class="triade-smtp-grid">
				<div class="triade-smtp-card">
					<form method="post" action="options.php">
						<?php
						settings_fields( 'triade_smtp' );
						do_settings_sections( 'triade-smtp' );
						submit_button( __( 'Guardar configuración', 'triade-smtp' ) );
						?>
					</form>
				</div>

				<div class="triade-smtp-side">
					<div class="triade-smtp-card">
						<h2><?php esc_html_e( 'Probar envío', 'triade-smtp' ); ?></h2>
						<p><?php esc_html_e( 'Guarda primero los cambios y envía un correo de prueba a la dirección que indiques.', 'triade-smtp' ); ?></p>
						<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
							<input type="hidden" name="action" value="triade_smtp_test" />
							<?php wp_nonce_field( 'triade_smtp_test', 'triade_smtp_test_nonce' ); ?>
							<p>
								<label for="triade-smtp-test-email"><?php esc_html_e( 'Destinatario', 'triade-smtp' ); ?></label><br />
								<input type="email" class="regular-text" id="triade-smtp-test-email" name="test_email" value="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>" required />
							</p>
							<?php submit_button( __( 'Enviar correo de prueba', 'triade-smtp' ), 'secondary', 'submit', false ); ?>
						</form>
					</div>

					<div class="triade-smtp-card">
						<h2><?php esc_html_e( 'Estado del entorno', 'triade-smtp' ); ?></h2>
						<ul class="triade-smtp-list">
							<li><span><?php esc_html_e( 'OpenSSL', 'triade-smtp' ); ?></span><strong><?php echo extension_loaded( 'openssl' ) ? esc_html__( 'Disponible', 'triade-smtp' ) : esc_html__( 'No disponible', 'triade-smtp' ); ?></strong></li>
							<li><span><?php esc_html_e( 'Contraseña guardada', 'triade-smtp' ); ?></span><strong><?php echo $has_pass ? esc_html__( 'Sí', 'triade-smtp' ) : esc_html__( 'No', 'triade-smtp' ); ?></strong></li>
							<li><span><?php esc_html_e( 'PHP', 'triade-smtp' ); ?></span><strong><?php echo esc_html( PHP_VERSION ); ?></strong></li>
							<li><span><?php esc_html_e( 'WordPress', 'triade-smtp' ); ?></span><strong><?php echo esc_html( get_bloginfo( 'version' ) ); ?></strong></li>
						</ul>
					</div>

					<div class="triade-smtp-card">
						<h2><?php esc_html_e( 'Ayuda rápida', 'triade-smtp' ); ?></h2>
						<ul class="triade-smtp-list triade-smtp-help">
							<li><strong>Gmail:</strong> <code>smtp.gmail.com</code>, 587, TLS. Usa una <em>contraseña de aplicación</em>.</li>
							<li><strong>Microsoft 365:</strong> <code>smtp.office365.com</code>, 587, TLS.</li>
							<li><strong>Brevo / Mailgun / SendGrid:</strong> usa el host y las credenciales SMTP de su panel.</li>
							<li>Si tu proveedor indica el puerto <strong>465</strong>, selecciona <strong>SSL</strong>.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

register_activation_hook( __FILE__, array( 'Triade_SMTP', 'activate' ) );

Triade_SMTP::instance();
