jQuery(document).ready(function ($) {
	// variables

	var dotDotDotSettings = {
		ellipsis: " ...",
		wrap: "word",
		fallbackToLetter: true,
		after: "span.read-more",
		watch: true,
		height: null,
		tolerance: 0,
		callback: function (isTruncated, orgContent) {
			$(this).addClass("loaded");
		},
		lastCharacter: {
			remove: [" ", ",", ";", ".", "!", "?"],
			noEllipsis: [],
		},
	};
	var innerWidth = window.innerWidth;
	var w = 0;

	// functions

	// disable autofill on certain form inputs

	$(document).on(
		"gform_post_render",
		function (event, form_id, current_page) {
			// code to trigger on form or form page render
			const fields = document.querySelectorAll(
				"form .disable-autofill input"
			);
			fields.forEach((e) => {
				e.setAttribute("autocomplete", "off");
			});
		}
	);

	// add brand icons in menu (unfinished)

	function addBrandImages() {
		const brandMenuContainer = document.querySelector("#menu-item-180 ul");
		console.log(brandMenuContainer);
		console.log(brandMenuContainer.children.length);
		for (
			let index = 0;
			index < brandMenuContainer.children.length;
			index++
		) {
			const element = brandMenuContainer.children[index];
			console.log(element);
			var pageClass = $.grep(
				element.className.split(" "),
				function (v, i) {
					return v.indexOf("wpse-object-id") === 0;
				}
			).join();
			console.log(pageClass);
			pageClass = pageClass.split("-");
			const pageId = pageClass[pageClass.length - 1];
			console.warn(pageId);
		}
	}

	// parralax scrolling intro image

	function parallaxImage() {
		const image = $("section.image");
		var dist = $(document).scrollTop();
		dist = dist / 2;
		image.css("background-position", "center calc(50% - " + dist + "px)");
	}

	// Form placeholder to label animation

	$(document).bind("gform_post_render", function () {
		$("input").each(function () {
			$(this).on("focus", function () {
				$(this).parent().parent(".gfield").addClass("active");
			});

			$(this).on("blur", function () {
				if ($(this).val().length == 0) {
					$(this).parent().parent(".gfield").removeClass("active");
				}
			});

			if (this.value !== "" || this.value !== this.defaultValue) {
				$(this).parent().parent(".gfield").addClass("active");
			} else {
				$(this).parent().parent(".gfield").removeClass("active");
			}
		});

		$("textarea").each(function () {
			$(this).on("focus", function () {
				$(this).parent().parent(".gfield").addClass("active");
			});

			$(this).on("blur", function () {
				if ($(this).val().length == 0) {
					$(this).parent().parent(".gfield").removeClass("active");
				}
			});

			if (this.value !== "" || this.value !== this.defaultValue) {
				$(this).parent().parent(".gfield").addClass("active");
			} else {
				$(this).parent().parent(".gfield").removeClass("active");
			}
		});
	});

	function animateSections() {
		$("section").each(function () {
			if (isScrolledIntoView($(this))) {
				$(this).find(".wrapper").addClass("in-view");
			}
		});
	}

	function isScrolledIntoView(elem) {
		var docViewTop = $(window).scrollTop();
		var docViewBottom = docViewTop + $(window).height();

		var elemTop = $(elem).offset().top;
		var elemBottom = elemTop + $(elem).height();

		// return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
		return elemTop <= docViewBottom;
	}

	window.onscroll = function () {
		menuButton();
		// parallaxImage();
		// animateSections();
	};

	function menuButton() {
		if (window.pageYOffset > 0) {
			$(".menu-button").addClass("background");
			$(".header").addClass("scrolled");
		} else {
			$(".menu-button").removeClass("background");
			$(".header").removeClass("scrolled");
		}
	}

	function showMenu() {
		innerWidth = $(".header .wrapper").width();
		logoWidth = $(".header .logo").outerWidth();
		menuWidth = $(".header .main-menu--header-top").outerWidth();

		if (logoWidth + menuWidth + 80 > innerWidth) {
			$(".header").addClass("header--mobile");
			$(".header .main-menu--header-top").addClass("main-menu--mobile");
			$(".header .main-menu--header-top").addClass("main-menu--loaded");
		} else {
			$(".header").removeClass("header--mobile");
			$(".header .main-menu--header-top").removeClass(
				"main-menu--mobile"
			);
			$(".header .main-menu--header-top").addClass("main-menu--loaded");
		}
	}

	function dotDotDot() {
		$(".dotdotdot").trigger("destroy");
		$(".dotdotdot").dotdotdot(dotDotDotSettings);
	}

	function setSlider() {
		$(".slider--content").owlCarousel({
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			smartSpeed: 500,
			items: 1,
			loop: true,
			autoplay: false,
			autoplayTimeout: 5000,
			autoplayHoverPause: true,
			nav: true,
			dots: true,
			autoHeight: true,
			mouseDrag: true,
			touchDrag: true,
			pullDrag: false,
			navText: [
				'<i class="fal fa-arrow-left"></i>',
				'<i class="fal fa-arrow-right"></i>',
			],
		});

		$(".hero__slider").owlCarousel({
			//   animateIn: 'fadeIn',
			//   animateOut: 'fadeOut',
			smartSpeed: 500,
			items: 1,
			loop: true,
			autoplay: false,
			autoplayTimeout: 5000,
			autoplayHoverPause: true,
			nav: true,
			dots: true,
			autoHeight: false,
			mouseDrag: true,
			touchDrag: true,
			pullDrag: false,
			margin: 0,
		});
		$(".product__slider").owlCarousel({
			responsive: {
				0: {
					items: 1,
					margin: 20,
				},
				640: {
					items: 2,
					margin: 40,
				},
				1200: {
					items: 3,
					margin: 80,
				},
				1600: {
					items: 4,
					margin: 80,
				},
			},
			smartSpeed: 250,
			loop: true,
			autoplay: false,
			autoplayTimeout: 5000,
			autoplayHoverPause: true,
			nav: true,
			dots: true,
			autoHeight: false,
			mouseDrag: true,
			touchDrag: true,
			pullDrag: false,
		});
		$(".info__slider").owlCarousel({
			responsive: {
				0: {
					items: 1,
					margin: 0,
				},
				640: {
					items: 1,
					margin: 0,
				},
				1200: {
					items: 2,
					margin: 0,
				},
				1600: {
					items: 2,
					margin: 0,
				},
			},
			smartSpeed: 250,
			loop: true,
			autoplay: false,
			autoplayTimeout: 5000,
			autoplayHoverPause: true,
			nav: false,
			dots: true,
			autoHeight: false,
			mouseDrag: true,
			touchDrag: true,
			pullDrag: false,
		});
	}

	function setSliderHeight() {
		const sliders = $(".info__slider .owl-stage");
		// console.log(sliders);

		for (let index = 0; index < sliders.length; index++) {
			const slider = sliders[index];
			setSlideHeight(slider);
		}
	}

	function setSlideHeight(slider) {
		slides = slider.children;

		// get max height
		var maxHeight = 0;
		for (let index = 0; index < slides.length; index++) {
			const slide = slides[index];
			// console.log(slide);
			// console.log(slide.clientHeight);
			if (slide.clientHeight > maxHeight) {
				maxHeight = slide.clientHeight;
			}
		}
		
		// set height
		for (let index = 0; index < slides.length; index++) {
			const slide = slides[index];
			$(slide).css("height", maxHeight);
		}
	}

	function removeActive() {
		// $('*').removeClass('active');
		$("*").removeClass("no-scroll");
	}

	function scrollAsideMenu() {
		scrollTop = $(window).scrollTop();

		if ($(".main-menu--header-top").hasClass("main-menu--mobile")) {
			if (scrollTop >= 0 && scrollTop <= 80) {
				$(".main-menu--header-top").css("top", 80 - scrollTop);
				$(".main-menu--header-top").css(
					"height",
					"calc(100% + " + (scrollTop - 80) + "px)"
				);
			}

			if (scrollTop > 80) {
				$(".main-menu--header-top").css("top", 0);
				$(".main-menu--header-top").css("height", "100%");
			}
		} else {
			$(".main-menu--header-top").css("top", "auto");
			$(".main-menu--header-top").css("height", "auto");
		}
	}

	function scrollMenuButton() {
		scrollTop = $(window).scrollTop();

		if (scrollTop > 80) {
			$(".menu-button").addClass("scroll");
		} else {
			$(".menu-button").removeClass("scroll");
		}
	}

	function scrollToTop() {
		windowHeight = $(window).height();
		scrollTop = $(window).scrollTop();
		footerOffset = $(".footer").offset().top;
		visibleFooter = windowHeight + scrollTop - footerOffset;

		// show top button

		if (scrollTop > 480) {
			$(".scroll-top-button").addClass("show");
		} else {
			$(".scroll-top-button").removeClass("show");
		}

		// stuck top button

		if (visibleFooter >= 60) {
			$(".scroll-top-button").css("top", footerOffset - scrollTop - 60);
			$(".scroll-top-button").addClass("show stuck");
		} else {
			$(".scroll-top-button").css("top", "auto");
			$(".scroll-top-button").removeClass("stuck");
		}
	}

	function showVideo() {
		if ($(".hero__video").length) {
			if (innerWidth > 799) {
				var iframe = $("#video-iframe");
				var source = $("#video-iframe").data("src");
				console.log(source);
				iframe.attr("src", source);
				$(".hero__video").addClass("show");
			}
		}
	}

	// set the height of the two reference elements the same
	function referenceHeight() {
		var projects = $(".references__case");

		for (let index = 0; index < projects.length; index++) {
			const element = projects[index];
			var container = $(element).siblings(".references__container");
			var containerHeight = container.outerHeight();
			var caseHeight = $(element).height();

			var height = Math.max(containerHeight, caseHeight);

			container.removeAttr("style");
			$(element).removeAttr("style");

			if ($(window).innerWidth() + 15 > 1279) {
				container.css("height", height);
				$(element).css("height", height);
			}
		}
	}

	// execute functions - when loaded

	$(window).load(function () {
		// non functions

		w = $(window).width();
		$(".loading").addClass("page-loaded");

		// functions

		dotDotDot();
		setSlider();
		showMenu();
		// scrollToTop();
		showVideo();
		referenceHeight();
		animateSections();
		setSliderHeight();
		//   addBrandImages();
	});

	// execute functions - when scroll

	$(window).scroll(function () {
		// functions

		scrollAsideMenu();
		// scrollToTop();
		scrollMenuButton();
		animateSections();
	});

	// execute functions - after resize

	$(window).resize(function () {
		clearTimeout(window.resizedFinished);
		window.resizedFinished = setTimeout(function () {
			// non functions

			innerWidth = window.innerWidth;

			if (w != $(window).width()) {
				removeActive();
				w = $(window).width();
				delete w;
			}

			// functions

			showMenu();
			dotDotDot();
			referenceHeight();
			setSliderHeight();
		}, 250);
	});

	// execute functions - after ajax

	$(document).ajaxComplete(function () {
		// scrollToTop();

		setTimeout(function () {
			setSlider();
		}, 500);

		// console.log('ajax-done');
	});

	// non functions

	// header

	// close main-menu when a link is pressed (for links that make the page scroll)

	$(".main-menu a").click(function (e) {
		$(".main-menu").removeClass("active");
		$(".menu-button").toggleClass("active");
	});

	// header -aside menu button

	$(".menu-button").click(function (e) {
		e.preventDefault();

		$("html").toggleClass("active");
		$("body").toggleClass("active");
		$(".sub-menu").toggleClass("active");
		$(".menu-button").toggleClass("active");
		$(".aside-button").toggleClass("active");
		$(".main-menu").toggleClass("active");
	});

	// header - search functionality

	$(".sub-menu__button--search a").click(function (e) {
		e.preventDefault();
		$("html").toggleClass("active");
		$("body").toggleClass("active");
		$(".search-form").toggleClass("active");
		$(".search-form .close-button").toggleClass("active");

		setTimeout(function () {
			$(".search-form .searchinput").focus();
		}, 250);
	});

	$(".search-form, .search-form .close-button").on(
		"click keyup",
		function (event) {
			if (
				event.target == this ||
				event.target.className == ".close-button"
			) {
				removeActive();
			}
		}
	);

	// cookie

	$(".button--cookie").click(function (e) {
		$("#cookie-notice").addClass("cookie-notice-hidden");
	});

	// smooth scroll

	// $('a[href^="#"]').on("click", function (e) {
	// 	e.preventDefault();

	// 	hashOffset = $(this.hash).offset();

	// 	if (hashOffset) {
	// 		$("html, body").animate(
	// 			{
	// 				scrollTop: $(this.hash).offset().top,
	// 			},
	// 			500
	// 		);
	// 	}

	// 	removeActive();
	// });
});
