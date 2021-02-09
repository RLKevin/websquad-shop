jQuery(document).ready(function ($) {

    const body = document.querySelector('body');

    if (body.classList.contains('home')) {
        animateHomepage();
    }

    function animateHomepage() {
        
        const hero = document.querySelector(".hero");
        const blue = document.querySelector(".hero .blue");
        const content = document.querySelector(".hero .content");
        const intro = document.querySelector('.hero .intro');
        const slider = document.querySelector('.hero .slider__image');
    
        gsap.fromTo(hero, {
            opacity: 0
        }, {
            opacity: 1,
            duration: 0.5,
            ease: Power2.easeInOut
        });
    
        gsap.fromTo(blue, {
            x: '-100%'
        }, {
            x: '0%',
            duration: 1,
            delay: 0.5,
            ease: Power2.easeInOut
        });
    
        gsap.fromTo(content, {
            opacity: 0
        }, {
            opacity: 1,
            duration: 0.5,
            delay: 1.5,
            ease: Power2.easeInOut
        });
    
        gsap.fromTo(intro, {
            y: '100%'
        }, {
            y: '0%',
            duration: 1,
            delay: 2,
            ease: Power2.easeInOut
        });
    
        gsap.fromTo(slider, {
            opacity: 0
        }, {
            opacity: 1,
            duration: 1,
            delay: 2,
            ease: Power2.easeInOut
        });
    }
    
});