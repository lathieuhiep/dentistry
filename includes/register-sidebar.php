<?php
/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'dentistry_widgets_init');

function dentistry_widgets_init() {

	$dentistry_widgets_arr  =   array(

		'dentistry-sidebar-main'    =>  array(
			'name'              =>  esc_html__( 'Sidebar Main', 'dentistry' ),
			'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'dentistry' )
		),

		'dentistry-sidebar-wc' =>  array(
			'name'              =>  esc_html__( 'Sidebar Woocommerce', 'dentistry' ),
			'description'       =>  esc_html__( 'Display sidebar on page shop.', 'dentistry' )
		),

		'dentistry-sidebar-footer-multi-column-1'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 1', 'dentistry' ),
			'description'       =>  esc_html__('Display footer column 1 on all page.', 'dentistry' )
		),

		'dentistry-sidebar-footer-multi-column-2'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 2', 'dentistry' ),
			'description'       =>  esc_html__('Display footer column 2 on all page.', 'dentistry' )
		),

		'dentistry-sidebar-footer-multi-column-3'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 3', 'dentistry' ),
			'description'       =>  esc_html__('Display footer column 3 on all page.', 'dentistry' )
		),

		'dentistry-sidebar-footer-multi-column-4'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 4', 'dentistry' ),
			'description'       =>  esc_html__('Display footer column 4 on all page.', 'dentistry' )
		)

	);

	foreach ( $dentistry_widgets_arr as $dentistry_widgets_id => $dentistry_widgets_value ) :

		register_sidebar( array(
			'name'          =>  esc_attr( $dentistry_widgets_value['name'] ),
			'id'            =>  esc_attr( $dentistry_widgets_id ),
			'description'   =>  esc_attr( $dentistry_widgets_value['description'] ),
			'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
			'after_widget'  =>  '</section>',
			'before_title'  =>  '<h2 class="widget-title">',
			'after_title'   =>  '</h2>'
		));

	endforeach;

}