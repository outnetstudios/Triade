# TRIADE · WordPress

Sitio WordPress de **TRIADE – Trabajadores Inmigrantes Aportando al Desarrollo SL** (montaje solar, servicios auxiliares y gestión de cuadrillas), construido a partir de la plantilla `stitch_redise_o_moderno_web_triade/code.html`.

- **WordPress 7.1.3** listo para Wasmer Edge.
- **Tema parent `triade`**: landing completa con el sistema de diseño *Helios Pure Modern*.
- **Tema child `triade-child`**: para personalizaciones sin tocar el padre.
- **Tailwind CSS compilado**: sin CDN ni dependencia de JavaScript para pintar el diseño.
- **Formularios reales**: solicitudes de cuadrilla y boletín guardados en WordPress.
- **SEO técnico**: metadatos, Open Graph, datos estructurados y descripción.
- URL de producción: **https://triade-org.wasmer.app**

---

## Qué se ha construido

### Diseño

La portada replica la plantilla original: hero con composición fotográfica, propuesta de valor, bloques de misión/visión, servicios, equipo, lema institucional, selector de cuadrillas (10/20/30/40 personas), valores y contacto.

Mejoras aplicadas sobre la plantilla HTML:

- Tailwind CSS **compilado en `assets/css/tailwind.css`** (antes se cargaba el CDN de Tailwind, que bloquea el render y no es apto para producción).
- Tipografía responsive (la plantilla era desktop-first).
- Menú móvil con panel deslizante, accesible por teclado.
- Imágenes locales en `assets/img/` (antes dependían de URLs temporales de Google).
- Jerarquía de encabezados, `alt`, `loading`, `fetchpriority` y foco visible.
- Imagen de marca, favicon y metadatos sociales.

### WordPress

- Tema clásico con plantillas `front-page.php`, `page.php`, `single.php`, `index.php`, `404.php`.
- **Personalizador** (`Apariencia → Personalizar → Datos de TRIADE`) para teléfono, email, dirección, ciudad, horario, razón social y CIF.
- **Solicitudes de cuadrilla** en `wp-admin → Solicitudes`, con nombre, empresa, email, teléfono, servicio, escala y mensaje. Se guardan siempre en la base de datos; además se intenta enviar un email a la dirección configurada.
- **Boletín** en `wp-admin → Boletín` (suscriptores).
- Widget de escritorio con las últimas solicitudes.
- Menú principal editable en `Apariencia → Menús`; si no hay menú asignado se usa la estructura de la portada.
- SEO sin plugin: `meta description`, canonical, Open Graph, Twitter Card, `LocalBusiness` JSON-LD y `theme-color`.

---

## Estructura del repositorio

```
Triade/
├── app.yaml                     # App de Wasmer Edge (volumen de uploads)
├── wasmer.toml                  # Paquete PHP + sistema de archivos
├── package.json                 # Scripts de Tailwind (opcional, con Node)
├── tailwind.config.js           # Tokens del sistema de diseño
├── src/tailwind.css             # Fuente de Tailwind (@tailwind + componentes)
├── scripts/build-css.ps1        # Compila Tailwind sin Node
├── wordpress/                   # Núcleo de WordPress 7.1.3
│   └── wp-content/
│       ├── themes/
│       │   ├── triade/          # Tema parent (diseño completo)
│       │   └── triade-child/    # Tema child (personalizaciones)
│       └── uploads/            # Montado como volumen persistente
└── stitch_redise_o_moderno_web_triade/   # Diseño original de referencia
```

### Por qué el volumen se monta en `uploads`

En el despliegue anterior el volumen se montaba en `/app/wp-content`, lo que **ocultaba los temas empaquetados** y dejaba la web en blanco. Ahora:

- El volumen persistente guarda **solo las subidas** (`/app/wp-content/uploads`), incluidas las imágenes de Medios.
- Los **temas y plugins viajan con el código** (Git → despliegue), así que cada push reproducible reconstruye el sitio.
- Si necesitas un plugin, añádelo a `wordpress/wp-content/plugins/` y redespliega.

