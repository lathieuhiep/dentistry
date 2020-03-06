<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 *constants
 */
if( !function_exists('dentistry_setup') ):

    function dentistry_setup() {

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) )
            $content_width = 900;

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'dentistry', get_parent_theme_file_path( '/languages' ) );

        /**
         * Set up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support post thumbnails.
         *
         */
        add_theme_support( 'custom-header' );

        add_theme_support( 'custom-background' );

        //Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menu('primary','Primary Menu');

        // add theme support title-tag
        add_theme_support( 'title-tag' );

        /*  Post Type   */
        add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

        /*
	    * This theme styles the visual editor to resemble the theme style,
	    * specifically font, colors, icons, and column width.
	    */
        add_editor_style( array( 'css/editor-style.css', dentistry_fonts_url()) );
    }

    add_action( 'after_setup_theme', 'dentistry_setup' );

endif;

/**
 * Required: Plugin Activation
 */
require get_parent_theme_file_path( '/includes/plugin-activation.php' );

/**
* Required: include plugin theme scripts
*/
require get_parent_theme_file_path( '/extension/process-option.php' );

if ( class_exists( 'ReduxFramework' ) ) {
    /*
     * Required: Redux Framework
     */
    require get_parent_theme_file_path( '/extension/option-reudx/theme-options.php' );
}

if ( class_exists( 'RW_Meta_Box' ) ) {
    /*
     * Required: Meta Box Framework
     */
    require get_parent_theme_file_path( '/extension/meta-box/meta-box-options.php' );

}

if ( ! function_exists( 'rwmb_meta' ) ) {

    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }

}

if ( did_action( 'elementor/loaded' ) ) :
    /*
     * Required: Elementor
     */
    require get_parent_theme_file_path( '/extension/elementor/elementor.php' );

endif;

/* Require Widgets */
foreach(glob( get_parent_theme_file_path( '/extension/widgets/*.php' ) ) as $dentistry_file_widgets ) {
    require $dentistry_file_widgets;
}

if ( class_exists('Woocommerce') ) :
    /*
     * Required: Woocommerce
     */
    require get_parent_theme_file_path( '/extension/woocommerce/woo-template-tax.php' );
    require get_parent_theme_file_path( '/extension/woocommerce/woo-template-hooks.php' );
    require get_parent_theme_file_path( '/extension/woocommerce/woo-template-functions.php' );

endif;

/**
 * Required: Register Sidebar
 */
require get_parent_theme_file_path( '/includes/register-sidebar.php' );

/**
 * Required: Theme Scripts
 */
require get_parent_theme_file_path( '/includes/theme-scripts.php' );

/* post formats */
function dentistry_post_formats() {

	if( has_post_format('audio') || has_post_format('video') ):
		get_template_part( 'template-parts/post/content','video' );
    elseif ( has_post_format('gallery') ):
		get_template_part( 'template-parts/post/content','gallery' );
	else:
		get_template_part( 'template-parts/post/content','image' );
	endif;

}

/**
 * Show full editor
 */
if ( !function_exists('dentistry_ilc_mce_buttons') ) :

    function dentistry_ilc_mce_buttons( $dentistry_buttons_TinyMCE ) {

        array_push( $dentistry_buttons_TinyMCE,
                "backcolor",
                "anchor",
                "hr",
                "sub",
                "sup",
                "fontselect",
                "fontsizeselect",
                "styleselect",
                "cleanup"
            );

        return $dentistry_buttons_TinyMCE;

    }

    add_filter("mce_buttons_2", "dentistry_ilc_mce_buttons");

endif;

