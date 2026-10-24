<?php
/**
 * Cabecera TRIADE.
 *
 * @package triade
 */

$triade_logo = triade_logo_url();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100] focus:rounded-xl focus:bg-on-surface focus:px-4 focus:py-2 focus:text-surface" href="#contenido">
	<?php esc_html_e( 'Saltar al contenido', 'triade' ); ?>
</a>

<header id="site-header" class="site-header fixed inset-x-0 top-0 z-50 border-b border-outline-variant/40 bg-surface-container-lowest/90 backdrop-blur-xl transition-shadow duration-300">
	<div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-gutter px-6 lg:px-12">
		<a class="group flex items-center gap-space-sm" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — <?php esc_attr_e( 'Inicio', 'triade' ); ?>">
			<?php if ( $triade_logo ) : ?>
				<img src="<?php echo esc_url( $triade_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="h-10 w-auto" width="160" height="40" />
			<?php else : ?>
				<span class="flex h-10 w-10 items-center justify-center rounded-xl bg-secondary-fixed text-secondary shadow-[0_4px_12px_rgba(133,83,0,0.12)] transition-transform group-hover:scale-105">
					<svg class="h-6 w-6" viewBox="0 0 32 32" fill="none" aria-hidden="true">
						<circle cx="16" cy="16" r="5.4" fill="currentColor" />
						<g stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
							<path d="M16 2.6v3.1M16 26.3v3.1M2.6 16h3.1M26.3 16h3.1M6.6 6.6l2.2 2.2M23.2 23.2l2.2 2.2M25.4 6.6l-2.2 2.2M8.8 23.2l-2.2 2.2" />
						</g>
					</svg>
				</span>
				<span class="flex flex-col whitespace-nowrap">
					<span class="font-headline-md text-headline-md leading-none tracking-tight text-on-surface">TRIADE</span>
					<span class="mt-0.5 whitespace-nowrap font-label-sm text-label-sm font-bold uppercase tracking-wider text-secondary"><?php esc_html_e( 'Energía & Personal', 'triade' ); ?></span>
				</span>
			<?php endif; ?>
		</a>

		<nav class="hidden items-center gap-5 xl:flex 2xl:gap-gutter" aria-label="<?php esc_attr_e( 'Menú principal', 'triade' ); ?>">
			<?php triade_render_nav( 'desktop' ); ?>
		</nav>

		<div class="flex items-center gap-2 sm:gap-3">
			<a class="hidden shrink-0 items-center gap-space-xs whitespace-nowrap rounded-lg bg-surface-container px-space-sm py-space-xs text-on-surface transition-colors hover:bg-surface-container-high md:flex" href="<?php echo esc_url( triade_phone_link() ); ?>">
				<span class="material-symbols-outlined text-[18px] text-secondary" aria-hidden="true">call</span>
				<span class="font-label-md text-label-md font-bold"><?php echo esc_html( triade_get( 'phone' ) ); ?></span>
			</a>

			<a class="hidden h-12 shrink-0 items-center justify-center gap-1 whitespace-nowrap rounded-xl bg-secondary-container px-space-lg font-label-lg text-label-lg text-on-secondary-container shadow-[0_10px_20px_-8px_rgba(254,166,25,0.4)] transition-all hover:bg-secondary hover:text-on-secondary sm:inline-flex" href="<?php echo esc_url( triade_anchor( 'contacto' ) ); ?>">
				<span class="material-symbols-outlined text-[20px]" aria-hidden="true">bolt</span>
				<span><?php esc_html_e( 'Solicitar Presupuesto', 'triade' ); ?></span>
			</a>

			<a class="hidden h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary text-on-primary transition-transform hover:scale-105 2xl:flex" href="<?php echo esc_url( is_user_logged_in() ? admin_url() : wp_login_url() ); ?>" aria-label="<?php esc_attr_e( 'Acceso al área privada', 'triade' ); ?>">
				<span class="material-symbols-outlined text-[20px]" aria-hidden="true">person</span>
			</a>

			<button id="menu-toggle" class="flex h-11 w-11 items-center justify-center rounded-xl bg-surface-container text-on-surface transition-colors hover:bg-surface-container-high xl:hidden" type="button" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Abrir menú', 'triade' ); ?>">
				<span class="material-symbols-outlined text-[24px]" data-menu-icon aria-hidden="true">menu</span>
			</button>
		</div>
	</div>
</header>

<div id="mobile-menu" class="fixed inset-x-0 bottom-0 top-20 z-40 hidden overflow-y-auto border-t border-outline-variant/40 bg-surface/95 px-6 py-6 backdrop-blur-xl xl:hidden">
	<nav class="flex flex-col gap-1" aria-label="<?php esc_attr_e( 'Menú principal móvil', 'triade' ); ?>">
		<?php triade_render_nav( 'mobile' ); ?>
	</nav>

	<div class="mt-8 flex flex-col gap-3 border-t border-outline-variant/60 pt-6">
		<a class="flex items-center gap-3 rounded-xl bg-surface-container-low p-4" href="<?php echo esc_url( triade_phone_link() ); ?>">
			<span class="material-symbols-outlined text-secondary" aria-hidden="true">call</span>
			<span class="flex flex-col">
				<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant"><?php esc_html_e( 'Centralita', 'triade' ); ?></span>
				<span class="font-label-lg text-label-lg font-bold text-on-surface"><?php echo esc_html( triade_get( 'phone' ) ); ?></span>
			</span>
		</a>
		<a class="flex items-center gap-3 rounded-xl bg-surface-container-low p-4" href="mailto:<?php echo esc_attr( triade_get( 'email' ) ); ?>">
			<span class="material-symbols-outlined text-secondary" aria-hidden="true">alternate_email</span>
			<span class="flex flex-col">
				<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant"><?php esc_html_e( 'Email', 'triade' ); ?></span>
				<span class="font-label-lg text-label-lg font-bold text-on-surface"><?php echo esc_html( triade_get( 'email' ) ); ?></span>
			</span>
		</a>
		<a class="inline-flex h-14 items-center justify-center gap-2 rounded-xl bg-secondary-container font-label-lg text-label-lg font-bold text-on-secondary-container" href="<?php echo esc_url( triade_anchor( 'contacto' ) ); ?>">
			<span class="material-symbols-outlined text-[20px]" aria-hidden="true">bolt</span>
			<span><?php esc_html_e( 'Solicitar Presupuesto', 'triade' ); ?></span>
		</a>
	</div>
</div>

<main id="contenido" class="w-full bg-surface pt-20">
	<div class="flex w-full flex-col">
