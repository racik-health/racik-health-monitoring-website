document.addEventListener("DOMContentLoaded", function () {
	// Initialize Lucide icons
	lucide.createIcons();

	// Initialize AOS animations
	AOS.init({
		once: true,
		disable: "mobile",
	});

	// Mobile menu functionality
	const mobileMenuButton = document.getElementById("mobile-menu-button");
	const closeMenuButton = document.getElementById("close-menu-button");
	const mobileMenu = document.getElementById("mobile-menu");

	mobileMenuButton.addEventListener("click", function () {
		mobileMenu.classList.remove("hidden");
		document.body.style.overflow = "hidden";
	});

	closeMenuButton.addEventListener("click", function () {
		mobileMenu.classList.add("hidden");
		document.body.style.overflow = "";
	});

	// Close mobile menu when clicking on a link
	const mobileMenuLinks = mobileMenu.querySelectorAll("a");
	mobileMenuLinks.forEach(link => {
		link.addEventListener("click", function () {
			mobileMenu.classList.add("hidden");
			document.body.style.overflow = "";
		});
	});

	// Navbar scroll effect
	const navbar = document.getElementById("navbar");
	window.addEventListener("scroll", function () {
		if (window.scrollY > 50) {
			navbar.classList.add("bg-white", "shadow-sm", "sticky", "top-0");
		} else {
			navbar.classList.remove("bg-white", "shadow-sm", "sticky", "top-0");
		}
	});

	// Back to top button
	const backToTopButton = document.getElementById("back-to-top");
	window.addEventListener("scroll", function () {
		if (window.scrollY > 300) {
			backToTopButton.classList.remove("opacity-0", "invisible");
			backToTopButton.classList.add("opacity-100", "visible");
		} else {
			backToTopButton.classList.add("opacity-0", "invisible");
			backToTopButton.classList.remove("opacity-100", "visible");
		}
	});

	backToTopButton.addEventListener("click", function () {
		window.scrollTo({
			top: 0,
			behavior: "smooth",
		});
	});

	// FAQ toggle functionality
	window.toggleFaq = function (button) {
		const content = button.nextElementSibling;
		const icon = button.querySelector("i");

		if (content.classList.contains("hidden")) {
			content.classList.remove("hidden");
			icon.classList.add("rotate-180");
		} else {
			content.classList.add("hidden");
			icon.classList.remove("rotate-180");
		}
	};

	// Smooth scrolling for anchor links
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener("click", function (e) {
			e.preventDefault();

			const targetId = this.getAttribute("href");
			if (targetId === "#") return;

			const targetElement = document.querySelector(targetId);
			if (targetElement) {
				window.scrollTo({
					top: targetElement.offsetTop - 100,
					behavior: "smooth",
				});
			}
		});
	});
});
