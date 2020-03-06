<?php
get_header();

global $dentistry_options;

$dentistry_title = $dentistry_options['dentistry_404_title'];
$dentistry_content = $dentistry_options['dentistry_404_editor'];
$dentistry_background = $dentistry_options['dentistry_404_background']['id'];

?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $dentistry_background ) ):
                        echo wp_get_attachment_image( $dentistry_background, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $dentistry_title != '' ):
                        echo esc_html( $dentistry_title );
                    else:
                        esc_html_e( 'Awww...Do Not Cry', 'dentistry' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $dentistry_content != '' ) :
                        echo wp_kses_post( $dentistry_content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'It is just a 404 Error!', 'dentistry' ); ?>
                            <br />
                            <?php esc_html_e( 'What you are looking for may have been misplaced', 'dentistry' ); ?>
                            <br />
                            <?php esc_html_e( 'in Long Term Memory.', 'dentistry' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'dentistry'); ?>">
                        <?php esc_html_e('Go to the Home Page', 'dentistry'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>