(function ($) {

    /* Start Carousel slider */
    let ElementCarouselSlider   =   function( $scope, $ ) {

        let element_slides = $scope.find( '.custom-owl-carousel' );

        $( document ).general_owlCarousel_custom( element_slides );

    };

    $( window ).on( 'elementor/frontend/init', function() {

        /* Element slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/dentistry-slides.default', ElementCarouselSlider );

        /* Element post carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/dentistry-post-carousel.default', ElementCarouselSlider );

        /* Element testimonial */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/dentistry-testimonial.default', ElementCarouselSlider );

        /* Element Product Carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/dentistry-product-carousel.default', ElementCarouselSlider );

        /* Element Best Selling Products */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/dentistry-best-selling-products.default', ElementCarouselSlider );

    } );

})( jQuery );