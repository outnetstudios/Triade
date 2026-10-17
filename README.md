# TRIADE · WordPress

Sitio WordPress de **TRIADE – Trabajadores Inmigrantes Aportando al Desarrollo SL** (montaje solar, servicios auxiliares y gestión de cuadrillas).

Incluye:

- **WordPress 7.1.3** (última versión estable) listo para instalar.
- **Tema parent `triade`**: replica exactamente el diseño corporativo *Helios Pure Modern* (`stitch_redise_o_moderno_web_triade/code.html`).
- **Tema child `triade-child`**: para todas tus personalizaciones futuras sin tocar el padre.
- Configuración lista para desplegar en **[Wasmer Edge](https://wasmer.io/products/edge)**.

---

## Estructura del repositorio

```
Triade/
├── app.yaml                    # Configuración de la App en Wasmer Edge
├── wasmer.toml                 # Paquete Wasmer (PHP server)
├── wordpress/                  # Núcleo de WordPress 7.1.3
│   └── wp-content/
│       └── themes/
│           ├── triade/         # Tema parent (diseño completo)
│           └── triade-child/   # Tema child (tus personalizaciones)
└── stitch_redise_o_moderno_web_triade/   # Diseño original de referencia
    ├── code.html               # Plantilla maestra del diseño
    ├── DESIGN.md               # Sistema de diseño (colores, tipografía)
    └── screen.png              # Captura del diseño
```

---

## Instalación local

Con PHP 8+ instalado:

```bash
php -S localhost:8080 -t wordpress
```

O con la CLI de [Wasmer](https://docs.wasmer.io/install):

```bash
wasmer run .
```

Abre `http://localhost:8080`, completa el instalador de WordPress (idioma, usuario, sitio) y activa el tema.

## Activar el tema

1. Entra a `wp-admin` → **Apariencia → Temas**.
2. Activa **TRIADE Child** (hereda automáticamente del parent `triade`).
3. El sitio se verá idéntico al diseño original.

---

## Despliegue en Wasmer Edge

### Opción A — WordPress administrado en Wasmer (recomendada)

1. Crea una app **WordPress** en tu panel de [Wasmer Edge](https://wasmer.io/edge).
2. Sube los temas al volumen `wp-content`:
   - Por **SSH** (Wasmer expone SSH en la app): copia las carpetas `triade` y `triade-child` a `wp-content/themes/`.
   - O por el **Explorador de archivos** del panel de Wasmer.
3. En `wp-admin` → **Apariencia → Temas** → activa **TRIADE Child**.
4. Establece la **Página estática** como portada si lo deseas (el tema trae `front-page.php`, así que funciona igual).

> ⚠️ No borres el plugin **Wasmer** (`wp-wasmer`): es parte de la plataforma y gestiona el login mágico, la base de datos y la integración con el dashboard.

### Opción B — Desplegar este repositorio con la CLI

1. Instala la CLI: `https://docs.wasmer.io/install`
2. Edita `app.yaml` y cambia `owner: TU-USUARIO-WASMER` por tu usuario de Wasmer.
3. Ejecuta desde la raíz del repo:

```bash
wasmer login
wasmer deploy
```

Wasmer provisionará MySQL, el volumen persistente `wp-content` y la URL `triade.wasmer.app`. Completarás la instalación de WordPress en el navegador.

---

## Personalización (child theme)

Todo lo que quieras cambiar va en `wordpress/wp-content/themes/triade-child/`:

- `style.css` → CSS propio (se carga después del padre).
- `functions.php` → hooks y funciones adicionales.

Nunca edites el tema `triade` directamente: así podrás actualizar el padre sin perder cambios.

---

## Notas

- **Diseño**: tipografía Plus Jakarta Sans + Material Symbols, paleta solar (azul `#006194` / ámbar `#fea619`), Tailwind CSS vía CDN con la configuración exacta del `DESIGN.md`.
- **Menú**: en *Apariencia → Menús* puedes crear un menú para la ubicación **Menú Principal**; si no existe, se muestran los enlaces del diseño (Inicio, Nuestra Empresa, Servicios, Equipo, Cuadrillas, Contacto).
- **Formulario de contacto**: por ahora es demostrativo (feedback visual). Conecta un plugin de formularios (WPForms, Contact Form 7, Fluent Forms) para envío real por email.
- **Responsive**: pendiente de ajuste (el diseño original es desktop-first).
- **Imágenes**: la portada usa imágenes de muestra del diseño original; sustitúyelas por fotos reales de TRIADE en `wp-admin` → Medios, actualizando las URLs en `front-page.php`.
