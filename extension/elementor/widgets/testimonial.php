<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class dentistry_widget_testimonial extends Widget_Base {

	public function get_categories() {
		return array( 'dentistry_widgets' );
	}

	public function get_name() {
		return 'dentistry-testimonial';
	}

	public function get_title() {
		return esc_html__( 'Testimonial', 'dentistry' );
	}

	public function get_icon() {
		return 'fa fa-commenting-o';
	}

	public function get_script_depends() {
		return ['dentistry-elementor-custom'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Heading', 'dentistry' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'         =>  esc_html__( 'Tiêu đề', 'dentistry' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       => 'Khách hàng đánh giá',
				'label_block'   =>  true
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_testimonial',
			[
				'label' => esc_html__( 'Testimonial', 'dentistry' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_name', [
				'label'         =>  esc_html__( 'Tên', 'dentistry' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       => 'Tên',
				'label_block'   =>  true,
			]
		);

		$repeater->add_control(
			'list_avatar',
			[
				'label'     =>  esc_html__( 'Ảnh', 'dentistry' ),
				'type'      =>  Controls_Manager::MEDIA,
				'default'   =>  [
					'url'   =>  Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label'     =>  esc_html__( 'Content', 'dentistry' ),
				'type'      =>  Controls_Manager::TEXTAREA,
				'rows'      => 10,
				'default'   => '',
			]
		);

		$this->add_control(
			'list',
			[
				'label'     =>  '',
				'type'      =>  Controls_Manager::REPEATER,
				'fields'    =>  $repeater->get_controls(),
				'default'   =>  [
					[
						'list_name'     =>  'Tên 1',
						'list_content'  =>  'Nhận xét'
					],
					[
						'list_name'     =>  'Tên 2',
						'list_content'  =>  'Nhận xét'
					],
					[
						'list_name'     =>  'Tên 3',
						'list_content'  =>  'Nhận xét'
					],
				],
				'title_field' => '{{{ list_name }}}',
			]
		);

		$this->end_controls_section();

		/* Section Slides */
		$this->start_controls_section(
			'section_slides',
			[
				'label' =>  esc_html__( 'Slides', 'dentistry' )
			]
		);

		$this->add_control(
			'loop',
			[
				'type'          =>  Controls_Manager::SWITCHER,
				'label'         =>  esc_html__('Loop ?', 'dentistry'),
				'label_off'     =>  esc_html__('No', 'dentistry'),
				'label_on'      =>  esc_html__('Yes', 'dentistry'),
				'return_value'  =>  'yes',
				'default'       =>  'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'         => esc_html__('Autoplay ?', 'dentistry'),
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
				'default'       => 'no',
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
                'default'       =>  'yes',
            ]
        );

		$this->end_controls_section();
		/* End Section Slides */

	}

	protected function render() {

		$settings   =   $this->get_settings();

		$data_settings_owl  =   [
            'items'         =>  1,
			'loop'          =>  ( 'yes' === $settings['loop'] ),
			'autoplay'      =>  ( 'yes' === $settings['autoplay'] ),
			'nav'           =>  ( 'yes' === $settings['nav'] ),
            'dots'          =>  ( 'yes' === $settings['dots'] ),
			'margin'        =>  0,
		];

	?>

		<div class="element-testimonial">
            <h4 class="title-testimonial element-title">
                <?php echo esc_html( $settings['heading'] ); ?>
            </h4>

            <?php if ( $settings['list'] ) : ?>

                <div class="custom-owl-carousel owl-carousel owl-theme element-box-global" data-settings-owl='<?php echo esc_attr( wp_json_encode( $data_settings_owl ) ); ?>'>
                    <?php foreach ( $settings['list'] as $item ) : ?>

                        <div class="item text-center">
                            <div class="avatar">
                                <?php echo wp_get_attachment_image( $item['list_avatar']['id'], array( '105', '105' ) ); ?>
                            </div>

                            <h5 class="name">
                                <?php echo esc_html( $item['list_name'] ); ?>
                            </h5>

                            <p class="item-content">
                                <?php echo wp_kses_post( $item['list_content'] ); ?>
                            </p>
                        </div>

                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

		</div>

		<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new dentistry_widget_testimonial );