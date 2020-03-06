<?php
global $dentistry_options;

$dentistry_logo_image_id    =   $dentistry_options['dentistry_logo_image']['id'];
?>

<header id="home" class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3 order-">
                <div class="site-logo d-flex item-full-height align-items-center">
                    <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <?php
                        if ( !empty( $dentistry_logo_image_id ) ) :
                            echo wp_get_attachment_image( $dentistry_logo_image_id, 'full' );
                        else :
                            echo'<img class="logo-default" src="'.esc_url( get_theme_file_uri( '/images/logo.png' ) ).'" alt="'.get_bloginfo('title').'" />';
                        endif;
                        ?>
                    </a>
                </div>
            </div>

            <div class="col-9 col-md-7 col-lg-6">
                <div class="search-form-product d-flex item-full-height align-items-center">
                    <?php get_template_part( 'searchform', 'product' ); ?>
                </div>
            </div>

            <?php if ( class_exists('Woocommerce') ) : ?>

            <div class="col-3 col-md-2 col-lg-3">
                <div class="shop-cart-view d-flex justify-content-end item-full-height align-items-center">
                    <?php
                    do_action( 'dentistry_woo_shopping_cart' );

                    the_widget( 'WC_Widget_Cart', '' );
                    ?>
                </div>
            </div>

            <?php endif; ?>
        </div>
    </div>
</header>