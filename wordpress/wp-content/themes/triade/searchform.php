<?php
/**
 * Formulario de búsqueda.
 *
 * @package triade
 */

$triade_search_id = 'search-' . wp_unique_id();
?>
<form role="search" method="get" class="flex w-full flex-col gap-space-xs sm:flex-row" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="sr-only" for="<?php echo esc_attr( $triade_search_id ); ?>"><?php esc_html_e( 'Buscar en el sitio', 'triade' ); ?></label>
	<input
		class="triade-field flex-1"
		id="<?php echo esc_attr( $triade_search_id ); ?>"
		name="s"
		type="search"
		value="<?php echo esc_attr( get_search_query() ); ?>"
		placeholder="<?php esc_attr_e( 'Buscar…', 'triade' ); ?>"
	/>
	<button class="btn-primary h-12 shrink-0 px-space-lg" type="submit">
		<span class="material-symbols-outlined text-[18px]" aria-hidden="true">search</span>
		<span><?php esc_html_e( 'Buscar', 'triade' ); ?></span>
	</button>
</form>
