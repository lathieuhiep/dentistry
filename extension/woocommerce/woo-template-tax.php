<?php
/* Start add taxonomy woo */
add_action( 'init', 'dentistry_register_taxonomy_woo', 5 );

function dentistry_register_taxonomy_woo() {

    $dentistry_taxonomy_product_type = array(
        'name'              =>  _x( 'Brands', 'taxonomy general name', 'dentistry' ),
        'singular_name'     =>  _x( 'Brands', 'taxonomy singular name', 'dentistry' ),
        'search_items'      =>  esc_html__( 'Search Product Type', 'dentistry' ),
        'all_items'         =>  esc_html__( 'All Product Type', 'dentistry' ),
        'parent_item'       =>  esc_html__( 'Parent category', 'dentistry' ),
        'parent_item_colon' =>  esc_html__( 'Parent category:', 'dentistry' ),
        'edit_item'         =>  esc_html__( 'Edit category', 'dentistry' ),
        'update_item'       =>  esc_html__( 'Update category', 'dentistry' ),
        'add_new_item'      =>  esc_html__( 'Add New category', 'dentistry' ),
        'new_item_name'     =>  esc_html__( 'New category Name', 'dentistry' ),
        'menu_name'         =>  esc_html__( 'Brands', 'dentistry' ),
    );
    
    $dentistry_taxonomy_product_type_args = array(
        'labels'                =>  $dentistry_taxonomy_product_type,
        'hierarchical'          =>  true,
        'public'                =>  true,
        'show_ui'               =>  true,
        'show_admin_column'     =>  true,
        'query_var'             =>  true,
        'update_count_callback' =>  '_update_post_term_count',
        'rewrite'               =>  array( 'slug' => 'nhan-hieu' ),
    );
    
    register_taxonomy( 'product_brand', array( 'product' ), $dentistry_taxonomy_product_type_args );

}