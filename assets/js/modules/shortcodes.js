(function($) {
    'use strict';

    var shortcodes = {};

    edgtf.modules.shortcodes = shortcodes;

    shortcodes.edgtfInitCounter = edgtfInitCounter;
    shortcodes.edgtfInitProgressBars = edgtfInitProgressBars;
    shortcodes.edgtfInitCountdown = edgtfInitCountdown;
    shortcodes.edgtfInitMessages = edgtfInitMessages;
    shortcodes.edgtfInitMessageHeight = edgtfInitMessageHeight;
    shortcodes.edgtfInitTestimonials = edgtfInitTestimonials;
    shortcodes.edgtfInitCarousels = edgtfInitCarousels;
    shortcodes.edgtfInitPieChart = edgtfInitPieChart;
    shortcodes.edgtfInitPieChartDoughnut = edgtfInitPieChartDoughnut;
    shortcodes.edgtfInitTabs = edgtfInitTabs;
    shortcodes.edgtfInitTabIcons = edgtfInitTabIcons;
    shortcodes.edgtfInitBlogListMasonry = edgtfInitBlogListMasonry;
    shortcodes.edgtfCustomFontResize = edgtfCustomFontResize;
    shortcodes.edgtfInitImageGallery = edgtfInitImageGallery;
    shortcodes.edgtfProjectPresentationSlider = edgtProjectPresentationSlider;
    shortcodes.edgtfInitAccordions = edgtfInitAccordions;
    shortcodes.edgtfShowGoogleMap = edgtfShowGoogleMap;
    shortcodes.edgtfInitPortfolioListMasonry = edgtfInitPortfolioListMasonry;
    shortcodes.edgtfInitPortfolioListPinterest = edgtfInitPortfolioListPinterest;
    shortcodes.edgtfInitPortfolio = edgtfInitPortfolio;
    shortcodes.edgtfInitPortfolioMasonryFilter = edgtfInitPortfolioMasonryFilter;
    shortcodes.edgtfInitPortfolioSlider = edgtfInitPortfolioSlider;
    shortcodes.edgtfInitPortfolioLoadMore = edgtfInitPortfolioLoadMore;
    shortcodes.edgtfCheckSliderForHeaderStyle = edgtfCheckSliderForHeaderStyle;
    shortcodes.edgtfInitShopListMasonry = edgtfInitShopListMasonry;
    shortcodes.edgtfItemShowcase = edgtfItemShowcase;
    shortcodes.edgtfAnimationsHolder = edgtfAnimationsHolder;
    shortcodes.edgtfInitImageGalleryMasonry = edgtfInitImageGalleryMasonry;
    shortcodes.edgtfReservationFormDatePicker = edgtfReservationFormDatePicker;
    shortcodes.edgtfBanner = edgtfBanner;

    shortcodes.edgtfOnDocumentReady = edgtfOnDocumentReady;
    shortcodes.edgtfOnWindowLoad = edgtfOnWindowLoad;
    shortcodes.edgtfOnWindowResize = edgtfOnWindowResize;
    shortcodes.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);

    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfInitCounter();
        edgtfInitProgressBars();
        edgtfInitCountdown();
        edgtfIcon().init();
        edgtfInitMessages();
        edgtfInitMessageHeight();
        edgtfInitTestimonials();
        edgtfInitCarousels();
        edgtfInitPieChart();
        edgtfInitPieChartDoughnut();
        edgtfInitTabs();
        edgtfInitElementsHolderResponsiveStyle();
        edgtfInitTabIcons();
        edgtfButton().init();
        edgtfInitBlogListMasonry();
		edgtfInitBlogSlider();
        edgtfCustomFontResize();
        edgtfInitImageGallery();
        edgtProjectPresentationSlider();
        edgtfInitAccordions();
        edgtfShowGoogleMap();
        edgtfInitPortfolioListMasonry();
        edgtfInitPortfolioListPinterest();
        edgtfInitPortfolio();
        edgtfInitPortfolioMasonryFilter();
        edgtfInitPortfolioSlider();
        edgtfInitPortfolioLoadMore();
        edgtfSlider().init();
        edgtfSocialIconWidget().init();
        edgtfInitIconList().init();
        edgtfInitShopListMasonry();
        edgtfInitMasonryGallery();
        edgtfItemShowcase();
        edgtfCustomFontTypeOut();
        edgtfInitImageGalleryMasonry();
        edgtfReservationFormDatePicker();
        edgtfBanner();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
        edgtfAnimationsHolder();
        edgtfInitGiveSlider();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
        edgtfInitBlogListMasonry();
		//edgtfInitBlogSlider();
        edgtfCustomFontResize();
        edgtfInitPortfolioListMasonry();
        edgtfInitPortfolioListPinterest();
        edgtfInitMessageHeight();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {
        
    }
    

    /**
     * Counter Shortcode
     */
    function edgtfInitCounter() {

        var counters = $('.edgtf-counter');


        if (counters.length) {
            counters.each(function() {
                var counter = $(this);
                counter.appear(function() {
                    counter.parent().addClass('edgtf-counter-holder-show');

                    //Counter zero type
                    if (counter.hasClass('zero')) {
                        var max = parseFloat(counter.text());
                        counter.countTo({
                            from: 0,
                            to: max,
                            speed: 1500,
                            refreshInterval: 100
                        });
                    } else {
                        counter.absoluteCounter({
                            speed: 2000,
                            fadeInDelay: 1000
                        });
                    }

                },{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            });

            var counterTitle = $('.edgtf-counter-title');
            if(counterTitle.length){
                counterTitle.each(function(){
                    var thisTitle = $(this);
                    if(typeof thisTitle.data('hover-color') !== 'undefined') {
                        var changeTitleColor = function(event) {
                            event.data.thisTitle.css('color', event.data.color);
                        };

                        var originalColor = thisTitle.css('color');
                        var hoverColor = thisTitle.data('hover-color');

                        thisTitle.on('mouseenter', { thisTitle: thisTitle, color: hoverColor }, changeTitleColor);
                        thisTitle.on('mouseleave', { thisTitle: thisTitle, color: originalColor }, changeTitleColor);
                    }
                });
            }
        }

    }

    /*
     **	Elements Holder responsive style
     */
    function edgtfInitElementsHolderResponsiveStyle(){

        var elementsHolder = $('.edgtf-elements-holder');

        if(elementsHolder.length){
            elementsHolder.each(function() {
                var thisElementsHolder = $(this),
                    elementsHolderItem = thisElementsHolder.children('.edgtf-elements-holder-item'),
                    style = '',
                    responsiveStyle = '';

                elementsHolderItem.each(function() {
                    var thisItem = $(this),
                        itemClass = '',
                        largeLaptop = '',
                        smallLaptop = '',
                        ipadLandscape = '',
                        ipadPortrait = '',
                        mobileLandscape = '',
                        mobilePortrait = '';

                    if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
                        itemClass = thisItem.data('item-class');
                    }
                    if (typeof thisItem.data('1280-1600') !== 'undefined' && thisItem.data('1280-1600') !== false) {
                        largeLaptop = thisItem.data('1280-1600');
                    }
                    if (typeof thisItem.data('1024-1280') !== 'undefined' && thisItem.data('1024-1280') !== false) {
                        smallLaptop = thisItem.data('1024-1280');
                    }
                    if (typeof thisItem.data('768-1024') !== 'undefined' && thisItem.data('768-1024') !== false) {
                        ipadLandscape = thisItem.data('768-1024');
                    }
                    if (typeof thisItem.data('600-768') !== 'undefined' && thisItem.data('600-768') !== false) {
                        ipadPortrait = thisItem.data('600-768');
                    }
                    if (typeof thisItem.data('480-600') !== 'undefined' && thisItem.data('480-600') !== false) {
                        mobileLandscape = thisItem.data('480-600');
                    }
                    if (typeof thisItem.data('480') !== 'undefined' && thisItem.data('480') !== false) {
                        mobilePortrait = thisItem.data('480');
                    }

                    if(largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {

                        if(largeLaptop.length) {
                            responsiveStyle += "@media only screen and (min-width: 1280px) and (max-width: 1600px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+largeLaptop+" !important; } }";
                        }
                        if(smallLaptop.length) {
                            responsiveStyle += "@media only screen and (min-width: 1024px) and (max-width: 1280px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+smallLaptop+" !important; } }";
                        }
                        if(ipadLandscape.length) {
                            responsiveStyle += "@media only screen and (min-width: 768px) and (max-width: 1024px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+ipadLandscape+" !important; } }";
                        }
                        if(ipadPortrait.length) {
                            responsiveStyle += "@media only screen and (min-width: 600px) and (max-width: 768px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+ipadPortrait+" !important; } }";
                        }
                        if(mobileLandscape.length) {
                            responsiveStyle += "@media only screen and (min-width: 480px) and (max-width: 600px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+mobileLandscape+" !important; } }";
                        }
                        if(mobilePortrait.length) {
                            responsiveStyle += "@media only screen and (max-width: 480px) {.edgtf-elements-holder-item-content."+itemClass+" { padding: "+mobilePortrait+" !important; } }";
                        }
                    }
                });

                if(responsiveStyle.length) {
                    style = '<style type="text/css" data-type="goodwish_style_handle_shortcodes_custom_css">'+responsiveStyle+'</style>';
                }

                if(style.length) {
                    $('head').append(style);
                }
            });
        }
    }
    
    /*
    **	Horizontal progress bars shortcode
    */
    function edgtfInitProgressBars(){
        
        var progressBar = $('.edgtf-progress-bar');
        
        if(progressBar.length){
            
            progressBar.each(function() {
                
                var thisBar = $(this);
                
                thisBar.appear(function() {
                    edgtfInitToCounterProgressBar(thisBar);
                    if(thisBar.find('.edgtf-floating.edgtf-floating-inside') !== 0){
                        var floatingInsideMargin = thisBar.find('.edgtf-progress-content').height();
                        floatingInsideMargin += parseFloat(thisBar.find('.edgtf-progress-title-holder').css('padding-bottom'));
                        floatingInsideMargin += parseFloat(thisBar.find('.edgtf-progress-title-holder').css('margin-bottom'));
                        thisBar.find('.edgtf-floating-inside').css('margin-bottom',-(floatingInsideMargin)+'px');
                    }
                    var percentage = thisBar.find('.edgtf-progress-content').data('percentage'),
                        progressContent = thisBar.find('.edgtf-progress-content'),
                        progressNumber = thisBar.find('.edgtf-progress-number');

                    progressContent.css('width', '0%');
                    progressContent.animate({'width': percentage+'%'}, 1500);
                    progressNumber.css('left', '0%');
                    progressNumber.animate({'left': percentage+'%'}, 1500);

                });
            });
        }
    }

    /*
    **	Counter for horizontal progress bars percent from zero to defined percent
    */
    function edgtfInitToCounterProgressBar(progressBar){
        var percentage = parseFloat(progressBar.find('.edgtf-progress-content').data('percentage'));
        var percent = progressBar.find('.edgtf-progress-number .edgtf-percent');
        if(percent.length) {
            percent.each(function() {
                var thisPercent = $(this);
                thisPercent.parents('.edgtf-progress-number-wrapper').css('opacity', '1');
                thisPercent.countTo({
                    from: 0,
                    to: percentage,
                    speed: 1500,
                    refreshInterval: 50
                });
            });
        }
    }
    
    /*
    **	Function to close message shortcode
    */
    function edgtfInitMessages(){
        var message = $('.edgtf-message');
        if(message.length){
            message.each(function(){
                var thisMessage = $(this);
                thisMessage.find('.edgtf-close').on('click',function(e){
                    e.preventDefault();
                    $(this).parent().parent().fadeOut(500);
                });
            });
        }
    }
    
    /*
    **	Init message height
    */
    function edgtfInitMessageHeight(){
       var message = $('.edgtf-message.edgtf-with-icon');
       if(message.length){
           message.each(function(){
               var thisMessage = $(this);
               var textHolderHeight = thisMessage.find('.edgtf-message-text-holder').height();
               var iconHolderHeight = thisMessage.find('.edgtf-message-icon-holder').height();
               
               if(textHolderHeight > iconHolderHeight) {
                   thisMessage.find('.edgtf-message-icon-holder').height(textHolderHeight);
               } else {
                   thisMessage.find('.edgtf-message-text-holder').height(iconHolderHeight);
               }
           });
       }
    }

    /**
     * Countdown Shortcode
     */
    function edgtfInitCountdown() {

        var countdowns = $('.edgtf-countdown'),
            year,
            month,
            day,
            hour,
            minute,
            timezone,
            monthLabel,
            dayLabel,
            hourLabel,
            minuteLabel,
            secondLabel;

        if (countdowns.length) {

            countdowns.each(function(){

                //Find countdown elements by id-s
                var countdownId = $(this).attr('id'),
                    countdown = $('#'+countdownId),
                    digitFontSize,
                    labelFontSize,
	                digitColor,
	                labelColor;

                //Get data for countdown
                year = countdown.data('year');
                month = countdown.data('month');
                day = countdown.data('day');
                hour = countdown.data('hour');
                minute = countdown.data('minute');
                timezone = countdown.data('timezone');
                monthLabel = countdown.data('month-label');
                dayLabel = countdown.data('day-label');
                hourLabel = countdown.data('hour-label');
                minuteLabel = countdown.data('minute-label');
                secondLabel = countdown.data('second-label');
                digitFontSize = countdown.data('digit-size');
                labelFontSize = countdown.data('label-size');
                digitColor = countdown.data('digit-color');
                labelColor = countdown.data('label-color');


                //Initialize countdown
                countdown.countdown({
                    until: new Date(year, month - 1, day, hour, minute, 44),
                    labels: ['Years', monthLabel, 'Weeks', dayLabel, hourLabel, minuteLabel, secondLabel],
                    format: 'ODHMS',
                    timezone: timezone,
                    padZeroes: true,
                    onTick: setCountdownStyle
                });

                function setCountdownStyle() {
                    countdown.find('.countdown-amount').css({
                        'font-size' : digitFontSize+'px'
                    });
	                countdown.find('.countdown-amount').css({
                        'color' : digitColor
                    });
                    countdown.find('.countdown-period').css({
                        'font-size' : labelFontSize+'px'
                    });
	                countdown.find('.countdown-period').css({
                        'color' : labelColor
                    });
                }

            });

        }

    }

    /**
     * Object that represents icon shortcode
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var edgtfIcon = edgtf.modules.shortcodes.edgtfIcon = function() {
        //get all icons on page
        var icons = $('.edgtf-icon-shortcode');

        /**
         * Function that triggers icon animation and icon animation delay
         */
        var iconAnimation = function(icon) {
            if(icon.hasClass('edgtf-icon-animation')) {
                icon.appear(function() {
                    icon.parent('.edgtf-icon-animation-holder').addClass('edgtf-icon-animation-show');
                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            }
        };

        /**
         * Function that triggers icon hover color functionality
         */
        var iconHoverColor = function(icon) {
            if(typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function(event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon.find('.edgtf-icon-element');
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if(hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        /**
         * Function that triggers icon holder background color hover functionality
         */
        var iconHolderBackgroundHover = function(icon) {
            if(typeof icon.data('hover-background-color') !== 'undefined') {
                var changeIconBgColor = function(event) {
                    event.data.icon.css('background-color', event.data.color);
                };

                var hoverBackgroundColor = icon.data('hover-background-color');
                var originalBackgroundColor = icon.css('background-color');

                if(hoverBackgroundColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
                    icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
                }
            }
        };

        /**
         * Function that initializes icon holder border hover functionality
         */
        var iconHolderBorderHover = function(icon) {
            if(typeof icon.data('hover-border-color') !== 'undefined') {
                var changeIconBorder = function(event) {
                    event.data.icon.css('border-color', event.data.color);
                };

                var hoverBorderColor = icon.data('hover-border-color');
                var originalBorderColor = icon.css('border-color');

                if(hoverBorderColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
                    icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
                }
            }
        };

        return {
            init: function() {
                if(icons.length) {
                    icons.each(function() {
                        iconAnimation($(this));
                        iconHoverColor($(this));
                        iconHolderBackgroundHover($(this));
                        iconHolderBorderHover($(this));
                    });

                }
            }
        };
    };

    /**
     * Object that represents social icon widget
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var edgtfSocialIconWidget = edgtf.modules.shortcodes.edgtfSocialIconWidget = function() {
        //get all social icons on page
        var icons = $('.edgtf-social-icon-widget-holder');

        /**
         * Function that triggers icon hover color functionality
         */
        var socialIconHoverColor = function(icon) {
            if(typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function(event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon;
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if(hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        return {
            init: function() {
                if(icons.length) {
                    icons.each(function() {
                        socialIconHoverColor($(this));
                    });

                }
            }
        };
    };

    /**
     * Init testimonials shortcode
     */
    function edgtfInitTestimonials(){

        var testimonial = $('.edgtf-testimonials');
        if(testimonial.length){
            testimonial.each(function(){

                var thisTestimonial = $(this);

                thisTestimonial.waitForImages(function() {
                    thisTestimonial.css('visibility','visible');
                });

                var auto = true;
                var controlNav = true;
                var directionNav = true;
                var animationSpeed = 1000;
				var responsive;
				var slidesToShow = 1;

                if(typeof thisTestimonial.data('animation-speed') !== 'undefined' && thisTestimonial.data('animation-speed') !== false) {
                    animationSpeed = thisTestimonial.data('animation-speed');
                }

				if(typeof thisTestimonial.data('dots-navigation') !== 'undefined') {
					controlNav = thisTestimonial.data('dots-navigation');
				}
				if(typeof thisTestimonial.data('arrows-navigation') !== 'undefined') {
					directionNav = thisTestimonial.data('arrows-navigation');
				}

				if(thisTestimonial.hasClass('edgtf-testimonials-type-carousel')){
					slidesToShow = 3;

					responsive = [
						{
							breakpoint: 1024,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 1,
								infinite: true,
								dots: false
							}
						},
						{
							breakpoint: 600,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}
					]
				}

				thisTestimonial.slick({
					infinite: true,
					autoplay: auto,
					slidesToShow : slidesToShow,
					arrows: directionNav,
					dots: controlNav,
					dotsClass: 'edgtf-slick-dots',
					adaptiveHeight: true,
                    speed: animationSpeed,
                    easing:'easeOutCubic',
					prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_carrot-left"></span></span>',
					nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_carrot-right"></span></span>',
					customPaging: function(slider, i) {
						return '<span class="edgtf-slick-dot-inner"></span>';
					},
					responsive: responsive,
				});
            });

        }

    }

    /**
     * Init Carousel shortcode
     */
    function edgtfInitCarousels() {

        var carouselHolders = $('.edgtf-carousel-holder'),
            carousel,
            numberOfItems,
			arrowsNavigation,
			dotsNavigation;

        if (carouselHolders.length) {
            carouselHolders.each(function(){
                carousel = $(this).children('.edgtf-carousel');
                numberOfItems = carousel.data('items');
                arrowsNavigation = (carousel.data('arrows-navigation') == 'yes') ? true : false;
                dotsNavigation = (carousel.data('dots-navigation') == 'yes') ? true : false;

                //Responsive breakpoints

      			carousel.slick({
					infinite: true,
					autoplay: true,
					slidesToShow : numberOfItems,
					arrows: arrowsNavigation,
					dots: dotsNavigation,
					dotsClass: 'edgtf-slick-dots',
					adaptiveHeight: true,
                    easing:'easeOutCubic',
					prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_carrot-left"></span></span>',
					nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_carrot-right"></span></span>',
					customPaging: function(slider, i) {
						return '<span class="edgtf-slick-dot-inner"></span>';
					},
					responsive: [
						{
							breakpoint: 1024,
							settings: {
								slidesToShow: 3,
								slidesToScroll: 1
							}
						},
						{
							breakpoint: 600,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 1
							}
						},
						{
							breakpoint: 480,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}
					]
				});


			});
        }

    }

    /**
     * Init Pie Chart and Pie Chart With Icon shortcode
     */
    function edgtfInitPieChart() {

        var pieCharts = $('.edgtf-pie-chart-holder, .edgtf-pie-chart-with-icon-holder');

        if (pieCharts.length) {

            pieCharts.each(function () {

                var pieChart = $(this),
                    percentageHolder = pieChart.children('.edgtf-percentage, .edgtf-percentage-with-icon'),
                    barColor = '#ffb422',
                    trackColor = '#f6f4ee',
                    lineWidth = 6,
                    size = 180;

                if(typeof percentageHolder.data('bar-color') !== 'undefined' && percentageHolder.data('bar-color') !== '') {
                    barColor = percentageHolder.data('bar-color');
                }

                if(typeof percentageHolder.data('track-color') !== 'undefined' && percentageHolder.data('track-color') !== '') {
                    trackColor = percentageHolder.data('track-color');
                }

                percentageHolder.appear(function() {
                    initToCounterPieChart(pieChart);
                    percentageHolder.css('opacity', '1');

                    percentageHolder.easyPieChart({
                        barColor: barColor,
                        trackColor: trackColor,
                        scaleColor: false,
                        lineCap: 'butt',
                        lineWidth: lineWidth,
                        animate: 1500,
                        size: size
                    });
                },{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});

            });

        }

    }

    /*
     **	Counter for pie chart number from zero to defined number
     */
    function initToCounterPieChart( pieChart ){

        pieChart.css('opacity', '1');
        var counter = pieChart.find('.edgtf-to-counter'),
            max = parseFloat(counter.text());
        counter.countTo({
            from: 0,
            to: max,
            speed: 1500,
            refreshInterval: 50
        });

    }

    /**
     * Init Pie Chart shortcode
     */
    function edgtfInitPieChartDoughnut() {

        var pieCharts = $('.edgtf-pie-chart-doughnut-holder, .edgtf-pie-chart-pie-holder');

        pieCharts.each(function(){

            var pieChart = $(this),
                canvas = pieChart.find('canvas'),
                chartID = canvas.attr('id'),
                chart = document.getElementById(chartID).getContext('2d'),
                data = [],
                jqChart = $(chart.canvas); //Convert canvas to JQuery object and get data parameters

            for (var i = 1; i<=10; i++) {

                var chartItem,
                    value = jqChart.data('value-' + i),
                    color = jqChart.data('color-' + i);
                
                if (typeof value !== 'undefined' && typeof color !== 'undefined' ) {
                    chartItem = {
                        value : value,
                        color : color
                    };
                    data.push(chartItem);
                }

            }

            if (canvas.hasClass('edgtf-pie')) {
                new Chart(chart).Pie(data,
                    {segmentStrokeColor : 'transparent'}
                );
            } else {
                new Chart(chart).Doughnut(data,
                    {segmentStrokeColor : 'transparent'}
                );
            }

        });

    }

    /*
    **	Init tabs shortcode
    */
    function edgtfInitTabs(){

       var tabs = $('.edgtf-tabs');
        if(tabs.length){
            tabs.each(function(){
                var thisTabs = $(this);

                thisTabs.children('.edgtf-tab-container').each(function(index){
                    index = index + 1;
                    var that = $(this),
                        link = that.attr('id'),
                        navItem = that.parent().find('.edgtf-tabs-nav li:nth-child('+index+') a'),
                        navLink = navItem.attr('href');

                        link = '#'+link;

                        if(link.indexOf(navLink) > -1) {
                            navItem.attr('href',link);
                        }
                });

                if(thisTabs.hasClass('edgtf-horizontal-tab')){
                    thisTabs.tabs();
                } else if(thisTabs.hasClass('edgtf-vertical-tab')){
                    thisTabs.tabs().addClass( 'ui-tabs-vertical ui-helper-clearfix' );
                    thisTabs.find('.edgtf-tabs-nav > ul >li').removeClass( 'ui-corner-top' ).addClass( 'ui-corner-left' );
                }
            });
        }
    }

    /*
    **	Generate icons in tabs navigation
    */
    function edgtfInitTabIcons(){

        var tabContent = $('.edgtf-tab-container');
        if(tabContent.length){

            tabContent.each(function(){
                var thisTabContent = $(this);

                var id = thisTabContent.attr('id');
                var icon = '';
                if(typeof thisTabContent.data('icon-html') !== 'undefined' || thisTabContent.data('icon-html') !== 'false') {
                    icon = thisTabContent.data('icon-html');
                }

                var tabNav = thisTabContent.parents('.edgtf-tabs').find('.edgtf-tabs-nav > li > a[href="#'+id+'"]');

                if(typeof(tabNav) !== 'undefined') {
                    tabNav.children('.edgtf-icon-frame').append(icon);
                }
            });
        }
    }

    /**
     * Button object that initializes whole button functionality
     * @type {Function}
     */
    var edgtfButton = edgtf.modules.shortcodes.edgtfButton = function() {
        //all buttons on the page
        var buttons = $('.edgtf-btn');

        /**
         * Initializes button hover color
         * @param button current button
         */
        var buttonHoverColor = function(button) {
            if(typeof button.data('hover-color') !== 'undefined') {
                var changeButtonColor = function(event) {
                    event.data.button.css('color', event.data.color);
                };

                var originalColor = button.css('color');
                var hoverColor = button.data('hover-color');

                button.on('mouseenter', { button: button, color: hoverColor }, changeButtonColor);
                button.on('mouseleave', { button: button, color: originalColor }, changeButtonColor);
            }
        };



        /**
         * Initializes button hover background color
         * @param button current button
         */
        var buttonHoverBgColor = function(button, hoverEl) {
            if(typeof button.data('hover-bg-color') !== 'undefined') {
                var changeButtonBg = function(event) {
                    event.data.button.css('background-color', event.data.color);
                };

                var originalBgColor = button.css('background-color');
                var hoverBgColor = button.data('hover-bg-color');

                if(hoverEl){
                    button.find('.edgtf-btn-hover').css('background-color',hoverBgColor);
                }
                else{
                    button.on('mouseenter', { button: button, color: hoverBgColor }, changeButtonBg);
                    button.on('mouseleave', { button: button, color: originalBgColor }, changeButtonBg);
                }
            }
        };

        /**
         * Initializes button border color
         * @param button
         */
        var buttonHoverBorderColor = function(button) {
            if(typeof button.data('hover-border-color') !== 'undefined') {
                var changeBorderColor = function(event) {
                    event.data.button.css('border-color', event.data.color);
                };

                var originalBorderColor = button.css('borderTopColor'); //take one of the four sides
                var hoverBorderColor = button.data('hover-border-color');
                button.on('mouseenter', { button: button, color: hoverBorderColor }, changeBorderColor);
                button.on('mouseleave', { button: button, color: originalBorderColor }, changeBorderColor);
            }
        };

        return {
            init: function() {
                if(buttons.length) {
                    buttons.each(function() {
                        var thisBtn = $(this);
                        buttonHoverColor(thisBtn);
                        if(thisBtn.hasClass('edgtf-btn-animated')){
                            buttonHoverBgColor(thisBtn, true);
                        }else{
                            buttonHoverBgColor(thisBtn,false);
                            // border color transition exists only for non animated buttons
                            buttonHoverBorderColor(thisBtn);
                        }
                    });
                }
            }
        };
    };
    
    /*
    **	Init blog list masonry type
    */
    function edgtfInitBlogListMasonry(){
        var blogList = $('.edgtf-blog-list-holder.edgtf-masonry .edgtf-blog-list');
        if(blogList.length) {
            blogList.each(function() {
                var thisBlogList = $(this);
                blogList.waitForImages(function() {
                    thisBlogList.isotope({
                        layoutMode: 'packery',
                        itemSelector: '.edgtf-blog-list-masonry-item',
                        packery: {
                            columnWidth: '.edgtf-blog-list-masonry-grid-sizer',
                            gutter: '.edgtf-blog-list-masonry-grid-gutter'
                        }
                    });
                    thisBlogList.addClass('edgtf-appeared');
                });
            });

        }
    }

	/**
	 * Initializes portfolio slider
	 */

	function edgtfInitBlogSlider(){
		var blogSlider = $('.edgtf-blog-slider');
		if(blogSlider.length){
			blogSlider.each(function(){
				var thisBlogSlider = $(this);
				var navigation = true;
				var responsive;
				var slides = 1;

				if (typeof thisBlogSlider.data('type') !== 'undefined' && thisBlogSlider.data('type') !== false && thisBlogSlider.data('type') == 'carousel') {

					responsive = [
						{
							breakpoint: 1025,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 1,
								infinite: true,
								dots: true
							}
						},
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}
					]
					slides = 3;
				}

				thisBlogSlider.on('init', function(slick){
					thisBlogSlider.css('opacity', 1);
				});
				thisBlogSlider.waitForImages(function() {
					thisBlogSlider.slick({
						infinite: true,
						autoplay: false,
						slidesToShow : slides,
						arrows: navigation,
						dots: true,
						dotsClass: 'edgtf-slick-dots',
						adaptiveHeight: true,
                        easing:'easeOutCubic',
						prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_carrot-left"></span></span>',
						nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_carrot-right"></span></span>',
						customPaging: function(slider, i) {
							return '<span class="edgtf-slick-dot-inner"></span>';
						},
						responsive: responsive
					});
				});

			});
		}
	}

	/*
	**	Custom Font resizing
	*/
	function edgtfCustomFontResize(){
		var customFont = $('.edgtf-custom-font-holder');
		if (customFont.length){
			customFont.each(function(){
				var thisCustomFont = $(this);
				var fontSize;
				var lineHeight;
				var coef1 = 1;
				var coef2 = 1;

				if (edgtf.windowWidth < 1200){
					coef1 = 0.8;
				}

				if (edgtf.windowWidth < 1024){
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

				if (typeof thisCustomFont.data('font-size') !== 'undefined' && thisCustomFont.data('font-size') !== false) {
					fontSize = parseInt(thisCustomFont.data('font-size'));

					if (fontSize > 70) {
						fontSize = Math.round(fontSize*coef1);
					}
					else if (fontSize > 35) {
						fontSize = Math.round(fontSize*coef2);
					}

					thisCustomFont.css('font-size',fontSize + 'px');
				}

				if (typeof thisCustomFont.data('line-height') !== 'undefined' && thisCustomFont.data('line-height') !== false) {
					lineHeight = parseInt(thisCustomFont.data('line-height'));

					if (lineHeight > 70 && edgtf.windowWidth < 1200) {
						lineHeight = '1.2em';
					}
					else if (lineHeight > 35 && edgtf.windowWidth < 768) {
						lineHeight = '1.2em';
					}
					else{
						lineHeight += 'px';
					}

					thisCustomFont.css('line-height', lineHeight);
				}
			});
		}
	}

    /*
     **	Show Google Map
     */
    function edgtfShowGoogleMap(){

        if($('.edgtf-google-map').length){
            $('.edgtf-google-map').each(function(){

                var element = $(this);

                var customMapStyle;
                if(typeof element.data('custom-map-style') !== 'undefined') {
                    customMapStyle = element.data('custom-map-style');
                }

                var colorOverlay;
                if(typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
                    colorOverlay = element.data('color-overlay');
                }

                var saturation;
                if(typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
                    saturation = element.data('saturation');
                }

                var lightness;
                if(typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
                    lightness = element.data('lightness');
                }

                var zoom;
                if(typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
                    zoom = element.data('zoom');
                }

                var pin;
                if(typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
                    pin = element.data('pin');
                }

                var mapHeight;
                if(typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
                    mapHeight = element.data('height');
                }

                var uniqueId;
                if(typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
                    uniqueId = element.data('unique-id');
                }

                var scrollWheel;
                if(typeof element.data('scroll-wheel') !== 'undefined') {
                    scrollWheel = element.data('scroll-wheel');
                }
                var addresses;
                if(typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
                    addresses = element.data('addresses');
                }

                var map = "map_"+ uniqueId;
                var geocoder = "geocoder_"+ uniqueId;
                var holderId = "edgtf-map-"+ uniqueId;

                edgtfInitializeGoogleMap(customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin,  map, geocoder, addresses);
            });
        }

    }
    /*
     **	Init Google Map
     */
    function edgtfInitializeGoogleMap(customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin,  map, geocoder, data){

        var mapStyles = [
            {
                stylers: [
                    {hue: color },
                    {saturation: saturation},
                    {lightness: lightness},
                    {gamma: 1}
                ]
            }
        ];

        var googleMapStyleId;

        if(customMapStyle){
            googleMapStyleId = 'edgtf-style';
        } else {
            googleMapStyleId = google.maps.MapTypeId.ROADMAP;
        }

        var qoogleMapType = new google.maps.StyledMapType(mapStyles,
            {name: "Edge Google Map"});

        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);

        if (!isNaN(height)){
            height = height + 'px';
        }

        var myOptions = {

            zoom: zoom,
            scrollwheel: wheel,
            center: latlng,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            scaleControl: false,
            scaleControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            streetViewControl: false,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: false,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeControl: false,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'edgtf-style'],
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeId: googleMapStyleId
        };

        map = new google.maps.Map(document.getElementById(holderId), myOptions);
        map.mapTypes.set('edgtf-style', qoogleMapType);

        var index;

        for (index = 0; index < data.length; ++index) {
            edgtfInitializeGoogleAddress(data[index], pin, map, geocoder);
        }

        var holderElement = document.getElementById(holderId);
        holderElement.style.height = height;
    }
    /*
     **	Init Google Map Addresses
     */
    function edgtfInitializeGoogleAddress(data, pin,  map, geocoder){
        if (data === '')
            return;
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<div id="bodyContent">'+
            '<p>'+data+'</p>'+
            '</div>'+
            '</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        geocoder.geocode( { 'address': data}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon:  pin,
                    title: data['store_title']
                });
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                });

                google.maps.event.addDomListener(window, 'resize', function() {
                    map.setCenter(results[0].geometry.location);
                });

            }
        });
    }

    function edgtfInitAccordions(){
        var accordion = $('.edgtf-accordion-holder');
        if(accordion.length){
            accordion.each(function(){

               var thisAccordion = $(this);

				if(thisAccordion.hasClass('edgtf-accordion')){

					thisAccordion.accordion({
						animate: "swing",
						collapsible: true,
						active: 0,
						icons: "",
						heightStyle: "content"
					});
				}

				if(thisAccordion.hasClass('edgtf-toggle')){

					var toggleAccordion = $(this);
					var toggleAccordionTitle = toggleAccordion.find('.edgtf-title-holder');
					var toggleAccordionContent = toggleAccordionTitle.next();

					toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
					toggleAccordionTitle.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom");
					toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

					toggleAccordionTitle.each(function(){
						var thisTitle = $(this);
						thisTitle.on('mouseenter mouseleave',function(){
							thisTitle.toggleClass("ui-state-hover");
						});

						thisTitle.on('click',function(){
							thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
							thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
						});
					});
				}
            });
        }
    }

    function edgtfInitImageGallery() {

        var galleries = $('.edgtf-image-gallery');

        if (galleries.length) {
            galleries.each(function () {
                var gallery = $(this).children('.edgtf-image-gallery-slider'),
                    animation = (gallery.data('animation') == 'fade'),
                    navigation = (gallery.data('navigation') == 'yes'),
                    pagination = (gallery.data('pagination') == 'yes'),
                    autoPlay = false,
                    autoPlaySpeed = 1;
                    if(gallery.data('autoplay') != ''){
                        autoPlay = true;
                        autoPlaySpeed = gallery.data('autoplay') * 1000;
                    }

                gallery.slick({
                    autoplay: autoPlay,
                    autoPlaySpeed: autoPlaySpeed * 1000,
                    arrows: navigation,
                    adaptiveHeight: true,
                    fade: animation,
                    dotsClass: 'edgtf-slick-dots',
                    dots: pagination,
                    speed: 600,
                    easing:'easeOutCubic',
                    prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_carrot-left"></span></span>',
                    nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_carrot-right"></span></span>',
                    customPaging: function(slider, i) {
                        return '<span class="edgtf-slick-dot-inner"></span>';
                    }
                });
            });
        }

        var carousels = $('.edgtf-image-gallery-carousel-wrapper');

        if (carousels.length) {
            carousels.each(function () {
                var carousel = $(this).children('.edgtf-image-gallery-carousel'),
                    navigation = (carousel.data('navigation') == 'yes'),
                    pagination = (carousel.data('pagination') == 'yes'),
                    autoPlay = false,
                    slidesToShow = 1,
                    centerMode = true,
                    variableWidth = true,
                    autoPlaySpeed = 1;
                if(carousel.data('autoplay') != ''){
                    autoPlay = true;
                    autoPlaySpeed = carousel.data('autoplay') * 1000;
                }

                var responsive = [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]

                carousel.slick({
                    autoplay: autoPlay,
                    autoPlaySpeed: autoPlaySpeed * 1000,
                    arrows: navigation,
                    dots: pagination,
                    dotsClass: 'edgtf-slick-dots',
                    speed: 600,
                    easing:'easeOutCubic',
                    slidesToShow : slidesToShow,
                    variableWidth: variableWidth,
                    centerMode: centerMode,
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

    /**
     * Init Image Masonry Gallery
     */
    function edgtfInitImageGalleryMasonry(){
        var masonryGallery = $('.edgtf-image-gallery-masonry');

        if(masonryGallery.length) {
            masonryGallery.each(function () {
                var thisGallery = $(this);
                thisGallery.waitForImages(function () {
                    var size = thisGallery.find('.edgtf-image-masonry-grid-sizer').width();
                    edgtfImageResizeMasonry(size,thisGallery);
                    edgtfInitImageMasonry(thisGallery);

                });
                $(window).resize(function(){
                    var size = thisGallery.find('.edgtf-image-masonry-grid-sizer').width();
                    edgtfImageResizeMasonry(size,thisGallery);
                    edgtfInitImageMasonry(thisGallery);
                });
            });
        }
    }

    function edgtfInitImageMasonry(container){
        container.animate({opacity: 1});
        container.isotope({
            itemSelector: '.edgtf-gallery-image',
            masonry: {
                columnWidth: '.edgtf-image-masonry-grid-sizer'
            }
        });
    }


    function edgtfImageResizeMasonry(size,container){

        var defaultMasonryItem = container.find('.edgtf-size-square');
        var largeWidthMasonryItem = container.find('.edgtf-size-landscape');
        var largeHeightMasonryItem = container.find('.edgtf-size-portrait');
        var largeWidthHeightMasonryItem = container.find('.edgtf-size-big-square');

        defaultMasonryItem.css('height', size);
        largeHeightMasonryItem.css('height', Math.round(2*size));

        if(edgtf.windowWidth > 768){
            largeWidthHeightMasonryItem.css('height', Math.round(2*size));
            largeWidthMasonryItem.css('height', size);
        }else{
            largeWidthHeightMasonryItem.css('height', size);
            largeWidthMasonryItem.css('height', Math.round(size/2));
        }
    }

    /**
     * Initializes project presentation slider
     */

    function edgtProjectPresentationSlider() {

        var sliders = $('.edgtf-pp-gallery');

        if (sliders.length) {
            sliders.each(function () {
                var slider = $(this).children('.edgtf-pp-gallery-slider'),
                    animation = (slider.data('animation') == 'fade'),
                    navigation = false,
                    pagination = (slider.data('pagination') == 'yes'),
                    autoPlay = false,
                    autoplaySpeed = 1;
                if(slider.data('autoplay') != 'disable'){
                    autoPlay = true;
                    autoplaySpeed = slider.data('autoplay') * 1000;
                }

                slider.on('afterChange', function(slick){
                    $('.edgtf-project-presentation .slick-slider .slick-track').css('height', '100%');
                });

                slider.slick({
                    autoplay: autoPlay,
                    autoplaySpeed: autoplaySpeed,
                    arrows: navigation,
                    adaptiveHeight: true,
                    fade: true,
                    dots: pagination,
                    easing:'easeOutCubic',
                    dotsClass: 'edgtf-slick-dots',
                    prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_carrot-left"></span></span>',
                    nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_carrot-right"></span></span>',
                    customPaging: function(slider, i) {
                        return '<span class="edgtf-slick-dot-inner"></span>';
                    }
                });

            });
        }
    }

    /**
     * Initializes portfolio list
     */
    function edgtfInitPortfolio(){
        var portList = $('.edgtf-portfolio-list-holder-outer.edgtf-ptf-standard:not(.edgtf-portfolio-slider-holder), .edgtf-portfolio-list-holder-outer.edgtf-ptf-gallery:not(.edgtf-portfolio-slider-holder), .edgtf-portfolio-list-holder-outer.edgtf-ptf-gallery-with-space:not(.edgtf-portfolio-slider-holder)');
        if(portList.length){            
            portList.each(function(){
                var thisPortList = $(this);
                edgtfInitPortMixItUp(thisPortList);
                if(thisPortList.hasClass('edgtf-follow')){
                    thisPortList.find('article').each(function(){
                        $(this).hoverdir({
                        hoverElem:'div.edgtf-item-text-overlay',
                        speed: 330,
                        hoverDelay: 35,
                        easing: 'ease'
                        });
                    });
                }
            });
        }
    }
    /**
     * Initializes mixItUp function for specific container
     */
    function edgtfInitPortMixItUp(container){
        var filterClass = '';
        if(container.hasClass('edgtf-ptf-has-filter')){
            filterClass = container.find('.edgtf-portfolio-filter-holder-inner ul li').data('class');
            filterClass = '.'+filterClass;
        }
        
        var holderInner = container.find('.edgtf-portfolio-list-holder');
        holderInner.mixItUp({
            callbacks: {
                onMixLoad: function(){
                    holderInner.find('article').css('visibility','visible');
                    edgtf.modules.common.edgtfInitParallax();
                },
                onMixStart: function(){
                    holderInner.find('article').css('visibility','visible');
                },
                onMixBusy: function(){
                    holderInner.find('article').css('visibility','visible');
                } 
            },           
            selectors: {
                filter: filterClass
            },
            animation: {
                effects: 'fade',
                duration: 600
            }
            
        });
        
    }
     /*
    **	Init portfolio list masonry type
    */
    function edgtfInitPortfolioListMasonry(){
        var portList = $('.edgtf-portfolio-list-holder-outer.edgtf-ptf-masonry,.edgtf-portfolio-list-holder-outer.edgtf-ptf-masonry-with-space');
        if(portList.length) {
            portList.each(function() {
                var thisPortList = $(this).children('.edgtf-portfolio-list-holder');
                var size = thisPortList.find('.edgtf-portfolio-list-masonry-grid-sizer').width();
                edgtfResizeMasonry(size,thisPortList);
                
                edgtfInitMasonry(thisPortList);
                $(window).resize(function(){
                    edgtfResizeMasonry(size,thisPortList);
                    edgtfInitMasonry(thisPortList);
                });
            });
        }
    }
    
    function edgtfInitMasonry(container){
        container.waitForImages(function() {
            container.isotope({
                layoutMode: 'packery',
                itemSelector: '.edgtf-portfolio-item',
                packery: {
                    columnWidth: '.edgtf-portfolio-list-masonry-grid-sizer'
                }
            });
            container.addClass('edgtf-appeared');
            $(window).load(function(){
                ptfListAppear(container)
            });
        });
    }
    
    function edgtfResizeMasonry(size,container){
        
        var defaultMasonryItem = container.find('.edgtf-default-masonry-item');
        var largeWidthMasonryItem = container.find('.edgtf-large-width-masonry-item');
        var largeHeightMasonryItem = container.find('.edgtf-large-height-masonry-item');
        var largeWidthHeightMasonryItem = container.find('.edgtf-large-width-height-masonry-item');

        defaultMasonryItem.css('height', size);
        largeHeightMasonryItem.css('height', Math.round(2*size));

        if(edgtf.windowWidth > 600){
            largeWidthHeightMasonryItem.css('height', Math.round(2*size));
            largeWidthMasonryItem.css('height', size);
        }else{
            largeWidthHeightMasonryItem.css('height', size);
            largeWidthMasonryItem.css('height', Math.round(size/2));

        }
    }
    /**
     * Initializes portfolio pinterest 
     */
    function edgtfInitPortfolioListPinterest(){
        
        var portList = $('.edgtf-portfolio-list-holder-outer.edgtf-ptf-pinterest,.edgtf-portfolio-list-holder-outer.edgtf-ptf-pinterest-with-space');
        if(portList.length) {
            portList.each(function() {
                var thisPortList = $(this).children('.edgtf-portfolio-list-holder');
                edgtfInitPinterest(thisPortList);
                $(window).resize(function(){
                     edgtfInitPinterest(thisPortList);
                });
            });
            
        }
    }
    
    function edgtfInitPinterest(container){
        container.waitForImages(function() {
            container.isotope({
                itemSelector: '.edgtf-portfolio-item',
                masonry: {
                    columnWidth: '.edgtf-portfolio-list-masonry-grid-sizer',
                    gutter:'.edgtf-portfolio-list-masonry-grid-gutter'
                }
            });
        });
        container.addClass('edgtf-appeared');
        $(window).load(function(){
            ptfListAppear(container)
        });
    }

    /*
    * Appear FX
    */
    function ptfListAppear(container) {
        if (container.parent().hasClass('edgtf-appear-fade-scale')) {
            var articles = container.find('article'),
                animateCycle = 1 + Math.floor(Math.random() * 6),
                animateCycleCounter = 0;

            if (articles.length) {
                articles.each(function(){
                    var article = $(this);

                    setTimeout(function(){
                        article.appear(function(){
                            animateCycleCounter ++;

                            if(animateCycleCounter == animateCycle) {
                                animateCycleCounter = 0;
                            }

                            setTimeout(function(){
                                if (!article.hasClass('edgtf-appeared')) {
                                    article.addClass('edgtf-appeared');        
                                }
                            },animateCycleCounter * 280);
                        },{accX: 0, accY: 0});
                    },30);
                });
            }
        }
    }
    /**
     * Initializes portfolio masonry filter
     */
    function edgtfInitPortfolioMasonryFilter(){
        
        var filterHolder = $('.edgtf-portfolio-filter-holder.edgtf-masonry-filter');
        
        if(filterHolder.length){
            filterHolder.each(function(){
               
                var thisFilterHolder = $(this);
                
                var portfolioIsotopeAnimation = null;
                
                var filter = thisFilterHolder.find('ul li').data('class');
                
                thisFilterHolder.find('.filter:first').addClass('current');
                
                thisFilterHolder.find('.filter').on('click',function(){

                    var currentFilter = $(this);
                    clearTimeout(portfolioIsotopeAnimation);

                    $('.isotope, .isotope .isotope-item').css('transition-duration','0.8s');

                    portfolioIsotopeAnimation = setTimeout(function(){
                        $('.isotope, .isotope .isotope-item').css('transition-duration','0s'); 
                    },700);

                    var selector = $(this).attr('data-filter');
                    thisFilterHolder.siblings('.edgtf-portfolio-list-holder-outer').find('.edgtf-portfolio-list-holder').isotope({ filter: selector });

                    thisFilterHolder.find('.filter').removeClass('current');
                    currentFilter.addClass('current');

                    return false;

                });
                
            });
        }
    }
    /**
     * Initializes portfolio slider
     */
    
    function edgtfInitPortfolioSlider(){
        var portSlider = $('.edgtf-portfolio-list-holder-outer.edgtf-portfolio-slider-holder');
        if(portSlider.length){
            portSlider.each(function(){
                var thisPortSlider = $(this);
                var sliderWrapper = thisPortSlider.children('.edgtf-portfolio-list-holder');
                var numberOfItems = thisPortSlider.data('items');
                var navigation = false;
                
                //Responsive breakpoints
                var responsive = [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 600,
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
                    arrows: navigation,
                    dots: false,
                    dotsClass: 'edgtf-slick-dots',
                    speed: 600,
                    easing:'easeOutCubic',
                    slidesToShow:numberOfItems,
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
    /**
     * Initializes portfolio load more function
     */
    function edgtfInitPortfolioLoadMore(){
        var portList = $('.edgtf-portfolio-list-holder-outer.edgtf-ptf-load-more');
        if(portList.length){
            portList.each(function(){
                
                var thisPortList = $(this);
                var thisPortListInner = thisPortList.find('.edgtf-portfolio-list-holder');
                var nextPage; 
                var maxNumPages;
                var loadMoreButton = thisPortList.find('.edgtf-ptf-list-load-more a');
                var loadMoreSpinner = thisPortList.find('.edgtf-3d-cube-holder');
                
                if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {  
                    maxNumPages = thisPortList.data('max-num-pages');
                }
                
                loadMoreButton.on('click', function (e) {  
                    var loadMoreDatta = edgtfGetPortfolioAjaxData(thisPortList);
                    nextPage = loadMoreDatta.nextPage;
                    e.preventDefault();
                    e.stopPropagation(); 
                    loadMoreButton.hide();
                    loadMoreSpinner.fadeIn(500);
                    if(nextPage <= maxNumPages){
                        var ajaxData = edgtfSetPortfolioAjaxData(loadMoreDatta);
                        $.ajax({
                            type: 'POST',
                            data: ajaxData,
                            url: edgtCoreAjaxUrl,
                            success: function (data) {
                                nextPage++;
                                thisPortList.data('next-page', nextPage);
                                var response = $.parseJSON(data);
                                var responseHtml = edgtfConvertHTML(response.html); //convert response html into jQuery collection that Mixitup can work with
                                setTimeout(function() {
                                    if(thisPortList.hasClass('edgtf-ptf-masonry') || thisPortList.hasClass('edgtf-ptf-masonry-with-space') || thisPortList.hasClass('edgtf-ptf-pinterest') || thisPortList.hasClass('edgtf-ptf-pinterest-with-space')){
                                        thisPortList.waitForImages(function(){
                                            thisPortListInner.isotope().append( responseHtml ).isotope( 'appended', responseHtml ).isotope('reloadItems');
                                            ptfListAppear(thisPortListInner);
                                            loadMoreSpinner.fadeOut(100, function() {
                                                loadMoreButton.show()
                                            });
                                        });
                                    } else {
                                        thisPortList.waitForImages(function(){
                                            thisPortListInner.mixItUp('append',responseHtml);
                                            loadMoreSpinner.fadeOut(100, function() {
                                                loadMoreButton.show()
                                            });
                                        });
                                    }
                                    if(nextPage > maxNumPages){
                                        loadMoreButton.hide();
                                        loadMoreButton.closest('.edgtf-ptf-list-paging').hide();
                                        loadMoreSpinner.fadeOut(0);
                                    }
                                    if(thisPortList.hasClass('edgtf-follow')){
                                        thisPortList.find('article').each(function(){
                                            $(this).hoverdir({
                                                hoverElem:'div.edgtf-item-text-overlay'});
                                        });
                                    }
                                },400);                                    
                            }
                        });
                    }
                });
                
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
     * Initializes portfolio load more data params
     * @param portfolio list container with defined data params
     * return array
     */
    function edgtfGetPortfolioAjaxData(container){
        var returnValue = {};
        
        returnValue.type = '';
        returnValue.columns = '';
        returnValue.gridSize = '';
        returnValue.orderBy = '';
        returnValue.order = '';
        returnValue.number = '';
        returnValue.imageSize = '';
        returnValue.filter = '';
        returnValue.filterOrderBy = '';
        returnValue.category = '';
        returnValue.selectedProjectes = '';
        returnValue.showLoadMore = '';
        returnValue.titleTag = '';
        returnValue.nextPage = '';
        returnValue.maxNumPages = '';
        
        if (typeof container.data('type') !== 'undefined' && container.data('type') !== false) {
            returnValue.type = container.data('type');
        }
        if (typeof container.data('grid-size') !== 'undefined' && container.data('grid-size') !== false) {                    
            returnValue.gridSize = container.data('grid-size');
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
        if (typeof container.data('number') !== 'undefined' && container.data('number') !== false) {                    
            returnValue.number = container.data('number');
        }
        if (typeof container.data('image-size') !== 'undefined' && container.data('image-size') !== false) {                    
            returnValue.imageSize = container.data('image-size');
        }
        if (typeof container.data('filter') !== 'undefined' && container.data('filter') !== false) {                    
            returnValue.filter = container.data('filter');
        }
        if (typeof container.data('filter-order-by') !== 'undefined' && container.data('filter-order-by') !== false) {                    
            returnValue.filterOrderBy = container.data('filter-order-by');
        }
        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {                    
            returnValue.category = container.data('category');
        }
        if (typeof container.data('selected-projects') !== 'undefined' && container.data('selected-projects') !== false) {                    
            returnValue.selectedProjectes = container.data('selected-projects');
        }
        if (typeof container.data('show-load-more') !== 'undefined' && container.data('show-load-more') !== false) {                    
            returnValue.showLoadMore = container.data('show-load-more');
        }
        if (typeof container.data('title-tag') !== 'undefined' && container.data('title-tag') !== false) {                    
            returnValue.titleTag = container.data('title-tag');
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
     * Sets portfolio load more data params for ajax function
     * @param portfolio list container with defined data params
     * return array
     */
    function edgtfSetPortfolioAjaxData(container){
        var returnValue = {
            action: 'edgt_core_portfolio_ajax_load_more',
            type: container.type,
            columns: container.columns,
            gridSize: container.gridSize,
            orderBy: container.orderBy,
            order: container.order,
            number: container.number,
            imageSize: container.imageSize,
            filter: container.filter,
            filterOrderBy: container.filterOrderBy,
            category: container.category,
            selectedProjectes: container.selectedProjectes,
            showLoadMore: container.showLoadMore,
            titleTag: container.titleTag,
            nextPage: container.nextPage
        };
        return returnValue;
    }

    /**
     * Slider object that initializes whole slider functionality
     * @type {Function}
     */
    var edgtfSlider = edgtf.modules.shortcodes.edgtfSlider = function() {

	    //all sliders on the page
	    var sliders = $('.edgtf-slider .carousel');
	    //image regex used to extract img source
	    var imageRegex = /url\(["']?([^'")]+)['"]?\)/;

	    /*** Functionality for translating image in slide - START ***/

	    var matrixArray = { zoom_center : '1.2, 0, 0, 1.2, 0, 0', zoom_top_left: '1.2, 0, 0, 1.2, -150, -150', zoom_top_right : '1.2, 0, 0, 1.2, 150, -150', zoom_bottom_left: '1.2, 0, 0, 1.2, -150, 150', zoom_bottom_right: '1.2, 0, 0, 1.2, 150, 150'};

	    // regular expression for parsing out the matrix components from the matrix string
	    var matrixRE = /\([0-9epx\.\, \t\-]+/gi;

	    // parses a matrix string of the form "matrix(n1,n2,n3,n4,n5,n6)" and
	    // returns an array with the matrix components
	    var parseMatrix = function (val) {
		    return val.match(matrixRE)[0].substr(1).
		    split(",").map(function (s) {
			    return parseFloat(s);
		    });
	    };

	    // transform css property names with vendor prefixes;
	    // the plugin will check for values in the order the names are listed here and return as soon as there
	    // is a value; so listing the W3 std name for the transform results in that being used if its available
	    var transformPropNames = [
		    "transform",
		    "-webkit-transform"
	    ];

	    var getTransformMatrix = function (el) {
		    // iterate through the css3 identifiers till we hit one that yields a value
		    var matrix = null;
		    transformPropNames.some(function (prop) {
			    matrix = el.css(prop);
			    return (matrix !== null && matrix !== "");
		    });

		    // if "none" then we supplant it with an identity matrix so that our parsing code below doesn't break
		    matrix = (!matrix || matrix === "none") ?
			    "matrix(1,0,0,1,0,0)" : matrix;
		    return parseMatrix(matrix);
	    };

	    // set the given matrix transform on the element; note that we apply the css transforms in reverse order of how its given
	    // in "transformPropName" to ensure that the std compliant prop name shows up last
	    var setTransformMatrix = function (el, matrix) {
		    var m = "matrix(" + matrix.join(",") + ")";
		    for (var i = transformPropNames.length - 1; i >= 0; --i) {
			    el.css(transformPropNames[i], m + ' rotate(0.01deg)');
		    }
	    };

	    // interpolates a value between a range given a percent
	    var interpolate = function (from, to, percent) {
		    return from + ((to - from) * (percent / 100));
	    };

	    $.fn.transformAnimate = function (opt) {
		    // extend the options passed in by caller
		    var options = {
			    transform: "matrix(1,0,0,1,0,0)"
		    };
		    $.extend(options, opt);

		    // initialize our custom property on the element to track animation progress
		    this.css("percentAnim", 0);

		    // supplant "options.step" if it exists with our own routine
		    var sourceTransform = getTransformMatrix(this);
		    var targetTransform = parseMatrix(options.transform);
		    options.step = function (percentAnim, fx) {
			    // compute the interpolated transform matrix for the current animation progress
			    var $this = $(this);
			    var matrix = sourceTransform.map(function (c, i) {
				    return interpolate(c, targetTransform[i],
					    percentAnim);
			    });

			    // apply the new matrix
			    setTransformMatrix($this, matrix);

			    // invoke caller's version of "step" if one was supplied;
			    if (opt.step) {
				    opt.step.apply(this, [matrix, fx]);
			    }
		    };

		    // animate!
		    return this.stop().animate({ percentAnim: 100 }, options);
	    };

	    /*** Functionality for translating image in slide - END ***/


	    /**
	     * Calculate heights for slider holder and slide item, depending on window width, but only if slider is set to be responsive
	     * @param slider, current slider
	     * @param defaultHeight, default height of slider, set in shortcode
	     * @param responsive_breakpoint_set, breakpoints set for slider responsiveness
	     * @param reset, boolean for reseting heights
	     */
	    var setSliderHeight = function(slider, defaultHeight, responsive_breakpoint_set, reset) {
		    var sliderHeight = defaultHeight;
		    if(!reset) {
			    if(edgtf.windowWidth > responsive_breakpoint_set[0]) {
				    sliderHeight = defaultHeight;
			    } else if(edgtf.windowWidth > responsive_breakpoint_set[1]) {
				    sliderHeight = defaultHeight * 0.75;
			    } else if(edgtf.windowWidth > responsive_breakpoint_set[2]) {
				    sliderHeight = defaultHeight * 0.6;
			    } else if(edgtf.windowWidth > responsive_breakpoint_set[3]) {
				    sliderHeight = defaultHeight * 0.55;
			    } else if(edgtf.windowWidth <= responsive_breakpoint_set[3]) {
				    sliderHeight = defaultHeight * 0.45;
			    }
		    }

		    slider.css({'height': (sliderHeight) + 'px'});
		    slider.find('.edgtf-slider-preloader').css({'height': (sliderHeight) + 'px'});
		    slider.find('.edgtf-slider-preloader .edgtf-ajax-loader').css({'display': 'block'});
		    slider.find('.item').css({'height': (sliderHeight) + 'px'});
		    if(edgtfPerPageVars.vars.edgtfStickyScrollAmount === 0) {
			    edgtf.modules.header.stickyAppearAmount = sliderHeight; //set sticky header appear amount if slider there is no amount entered on page itself
		    }
	    };

	    /**
	     * Calculate heights for slider holder and slide item, depending on window size, but only if slider is set to be full height
	     * @param slider, current slider
	     */
	    var setSliderFullHeight = function(slider) {
		    var mobileHeaderHeight = edgtf.windowWidth < 1025 ? edgtfGlobalVars.vars.edgtfMobileHeaderHeight + $('.edgtf-top-bar').height() : 0;
		    slider.css({'height': (edgtf.windowHeight - mobileHeaderHeight) + 'px'});
		    slider.find('.edgtf-slider-preloader').css({'height': (edgtf.windowHeight - mobileHeaderHeight) + 'px'});
		    slider.find('.edgt-slider-preloader .edgtf-ajax-loader').css({'display': 'block'});
		    slider.find('.item').css({'height': (edgtf.windowHeight - mobileHeaderHeight) + 'px'});
		    if(edgtfPerPageVars.vars.edgtfStickyScrollAmount === 0) {
			    edgtf.modules.header.stickyAppearAmount = edgtf.windowHeight; //set sticky header appear amount if slider there is no amount entered on page itself
		    }
	    };

	    var setElementsResponsiveness = function(slider) {
		    // Basic text styles responsiveness
		    slider
			    .find('.edgtf-slide-element-text-small, .edgtf-slide-element-text-normal, .edgtf-slide-element-text-large, .edgtf-slide-element-text-extra-large')
			    .each(function() {
				    var element = $(this);
				    if (typeof element.data('default-font-size') === 'undefined') { element.data('default-font-size', parseInt(element.css('font-size'),10)); }
				    if (typeof element.data('default-line-height') === 'undefined') { element.data('default-line-height', parseInt(element.css('line-height'),10)); }
				    if (typeof element.data('default-letter-spacing') === 'undefined') { element.data('default-letter-spacing', parseInt(element.css('letter-spacing'),10)); }
			    });
		    // Advanced text styles responsiveness
		    slider.find('.edgtf-slide-element-responsive-text').each(function() {
			    if (typeof $(this).data('default-font-size') === 'undefined') { $(this).data('default-font-size', parseInt($(this).css('font-size'),10)); }
			    if (typeof $(this).data('default-line-height') === 'undefined') { $(this).data('default-line-height', parseInt($(this).css('line-height'),10)); }
			    if (typeof $(this).data('default-letter-spacing') === 'undefined') { $(this).data('default-letter-spacing', parseInt($(this).css('letter-spacing'),10)); }
		    });
		    // Button responsiveness
		    slider.find('.edgtf-slide-element-responsive-button').each(function() {
			    if (typeof $(this).data('default-font-size') === 'undefined') { $(this).data('default-font-size', parseInt($(this).find('a').css('font-size'),10)); }
			    if (typeof $(this).data('default-line-height') === 'undefined') { $(this).data('default-line-height', parseInt($(this).find('a').css('line-height'),10)); }
			    if (typeof $(this).data('default-letter-spacing') === 'undefined') { $(this).data('default-letter-spacing', parseInt($(this).find('a').css('letter-spacing'),10)); }
			    if (typeof $(this).data('default-ver-padding') === 'undefined') { $(this).data('default-ver-padding', parseInt($(this).find('a').css('padding-top'),10)); }
			    if (typeof $(this).data('default-hor-padding') === 'undefined') { $(this).data('default-hor-padding', parseInt($(this).find('a').css('padding-left'),10)); }
		    });
		    // Margins for non-custom layouts
		    slider.find('.edgtf-slide-element').each(function() {
			    var element = $(this);
			    if (typeof element.data('default-margin-top') === 'undefined') { element.data('default-margin-top', parseInt(element.css('margin-top'),10)); }
			    if (typeof element.data('default-margin-bottom') === 'undefined') { element.data('default-margin-bottom', parseInt(element.css('margin-bottom'),10)); }
			    if (typeof element.data('default-margin-left') === 'undefined') { element.data('default-margin-left', parseInt(element.css('margin-left'),10)); }
			    if (typeof element.data('default-margin-right') === 'undefined') { element.data('default-margin-right', parseInt(element.css('margin-right'),10)); }
		    });
		    adjustElementsSizes(slider);
	    };

	    var adjustElementsSizes = function(slider) {
		    var boundaries = {
			    // These values must match those in map.php (for slider), slider.php and edgt.layout.inc
			    mobile: 600,
			    tabletp: 800,
			    tabletl: 1024,
			    laptop: 1440
		    };
		    slider.find('.edgtf-slider-elements-container').each(function() {
			    var container = $(this);
			    var target = container.filter('.edgtf-custom-elements').add(container.not('.edgtf-custom-elements').find('.edgtf-slider-elements-holder-frame')).not('.edgtf-grid');
			    if (target.length) {
				    if (boundaries.mobile >= edgtf.windowWidth && container.attr('data-width-mobile').length) {
					    target.css('width', container.data('width-mobile') + '%');
				    }
				    else if (boundaries.tabletp >= edgtf.windowWidth && container.attr('data-width-tablet-p').length) {
					    target.css('width', container.data('width-tablet-p') + '%');
				    }
				    else if (boundaries.tabletl >= edgtf.windowWidth && container.attr('data-width-tablet-l').length) {
					    target.css('width', container.data('width-tablet-l') + '%');
				    }
				    else if (boundaries.laptop >= edgtf.windowWidth && container.attr('data-width-laptop').length) {
					    target.css('width', container.data('width-laptop') + '%');
				    }
				    else if (container.attr('data-width-desktop').length){
					    target.css('width', container.data('width-desktop') + '%');
				    }
			    }
		    });
		    slider.find('.item').each(function() {
			    var slide = $(this);
			    var def_w = slide.find('.edgtf-slider-elements-holder-frame').data('default-width');
			    var elements = slide.find('.edgtf-slide-element');

			    // Adjusting margins for all elements
			    elements.each(function() {
				    var element = $(this);
				    var def_m_top = element.data('default-margin-top'),
					    def_m_bot = element.data('default-margin-bottom'),
					    def_m_l = element.data('default-margin-left'),
					    def_m_r = element.data('default-margin-right');
				    var scale_data = (typeof element.data('resp-scale') !== 'undefined') ? element.data('resp-scale') : undefined;
				    var factor;

				    if (boundaries.mobile >= edgtf.windowWidth) {
					    factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.mobile);
				    }
				    else if (boundaries.tabletp >= edgtf.windowWidth) {
					    factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.tabletp);
				    }
				    else if (boundaries.tabletl >= edgtf.windowWidth) {
					    factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.tabletl);
				    }
				    else if (boundaries.laptop >= edgtf.windowWidth) {
					    factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.laptop);
				    }
				    else {
					    factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.desktop);
				    }

				    element.css({
					    'margin-top': Math.round(factor * def_m_top )+ 'px',
					    'margin-bottom': Math.round(factor * def_m_bot )+ 'px',
					    'margin-left': Math.round(factor * def_m_l )+ 'px',
					    'margin-right': Math.round(factor * def_m_r) + 'px'
				    });
			    });

			    // Adjusting responsiveness
			    elements
				    .filter('.edgtf-slide-element-responsive-text, .edgtf-slide-element-responsive-button, .edgtf-slide-element-responsive-image')
				    .add(elements.find('a.edgtf-slide-element-responsive-text, span.edgtf-slide-element-responsive-text'))
				    .each(function() {
					    var element = $(this);
					    var scale_data = (typeof element.data('resp-scale') !== 'undefined') ? element.data('resp-scale') : undefined,
						    left_data = (typeof element.data('resp-left') !== 'undefined') ? element.data('resp-left') : undefined,
						    top_data = (typeof element.data('resp-top') !== 'undefined') ? element.data('resp-top') : undefined;
					    var factor, new_left, new_top;

					    if (boundaries.mobile >= edgtf.windowWidth) {
						    factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.mobile);
						    new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.mobile != '' ? left_data.mobile+'%' : element.data('left')+'%');
						    new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.mobile != '' ? top_data.mobile+'%' : element.data('top')+'%');
					    }
					    else if (boundaries.tabletp >= edgtf.windowWidth) {
						    factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.tabletp);
						    new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.tabletp != '' ? left_data.tabletp+'%' : element.data('left')+'%');
						    new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.tabletp != '' ? top_data.tabletp+'%' : element.data('top')+'%');
					    }
					    else if (boundaries.tabletl >= edgtf.windowWidth) {
						    factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.tabletl);
						    new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.tabletl != '' ? left_data.tabletl+'%' : element.data('left')+'%');
						    new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.tabletl != '' ? top_data.tabletl+'%' : element.data('top')+'%');
					    }
					    else if (boundaries.laptop >= edgtf.windowWidth) {
						    factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.laptop);
						    new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.laptop != '' ? left_data.laptop+'%' : element.data('left')+'%');
						    new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.laptop != '' ? top_data.laptop+'%' : element.data('top')+'%');
					    }
					    else {
						    factor = (typeof scale_data === 'undefined') ? edgtf.windowWidth / def_w : parseFloat(scale_data.desktop);
						    new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left')+'%' : '') : (left_data.desktop != '' ? left_data.desktop+'%' : element.data('left')+'%');
						    new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top')+'%' : '') : (top_data.desktop != '' ? top_data.desktop+'%' : element.data('top')+'%');
					    }

					    if (!factor) {
						    element.hide();
					    }
					    else {
						    element.show();
						    var def_font_size,
							    def_line_h,
							    def_let_spac,
							    def_ver_pad,
							    def_hor_pad;

						    if (element.is('.edgtf-slide-element-responsive-button')) {
							    def_font_size = element.data('default-font-size');
							    def_line_h = element.data('default-line-height');
							    def_let_spac = element.data('default-letter-spacing');
							    def_ver_pad = element.data('default-ver-padding');
							    def_hor_pad = element.data('default-hor-padding');

							    element.css({
									    'left': new_left,
									    'top': new_top
								    })
								    .find('.edgtf-btn').css({
								    'font-size': Math.round(factor * def_font_size) + 'px',
								    'line-height': Math.round(factor * def_line_h) + 'px',
								    'letter-spacing': Math.round(factor * def_let_spac) + 'px',
								    'padding-left': Math.round(factor * def_hor_pad) + 'px',
								    'padding-right': Math.round(factor * def_hor_pad) + 'px',
								    'padding-top': Math.round(factor * def_ver_pad) + 'px',
								    'padding-bottom': Math.round(factor * def_ver_pad) + 'px'
							    });
						    }
						    else if (element.is('.edgtf-slide-element-responsive-image')) {
							    if (factor != edgtf.windowWidth / def_w) { // if custom factor has been set for this screen width
								    var up_w = element.data('upload-width'),
									    up_h = element.data('upload-height');

								    element.filter('.custom-image').css({
										    'left': new_left,
										    'top': new_top
									    })
									    .add(element.not('.custom-image').find('img'))
									    .css({
										    'width': Math.round(factor * up_w) + 'px',
										    'height': Math.round(factor * up_h) + 'px'
									    });
							    }
							    else {
								    var w = element.data('width');

								    element.filter('.custom-image').css({
										    'left': new_left,
										    'top': new_top
									    })
									    .add(element.not('.custom-image').find('img'))
									    .css({
										    'width': w + '%',
										    'height': ''
									    });
							    }
						    }
						    else {
							    def_font_size = element.data('default-font-size');
							    def_line_h = element.data('default-line-height');
							    def_let_spac = element.data('default-letter-spacing');

							    element.css({
								    'left': new_left,
								    'top': new_top,
								    'font-size': Math.round(factor * def_font_size) + 'px',
								    'line-height': Math.round(factor * def_line_h) + 'px',
								    'letter-spacing': Math.round(factor * def_let_spac) + 'px'
							    });
						    }
					    }
				    });
		    });
		    var nav = slider.find('.carousel-indicators');
		    slider.find('.edgtf-slide-element-section-link').css('bottom', nav.length ? parseInt(nav.css('bottom'),10) + nav.outerHeight() + 10 + 'px' : '20px');
	    };

	    var checkButtonsAlignment = function(slider) {
		    slider.find('.item').each(function() {
			    var inline_buttons = $(this).find('.edgtf-slide-element-button-inline');
			    inline_buttons.css('display', 'inline-block').wrapAll('<div class="edgtf-slide-elements-buttons-wrapper" style="text-align: ' + inline_buttons.eq(0).css('text-align') + ';"/>');
		    });
	    };

	    /**
	     * Set heights for slider and elemnts depending on slider settings (full height, responsive height od set height)
	     * @param slider, current slider
	     */
	    var setHeights =  function(slider) {

		    var responsiveBreakpointSet = [1600,1200,900,650,500,320];

		    setElementsResponsiveness(slider);

		    if(slider.hasClass('edgtf-full-screen')){

			    setSliderFullHeight(slider);

			    $(window).resize(function() {
				    setSliderFullHeight(slider);
				    adjustElementsSizes(slider);
			    });

		    }else if(slider.hasClass('edgtf-responsive-height')){

			    var defaultHeight = slider.data('height');
			    setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);

			    $(window).resize(function() {
				    setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
				    adjustElementsSizes(slider);
			    });

		    }else {
			    var defaultHeight = slider.data('height');

			    slider.find('.edgtf-slider-preloader').css({'height': (slider.height()) + 'px'});
			    slider.find('.edgtf-slider-preloader .edgtf-ajax-loader').css({'display': 'block'});

			    edgtf.windowWidth < 1025 ? setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false) : setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);

			    $(window).resize(function() {
				    if(edgtf.windowWidth < 1025){
					    setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
				    }else{
					    setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);
				    }
				    adjustElementsSizes(slider);
			    });
		    }
	    };

	    /**
	     * Set prev/next numbers on navigation arrows
	     * @param slider, current slider
	     * @param currentItem, current slide item index
	     * @param totalItemCount, total number of slide items
	     */
	    var setPrevNextNumbers = function(slider, currentItem, totalItemCount) {
		    if(currentItem == 1){
			    slider.find('.left.carousel-control .prev').html(totalItemCount);
			    slider.find('.right.carousel-control .next').html(currentItem + 1);
		    }else if(currentItem == totalItemCount){
			    slider.find('.left.carousel-control .prev').html(currentItem - 1);
			    slider.find('.right.carousel-control .next').html(1);
		    }else{
			    slider.find('.left.carousel-control .prev').html(currentItem - 1);
			    slider.find('.right.carousel-control .next').html(currentItem + 1);
		    }
	    };

	    /**
	     * Set video background size
	     * @param slider, current slider
	     */
	    var initVideoBackgroundSize = function(slider){
		    var min_w = 1500; // minimum video width allowed
		    var video_width_original = 1920;  // original video dimensions
		    var video_height_original = 1080;
		    var vid_ratio = 1920/1080;

		    slider.find('.item .edgtf-video .edgtf-video-wrap').each(function(){

			    var slideWidth = edgtf.windowWidth;
			    var slideHeight = $(this).closest('.carousel').height();

			    $(this).width(slideWidth);

			    min_w = vid_ratio * (slideHeight+20);
			    $(this).height(slideHeight);

			    var scale_h = slideWidth / video_width_original;
			    var scale_v = (slideHeight - edgtfGlobalVars.vars.edgtfMenuAreaHeight) / video_height_original;
			    var scale =  scale_v;
			    if (scale_h > scale_v)
				    scale =  scale_h;
			    if (scale * video_width_original < min_w) {scale = min_w / video_width_original;}

			    $(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original +2));
			    $(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original +2));
			    $(this).scrollLeft(($(this).find('video').width() - slideWidth) / 2);
			    $(this).find('.mejs-overlay, .mejs-poster').scrollTop(($(this).find('video').height() - slideHeight) / 2);
			    $(this).scrollTop(($(this).find('video').height() - slideHeight) / 2);
		    });
	    };

	    /**
	     * Init video background
	     * @param slider, current slider
	     */
	    var initVideoBackground = function(slider) {
		    $('.item .edgtf-video-wrap .edgtf-video-element').mediaelementplayer({
			    enableKeyboard: false,
			    iPadUseNativeControls: false,
			    pauseOtherPlayers: false,
			    // force iPhone's native controls
			    iPhoneUseNativeControls: false,
			    // force Android's native controls
			    AndroidUseNativeControls: false
		    });

		    initVideoBackgroundSize(slider);
		    $(window).resize(function() {
			    initVideoBackgroundSize(slider);
		    });

		    //mobile check
		    if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
			    $('.edgtf-slider .edgtf-mobile-video-image').show();
			    $('.edgtf-slider .edgtf-video-wrap').remove();
		    }
	    };

	    var initPeek = function(slider) {
		    if (slider.hasClass('edgtf-slide-peek')) {

			    var navArrowHover = function(arrow, entered) {
				    var dir = arrow.is('.left') ? 'left' : 'right';
				    var targ_peeker = peekers.filter('.'+dir);
				    if (entered) {
					    arrow.addClass('hovered');
					    var targ_item = (items.index(items.filter('.active')) + (dir=='left' ? -1 : 1) + items.length) % items.length;
					    targ_peeker.find('.edgtf-slider-peeker-inner').css({
						    'background-image': items.eq(targ_item).find('.edgtf-image, .edgtf-mobile-video-image').css('background-image'),
						    'width': itemWidth + 'px'
					    });
					    targ_peeker.addClass('shown');
				    }
				    else {
					    arrow.removeClass('hovered');
					    peekers.removeClass('shown');
				    }
			    };

			    var navBulletHover = function(bullet, entered) {
				    if (entered) {
					    bullet.addClass('hovered');

					    var targ_item = bullet.data('slide-to');
					    var cur_item = items.index(items.filter('.active'));
					    if (cur_item != targ_item) {
						    var dir = (targ_item < cur_item) ? 'left' : 'right';
						    var targ_peeker = peekers.filter('.'+dir);
						    targ_peeker.find('.edgtf-slider-peeker-inner').css({
							    'background-image': items.eq(targ_item).find('.edgtf-image, .edgtf-mobile-video-image').css('background-image'),
							    'width': itemWidth + 'px'
						    });
						    targ_peeker.addClass('shown');
					    }
				    }
				    else {
					    bullet.removeClass('hovered');
					    peekers.removeClass('shown');
				    }
			    };

			    var handleResize = function() {
				    itemWidth = items.filter('.active').width();
				    itemWidth += (itemWidth % 2) ? 1 : 0; // To make it even
				    items.children('.edgtf-image, .edgtf-video').css({
					    'position': 'absolute',
					    'width': itemWidth + 'px',
					    'height': '110%',
					    'left': '50%',
					    'transform': 'translateX(-50%)'
				    });
			    };

			    var items = slider.find('.item');
			    var itemWidth;
			    handleResize();
			    $(window).resize(handleResize);

			    slider.find('.carousel-inner').append('<div class="edgtf-slider-peeker left"><div class="edgtf-slider-peeker-inner"></div></div><div class="edgtf-slider-peeker right"><div class="edgtf-slider-peeker-inner"></div></div>');
			    var peekers = slider.find('.edgtf-slider-peeker');
			    var nav_arrows = slider.find('.carousel-control');
			    var nav_bullets = slider.find('.carousel-indicators > li');

				nav_arrows.on('mouseenter', function () {
					navArrowHover($(this), true);
				});
                nav_arrows.on('mouseleave', function () {
                    navArrowHover($(this), false);
                });

				nav_bullets.on('mouseenter', function () {
					navBulletHover($(this), true);
				});
				nav_bullets.on('mouseleave', function () {
					navBulletHover($(this), false);
				});

			    slider.on('slide.bs.carousel', function() {
				    setTimeout(function() {
					    peekers.addClass('edgtf-slide-peek-in-progress').removeClass('shown');
				    }, 500);
			    });

			    slider.on('slid.bs.carousel', function() {
				    nav_arrows.filter('.hovered').each(function() {
					    navArrowHover($(this), true);
				    });
				    setTimeout(function() {
					    nav_bullets.filter('.hovered').each(function() {
						    navBulletHover($(this), true);
					    });
				    }, 200);
				    peekers.removeClass('edgtf-slide-peek-in-progress');
			    });
		    }
	    };

	    var updateNavigationThumbs = function(slider) {
		    if (slider.hasClass('edgtf-slider-thumbs')) {
			    var src, prev_image, next_image;
			    var all_items_count = slider.find('.item').length;
			    var curr_item = slider.find('.item').index($('.item.active')[0]) + 1;
			    setPrevNextNumbers(slider, curr_item, all_items_count);

			    // prev thumb
			    if(slider.find('.item.active').prev('.item').length){
				    if(slider.find('.item.active').prev('div').find('.edgtf-image').length){
					    src = imageRegex.exec(slider.find('.active').prev('div').find('.edgtf-image').attr('style'));
					    prev_image = new Image();
					    prev_image.src = src[1];
					    //prev_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
				    }else{
					    prev_image = slider.find('.active').prev('div').find('> .edgtf-video').clone();
					    prev_image.find('.edgtf-video-overlay, .mejs-offscreen').remove();
					    prev_image.find('.edgtf-video-wrap').width(150).height(84);
					    prev_image.find('.mejs-container').width(150).height(84);
					    prev_image.find('video').width(150).height(84);
				    }
				    slider.find('.left.carousel-control .img .old').fadeOut(300,function(){
					    $(this).remove();
				    });
				    slider.find('.left.carousel-control .img').append(prev_image).find('div.thumb-image, > img, div.edgtf-video').fadeIn(300).addClass('old');

			    }else{
				    if(slider.find('.carousel-inner .item:last-child .edgtf-image').length){
					    src = imageRegex.exec(slider.find('.carousel-inner .item:last-child .edgtf-image').attr('style'));
					    prev_image = new Image();
					    prev_image.src = src[1];
					    //prev_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
				    }else{
					    prev_image = slider.find('.carousel-inner .item:last-child > .edgtf-video').clone();
					    prev_image.find('.edgtf-video-overlay, .mejs-offscreen').remove();
					    prev_image.find('.edgtf-video-wrap').width(150).height(84);
					    prev_image.find('.mejs-container').width(150).height(84);
					    prev_image.find('video').width(150).height(84);
				    }
				    slider.find('.left.carousel-control .img .old').fadeOut(300,function(){
					    $(this).remove();
				    });
				    slider.find('.left.carousel-control .img').append(prev_image).find('div.thumb-image, > img, div.edgtf-video').fadeIn(300).addClass('old');
			    }

			    // next thumb
			    if(slider.find('.active').next('div.item').length){
				    if(slider.find('.active').next('div').find('.edgtf-image').length){
					    src = imageRegex.exec(slider.find('.active').next('div').find('.edgtf-image').attr('style'));
					    next_image = new Image();
					    next_image.src = src[1];
					    //next_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
				    }else{
					    next_image = slider.find('.active').next('div').find('> .edgtf-video').clone();
					    next_image.find('.edgtf-video-overlay, .mejs-offscreen').remove();
					    next_image.find('.edgtf-video-wrap').width(150).height(84);
					    next_image.find('.mejs-container').width(150).height(84);
					    next_image.find('video').width(150).height(84);
				    }

				    slider.find('.right.carousel-control .img .old').fadeOut(300,function(){
					    $(this).remove();
				    });
				    slider.find('.right.carousel-control .img').append(next_image).find('div.thumb-image, > img, div.edgtf-video').fadeIn(300).addClass('old');

			    }else{
				    if(slider.find('.carousel-inner .item:first-child .edgtf-image').length){
					    src = imageRegex.exec(slider.find('.carousel-inner .item:first-child .edgtf-image').attr('style'));
					    next_image = new Image();
					    next_image.src = src[1];
					    //next_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
				    }else{
					    next_image = slider.find('.carousel-inner .item:first-child > .edgtf-video').clone();
					    next_image.find('.edgtf-video-overlay, .mejs-offscreen').remove();
					    next_image.find('.edgtf-video-wrap').width(150).height(84);
					    next_image.find('.mejs-container').width(150).height(84);
					    next_image.find('video').width(150).height(84);
				    }
				    slider.find('.right.carousel-control .img .old').fadeOut(300,function(){
					    $(this).remove();
				    });
				    slider.find('.right.carousel-control .img').append(next_image).find('div.thumb-image, > img, div.edgtf-video').fadeIn(300).addClass('old');
			    }
		    }
	    };

	    /**
	     * initiate slider
	     * @param slider, current slider
	     * @param currentItem, current slide item index
	     * @param totalItemCount, total number of slide items
	     * @param slideAnimationTimeout, timeout for slide change
	     */
	    var initiateSlider = function(slider, totalItemCount, slideAnimationTimeout) {

		    //set active class on first item
		    slider.find('.carousel-inner .item:first-child').addClass('active');
		    //check for header style
		    edgtfCheckSliderForHeaderStyle($('.carousel .active'), slider.hasClass('edgtf-header-effect'));
		    // setting numbers on carousel controls
		    if(slider.hasClass('edgtf-slider-numbers')) {
			    setPrevNextNumbers(slider, 1, totalItemCount);
		    }
		    // set video background if there is video slide
		    if(slider.find('.item video').length){
			    //initVideoBackgroundSize(slider);
			    initVideoBackground(slider);
		    }

		    // update thumbs
		    updateNavigationThumbs(slider);

		    // initiate peek
		    initPeek(slider);

		    // enable link hover color for slide elements with links
		    slider.find('.edgtf-slide-element-wrapper-link')
			    .mouseenter(function() {
				    $(this).removeClass('inheriting');
			    })
			    .mouseleave(function() {
				    $(this).addClass('inheriting');
			    })
		    ;

		    //init slider
		    if(slider.hasClass('edgtf-auto-start')){
			    slider.carousel({
				    interval: slideAnimationTimeout,
				    pause: false
			    });

			    //pause slider when hover slider button
			    slider.find('.slide_buttons_holder .qbutton')
				    .mouseenter(function() {
					    slider.carousel('pause');
				    })
				    .mouseleave(function() {
					    slider.carousel('cycle');
				    });
		    } else {
			    slider.carousel({
				    interval: 0,
				    pause: false
			    });
		    }

		    $(window).scroll(function() {
			    if(slider.hasClass('edgtf-full-screen') && edgtf.scroll > edgtf.windowHeight && edgtf.windowWidth > 1024){
				    slider.carousel('pause');
			    }else if(!slider.hasClass('edgtf-full-screen') && edgtf.scroll > slider.height() && edgtf.windowWidth > 1024){
				    slider.carousel('pause');
			    }else{
				    slider.carousel('cycle');
			    }
		    });


		    //initiate image animation
		    if($('.carousel-inner .item:first-child').hasClass('edgtf-animate-image') && edgtf.windowWidth > 1024){
			    slider.find('.carousel-inner .item.edgtf-animate-image:first-child .edgtf-image').transformAnimate({
				    transform: "matrix("+matrixArray[$('.carousel-inner .item:first-child').data('edgtf_animate_image')]+")",
				    duration: 30000
			    });
		    }
	    };

	    return {
		    init: function() {
			    if(sliders.length) {
				    sliders.each(function() {
					    var $this = $(this);
					    var slideAnimationTimeout = $this.data('slide_animation_timeout');
					    var totalItemCount = $this.find('.item').length;

					    checkButtonsAlignment($this);

					    setHeights($this);

					    /*** wait until first video or image is loaded and than initiate slider - start ***/
					    if(edgtf.htmlEl.hasClass('touch')){
						    if($this.find('.item:first-child .edgtf-mobile-video-image').length > 0){
							    var src = imageRegex.exec($this.find('.item:first-child .edgtf-mobile-video-image').attr('style'));
						    }else{
							    var src = imageRegex.exec($this.find('.item:first-child .edgtf-image').attr('style'));
						    }
						    if(src) {
							    var backImg = new Image();
							    backImg.src = src[1];
							    $(backImg).load(function(){
								    $('.edgtf-slider-preloader').fadeOut(500);
								    initiateSlider($this,totalItemCount,slideAnimationTimeout);
							    });
						    }
					    } else {
						    if($this.find('.item:first-child video').length > 0){
							    $this.find('.item:first-child video').eq(0).one('loadeddata',function(){
								    $('.edgtf-slider-preloader').fadeOut(500);
								    initiateSlider($this,totalItemCount,slideAnimationTimeout);
							    });
						    }else{
							    var src = imageRegex.exec($this.find('.item:first-child .edgtf-image').attr('style'));
							    if (src) {
								    var backImg = new Image();
								    backImg.src = src[1];
								    $(backImg).load(function(){
									    $('.edgtf-slider-preloader').fadeOut(500);
									    initiateSlider($this,totalItemCount,slideAnimationTimeout);
								    });
							    }
						    }
					    }
					    /*** wait until first video or image is loaded and than initiate slider - end ***/

					    /* before slide transition - start */
					    $this.on('slide.bs.carousel', function () {
						    $this.addClass('edgtf-in-progress');
						    $this.find('.active .edgtf-slider-elements-holder-frame, .active .edgtf-slide-element-section-link').fadeTo(250,0);
					    });
					    /* before slide transition - end */

					    /* after slide transition - start */
					    $this.on('slid.bs.carousel', function () {
						    $this.removeClass('edgtf-in-progress');
						    $this.find('.active .edgtf-slider-elements-holder-frame, .active .edgtf-slide-element-section-link').fadeTo(0,1);

						    // setting numbers on carousel controls
						    if($this.hasClass('edgtf-slider-numbers')) {
							    var currentItem = $('.item').index($('.item.active')[0]) + 1;
							    setPrevNextNumbers($this, currentItem, totalItemCount);
						    }

						    // initiate image animation on active slide and reset all others
						    $('.item.edgtf-animate-image .edgtf-image').stop().css({'transform':'', '-webkit-transform':''});
						    if($('.item.active').hasClass('edgtf-animate-image') && edgtf.windowWidth > 1025){
							    $('.item.edgtf-animate-image.active .edgtf-image').transformAnimate({
								    transform: "matrix("+matrixArray[$('.item.edgtf-animate-image.active').data('edgtf_animate_image')]+")",
								    duration: 30000
							    });
						    }

						    // setting thumbnails on navigation controls
						    if($this.hasClass('edgtf-slider-thumbs')) {
							    updateNavigationThumbs($this);
						    }
					    });
					    /* after slide transition - end */

					    /* swipe functionality - start */
					    $this.swipe( {
						    swipeLeft: function(){ $this.carousel('next'); },
						    swipeRight: function(){ $this.carousel('prev'); },
						    threshold:20
					    });
					    /* swipe functionality - end */

				    });

				    //adding parallax functionality on slider
				    if($('.no-touch .carousel').length){
					    var skrollr_slider = skrollr.init({
						    smoothScrolling: false,
						    forceHeight: false
					    });
					    skrollr_slider.refresh();
				    }

				    $(window).scroll(function(){
					    //set control class for slider in order to change header style
					    if($('.edgtf-slider .carousel').height() < edgtf.scroll){
						    $('.edgtf-slider .carousel').addClass('edgtf-disable-slider-header-style-changing');
					    }else{
						    $('.edgtf-slider .carousel').removeClass('edgtf-disable-slider-header-style-changing');
						    edgtfCheckSliderForHeaderStyle($('.edgtf-slider .carousel .active'),$('.edgtf-slider .carousel').hasClass('edgtf-header-effect'));
					    }

					    //hide slider when it is out of viewport
					    if($('.edgtf-slider .carousel').hasClass('edgtf-full-screen') && edgtf.scroll > edgtf.windowHeight && edgtf.windowWidth > 1025){
						    $('.edgtf-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
					    }else if(!$('.edgtf-slider .carousel').hasClass('edgtf-full-screen') && edgtf.scroll > $('.edgtf-slider .carousel').height() && edgtf.windowWidth > 1025){
						    $('.edgtf-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
					    }else{
						    $('.edgtf-slider .carousel').find('.carousel-inner, .carousel-indicators').show();
					    }
				    });
			    }
		    }
	    };
    };

    /**
     * Check if slide effect on header style changing
     * @param slide, current slide
     * @param headerEffect, flag if slide
     */

    function edgtfCheckSliderForHeaderStyle(slide, headerEffect) {

        if($('.edgtf-slider .carousel').not('.edgtf-disable-slider-header-style-changing').length > 0) {

            var slideHeaderStyle = "";
            if (slide.hasClass('light')) { slideHeaderStyle = 'edgtf-light-header'; }
            if (slide.hasClass('dark')) { slideHeaderStyle = 'edgtf-dark-header'; }

            if (slideHeaderStyle !== "") {
                if (headerEffect) {
                    edgtf.body.removeClass('edgtf-dark-header edgtf-light-header').addClass(slideHeaderStyle);
                }
            } else {
                if (headerEffect) {
                    edgtf.body.removeClass('edgtf-dark-header edgtf-light-header').addClass(edgtf.defaultHeaderStyle);
                }

            }
        }
    }

    /**
     * List object that initializes list with animation
     * @type {Function}
     */
    var edgtfInitIconList = edgtf.modules.shortcodes.edgtfInitIconList = function() {
        var iconList = $('.edgtf-animate-list');

        /**
         * Initializes icon list animation
         * @param list current list shortcode
         */
        var iconListInit = function(list) {
            setTimeout(function(){
                list.appear(function(){
                    list.addClass('edgtf-appeared');
                },{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            },30);
        };

        return {
            init: function() {
                if(iconList.length) {
                    iconList.each(function() {
                        iconListInit($(this));
                    });
                }
            }
        };
    };

    /**
     * Masonry gallery, init masonry and resize pictures in grid
     */
    function edgtfInitMasonryGallery(){


        resizeMasonryGallery($('.edgtf-masonry-gallery-grid-sizer').width());

        if($('.edgtf-masonry-gallery-holder').length){
            $('.edgtf-masonry-gallery-holder').each(function(){
                var holder = $(this);
                holder.waitForImages(function(){
                    holder.animate({opacity:1});
                    holder.isotope({
                        itemSelector: '.edgtf-masonry-gallery-item',
                        masonry: {
                            columnWidth: '.edgtf-masonry-gallery-grid-sizer'
                        }
                    });
                });
            });
            $(window).resize(function(){
                resizeMasonryGallery($('.edgtf-masonry-gallery-grid-sizer').width());
                $('.edgtf-masonry-gallery-holder').isotope('reloadItems');
            });
        }
    }

    function resizeMasonryGallery(size){

        var rectangle_portrait = $('.edgtf-masonry-gallery-holder .edgtf-mg-rectangle-portrait');
        var rectangle_landscape = $('.edgtf-masonry-gallery-holder .edgtf-mg-rectangle-landscape');
        var square_big = $('.edgtf-masonry-gallery-holder .edgtf-mg-square-big');
        var square_small = $('.edgtf-masonry-gallery-holder .edgtf-mg-square-small');

        rectangle_portrait.css('height', 2*size);
        if (window.innerWidth < 600) {
            rectangle_landscape.css('height', size/2);
        }
        else {
            rectangle_landscape.css('height', size);
        }
        square_big.css('height', 2*size);
        if (window.innerWidth < 600) {
            square_big.css('height', square_big.width());
        }
        square_small.css('height', size);
    }

    /*
     **  Init shop list masonry type
     */
    function edgtfInitShopListMasonry(){
        var shopList = $('.edgtf-shop-masonry');
        if(shopList.length) {
            shopList.each(function() {
                var thisShopList = $(this).children('.edgtf-shop-list-masonry');
                var size = thisShopList.find('.edgtf-shop-list-masonry-grid-sizer').width();
                edgtfResizeShopMasonry(size,thisShopList);

                edgtfInitMasonryLayout(thisShopList);
                $(window).resize(function(){
                    size = thisShopList.find('.edgtf-shop-list-masonry-grid-sizer').width();
                    edgtfResizeShopMasonry(size,thisShopList);
                    edgtfInitMasonryLayout(thisShopList);
                });
            });
        }
    }

    function edgtfInitMasonryLayout(container){
        container.animate({opacity: 1});
        container.isotope({
            layoutMode: 'packery',
            itemSelector: '.edgtf-shop-product',
            packery: {
                columnWidth: '.edgtf-shop-list-masonry-grid-sizer'
            }
        });
    }

    function edgtfResizeShopMasonry(size,container){

        var defaultMasonryItem = container.find('.edgtf-default-masonry-item');
        var largeWidthMasonryItem = container.find('.edgtf-large-width-masonry-item');
        var largeHeightMasonryItem = container.find('.edgtf-large-height-masonry-item');
        var largeWidthHeightMasonryItem = container.find('.edgtf-large-width-height-masonry-item');

        defaultMasonryItem.css('height', size);
        largeHeightMasonryItem.css('height', Math.round(2*size));

        var breakpoint = edgtf.body.hasClass('page-template-full-width') ? 480 : 600;

        if(edgtf.windowWidth > breakpoint){
            largeWidthHeightMasonryItem.css('height', Math.round(2*size));
            largeWidthMasonryItem.css('height', size);
        }else{
            largeWidthHeightMasonryItem.css('height', size);
            largeWidthMasonryItem.css('height', Math.round(size/2));

        }
    }

    /**
     * Initializes shop masonry filter
     */
    function edgtfInitShopMasonryFilter(){

        var filterHolder = $('.edgtf-shop-filter-holder.edgtf-masonry-filter');

        if(filterHolder.length){
            filterHolder.each(function(){

                var thisFilterHolder = $(this);

                var shopIsotopeAnimation = null;

                thisFilterHolder.find('.filter:first').addClass('current');

                thisFilterHolder.find('li').on('click',function(){

                    var currentFilter = $(this);
                    clearTimeout(shopIsotopeAnimation);

                    $('.isotope, .isotope .isotope-item').css('transition-duration','0.8s');

                    shopIsotopeAnimation = setTimeout(function(){
                        $('.isotope, .isotope .isotope-item').css('transition-duration','0s');
                    },700);

                    var selector = $(this).attr('data-filter');
                    thisFilterHolder.parent().find('.edgtf-shop-list-masonry').isotope({ filter: selector });

                    thisFilterHolder.find('.filter').removeClass('current');
                    currentFilter.addClass('current');

                    return false;

                });

            });
        }
    }

    /**
     * Check if slide effect on header style changing
     */
    function edgtfItemShowcase() {
        var itemShowcase = $('.edgtf-item-showcase');
        if (itemShowcase.length) {
            itemShowcase.each(function(){
                var thisItemShowcase = $(this),
                    leftItems = thisItemShowcase.find('.edgtf-item-left'),
                    rightItems = thisItemShowcase.find('.edgtf-item-right'),
                    itemImage = thisItemShowcase.find('.edgtf-item-image');

                //logic
                leftItems.wrapAll( "<div class='edgtf-item-showcase-holder edgtf-holder-left' />");
                rightItems.wrapAll( "<div class='edgtf-item-showcase-holder edgtf-holder-right' />");
                thisItemShowcase.animate({opacity:1},200);
                setTimeout(function(){
                    thisItemShowcase.appear(function(){
                        itemImage.addClass('edgtf-appeared');
                        thisItemShowcase.on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
                            function(e) {
                                if(edgtf.windowWidth > 1200) {
                                    itemAppear('.edgtf-holder-left .edgtf-item');
                                    itemAppear('.edgtf-holder-right .edgtf-item');
                                } else {
                                    itemAppear('.edgtf-item');
                                }
                            });
                    },{accX: 0, accY: 0});
                },100);

                //appear animation trigger
                function itemAppear(itemCSSClass) {
                    thisItemShowcase.find(itemCSSClass).each(function(i){
                        var thisListItem = $(this);
                        setTimeout(function(){
                            thisListItem.appear(function(){
                                $(this).addClass('edgtf-appeared');
                            },{accX: 0, accY: 0});
                        }, i*150);
                    });
                }
            });

        }
    }

	/*
	 * Type out functionality for Custom Font
	 */
	function edgtfCustomFontTypeOut() {

		var edgtfTyped = $('.edgtf-typed');

		if (edgtfTyped.length) {
			edgtfTyped.each(function(){

				//vars
				var thisTyped = $(this),
					typedWrap = thisTyped.parent('.edgtf-typed-wrap'),
					customFontHolder = typedWrap.parent('.edgtf-custom-font-holder'),
					originalText = customFontHolder.find('.edgtf-custom-font-original'),
					str,
					string_1 = thisTyped.find('.edgtf-typed-1').text(),
					string_2 = thisTyped.find('.edgtf-typed-2').text(),
					string_3 = thisTyped.find('.edgtf-typed-3').text();

				//show only the strings that are entered in
				if (!string_2.trim() || !string_3.trim() ) {
					str = [string_1];
				}
				if (!string_3.trim() && string_2.length) {
					str = [string_1,string_2];
				}
				if (string_1.length && string_2.length && string_3.length) {
					str = [string_1,string_2,string_3];
				}

				//ampersand
				if(originalText.text().indexOf('&') != -1) {
					originalText.html(originalText.text().replace('&', '<span class="edgtf-amp">&</span>'));
				}

				//typeout
				setTimeout(function(){
					customFontHolder.appear(function() {
						thisTyped.typed({
							strings: str,
							typeSpeed: 90,
							backDelay: 700,
							loop: true,
							contentType: 'text',
							loopCount: false,
							cursorChar: "_",
						});
					},{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
				}, 100);

			});
		}
	}

    /*
    * Animations Holder
    */
    function edgtfAnimationsHolder() {
        var animationsHolderElements = $('.edgtf-animations-holder');

        if (animationsHolderElements.length) {
            animationsHolderElements.appear(function(){
                var animationsHolderElement = $(this);

                animationsHolderElement.addClass('edgtf-appeared');

            },{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
        }
    }

    /*
    *  Reservation Form 
    */
    function edgtfReservationFormDatePicker() {

        var datepicker = $('.edgtf-ot-date');

            if(datepicker.length) {
                datepicker.each(function() {
                    $(this).datepicker({
                        prevText: '<span class="arrow_carrot-left"></span>',
                        nextText: '<span class="arrow_carrot-right"></span>'
                    });
                });
            }
    }

    /*
    *  Give Slider Init
    */
    function edgtfInitGiveSlider(){
    	var giveSliders = $('.edgtf-give-forms-slider');

    	if (giveSliders.length){
    		giveSliders.each(function(){
    			var thisGiveSlider = $(this);

    			thisGiveSlider.slick({
                    infinite: true,
                    autoplay: true,
                    slidesToShow : 1,
                    autoplaySpeed: 2500,
                    fade: true,
                    arrows: false,
                    dots: true,
					dotsClass: 'edgtf-slick-dots',
                    adaptiveHeight: true,
                    prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_carrot-left"></span></span>',
                    nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_carrot-right"></span></span>',
                    customPaging: function(slider, i) {
                        return '<span class="edgtf-slick-dot-inner"></span>';
                    }   				
    			});

                thisGiveSlider.addClass("edgtf-give-forms-slider-loaded");
    		});
    	}

    }

    /*
     * Banner
     */
    function edgtfBanner() {
        var banners = $('.edgtf-banner');

        if (banners.length) {
            banners.each(function(){
                var banner = $(this);

                if(banner.find('.edgtf-banner-read-more').length) {
                    var button = banner.find('.edgtf-banner-read-more');

                    button.mouseenter(function(){
                        banner.addClass('edgtf-hovered');
                    }).mouseleave(function(){
                        banner.removeClass('edgtf-hovered');
                    });
                }
            });
        }
    }


})(jQuery);