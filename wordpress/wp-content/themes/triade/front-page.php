<?php
/**
 * Portada TRIADE (landing completa).
 *
 * @package triade
 */

get_header();
?>
<!-- Top Ambient Glow (Subtle architectural lighting) -->
<div class="relative w-full overflow-hidden">
<div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[1100px] h-[480px] bg-gradient-to-b from-primary-fixed/40 via-surface-variant/20 to-transparent blur-3xl pointer-events-none -z-10"></div>
<div class="absolute top-20 right-[-10%] w-[500px] h-[500px] bg-secondary-fixed/30 rounded-full blur-3xl pointer-events-none -z-10"></div>
<!-- 1. HERO SECTION -->
<section class="mx-auto max-w-7xl px-6 pb-16 pt-10 md:pb-24 lg:px-12 lg:pb-32 lg:pt-16">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter-lg items-center">
<!-- Left Content -->
<div class="lg:col-span-7 flex flex-col items-start gap-space-md">
<!-- Institutional pill -->
<div class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-full bg-surface-container text-on-surface shadow-sm">
<span class="w-2.5 h-2.5 rounded-full bg-secondary-container animate-pulse"></span>
<span class="font-label-md text-label-md uppercase tracking-wider text-secondary font-bold">Soluciones Energéticas &amp; Capital Humano</span>
</div>
<!-- Main H1 headline -->
<h1 class="font-display-xl-mobile text-display-xl-mobile text-on-surface tracking-tight text-balance md:font-display-xl md:text-display-xl lg:leading-none">
Trabajadores Inmigrantes Aportando al Desarrollo
</h1>
<!-- Lead Paragraph -->
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl text-balance">
Integrando el talento de trabajadores migrantes y nacionales para impulsar el desarrollo de la energía fotovoltaica e industrial con el más alto rigor técnico, profesionalismo y valor humano.
</p>
<!-- CTAs -->
<div class="flex flex-wrap items-center gap-space-md pt-space-xs">
<a class="inline-flex h-14 w-full items-center justify-center rounded-xl bg-on-surface px-space-xl font-label-lg text-label-lg text-surface shadow-md transition-all hover:bg-primary sm:w-auto group" href="#contacto">
<span>Contactar Ahora</span>
<span aria-hidden="true" class="material-symbols-outlined ml-space-xs group-hover:translate-x-1 transition-transform text-[20px]">arrow_forward</span>
</a>
<a class="inline-flex h-14 w-full items-center justify-center rounded-xl bg-surface-container-lowest px-space-xl font-label-lg text-label-lg text-on-surface shadow-sm transition-all hover:bg-surface-container sm:w-auto" href="#servicios">
<span aria-hidden="true" class="material-symbols-outlined mr-space-xs text-primary text-[20px]">handyman</span>
<span>Conocer Servicios</span>
</a>
</div>
<!-- Trust Badges Bar -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-space-sm w-full pt-space-lg">
<div class="flex items-center gap-space-xs p-space-sm rounded-xl bg-surface-container-lowest shadow-sm">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary shrink-0">
<span aria-hidden="true" class="material-symbols-outlined text-[20px]">verified_user</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-bold text-on-surface">+100% Compromiso</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Seguridad &amp; PRL Total</span>
</div>
</div>
<div class="flex items-center gap-space-xs p-space-sm rounded-xl bg-surface-container-lowest shadow-sm">
<div class="w-10 h-10 rounded-lg bg-secondary-fixed flex items-center justify-center text-secondary shrink-0">
<span aria-hidden="true" class="material-symbols-outlined text-[20px]">solar_power</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-bold text-on-surface">Especialistas</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Energía Solar FV</span>
</div>
</div>
<div class="flex items-center gap-space-xs p-space-sm rounded-xl bg-surface-container-lowest shadow-sm">
<div class="w-10 h-10 rounded-lg bg-primary-fixed flex items-center justify-center text-primary shrink-0">
<span aria-hidden="true" class="material-symbols-outlined text-[20px]">group_add</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md font-bold text-on-surface">Cuadrillas Técnicas</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Homologadas en España</span>
</div>
</div>
</div>
</div>
<!-- Right Visual Showcase / Layered Composition -->
<div class="lg:col-span-5 relative mt-8 lg:mt-0">
<!-- Main Hero Photomount -->
<div class="relative rounded-2xl overflow-hidden shadow-xl bg-surface-container-lowest">
<img class="h-[300px] w-full object-cover sm:h-[420px] lg:h-[460px]" alt="Técnicos montando módulos solares fotovoltaicos" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero-solar.jpg' ); ?>" width="1408" height="768" fetchpriority="high" decoding="async" />
<div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-on-surface/70 via-transparent to-transparent p-space-lg pb-6 text-on-primary sm:pb-32">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary-container font-bold">Operaciones en Campo</span>
<h3 class="font-headline-sm text-headline-sm font-bold text-white">Parques Solares a Gran Escala</h3>
<p class="mt-1 font-body-sm text-body-sm text-white/80">Capacidad inmediata de despliegue nacional con certificación técnica.</p>
</div>
</div>
<!-- Floating Overlapping KPI Card -->
<div class="relative mt-4 flex w-full items-center gap-space-md rounded-2xl bg-surface-container-lowest/95 p-space-md shadow-xl backdrop-blur-md sm:absolute sm:-bottom-8 sm:-left-4 sm:mt-0 sm:w-auto sm:max-w-xs lg:-left-8">
<div class="w-14 h-14 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container shrink-0">
<span aria-hidden="true" class="material-symbols-outlined text-[28px]">electric_bolt</span>
</div>
<div class="flex flex-col">
<span class="font-display-xl-mobile text-headline-lg font-extrabold text-on-surface leading-none">+350 MW</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Estructuras ensambladas y gestionadas con éxito</span>
</div>
</div>
<!-- Decorative Solar Spec Accent -->
<div class="absolute -top-6 -right-6 hidden items-center gap-space-xs rounded-xl bg-surface-container-lowest p-space-sm text-on-surface shadow-lg sm:flex">
<span aria-hidden="true" class="material-symbols-outlined text-secondary text-[20px]">verified</span>
<span class="font-label-sm text-label-sm font-bold">ISO &amp; Estricto Cumplimiento Laboral</span>
</div>
</div>
</div>
</section>
</div>
<!-- 2. RESUMEN MISIÓN Y VISIÓN -->
<section class="w-full bg-surface-container-lowest py-16 md:py-24" id="nuestra-empresa">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter-lg items-center">
<!-- Visual Column -->
<div class="lg:col-span-5 order-2 lg:order-1 relative">
<div class="relative rounded-2xl overflow-hidden shadow-lg bg-surface-container">
<img class="h-[320px] w-full object-cover sm:h-[420px] lg:h-[480px]" alt="Ingeniero jefe y montador revisando planos técnicos en planta fotovoltaica" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/mission-solar.jpg' ); ?>" width="1408" height="768" loading="lazy" decoding="async" />
</div>
<!-- Secondary detail badge -->
<div class="absolute bottom-4 right-4 max-w-[240px] rounded-xl bg-surface-container-lowest p-space-sm shadow-md sm:bottom-6 sm:right-6 sm:max-w-[260px] sm:p-space-md">
<div class="flex items-center gap-space-xs text-secondary mb-1">
<span aria-hidden="true" class="material-symbols-outlined text-[20px]">diversity_3</span>
<span class="font-label-sm text-label-sm uppercase font-bold tracking-wider">Integración Real</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Impulsamos la formalidad, seguridad social y desarrollo continuo de nuestros equipos.</p>
</div>
</div>
<!-- Text Editorial Column -->
<div class="lg:col-span-7 order-1 lg:order-2 flex flex-col items-start gap-space-md">
<div class="flex items-center gap-space-xs text-primary font-label-md text-label-md uppercase tracking-wider font-bold">
<span class="w-6 h-[2px] bg-primary"></span>
<span>Resumen acerca de Nuestra Misión y Visión</span>
</div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface tracking-tight md:font-headline-lg md:text-headline-lg">
Expertos en Montaje de Estructuras y Paneles Solares
</h2>
<div class="space-y-4 text-on-surface-variant font-body-md text-body-md leading-relaxed">
<p>
<strong class="text-on-surface font-semibold">TRIADE</strong> es una empresa dedicada a ofrecer soluciones integrales en el montaje de estructuras, servicios auxiliares y gestión de personal en sectores productivos. Combinando experiencia técnica, organización y compromiso social, integramos el talento de trabajadores migrantes y nacionales para impulsar el desarrollo con profesionalismo y calidad.
</p>
<p>
Nuestra visión institucional trasciende la mera intermediación: construimos estabilidad industrial para promotores fotovoltaicos a la vez que dignificamos y profesionalizamos al operario en cada fase constructiva.
</p>
</div>
<!-- Pillars Bento Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm w-full pt-space-xs">
<div class="p-space-md rounded-xl bg-surface-container-low shadow-sm flex flex-col gap-1">
<div class="flex items-center gap-space-xs text-primary font-headline-sm text-headline-sm font-bold">
<span aria-hidden="true" class="material-symbols-outlined text-[22px]">engineering</span>
<span>Rigor Técnico</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Calibración micrométrica, apriete dinamométrico y trazabilidad de ensamblajes.</p>
</div>
<div class="p-space-md rounded-xl bg-surface-container-low shadow-sm flex flex-col gap-1">
<div class="flex items-center gap-space-xs text-secondary font-headline-sm text-headline-sm font-bold">
<span aria-hidden="true" class="material-symbols-outlined text-[22px]">health_and_safety</span>
<span>Cultura PRL</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Prevención rigurosa con formación continua y dotación de EPIs de primer nivel.</p>
</div>
<div class="p-space-md rounded-xl bg-surface-container-low shadow-sm flex flex-col gap-1">
<div class="flex items-center gap-space-xs text-secondary font-headline-sm text-headline-sm font-bold">
<span aria-hidden="true" class="material-symbols-outlined text-[22px]">pace</span>
<span>Cumplimiento</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Compromiso inquebrantable con los hitos de entrega y conexión pactados.</p>
</div>
<div class="p-space-md rounded-xl bg-surface-container-low shadow-sm flex flex-col gap-1">
<div class="flex items-center gap-space-xs text-primary font-headline-sm text-headline-sm font-bold">
<span aria-hidden="true" class="material-symbols-outlined text-[22px]">diversity_1</span>
<span>Impacto Social</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Inclusión activa y respeto por los derechos laborales de cada trabajador.</p>
</div>
</div>
<div class="pt-space-xs">
<a class="inline-flex items-center gap-space-xs px-space-lg py-space-sm rounded-xl bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg transition-all shadow-sm" href="#contacto">
<span>Contactar con Dirección</span>
<span aria-hidden="true" class="material-symbols-outlined text-[18px]">mail</span>
</a>
</div>
</div>
</div>
</div>
</section>
<!-- 3. SECCIÓN DE SERVICIOS ESPECIALIZADOS -->
<section class="w-full bg-surface py-16 md:py-24 lg:py-28" id="servicios">
<div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-space-xl">
<!-- Section Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md">
<div class="flex flex-col gap-space-xs max-w-2xl">
<span class="font-label-md text-label-md text-secondary font-bold uppercase tracking-wider">Nuestros Servicios</span>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface tracking-tight md:font-headline-lg md:text-headline-lg">
Soluciones técnicas y humanas para que tu proyecto avance con solidez y eficiencia
</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant max-w-md">
Especialización técnica, personal cualificado y coordinación logística exhaustiva para la construcción y operación renovable.
</p>
</div>
<!-- Services Grid (5 Cards tailored to content) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
<!-- Service 1 -->
<div class="group bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg transition-all flex flex-col justify-between gap-space-md relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-primary-fixed/20 rounded-bl-full transition-transform group-hover:scale-110 pointer-events-none"></div>
<div class="flex flex-col gap-space-md">
<div class="w-14 h-14 rounded-xl bg-primary-fixed flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
<span aria-hidden="true" class="material-symbols-outlined text-[28px]">account_tree</span>
</div>
<div class="flex flex-col gap-space-xs">
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors">
Montaje de Estructuras
</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
Realizamos el ensamblaje y fijación de estructuras metálicas para sistemas solares fotovoltaicos. Trabajamos con seguridad, precisión y bajo normativa vigente.
</p>
</div>
</div>
<a class="inline-flex items-center gap-space-xs text-primary font-label-lg text-label-lg group-hover:text-primary-container font-bold pt-space-xs" href="#contacto" data-service="montaje-estructuras">
<span>Saber más</span>
<span aria-hidden="true" class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">chevron_right</span>
</a>
</div>
<!-- Service 2 -->
<div class="group bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg transition-all flex flex-col justify-between gap-space-md relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-secondary-fixed/20 rounded-bl-full transition-transform group-hover:scale-110 pointer-events-none"></div>
<div class="flex flex-col gap-space-md">
<div class="w-14 h-14 rounded-xl bg-secondary-fixed flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-on-secondary transition-colors">
<span aria-hidden="true" class="material-symbols-outlined text-[28px]">solar_power</span>
</div>
<div class="flex flex-col gap-space-xs">
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-secondary transition-colors">
Módulos Solares
</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
Realizamos el montaje de módulos solares fotovoltaicos con precisión y seguridad, garantizando eficiencia en plazos y calidad en la ejecución de cada proyecto.
</p>
</div>
</div>
<a class="inline-flex items-center gap-space-xs text-secondary font-label-lg text-label-lg group-hover:text-secondary-container font-bold pt-space-xs" href="#contacto" data-service="modulos-solares">
<span>Saber más</span>
<span aria-hidden="true" class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">chevron_right</span>
</a>
</div>
<!-- Service 3 -->
<div class="group bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg transition-all flex flex-col justify-between gap-space-md relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-surface-container/60 rounded-bl-full transition-transform group-hover:scale-110 pointer-events-none"></div>
<div class="flex flex-col gap-space-md">
<div class="w-14 h-14 rounded-xl bg-surface-container-high flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
<span aria-hidden="true" class="material-symbols-outlined text-[28px]">build_circle</span>
</div>
<div class="flex flex-col gap-space-xs">
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors">
Servicios Auxiliares
</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
Proveemos personal auxiliar capacitado para apoyar en todas las etapas de proyectos fotovoltaicos, adaptándonos a las necesidades y demandas de cada obra.
</p>
</div>
</div>
<a class="inline-flex items-center gap-space-xs text-primary font-label-lg text-label-lg group-hover:text-primary-container font-bold pt-space-xs" href="#contacto" data-service="servicios-auxiliares">
<span>Saber más</span>
<span aria-hidden="true" class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">chevron_right</span>
</a>
</div>
<!-- Service 4 -->
<div class="group bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg transition-all flex flex-col justify-between gap-space-md relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-primary-fixed/20 rounded-bl-full transition-transform group-hover:scale-110 pointer-events-none"></div>
<div class="flex flex-col gap-space-md">
<div class="w-14 h-14 rounded-xl bg-primary-fixed flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
<span aria-hidden="true" class="material-symbols-outlined text-[28px]">groups</span>
</div>
<div class="flex flex-col gap-space-xs">
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors">
Gestión de Personal
</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
Nos encargamos de la contratación, formación y coordinación de personal para proyectos fotovoltaicos y de construcción, asegurando equipos eficientes y comprometidos.
</p>
</div>
</div>
<a class="inline-flex items-center gap-space-xs text-primary font-label-lg text-label-lg group-hover:text-primary-container font-bold pt-space-xs" href="#contacto" data-service="gestion-personal">
<span>Saber más</span>
<span aria-hidden="true" class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">chevron_right</span>
</a>
</div>
<!-- Service 5 (Wide card across columns on large screen) -->
<div class="group md:col-span-2 lg:col-span-2 bg-gradient-to-br from-surface-container-lowest to-surface-container-low p-space-lg rounded-2xl shadow-sm hover:shadow-lg transition-all flex flex-col justify-between gap-space-md relative overflow-hidden">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-md">
<div class="w-14 h-14 rounded-xl bg-secondary-fixed flex items-center justify-center text-secondary shrink-0">
<span aria-hidden="true" class="material-symbols-outlined text-[28px]">agriculture</span>
</div>
<span class="px-space-sm py-space-xs rounded-full bg-secondary-fixed text-secondary font-label-sm text-label-sm uppercase font-bold self-start md:self-auto">
Operatividad Multidisciplinar
</span>
</div>
<div class="flex flex-col gap-space-xs">
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-secondary transition-colors">
Servicios en Construcción y Recolección Estacional
</h3>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
Gestionamos personal para proyectos de energía solar, construcción civil y recolección estacional agraria, asegurando equipos rigurosamente capacitados, disciplinados, eficientes y con soporte administrativo integral.
</p>
</div>
<div class="pt-space-xs">
<a class="inline-flex items-center gap-space-xs text-secondary font-label-lg text-label-lg group-hover:underline font-bold" href="#contacto" data-service="construccion-estacional">
<span>Saber más y solicitar estimación</span>
<span aria-hidden="true" class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</div>
</div>
</section>
<!-- 4. SECCIÓN EQUIPO TÉCNICO Y OPERATIVO -->
<section class="w-full bg-surface-container-lowest py-16 md:py-24" id="equipo">
<div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-space-xl">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter-lg items-center">
<!-- Left Text info -->
<div class="lg:col-span-7 flex flex-col items-start gap-space-md">
<div class="inline-flex items-center gap-space-xs text-primary font-label-md text-label-md uppercase tracking-wider font-bold">
<span aria-hidden="true" class="material-symbols-outlined text-[18px]">badge</span>
<span>Quiénes Somos / Nuestro Equipo Técnico y Operativo</span>
</div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface tracking-tight md:font-headline-lg md:text-headline-lg">
Expertos en Montaje de Estructuras y Paneles Solares
</h2>
<div class="space-y-4 text-on-surface-variant font-body-md text-body-md leading-relaxed">
<p>
En <strong class="text-on-surface">TRIADE</strong> contamos con un equipo humano altamente capacitado, con experiencia práctica en todas las fases del trabajo en campo, desde la preparación del terreno y montaje de estructuras hasta la colocación final de los módulos solares.
</p>
<p>
Nuestros colaboradores han asumido responsabilidades en áreas clave del proceso productivo, lo que nos permite garantizar una ejecución profesional, segura y eficiente en cada proyecto.
</p>
<p>
Creemos firmemente que el éxito de una obra se basa tanto en el conocimiento técnico como en la responsabilidad y compromiso de las personas que la hacen posible. Estos son los pilares que nos distinguen y que aseguran la confianza de nuestros clientes.
</p>
</div>
<!-- Feature tags -->
<div class="flex flex-wrap gap-space-xs pt-space-xs">
<span class="px-space-sm py-space-xs rounded-lg bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1">
<span aria-hidden="true" class="material-symbols-outlined text-[16px] text-primary">done_all</span> PRL Nivel Básico &amp; Reciclaje
</span>
<span class="px-space-sm py-space-xs rounded-lg bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1">
<span aria-hidden="true" class="material-symbols-outlined text-[16px] text-primary">done_all</span> Maquinaria &amp; Trabajos en Altura
</span>
<span class="px-space-sm py-space-xs rounded-lg bg-surface-container text-on-surface font-label-md text-label-md flex items-center gap-1">
<span aria-hidden="true" class="material-symbols-outlined text-[16px] text-primary">done_all</span> Encargados y Jefes de Cuadrilla
</span>
</div>
<div class="pt-space-xs">
<a class="inline-flex items-center gap-space-xs px-space-lg py-space-sm rounded-xl bg-on-surface text-surface hover:bg-primary font-label-lg text-label-lg transition-colors shadow-sm" href="#contacto">
<span>Contactar Ahora</span>
<span aria-hidden="true" class="material-symbols-outlined text-[18px]">contact_phone</span>
</a>
</div>
</div>
<!-- Right Visual Showcase with team context -->
<div class="lg:col-span-5 relative">
<div class="rounded-2xl overflow-hidden shadow-xl bg-surface-container">
<img class="h-[320px] w-full object-cover sm:h-[420px] lg:h-[460px]" alt="Grupo de montadores de placas solares en parque fotovoltaico" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/team-solar.jpg' ); ?>" width="1408" height="768" loading="lazy" decoding="async" />
</div>
<!-- Floating stat -->
<div class="relative mb-4 flex w-fit max-w-[260px] flex-col gap-1 rounded-2xl bg-surface-container-lowest p-space-md shadow-lg sm:absolute sm:-left-6 sm:-top-6 sm:mb-0">
<span class="font-headline-md text-headline-md font-extrabold text-secondary leading-none">100%</span>
<span class="font-label-sm text-label-sm uppercase font-bold text-on-surface">Legalidad &amp; Contratación</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Seguridad jurídica plena para contratistas</span>
</div>
</div>
</div>
<!-- Banner de Lema Destacado -->
<div class="relative w-full overflow-hidden rounded-2xl bg-gradient-to-r from-on-surface via-primary to-on-surface p-6 text-on-primary shadow-xl md:p-space-xl">
<div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-space-lg text-center md:text-left">
<div class="flex flex-col gap-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary-container font-bold">Nuestro Lema Institucional</span>
<h3 class="font-headline-lg-mobile text-headline-lg-mobile font-extrabold tracking-tight text-white md:font-headline-lg md:text-headline-lg">
“Talento que se une, futuro que se construye”
</h3>
<p class="font-body-md text-body-md text-surface-container-highest/80 max-w-xl">
Uniendo voluntades para construir la infraestructura renovable que abastecerá a las futuras generaciones.
</p>
</div>
<a class="shrink-0 inline-flex h-12 items-center justify-center rounded-xl bg-secondary-container px-space-xl font-label-lg text-label-lg text-on-surface shadow-md transition-all hover:bg-secondary hover:text-on-primary" href="#cuadrillas">
<span>Explorar Cuadrillas</span>
<span aria-hidden="true" class="material-symbols-outlined ml-space-xs text-[20px]">group</span>
</a>
</div>
</div>
</div>
</section>
<!-- 5. SECCIÓN CUADRILLAS DISPONIBLES (SELECTOR DE ESCALA) -->
<section class="w-full bg-surface py-16 md:py-24 lg:py-28" id="cuadrillas">
<div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-space-xl">
<!-- Section Header -->
<div class="flex flex-col items-center text-center gap-space-xs max-w-2xl mx-auto">
<span class="font-label-md text-label-md text-secondary font-bold uppercase tracking-wider">Cuadrillas Disponibles</span>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface tracking-tight md:font-headline-lg md:text-headline-lg">
Elige la Escala de Tu Equipo
</h2>
<p class="font-body-md text-body-md text-on-surface-variant">
Dimensionamos cuadrillas operativas a medida de los hitos del cronograma de tu parque solar, con supervisión técnica y logística incluida.
</p>
</div>
<!-- Cuadrillas Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
<!-- Scale Card 1: 10 Personas -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-xl transition-all flex flex-col justify-between gap-space-lg group relative">
<div class="flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<span class="px-space-sm py-space-xs rounded-md bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-bold uppercase">Escala Ágil</span>
<span aria-hidden="true" class="material-symbols-outlined text-outline text-[22px]">group</span>
</div>
<div class="flex flex-col">
<div class="flex items-baseline gap-1">
<span class="font-display-xl text-display-xl font-extrabold text-on-surface group-hover:text-primary transition-colors">10</span>
<span class="font-label-lg text-label-lg font-bold text-on-surface-variant">Personas</span>
</div>
<span class="font-label-sm text-label-sm text-secondary font-bold mt-1">Disponibilidad Inmediata</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">
Ideal para tareas pequeñas o mantenimiento puntual. Montajes rápidos y refuerzo ágil en hitos críticos.
</p>
</div>
<div class="flex flex-col gap-space-xs pt-space-xs">
<ul class="text-body-sm font-body-sm text-on-surface-variant space-y-1.5 pb-space-sm">
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-primary text-[16px]">check_circle</span> 1 Encargado de campo</li>
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-primary text-[16px]">check_circle</span> 9 Montadores cualificados</li>
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-primary text-[16px]">check_circle</span> Herramienta homologada</li>
</ul>
<a class="w-full h-12 rounded-xl bg-surface-container hover:bg-primary hover:text-on-primary text-on-surface font-label-lg text-label-lg font-bold flex items-center justify-center transition-colors" href="#contacto" data-scale="10">
Contratar
</a>
</div>
</div>
<!-- Scale Card 2: 20 Personas -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-xl transition-all flex flex-col justify-between gap-space-lg group relative">
<div class="flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<span class="px-space-sm py-space-xs rounded-md bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-bold uppercase">Medio Alcance</span>
<span aria-hidden="true" class="material-symbols-outlined text-outline text-[22px]">groups</span>
</div>
<div class="flex flex-col">
<div class="flex items-baseline gap-1">
<span class="font-display-xl text-display-xl font-extrabold text-on-surface group-hover:text-primary transition-colors">20</span>
<span class="font-label-lg text-label-lg font-bold text-on-surface-variant">Personas</span>
</div>
<span class="font-label-sm text-label-sm text-secondary font-bold mt-1">Óptima Productividad</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">
Perfecta para proyectos medianos con tiempos definidos. Rendimiento equilibrado para ensamblaje sostenido.
</p>
</div>
<div class="flex flex-col gap-space-xs pt-space-xs">
<ul class="text-body-sm font-body-sm text-on-surface-variant space-y-1.5 pb-space-sm">
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-primary text-[16px]">check_circle</span> 2 Encargados de línea</li>
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-primary text-[16px]">check_circle</span> 18 Especialistas en estructura</li>
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-primary text-[16px]">check_circle</span> Coordinación PRL in situ</li>
</ul>
<a class="w-full h-12 rounded-xl bg-surface-container hover:bg-primary hover:text-on-primary text-on-surface font-label-lg text-label-lg font-bold flex items-center justify-center transition-colors" href="#contacto" data-scale="20">
Contratar
</a>
</div>
</div>
<!-- Scale Card 3: 30 Personas (Featured Card) -->
<div class="group relative flex flex-col justify-between gap-space-lg rounded-2xl bg-surface-container-lowest p-space-lg shadow-md transition-all hover:shadow-xl lg:-translate-y-1">
<div class="absolute -top-3 left-1/2 -translate-x-1/2 px-space-md py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold shadow-sm">
Más Solicitada
</div>
<div class="flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-secondary font-label-sm text-label-sm font-bold uppercase">Alta Versatilidad</span>
<span aria-hidden="true" class="material-symbols-outlined text-secondary text-[22px]">diversity_3</span>
</div>
<div class="flex flex-col">
<div class="flex items-baseline gap-1">
<span class="font-display-xl text-display-xl font-extrabold text-secondary group-hover:text-primary transition-colors">30</span>
<span class="font-label-lg text-label-lg font-bold text-on-surface">Personas</span>
</div>
<span class="font-label-sm text-label-sm text-secondary font-bold mt-1">Respuesta Integral</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">
Una opción versátil para obras o tareas logísticas complejas. Ritmo acelerado de hincado y panelado simultáneo.
</p>
</div>
<div class="flex flex-col gap-space-xs pt-space-xs">
<ul class="text-body-sm font-body-sm text-on-surface-variant space-y-1.5 pb-space-sm">
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-secondary text-[16px]">check_circle</span> Jefatura de obra dedicada</li>
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-secondary text-[16px]">check_circle</span> División estructurada en 3 subequipos</li>
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-secondary text-[16px]">check_circle</span> Gestión logística auxiliar</li>
</ul>
<a class="w-full h-12 rounded-xl bg-on-surface hover:bg-primary text-surface font-label-lg text-label-lg font-bold flex items-center justify-center transition-colors shadow-sm" href="#contacto" data-scale="30">
Contratar
</a>
</div>
</div>
<!-- Scale Card 4: 40 Personas -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-xl transition-all flex flex-col justify-between gap-space-lg group relative">
<div class="flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<span class="px-space-sm py-space-xs rounded-md bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-bold uppercase">Mega Parques</span>
<span aria-hidden="true" class="material-symbols-outlined text-outline text-[22px]">hub</span>
</div>
<div class="flex flex-col">
<div class="flex items-baseline gap-1">
<span class="font-display-xl text-display-xl font-extrabold text-on-surface group-hover:text-primary transition-colors">40</span>
<span class="font-label-lg text-label-lg font-bold text-on-surface-variant">Personas</span>
</div>
<span class="font-label-sm text-label-sm text-secondary font-bold mt-1">Despliegue Masivo</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">
El equipo completo para proyectos de gran escala. Máximo rendimiento para plantas utility-scale de más de 50 MW.
</p>
</div>
<div class="flex flex-col gap-space-xs pt-space-xs">
<ul class="text-body-sm font-body-sm text-on-surface-variant space-y-1.5 pb-space-sm">
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-primary text-[16px]">check_circle</span> Coordinador general y 4 cabezas</li>
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-primary text-[16px]">check_circle</span> Operativa de turno continuo</li>
<li class="flex items-center gap-1.5"><span aria-hidden="true" class="material-symbols-outlined text-primary text-[16px]">check_circle</span> Soporte técnico documental pleno</li>
</ul>
<a class="w-full h-12 rounded-xl bg-surface-container hover:bg-primary hover:text-on-primary text-on-surface font-label-lg text-label-lg font-bold flex items-center justify-center transition-colors" href="#contacto" data-scale="40">
Contratar
</a>
</div>
</div>
</div>
</div>
</section>
<!-- 6. SECCIÓN DE VALORES ÉTICOS FUNDAMENTALES -->
<section class="w-full bg-surface-container-lowest py-16 md:py-24" id="valores">
<div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-space-xl">
<!-- Section Header -->
<div class="flex flex-col items-center text-center gap-space-xs max-w-2xl mx-auto">
<span class="font-label-md text-label-md text-secondary font-bold uppercase tracking-wider">Nuestros Valores</span>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface tracking-tight md:font-headline-lg md:text-headline-lg">
Valores Éticos Fundamentales
</h2>
<p class="font-body-md text-body-md text-on-surface-variant">
Los principios que guían nuestras operaciones cotidianas, la relación con nuestros clientes y el cuidado innegociable de nuestro equipo humano.
</p>
</div>
<!-- Values Grid: 7 Cards in Bespoke Bento Layout -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
<!-- Valor 1: Integridad -->
<div class="p-space-lg rounded-2xl bg-surface-container-low shadow-sm flex flex-col gap-space-sm hover:bg-surface-container transition-colors">
<div class="w-12 h-12 rounded-xl bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm">
<span aria-hidden="true" class="material-symbols-outlined text-[24px]">verified</span>
</div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Integridad</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
Mantenemos coherencia entre lo que declaramos y lo que hacemos. Actuamos con honestidad, incluso ante decisiones difíciles o presiones externas.
</p>
</div>
<!-- Valor 2: Respeto por la Dignidad Humana -->
<div class="p-space-lg rounded-2xl bg-surface-container-low shadow-sm flex flex-col gap-space-sm hover:bg-surface-container transition-colors">
<div class="w-12 h-12 rounded-xl bg-surface-container-lowest flex items-center justify-center text-secondary shadow-sm">
<span aria-hidden="true" class="material-symbols-outlined text-[24px]">favorite</span>
</div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Respeto por la Dignidad Humana</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
Tratamos a todas las personas con consideración, sin importar su origen, cultura, condición legal o social. Valoramos la diferencia como fuente de aprendizaje.
</p>
</div>
<!-- Valor 3: Responsabilidad -->
<div class="p-space-lg rounded-2xl bg-surface-container-low shadow-sm flex flex-col gap-space-sm hover:bg-surface-container transition-colors">
<div class="w-12 h-12 rounded-xl bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm">
<span aria-hidden="true" class="material-symbols-outlined text-[24px]">task_alt</span>
</div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Responsabilidad</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
Asumimos nuestras funciones con rigor, puntualidad y conciencia del impacto que generamos en la vida de los demás y en el entorno.
</p>
</div>
<!-- Valor 4: Equidad y Justicia -->
<div class="p-space-lg rounded-2xl bg-surface-container-low shadow-sm flex flex-col gap-space-sm hover:bg-surface-container transition-colors">
<div class="w-12 h-12 rounded-xl bg-surface-container-lowest flex items-center justify-center text-secondary shadow-sm">
<span aria-hidden="true" class="material-symbols-outlined text-[24px]">balance</span>
</div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Equidad y Justicia</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
Garantizamos un trato justo en nuestras decisiones internas y relaciones externas. Rechazamos la discriminación, el favoritismo y el abuso de poder.
</p>
</div>
<!-- Valor 5: Colaboración -->
<div class="p-space-lg rounded-2xl bg-surface-container-low shadow-sm flex flex-col gap-space-sm hover:bg-surface-container transition-colors">
<div class="w-12 h-12 rounded-xl bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm">
<span aria-hidden="true" class="material-symbols-outlined text-[24px]">handshake</span>
</div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Colaboración</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
Fomentamos el trabajo en equipo, el apoyo mutuo y la corresponsabilidad como motores de eficiencia y cohesión.
</p>
</div>
<!-- Valor 6: Excelencia Técnica y Humana -->
<div class="p-space-lg rounded-2xl bg-surface-container-low shadow-sm flex flex-col gap-space-sm hover:bg-surface-container transition-colors">
<div class="w-12 h-12 rounded-xl bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm">
<span aria-hidden="true" class="material-symbols-outlined text-[24px]">psychology</span>
</div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Excelencia Técnica y Humana</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
Nos exigimos calidad en lo que hacemos y en cómo lo hacemos. Formamos continuamente a personas competentes y comprometidas.
</p>
</div>
<!-- Valor 7: Compromiso Social y Ambiental (Wide span card) -->
<div class="md:col-span-2 lg:col-span-3 p-space-lg rounded-2xl bg-gradient-to-r from-surface-container-low via-surface-container to-surface-container-low shadow-sm flex flex-col sm:flex-row items-start sm:items-center gap-space-lg">
<div class="w-14 h-14 rounded-2xl bg-secondary-fixed flex items-center justify-center text-secondary shrink-0 shadow-sm">
<span aria-hidden="true" class="material-symbols-outlined text-[30px]">nature_people</span>
</div>
<div class="flex flex-col gap-1">
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Compromiso Social y Ambiental</h3>
<p class="font-body-md text-body-md text-on-surface-variant max-w-4xl">
Entendemos la empresa como un agente de transformación positiva. Actuamos con visión de largo plazo, respetando el entorno y generando oportunidades genuinas para todos.
</p>
</div>
</div>
</div>
</div>
</section>
<!-- 7. BLOQUE DE CONTACTO DIRECTO, DIRECTORIO DE EMAILS Y FORMULARIO -->
<section class="w-full bg-surface py-16 md:py-24 lg:py-28" id="contacto">
<div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-space-xl">
<!-- Section Header -->
<div class="flex flex-col items-start gap-space-xs max-w-2xl">
<span class="font-label-md text-label-md text-secondary font-bold uppercase tracking-wider">Emails y Número de Contacto</span>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface tracking-tight md:font-headline-lg md:text-headline-lg">
Contacto · Expertos a tu Disposición
</h2>
<p class="font-body-md text-body-md text-on-surface-variant">
Estamos comprometidos a ofrecerte el mejor servicio y apoyo. No dudes en contactarnos para cualquier consulta o para programar una visita técnica a obra.
</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter-lg items-start">
<!-- Columna Izquierda: Información de Sedes y Directorio de Correos -->
<div class="lg:col-span-6 flex flex-col gap-space-lg">
<!-- Tarjeta de Sede y Teléfono -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col gap-space-md">
<div class="flex items-center gap-space-xs text-primary font-headline-sm text-headline-sm font-bold">
<span aria-hidden="true" class="material-symbols-outlined text-[24px]">business</span>
<span>Sede Central Operativa</span>
</div>
<div class="flex flex-col gap-space-sm text-on-surface-variant font-body-md text-body-md">
<div class="flex items-start gap-space-xs">
<span aria-hidden="true" class="material-symbols-outlined text-secondary text-[20px] shrink-0 mt-0.5">location_on</span>
<div>
<strong class="text-on-surface font-semibold block">Dirección:</strong>
<span><?php echo esc_html( triade_get( 'address' ) ); ?></span>
<span class="block"><?php echo esc_html( triade_get( 'city' ) ); ?></span>
</div>
</div>
<div class="flex items-center gap-space-xs pt-space-xs">
<span aria-hidden="true" class="material-symbols-outlined text-secondary text-[20px] shrink-0">phone_in_talk</span>
<div class="flex flex-wrap items-center gap-space-xs">
<strong class="text-on-surface font-semibold">Teléfono Centralita:</strong>
<a class="text-primary hover:text-primary-container font-headline-sm text-headline-sm font-bold tracking-tight" href="<?php echo esc_url( triade_phone_link() ); ?>">
<?php echo esc_html( triade_get( 'phone' ) ); ?>
</a>
</div>
</div>
</div>
</div>
<!-- Directorio Oficial de Emails -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs text-on-surface font-headline-sm text-headline-sm font-bold">
<span aria-hidden="true" class="material-symbols-outlined text-primary text-[24px]">alternate_email</span>
<span>Directorio por Departamentos</span>
</div>
<span class="hidden font-label-sm text-label-sm font-bold uppercase text-secondary sm:inline">Atención Inmediata</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
Haz clic en cualquier dirección para iniciar el correo con el departamento correspondiente:
</p>
<div class="grid grid-cols-1 gap-space-xs font-body-md text-body-md" id="email-directory">
<a class="group flex items-center justify-between rounded-xl bg-surface-container-low p-space-sm transition-colors hover:bg-surface-container" href="mailto:<?php echo esc_attr( triade_get( 'email' ) ); ?>">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">General · TRIADE</span>
<span class="text-primary font-medium group-hover:underline"><?php echo esc_html( triade_get( 'email' ) ); ?></span>
</div>
<span aria-hidden="true" class="material-symbols-outlined text-outline group-hover:text-primary text-[20px]">send</span>
</a>
<a class="flex items-center justify-between p-space-sm rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors group" href="mailto:gerencia@triade.org.es">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Gerencia General</span>
<span class="text-primary font-medium group-hover:underline">gerencia@triade.org.es</span>
</div>
<span aria-hidden="true" class="material-symbols-outlined text-outline group-hover:text-primary text-[20px]">send</span>
</a>
<a class="flex items-center justify-between p-space-sm rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors group" href="mailto:administracion@triade.org.es">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Administración y Facturación</span>
<span class="text-primary font-medium group-hover:underline">administracion@triade.org.es</span>
</div>
<span aria-hidden="true" class="material-symbols-outlined text-outline group-hover:text-primary text-[20px]">send</span>
</a>
<a class="flex items-center justify-between p-space-sm rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors group" href="mailto:logistica@triade.org.es">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Logística y Despliegue de Obras</span>
<span class="text-primary font-medium group-hover:underline">logistica@triade.org.es</span>
</div>
<span aria-hidden="true" class="material-symbols-outlined text-outline group-hover:text-primary text-[20px]">send</span>
</a>
<a class="flex items-center justify-between p-space-sm rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors group" href="mailto:info@triade.org.es">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Información General &amp; Presupuestos</span>
<span class="text-primary font-medium group-hover:underline">info@triade.org.es</span>
</div>
<span aria-hidden="true" class="material-symbols-outlined text-outline group-hover:text-primary text-[20px]">send</span>
</a>
</div>
</div>
</div>
<!-- Columna Derecha: Formulario Ágil de Solicitud de Presupuesto / Cuadrilla -->
<div class="rounded-2xl bg-surface-container-lowest p-6 shadow-sm md:p-space-xl lg:col-span-6">
<div class="mb-space-md flex flex-col gap-space-xs">
<h3 class="font-headline-md text-headline-md text-on-surface font-bold">
Solicitar Cotización o Disponibilidad de Cuadrilla
</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
Completa los datos de tu proyecto y nuestro equipo de operaciones se pondrá en contacto en menos de 24 horas laborables.
</p>
</div>

