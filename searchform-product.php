<?php
/**
 * The template for displaying product search form
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$dentistry_product_cat     =   get_terms(
    array(
        'taxonomy'      =>  'product_cat',
        'hide_empty'    =>  true,
    )
);

if ( isset( $_GET['product_cat_id'] ) ) :

    $dentistry_cat_id_product   = $_GET['product_cat_id'];

else:

    $dentistry_cat_id_product = '';

endif;

?>
<form role="search" method="get" class="search-form-product d-flex" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <?php
    if ( !empty( $dentistry_product_cat ) ) :

        if ( !empty( $dentistry_cat_id_product ) ) :

            $dentistry_product_select       =   get_term( $dentistry_cat_id_product , 'product_cat' );
            $dentistry_text_name_product    =   $dentistry_product_select->name;

        else:

            $dentistry_text_name_product    =   esc_html__( 'Danh mục sản phẩm', 'dentistry' );

        endif;

        ?>

        <div class="product-cat-selector-search dropdown d-flex align-items-center">
            <div class="product-box-dropdown" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                <span class="text-product">
                    <?php echo esc_html( $dentistry_text_name_product ) ?>
                </span>

                <i class="fas fa-sort-down"></i>
            </div>

            <div class="dropdown-menu product-cat-list" aria-labelledby="dLabel">
                <span class="item-product-cat" data-cat-id="0">
                    <?php echo esc_html( $dentistry_text_name_product ); ?>
                </span>

                <?php foreach ( $dentistry_product_cat as $item ) : ?>

                    <span class="item-product-cat" data-cat-id="<?php echo esc_attr( $item->term_id ); ?>">
                        <?php echo esc_html( $item->name ); ?>
                    </span>

                <?php endforeach; ?>
            </div>
        </div>

    <?php endif; ?>

    <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field-product flex-grow-1" placeholder="<?php echo esc_attr__( 'Bạn muốn tìm sản phẩm... ', 'dentistry' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="search-product" />

    <button class="btn-submit global-transition" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'dentistry' ); ?>">
        <i class="fas fa-search" aria-hidden="true"></i>
    </button>

    <?php
    if ( !empty( $dentistry_product_cat ) ) :

        if ( !empty( $dentistry_cat_id_product ) ) :

            $cat_id_product_select =   $dentistry_cat_id_product;

        else:

            $cat_id_product_select = 0;

        endif;

        ?>

        <input class="product-cat-id" type="hidden" name="product_cat_id" value="<?php echo esc_attr( $cat_id_product_select ); ?>" />

    <?php endif; ?>

    <input type="hidden" name="post_type" value="product" />
</form>