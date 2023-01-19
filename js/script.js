jQuery(window).on('DOMContentLoaded', function () {
	/*-------------------------------------------------------------------------------
	  Carousels
	-------------------------------------------------------------------------------*/

    // Main slider carousel.
	if ($('.a-carousel').length) {
		$('.a-carousel').owlCarousel({
			margin: 0,
			items: 1,
			smartSpeed: 2500,
			dots: true,
			loop: true,
			autoplay: true,
            animateOut: 'fadeOut'
		});
	}

    // Article slider carousel.
	if ($('.article-carousel').length) {
		$('.article-carousel').owlCarousel({
			margin: 30,
			items: 1,
			smartSpeed: 2500,
			dots: true,
			loop: true,
			autoplay: false
		});
	}

    // Responsive carousel which displays up to 4 items.
	if ($('.a-carousel-4').length) {
		$('.a-carousel-4').owlCarousel({
			margin: 15,
			smartSpeed: 250,
			dots: true,
			nav: false,
			responsive: {
				0: {
					slideBy: 2,
					items: 2
				},
				576: {
					slideBy: 3,
					items: 3
				},
				992: {
					slideBy: 3,
					items: 3
				},
				1200: {
					slideBy: 4,
					items: 4
				}
			}
		});
	}

    // Responsive carousel for displaying up to 5 course items.
	if ($('.a-carousel-courses').length) {
		$('.a-carousel-courses').owlCarousel({
			margin: 0,
			smartSpeed: 250,
			responsive: {
				0: {
					slideBy: 2,
					items: 2
				},
				576: {
					slideBy: 3,
					items: 3
				},
				992: {
					slideBy: 4,
					items: 4
				},
				1200: {
					slideBy: 5,
					items: 5
				}
			}
		});
	}

	if ($('.a-carousel-photo-wide').length) {
		$('.a-carousel-photo-wide').owlCarousel({
			margin: 30,
			smartSpeed: 250,
			dots: false,
			nav: false,
			loop: true,
			navText: ['<i class=icon-left-arrow></i>', '<i class=icon-right-arrow></i>'],
			responsive: {
				0: {
					margin: 20,
					slideBy: 2,
					items: 2
				},
				576: {
					slideBy: 2,
					items: 2
				},
				992: {
					margin: 30,
					slideBy: 3,
					items: 3
				},
				1200: {
					slideBy: 3,
					items: 3
				}
			}
		});
	}

	/*-------------------------------------------------------------------------------
	  Fancybox
	-------------------------------------------------------------------------------*/
    
    // General fancybox options.
	$('[data-fancybox]').fancybox({
		hideScrollbar: true,
		backFocus: false,
		hash: false,
	});

    // Fancybox options for gallery-student (front page gallery).
    $('[data-fancybox="gallery-student"]').fancybox({
        'loop': true	
    });

	/*-------------------------------------------------------------------------------
	  Spincrement
	-------------------------------------------------------------------------------*/

    // Animation for statistic item-value (university in numbers).
    var numbersSelector = '.statistic-item-value';
    var stats = document.querySelector(numbersSelector);
    if (stats) {
        var statisticLoaded = false;
        var observer = new IntersectionObserver(function(entries) {
            if(entries[0].isIntersecting === true && !statisticLoaded) {
                $('.statistic-item-value').spincrement();
                statisticLoaded = true;
            }
        }, { threshold: [1] });
        observer.observe(stats);
    }
    
	/*-------------------------------------------------------------------------------
	  Preloader
	-------------------------------------------------------------------------------*/

    // Remove preloader.
	$(".se-pre-con").fadeOut("fast");
})