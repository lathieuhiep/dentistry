<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class dentistry_widget_text_box extends Widget_Base {

    public function get_categories() {
        return array( 'dentistry_widgets' );
    }

    public function get_name() {
        return 'dentistry-text-box';
    }

    public function get_title() {
        return esc_html__( 'Tiện ích', 'dentistry' );
    }

    public function get_icon() {
        return 'fa fa-file-text-o';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'dentistry' ),
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label'     =>  esc_html__( 'Icon Image', 'dentistry' ),
                'type'      =>  Controls_Manager::MEDIA,
                'default'   =>  [
                    'url'   =>  Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         =>  esc_html__( 'Tiêu đề', 'dentistry' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Miễn phí vận chuyển', 'dentistry' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'description',
            [
                'label'     =>  esc_html__( 'Mô tả', 'dentistry' ),
                'type'      =>  Controls_Manager::TEXTAREA,
                'default'   =>  esc_html__( 'Cho đơn hàng từ 500.000 VNĐ trong bán kính 5km', 'dentistry' ),
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings_for_display();

    ?>

        <div class="elementor-text-box d-flex">
            <div class="icon-image">
                <?php echo wp_kses_post( wp_get_attachment_image( $settings['icon_image']['id'], 'full' ) ); ?>
            </div>

            <div class="content">
                <h4 class="title">
                    <?php echo esc_html( $settings['title'] ); ?>
                </h4>

                <p class="description">
                    <?php echo wp_kses_post( $settings['description'] ); ?>
                </p>
            </div>
        </div>

    <?php

    }

    protected function _content_template() {

    ?>

        <div class="elementor-text-box d-flex">
            <div class="icon-image">
                <img src="{{ settings.icon_image.url }}">
            </div>

            <div class="content">
                <h4 class="title">
                    {{{ settings.title }}}
                </h4>

                <p class="description">
                    {{{ settings.description }}}
                </p>
            </div>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new dentistry_widget_text_box );