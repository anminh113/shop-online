/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Custom Dropdown
4. Init Page Menu
5. Init Recently Viewed Slider
6. Init Brands Slider
7. Init Isotope
8. Init Price Slider
9. Init Favorites


******************************/

$(document).ready(function() {
    "use strict";

    /*

    1. Vars and Inits

    */

    var menuActive = false;
    var header = $('.header');

    setHeader();

    // initCustomDropdown();
    initPageMenu();
    initViewedSlider();
    initBrandsSlider();
    initIsotope();

    initPriceSlider();
    initFavs();

    $(window).on('resize', function() {
        setHeader();
    });

    /*

    2. Set Header

    */

    function setHeader() {
        //To pin main nav to the top of the page when it's reached
        //uncomment the following

        // var controller = new ScrollMagic.Controller(
        // {
        //  globalSceneOptions:
        //  {
        //      triggerHook: 'onLeave'
        //  }
        // });

        // var pin = new ScrollMagic.Scene(
        // {
        //  triggerElement: '.main_nav'
        // })
        // .setPin('.main_nav').addTo(controller);

        if (window.innerWidth > 991 && menuActive) {
            closeMenu();
        }
    }

    /*

    3. Init Custom Dropdown

    */

    // function initCustomDropdown() {
    //     if ($('.custom_dropdown_placeholder').length && $('.custom_list').length) {
    //         var placeholder = $('.custom_dropdown_placeholder');
    //         var list = $('.custom_list');
    //     }

    //     placeholder.on('click', function(ev) {
    //         if (list.hasClass('active')) {
    //             list.removeClass('active');
    //         } else {
    //             list.addClass('active');
    //         }

    //         $(document).one('click', function closeForm(e) {
    //             if ($(e.target).hasClass('clc')) {
    //                 $(document).one('click', closeForm);
    //             } else {
    //                 list.removeClass('active');
    //             }
    //         });

    //     });

    //     $('.custom_list a').on('click', function(ev) {
    //         ev.preventDefault();
    //         var index = $(this).parent().index();

    //         placeholder.text($(this).text()).css('opacity', '1');

    //         if (list.hasClass('active')) {
    //             list.removeClass('active');
    //         } else {
    //             list.addClass('active');
    //         }
    //     });


    //     // $('select').on('change', function(e) {
    //     //     placeholder.text(this.value);

    //     //     $(this).animate({ width: placeholder.width() + 'px' });
    //     // });
    // }

    /*

    4. Init Page Menu

    */

    function initPageMenu() {
        if ($('.page_menu').length && $('.page_menu_content').length) {
            var menu = $('.page_menu');
            var menuContent = $('.page_menu_content');
            var menuTrigger = $('.menu_trigger');

            //Open / close page menu
            menuTrigger.on('click', function() {
                if (!menuActive) {
                    openMenu();
                } else {
                    closeMenu();
                }
            });

            //Handle page menu
            if ($('.page_menu_item').length) {
                var items = $('.page_menu_item');
                items.each(function() {
                    var item = $(this);
                    if (item.hasClass("has-children")) {
                        item.on('click', function(evt) {
                            evt.preventDefault();
                            evt.stopPropagation();
                            var subItem = item.find('> ul');
                            if (subItem.hasClass('active')) {
                                subItem.toggleClass('active');
                                TweenMax.to(subItem, 0.3, { height: 0 });
                            } else {
                                subItem.toggleClass('active');
                                TweenMax.set(subItem, { height: "auto" });
                                TweenMax.from(subItem, 0.3, { height: 0 });
                            }
                        });
                    }
                });
            }
        }
    }

    function openMenu() {
        var menu = $('.page_menu');
        var menuContent = $('.page_menu_content');
        TweenMax.set(menuContent, { height: "auto" });
        TweenMax.from(menuContent, 0.3, { height: 0 });
        menuActive = true;
    }

    function closeMenu() {
        var menu = $('.page_menu');
        var menuContent = $('.page_menu_content');
        TweenMax.to(menuContent, 0.3, { height: 0 });
        menuActive = false;
    }

    /*

    5. Init Recently Viewed Slider

    */

    function initViewedSlider() {
        if ($('.viewed_slider').length) {
            var viewedSlider = $('.viewed_slider');

            viewedSlider.owlCarousel({
                loop: true,
                margin: 30,
                autoplay: true,
                autoplayTimeout: 6000,
                nav: false,
                dots: false,
                responsive: {
                    0: { items: 1 },
                    575: { items: 2 },
                    768: { items: 3 },
                    991: { items: 4 },
                    1199: { items: 6 }
                }
            });

            if ($('.viewed_prev').length) {
                var prev = $('.viewed_prev');
                prev.on('click', function() {
                    viewedSlider.trigger('prev.owl.carousel');
                });
            }

            if ($('.viewed_next').length) {
                var next = $('.viewed_next');
                next.on('click', function() {
                    viewedSlider.trigger('next.owl.carousel');
                });
            }
        }
    }

    /*

    6. Init Brands Slider

    */

    function initBrandsSlider() {
        if ($('.brands_slider').length) {
            var brandsSlider = $('.brands_slider');

            brandsSlider.owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                nav: false,
                dots: false,
                autoWidth: true,
                items: 8,
                margin: 42
            });

            if ($('.brands_prev').length) {
                var prev = $('.brands_prev');
                prev.on('click', function() {
                    brandsSlider.trigger('prev.owl.carousel');
                });
            }

            if ($('.brands_next').length) {
                var next = $('.brands_next');
                next.on('click', function() {
                    brandsSlider.trigger('next.owl.carousel');
                });
            }
        }
    }

    /*

    7. Init Isotope

    */


    function initIsotope() {
        var sortingButtons = $('.shop_sorting_button');
        $('.product_grid').isotope({
            itemSelector: '.product_item',
            getSortData: {
                Price: function(itemElement) {
                    var priceEle = $(itemElement).find('.product_price').text().replace('$', '');
                    return parseFloat(priceEle);
                },name: '.product_name div a'
            },
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }

        });

        sortingButtons.each(function() {
            $(this).on('click', function() {
                $('.sorting_text').text($(this).text());
                
                var option = $(this).attr('data-isotope-option');
                if (option == 'PriceIncrease') {
                    $('.product_grid').isotope('updateSortData').isotope();
                    $('.product_grid').isotope({ sortBy: 'Price', sortAscending: true });
                } else if (option == 'PriceReduction') {
                    $('.product_grid').isotope('updateSortData').isotope();
                    $('.product_grid').isotope({ sortBy: 'Price', sortAscending: false });
                } else if (option == 'name'){
                    $('.product_grid').isotope('updateSortData').isotope();
                    $('.product_grid').isotope({ sortBy: 'name' });
                }else{
                    $('.product_grid').isotope('updateSortData').isotope();
                    $('.product_grid').isotope({ sortBy: 'random' });
                }

            });
        });

        // quick search regex
        var qsRegex;

        // init Isotope
        var $grid = $('.product_grid').isotope({
        itemSelector: '.product_name div a',
        layoutMode: 'fitRows',
        filter: function() {
            return qsRegex ? $(this).text().match( qsRegex ) : true;
        }
        });

        // use value of search field to filter
        var $quicksearch = $('#quicksearch').keyup( debounce( function() {
        qsRegex = new RegExp( $quicksearch.val(), 'gi' );
        $grid.isotope();
        }, 50 ) );

        // debounce so filtering doesn't happen every millisecond
        function debounce( fn, threshold ) {
        var timeout;
        threshold = threshold || 100;
        return function debounced() {
            clearTimeout( timeout );
            var args = arguments;
            var _this = this;
            function delayed() {
            fn.apply( _this, args );
            }
            timeout = setTimeout( delayed, threshold );
        };
        }

    }



    /*

    8. Init Price Slider

    */

    function initPriceSlider() {
        if ($("#slider-range").length) {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 15000,
                values: [800, 900],
                slide: function(event, ui) {
                    $("#amount").val( ui.values[0]+ ",000₫ - " + ui.values[1]+",000₫");
                    $("#amount1").val( ui.values[0].toLocaleString()+ ",000₫ - " + ui.values[1].toLocaleString()+",000₫");
                }
            });
          
            $("#amount").val( $("#slider-range").slider("values", 0) + "000₫ - " + $("#slider-range").slider("values", 1)+"000₫");
            $("#amount1").val( $("#slider-range").slider("values", 0) + ",000₫ - " + $("#slider-range").slider("values", 1)+",000₫");
            $('.ui-slider-handle').on('mouseup', function() {
                console.clear();
 
                $('.product_grid').isotope({
                    filter: function() {
                        var priceRange = $('#amount').val();
                        var priceMin = parseInt(priceRange.split('-')[0].replace('.000₫', ''));
                        var priceMax = parseInt(priceRange.split('-')[1].replace('.000₫', '').replace(' ', ''));
                        console.log(priceMin);
                        var itemPrice = parseInt($(this).find('.product_price1').clone().children().remove().end().text().replace( '', '' ));
                        var isInHeightRange = (priceMin <= itemPrice && priceMax >= itemPrice);
                    return isInHeightRange;
                        // return((itemPrice >= priceMin) && (itemPrice <= priceMax)) || (itemPrice >= priceMin) || (itemPrice <= priceMax)  ;
                    },
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    },
                });
            });
        }
    }

    /*

    9. Init Favorites

    */

    function initFavs() {
        // Handle Favorites
        var items = document.getElementsByClassName('product_fav');
        for (var x = 0; x < items.length; x++) {
            var item = items[x];
            item.addEventListener('click', function(fn) {
                fn.target.classList.toggle('active');
            });
        }
    }
});

    jQuery.each(jQuery('textarea[data-autoresize]'), function() {
        var offset = this.offsetHeight - this.clientHeight;

        var resizeTextarea = function(el) {
            jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };
        jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
    });


