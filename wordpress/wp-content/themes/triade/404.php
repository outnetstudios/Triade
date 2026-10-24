<?php
/**
 * Página 404.
 *
 * @package triade
 */

get_header();
?>
<section class="w-full bg-surface py-20 lg:py-28">
	<div class="mx-auto flex max-w-3xl flex-col items-start px-6">
		<p class="eyebrow"><?php esc_html_e( 'Error 404', 'triade' ); ?></p>
		<h1 class="mt-space-xs font-headline-lg-mobile text-headline-lg-mobile tracking-tight text-on-surface md:font-headline-lg md:text-headline-lg">
			<?php esc_html_e( 'No encontramos esta página', 'triade' ); ?>
		</h1>
		<p class="mt-space-sm font-body-lg text-body-lg text-on-surface-variant">
			<?php esc_html_e( 'Puede que el enlace haya cambiado o que la página ya no exista. Desde aquí puedes volver a la portada o contactar con nuestro equipo.', 'triade' ); ?>
		</p>
		<div class="mt-space-lg flex flex-wrap gap-space-sm">
			<a class="btn-primary h-12 px-space-lg" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<span class="material-symbols-outlined text-[20px]" aria-hidden="true">home</span>
				<span><?php esc_html_e( 'Volver al inicio', 'triade' ); ?></span>
			</a>
			<a class="btn-ghost h-12 px-space-lg" href="<?php echo esc_url( triade_anchor( 'contacto' ) ); ?>">
				<span class="material-symbols-outlined text-[20px]" aria-hidden="true">mail</span>
				<span><?php esc_html_e( 'Contactar', 'triade' ); ?></span>
			</a>
		</div>
		<div class="mt-space-xl w-full max-w-md">
			<?php get_search_form(); ?>
		</div>
	</div>
</section>
<?php
get_footer();
