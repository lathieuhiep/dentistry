<?php

/* GET fonts google */
if ( ! function_exists( 'dentistry_fonts_url' ) ) :

	function dentistry_fonts_url() {
		$dentistry_fonts_url = '';

		/* Translators: If there are characters in your language that are not
		* supported by Open Sans, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$dentistry_font_google = _x( 'on', 'Google font: on or off', 'dentistry' );

		if ( 'off' !== $dentistry_font_google ) {
			$dentistry_font_families = array();

			if ( 'off' !== $dentistry_font_google ) {
				$dentistry_font_families[] = 'Roboto Slab:400,500,600,700';
			}

			$dentistry_query_args = array(
				'family' => urlencode( implode( '|', $dentistry_font_families ) ),
				'subset' => urlencode( 'latin,vietnamese' ),
			);

			$dentistry_fonts_url = add_query_arg( $dentistry_query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $dentistry_fonts_url );
	}

endif;

// Remove jquery migrate
add_action( 'wp_default_scripts', 'dentistry_remove_jquery_migrate' );
function dentistry_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}

//Register Back-End script
add_action('admin_enqueue_scripts', 'dentistry_register_back_end_scripts');

function dentistry_register_back_end_scripts(){

	/* Start Get CSS Admin */
	wp_enqueue_style( 'dentistry-admin-styles', get_theme_file_uri( '/extension/assets/css/admin-styles.css' ) );

}

//Register Front-End Styles
add_action('wp_enqueue_scripts', 'dentistry_register_front_end');

function dentistry_register_front_end() {

	/*
	* Start Get Css Front End
	* */
	wp_enqueue_style( 'dentistry-fonts', dentistry_fonts_url(), array(), null );

	/* Start main Css */
	wp_enqueue_style( 'dentistry-library', get_theme_file_uri( '/css/library/minify/library.min.css' ), array(), '' );
	/* End main Css */

    /* Start fontawesome 5 */
    wp_enqueue_style( 'fontawesome-5', get_theme_file_uri( '/fonts/fontawesome/css/all.min.css' ), array(), '5.12.1' );
    /* End fontawesome 5 */

	/*  Start Style Css   */
	wp_enqueue_style( 'dentistry-style', get_stylesheet_uri() );
	/*  Start Style Css   */

	/*
	* End Get Css Front End
	* */

	/*
	* Start Get Js Front End
	* */

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'dentistry-library', get_theme_file_uri( '/js/library/minify/library.min.js' ), array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'dentistry-custom', get_theme_file_uri( '/js/custom.js' ), array(), '1.0.0', true );

	/*
   * End Get Js Front End
   * */

}