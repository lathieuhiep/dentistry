<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class dentistry_widget_product_brands extends Widget_Base {

    public function get_categories() {
        return array( 'dentistry_widgets' );
    }

    public function get_name() {
        return 'dentistry-product-brands';
    }

    public function get_title() {
        return esc_html__( 'Product Brands', 'dentistry' );
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

        $this->add_control(
            'title',
            [
                'label'         =>  esc_html__( 'Tiêu đề', 'dentistry' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Nhãn hiệu', 'dentistry' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'select_cat',
            [
                'label'         =>  esc_html__( 'Select Brands', 'dentistry' ),
                'type'          =>  Controls_Manager::SELECT2,
                'options'       =>  dentistry_check_get_cat( 'product_brand' ),
                'multiple'      =>  true,
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings_for_display();
        $select_cat =   $settings['select_cat'];

        if ( !empty( $select_cat ) ) :
            $include_product_brand_ids =   $select_cat;
        else:
            $include_product_brand_ids = '';
        endif;

        $terms = get_terms( array(
            'taxonomy'      =>  'product_brand',
            'hide_empty'    =>  false,
            'include'       =>  $include_product_brand_ids
        ) );

    ?>

        <div class="element-product-brands">
            <h3 class="title element-title">
                <?php echo esc_html( $settings['title']  ); ?>
            </h3>

            <?php if ( !empty( $terms ) ) :  ?>

                <div class="list-product-brand">
                    <ul class="d-flex flex-wrap">
                        <?php foreach ( $terms as $item ) : ?>

                        <li class="flex-grow-1">
                            <a href="<?php echo esc_url( get_term_link( $item->term_id ) ); ?>" title="<?php echo esc_attr( $item->name ); ?>">

                                <?php
                                if (function_exists( 'get_wp_term_image') ) :
                                    $meta_image = get_wp_term_image( $item->term_id );
                                ?>

                                    <img src="<?php echo esc_url( $meta_image ) ?>" alt="<?php echo esc_attr( $item->name ); ?>">

                                <?php
                                else:
                                    echo esc_html( $item->name );
                                endif;

                                ?>
                            </a>
                        </li>

                        <?php endforeach; ?>
                    </ul>
                </div>

            <?php endif; ?>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new dentistry_widget_product_brands );