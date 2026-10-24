=== TRIADE SMTP ===
Contributors: triade
Tags: smtp, email, mail, phpmailer, correo
Requires at least: 6.0
Tested up to: 7.1
Requires PHP: 8.0
Stable tag: 1.0.0
License: GPLv2 or later

Configura el envío de correo de WordPress por SMTP desde Ajustes → SMTP TRIADE.

== Description ==

Plugin ligero para enviar los correos de WordPress (formularios, avisos, recuperación de contraseña) a través del servidor SMTP de tu proveedor.

Incluye:

* Servidor, puerto y cifrado (TLS, SSL o sin cifrado).
* Autenticación con usuario y contraseña.
* Email y nombre del remitente.
* Verificación del certificado SSL.
* Correo de prueba desde la misma página.
* Diagnóstico básico del entorno.

No guarda credenciales en el código: se almacenan en la base de datos de WordPress. Usa preferiblemente una contraseña de aplicación del proveedor.

== Installation ==

1. Activa **TRIADE SMTP** en Plugins.
2. Ve a **Ajustes → SMTP TRIADE**.
3. Rellena el host, puerto, cifrado y credenciales que te haya dado tu proveedor.
4. Guarda los cambios.
5. Envía un correo de prueba.

== FAQ ==

= ¿Qué datos uso con Gmail? =

Host `smtp.gmail.com`, puerto `587`, cifrado `TLS`, tu dirección de Gmail como usuario y una **contraseña de aplicación** (no la contraseña normal de la cuenta).

= ¿Y con Microsoft 365? =

Host `smtp.office365.com`, puerto `587`, cifrado `TLS`. Según la configuración del tenant puede ser necesario habilitar SMTP AUTH para el buzón.

= ¿Puerto 465? =

Selecciona cifrado `SSL`.

= ¿Dónde se guardan las credenciales? =

En la opción `triade_smtp_options` de la tabla `wp_options`. La contraseña no se muestra de nuevo en el panel.

= ¿El correo de prueba no llega? =

Revisa spam, que el remitente esté autorizado por el proveedor y que el servidor permita conexiones SMTP salientes. En Wasmer Edge, confirma que el proveedor acepta conexiones desde la IP de salida de la plataforma.

== Changelog ==

= 1.0.0 =
* Versión inicial.