<?php $triade_contact_status = isset( $_GET['contacto'] ) ? sanitize_key( wp_unslash( $_GET['contacto'] ) ) : ''; ?>
<?php if ( 'ok' === $triade_contact_status ) : ?>
<div class="mb-space-md flex items-start gap-space-xs rounded-xl bg-primary-fixed p-space-sm font-body-sm text-body-sm text-primary" role="status">
<span class="material-symbols-outlined text-[20px]" aria-hidden="true">check_circle</span>
<span><?php esc_html_e( '¡Solicitud enviada! Un coordinador de TRIADE contactará con tu equipo en menos de 24 horas laborables.', 'triade' ); ?></span>
</div>
<?php elseif ( 'error' === $triade_contact_status ) : ?>
<div class="mb-space-md flex items-start gap-space-xs rounded-xl bg-error-container p-space-sm font-body-sm text-body-sm text-on-error-container" role="alert">
<span class="material-symbols-outlined text-[20px]" aria-hidden="true">error</span>
<span><?php esc_html_e( 'No hemos podido enviar la solicitud. Revisa los datos e inténtalo de nuevo.', 'triade' ); ?></span>
</div>
<?php endif; ?>

<form class="flex flex-col gap-space-md" id="contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" data-triade-contact>
<input type="hidden" name="action" value="triade_contact" />
<input type="hidden" name="triade_contact_nonce" value="<?php echo esc_attr( wp_create_nonce( 'triade_contact' ) ); ?>" />
<div class="hidden" aria-hidden="true">
<label for="contact-website"><?php esc_html_e( 'No rellenar este campo', 'triade' ); ?></label>
<input type="text" id="contact-website" name="website" tabindex="-1" autocomplete="off" />
</div>

