<?php
get_header();

global $dentistry_options;

$dentistry_blog_sidebar_single = !empty( $dentistry_options['dentistry_blog_sidebar_single'] ) ? $dentistry_options['dentistry_blog_sidebar_single'] : 'right';

$dentistry_class_col_content = dentistry_col_use_sidebar( $dentistry_blog_sidebar_single, 'dentistry-sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $dentistry_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $dentistry_blog_sidebar_single !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

