<?php
/**
 * Pie de página TRIADE.
 *
 * @package triade
 */
?>
	</div>
</main>

<footer class="w-full bg-surface-container-low pb-space-lg pt-space-xl text-on-surface-variant">
	<div class="mx-auto max-w-7xl px-6 lg:px-12">
		<div class="grid grid-cols-1 gap-gutter-lg pb-space-xl md:grid-cols-2 lg:grid-cols-12">
			<div class="flex flex-col gap-space-md lg:col-span-4">
				<a class="flex items-center gap-space-sm" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="flex h-9 w-9 items-center justify-center rounded-xl bg-secondary-fixed text-secondary">
						<svg class="h-5 w-5" viewBox="0 0 32 32" fill="none" aria-hidden="true">
							<circle cx="16" cy="16" r="5.4" fill="currentColor" />
							<g stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
								<path d="M16 2.6v3.1M16 26.3v3.1M2.6 16h3.1M26.3 16h3.1M6.6 6.6l2.2 2.2M23.2 23.2l2.2 2.2M25.4 6.6l-2.2 2.2M8.8 23.2l-2.2 2.2" />
							</g>
						</svg>
					</span>
					<span class="font-headline-md text-headline-md tracking-tight text-on-surface">TRIADE</span>
				</a>
				<p class="max-w-sm font-body-sm text-body-sm text-on-surface-variant">
					<?php esc_html_e( 'Soluciones especializadas en montaje de estructuras fijas y seguidores solares, ensamblaje de paneles fotovoltaicos, obra civil auxiliar y cuadrillas técnicas homologadas para grandes parques renovables.', 'triade' ); ?>
				</p>
				<div class="flex flex-col gap-space-xs pt-space-xs font-body-sm text-body-sm">
					<div class="flex items-start gap-space-xs">
						<span class="material-symbols-outlined mt-0.5 text-[18px] text-secondary" aria-hidden="true">corporate_fare</span>
						<div>
							<span class="block font-semibold text-on-surface"><?php echo esc_html( triade_get( 'company' ) ); ?></span>
							<span class="font-label-sm text-label-sm text-on-surface-variant"><?php echo esc_html( triade_get( 'cif' ) ); ?> · <?php esc_html_e( 'Sede Central Sevilla', 'triade' ); ?></span>
						</div>
					</div>
					<div class="flex items-start gap-space-xs">
						<span class="material-symbols-outlined mt-0.5 text-[18px] text-secondary" aria-hidden="true">location_on</span>
						<span><?php echo esc_html( triade_get( 'address' ) ); ?><br /><?php echo esc_html( triade_get( 'city' ) ); ?></span>
					</div>
					<a class="flex items-center gap-space-xs transition-colors hover:text-primary" href="<?php echo esc_url( triade_phone_link() ); ?>">
						<span class="material-symbols-outlined text-[18px] text-secondary" aria-hidden="true">phone_in_talk</span>
						<span class="font-medium"><?php echo esc_html( triade_get( 'phone' ) ); ?></span>
					</a>
					<a class="flex items-center gap-space-xs transition-colors hover:text-primary" href="mailto:<?php echo esc_attr( triade_get( 'email' ) ); ?>">
						<span class="material-symbols-outlined text-[18px] text-secondary" aria-hidden="true">alternate_email</span>
						<span class="font-medium"><?php echo esc_html( triade_get( 'email' ) ); ?></span>
					</a>
				</div>
			</div>

			<div class="flex flex-col gap-space-sm lg:col-span-2">
				<h2 class="font-label-lg text-label-lg font-bold uppercase tracking-wider text-on-surface"><?php esc_html_e( 'Servicios', 'triade' ); ?></h2>
				<nav class="flex flex-col gap-space-xs font-body-sm text-body-sm" aria-label="<?php esc_attr_e( 'Servicios', 'triade' ); ?>">
					<a class="transition-colors hover:text-primary" href="<?php echo esc_url( triade_anchor( 'servicios' ) ); ?>"><?php esc_html_e( 'Montaje de Estructuras', 'triade' ); ?></a>
					<a class="transition-colors hover:text-primary" href="<?php echo esc_url( triade_anchor( 'servicios' ) ); ?>"><?php esc_html_e( 'Módulos Solares', 'triade' ); ?></a>
					<a class="transition-colors hover:text-primary" href="<?php echo esc_url( triade_anchor( 'servicios' ) ); ?>"><?php esc_html_e( 'Servicios Auxiliares', 'triade' ); ?></a>
					<a class="transition-colors hover:text-primary" href="<?php echo esc_url( triade_anchor( 'servicios' ) ); ?>"><?php esc_html_e( 'Gestión de Personal', 'triade' ); ?></a>
					<a class="transition-colors hover:text-primary" href="<?php echo esc_url( triade_anchor( 'cuadrillas' ) ); ?>"><?php esc_html_e( 'Cuadrillas', 'triade' ); ?></a>
				</nav>
			</div>

			<div class="flex flex-col gap-space-sm lg:col-span-2">
				<h2 class="font-label-lg text-label-lg font-bold uppercase tracking-wider text-on-surface"><?php esc_html_e( 'Empresa', 'triade' ); ?></h2>
				<nav class="flex flex-col gap-space-xs font-body-sm text-body-sm" aria-label="<?php esc_attr_e( 'Empresa', 'triade' ); ?>">
					<a class="transition-colors hover:text-primary" href="<?php echo esc_url( triade_anchor( 'nuestra-empresa' ) ); ?>"><?php esc_html_e( 'Nuestra Empresa', 'triade' ); ?></a>
					<a class="transition-colors hover:text-primary" href="<?php echo esc_url( triade_anchor( 'equipo' ) ); ?>"><?php esc_html_e( 'Equipo Técnico', 'triade' ); ?></a>
					<a class="transition-colors hover:text-primary" href="<?php echo esc_url( triade_anchor( 'valores' ) ); ?>"><?php esc_html_e( 'Valores', 'triade' ); ?></a>
					<?php $triade_blog_url = get_option( 'page_for_posts' ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/' ); ?>
					<a class="transition-colors hover:text-primary" href="<?php echo esc_url( $triade_blog_url ); ?>"><?php esc_html_e( 'Blog', 'triade' ); ?></a>
					<a class="transition-colors hover:text-primary" href="<?php echo esc_url( triade_anchor( 'contacto' ) ); ?>"><?php esc_html_e( 'Contacto', 'triade' ); ?></a>
				</nav>
			</div>

			<div class="flex flex-col gap-space-md lg:col-span-4">
				<h2 class="font-label-lg text-label-lg font-bold uppercase tracking-wider text-on-surface"><?php esc_html_e( 'Boletín Técnico', 'triade' ); ?></h2>
				<p class="font-body-sm text-body-sm text-on-surface-variant">
					<?php esc_html_e( 'Novedades del sector solar, informes de disponibilidad de cuadrillas y normativa técnica. Sin ruido, una vez al mes.', 'triade' ); ?>
				</p>
				<?php $triade_boletin = isset( $_GET['boletin'] ) ? sanitize_key( wp_unslash( $_GET['boletin'] ) ) : ''; ?>
				<?php if ( 'ok' === $triade_boletin ) : ?>
					<p class="rounded-lg bg-primary-fixed p-space-sm font-body-sm text-body-sm text-primary" role="status"><?php esc_html_e( '¡Gracias! Te hemos añadido al boletín técnico.', 'triade' ); ?></p>
				<?php elseif ( 'error' === $triade_boletin ) : ?>
					<p class="rounded-lg bg-error-container p-space-sm font-body-sm text-body-sm text-on-error-container" role="alert"><?php esc_html_e( 'No hemos podido guardar tu suscripción. Revisa el correo e inténtalo de nuevo.', 'triade' ); ?></p>
				<?php endif; ?>
				<form class="flex flex-col gap-space-xs" data-triade-newsletter action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">					<input type="hidden" name="action" value="triade_newsletter" />
					<input type="hidden" name="triade_newsletter_nonce" value="<?php echo esc_attr( wp_create_nonce( 'triade_newsletter' ) ); ?>" />
					<div class="hidden" aria-hidden="true">
						<label for="newsletter-website"><?php esc_html_e( 'No rellenar', 'triade' ); ?></label>
						<input type="text" id="newsletter-website" name="website" tabindex="-1" autocomplete="off" />
					</div>
					<label class="sr-only" for="newsletter-email"><?php esc_html_e( 'Correo corporativo', 'triade' ); ?></label>
					<div class="flex flex-col gap-space-xs sm:flex-row">
						<input class="h-11 min-w-0 flex-1 rounded-lg bg-surface-container-lowest px-space-sm font-body-sm text-body-sm text-on-surface shadow-sm placeholder:text-outline focus:outline-none focus:ring-2 focus:ring-primary" id="newsletter-email" name="email" type="email" required placeholder="<?php esc_attr_e( 'Correo corporativo', 'triade' ); ?>" autocomplete="email" />
						<button class="inline-flex h-11 items-center justify-center gap-space-xs rounded-lg bg-primary px-space-md font-label-md text-label-md text-on-primary transition-colors hover:bg-primary-container disabled:cursor-not-allowed disabled:opacity-70" type="submit">
							<span class="material-symbols-outlined text-[16px]" aria-hidden="true">send</span>
							<span data-newsletter-button-label><?php esc_html_e( 'Suscribirme', 'triade' ); ?></span>
						</button>
					</div>
					<p class="hidden rounded-lg px-space-sm py-space-xs font-body-sm text-body-sm" data-newsletter-status role="status" aria-live="polite"></p>
					<p class="font-label-sm text-label-sm text-on-surface-variant">
						<?php esc_html_e( 'Al suscribirte aceptas nuestra', 'triade' ); ?>
						<a class="underline decoration-primary/30 underline-offset-2 hover:text-primary" href="<?php echo esc_url( get_privacy_policy_url() ?: home_url( '/' ) ); ?>"><?php esc_html_e( 'política de privacidad', 'triade' ); ?></a>.
					</p>
				</form>
			</div>
		</div>

		<div class="flex flex-col items-center justify-between gap-space-sm border-t border-outline-variant/60 pt-space-md text-center font-label-md text-label-md text-on-surface-variant md:flex-row md:text-left">
			<p>
				© <?php echo esc_html( gmdate( 'Y' ) ); ?> TRIADE · <?php echo esc_html( triade_get( 'company' ) ); ?>.
				<?php esc_html_e( 'Todos los derechos reservados.', 'triade' ); ?>
			</p>
			<div class="flex flex-wrap items-center justify-center gap-space-md">
				<?php
				if ( has_nav_menu( 'legal' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'legal',
							'container'      => false,
							'depth'          => 1,
							'items_wrap'     => '%3$s',
							'link_before'    => '<span class="transition-colors hover:text-primary">',
							'link_after'     => '</span>',
						)
					);
				} else {
					$legal_pages = array(
						__( 'Aviso Legal', 'triade' )       => 'aviso-legal',
						__( 'Privacidad', 'triade' )        => 'politica-de-privacidad',
						__( 'Cookies', 'triade' )           => 'politica-de-cookies',
						__( 'Compliance y PRL', 'triade' )  => 'compliance-y-prl',
					);

					foreach ( $legal_pages as $label => $slug ) {
						$page = get_page_by_path( $slug );

						if ( $page ) {
							printf(
								'<a class="transition-colors hover:text-primary" href="%1$s">%2$s</a>',
								esc_url( get_permalink( $page ) ),
								esc_html( $label )
							);
						}
					}
				}
				?>
			</div>
		</div>

		<div class="mt-space-md flex items-center justify-center gap-space-xs font-label-sm text-label-sm text-on-surface-variant">
			<span class="material-symbols-outlined text-[14px]" aria-hidden="true">bolt</span>
			<span><?php esc_html_e( 'Talento que se une, futuro que se construye.', 'triade' ); ?></span>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
