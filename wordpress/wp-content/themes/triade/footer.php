<?php
/**
 * Pie TRIADE.
 *
 * @package triade
 */
?>
</div>
</main>
<footer class="w-full bg-surface-container-low text-on-surface-variant pt-space-xl pb-space-lg">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-gutter-lg pb-space-xl">
<div class="lg:col-span-2 flex flex-col gap-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-xl bg-secondary-fixed flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[20px]">wb_sunny</span>
</div>
<span class="font-headline-md text-headline-md text-on-surface tracking-tight">TRIADE</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-sm">Soluciones especializadas en montaje de estructuras fijas y seguidores solares, ensamblaje de paneles fotovoltaicos, obra civil auxiliar y cuadrillas técnicas homologadas para grandes parques renovables.</p>
<div class="flex flex-col gap-space-xs text-on-surface font-body-sm text-body-sm pt-space-xs">
<div class="flex items-start gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[18px] mt-0.5">corporate_fare</span>
<div>
<span class="font-semibold block text-on-surface">Trabajadores Inmigrantes Aportando al Desarrollo SL</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">B-88540142 · Sede Central Sevilla</span>
</div>
</div>
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[18px]">location_on</span>
<span>Av. de la Innovación 14, Edificio R&amp;D, Sevilla, España</span>
</div>
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[18px]">phone_in_talk</span>
<span class="font-medium"><?php echo esc_html( triade_phone() ); ?></span>
</div>
</div>
</div>
<div class="flex flex-col gap-space-sm">
<h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider font-bold">Servicios</h4>
<div class="flex flex-col gap-space-xs font-body-sm text-body-sm">
<a class="hover:text-primary transition-colors" href="#servicios">Montaje de Estructuras</a>
<a class="hover:text-primary transition-colors" href="#servicios">Hincado y Calibración</a>
<a class="hover:text-primary transition-colors" href="#servicios">Instalación Fotovoltaica</a>
<a class="hover:text-primary transition-colors" href="#cuadrillas">Gestión de Cuadrillas</a>
<a class="hover:text-primary transition-colors" href="#servicios">Mantenimiento &amp; O&amp;M</a>
<a class="hover:text-primary transition-colors" href="#servicios">Servicios Auxiliares</a>
</div>
</div>
<div class="flex flex-col gap-space-sm">
<h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider font-bold">Departamentos</h4>
<div class="flex flex-col gap-space-xs font-body-sm text-body-sm">
<div class="flex flex-col">
<span class="text-on-surface font-semibold">Dirección &amp; Proyectos</span>
<a class="text-primary hover:underline" href="mailto:direccion@triade-solar.es">direccion@triade-solar.es</a>
</div>
<div class="flex flex-col mt-space-xs">
<span class="text-on-surface font-semibold">Licitaciones &amp; Operaciones</span>
<a class="text-primary hover:underline" href="mailto:operaciones@triade-solar.es">operaciones@triade-solar.es</a>
</div>
<div class="flex flex-col mt-space-xs">
<span class="text-on-surface font-semibold">Recursos Humanos &amp; PRL</span>
<a class="text-primary hover:underline" href="mailto:rrhh@triade-solar.es">rrhh@triade-solar.es</a>
</div>
</div>
</div>
<div class="flex flex-col gap-space-sm">
<h4 class="font-label-lg text-label-lg text-on-surface uppercase tracking-wider font-bold">Boletín Técnico</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Novedades del sector solar, informes de disponibilidad de cuadrillas y normativa técnica.</p>
<form class="flex flex-col gap-space-xs mt-space-xs">
<input class="h-11 px-space-sm rounded-lg bg-surface-container-lowest text-on-surface placeholder:text-outline text-body-sm font-body-sm shadow-[0_1px_3px_rgba(0,0,0,0.05)] focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Correo corporativo" type="email"/>
<button class="h-11 px-space-md rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md transition-colors flex items-center justify-center gap-space-xs" type="button">
<span class="material-symbols-outlined text-[16px]">send</span>Suscribirme
</button>
</form>
</div>
</div>
<div class="pt-space-md flex flex-col md:flex-row items-center justify-between gap-space-sm text-center md:text-left font-label-md text-label-md text-on-surface-variant">
<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> TRIADE · Trabajadores Inmigrantes Aportando al Desarrollo SL. Todos los derechos reservados.</p>
<div class="flex items-center gap-space-md">
<a class="hover:text-primary transition-colors" href="#">Aviso Legal</a>
<a class="hover:text-primary transition-colors" href="#">Privacidad</a>
<a class="hover:text-primary transition-colors" href="#">Cookies</a>
<a class="hover:text-primary transition-colors" href="#">Compliance y PRL</a>
</div>
</div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
