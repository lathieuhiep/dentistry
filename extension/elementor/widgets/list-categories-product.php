<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class dentistry_widget_list_cate_product extends Widget_Base {

    public function get_categories() {
        return array( 'dentistry_widgets' );
    }

    public function get_name() {
        return 'dentistry-list-cate-product';
    }

    public function get_title() {
        return esc_html__( 'Danh mục sản phẩm', 'dentistry' );
    }

    public function get_icon() {
        return 'fas fa-th-list';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Danh mục', 'dentistry' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         =>  esc_html__( 'Tiêu đề', 'dentistry' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Danh mục', 'dentistry' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'select_cat_product',
            [
                'label'         =>  esc_html__( 'Chọn Danh mục', 'dentistry' ),
                'type'          =>  Controls_Manager::SELECT2,
                'options'       =>  dentistry_check_get_cat( 'product_cat' ),
                'multiple'      =>  true,
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings_for_display();
        $product_cat    =   $settings['select_cat_product'];

        if ( !empty( $product_cat ) ) :
            $include_product_ids =   $product_cat;
        else:
            $include_product_ids = '';
        endif;

        $terms = get_terms( array(
            'taxonomy'      =>  'product_cat',
            'hide_empty'    =>  false,
            'include'       =>  $include_product_ids
        ) );

    ?>

        <div class="element-list-cate-product">
            <h4 class="title">
                <i class="fas fa-bars"></i>
                <?php echo esc_html( $settings['title'] ); ?>
            </h4>

            <?php if ( !empty( $terms ) ) : ?>

                <ul class="list-cate">
                    <?php
                    foreach ( $terms as $item ) :
                        $has_cate_children  =   get_term_children( $item->term_id, 'product_cat' );
                    ?>

                    <li class="item<?php echo esc_attr( !empty( $has_cate_children ) ? ' has-child-cate' : '' ); ?>">
                        <a href="<?php echo esc_url( get_term_link( $item->term_id ) ); ?>" title="<?php echo esc_attr( $item->name ); ?>">
                            <?php echo esc_html( $item->name ); ?>
                        </a>

                        <?php if ( !empty( $has_cate_children ) ) : ?>

                            <ul class="sub-cate">
                                <?php
                                foreach ( $has_cate_children as $item_child ) :
                                    $cate_children_product  =   get_term_by('term_id', $item_child, 'product_cat');
                                    $has_cate_children_sub  =   get_term_children( $item_child->term_id, 'product_cat' );
                                ?>
                                    <li class="item">
                                        <a href="<?php echo esc_url( get_term_link( $cate_children_product->term_id ) ); ?>" title="<?php echo esc_attr( $cate_children_product->name ); ?>">
                                            <?php echo esc_html( $cate_children_product->name ); ?>
                                        </a>

                                        <?php if ( !empty( $has_cate_children_sub ) ) : ?>

                                            <ul class="sub-cate">
                                                <?php foreach ( $has_cate_children_sub as $item_child_sub ) : ?>

                                                    <li class="item">
                                                        <a href="<?php echo esc_url( get_term_link( $item_child_sub->term_id ) ); ?>" title="<?php echo esc_attr( $item_child_sub->name ); ?>">
                                                            <?php echo esc_html( $item_child_sub->name ); ?>
                                                        </a>
                                                    </li>

                                                <?php endforeach; ?>
                                            </ul>

                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        <?php endif; ?>
                    </li>

                    <?php endforeach; ?>
                </ul>

            <?php endif; ?>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new dentistry_widget_list_cate_product );