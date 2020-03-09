<?php
global $dentistry_options;

$header_top_show = $dentistry_options['dentistry_header_top_show'] == '' ? 1 : $dentistry_options['dentistry_header_top_show'];

if ( $header_top_show == 1 ) :

$select_page   =   $dentistry_options['dentistry_header_top_select_page'];

?>

<div class="header-top">
    <div class="container">
        <div class="warp d-sm-flex justify-content-sm-between">
            <div class="header-top_left">
                <p>
                    <?php
                    if ( is_user_logged_in() ) :

                        $sport_current_user = wp_get_current_user();

                    ?>

                        <?php esc_html_e( 'Xin chào', 'dentistry' ); ?>

                        <a class="my-name" href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>">
                            <?php echo esc_html( $sport_current_user->user_login ); ?>
                        </a>

                    <?php else: ?>

                        <?php esc_html_e( 'Xin chào khách hàng, bạn có thể', 'dentistry' ); ?>

                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_attr_e( 'Đăng nhập','dentistry' ); ?>">
                            <?php esc_html_e( 'đăng nhập', 'dentistry' ); ?>
                        </a>

                        <?php esc_html_e( 'hoặc', 'dentistry' ); ?>

                        <a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" title="<?php esc_attr_e( 'Đăng kí','dentistry' ); ?>">
                            <?php esc_html_e( 'đăng kí', 'dentistry' ); ?>
                        </a>

                    <?php endif; ?>
                </p>
            </div>

            <div class="header-top_right d-flex">
                <a class="location d-flex flex-grow-1 align-items-center" href="<?php echo esc_url( get_page_link( $select_page ) ); ?>">
                    <i class="fas fa-map-marker-alt"></i>
                    <?php esc_html_e( 'Vị trí cửa hàng', 'dentistry' ); ?>
                </a>

                <div class="account-box d-flex flex-grow-1 align-items-center">
                    <a class="account d-flex align-items-center" href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>">
                        <i class="fas fa-user"></i>
                        <?php esc_html_e( 'Tài khoản', 'dentistry' ); ?>
                    </a>

                    <div class="my-account">
                        <?php do_action( 'woocommerce_account_navigation' ); ?>
                    </div>
                </div>

                <?php
                if ( function_exists( 'pll_the_languages' ) ) :

                    $current_language   =   pll_current_language();
                    $translations       =   pll_the_languages( array('raw'=>1) );
                    $url_current        =   $translations[$current_language]['url'];
                    $flag_current       =   $translations[$current_language]['flag'];
                    $name_current       =   $translations[$current_language]['name'];

                ?>

                    <div class="multi-languages">
                        <ul>
                            <li class="lang-sel icl-<?php echo esc_attr( $current_language ); ?> d-flex align-items-center">
                                <a lang="<?php echo esc_attr( $current_language ); ?>" hreflang="<?php echo esc_attr( $current_language ); ?>" href="#">
                                    <span>
                                        <?php echo esc_html( $name_current ); ?>
                                    </span>

                                    <i class="fas fa-sort-down"></i>
                                </a>

                                <ul>
                                    <?php pll_the_languages( array( 'dropdown' => 0, 'show_flags' => 1 ) ); ?>
                                </ul>
                            </li>

                        </ul>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php

endif;