---

## Desarrollo local

### Solo CSS

Con Node.js:

```bash
npm install
npm run build:css
# o en modo watch
npm run watch:css
```

Sin Node.js (Windows):

```powershell
pwsh scripts/build-css.ps1
```

El CSS compilado se escribe en `wordpress/wp-content/themes/triade/assets/css/tailwind.css`. **Recuerda recompilar después de cambiar clases en las plantillas.**

### WordPress completo

Necesitas PHP 8+ y MySQL/MariaDB. Copia `wp-config.php` o define las variables de entorno `DB_NAME`, `DB_USERNAME`, `DB_PASSWORD`, `DB_HOST` y `DB_PORT`, y arranca:

```bash
php -S localhost:8080 -t wordpress
```

---

## Despliegue en Wasmer Edge

```bash
wasmer login
wasmer deploy --non-interactive --publish-package
```

Wasmer provisiona MySQL, inyecta las variables `DB_*` y monta el volumen `wp-content` en `/app/wp-content/uploads`.

Comprobaciones:

```bash
curl -I https://triade-org.wasmer.app/          # X-Powered-By: PHP y 200
curl -I https://triade-org.wasmer.app/wp-content/themes/triade/assets/css/tailwind.css
```

### Activar el tema

1. `wp-admin → Apariencia → Temas`.
2. Activa **TRIADE Child** (hereda del parent `triade`).
3. En `Ajustes → Lectura`, elige una página estática como portada (la plantilla `front-page.php` se usa igualmente).

El sitio de producción ya está configurado con el tema activo, páginas de Inicio/Blog y datos corporativos. El tema activo es **TRIADE Child** (el padre `triade` aporta el diseño).

---

## Formularios y correo

- Las solicitudes se guardan como CPT `triade_solicitud` y los suscriptores como `triade_suscriptor`.
- `wp_mail()` puede no enviar correo en Wasmer Edge (no hay servidor SMTP local). **Las solicitudes no se pierden**: quedan en `wp-admin → Solicitudes`. Para envío real, conecta un plugin SMTP o un servicio transaccional.
- Para integrar un CRM, Slack o un webhook:

```php
add_action( 'triade_contact_created', function ( $post_id, $data ) {
    // Envía $data a tu CRM.
}, 10, 2 );
```

- Los formularios incluyen nonce, honeypot, validación y límite de frecuencia.

---

## Personalización

- **Logo**: `assets/img/logo-triade.svg` (versión color para fondos claros) y `assets/img/logo-triade-white.svg` (versión blanca para fondos oscuros). Los favicons están en `assets/img/favicon.svg`, `favicon-32.png` y `favicon-180.png`. También puedes subir un logo propio en **Personalizar → Identidad del sitio**.
- **Textos y datos de contacto**: Personalizador.
- **Menús**: Apariencia → Menús (ubicaciones *Menú Principal* y *Menú Legal*).
- **CSS propio**: `wordpress/wp-content/themes/triade-child/style.css`.
- **Funciones propias**: `wordpress/wp-content/themes/triade-child/functions.php`.
- **Imágenes**: `wp-admin → Medios` (persisten en el volumen) o `themes/triade/assets/img/`.
- **Colores y tipografía**: `tailwind.config.js` y `src/tailwind.css`; recompila después.

No edites el tema `triade` para cambios de cliente: usa el child. El parent se actualiza desde este repositorio.

---

## Notas

- **WordPress 7.1.3** es la versión estable incluida; las actualizaciones de núcleo deben hacerse desde el repositorio para que el despliegue sea reproducible.
- **Plugins**: no se instalan desde `wp-admin` de forma persistente; añádelos al repositorio y redespliega.
- **Salts**: `wp-config.php` incluye claves de ejemplo. Genéralas de nuevo para un dominio definitivo en <https://api.wordpress.org/secret-key/1.1/salt/>.
- **Legal**: las páginas de Aviso Legal, Privacidad y Cookies son textos base editables; revísalas con asesoría legal antes de publicar.
