$(function() {		

	// $("body").children().each(function() {
	// 	document.body.innerHTML = document.body.innerHTML.replace(/\u2028/g, ' ');
	// });
	
	if ($(window).width() > 1199) {	

		if ($('.top-menu').length == 1) {
			var topMenu = $('.menu__list--top').find('.menu__item').clone();
			$('.top-menu .menu__list').append(topMenu);			
		};			

		function submenuWidth() {
			var windowWidth = $(window).width();
			$('.menu__item').each(function(){					
				if($(this).find('.submenu').length > 0) {
					var submenuW = $(this).find('.submenu').width();
				} else {
					var submenuW = 0;
				};
				if($(this).find('.submenu-2').length > 0) {
					var ssubmenuW = $(this).find('.submenu-2').width();
				} else {
					var ssubmenuW = 0;
				};

				var targetWidth = submenuW + ssubmenuW,
						targetPos = $(this).offset().left,
						targetResult = windowWidth-(targetPos+targetWidth)-17;			

				if (targetResult < 0) {
					$(this).find('.submenu').addClass('submenu--reverse');
				} else {
					$(this).find('.submenu').removeClass('submenu--reverse');
				};
			});
		};

		submenuWidth();		

		function catalogVisible() {
			$('.menu-block.is-scroll-menu .menu__list:not(.menu__list--top) .menu__item:not(.menu__item--is-catalog)').hover(
			function() {
				$('.menu-block.is-scroll-menu .menu__item--is-catalog').removeClass('hover');
				$(this).addClass('hover');
			}, function() {
				$('.menu-block.is-scroll-menu .menu__item--is-catalog').addClass('hover');
				$(this).removeClass('hover');
			});
		}

		$(window).scroll(function(){		
			/*var scrollTop = $(window).width() > 1466 ? 150 : 100;		*/
			var scrollTop = 0;	
			if ($(this).scrollTop() > scrollTop) {
				$(".header").addClass("is-fixed");		
				$(".menu-block").addClass("is-hidden");
				$('.hamburger').removeClass('is-active');	
				$('.top-menu').css('display', 'none');
				$('.menu .menu__item--top').css('display', 'block');
				$('.menu-block').addClass('is-scroll-menu');					
			} else {
				$(".header").removeClass("is-fixed");	
				$(".menu-block").removeClass("is-hidden");
				$('.menu .menu__item--top').css('display', 'none');
				$('.top-menu').css('display', 'block');
				$('.menu-block').removeClass('is-scroll-menu');			
			};

			catalogVisible();

		});

			/*var scrollTop = $(window).width() > 1466 ? 150 : 100;*/
			var scrollTop = 0;
			if ($(this).scrollTop() > scrollTop) {
				$(".header").addClass("is-fixed");		
				$(".menu-block").addClass("is-hidden");
				$('.hamburger').removeClass('is-active');	
				$('.top-menu').css('display', 'none');
				$('.menu .menu__item--top').css('display', 'block');
				$('.menu-block').addClass('is-scroll-menu');				
			} else {
				$(".header").removeClass("is-fixed");	
				$(".menu-block").removeClass("is-hidden");
				$('.menu .menu__item--top').css('display', 'none');
				$('.top-menu').css('display', 'block');
				$('.menu-block').removeClass('is-scroll-menu');			
			};		

		catalogVisible();
		
		$('.menu__toggle').click(function() {	
			var menu = $('.menu-block');	
			if (menu.hasClass('is-hidden')) {
				$(this).find('.hamburger').addClass('is-active');
				menu.removeClass("is-hidden").scrollTop(0);				
			} else {
				$(this).find('.hamburger').removeClass('is-active');
				menu.addClass('is-hidden');
			};
		});			

		/*$( ".menu__link--sub, .menu__item--is-catalog, .submenu").hover(function(){			
			$('.wrap').addClass('is-overlay');
		}, function(){ 
			$('.wrap').removeClass('is-overlay');
		});*/
		
	} else {	

		$('.menu__toggle').click(function() {
			var menu = $('.menu-block');		
			if (menu.hasClass('visible')) {	
				$(this).find('.hamburger').removeClass('is-active');		
				menu.removeClass("visible");		
				$('.overlay').removeClass('is-visible');
				$('body').removeClass('noscroll');	
			} else {			
				$(this).find('.hamburger').addClass('is-active');
				menu.addClass('visible').scrollTop(0);	
				$('.overlay').addClass('is-visible');
				$('body').addClass('noscroll');
			};
		});	

		$('.overlay').click(function(){
			var menu = $('.menu-block');				
			menu.removeClass("visible");		
			$('.submenu').removeClass('slide');		
			$(this).removeClass('is-visible');
			$('.navbar .hamburger').removeClass('is-active');		
			$('body').removeClass('noscroll');
			$('.menu-block').removeClass('noscroll-y');		
		});	

		$('.menu__link--sub, .menu__item--is-catalog .menu__link').click(function(){
			event.preventDefault();
			$(this).next().addClass('slide').scrollTop(0);
			$('.menu-block').addClass('noscroll-y');
		});		

		$('.menu__back').click(function(){
			event.preventDefault();
			$(this).parent().parent().removeClass('slide');
			$('.menu-block').removeClass('noscroll-y');
		});	

		$(window).scroll(function(){		
			var scrollTop = 0;
			if ($(this).scrollTop() > scrollTop) {
				$(".header").addClass("is-fixed");					
			} else {
				$(".header").removeClass("is-fixed");	
			};
		});		

		var scrollTop = 0;
		if ($(this).scrollTop() > scrollTop) {
			$(".header").addClass("is-fixed");					
		} else {
			$(".header").removeClass("is-fixed");	
		};

		$('.mobile-menu__hamburger').click(function() {
			var menu = $('.menu-block');		
			if (menu.hasClass('visible')) {	
				$('.navbar .hamburger').removeClass('is-active');				
				menu.removeClass("visible");		
				$('.overlay').removeClass('is-visible');
				$('body').removeClass('noscroll');	
			} else {						
				menu.addClass('visible').scrollTop(0);	
				$('.overlay').addClass('is-visible');
				$('body').addClass('noscroll');
			};
		});	

	};		

	if ($(window).width() > 991) {
		$('.callback').each(function(){
			var tels = $(this).find('.callback__popup .phone__tels a').length;		
			if (tels > 1) {
				$(this).children().addClass('is-single');
			};
		});	
	};	

	function heroSlider() {
		$(".hero-slider").slick({ 
			slidesToShow: 1,
			slidesToScroll: 1,
			infinite: true,
			speed: 600,
			arrows: false,						
			dots: true,
			draggable: true,
			swipe: true,			
			fade: true,
			autoplay: true,
			autoplaySpeed: 5000			
		});		
	};		

	if ($('.hero-slider').length==1) {
		var heroSlides = $('.hero-slide').length;
		if (heroSlides > 1)  {					
			heroSlider();			
			$('.hero-slider__arrows').addClass('is-visible');
			$('.hero-slide__title').matchHeight({
				byRow: true,
				property: 'height',
				target: null,
				remove: false
			});	
			$('.hero-slide').matchHeight({
				byRow: true,
				property: 'height',
				target: null,
				remove: false
			});	
		};
	};
	
	$('.new__title').matchHeight({
		byRow: true,
		property: 'height',
		target: null,
		remove: false
	});		

	$('.new__text').matchHeight({
		byRow: true,
		property: 'height',
		target: null,
		remove: false
	});	

	$('.new__date').matchHeight({
		byRow: true,
		property: 'height',
		target: null,
		remove: false
	});	

	$('.product__title').matchHeight({
		byRow: true,
		property: 'height',
		target: null,
		remove: false
	});	

	$('.product__price').matchHeight({
		byRow: true,
		property: 'height',
		target: null,
		remove: false
	});	

	if($(window).width() < 992) {
		$('.product__chars-groups').matchHeight({
			byRow: true,
			property: 'height',
			target: null,
			remove: false
		});
	}

	$('.product').click(function(e){
		if  (!$(this).find($('.product__btns .btn')).is(e.target)) {
			event.preventDefault(); 
			var href = $(this).data("href");		
			window.location.href = href;
		}		
	});

	function productsSlider() {

		$(".products--slider.is-slider").slick({ 
			slidesToShow: 4,
			slidesToScroll: 1,
			infinite: false,
			speed: 400,
			arrows: true,
			prevArrow: '.products__slider-arrows .prev',
			nextArrow: '.products__slider-arrows .forward',
			dots: false,
			draggable: false,
			swipe: true,			
			fade: false,			
			autoplay: false,			
			autoplaySpeed: 5000,	
			variableWidth: true,
			responsive: [			
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 2
				}
			},	
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 1,
					centerMode: true,
					centerPadding: '15%',
					variableWidth: false
				}
			},
			{
				breakpoint: 375,
				settings: {
					slidesToShow: 1,
					centerMode: true,
					centerPadding: '10%',
					variableWidth: false
				}
			}]
		});	

	};		

	if ($('.products--slider').length==1) {
		var slides = $('.products--slider .product').length;
		if (slides > 4) {		
			$(".products__slider-arrows").addClass('is-visible');	
			$(".products--slider").addClass('is-slider');	
			setTimeout(function(){
				productsSlider();
				$('.product__title').matchHeight({
					byRow: true,
					property: 'height',
					target: null,
					remove: false
				});	
				$('.product__price').matchHeight({
					byRow: true,
					property: 'height',
					target: null,
					remove: false
				});	

				if($(window).width() < 992) {
					$('.product__chars-groups').matchHeight({
						byRow: true,
						property: 'height',
						target: null,
						remove: false
					});
				}					
			}, 300);		
		};
	};

	if ($('.categories-block').length == 1) {
		var categoryItems = $('.categories-block .category').length;	
		if(categoryItems == 10) {
			$('.category--more').addClass('sm');
		};
		if(categoryItems == 11) {
			$('.category--more').addClass('lg');
		};
	}

	$(".card-photos__js-slider").slick({ 
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: false,
		speed: 400,
		arrows: false,
		dots: false,
		draggable: false,
		swipe: true,
		fade: true,
		asNavFor: '.card-photos__thumbs',
		autoplay: false
	});

	if($('.card-photos__thumb-slide').length > 1) {
		var thumbsSlider = $(".card-photos__thumbs").slick({ 
			slidesToShow: 3,
			slidesToScroll: 1,
			infinite: false,
			speed: 400,
			arrows: true,
			prevArrow: '<button class="prev"><img src="/wp-content/themes/mt_framework/assets/img/next.svg" alt="Alt" class="svg"></button>',
			nextArrow: '<button class="forward"><img src="/wp-content/themes/mt_framework/assets/img/next.svg" alt="Alt" class="svg"></button>',
			dots: false,
			draggable: true,
			swipe: true,
			asNavFor: '.card-photos__js-slider',
			focusOnSelect: true,
			responsive: [			
			{
				breakpoint: 375,
				settings: {
					slidesToShow: 2
				}
			}]
		});	
		thumbsSlider.on('afterChange', function(){
			var slides = $('.card-photos__thumb-slide').length - 1;			
			var slideIndex = $('.card-photos__thumb-slide.slick-active.slick-current').data("slick-index");
			if (slideIndex == slides) {
				$(".card-photos__thumbs .forward").addClass('disabled');
			} else {
				$(".card-photos__thumbs .forward").removeClass('disabled');
			}
		});	
	} else {
		$(".card-photos").addClass('single');
	};	

	$('.card__tabs').each(function(){		
		var containerWidth = $(this).width(),
				tabsWidth = 0;	
		$(this).find('.card__tab').each(function(){
			tabsWidth+=$(this).outerWidth();		
		});
		var result = containerWidth - tabsWidth;		
		if (result < 0) {
			$(this).addClass('is-scroll');	
			if($(window).width() > 1023) {
				$(this).mCustomScrollbar({
					theme: "my-theme",
					axis: 'x'
				});		
			}						
		};	
	});	

	$('.card__tabs .card__tab').click(function(){
		event.preventDefault(); 
		if(!$(this).hasClass('active')) {
			var id = $(this).attr('href');
			$(this).parent().find($('.card__tab')).removeClass('active');
			$(this).addClass('active');
			$(this).parent().parent().find($('.card-about__item')).removeClass('active visible');
			$(id).addClass('active');	
			setTimeout(function () {
				$(id).addClass('visible');
			}, 20);				
			$('.card-about table').each(function(){		
				var containerWidth = $(this).closest($('.container')).width(),
				tableWidth = $(this).width(),			
				result = tableWidth - containerWidth;	
				if (result > 0) {
					$(this).addClass('is-scroll');
					if($(window).width() > 1023) {
						$(this).mCustomScrollbar({
							theme: "my-theme",
							axis: 'x'
						});		
					}			
				};	
			});		
		};
	});	

	function brandsSlider() {
		$(".brands-block.is-slider .brands-slider").slick({ 
			slidesToShow: 4,
			slidesToScroll: 1,
			infinite: false,
			speed: 400,
			arrows: true,
			prevArrow: '.brands__slider-arrows .prev',
			nextArrow: '.brands__slider-arrows .forward',
			dots: false,
			draggable: true,
			swipe: true,			
			fade: false,			
			autoplay: false,			
			autoplaySpeed: 5000,			
			responsive: [				
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 2
				}
			}]
		});
	};		

	if ($('.brands-block').length==1) {
		var slides = $('.brands-block .brand').length;
		if (slides > 4) {		
			$(".brands__slider-arrows").addClass('is-visible');	
			$(".brands-block").addClass('is-slider');	
			setTimeout(function(){
				brandsSlider();	
				$('.brands-block .brand').matchHeight({
					byRow: true,
					property: 'height',
					target: null,
					remove: false
				});		
				}, 500);						
		};
	};		

	function categoryBrandsSlider() {
		$(".category-brands-block.is-slider .brands-slider").slick({ 
			slidesToShow: 6,
			slidesToScroll: 1,
			infinite: false,
			speed: 400,
			arrows: true,
			prevArrow: '.category-brands__slider-arrows .prev',
			nextArrow: '.category-brands__slider-arrows .forward',
			dots: false,
			draggable: true,
			swipe: true,			
			fade: false,			
			autoplay: false,			
			autoplaySpeed: 5000,			
			responsive: [			
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 5
				}
			},	
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 4
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 2
				}
			}]
		});
	};		

	if ($('.category-brands-block').length==1) {
		var slides = $('.category-brands-block .brand').length;
		if (slides > 6) {		
			$(".category-brands__slider-arrows").addClass('is-visible');	
			$(".category-brands-block").addClass('is-slider');	
			setTimeout(function(){
				categoryBrandsSlider();
				$('.category-brands-block .brand').matchHeight({
					byRow: true,
					property: 'height',
					target: null,
					remove: false
				});		
				}, 500);						
		};
	};		

	$( ".brand a" ).hover(function(){
		$(this).closest('.brands-slider').find('.brand').addClass('no-hover');
		$(this).parent().removeClass('no-hover');
	}, function(){ 
		$(this).closest('.brands-slider').find('.brand').removeClass('no-hover');
	});

	$('.category-menu__list .drop-down').click(function(){		
		if (!$(this).hasClass('active')) {
			$(this).addClass('active').children('ul').slideDown();
		}	else {
			$(this).removeClass('active').children('ul').slideUp();
		}		
	});

	function aboutSlider() {
		$(".about__slider.is-slider").slick({ 
			slidesToShow: 1,
			slidesToScroll: 1,
			infinite: false,
			speed: 400,
			arrows: false,
			dots: true,
			draggable: true,
			swipe: true,			
			fade: true,			
			autoplay: false,			
			autoplaySpeed: 5000
		});
	};	

	if ($('.about__slider').length==1) {
		var slides = $('.about__multimedia').length;
		if (slides > 1)  {					
			$(".about__slider").addClass('is-slider');	
			aboutSlider();			
		};
	};	
	
	if ($('.reviews-section').length==1) {
		$('.review__slider').each(function(){
			var slides = $(this).find($('.review__multimedia')).length;
			if (slides > 1)  {					
				$(this).addClass('is-slider');
			};			
		});
		$(".review__slider.is-slider").each(function(){
			$(this).slick({ 
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: false,
				speed: 400,
				arrows: false,
				dots: true,
				draggable: true,
				swipe: true,			
				fade: true,			
				autoplay: false,			
				autoplaySpeed: 5000
			});	
		})
	};	

	// Ползунки

	$( ".slider-range" ).each(function(){

		var minValue = $(this).data("min"),
				maxValue = $(this).data("max"),
				step = $(this).data("step");

		var id = $(this).closest('.filter').data("id");				
		$('.filter__condition[data-id="' + id + '"]').find('.cond-val-min').text(minValue);
		$('.filter__condition[data-id="' + id + '"]').find('.cond-val-max').text(maxValue);
	
		$(this).slider({		
			range: true,
			min: minValue,
			max: maxValue,
			step: step,
			values: [ minValue, maxValue ],
			slide: function( event, ui ) {
				$(this).closest('.filter').find( ".slider-range-min" ).val( ui.values[ 0 ] );
				$(this).closest('.filter').find( ".slider-range-max" ).val( ui.values[ 1 ] );				
				var id = $(this).closest('.filter').data("id");	
				$('.filter__condition[data-id="' + id + '"]').css('display', 'inline-block').find('.cond-val-min').text(ui.values[ 0 ]);
				$('.filter__condition[data-id="' + id + '"]').css('display', 'inline-block').find('.cond-val-max').text(ui.values[ 1 ]);
			}
		});	

		$(this).closest('.filter').find( ".slider-range-min" ).val( $(this).slider( "values", 0 ) );
		$(this).closest('.filter').find( ".slider-range-max" ).val( $(this).slider( "values", 1 ) );

		$(this).closest('.filter').find($(".slider-range-min")).change(function(){
			var value1=$(this).val();
			var value2=$(this).closest('.filter').find( ".slider-range-max").val();
			if((parseInt(value1) >= minValue) && (parseInt(value1) <= maxValue)){		
				$(this).val(value1);	
			} else {
				$(this).val(minValue);				
			};		
			value1=$(this).val();		
			if(parseInt(value1) > parseInt(value2)){
				value1 = value2;
				$(this).val(value1);
			}
			$(this).closest('.filter').find($(".slider-range")).slider("values", 0, value1);	
			var id = $(this).closest('.filter').data("id");				
			$('.filter__condition[data-id="' + id + '"]').css('display', 'inline-block').find('.cond-val-min').text(value1);
		});

		$(this).closest('.filter').find($(".slider-range-max")).change(function(){
			var value1=$(this).closest('.filter').find( ".slider-range-min").val();
			var value2=$(this).val();
			if((parseInt(value2) <= maxValue) && (parseInt(value2) >= minValue)){
				$(this).val(value2);	
			} else {
				$(this).val(maxValue);				
			};		
			value2=$(this).val();	
			if(parseInt(value1) > parseInt(value2)){
				value2 = value1;
				$(this).val(value2);
			}	
			$(this).closest('.filter').find($(".slider-range")).slider("values", 1, value2);	
			var id = $(this).closest('.filter').data("id");				
			$('.filter__condition[data-id="' + id + '"]').css('display', 'inline-block').find('.cond-val-max').text(value2);
		});

	});

	if($(window).width() > 575) {
		$('.filter__title').click(function(){
			if (!$(this).hasClass('active')) {
				$('.filter__body').removeClass('visible');
				$('.filter__title').removeClass('active');
				$(this).addClass('active').parent().find('.filter__body').addClass('visible');
			} else {
				$(this).removeClass('active').parent().find('.filter__body').removeClass('visible');
			}
		});

		$(document).mouseup(function (e){ 
			var filter = $('.filter__body');
			var title = $('.filter__title');
			if (!filter.is(e.target) && !title.is(e.target) && filter.has(e.target).length === 0) { 
				filter.removeClass('visible');
				filter.closest('.filter').find('.filter__title').removeClass('active');
			}
		});

	} else {
		$('.filter__title').click(function(){
			if (!$(this).hasClass('active')) {				
				$(this).addClass('active').parent().find('.filter__body').css('display', 'block');
			} else {
				$(this).removeClass('active').parent().find('.filter__body').css('display', 'none');
			}
		});
	};		

	$('.filter__val').click(function(){
		if (!$(this).hasClass('active')) {
			$(this).parent().find($('.filter__val')).removeClass('active');
			$(this).addClass('active');
			var id = $(this).closest('.filter').data("id");		
			var val = $(this).text();
			$('.filter__condition[data-id="' + id + '"]').find('.cond-val').text(val);
			$('.filter__condition[data-id="' + id + '"]').css('display', 'inline-block');
		} 
	});

	$('.filters__title').click(function(){
		$(this).next().fadeIn();
	});	

	$('.filter__condition-close').click(function(){				
		var id = $(this).closest('.filter__condition').data("id");
		var filter = $('.filter[data-id="' + id + '"]');

		filter.find($('.filter__val')).removeClass('active');

		var minValue = filter.find('.slider-range').data("min"),
				maxValue = filter.find('.slider-range').data("max");

		filter.find('.slider-range').slider({
			values: [ minValue, maxValue ]		
		});	

		filter.find( ".slider-range-min" ).val( filter.find('.slider-range').slider( "values", 0 ) );
		filter.find( ".slider-range-max" ).val( filter.find('.slider-range').slider( "values", 1 ) );

		$('.filter__condition[data-id="' + id + '"]').find('.cond-val-min').text(minValue);
		$('.filter__condition[data-id="' + id + '"]').find('.cond-val-max').text(maxValue);

		$(this).closest('.filter__condition').css('display', 'none');	

	});	

	$('.filters__delete').click(function(){

		$('.filter__val').removeClass('active');

		$( ".slider-range" ).each(function(){

			var minValue = $(this).data("min"),
					maxValue = $(this).data("max");

			$(this).slider({					
				values: [ minValue, maxValue ]				
			});	

			$(this).closest('.filter').find( ".slider-range-min" ).val( $(this).slider( "values", 0 ) );
			$(this).closest('.filter').find( ".slider-range-max" ).val( $(this).slider( "values", 1 ) );	

			var id = $(this).closest('.filter').data("id");		

			$('.filter__condition[data-id="' + id + '"]').find('.cond-val-min').text(minValue);
			$('.filter__condition[data-id="' + id + '"]').find('.cond-val-max').text(maxValue);

		});		

		$('.filter__condition').css('display', 'none');	

		/*$('.filter__body').removeClass('visible');*/

	});

	$(window).scroll(function(){	
		var scrollTop = $(window).height()*1;	
		if ($(this).scrollTop() > scrollTop) {			
			$(".up").addClass("is-visible");
		} else {			
			$(".up").removeClass("is-visible");
		};
	});		

	$('.up').click(function() {
		$('body,html').animate({scrollTop: 0}, 1000);
	});	

	//Маска для телефона
	$('input[type="tel"]').mask("+7 (999) 999-99-99", {	
		placeholder: "_"		
	});		
	
	$("a[href$='.jpg'], a[href$='.jpeg'], a[href$='.png'], a[href$='.webp']").click(function() {	
		event.preventDefault(); 
		var gallerybox = $(this).parent().find($("a[href$='.jpg'], a[href$='.jpeg'], a[href$='.png'], a[href$='.webp']"));	
		if (gallerybox.length > 1) {
			var index = $(this).index();
			$.fancybox.open(gallerybox, {
				'index' : index,				
				loop: true
			});
		} else {		
			$.fancybox.open(gallerybox);
		}		
	});			

	$('table').each(function(){		
		var containerWidth = $(this).closest($('.container')).width(),
				tableWidth = $(this).width(),			
				result = tableWidth - containerWidth;	
		if (result > 0) {
			$(this).addClass('is-scroll');
			if($(window).width() > 1023) {
				$(this).mCustomScrollbar({
					theme: "my-theme",
					axis: 'x'
				});		
			}			
		};	
	});		

	$('[href="#callback"]').fancybox({
		touch: false,
		autoFocus: false
	});	

	$('button[data-href]').click(function(){
		event.preventDefault(); 
		var href = $(this).data("href");
		$.fancybox.open($(href), {
			touch: false,
			autoFocus: false
		})
	});	

	$('.file-upload input[type=file]').change(function() {
		if ($(this).val() != '') {
			var	file_name = this.files[0].name;	
			$(this).closest('.file-input-wrap').find(".file-name").html(file_name);	
		}
	});	

	//E-mail Ajax Send
	//Documentation & Example: https://github.com/agragregra/uniMail
	// $(".form:not(.form-city)").submit(function() {
	// 	var th = $(this);
	// 	if (!event.target.checkValidity()) {
	// 		event.preventDefault();
	// 		th.find("[required]").focus();
	// 	} else {
	// 		$.ajax({
	// 			type: "POST",
	// 			url: "mail.php",
	// 			data: th.serialize()
	// 		}).done(function() {
	// 			$.fancybox.close();
	// 			setTimeout(function(){
	// 				$('[href="#thanks"]')[0].click();
	// 			}, 500);
	// 			th.trigger("reset");
	// 		});
	// 		return false;
	// 	}
	// });
	
	$.fancybox.defaults.beforeShow = function(){
		$('.header, .up.is-visible').addClass('open-popup');	
		windowResizeLabel = false;		
	};
	$.fancybox.defaults.afterClose = function(){
		$('.header, .up.is-visible').removeClass('open-popup');	
		windowResizeLabel = true;			
	};	

	$('.popup__close').click(function(){
		event.preventDefault(); 		
		$.fancybox.close();
	});	

	var windowResizeLabel = true;
	function windowResize() {
		var lastWidth = $(window).width();
		$(window).resize(function(){
			if($(window).width()!=lastWidth) {
				if(windowResizeLabel) {
					location.reload();
				}				
			};		
		});
	};
	windowResize();		

	// Replace all SVG images with inline SVG
	$('img.svg').each(function(){
		var $img = $(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');

		$.get(imgURL, function(data) {
					// Get the SVG tag, ignore the rest
					var $svg = $(data).find('svg');

					// Add replaced image's ID to the new SVG
					if(typeof imgID !== 'undefined') {
						$svg = $svg.attr('id', imgID);
					}
					// Add replaced image's classes to the new SVG
					if(typeof imgClass !== 'undefined') {
						$svg = $svg.attr('class', imgClass+' replaced-svg');
					}

					// Remove any invalid XML tags as per http://validator.w3.org
					$svg = $svg.removeAttr('xmlns:a');

					// Check if the viewport is set, if the viewport is not set the SVG wont't scale.
					if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
						$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
					}

					// Replace image with new SVG
					$img.replaceWith($svg);

				}, 'xml');
	});

	//Chrome Smooth Scroll
	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {};

	$("img, a").on("dragstart", function(event) { event.preventDefault(); });



	$('.wpcf7').on('wpcf7mailsent', function() {
		$.fancybox.close();
		$.fancybox.open({
			src  : '#thanks',
			type : 'inline',
			toolbar  : false
		});
	});

});







