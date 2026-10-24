<?php
/**
 * Listado de entradas, archivos y resultados de búsqueda.
 *
 * @package triade
 */

get_header();
?>
<section class="w-full bg-surface py-12 lg:py-16">
	<div class="mx-auto max-w-7xl px-6 lg:px-12">
		<header class="mb-space-xl max-w-3xl">
			<p class="eyebrow"><?php esc_html_e( 'Actualidad TRIADE', 'triade' ); ?></p>
			<h1 class="mt-space-xs font-headline-lg-mobile text-headline-lg-mobile tracking-tight text-on-surface md:font-headline-lg md:text-headline-lg">
				<?php
				if ( is_home() && ! is_front_page() ) {
					single_post_title();
				} elseif ( is_search() ) {
					printf(
						/* translators: %s: término de búsqueda */
						esc_html__( 'Resultados para «%s»', 'triade' ),
						esc_html( get_search_query() )
					);
				} else {
					the_archive_title();
				}
				?>
			</h1>
			<?php if ( is_home() && get_bloginfo( 'description' ) ) : ?>
				<p class="mt-space-sm font-body-lg text-body-lg text-on-surface-variant"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( have_posts() ) : ?>
			<div class="grid grid-cols-1 gap-gutter md:grid-cols-2 lg:grid-cols-3">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'group flex flex-col overflow-hidden rounded-2xl bg-surface-container-lowest shadow-sm transition-shadow hover:shadow-ambient-lg' ); ?>>
						<a class="block overflow-hidden" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail(
									'triade-card',
									array(
										'class' => 'h-52 w-full object-cover transition-transform duration-500 group-hover:scale-105',
									)
								);
							} else {
								?>
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero-solar.jpg' ); ?>" alt="" width="1408" height="768" loading="lazy" decoding="async" class="h-52 w-full object-cover transition-transform duration-500 group-hover:scale-105" />
								<?php
							}
							?>
						</a>
						<div class="flex flex-1 flex-col gap-space-sm p-space-lg">
							<p class="font-label-sm text-label-sm font-bold uppercase tracking-wider text-secondary"><?php echo esc_html( get_the_date() ); ?></p>
							<h2 class="font-headline-sm text-headline-sm font-bold tracking-tight text-on-surface">
								<a class="transition-colors hover:text-primary" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="font-body-sm text-body-sm text-on-surface-variant"><?php the_excerpt(); ?></div>
							<a class="mt-auto inline-flex items-center gap-space-xs pt-space-xs font-label-lg text-label-lg font-bold text-primary" href="<?php the_permalink(); ?>">
								<span><?php esc_html_e( 'Leer más', 'triade' ); ?></span>
								<span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-1" aria-hidden="true">chevron_right</span>
							</a>
						</div>
					</article>
					<?php
				endwhile;
				?>
			</div>

			<div class="mt-space-xl">
				<?php
				the_posts_pagination(
					array(
						'prev_text' => esc_html__( 'Anterior', 'triade' ),
						'next_text' => esc_html__( 'Siguiente', 'triade' ),
						'class'     => 'flex justify-center',
					)
				);
				?>
			</div>
		<?php else : ?>
			<div class="rounded-2xl bg-surface-container-lowest p-space-lg shadow-sm">
				<p class="font-body-md text-body-md text-on-surface-variant"><?php esc_html_e( 'No se han encontrado entradas. Prueba con otra búsqueda.', 'triade' ); ?></p>
				<div class="mt-space-md max-w-md"><?php get_search_form(); ?></div>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
