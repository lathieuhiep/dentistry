<?php

$dentistry_video_post = get_post_meta(  get_the_ID() , 'dentistry_video_post', true );

if ( !empty( $dentistry_video_post ) ):

?>

    <div class="site-post-video">
        <?php echo wp_oembed_get( $dentistry_video_post ); ?>
    </div>

<?php endif;?>