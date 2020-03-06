<?php

global $dentistry_options;

$dentistry_on_off_share_single = $dentistry_options['dentistry_on_off_share_single'];

?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-post-single-item' ); ?>>
    <?php dentistry_post_formats(); ?>

    <div class="site-post-content">
        <?php dentistry_post_meta(); ?>

        <h2 class="site-post-title">
            <?php the_title(); ?>
        </h2>

        <div class="site-post-excerpt">
            <?php
            the_content();

            dentistry_link_page();
            ?>
        </div>
    </div>

    <?php

    if ( $dentistry_on_off_share_single == 1 || $dentistry_on_off_share_single == null ) :

        dentistry_post_share();

    endif;

    ?>
</div>

<?php
dentistry_comment_form();

get_template_part( 'template-parts/post/inc','related-post' );




