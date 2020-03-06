<?php
//Global variable redux
global $dentistry_options;

$dentistry_copyright = $dentistry_options ['dentistry_footer_copyright_editor'] == '' ? 'Copyright &amp; DiepLK' : $dentistry_options ['dentistry_footer_copyright_editor'];

?>

<div class="site-footer__copyright">
    <div class="container">
        <div class="site-copyright-menu text-center">
            <div class="site-copyright">
                <?php echo wp_kses_post( $dentistry_copyright ); ?>
            </div>
        </div>
    </div>
</div>