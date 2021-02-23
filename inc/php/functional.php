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

    // Retrieve options from database
    $options = get_option( $plugin['settings'] . '_settings' );

    // Declare variables
    $feed_link = !empty( $options['feed_link'] ) ? $options['feed_link'] : '/?feed=rss';
    $tooltip = !empty( $options['tooltip'] ) ? 'data-toggle="tooltip"' : '';
    $tooltip_text = !empty( $options['tooltip_text'] ) ? $options['tooltip_text'] : 'RSS Feed';
    if ( ! empty( $options['custom_icon'] ) ) {
        $image_attributes = wp_get_attachment_image_src( $options['custom_icon'] );
        $icon_src = $image_attributes[0];
    } else {
        if ( ! empty( $options['integrated_icon'] ) ) {
            $icon_src = $plugin['url'] . 'inc/img/icons/' . $options['integrated_icon'] . '.png';
        } else {
            $icon_src = $plugin['url'] . 'inc/img/icons/8.png';
        }
    }

    // Generate button
    return '<a
                href="' . $feed_link . '"
                ' . $tooltip . '
                title="' . $tooltip_text . '"
                target="_blank"
                rel="nofollow"
                class="RssFeedIcon"
            >
            <img
                src="' . $icon_src . '"
                alt="' . $tooltip_text . '"
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
