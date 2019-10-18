(function($) {
    "use strict";


    var blog = {};
    edgtf.modules.blog = blog;

    blog.edgtfInitAudioPlayer = edgtfInitAudioPlayer;

    blog.edgtfOnDocumentReady = edgtfOnDocumentReady;
    blog.edgtfOnWindowLoad = edgtfOnWindowLoad;
    blog.edgtfOnWindowResize = edgtfOnWindowResize;
    blog.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfInitAudioPlayer();
        edgtfInitBlogMasonry();
        edgtfInitBlogMasonryLoadMore();
        edgtfInitBlogLoadMore();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {

    }



    function edgtfInitAudioPlayer() {

        var players = $('audio.edgtf-blog-audio');

        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }


    function edgtfInitBlogMasonry() {

        if($('.edgtf-blog-holder.edgtf-blog-type-masonry').length) {

            var container = $('.edgtf-blog-holder.edgtf-blog-type-masonry');

            container.waitForImages(function() {
                container.isotope({
                    layoutMode: 'packery',
                    itemSelector: 'article',
                    resizable: false,
                    packery: {
                        columnWidth: '.edgtf-blog-masonry-grid-sizer',
                        gutter: '.edgtf-blog-masonry-grid-gutter'
                    }
                });
                container.addClass('edgtf-appeared');
            });

            var filters = $('.edgtf-filter-blog-holder');
            $('.edgtf-filter').on('click',function() {
                var filter = $(this);
                var selector = filter.attr('data-filter');
                filters.find('.edgtf-active').removeClass('edgtf-active');
                filter.addClass('edgtf-active');
                container.isotope({filter: selector});
                return false;
            });
        }
    }

    function edgtfInitBlogMasonryLoadMore() {

        if($('.edgtf-blog-holder.edgtf-blog-type-masonry').length) {

            var container = $('.edgtf-blog-holder.edgtf-blog-type-masonry');

            if(container.hasClass('edgtf-masonry-pagination-infinite-scroll')) {
                container.infinitescroll({
                        navSelector: '.edgtf-blog-infinite-scroll-button',
                        nextSelector: '.edgtf-blog-infinite-scroll-button a',
                        itemSelector: 'article',
                        loading: {
                            finishedMsg: edgtfGlobalVars.vars.edgtfFinishedMessage,
                            msgText: edgtfGlobalVars.vars.edgtfMessage
                        }
                    },
                    function(newElements) {
                        container.append(newElements).isotope('appended', $(newElements));
                        edgtf.modules.blog.edgtfInitAudioPlayer();
                        edgtf.modules.common.edgtfFluidVideo();
                        setTimeout(function() {
                            $('.edgtf-slick-slider:not(.slick-initialized)').slick({
                                infinite: true,
                                autoplay: true,
                                slidesToShow : 1,
                                arrows: true,
                                dots: false,
                                adaptiveHeight: true,
                                prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_carrot-left"></span></span>',
                                nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_carrot-right"></span></span>',
                                customPaging: function(slider, i) {
                                    return '<span class="edgtf-slick-dot-inner"></span>';
                                }
                            });
                            container.isotope('layout');
                        }, 400);
                    }
                );
            } else if(container.hasClass('edgtf-masonry-pagination-load-more')) {
                var i = 1;
                $('.edgtf-blog-load-more-button a').on('click', function(e) {
                    e.preventDefault();

                    var button = $(this);

                    var link = button.attr('href');
                    var content = '.edgtf-masonry-pagination-load-more';
                    var anchor = '.edgtf-blog-load-more-button a';
                    var nextHref = $(anchor).attr('href');
                    $.get(link + '', function(data) {
                        var newContent = $(content, data).wrapInner('').html();
                        nextHref = $(anchor, data).attr('href');
                        container.append(newContent).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        edgtf.modules.blog.edgtfInitAudioPlayer();
                        edgtf.modules.common.edgtfFluidVideo();
                        setTimeout(function() {
                            $('.edgtf-slick-slider:not(.slick-initialized)').slick({
                                infinite: true,
                                autoplay: true,
                                slidesToShow : 1,
                                arrows: true,
                                dots: false,
                                adaptiveHeight: true,
                                prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_carrot-left"></span></span>',
                                nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_carrot-right"></span></span>',
                                customPaging: function(slider, i) {
                                    return '<span class="edgtf-slick-dot-inner"></span>';
                                }
                            });
                            $('.edgtf-masonry-pagination-load-more').isotope('layout');
                        }, 400);
                        if(button.parent().data('rel') > i) {
                            button.attr('href', nextHref); // Change the next URL
                        } else {
                            button.parent().remove();
                        }
                    });
                    i++;
                });
            }
        }
    }
    function edgtfInitBlogLoadMore(){
        var blogHolder = $('.edgtf-blog-holder.edgtf-blog-load-more:not(.edgtf-blog-type-masonry)');
        
        if(blogHolder.length){
            blogHolder.each(function(){
                var thisBlogHolder = $(this);
                var nextPage;
                var maxNumPages;
                
                var loadMoreButton = $('.edgtf-load-more-ajax-pagination .edgtf-btn');
                maxNumPages =  thisBlogHolder.data('max-pages');                
                
                loadMoreButton.on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var loadMoreDatta = getBlogLoadMoreData(thisBlogHolder);

                    nextPage = loadMoreDatta.nextPage;

					var nonceHolder = thisHolder.find('input[name*="qodef_blog_load_more_nonce_"]');

					loadMoreDatta.blog_load_more_id = nonceHolder.attr('name').substring(nonceHolder.attr('name').length - 4, nonceHolder.attr('name').length);
					loadMoreDatta.blog_load_more_nonce = nonceHolder.val();
                    
                    if(nextPage <= maxNumPages){
                        var ajaxData = setBlogLoadMoreAjaxData(loadMoreDatta);
                        $.ajax({
                            type: 'POST',
                            data: ajaxData,
                            url: EdgefAjaxUrl,
                            success: function (data) {
                                nextPage++;
                                thisBlogHolder.data('next-page', nextPage);
                                var response = $.parseJSON(data);
                                var responseHtml =  response.html;
                                thisBlogHolder.waitForImages(function(){    
                                    thisBlogHolder.find('article:last').after(responseHtml); // Append the new content 
                                    setTimeout(function() {               
                                        edgtf.modules.blog.edgtfInitAudioPlayer();
                                        edgtf.modules.common.edgtfFluidVideo();
                                        $('.edgtf-slick-slider:not(.slick-initialized)').slick({
                                            infinite: true,
                                            autoplay: true,
                                            slidesToShow : 1,
                                            arrows: true,
                                            dots: false,
                                            adaptiveHeight: true,
                                            prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="arrow_carrot-left"></span></span>',
                                            nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="arrow_carrot-right"></span></span>',
                                            customPaging: function(slider, i) {
                                                return '<span class="edgtf-slick-dot-inner"></span>';
                                            }
                                        });
                                    },400);
                                });
                            }
                        });
                    }
                    
                    if(nextPage === maxNumPages){
                        loadMoreButton.hide();
                    }
                    
                });
            });
        }
    }
    function getBlogLoadMoreData(container){
        
        var returnValue = {};
        
        returnValue.nextPage = '';
        returnValue.number = '';
        returnValue.category = '';
        returnValue.blogType = '';
        returnValue.archiveCategory = '';
        returnValue.archiveAuthor = '';
        returnValue.archiveTag = '';
        returnValue.archiveDay = '';
        returnValue.archiveMonth = '';
        returnValue.archiveYear = '';
        
        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {
            returnValue.nextPage = container.data('next-page');
        }
        if (typeof container.data('post-number') !== 'undefined' && container.data('post-number') !== false) {                    
            returnValue.number = container.data('post-number');
        }
        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {                    
            returnValue.category = container.data('category');
        }
        if (typeof container.data('blog-type') !== 'undefined' && container.data('blog-type') !== false) {                    
            returnValue.blogType = container.data('blog-type');
        }
        if (typeof container.data('archive-category') !== 'undefined' && container.data('archive-category') !== false) {                    
            returnValue.archiveCategory = container.data('archive-category');
        }
        if (typeof container.data('archive-author') !== 'undefined' && container.data('archive-author') !== false) {                    
            returnValue.archiveAuthor = container.data('archive-author');
        }
        if (typeof container.data('archive-tag') !== 'undefined' && container.data('archive-tag') !== false) {                    
            returnValue.archiveTag = container.data('archive-tag');
        }
        if (typeof container.data('archive-day') !== 'undefined' && container.data('archive-day') !== false) {                    
            returnValue.archiveDay = container.data('archive-day');
        }
        if (typeof container.data('archive-month') !== 'undefined' && container.data('archive-month') !== false) {                    
            returnValue.archiveMonth = container.data('archive-month');
        }
        if (typeof container.data('archive-year') !== 'undefined' && container.data('archive-year') !== false) {                    
            returnValue.archiveYear = container.data('archive-year');
        }
        
        return returnValue;
        
    }
    
    function setBlogLoadMoreAjaxData(container){
        
        var returnValue = {
            action: 'goodwish_edge_blog_load_more',
            nextPage: container.nextPage,
            number: container.number,
            category: container.category,
            blogType: container.blogType,
            archiveCategory: container.archiveCategory,
            archiveAuthor: container.archiveAuthor,
            archiveTag: container.archiveTag,
            archiveDay: container.archiveDay,
            archiveMonth: container.archiveMonth,
            archiveYear: container.archiveYear,
			blog_load_more_id: container.blog_load_more_nonce,
			blog_load_more_nonce: container.blog_load_more_nonce,
        };
        
        return returnValue;
    }



})(jQuery);