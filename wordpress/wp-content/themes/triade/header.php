<?php
/**
 * Cabecera TRIADE.
 *
 * @package triade
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-surface font-body-md text-on-surface antialiased' ); ?>>
<?php wp_body_open(); ?>
<header class="fixed top-0 left-0 right-0 z-50 bg-surface-container-lowest/90 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
<div class="h-20 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between gap-gutter">
<a class="flex items-center gap-space-sm group" href="<?php echo esc_url( home_url( '/' ) ); ?>" id="inicio">
<div class="w-10 h-10 rounded-xl bg-secondary-fixed flex items-center justify-center text-secondary shadow-[0_4px_12px_rgba(133,83,0,0.12)]">
<span class="material-symbols-outlined text-[24px]">wb_sunny</span>
</div>
<div class="flex flex-col">
<span class="font-headline-md text-headline-md tracking-tight text-on-surface leading-none">TRIADE</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold mt-0.5">Energía &amp; Personal</span>
</div>
</a>
<nav class="hidden xl:flex items-center gap-gutter" data-active-classes="text-primary font-bold bg-surface-container-low px-space-sm py-space-xs rounded-lg">
<?php
wp_nav_menu(
	array(
		'theme_location' => 'primary',
		'container'      => false,
		'items_wrap'     => '%3$s',
		'fallback_cb'    => 'triade_default_nav',
		'depth'          => 1,
	)
);
?>
</nav>
<div class="flex items-center gap-gutter-sm">
<a class="hidden md:flex items-center gap-space-xs py-space-xs px-space-sm rounded-lg bg-surface-container hover:bg-surface-container-high transition-colors text-on-surface" href="<?php echo esc_url( triade_phone_link() ); ?>">
<span class="material-symbols-outlined text-secondary text-[18px]">call</span>
<span class="font-label-md text-label-md font-bold"><?php echo esc_html( triade_phone() ); ?></span>
</a>
<a class="inline-flex items-center justify-center h-12 px-space-lg rounded-xl bg-secondary-container hover:bg-secondary text-on-secondary-container hover:text-on-secondary font-label-lg text-label-lg transition-all shadow-[0_10px_20px_-8px_rgba(254,166,25,0.4)]" href="#contacto">
<span class="material-symbols-outlined text-[20px] mr-space-xs">bolt</span>
<?php esc_html_e( 'Solicitar Presupuesto', 'triade' ); ?>
</a>
<div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center">
<span class="material-symbols-outlined text-on-primary text-[18px]">person</span>
</div>
</div>
</div>
</header>
<main class="w-full pt-20 bg-surface">
<div class="flex flex-col w-full">
