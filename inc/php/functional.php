<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Generate the button
 * @return string
 */
function spacexchimp_p013_generator() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p013_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p013_options();

    // Declare variables
    if ( ! empty( $options['custom_icon'] ) ) {
        $image_attributes = wp_get_attachment_image_src( $options['custom_icon'] );
        $icon_src = $image_attributes[0];
    } else {
        $icon_src = $plugin['url'] . 'inc/img/icons/' . $options['integrated_icon'] . '.png';
    }

    // Generate tolltips
    if ( $options['tooltip'] === true ) {
        $tooltip = 'data-toggle="tooltip"';
    } else {
        $tooltip = ''; // Empty value
    }

    // Generate button
    return '<a
                href="' . $options['feed_link'] . '"
                ' . $tooltip . '
                title="' . $options['tooltip_text'] . '"
                target="_blank"
                rel="nofollow"
                class="RssFeedIcon"
            >
            <img
                src="' . $icon_src . '"
                alt="' . $options['tooltip_text'] . '"
            />
            </a>';
}

/**
 * Create the shortcode "[rss-feed-icon]"
 */
add_shortcode( 'rss-feed-icon', 'spacexchimp_p013_generator' );

/**
 * Allow shortcodes in the text widget
 */
add_filter( 'widget_text', 'do_shortcode' );
