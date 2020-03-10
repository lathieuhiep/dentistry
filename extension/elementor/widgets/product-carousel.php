<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class dentistry_widget_product_carousel extends Widget_Base {

	public function get_categories() {
		return array( 'dentistry_widgets' );
	}

	public function get_name() {
		return 'dentistry-product-carousel';
	}

	public function get_title() {
		return esc_html__( 'Product Carousel', 'dentistry' );
	}

	public function get_icon() {
		return 'fas fa-shopping-cart';
	}

	public function get_script_depends() {
		return ['dentistry-elementor-custom'];
	}

	protected function _register_controls() {

		/* Start Section Query */
		$this->start_controls_section(
			'section_query',
			[
				'label' =>  esc_html__( 'Query', 'sport' )
			]
		);

		$this->add_control(
			'select_cat',
			[
				'label'         =>  esc_html__( 'Select Category', 'dentistry' ),
				'type'          =>  Controls_Manager::SELECT,
				'options'       =>  dentistry_check_get_cat( 'product_cat' ),
				'label_block'   =>  true
			]
		);

		$this->add_control(
			'limit',
			[
				'label'     =>  esc_html__( 'Number of Product', 'dentistry' ),
				'type'      =>  Controls_Manager::NUMBER,
				'default'   =>  5,
				'min'       =>  1,
				'max'       =>  100,
				'step'      =>  1,
			]
		);

		$this->add_control(
			'order_by',
			[
				'label'     =>  esc_html__( 'Order By', 'dentistry' ),
				'type'      =>  Controls_Manager::SELECT,
				'default'   =>  'id',
				'options'   =>  [
					'id'    =>  esc_html__( 'ID', 'dentistry' ),
					'title' =>  esc_html__( 'Title', 'dentistry' ),
					'date'  =>  esc_html__( 'Date', 'dentistry' ),
					'rand'  =>  esc_html__( 'Random', 'dentistry' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'     =>  esc_html__( 'Order', 'dentistry' ),
				'type'      =>  Controls_Manager::SELECT,
				'default'   =>  'ASC',
				'options'   =>  [
					'ASC'   =>  esc_html__( 'Ascending', 'dentistry' ),
					'DESC'  =>  esc_html__( 'Descending', 'dentistry' ),
				],
			]
		);

		$this->end_controls_section();
		/* End Section Query */

        /* Section Layout */
        $this->start_controls_section(
            'section_layout',
            [
                'label' =>  esc_html__( 'Layout Settings', 'dentistry' )
            ]
        );

        $this->add_control(
            'loop',
            [
                'type'          =>  Controls_Manager::SWITCHER,
                'label'         =>  esc_html__('Loop Slider ?', 'dentistry'),
                'label_off'     =>  esc_html__('No', 'dentistry'),
                'label_on'      =>  esc_html__('Yes', 'dentistry'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         =>  esc_html__('Autoplay?', 'dentistry'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_off'     =>  esc_html__('No', 'dentistry'),
                'label_on'      =>  esc_html__('Yes', 'dentistry'),
                'return_value'  =>  'yes',
                'default'       =>  'no',
            ]
        );

        $this->add_control(
            'nav',
            [
                'label'         =>  esc_html__('Nav Slider', 'dentistry'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'dentistry'),
                'label_off'     =>  esc_html__('No', 'dentistry'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label'         =>  esc_html__('Dots Slider', 'dentistry'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'dentistry'),
                'label_off'     =>  esc_html__('No', 'dentistry'),
                'return_value'  =>  'yes',
                'default'       =>  'no',
            ]
        );

        $this->add_control(
            'margin_item',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'dentistry' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  30,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_1200',
            [
                'label'     =>  esc_html__( 'Min Width 1200px', 'dentistry' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item',
            [
                'label'     =>  esc_html__( 'Number of Item', 'dentistry' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  3,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_992',
            [
                'label'     =>  esc_html__( 'Min Width 992px', 'dentistry' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_992',
            [
                'label'     =>  esc_html__( 'Number of Item', 'dentistry' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_768',
            [
                'label'     =>  esc_html__( 'Min Width 768px', 'dentistry' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_768',
            [
                'label'     =>  esc_html__( 'Number of Item', 'dentistry' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_568',
            [
                'label'     =>  esc_html__( 'Min Width 568px', 'dentistry' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_568',
            [
                'label'     =>  esc_html__( 'Number of Item', 'dentistry' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'margin_item_568',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'dentistry' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  15,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'max_width_567',
            [
                'label'     =>  esc_html__( 'Max Width 567px', 'dentistry' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_567',
            [
                'label'     =>  esc_html__( 'Number of Item', 'dentistry' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  1,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'margin_item_567',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'dentistry' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  0,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

		$settings   =   $this->get_settings_for_display();
		$select_cat =   $settings['select_cat'];

        $data_settings_owl  =   [
            'loop'          =>  ( 'yes' === $settings['loop'] ),
            'nav'           =>  ( 'yes' === $settings['nav'] ),
            'dots'          =>  ( 'yes' === $settings['dots'] ),
            'margin'        =>  $settings['margin_item'],
            'autoplay'      =>  ( 'yes' === $settings['autoplay'] ),
            'responsive'    => [
                '0' => array(
                    'items'     =>  $settings['item_567'],
                    'margin'    =>  $settings['margin_item_567']
                ),
                '576' => array(
                    'items'     =>  $settings['item_568'],
                    'margin'    =>  $settings['margin_item_568']
                ),
                '768' => array(
                    'items'     =>  $settings['item_768']
                ),
                '992' => array(
                    'items'     =>  $settings['item_992']
                ),
                '1200' => array(
                    'items'     =>  $settings['item']
                ),
            ],
        ];

		if ( !empty( $select_cat ) ) :

            $tax_query = array(
                array(
                    'taxonomy'  =>  'product_cat',
                    'field'     =>  'term_id',
                    'terms'     =>  array( $select_cat ),
                )
            );

		else:

            $tax_query = '';

		endif;

        $args = array(
            'post_type'         =>  'product',
            'posts_per_page'    =>  $settings['limit'],
            'order'             =>  $settings['order'],
            'orderby'           =>  $settings['order_by'],
            'tax_query'         =>  $tax_query
        );

		$query = new \ WP_Query( $args );

		if ( $query->have_posts() ) :

	?>

        <div class="element-product-carousel element-box-global">
            <?php
            if ( !empty( $select_cat ) ) :

                $cate_product   =   get_term_by('term_id', $select_cat, 'product_cat');

            ?>

                <h3 class="name-cate-product">
                    <a href="<?php echo esc_url( get_term_link( $cate_product->term_id, 'product_cat' ) ); ?>" title="<?php echo esc_attr( $cate_product->name ); ?>">
                        <?php echo esc_html( $cate_product->name ); ?>
                    </a>
                </h3>

            <?php endif; ?>

            <div class="element-product-content">
                <div class="custom-owl-carousel custom-equal-height-owl owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ) ; ?>'>
                    <?php
                    while ( $query->have_posts() ):
                        $query->the_post();

                        global $product;
                        $review_count = $product->get_review_count();
                    ?>

                        <div class="item-product woocommerce d-flex flex-column flex-grow-1">
                            <div class="img-product flex-grow-1">
                                <?php the_post_thumbnail( 'large' ); ?>

                                <?php woocommerce_show_product_loop_sale_flash(); ?>
                            </div>

                            <div class="item-content d-flex flex-column align-items-center justify-content-center">
                                <?php
                                if ( $review_count > 0 ) :
                                    woocommerce_template_loop_rating();
                                else:
                                ?>

                                <div class="reviews-content">
                                    <div class="star"></div>
                                </div>

                                <?php endif; ?>

                                <h3 class="title-product">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <div class="product-price flex-grow-1">
                                    <?php woocommerce_template_loop_price(); ?>
                                </div>

                                <div class="product-add-to-cart">
                                    <?php woocommerce_template_loop_add_to_cart(); ?>
                                </div>
                            </div>

                            <?php dentistry_yith_woo_meta(); ?>
                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>

	<?php

		endif;
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new dentistry_widget_product_carousel );