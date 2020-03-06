<?php

global $dentistry_options;

$dentistry_nav_top_sticky       =   $dentistry_options['dentistry_nav_top_sticky'];
$dentistry_information_phone    =   $dentistry_options['dentistry_information_phone'];

?>

<nav id="site-navigation" class="main-navigation<?php echo esc_attr( $dentistry_nav_top_sticky == 1 ? ' active-sticky-nav' : '' ); ?>">
    <div class="site-navbar navbar-expand-lg">
        <div class="container">
            <div class="site-navigation_warp d-flex justify-content-lg-between">
                <button class="navbar-toggler" data-toggle="collapse" data-target=".site-menu">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>

                <div class="site-menu collapse navbar-collapse">
                    <?php

                    if ( has_nav_menu('primary') ) :

                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'navbar-nav',
                            'container'      => false,
                        ) ) ;

                    else:

                    ?>

                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                    <?php esc_html_e( 'ADD TO MENU','dentistry' ); ?>
                                </a>
                            </li>
                        </ul>

                    <?php endif; ?>

                </div>

                <?php if ( !empty( $dentistry_information_phone != '' ) ) : ?>

                <div class="phone-box d-flex">
                    <span class="phone-box-icon d-flex align-items-center">
                        <i class="fas fa-phone-alt"></i>
                        <?php esc_html_e( 'Phone: ', 'dentistry' ); echo esc_html( $dentistry_information_phone ); ?>
                    </span>

                    <div class="header-search">
                        <div class="header-search__box">
                            <span class="header-search__icon">
                                <i class="fas fa-search"></i>
                            </span>

                            <?php get_template_part( 'searchform', 'product' ); ?>
                        </div>
                    </div>

                    <div class="header-cart-view">
                       <div class="header-cart-view__box shop-cart-view">
                           <?php
                           do_action( 'dentistry_woo_shopping_cart' );

                           the_widget( 'WC_Widget_Cart', '' );
                           ?>
                       </div>
                    </div>
                </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>