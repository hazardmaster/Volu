(function($) {
    'use strict';

    var portfolio = {};
    edgtf.modules.portfolio = portfolio;

    portfolio.edgtfOnDocumentReady = edgtfOnDocumentReady;
    portfolio.edgtfOnWindowLoad = edgtfOnWindowLoad;
    portfolio.edgtfOnWindowResize = edgtfOnWindowResize;
    portfolio.edgtfOnWindowScroll = edgtfOnWindowScroll;

    portfolio.edgtfEventImagesSlider = edgtfEventImagesSlider;
    portfolio.edgtfEventsRelatedProducts = edgtfEventsRelatedProducts;
    portfolio.edgtfTitleFullWidthResize = edgtfTitleFullWidthResize;
    portfolio.edgtfInitEventsLoadMore = edgtfInitEventsLoadMore;
    portfolio.edgtfEventAppearFx = edgtfEventAppearFx;
    portfolio.edgtfInitEventListCarousel = edgtfInitEventListCarousel;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
    	edgtfTitleFullWidthResize();
        edgtfEventImagesSlider();
        edgtfEventsRelatedProducts();
        edgtfInitEventsLoadMore();
        edgtfInitEventListCarousel();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
    	edgtfInitFullWidthParallax();
        edgtfEventAppearFx();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
    	edgtfTitleFullWidthResize();

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {

    }

	/*
	**	Event List Full Width Title resizing
	*/
	function edgtfTitleFullWidthResize(){
		var title = $('.edgtf-event-list-full-width .edgtf-el-item-title');
		if (title.length){
			title.each(function(){
				var thisTitle = $(this);
				var fontSize;
				var coef1 = 1;
				var coef2 = 1;

				if (edgtf.windowWidth < 1300){
					coef1 = 0.8;
				}

				if (edgtf.windowWidth < 1200){
					coef1 = 0.75;
				}

				if (edgtf.windowWidth < 1000){
					coef1 = 0.7;
				}

				if (edgtf.windowWidth < 768){
					coef1 = 0.6;
					coef2 = 0.7;
				}

				if (edgtf.windowWidth < 600){
					coef1 = 0.5;
					coef2 = 0.6;
				}

				if (edgtf.windowWidth < 480){
					coef1 = 0.4;
					coef2 = 0.5;
				}

				if (typeof thisTitle.data('font-size') !== 'undefined' && thisTitle.data('font-size') !== false) {
					fontSize = parseInt(thisTitle.data('font-size'));

					if (fontSize > 70) {
						fontSize = Math.round(fontSize*coef1);
					}
					else if (fontSize > 35) {
						fontSize = Math.round(fontSize*coef2);
					}

					thisTitle.css('font-size',fontSize + 'px');
				}
			});
		}
	}

    function edgtfEventAppearFx() {
        var appearFxList = $('.edgtf-event-list-appear-fx');

        if (appearFxList.length && !edgtf.htmlEl.hasClass('touch')) {
            appearFxList.each(function(){
                var currentList = $(this),
                    eventItems = currentList.find('.edgtf-el-item'),
                    animateCycle = 2, // rewind delay
                    animateCycleCounter = 0;

                eventItems.appear(function(){
                    var eventItem = $(this);
                    animateCycleCounter ++;
                    if(animateCycleCounter == animateCycle) {
                        animateCycleCounter = 0;
                    }
                    setTimeout(function(){
                        eventItem.addClass('edgtf-appeared');
                    }, animateCycleCounter*200);
                },{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            });
        }
    }

    function edgtfEventsRelatedProducts(){
		var relatedProducts = $('.edgtf-event-related-slider');

		if (relatedProducts.length){

			var responsive = [
				{
					breakpoint: 769,
					settings: {
						slidesToShow: 2,
					}
				},
				{
					breakpoint: 481,
					settings: {
						slidesToShow: 1,
					}
				},
			];

			relatedProducts.slick({
				infinite: true,
				autoplay: true,
				slidesToShow : 3,
				centerMode: true,
				centerPadding: '15.1%',
				arrows: true,
				dots: false,
				adaptiveHeight: true,
				responsive: responsive,
                easing: 'easeInOutQuint',
                speed: 1000,
				prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_left"></span></span>',
				nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_right"></span></span>'
			});
		}
    }


    function edgtfEventImagesSlider(){
		var eventImagesSlider = $('.edgtf-event-images-slider');

		if (eventImagesSlider.length){

            var	element;

			eventImagesSlider.on('init', function(slick){
                eventImagesSlider.addClass('edgtf-appeared');

				element = eventImagesSlider.find('.slick-slide');

				element.each(function(){
					var thisElement = $(this),
						flag = 0,
						mousedownFlag = 0,
						moved = false;

					thisElement.on("mousedown", function(){
						flag = 0;
						mousedownFlag = 1;
						moved = false;
					});

					thisElement.on("mousemove", function(){
						if (mousedownFlag == 1){
							if (moved){
								flag = 1;
							}
							moved = true;
						}
					});

					thisElement.on("mouseleave", function(){
						flag = 0;
					});

					thisElement.on("mouseup", function(e){
						if(flag === 1){
							thisElement.find('a[data-rel^="prettyPhoto"]').off('click');
						}
						else{
							edgtf.modules.common.edgtfPrettyPhoto();
						}
						flag = 0;
						mousedownFlag = 0;
					});
				});

			});

			eventImagesSlider.slick({
				infinite: true,
				autoplay: true,
				slidesToShow : 1,
				centerMode: true,
				centerPadding: '16%',
				arrows: true,
				dots: false,
				adaptiveHeight: true,
                easing: 'easeInOutQuint',
                speed: 1000,
				prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_left"></span></span>',
				nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_right"></span></span>'
			});
		}
    }

	function edgtfInitFullWidthParallax(){
		var parallaxBackgroundItems = $('.edgtf-event-list-full-width.edgtf-event-list-parallax .edgtf-el-item-background');

		if(parallaxBackgroundItems.length){
			parallaxBackgroundItems.each(function() {

				var parallaxElement = $(this);
				var speed = 0.4;
				parallaxElement.parallax("50%", speed);
			});
		}
	}

    /**
     * Initializes events load more function
     */
    function edgtfInitEventsLoadMore(){
        var eventList = $('.edgtf-event-list-holder.edgtf-event-list-show-more');

        if(eventList.length){

            eventList.each(function(){
                
                var thisEventList = $(this);
                var thisEventListInner = thisEventList.find('.edgtf-event-list-holder-inner');
                var nextPage; 
                var maxNumPages;
                var loadMoreButton = thisEventList.find('.edgtf-el-list-load-more a');
                var buttonText = loadMoreButton.children(".edgtf-btn-text");
                
                if (typeof thisEventList.data('max-num-pages') !== 'undefined' && thisEventList.data('max-num-pages') !== false) {  
                    maxNumPages = thisEventList.data('max-num-pages');
                }

                if (thisEventList.hasClass('edgtf-event-list-load-button')) {

                    loadMoreButton.on('click', function (e) {
                        var loadMoreDatta = edgtfGetEventAjaxData(thisEventList);
                        nextPage = loadMoreDatta.nextPage;
                        e.preventDefault();
                        e.stopPropagation();
                        if (nextPage <= maxNumPages) {
                            var ajaxData = edgtfSetEventAjaxData(loadMoreDatta);
                            buttonText.text(edgtfGlobalVars.vars.edgtfLoadingMoreText);
                            $.ajax({
                                type: 'POST',
                                data: ajaxData,
                                url: edgtCoreAjaxUrl,
                                success: function (data) {
                                    nextPage++;
                                    thisEventList.data('next-page', nextPage);
                                    var response = $.parseJSON(data);
                                    var responseHtml = edgtfConvertHTML(response.html); //convert response html into jQuery collection that Mixitup can work with
                                    thisEventList.waitForImages(function () {
                                        thisEventListInner.append(responseHtml);
                                        edgtfTitleFullWidthResize();
                                        edgtfEventAppearFx();

                                        buttonText.text(edgtfGlobalVars.vars.edgtfLoadMoreText);

                                        if(nextPage > maxNumPages){
                                            loadMoreButton.hide();
                                        }
                                    });
                                }
                            });
                        }
                    });

                } else if (thisEventList.hasClass('edgtf-event-list-infinite-scroll')) {
                    loadMoreButton.appear(function(e) {
                        var loadMoreDatta = edgtfGetEventAjaxData(thisEventList);
                        nextPage = loadMoreDatta.nextPage;
                        e.preventDefault();
                        e.stopPropagation();
                        loadMoreButton.css('visibility', 'visible');
                        if(nextPage <= maxNumPages){
                            var ajaxData = edgtfSetEventAjaxData(loadMoreDatta);
                            $.ajax({
                                type: 'POST',
                                data: ajaxData,
                                url: edgtCoreAjaxUrl,
                                success: function (data) {
                                    nextPage++;
                                    thisEventList.data('next-page', nextPage);
                                    var response = $.parseJSON(data);
                                    var responseHtml = edgtfConvertHTML(response.html); //convert response html into jQuery collection that Mixitup can work with
                                    thisEventList.waitForImages(function(){
                                        thisEventListInner.append(responseHtml);
                                        loadMoreButton.css('visibility','hidden');
                                        edgtfTitleFullWidthResize();
                                        edgtfEventAppearFx();
                                    });
                                }
                            });
                        }
                        if(nextPage === maxNumPages){
                            setTimeout(function() {
                                loadMoreButton.fadeOut(400);
                            }, 400);
                        }

                    },{ one: false, accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
                }
                
            });
        }
    }
    
    function edgtfConvertHTML ( html ) {
        var newHtml = $.trim( html ),
                $html = $(newHtml ),
                $empty = $();

        $html.each(function ( index, value ) {
            if ( value.nodeType === 1) {
                $empty = $empty.add ( this );
            }
        });

        return $empty;
    }

    /**
     * Initializes events load more data params
     * @param event list container with defined data params
     * return array
     */
    function edgtfGetEventAjaxData(container){
        var returnValue = {};
        
        returnValue.type = '';
        returnValue.columns = '';
        returnValue.orderBy = '';
        returnValue.order = '';
        returnValue.eventStatus = '';
        returnValue.number = '';
        returnValue.category = '';
        returnValue.selectedProjectes = '';
        returnValue.showMore = '';
        returnValue.titleTag = '';
        returnValue.titleSize = '';
        returnValue.paddingTopBottom = '';
        returnValue.parallax = '';
        returnValue.appearFx = '';
        returnValue.nextPage = '';
        returnValue.maxNumPages = '';
        
        if (typeof container.data('type') !== 'undefined' && container.data('type') !== false) {
            returnValue.type = container.data('type');
        }
        if (typeof container.data('columns') !== 'undefined' && container.data('columns') !== false) {                    
            returnValue.columns = container.data('columns');
        }
        if (typeof container.data('order-by') !== 'undefined' && container.data('order-by') !== false) {                    
            returnValue.orderBy = container.data('order-by');
        }
        if (typeof container.data('order') !== 'undefined' && container.data('order') !== false) {                    
            returnValue.order = container.data('order');
        }
        if (typeof container.data('event-status') !== 'undefined' && container.data('event-status') !== false) {                    
            returnValue.eventStatus = container.data('event-status');
        }
        if (typeof container.data('number') !== 'undefined' && container.data('number') !== false) {                    
            returnValue.number = container.data('number');
        }
        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {                    
            returnValue.category = container.data('category');
        }
        if (typeof container.data('selected-projects') !== 'undefined' && container.data('selected-projects') !== false) {                    
            returnValue.selectedProjectes = container.data('selected-projects');
        }
        if (typeof container.data('show-more') !== 'undefined' && container.data('show-more') !== false) {                    
            returnValue.showMore = container.data('show-more');
        }
        if (typeof container.data('title-tag') !== 'undefined' && container.data('title-tag') !== false) {                    
            returnValue.titleTag = container.data('title-tag');
        }
        if (typeof container.data('parallax') !== 'undefined' && container.data('parallax') !== false) {                    
            returnValue.parallax = container.data('parallax');
        }
        if (typeof container.data('appear-fx') !== 'undefined' && container.data('appear-fx') !== false) {                    
            returnValue.appearFx = container.data('appear-fx');
        }
        if (typeof container.data('title-size') !== 'undefined' && container.data('title-size') !== false) {                    
            returnValue.titleSize = container.data('title-size');
        }
        if (typeof container.data('padding-top-bottom') !== 'undefined' && container.data('padding-top-bottom') !== false) {                    
            returnValue.paddingTopBottom = container.data('padding-top-bottom');
        }
        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {                    
            returnValue.nextPage = container.data('next-page');
        }
        if (typeof container.data('max-num-pages') !== 'undefined' && container.data('max-num-pages') !== false) {                    
            returnValue.maxNumPages = container.data('max-num-pages');
        }
        return returnValue;
    }
     /**
     * Sets events load more data params for ajax function
     * @param event list container with defined data params
     * return array
     */
    function edgtfSetEventAjaxData(container){
        var returnValue = {
            action: 'edgt_core_event_ajax_load_more',
            type: container.type,
            columns: container.columns,
            orderBy: container.orderBy,
            order: container.order,
            eventStatus: container.eventStatus,
            number: container.number,
            category: container.category,
            selectedProjectes: container.selectedProjectes,
            showMore: container.showMore,
            titleTag: container.titleTag,
            titleSize: container.titleSize,
            paddingTopBottom: container.paddingTopBottom,
            parallax: container.parallax,
            appearFx: container.appearFx,
            nextPage: container.nextPage
        };
        return returnValue;
    }

    /**
     * Initializes portfolio slider
     */
    
    function edgtfInitEventListCarousel(){
        var eventSlider = $('.edgtf-event-list-holder.edgtf-event-list-carousel');
        if(eventSlider.length){
            eventSlider.each(function(){
                var thisEventSlider = $(this);
                var sliderWrapper = thisEventSlider.children('.edgtf-event-list-holder-inner');

                //Responsive breakpoints
                var responsive = [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 601,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ];

                 sliderWrapper.on('init', function(slick){
                    var slides = sliderWrapper.find('.slick-slide');

                    var dragStart, clickable = false;

                    var handleDragStart = function(event) {
                        event = typeof event.originalEvent !== 'undefined' ? event.originalEvent : event;
                        event = event.type == 'touchstart' ? event.touches[0] : event;
                        dragStart = {
                            x: event.clientX,
                            y: event.clientY
                        };
                    };

                    var handleDragStop = function(event) {
                        event = typeof event.originalEvent !== 'undefined' ? event.originalEvent : event;
                        event = event.type == 'touchend' ? event.changedTouches[0] : event;
                        var dragEnd = {
                            x: event.clientX,
                            y: event.clientY
                        };
                        if (Math.abs(dragEnd.x - dragStart.x) < 10) {
                            clickable = true;
                        }
                    };

                    var handleClick = function(event) {
                        if (clickable) {
                            clickable = false;
                        }
                        else {
                            event.preventDefault();
                            event.stopImmediatePropagation();
                        }
                    };

                    slides.find('a')
                    .on('dragstart', function(event) {
                        event.stopImmediatePropagation();
                        event.preventDefault();
                    })
                    .on('click', handleClick)
                    .on('mousedown touchstart', handleDragStart)
                    .on('mouseup touchend', handleDragStop);
                });
    
                sliderWrapper.slick({
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    arrows: false,
                    dots: true,
                    dotsClass: 'edgtf-slick-dots',
                    speed: 600,
                    easing:'easeOutCubic',
                    slidesToShow: 3,
                    prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_carrot-left"></span></span>',
                    nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_carrot-right"></span></span>',
                    responsive:responsive,
                    customPaging: function(slider, i) {
                        return '<span class="edgtf-slick-dot-inner"></span>';
                    }
                });
            });
        }
    }

})(jQuery);