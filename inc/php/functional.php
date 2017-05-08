<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Image Uploader
 *
 * @since 2.0
 */
function RssFeedIcon_image_uploader( $name, $width, $height, $options ) {

    // Set variables
    $default_image = RSSFI_URL . 'inc/img/no-image.png';

    if ( !empty( $options[$name] ) ) {
        $image_attributes = wp_get_attachment_image_src( $options[$name], array( $width, $height ) );
        $src = $image_attributes[0];
        $value = $options[$name];
    } else {
        $src = $default_image;
        $value = '';
    }

    $text = __( 'Upload', RSSFI_TEXT );

    // Print HTML field
    echo '
        <div class="upload">
            <img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />
            <div>
                <input type="hidden" name="RssFeedIcon_settings[' . $name . ']" id="RssFeedIcon_settings[' . $name . ']" value="' . $value . '" />
                <button type="submit" class="upload_image_button button">' . $text . '</button>
                <button type="submit" class="remove_image_button button">&times;</button>
            </div>
        </div>
    ';
}

/**
 * ShortCode
 *
 * @since 2.0
 */
function RssFeedIcon_shortcode() {

    // Set variables
    $options = get_option( 'RssFeedIcon_settings' );

    if ( !empty( $options['feed_link'] ) ) {
        $feed_link = $options['feed_link'];
    } else {
        $feed_link = '/?feed=rss';
    }

    if ( !empty( $options['custom_icon'] ) ) {
        $image_attributes = wp_get_attachment_image_src( $options['custom_icon'] );
        $icon_src = $image_attributes[0];
    } else {
        if ( !empty( $options['integrated_icon'] ) ) {
            $icon_src = RSSFI_URL . 'inc/img/icons/' . $options['integrated_icon'] . '.png';
        } else {
            $icon_src = RSSFI_URL . 'inc/img/icons/8.png';
        }
    }

    if ( !empty( $options['icon_size'] ) ) {
        $icon_size = $options['icon_size'];
    } else {
        $icon_size = '60';
    }

    // Generating output code
    return '<a
                href="' . $feed_link . '"
                target="_blank"
                rel="nofollow"
                style="text-decoration: none;"
            >
            <img
                src="' . $icon_src . '"
                height="' . $icon_size . '"
                title="RSS Feed"
                style="border: none;"
            />
            </a>';
}
add_shortcode( 'rss-feed-icon', 'RssFeedIcon_shortcode' );

/**
 * Allow shortcodes in the text widget
 *
 * @since 1.0
 */
add_filter( 'widget_text', 'do_shortcode' );
