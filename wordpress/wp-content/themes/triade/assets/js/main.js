/**
 * TRIADE · interacciones del tema.
 */
(function () {
	"use strict";

	const data = window.triadeData || {};

	function ready(callback) {
		if (document.readyState !== "loading") {
			callback();
		} else {
			document.addEventListener("DOMContentLoaded", callback);
		}
	}

	ready(function () {
		document.documentElement.classList.add("js");

		initMobileMenu();
		initHeaderShadow();
		initSmoothScroll();
		initScrollSpy();
		initContactForm();
		initNewsletterForm();
		initPreselection();
	});

	/**
	 * Menú móvil.
	 */
	function initMobileMenu() {
		const toggle = document.getElementById("menu-toggle");
		const menu = document.getElementById("mobile-menu");

		if (!toggle || !menu) {
			return;
		}

		const icon = toggle.querySelector("[data-menu-icon]");
		let isOpen = false;

		function setOpen(open, returnFocus) {
			isOpen = open;
			menu.classList.toggle("hidden", !open);
			toggle.setAttribute("aria-expanded", open ? "true" : "false");
			toggle.setAttribute("aria-label", open ? "Cerrar menú" : "Abrir menú");
			document.body.classList.toggle("overflow-hidden", open);

			if (icon) {
				icon.textContent = open ? "close" : "menu";
			}

			if (open) {
				const firstLink = menu.querySelector("a");
				if (firstLink) {
					window.setTimeout(function () {
						firstLink.focus();
					}, 50);
				}
			} else if (returnFocus) {
				toggle.focus();
			}
		}

		toggle.addEventListener("click", function () {
			setOpen(!isOpen, false);
		});

		menu.querySelectorAll("a").forEach(function (link) {
			link.addEventListener("click", function () {
				setOpen(false, false);
			});
		});

		document.addEventListener("keydown", function (event) {
			if (event.key === "Escape" && isOpen) {
				setOpen(false, true);
			}
		});

		window.addEventListener("resize", function () {
			if (window.innerWidth >= 1280 && isOpen) {
				setOpen(false, false);
			}
		});
	}

	/**
	 * Sombra de la cabecera al hacer scroll.
	 */
	function initHeaderShadow() {
		const header = document.getElementById("site-header");

		if (!header) {
			return;
		}

		const update = function () {
			header.classList.toggle("is-scrolled", window.scrollY > 8);
		};

		update();
		window.addEventListener("scroll", update, { passive: true });
	}

	/**
	 * Scroll suave para enlaces internos de la misma página.
	 */
	function initSmoothScroll() {
		document.addEventListener("click", function (event) {
			const link = event.target.closest('a[href*="#"]');

			if (!link || link.target === "_blank" || event.metaKey || event.ctrlKey || event.shiftKey) {
				return;
			}

			let url;

			try {
				url = new URL(link.href, window.location.href);
			} catch (error) {
				return;
			}

			if (url.origin !== window.location.origin || !url.hash) {
				return;
			}

			if (url.pathname !== window.location.pathname) {
				return;
			}

			const target = document.querySelector(url.hash);

			if (!target) {
				return;
			}

			event.preventDefault();
			target.scrollIntoView({ behavior: "smooth", block: "start" });

			if (history.pushState) {
				history.pushState(null, "", url.hash);
			}
		});
	}

	/**
	 * Resalta el enlace de la sección visible.
	 */
	function initScrollSpy() {
		if (!document.body.classList.contains("is-triade-front")) {
			return;
		}

		const links = Array.prototype.slice.call(document.querySelectorAll("[data-nav-section]"));
		const sections = links
			.map(function (link) {
				const id = link.getAttribute("data-nav-section");
				return id ? document.getElementById(id) : null;
			})
			.filter(Boolean);

		if (!sections.length || !("IntersectionObserver" in window)) {
			return;
		}

		function activate(id) {
			links.forEach(function (link) {
				const isActive = link.getAttribute("data-nav-section") === id;
				link.classList.toggle("is-active", isActive);

				if (isActive) {
					link.setAttribute("aria-current", "page");
				} else {
					link.removeAttribute("aria-current");
				}
			});
		}

		const observer = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						activate(entry.target.id);
					}
				});
			},
			{ rootMargin: "-45% 0px -50% 0px", threshold: 0 }
		);

		sections.forEach(function (section) {
			observer.observe(section);
		});

		window.addEventListener(
			"scroll",
			function () {
				if (window.scrollY < 120) {
					activate("");
				}
			},
			{ passive: true }
		);
	}

	/**
	 * Estado visual de un formulario.
	 */
	function setStatus(element, message, type) {
		if (!element) {
			return;
		}

		element.textContent = message;
		element.classList.remove("hidden", "bg-primary-fixed", "text-primary", "bg-error-container", "text-on-error-container");

		if (!message) {
			element.classList.add("hidden");
			return;
		}

		if (type === "error") {
			element.classList.add("bg-error-container", "text-on-error-container");
		} else {
			element.classList.add("bg-primary-fixed", "text-primary");
		}
	}

	function pressButton(button, label, text) {
		if (button) {
			button.disabled = true;
		}

		if (label) {
			label.textContent = text;
		}
	}

	function releaseButton(button, label, text) {
		if (button) {
			button.disabled = false;
		}

		if (label) {
			label.textContent = text;
		}
	}

	/**
	 * Formulario de solicitud (AJAX con fallback nativo).
	 */
	function initContactForm() {
		const form = document.querySelector("[data-triade-contact]");

		if (!form) {
			return;
		}

		const status = form.querySelector("[data-contact-status]");
		const button = form.querySelector("[data-contact-submit]");
		const label = form.querySelector("[data-contact-submit-label]");
		const defaultLabel = label ? label.textContent : "";

		form.addEventListener("submit", function (event) {
			if (!form.checkValidity()) {
				event.preventDefault();
				form.reportValidity();
				return;
			}

			if (!data.ajaxUrl) {
				return;
			}

			event.preventDefault();
			setStatus(status, "", "success");
			pressButton(button, label, (data.strings && data.strings.sending) || "Enviando…");

			fetch(data.ajaxUrl, {
				method: "POST",
				body: new FormData(form),
				credentials: "same-origin",
				headers: { Accept: "application/json" },
			})
				.then(function (response) {
					return response.json().catch(function () {
						throw new Error("invalid-json");
					});
				})
				.then(function (payload) {
					setStatus(status, payload.message || "", payload.success ? "success" : "error");

					if (payload.success) {
						form.reset();
					}
				})
				.catch(function () {
					setStatus(status, (data.strings && data.strings.networkError) || "Error de conexión.", "error");
				})
				.finally(function () {
					releaseButton(button, label, defaultLabel);
				});
		});
	}

	/**
	 * Boletín del pie.
	 */
	function initNewsletterForm() {
		const form = document.querySelector("[data-triade-newsletter]");

		if (!form) {
			return;
		}

		const status = form.querySelector("[data-newsletter-status]");
		const button = form.querySelector('button[type="submit"]');
		const label = form.querySelector("[data-newsletter-button-label]");
		const defaultLabel = label ? label.textContent : "";

		form.addEventListener("submit", function (event) {
			if (!form.checkValidity()) {
				event.preventDefault();
				form.reportValidity();
				return;
			}

			if (!data.ajaxUrl) {
				return;
			}

			event.preventDefault();
			setStatus(status, "", "success");
			pressButton(button, label, (data.strings && data.strings.subscribing) || "Guardando…");

			fetch(data.ajaxUrl, {
				method: "POST",
				body: new FormData(form),
				credentials: "same-origin",
				headers: { Accept: "application/json" },
			})
				.then(function (response) {
					return response.json().catch(function () {
						throw new Error("invalid-json");
					});
				})
				.then(function (payload) {
					setStatus(status, payload.message || "", payload.success ? "success" : "error");

					if (payload.success) {
						form.reset();
					}
				})
				.catch(function () {
					setStatus(status, (data.strings && data.strings.networkError) || "Error de conexión.", "error");
				})
				.finally(function () {
					releaseButton(button, label, defaultLabel);
				});
		});
	}

	/**
	 * Preselecciona servicio o escala al pulsar tarjetas y botones.
	 */
	function initPreselection() {
		document.querySelectorAll("[data-service]").forEach(function (element) {
			element.addEventListener("click", function () {
				const select = document.getElementById("contact-service");

				if (select) {
					select.value = element.getAttribute("data-service");
				}
			});
		});

		document.querySelectorAll("[data-scale]").forEach(function (element) {
			element.addEventListener("click", function () {
				const select = document.getElementById("contact-scale");

				if (select) {
					select.value = element.getAttribute("data-scale");
				}
			});
		});
	}
})();