<div class="grid grid-cols-1 gap-space-md sm:grid-cols-2">
<div class="flex flex-col">
<label class="triade-label" for="contact-name"><?php esc_html_e( 'Nombre y Apellidos *', 'triade' ); ?></label>
<input class="triade-field" id="contact-name" name="name" placeholder="<?php esc_attr_e( 'Ej. Juan Pérez', 'triade' ); ?>" required type="text" autocomplete="name" />
</div>
<div class="flex flex-col">
<label class="triade-label" for="contact-company"><?php esc_html_e( 'Empresa / Contratista *', 'triade' ); ?></label>
<input class="triade-field" id="contact-company" name="company" placeholder="<?php esc_attr_e( 'Ej. Solaria Renovables', 'triade' ); ?>" required type="text" autocomplete="organization" />
</div>
</div>

<div class="grid grid-cols-1 gap-space-md sm:grid-cols-2">
<div class="flex flex-col">
<label class="triade-label" for="contact-email"><?php esc_html_e( 'Correo Electrónico *', 'triade' ); ?></label>
<input class="triade-field" id="contact-email" name="email" placeholder="nombre@empresa.com" required type="email" autocomplete="email" />
</div>
<div class="flex flex-col">
<label class="triade-label" for="contact-phone"><?php esc_html_e( 'Teléfono de Contacto *', 'triade' ); ?></label>
<input class="triade-field" id="contact-phone" name="phone" placeholder="+34 600 000 000" required type="tel" autocomplete="tel" />
</div>
</div>

