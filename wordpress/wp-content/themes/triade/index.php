<?php
/**
 * Plantilla de listado (blog / archivos).
 *
 * @package triade
 */

get_header();
?>
<div class="max-w-7xl mx-auto px-6 lg:px-12 py-24 w-full">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight mb-space-lg"><?php
if ( is_home() && ! is_front_page() ) {
	single_post_title();
} else {
	the_archive_title();
}
?></h1>
<?php if ( have_posts() ) : ?>
<div class="flex flex-col gap-gutter">
<?php
while ( have_posts() ) :
	the_post();
	?>
<article <?php post_class( 'bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm' ); ?>>
<h2 class="font-headline-md text-headline-md text-on-surface tracking-tight">
<a class="hover:text-primary transition-colors" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h2>
<div class="font-label-sm text-label-sm text-secondary font-bold uppercase tracking-wider mt-1"><?php echo esc_html( get_the_date() ); ?></div>
<?php if ( has_post_thumbnail() ) : ?>
<div class="rounded-xl overflow-hidden mt-space-md">
<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto' ) ); ?>
</div>
<?php endif; ?>
<div class="entry-content font-body-md text-body-md text-on-surface-variant mt-space-sm"><?php the_excerpt(); ?></div>
<a class="inline-flex items-center gap-space-xs text-primary font-label-lg text-label-lg font-bold mt-space-sm" href="<?php the_permalink(); ?>">
<span>Leer más</span>
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</a>
</article>
<?php
endwhile;
?>
</div>
<?php the_posts_pagination(); ?>
<?php else : ?>
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm font-body-md text-body-md text-on-surface-variant">
<?php esc_html_e( 'No se han encontrado entradas. Prueba con una búsqueda.', 'triade' ); ?>
<?php get_search_form(); ?>
</div>
<?php endif; ?>
</div>
<?php
get_footer();
