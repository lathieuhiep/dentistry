<?php
//Global variable redux
global $dentistry_options;

$multi_column     =   $dentistry_options ["dentistry_footer_multi_column"];
$multi_column_l   =   $dentistry_options ["dentistry_footer_multi_column_1"];
$multi_column_2   =   $dentistry_options ["dentistry_footer_multi_column_2"];
$multi_column_3   =   $dentistry_options ["dentistry_footer_multi_column_3"];
$multi_column_4   =   $dentistry_options ["dentistry_footer_multi_column_4"];

if( is_active_sidebar( 'dentistry-sidebar-footer-multi-column-1' ) || is_active_sidebar( 'dentistry-sidebar-footer-multi-column-2' ) || is_active_sidebar( 'dentistry-sidebar-footer-multi-column-3' ) || is_active_sidebar( 'dentistry-sidebar-footer-multi-column-4' ) ) :

?>

    <div class="site-footer__multi--column">
        <div class="container">
            <div class="row">
                <?php
                for( $i = 0; $i < $multi_column; $i++ ):

                    $j = $i +1;

                    if ( $i == 0 ) :
                        $dentistry_col = $multi_column_l;
                    elseif ( $i == 1 ) :
                        $dentistry_col = $multi_column_2;
                    elseif ( $i == 2 ) :
                        $dentistry_col = $multi_column_3;
                    else :
                        $dentistry_col = $multi_column_4;
                    endif;

                    if( is_active_sidebar( 'dentistry-sidebar-footer-multi-column-'.$j ) ):
                ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-<?php echo esc_attr( $dentistry_col ); ?>">

                        <?php dynamic_sidebar( 'dentistry-sidebar-footer-multi-column-'.$j ); ?>

                    </div>

                <?php
                    endif;

                endfor;
                ?>
            </div>
        </div>
    </div>

<?php endif; ?>