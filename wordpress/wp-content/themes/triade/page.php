<?php
/**
 * Plantilla de página.
 *
 * @package triade
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class( 'w-full' ); ?>>
		<header class="border-b border-outline-variant/40 bg-surface-container-lowest">
			<div class="mx-auto max-w-7xl px-6 py-12 lg:px-12 lg:py-16">
				<p class="eyebrow"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
				<h1 class="mt-space-xs max-w-4xl font-headline-lg-mobile text-headline-lg-mobile tracking-tight text-on-surface md:font-headline-lg md:text-headline-lg">
					<?php the_title(); ?>
				</h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="mt-space-sm max-w-2xl font-body-lg text-body-lg text-on-surface-variant">
						<?php echo esc_html( get_the_excerpt() ); ?>
					</p>
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
			</div>
		</div>
	</article>
	<?php
endwhile;

get_footer();
