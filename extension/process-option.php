<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','dentistry_config_theme' );

        function dentistry_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $dentistry_options;
                    $dentistry_favicon = $dentistry_options['dentistry_favicon_upload']['url'];

                    if( $dentistry_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $dentistry_favicon ) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'dentistry_custom_css', 99 );

        function dentistry_custom_css() {

            global $dentistry_options;

            $dentistry_typo_selecter_1   =   $dentistry_options['dentistry_custom_typography_1_selector'];

            $dentistry_typo1_font_family   =   $dentistry_options['dentistry_custom_typography_1']['font-family'] == '' ? '' : $dentistry_options['dentistry_custom_typography_1']['font-family'];

            $dentistry_css_style = '';

            if ( $dentistry_typo1_font_family != '' ) :
                $dentistry_css_style .= ' '.esc_attr( $dentistry_typo_selecter_1 ).' { font-family: '.balanceTags( $dentistry_typo1_font_family, true ).' }';
            endif;

            if ( $dentistry_css_style != '' ) :
                wp_add_inline_style( 'dentistry-style', $dentistry_css_style );
            endif;

        }

    endif;
