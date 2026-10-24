<?php
/**
 * Entrada individual.
 *
 * @package triade
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class( 'w-full' ); ?>>
		<header class="border-b border-outline-variant/40 bg-surface-container-lowest">
			<div class="mx-auto max-w-3xl px-6 py-12 lg:py-16">
				<p class="eyebrow"><?php echo esc_html( get_the_date() ); ?> · <?php echo esc_html( get_the_author() ); ?></p>
				<h1 class="mt-space-xs font-headline-lg-mobile text-headline-lg-mobile tracking-tight text-on-surface md:font-headline-lg md:text-headline-lg"><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="mt-space-sm font-body-lg text-body-lg text-on-surface-variant"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</div>
		</header>

		<div class="mx-auto max-w-3xl px-6 py-12 lg:py-16">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="mb-space-lg overflow-hidden rounded-2xl shadow-sm">
					<?php the_post_thumbnail( 'triade-wide', array( 'class' => 'h-auto w-full' ) ); ?>
				</div>
			<?php endif; ?>

			<div class="entry-content">
				<?php the_content(); ?>
				<?php
				wp_link_pages(
					array(
						'before' => '<div class="mt-space-lg flex flex-wrap gap-2 font-label-lg text-label-lg">',
						'after'  => '</div>',
					)
				);
				?>
			</div>

			<?php if ( has_category() || has_tag() ) : ?>
				<div class="mt-space-xl flex flex-wrap gap-space-xs border-t border-outline-variant/60 pt-space-md font-label-md text-label-md text-on-surface-variant">
					<?php the_category( ' ' ); ?>
					<?php the_tags( '', ' ' ); ?>
				</div>
			<?php endif; ?>

			<nav class="mt-space-xl flex flex-col gap-space-sm border-t border-outline-variant/60 pt-space-md sm:flex-row sm:justify-between" aria-label="<?php esc_attr_e( 'Navegación entre entradas', 'triade' ); ?>">
				<div class="font-label-lg text-label-lg"><?php previous_post_link( '%link', '← %title' ); ?></div>
				<div class="font-label-lg text-label-lg sm:text-right"><?php next_post_link( '%link', '%title →' ); ?></div>
			</nav>
		</div>
	</article>
	<?php
endwhile;

get_footer();
