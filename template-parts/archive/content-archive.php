<?php

global $dentistry_options;

$dentistry_blog_sidebar_archive    =   !empty( $dentistry_options['dentistry_blog_sidebar_archive'] ) ? $dentistry_options['dentistry_blog_sidebar_archive'] : 'right';
$dentistry_class_col_content       =   dentistry_col_use_sidebar( $dentistry_blog_sidebar_archive, 'dentistry-sidebar-main' );
$dentistry_blog_per_row            =   $dentistry_options['dentistry_blog_per_row'];

?>

<div class="site-container site-blog">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $dentistry_class_col_content ); ?>">
                <div class="site-post-box">

                    <?php if ( have_posts() ) : ?>

                        <div class="row">

                            <?php while ( have_posts() ) : the_post(); ?>

                                <div id="post-<?php the_ID(); ?>" class="site-post-item col-12 col-md-6 col-lg-<?php echo esc_attr( 12 / $dentistry_blog_per_row ); ?>">
                                    <?php
                                        if ( ! is_search() ):
                                            get_template_part( 'template-parts/archive/content', 'archive-info' );
                                        else:
                                            get_template_part( 'template-parts/search/content', 'search-post' );
                                        endif;
                                    ?>
                                </div>

                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>

                    <?php

                    else:

                        if ( is_search() ) :
                            get_template_part( 'template-parts/search/content', 'search-no-data' );
                        endif;

                    endif; // end if ( have_posts )
                    ?>
                </div>

                <?php dentistry_pagination(); ?>
            </div>

            <?php
            if ( $dentistry_blog_sidebar_archive !== 'hide' ) :
                get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>