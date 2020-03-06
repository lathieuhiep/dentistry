<?php

global $dentistry_options;

$dentistry_show_loading = $dentistry_options['dentistry_general_show_loading'] == '' ? '0' : $dentistry_options['dentistry_general_show_loading'];

if(  $dentistry_show_loading == 1 ) :

    $dentistry_loading_url  = $dentistry_options['dentistry_general_image_loading']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $dentistry_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $dentistry_loading_url ); ?>" alt="<?php esc_attr_e('loading...','dentistry') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','dentistry') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>