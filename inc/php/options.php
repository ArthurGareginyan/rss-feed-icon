<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Callback function that returns an array with the value of the plugin options
 * @return array
 */
function spacexchimp_p013_options() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p013_plugin();

    // Retrieve options from database
    $options = get_option( $plugin['settings'] . '_settings' );

    // Make the "$options" array if the plugin options data in the database is not exist
    if ( ! is_array( $options ) ) {
        $options = array();
    }

    // Create an array with options
    $array = $options;

    // Set default value if option is empty
    $list = array(
        'custom_icon' => '', // _image_uploader
        'feed_link' => '/?feed=rss', // _control_field
        'hidden_scrollto' => '0', // _control_hidden
        'icon_size' => '60', // _control_number
        'integrated_icon' => '8', // custom
        'tooltip_text' => 'RSS Feed', // _control_field
        'tooltip' => '', // _control_switch
    );
    foreach ( $list as $name => $default ) {
        $array[$name] = !empty( $options[$name] ) ? $options[$name] : $default;
    }

    // Sanitize data
    //$array['custom_icon'] = esc_textarea( $array['custom_icon'] );
    //$array['feed_link'] = esc_textarea( $array['feed_link'] );
    //$array['hidden_scrollto'] = esc_textarea( $array['hidden_scrollto'] );
    //$array['icon_size'] = esc_textarea( $array['icon_size'] );
    //$array['integrated_icon'] = esc_textarea( $array['integrated_icon'] );
    //$array['tooltip_text'] = esc_textarea( $array['tooltip_text'] );
    //$array['tooltip'] = esc_textarea( $array['tooltip'] );

    // Modify data
    $array['tooltip'] = ( $array['tooltip'] == 'on' || $array['tooltip'] == '1' || $array['tooltip'] == 'true' ) ? true : false;

    // Return the processed data
    return $array;
}