<div class="grid grid-cols-1 gap-space-md sm:grid-cols-2">
<div class="flex flex-col">
<label class="triade-label" for="contact-service"><?php esc_html_e( 'Servicio Requerido *', 'triade' ); ?></label>
<select class="triade-field" id="contact-service" name="service" required>
<?php foreach ( triade_services() as $triade_service_value => $triade_service_label ) : ?>
<option value="<?php echo esc_attr( $triade_service_value ); ?>"><?php echo esc_html( $triade_service_label ); ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="flex flex-col">
<label class="triade-label" for="contact-scale"><?php esc_html_e( 'Escala Estimada de Cuadrilla', 'triade' ); ?></label>
<select class="triade-field" id="contact-scale" name="scale">
<?php foreach ( triade_scales() as $triade_scale_value => $triade_scale_label ) : ?>
<option value="<?php echo esc_attr( $triade_scale_value ); ?>"><?php echo esc_html( $triade_scale_label ); ?></option>
<?php endforeach; ?>
</select>
</div>
</div>

<div class="flex flex-col">
<label class="triade-label" for="contact-message"><?php esc_html_e( 'Detalles del Proyecto y Ubicación *', 'triade' ); ?></label>
<textarea class="triade-field" id="contact-message" name="message" placeholder="<?php esc_attr_e( 'Describe brevemente la potencia estimada en MW, provincia de la obra, cronograma aproximado o requerimientos técnicos particulares…', 'triade' ); ?>" required rows="5"></textarea>
</div>

