function isMobileDevice() {
	return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
}
 
function toggleMobileClassToBody(isMobile) {
	var className = isMobile ? 'mobile' : 'no-mobile';
	$('html').removeClass('mobile, no-mobile').addClass(className);
}

jQuery(window).on('DOMContentLoaded', function () {
	/*-------------------------------------------------------------------------------
	  Carousels
	-------------------------------------------------------------------------------*/

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
				600: {
					slideBy: 3,
					items: 3
				},
				1000: {
					slideBy: 3,
					items: 3
				},
				1260: {
					slideBy: 4,
					items: 4
				}
			}
		});
	}


	if ($('.a-carousel-courses').length) {
		$('.a-carousel-courses').owlCarousel({
			margin: 0,
			smartSpeed: 250,
			responsive: {
				0: {
					slideBy: 2,
					items: 2
				},
				600: {
					slideBy: 3,
					items: 3
				},
				1000: {
					slideBy: 4,
					items: 4
				},
				1260: {
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
				600: {
					slideBy: 2,
					items: 2
				},
				1000: {
					margin: 30,
					slideBy: 3,
					items: 3
				},
				1260: {
					slideBy: 3,
					items: 3
				}
			}
		});
	}
    
	$(".se-pre-con").fadeOut("fast");
})

jQuery(window).on('load', function () {
	var mobileDevice = isMobileDevice();
	toggleMobileClassToBody(mobileDevice);

	$('.a-toggle-search').on('click', function () {
		if (!$('.search-form').hasClass('opened')) {
			$(this).closest('.search-form').find('.search-input').focus();
		}
		$(this).closest('.search-form').toggleClass('opened');
        alert('a');
	}); 

	$('.a-toggle-nav, .hide-menu').on('click', function () {
		$('html').toggleClass(
			$('html').is('.body-menu-opened, .body-menu-close')
				? 'body-menu-opened body-menu-close'
				: 'body-menu-opened'
		);
	});

	$('.a-scroll').bind('click', function (event) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top // - 50
		}, 1000);
		event.preventDefault();
	});


	/*-------------------------------------------------------------------------------
	  Counter Statistic
	-------------------------------------------------------------------------------*/

	// if ($('.a-counter').length) {
	// 	function counter() {
	// 		$('.a-counter:in-viewport').each(function () {
	// 			if (!$(this).hasClass('animated')) {
	// 				$(this).addClass('animated');
	// 				var thisElement = $(this);
	// 				$({ count: 0 }).animate({ count: thisElement.attr('data-value') }, {
	// 					duration: 2000,
	// 					easing: 'swing',
	// 					step: function step() {
	// 						var mathCount = Math.ceil(this.count);
	// 						thisElement.text(mathCount.toLocaleString('en-IN', { maximumSignificantDigits: 3 }));
	// 					}
	// 				});
	// 			}
	// 		});
	// 	};
	// 	counter();
	// 	$(window).on('scroll', function () {
	// 		counter();
	// 	});
	// }


	/*-------------------------------------------------------------------------------
	  Parallax Promo
	-------------------------------------------------------------------------------*/

	// if ($('.a-static-promo').length) {
	// 	$(window).bind('scroll', function (e) {
	// 		parallaxScroll();
	// 	});

	// 	function parallaxScroll() {
	// 		var scrolled = $(window).scrollTop();
	// 		$('.a-static-promo').css('background-position', '50% ' + (35 + (scrolled * .025)) + '%');
	// 	}
	// }


	/*-------------------------------------------------------------------------------
	  Institute Detail
	-------------------------------------------------------------------------------*/

	// $('.a-show-detail').on('click', function () {
	// 	var parent = $(this).closest('.institute-item-content');
	// 	if (!parent.hasClass('active')) {
	// 		$('.institute-item-content').removeClass('active');
	// 		$('.institute-item-detail-container').removeClass('open');
	// 		parent.addClass('active');
	// 		parent.next('.institute-item-detail-container').addClass('open');
	// 	} else {
	// 		$('.institute-item-content').removeClass('active');
	// 		$('.institute-item-detail-container').removeClass('open');
	// 	}
	// 	return false;
	// });

	// $('.a-hide-detail').on('click', function () {
	// 	$('.institute-item-content').removeClass('active');
	// 	$('.institute-item-detail-container').removeClass('open');
	// });



	/*-------------------------------------------------------------------------------
	  Forms
	-------------------------------------------------------------------------------*/

	// $('.a-toggle-descr').on('change', function (e) {
	// 	var descr = $(this).val();
	// 	$(this).closest('form').find('.descr-item.active').removeClass('active');
	// 	$(this).closest('form').find('.descr-item[data-descr=' + descr + ']').addClass('active');
	// });


	// $(".np-container").each(function () {
	// 	$(this).find(".np-content").slice(0, 4).show();
	// 	var el_id = this.id;
	// 	if ($("#" + el_id).find(".np-content:hidden").length == 0) {
	// 		$("#" + el_id).find(".np-loadMore").addClass("noContent");
	// 	} else {
	// 		if ($(this).parents(".tab-pane.fade").length) {
	// 			if (($("#" + el_id).find(".np-content:hidden").length) == 1) {
	// 				$("#" + el_id).find(".np-loadMore").addClass("noContent");
	// 			}
	// 		}
	// 	}
	// })
	// $(".np-loadMore").on("click", function (e) {
	// 	e.stopImmediatePropagation();
	// 	e.preventDefault();
	// 	var el_id = this.id;
	// 	$("#container_" + el_id).find(".np-content:hidden").slice(0, 4).show();
	// 	if ($("#container_" + el_id).find(".np-content:hidden").length == 0) {
	// 		$(".np-loadMore#" + el_id).addClass("noContent");
	// 	}
	// });


	// var modal_popup = document.getElementById('myModal-popup');
	// if (modal_popup) {
    // var span_popup = document.getElementById("close-popup");
	// $(".privacy-policy-popup").click(function () {
	// 	$("#myModal-popup").fadeIn();
	// });
	// span_popup.onclick = function () {
	// 	$("#myModal-popup").fadeOut();
	// }
	// /*window.onclick = function (event) {
	// 	if (event.target == modal_popup) {
	// 		$("#myModal-popup").fadeOut();
	// 	}
	// } */  
	// window.addEventListener('click', function(event) {
    //     if (event.target == modal_popup) {
	// 		$("#myModal-popup").fadeOut();
	// 	}
    // });
    // }  
                  

	// var skidki_popup = document.getElementById('skidki-popup');
	// if (skidki_popup) {
    // var skidki_close = document.getElementById("close-skidki");
	// /*$(".privacy-policy-popup").click(function () {
	// 	$("#myModal-popup").fadeIn();
	// });*/
	// skidki_close.onclick = function () {
	// 	$("#skidki-popup").fadeOut();
	// }
	// window.addEventListener('click', function(event) {
    //     if (event.target == skidki_popup) {
	// 		$("#skidki-popup").fadeOut();
	// 	}
    // });
    // }
    
	// $("table").each(function () {
	// 	if (!$(this).parent().hasClass("table-responsive")) {
    //         if ($(this).hasClass("edu-table")) {
    //             $(this).wrap($("<div class='table-responsive edu-responsive' />"));
    //         } else {
	// 		 $(this).wrap($("<div class='table-responsive' />"));
    //         }
	// 	}
	// });
	// $(".page_item").each(function () {
	// 	if ($(this).children("a").attr('href') == window.location.href) {
	// 		$(this).addClass("current_page_item");
	// 	}
	// });  
    // $(".showHideContent").each(function () {
    //     if (!($(this).children().length === 0 && !$(this).text())) {
    //       var hidingContent = document.createElement('p');
    //       $(hidingContent).append($(this).contents());  
    //       var hidingHeader = document.createElement('p');
    //       $(hidingHeader).addClass( "toggleThis showHide" );
    //       $(hidingHeader).text('показать');
    //       $(this).empty();
    //       $(this).append(hidingHeader);
    //       $(this).append(hidingContent); 
    //     }
    // });
    // $(".showHide").each(function () {
    //     $(this).append( "<span>скрыть</span>" );
    // });

	// $(".toggleMe, .toggleThis").click(function () {
	// 	$(this).next().slideToggle(0);
	// 	$(this).toggleClass("open");
	// 	/*$('html, body').animate({
	// 		scrollTop: ($(window).scrollTop() + 0) + 'px'
	// 	}, "slow"); */
	// }
	// )

	// $(".toggleHeader").click(function () {
	// 	$(this).parent().next("div").slideToggle("slow");
	// 	$('html, body').animate({
	// 		scrollTop: ($(window).scrollTop() + 0) + 'px'
	// 	}, "slow");
	// }
	// )
	// $('.capt').click(function (event) {
	// 	var title = $(this).attr('title');
	// 	var $curr = $('.cont[data-title="' + title + '"]').slideToggle("slow");
	// 	$('.cont').not($curr).hide();
	// 	event.preventDefault();
	// })      
    
	$('[data-fancybox]').fancybox({
		hideScrollbar: true,
		backFocus: false,
		hash: false,
	});
    $('[data-fancybox="gallery-student"]').fancybox({
        'loop': true	
    });
    
    $('ol[start]').each(function() {
    var val = parseFloat($(this).attr("start")) - 1;
    $(this).css('counter-increment','list0 '+ val);
    });

    var stats = document.querySelector(".statistic-item-value");
    if (stats) {
        var observer = new IntersectionObserver(function(entries) {
            if(entries[0].isIntersecting === true)
                $('.statistic-item-value').spincrement();
        }, { threshold: [1] });
        
        observer.observe(stats);
    }
});