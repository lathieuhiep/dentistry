<?php

    $dentistry_audio = get_post_meta(  get_the_ID() , '_format_audio_embed', true );
    if( $dentistry_audio != '' ):

?>
        <div class="site-post-audio">

            <?php if( wp_oembed_get( $dentistry_audio ) ) : ?>

                <?php echo wp_oembed_get( $dentistry_audio ); ?>

            <?php else : ?>

                <?php echo balanceTags( $dentistry_audio ); ?>

            <?php endif; ?>

        </div>

<?php endif;?>