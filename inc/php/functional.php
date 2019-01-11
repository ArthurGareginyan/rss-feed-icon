<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Generate the button and make shortcode
 */
function spacexchimp_p013_shortcode() {

    // Retrieve options from database and declare variables
    $options = get_option( SPACEXCHIMP_P013_SETTINGS . '_settings' );
    $feed_link = !empty( $options['feed_link'] ) ? $options['feed_link'] : '/?feed=rss';
    $tooltip = !empty( $options['tooltip'] ) ? 'data-toggle="tooltip"' : '';
    $tooltip_text = !empty( $options['tooltip_text'] ) ? $options['tooltip_text'] : 'RSS Feed';
    if ( !empty( $options['custom_icon'] ) ) {
        $image_attributes = wp_get_attachment_image_src( $options['custom_icon'] );
        $icon_src = $image_attributes[0];
    } else {
        if ( !empty( $options['integrated_icon'] ) ) {
            $icon_src = SPACEXCHIMP_P013_URL . 'inc/img/icons/' . $options['integrated_icon'] . '.png';
        } else {
            $icon_src = SPACEXCHIMP_P013_URL . 'inc/img/icons/8.png';
        }
    }

    // Generating output code
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
add_shortcode( 'rss-feed-icon', 'spacexchimp_p013_shortcode' );

/**
 * Allow shortcodes in the text widget
 */
add_filter( 'widget_text', 'do_shortcode' );
