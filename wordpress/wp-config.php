<?php
/**
 * Configuración de WordPress para TRIADE en Wasmer Edge.
 *
 * Las credenciales de la base de datos NO están aquí: Wasmer inyecta las
 * variables de entorno DB_HOST, DB_PORT, DB_NAME, DB_USERNAME y DB_PASSWORD
 * cuando la app tiene `capabilities.database.engine: mysql` en app.yaml.
 * Ver: https://docs.wasmer.io/edge/learn/databases
 *
 * @package WordPress
 */

// ** Ajustes de base de datos ** //
define( 'DB_NAME', getenv( 'DB_NAME' ) ?: 'wordpress' );
define( 'DB_USER', getenv( 'DB_USERNAME' ) ?: 'wordpress' );
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) ?: '' );

// El host incluye ":" y el puerto cuando Wasmer lo inyecta (p. ej.
// "db.us-losa1...:16751"), así que se separa aquí para wp-db.php.
$wasmer_db_host = getenv( 'DB_HOST' ) ?: 'localhost';
$wasmer_db_port = getenv( 'DB_PORT' );
define( 'DB_HOST', $wasmer_db_port ? $wasmer_db_host . ':' . $wasmer_db_port : $wasmer_db_host );

define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// Las bases de datos gestionadas de Wasmer usan TLS con una CA privada:
// forzamos SSL sin verificar la cadena del certificado.
if ( defined( 'MYSQLI_CLIENT_SSL' ) ) {
	$wasmer_mysql_flags = MYSQLI_CLIENT_SSL;
	if ( defined( 'MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT' ) ) {
		$wasmer_mysql_flags |= MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT;
	}
	define( 'MYSQL_CLIENT_FLAGS', $wasmer_mysql_flags );
}

/**#@+
 * Claves y sals de autenticación únicas.
 */
define( 'AUTH_KEY',         'V3!d9Q#zLm2Xp7Rt$wYb4Hf6Jn1Kc8Sg' );
define( 'SECURE_AUTH_KEY',  'e5TqA!rW9zN3xU6mPo2YhB7LvC4Jd1Fk' );
define( 'LOGGED_IN_KEY',    'k8Zp$M2vQ7tRx5Wy3Nb9Hs4Gd6Fa0LjU' );
define( 'NONCE_KEY',        'D1nX6#bWq4Sz8Ry2Tm5Vc9Hg3Jp7Ke0L' );
define( 'AUTH_SALT',        'o4Yb7!Lq1Wz5Xn9Rt3Vf6Md2Hj8Kc4Ps' );
define( 'SECURE_AUTH_SALT', 'G9mT2@sX6vN1bQ5wZ8Ry4Hd7Jf3Lk0Pa' );
define( 'LOGGED_IN_SALT',   'B3jR8#hW5nz2Qv7Xt1Ym6Pd4Kf9Ls0Gc' );
define( 'NONCE_SALT',       'U7wK4!pZ9rN2xT6yb3Vq5Md8Hj1Lf0Ss' );
/**#@-*/

/** Prefijo de tablas de la base de datos. */
$table_prefix = 'wp_';

/** Depuración (desactívalo en producción). */
define( 'WP_DEBUG', false );

/**
 * URL pública del sitio: el TLS termina en el router de Wasmer Edge,
 * así que WordPress debe generar siempre https:// (evita bucles de
 * redirección http -> https). Si añades un dominio propio, ajústalo aquí
 * o elimina estas dos constantes.
 */
define( 'WP_HOME', 'https://triade-org.wasmer.app' );
define( 'WP_SITEURL', 'https://triade-org.wasmer.app' );

// Detrás del proxy de Wasmer Edge: PHP recibe peticiones en claro y debe
// tratarlas como HTTPS para que las cookies "secure" y las URLs salgan bien.
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO'] ) {
	$_SERVER['HTTPS']     = 'on';
	$_SERVER['SERVER_PORT'] = 443;
}

/* ¡Eso es todo, deja de editar! Feliz publicación. */

/** Ruta absoluta al directorio de WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura las variables e incluye WordPress. */
require_once ABSPATH . 'wp-settings.php';