// Start Customize mce editor font sizes
if ( ! function_exists( 'dentistry_mce_text_sizes' ) ) :

    function dentistry_mce_text_sizes( $dentistry_font_size_text ){
        $dentistry_font_size_text['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px";
        return $dentistry_font_size_text;
    }

    add_filter( 'tiny_mce_before_init', 'dentistry_mce_text_sizes' );

endif;
// End Customize mce editor font sizes

/* callback comment list */
function dentistry_comments( $dentistry_comment, $dentistry_comment_args, $dentistry_comment_depth ) {

    if ( 'div' === $dentistry_comment_args['style'] ) :

        $dentistry_comment_tag       = 'div';
        $dentistry_comment_add_below = 'comment';

    else :

        $dentistry_comment_tag       = 'li';
        $dentistry_comment_add_below = 'div-comment';

    endif;

?>
    <<?php echo $dentistry_comment_tag ?> <?php comment_class( empty( $dentistry_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

    <?php if ( 'div' != $dentistry_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

    <?php endif; ?>

    <div class="comment-author vcard">
        <?php if ( $dentistry_comment_args['avatar_size'] != 0 ) echo get_avatar( $dentistry_comment, $dentistry_comment_args['avatar_size'] ); ?>

    </div>

    <?php if ( $dentistry_comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation">
            <?php esc_html_e( 'Your comment is awaiting moderation.', 'dentistry' ); ?>
        </em>
    <?php endif; ?>

    <div class="comment-meta commentmetadata">
        <div class="comment-meta-box">
             <span class="name">
                <?php comment_author_link(); ?>
            </span>
            <span class="comment-metadata">
                <?php comment_date(); ?>
            </span>

            <?php edit_comment_link( esc_html__( 'Edit ', 'dentistry' ) ); ?>

            <?php comment_reply_link( array_merge( $dentistry_comment_args, array( 'add_below' => $dentistry_comment_add_below, 'depth' => $dentistry_comment_depth, 'max_depth' => $dentistry_comment_args['max_depth'] ) ) ); ?>

        </div>

        <div class="comment-text-box">
            <?php comment_text(); ?>
        </div>
    </div>

    <?php if ( 'div' != $dentistry_comment_args['style'] ) : ?>
        </div>
    <?php endif; ?>

<?php
}
/* callback comment list */

/*
 * Content Nav
 */

if ( ! function_exists( 'dentistry_comment_nav' ) ) :

    function dentistry_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

    ?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
                    <?php esc_html_e( 'Comment navigation', 'dentistry' ); ?>
                </h2>

                <div class="nav-links">
                    <?php
                    if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'dentistry' ) ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'dentistry' ) ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->

    <?php
        endif;
    }

endif;

/* Start Social Network */
function dentistry_get_social_url() {

    global $dentistry_options;
    $dentistry_social_networks = dentistry_get_social_network();

    foreach( $dentistry_social_networks as $dentistry_social ) :
        $dentistry_social_url = $dentistry_options['dentistry_social_network_' . $dentistry_social['id']];

        if( $dentistry_social_url ) :
?>

        <div class="social-network-item item-<?php echo esc_attr( $dentistry_social['id'] ); ?>">
            <a href="<?php echo esc_url( $dentistry_social_url ); ?>">
                <i class="fab fa-<?php echo esc_attr( $dentistry_social['title'] ); ?>" aria-hidden="true"></i>
            </a>
        </div>


<?php
        endif;

    endforeach;
}

function dentistry_get_social_network() {
    return array(

        array('id' => 'facebook', 'title' => 'facebook-f'),
        array('id' => 'youtube', 'title' => 'youtube'),
        array('id' => 'twitter', 'title' => 'twitter'),
        array('id' => 'instagram', 'title' => 'instagram'),

    );
}
/* End Social Network */

/* Start pagination */
function dentistry_pagination() {

    the_posts_pagination( array(
        'type'                  =>  'list',
        'mid_size'              =>  2,
        'prev_text'             =>  '<i class="fas fa-chevron-left"></i>',
        'next_text'             =>  '<i class="fas fa-chevron-right"></i>',
        'screen_reader_text'    =>  '&nbsp;',
    ) );

}

// pagination nav query
function dentistry_paging_nav_query( $dentistry_querry ) {

    $dentistry_pagination_args  =   array(

        'prev_text' =>  '<i class="fas fa-chevron-left"></i>',
        'next_text' =>  '<i class="fas fa-chevron-right"></i>',
        'current'   =>  max( 1, get_query_var('paged') ),
        'total'     =>  $dentistry_querry -> max_num_pages,
        'type'      =>  'list',

    );

    $dentistry_paginate_links = paginate_links( $dentistry_pagination_args );

    if ( $dentistry_paginate_links ) :

    ?>
        <nav class="pagination">
            <?php echo $dentistry_paginate_links; ?>
        </nav>

    <?php

    endif;

}
/* End pagination */

// Sanitize Pagination
add_action('navigation_markup_template', 'dentistry_sanitize_pagination');
function dentistry_sanitize_pagination( $dentistry_content ) {
    // Remove role attribute
    $dentistry_content = str_replace('role="navigation"', '', $dentistry_content);

    // Remove h2 tag
    $dentistry_content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $dentistry_content);

    return $dentistry_content;
}

/* Start Get col global */
function dentistry_col_use_sidebar( $option_sidebar, $active_sidebar ) {

    if ( $option_sidebar != 'hide' && is_active_sidebar( $active_sidebar ) ):

        if ( $option_sidebar == 'left' ) :
            $class_position_sidebar = ' order-1 order-md-2';
        else:
            $class_position_sidebar = ' order-1';
        endif;

        $class_col_content = 'col-12 col-md-8 col-lg-9' . $class_position_sidebar;
    else:
        $class_col_content = 'col-md-12';
    endif;

    return $class_col_content;
}

function dentistry_col_sidebar() {
    $class_col_sidebar = 'col-12 col-md-4 col-lg-3';

    return $class_col_sidebar;
}
/* End Get col global */

/* Start Post Meta */
function dentistry_post_meta() {
?>

    <div class="site-post-meta d-sm-flex align-items-sm-end justify-content-sm-between">
        <div class="site-post-date">
            <span class="post-day">
                <?php echo get_the_date( 'd' ); ?>
            </span>

            <span class="post-my">
                / <?php echo get_the_date( 'M, Y' ); ?>
            </span>
        </div>

        <div class="site-entry-meta">
            <span class="site-post-author">
                <i class="fas fa-user"></i>

                <?php echo esc_html__('Tác giả:','dentistry');?>

                <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') );?>">
                    <?php the_author();?>
                </a>
            </span>

            <span class="site-post-comments">
                <i class="fas fa-comments"></i>

                <?php
                comments_popup_link( '0 '. esc_html__('Bình luận','dentistry'),'1 '. esc_html__('Bình luận','dentistry'), '% '. esc_html__('Bình luận','dentistry') );
                ?>
            </span>
        </div>
    </div>

<?php
}
/* End Post Meta */

/* Start Link Pages */
function dentistry_link_page() {

    wp_link_pages( array(
        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'dentistry' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
    ) );

}
/* End Link Pages */

/* Start comment */
function dentistry_comment_form() {

    if ( comments_open() || get_comments_number() ) :
?>

        <div class="site-comments">
            <?php comments_template( '', true ); ?>
        </div>

<?php
    endif;
}
/* End comment */

/* Start get Category check box */
function dentistry_check_get_cat( $type_taxonomy ) {

    $cat_check    =   array();
    $category     =   get_terms(
        array(
            'taxonomy'      =>  $type_taxonomy,
            'hide_empty'    =>  false
        )
    );

    if ( isset( $category ) && !empty( $category ) ):

        foreach( $category as $item ) {

            $cat_check[$item->term_id]  =   $item->name;

        }

    endif;

    return $cat_check;

}
/* End get Category check box */

/* Start Change archive title */
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    } elseif ( is_tax() ) { //for custom post types
        $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
    }elseif ( is_post_type_archive() ) {
        /* translators: Post type archive title. %s: Post type name. */
        $title = sprintf( __( '%1$s' ), post_type_archive_title( '', false ) );
    }
    return $title;
});
/* End Change archive title */

