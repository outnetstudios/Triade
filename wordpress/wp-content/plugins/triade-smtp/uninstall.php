<?php
/**
 * Desinstalación de TRIADE SMTP.
 *
 * @package Triade_SMTP
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'triade_smtp_options' );
