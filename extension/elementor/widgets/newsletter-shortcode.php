<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class dentistry_widget_newsletter_shortcode extends Widget_Base {

    public function get_categories() {
        return array( 'dentistry_widgets' );
    }

    public function get_name() {
        return 'dentistry-newsletter-shortcode';
    }

    public function get_title() {
        return esc_html__( 'Newsletter ShortCode', 'dentistry' );
    }

    public function get_icon() {
        return 'far fa-envelope';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Text', 'dentistry' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         =>  esc_html__( 'Title', 'dentistry' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Nhận tin hàng ngày', 'dentistry' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'         =>  esc_html__( 'Sub Title', 'dentistry' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Đăng kí để nhận bản tin', 'dentistry' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'short_code',
            [
                'label'         =>  esc_html__( 'Short Code', 'plugin-domain' ),
                'type'          =>  \Elementor\Controls_Manager::TEXTAREA,
                'rows'          =>  10,
                'default'       =>  '[newsletter_form button_label="Đăng kí"][newsletter_field name="email" label="" placeholder="Nhận thông tin của chúng tôi"][/newsletter_form]',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings_for_display();

        ?>

        <div class="element-newsletter text-center">
            <h4 class="title">
                <?php echo esc_html( $settings['title'] ); ?>
            </h4>

            <p class="sub-title">
                <?php echo esc_html( $settings['sub_title'] ); ?>
            </p>

            <i class="far fa-envelope"></i>

            <div class="content">
                <?php echo do_shortcode( $settings['short_code'] ); ?>
            </div>
        </div>

        <?php

    }


}

Plugin::instance()->widgets_manager->register_widget_type( new dentistry_widget_newsletter_shortcode );