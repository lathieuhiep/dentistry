<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class dentistry_widget_contact_us extends Widget_Base {

    public function get_categories() {
        return array( 'dentistry_widgets' );
    }

    public function get_name() {
        return 'dentistry-contact-us';
    }

    public function get_title() {
        return esc_html__( 'Contact Us', 'dentistry' );
    }

    public function get_icon() {
        return 'fa fa-envelope';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'dentistry' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         =>  esc_html__( 'Tiêu đề', 'dentistry' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'LIÊN HỆ', 'dentistry' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'description',
            [
                'label'     =>  esc_html__( 'Mô tả', 'dentistry' ),
                'type'      =>  Controls_Manager::TEXTAREA,
                'default'   =>  'Nhà cung cấp thiết bị y tế. Nha sĩ & phòng khám nha khoa',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_contact',
            [
                'label' => esc_html__( 'Địa chỉ', 'dentistry' ),
            ]
        );

        $this->add_control(
            'address',
            [
                'label'     =>  esc_html__( 'Địa chỉ', 'plugin-name' ),
                'type'      =>  Controls_Manager::TEXTAREA,
                'rows'      =>  5,
                'default'   =>  'Số 8 ngõ 43 Nguyễn Ngọc Nại, Thanh Xuân, Hà Nội',
            ]
        );

        $this->add_control(
            'email', [
                'label'         =>  esc_html__( 'Email', 'dentistry' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'thietbirang@gmail.com',
                'label_block'   =>  true,
            ]
        );

        $this->add_control(
            'hot_line', [
                'label'         =>  esc_html__( 'HotLine', 'dentistry' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  '0917.798.731 – 0961.412.626',
                'label_block'   =>  true,
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings();

    ?>

        <div class="element-contact-us">
            <h4 class="title">
                <?php echo esc_html( $settings['title'] ); ?>
            </h4>

            <?php if ( !empty( $settings['description'] ) ) : ?>

                <p class="description">
                    <?php echo wp_kses_post( $settings['description'] ); ?>
                </p>

            <?php endif; ?>

            <ul>
                <li class="address">
                    <i class="fas fa-map-marker"></i>

                    <span>
                        <?php echo wp_kses_post( $settings['address'] ); ?>
                    </span>
                </li>

                <li class="email">
                    <i class="fas fa-envelope"></i>

                    <a href="mailto:<?php echo esc_attr( $settings['email'] ); ?>">
                        <?php esc_html_e( 'Email: ', 'dentistry' ); echo wp_kses_post( $settings['email'] ); ?>
                    </a>
                </li>

                <li class="phone">
                    <i class="fas fa-phone-alt"></i>

                    <span>
                        <?php esc_html_e( 'Hotline: ', 'dentistry' ); echo esc_html( $settings['hot_line'] ); ?>
                    </span>
                </li>
            </ul>
        </div>

    <?php
    }

    protected function _content_template() {

    ?>

        <div class="element-contact-us">
            <h4 class="title">
                {{{ settings.title }}}
            </h4>

            <# if ( settings.description !== '' ) { #>

                <p class="description">
                    {{{ settings.description }}}
                </p>

            <# } #>

            <ul>
                <li class="address">
                    <i class="fas fa-map-marker"></i>

                    <span>
                        {{{ settings.address }}}
                    </span>
                </li>

                <li class="email">
                    <i class="fas fa-envelope"></i>

                    <a href="mailto:{{ settings.email }}">
                        Email: {{{ settings.email }}}
                    </a>
                </li>

                <li class="phone">
                    <i class="fas fa-phone-alt"></i>

                    <span>
                        Hotline: {{{ settings.hot_line }}}
                    </span>
                </li>
            </ul>
        </div>

    <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new dentistry_widget_contact_us );