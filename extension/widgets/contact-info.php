<?php
 /* *
  * widgets contact info
  **/
  class dentistry_contact_info_widget extends WP_Widget{

      /**
       * Widget setup.
       */

      public function __construct() {

          $widget_ops = array(
              'classname'     =>  'contact_info_widget',
              'description'   =>  esc_html__( 'A widget contact info', 'dentistry' ),
          );

          parent::__construct( 'contact_info_widget', 'Dentistry: Contact info', $widget_ops );

      }

      /**
       * Outputs the content of the widget
       *
       * @param array $args
       * @param array $instance
       */
      public function widget( $args, $instance ) {

          echo $args['before_widget'];

          if ( ! empty( $instance['title'] ) ) {
              echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
          }

      ?>

          <div class="contact-info">
              <ul>
                  <li class="address">
                      <i class="fas fa-map-marker"></i>

                      <span>
                          <?php esc_html_e( 'Địa chỉ: ', 'dentistry' ); echo wp_kses_post( $instance['address'] ); ?>
                      </span>
                  </li>

                  <li class="email">
                      <i class="fas fa-envelope"></i>

                      <a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>">
                          <?php esc_html_e( 'Email: ', 'dentistry' ); echo wp_kses_post( $instance['email'] ); ?>
                      </a>
                  </li>

                  <li class="phone">
                      <i class="fas fa-phone-alt"></i>

                      <span>
                        <?php esc_html_e( 'Phone: ', 'dentistry' ); echo esc_html( $instance['phone'] ); ?>
                      </span>
                  </li>
              </ul>
          </div>

      <?php

          echo $args['after_widget'];

      }

      /**
       * Outputs the options form on admin
       *
       * @param array $instance The widget options
       */

      public function form( $instance ) {

          $defaults = array(
              'title'   =>  'Liên hệ',
              'address' =>  'Số 8 ngõ 43 Nguyễn Ngọc Nại, Thanh Xuân, Hà Nội',
              'email'   =>  'thietbirang@gmail.com',
              'phone'   =>  '0917.798.731 – 0961.412.626'
          );

          $instance = wp_parse_args( (array) $instance, $defaults );

      ?>

          <p>
              <label for=<?php echo esc_attr( $this->get_field_id(  'title' ) ); ?>>
                  <?php esc_html_e('Title:','dentistry') ; ?>
              </label>
              
              <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title') ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
          </p>

          <p>
              <label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>">
                  <?php esc_html_e( 'Địa chỉ:','dentistry' ); ?>
              </label>

              <input type="text" id="<?php echo esc_attr ( $this->get_field_id( 'address' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" value="<?php echo esc_attr( $instance['address'] ); ?>" />
          </p>

          <p>
              <label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>">
                  <?php esc_html_e( 'Email:','dentistry' ); ?>
              </label>

              <input type="text" id="<?php echo esc_attr ( $this->get_field_id( 'email' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" value="<?php echo esc_attr( $instance['email'] ); ?>" />
          </p>

          <p>
              <label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>">
                  <?php esc_html_e( 'Phone:','dentistry' ); ?>
              </label>

              <input type="text" id="<?php echo esc_attr ( $this->get_field_id( 'phone' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" value="<?php echo esc_attr( $instance['phone'] ); ?>" />
          </p>

      <?php
      }

      /**
       * Processing widget options on save
       *
       * @param array $new_instance The new options
       * @param array $old_instance The previous options
       *
       * @return array
       */
      public function update( $new_instance, $old_instance ) {

          $instance = array();

          $instance['title']    =   strip_tags( $new_instance['title'] );
          $instance['address']  =   $new_instance['address'];
          $instance['email']    =   $new_instance['email'];
          $instance['phone']    =   $new_instance['phone'];

          return $instance;

      }
  }

// Register widget
function dentistry_contact_info_widget_register() {
    register_widget( 'dentistry_contact_info_widget' );
}

add_action( 'widgets_init', 'dentistry_contact_info_widget_register' );