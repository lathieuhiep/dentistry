<?php
global $dentistry_options;

$dentistry_information_show_hide = $dentistry_options['dentistry_information_show_hide'] == '' ? 1 : $dentistry_options['dentistry_information_show_hide'];

if ( $dentistry_information_show_hide == 1 ) :

$dentistry_information_address   =   $dentistry_options['dentistry_information_address'];
$dentistry_information_mail      =   $dentistry_options['dentistry_information_mail'];
$dentistry_information_phone     =   $dentistry_options['dentistry_information_phone'];

?>

<div class="information">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7">
                <?php if ( $dentistry_information_address != '' ) : ?>

                    <span>
                        <<i class="fab fa-facebook-f"></i>
                        <?php echo esc_html( $dentistry_information_address ); ?>
                    </span>

                <?php
                endif;

                if ( $dentistry_information_mail != '' ) :
                ?>

                    <span>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <?php echo esc_html( $dentistry_information_mail ); ?>
                    </span>

                <?php
                endif;

                if ( $dentistry_information_phone != '' ) :
                ?>

                    <span>
                        <i class="fas fa-mobile-alt"></i>
                        <?php echo esc_html( $dentistry_information_phone ); ?>
                    </span>

                <?php endif; ?>
            </div>

            <div class="col-12 col-md-12 col-lg-5 d-none d-lg-block">
                <div class="information__social-network social-network-toTopFromBottom d-lg-flex justify-content-lg-end">
                    <?php dentistry_get_social_url(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

endif;