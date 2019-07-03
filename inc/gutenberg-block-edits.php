<?php

/**
 * Enqueue scripts to extend default block editor.
 */
function largo_extend_block_editor() {

    wp_enqueue_script(
        'blocks-image-customizations',
		get_template_directory_uri() . '/js/blocks-image-customization.js',
        array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-api' ),
        '1.0.0',
        true
    );
	
}
add_action( 'enqueue_block_editor_assets', 'largo_extend_block_editor' );

/**
 * Register custom fields for the REST api
 */
function largo_register_custom_rest_fields() {

	register_rest_field( 'attachment', 'media_credit', 
		array(
			'get_callback' => 'largo_display_media_credit_in_rest_api',
			'schema' => null,
		)
	);

}
add_action( 'rest_api_init', 'largo_register_custom_rest_fields' );

/**
 * Configure data for custom fields to display in REST api
 * 
 * @param Array $object The post object
 * @return Array $media_credit_meta the new object meta data
 */
function largo_display_media_credit_in_rest_api( $object ) {

    $post_id = $object[ 'id' ];

	$meta = get_post_meta( $post_id );
	
    $meta_fields = [ '_media_credit', '_media_credit_url' ];
    
    foreach( $meta_fields as $meta_field ){

        if ( isset( $meta[ $meta_field ] ) && isset( $meta[ $meta_field ][0] ) ) {

            //return the post meta
            $media_credit_meta[ $meta_field ] = $meta[ $meta_field ][0];
            
        }

    }
	
    return $media_credit_meta;
	
}