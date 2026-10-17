<?php
/**
 * Plantilla de página.
 *
 * @package triade
 */

get_header();
?>
<div class="max-w-7xl mx-auto px-6 lg:px-12 py-24 w-full">
<?php
while ( have_posts() ) :
	the_post();
	?>
<article <?php post_class( 'max-w-3xl' ); ?>>
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight"><?php the_title(); ?></h1>
<div class="entry-content font-body-md text-body-md text-on-surface-variant mt-space-lg">
<?php the_content(); ?>
</div>
</article>
<?php
endwhile;
?>
</div>
<?php
get_footer();