<div class="flex items-start gap-space-xs pt-1">
<input class="mt-1 h-4 w-4 rounded border-outline-variant text-primary focus:ring-primary" id="contact-privacy" name="privacy" value="1" required type="checkbox" />
<label class="font-body-sm text-body-sm text-on-surface-variant" for="contact-privacy">
<?php esc_html_e( 'He leído y acepto la', 'triade' ); ?>
<a class="font-semibold text-primary underline decoration-primary/30 underline-offset-2" href="<?php echo esc_url( get_privacy_policy_url() ?: home_url( '/' ) ); ?>"><?php esc_html_e( 'política de privacidad', 'triade' ); ?></a>
<?php esc_html_e( 'para la gestión comercial y técnica de la propuesta.', 'triade' ); ?>
</label>
</div>

<p class="hidden rounded-xl p-space-sm font-body-sm text-body-sm" data-contact-status role="status" aria-live="polite"></p>

<button class="btn-primary mt-space-xs h-14 w-full" type="submit" data-contact-submit>
<span class="material-symbols-outlined text-[20px]" aria-hidden="true">send</span>
<span data-contact-submit-label><?php esc_html_e( 'Enviar Solicitud de Cuadrilla', 'triade' ); ?></span>
</button>
</form>
</div>
</div>
</div>
</section>
<?php
get_footer();
