jQuery(document).ready(function ($) {
	const menu = document.querySelector("section.menu");
	const hamburger = document.querySelector("div.hamburger");
	const html = document.querySelector('html');
	const body = document.querySelector("div.site-content");
	const shadow = document.querySelector("div.shadow");

	hamburger.addEventListener("click", () => {
		menu.toggleAttribute("active");
		html.classList.toggle("no-scroll");
	});

	shadow.addEventListener("click", () => {
		menu.toggleAttribute("active");
		html.classList.toggle("no-scroll");
	});
});