/*!
 * Lazy Load - JavaScript plugin for lazy loading images
 *
 * Copyright (c) 2007-2019 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   https://appelsiini.net/projects/lazyload
 *
 * Version: 2.0.0-rc.2
 *
 */

(function (root, factory) {
    if (typeof exports === "object") {
        module.exports = factory(root);
    } else if (typeof define === "function" && define.amd) {
        define([], factory);
    } else {
        root.LazyLoad = factory(root);
    }
}) (typeof global !== "undefined" ? global : this.window || this.global, function (root) {

    "use strict";

    if (typeof define === "function" && define.amd){
        root = window;
    }

    const defaults = {
        src: "data-src",
        srcset: "data-srcset",
        selector: ".lazyload",
        root: null,
        rootMargin: "0px",
        threshold: 0
    };

    /**
    * Merge two or more objects. Returns a new object.
    * @private
    * @param {Boolean}  deep     If true, do a deep (or recursive) merge [optional]
    * @param {Object}   objects  The objects to merge together
    * @returns {Object}          Merged values of defaults and options
    */
    const extend = function ()  {

        let extended = {};
        let deep = false;
        let i = 0;
        let length = arguments.length;

        /* Check if a deep merge */
        if (Object.prototype.toString.call(arguments[0]) === "[object Boolean]") {
            deep = arguments[0];
            i++;
        }

        /* Merge the object into the extended object */
        let merge = function (obj) {
            for (let prop in obj) {
                if (Object.prototype.hasOwnProperty.call(obj, prop)) {
                    /* If deep merge and property is an object, merge properties */
                    if (deep && Object.prototype.toString.call(obj[prop]) === "[object Object]") {
                        extended[prop] = extend(true, extended[prop], obj[prop]);
                    } else {
                        extended[prop] = obj[prop];
                    }
                }
            }
        };

        /* Loop through each object and conduct a merge */
        for (; i < length; i++) {
            let obj = arguments[i];
            merge(obj);
        }

        return extended;
    };

    function LazyLoad(images, options) {
        this.settings = extend(defaults, options || {});
        this.images = images || document.querySelectorAll(this.settings.selector);
        this.observer = null;
        this.init();
    }

    LazyLoad.prototype = {
        init: function() {

            /* Without observers load everything and bail out early. */
            if (!root.IntersectionObserver) {
                this.loadImages();
                return;
            }

            let self = this;
            let observerConfig = {
                root: this.settings.root,
                rootMargin: this.settings.rootMargin,
                threshold: [this.settings.threshold]
            };

            this.observer = new IntersectionObserver(function(entries) {
                Array.prototype.forEach.call(entries, function (entry) {
                    if (entry.isIntersecting) {
                        self.observer.unobserve(entry.target);
                        let src = entry.target.getAttribute(self.settings.src);
                        let srcset = entry.target.getAttribute(self.settings.srcset);
                        if ("img" === entry.target.tagName.toLowerCase()) {
                            if (src) {
                                entry.target.src = src;
                            }
                            if (srcset) {
                                entry.target.srcset = srcset;
                            }
                        } else {
                            entry.target.style.backgroundImage = "url(" + src + ")";
                        }
                    }
                });
            }, observerConfig);

            Array.prototype.forEach.call(this.images, function (image) {
                self.observer.observe(image);
            });
        },

        loadAndDestroy: function () {
            if (!this.settings) { return; }
            this.loadImages();
            this.destroy();
        },

        loadImages: function () {
            if (!this.settings) { return; }

            let self = this;
            Array.prototype.forEach.call(this.images, function (image) {
                let src = image.getAttribute(self.settings.src);
                let srcset = image.getAttribute(self.settings.srcset);
                if ("img" === image.tagName.toLowerCase()) {
                    if (src) {
                        image.src = src;
                    }
                    if (srcset) {
                        image.srcset = srcset;
                    }
                } else {
                    image.style.backgroundImage = "url('" + src + "')";
                }
            });
        },

        destroy: function () {
            if (!this.settings) { return; }
            this.observer.disconnect();
            this.settings = null;
        }
    };

    root.lazyload = function(images, options) {
        return new LazyLoad(images, options);
    };

    if (root.jQuery) {
        const $ = root.jQuery;
        $.fn.lazyload = function (options) {
            options = options || {};
            options.attribute = options.attribute || "data-src";
            new LazyLoad($.makeArray(this), options);
            return this;
        };
    }

    return LazyLoad;
});



window.addEventListener('load', function(){
	lazyload();
});


// docs in new window
$(function() {
    $('a[href$=".pdf"],a[href$=".doc"],a[href$=".docx"],a[href$=".ppt"],a[href$=".pptx"],a[href$=".xls"],a[href$=".xlsx"],a[href$=".txt"],a[href$=".rtf"]').prop('target', '_blank');
});

