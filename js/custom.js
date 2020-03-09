/**
 * Custom js v1.0.0
 * Copyright 2017-2020
 * Licensed under  ()
 */

( function( $ ) {

    "use strict";

    let timer_clear;

    $( document ).ready( function () {

        /* Start back top */
        $('#back-top').on( 'click', function (e) {

            e.preventDefault();
            $( 'html, body' ).animate( {
                scrollTop: 0
            }, 700 );

        } );
        /* End back top */

        /* btn mobile Start*/
        let menu_item_has_children  =   $( '.site-menu .menu-item-has-children' );

        if ( menu_item_has_children.length ) {

            $('.site-menu .menu-item-has-children > a').after( "<span class='icon_menu_item_mobile'></span>" );

            let icon_menu_item_mobile  =   $('.icon_menu_item_mobile');

            icon_menu_item_mobile.each(function () {

                $(this).on( 'click', function () {

                    $(this).toggleClass('icon_menu_item_mobile_active');
                    $(this).parents( '.menu-item-has-children' ).siblings().find( '.icon_menu_item_mobile' ).removeClass( 'icon_menu_item_mobile_active' );
                    $(this).parent().children( '.sub-menu' ).slideToggle();
                    $(this).parents( '.menu-item-has-children' ).siblings().find( '.sub-menu' ).slideUp();

                } )

            })

        }
        /* btn mobile End */

        /* Start product select search */
        let text_product_drop_down = $('.product-cat-selector-search'),
            product_cat_list = $('.product-cat-list .item-product-cat');

        if (text_product_drop_down.length) {

            text_product_drop_down.each( function () {

                $(this).on('show.bs.dropdown', function () {

                    $(this).find('.product-cat-list').niceScroll();

                })

            })

        }

        if ( product_cat_list.length ) {

            product_cat_list.each(function () {

                $(this).on('click', function () {

                    let id_product = $(this).data('cat-id'),
                        name_product = $(this).text();

                    $(this).parents('.product-cat-selector-search').find('.text-product').text(name_product);
                    $(this).parents('.search-form-product').find('.product-cat-id').attr('value', id_product);

                });

            })

        }
        /* End product select search */

        /* Start Gallery Single */
        $( document ).general_owlCarousel_custom( '.site-post-slides' );
        /* End Gallery Single */

        $( '.multi-languages ul li.lang-sel > a' ).on( 'click', function( event ) {

            event.preventDefault();

        });

    });

    $( window ).on( "load", function() {

        $( '#site-loadding' ).remove();

    });

    $( window ).scroll( function() {

        /* Start scroll back top */
        if ( timer_clear ) clearTimeout(timer_clear);

        timer_clear = setTimeout( function() {

            let $scrollTop = $(this).scrollTop();

            if ( $scrollTop > 200 ) {
                $('#back-top').addClass('active_top');
            }else {
                $('#back-top').removeClass('active_top');
            }
            /* End scroll back top */

            let site_header = $( '.site-header' ),
                sticky_nav = $( '.active-sticky-nav' );

            if ( site_header.length && sticky_nav.length ) {

                let height_site_header = site_header.height();

                if ( $scrollTop >= height_site_header ) {
                    $( '.main-navigation .header-search, .main-navigation .header-cart-view').addClass('active-show');
                }else {
                    $( '.main-navigation .header-search, .main-navigation .header-cart-view').removeClass('active-show');
                }

            }

        }, 100 );



    });

    $.fn.general_owlCarousel_custom = function ( class_item ) {

        let class_item_owlCarousel   =   $( class_item );

        if ( class_item_owlCarousel.length ) {

            class_item_owlCarousel.each( function () {

                let slider = $(this);

                if ( !slider.hasClass('owl-carousel-init') ) {

                    let defaults = {
                        autoplaySpeed: 800,
                        navSpeed: 800,
                        dotsSpeed: 800,
                        autoHeight: false,
                        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                    };

                    let config = $.extend( defaults, slider.data( 'settings-owl') );

                    slider.owlCarousel( config ).addClass( 'owl-carousel-init' );

                }

            } )

        }

    }

} )( jQuery );