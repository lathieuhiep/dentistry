<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class dentistry_widget_best_selling_products extends Widget_Base {

	public function get_categories() {
		return array( 'dentistry_widgets' );
	}

	public function get_name() {
		return 'dentistry-best-selling-products';
	}

	public function get_title() {
		return esc_html__( 'Sản phẩm bán chạy', 'dentistry' );
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
			'title',
			[
				'label'         =>  esc_html__( 'Tiêu đề', 'dentistry' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  esc_html__( 'Bán chạy', 'dentistry' ),
				'label_block'   =>  true
			]
		);

        $this->add_control(
            'select_type_product',
            [
                'label'     =>  esc_html__( 'Lấy sản phẩm theo', 'dentistry' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  1,
                'options'   =>  [
                    1   =>  esc_html__( 'Sản phẩm bán chạy', 'dentistry' ),
                    2   =>  esc_html__( 'Sản phẩm theo danh mục', 'dentistry' ),
                ],
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'total_sales_product',
            [
                'label'     =>  esc_html__( 'Số sản phẩm bán ra', 'dentistry' ),
                'type'      =>  Controls_Manager::NUMBER,
                'min'       =>  0,
                'max'       =>  '',
                'step'      =>  '1',
                'default'   =>  0,
                'condition' => [
                    'select_type_product' => '1',
                ],
            ]
        );

		$this->add_control(
			'select_cat',
			[
				'label'         =>  esc_html__( 'Select Category', 'dentistry' ),
				'type'          =>  Controls_Manager::SELECT,
				'options'       =>  dentistry_check_get_cat( 'product_cat' ),
				'label_block'   =>  true,
                'condition' => [
                    'select_type_product' => '2',
                ],
			]
		);

		$this->add_control(
			'limit',
			[
				'label'     =>  esc_html__( 'Number of Product', 'dentistry' ),
				'type'      =>  Controls_Manager::NUMBER,
				'default'   =>  12,
				'min'       =>  1,
				'max'       =>  100,
				'step'      =>  1,
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
            'row',
            [
                'label'     =>  esc_html__( 'Row', 'dentistry' ),
                'type'      =>  Controls_Manager::NUMBER,
                'min'       =>  1,
                'max'       =>  '',
                'step'      =>  '1',
                'default'   =>  6,
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
				'label'         => esc_html__('Autoplay?', 'dentistry'),
				'type'          => Controls_Manager::SWITCHER,
				'label_off'     => esc_html__('No', 'dentistry'),
				'label_on'      => esc_html__('Yes', 'dentistry'),
				'return_value'  => 'yes',
				'default'       => 'no',
			]
		);

		$this->add_control(
			'nav',
			[
				'label'         => esc_html__('Nav Slider', 'dentistry'),
				'type'          => Controls_Manager::SWITCHER,
				'label_on'      => esc_html__('Yes', 'dentistry'),
				'label_off'     => esc_html__('No', 'dentistry'),
				'return_value'  => 'yes',
				'default'       => 'yes',
			]
		);

		$this->add_control(
			'dots',
			[
				'label'         => esc_html__('Dots Slider', 'dentistry'),
				'type'          => Controls_Manager::SWITCHER,
				'label_on'      => esc_html__('Yes', 'dentistry'),
				'label_off'     => esc_html__('No', 'dentistry'),
				'return_value'  => 'yes',
				'default'       => 'no',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings       =   $this->get_settings_for_display();
		$select_cat     =   $settings['select_cat'];
		$loop_i         =   1;
		$row            =   $settings['row'];

        $data_settings_owl  =   [
            'items'     =>  1,
            'loop'      =>  ( 'yes' === $settings['loop'] ),
            'autoplay'  =>  ( 'yes' === $settings['autoplay'] ),
            'nav'       =>  ( 'yes' === $settings['nav'] ),
            'dots'      =>  ( 'yes' === $settings['dots'] ),
		];

		if ( !empty( $select_cat ) && $settings['select_type_product'] == 2 ) :

			$args = array(
				'post_type'         =>  'product',
				'posts_per_page'    =>  $settings['limit'],
				'order'             =>  $settings['order'],
				'orderby'           =>  $settings['order_by'],
				'tax_query'         =>  array(
					array(
						'taxonomy'  =>  'product_cat',
						'field'     =>  'term_id',
						'terms'     =>  array( $select_cat ),
					)
				)
			);

		else:

			$args = array(
				'post_type'         =>  'product',
				'posts_per_page'    =>  $settings['limit'],
				'meta_key'          =>  'total_sales',
				'order'             =>  $settings['order'],
				'orderby'           =>  'meta_value_num',
				'meta_query'        =>  array(
					array(
						'key'       => 'total_sales',
						'value'     => $settings['total_sales_product'],
						'compare'   => '>='
					)
				)
			);

        endif;

		$query = new \ WP_Query( $args );

		if ( $query->have_posts() ) :

            $count_total_product = $query->found_posts;

	?>

		<div class="element-best-selling-product">
			<h3 class="header element-title">
				<?php echo esc_html( $settings['title']  ); ?>
			</h3>

            <div class="element-product-content">
                <div class="custom-owl-carousel owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ); ?>'>
                    <?php
                    while ( $query->have_posts() ):
                        $query->the_post();

                        if ( $loop_i == 1 || $loop_i % $row == 1 ) :
                    ?>

                        <div class="item-box">

                    <?php endif; ?>

                        <div class="item-product d-flex">
                            <div class="img-product">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
                                    <?php the_post_thumbnail( 'large' ); ?>
                                </a>
                            </div>

                            <div class="item-content">
                                <h4 class="title-product">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>

                                <?php woocommerce_template_loop_price(); ?>
                            </div>
                        </div>

                    <?php if ( $loop_i % $row == 0 || $loop_i == $count_total_product ) : ?>

                        </div>

                    <?php
                        endif;

                        $loop_i++;

                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
		</div>

	<?php

		endif;
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new dentistry_widget_best_selling_products );