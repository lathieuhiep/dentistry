<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class dentistry_widget_breadcrumbs extends Widget_Base {

	public function get_categories() {
		return array( 'dentistry_widgets' );
	}

	public function get_name() {
		return 'dentistry-breadcrumbs';
	}

	public function get_title() {
		return esc_html__( 'Breadcrumbs', 'dentistry' );
	}

	public function get_icon() {
		return 'eicon-text-area';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'dentistry' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      =>  'background',
				'selector'  =>  '{{WRAPPER}} .tz-breadcrumb',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings       =   $this->get_settings_for_display();

        get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );

	}

}

Plugin::instance()->widgets_manager->register_widget_type( new dentistry_widget_breadcrumbs );