/* Start share */
function dentistry_post_share() {

?>

    <div class="site-post-share">
        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="" data-layout="button_count" data-share="true" data-action="like" data-size="small"></div>
    </div>

<?php

}

/* Start opengraph */
function dentistry_doctype_opengraph( $output ) {
	return $output . '
 xmlns:og="http://opengraphprotocol.org/schema/"
 xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'dentistry_doctype_opengraph');

function dentistry_opengraph() {
	global $post;

	if( is_single() ) :

		if( has_post_thumbnail( $post->ID ) ) :
			$img_src = get_the_post_thumbnail_url( get_the_ID(),'full' );
		else :
			$img_src = get_theme_file_uri( '/images/no-image.png' );
		endif;

		if( $excerpt = $post->post_excerpt ) :
			$excerpt = strip_tags( $post->post_excerpt );
			$excerpt = str_replace( "", "'", $excerpt );
		else :
			$excerpt = get_bloginfo( 'description' );
		endif;

?>
        <meta property="og:title" content="<?php the_title(); ?>"/>
        <meta property="og:description" content="<?php echo esc_attr( $excerpt ); ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="<?php the_permalink(); ?>"/>
        <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo() ); ?>"/>
        <meta property="og:image" content="<?php echo esc_url( $img_src ); ?>"/>

<?php

	else :
		return;
	endif;
}
add_action( 'wp_head', 'dentistry_opengraph', 5 );
/* End opengraph */

/* Start Facebook SDK */
function dentistry_facebook_sdk() {

	if ( is_single() ) :

?>

        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

<?php

	endif;

}

add_action( 'wp_footer', 'dentistry_facebook_sdk' );

/* End share */
