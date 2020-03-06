<?php

add_filter( 'rwmb_meta_boxes', 'dentistry_register_meta_boxes' );

function dentistry_register_meta_boxes() {

    /* Start meta box post */
    $dentistry_meta_boxes[] = array(
        'id'         => 'post_format_option',
        'title'      => esc_html__( 'Post Format', 'dentistry' ),
        'post_types' => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'id'               => 'dentistry_gallery_post',
                'name'             => 'Gallery',
                'type'             => 'image_advanced',
                'force_delete'     => false,
                'max_status'       => false,
                'image_size'       => 'thumbnail',
            ),

            array(
                'id'            => 'dentistry_video_post',
                'name'          => 'Video Or Audio',
                'type'          => 'oembed',
            ),


        )
    );
    /* End meta box post */

    return $dentistry_meta_boxes;

}