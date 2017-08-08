<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

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
 * Render checkboxes and fields for saving settings data to database
 *
 * @since 2.6
 */
function RssFeedIcon_setting( $name, $label, $help=null, $field=null, $placeholder=null, $size=null ) {

    // Read options from database and declare variables
    $options = get_option( RSSFI_SETTINGS . '_settings' );
    $value = !empty( $options[$name] ) ? esc_textarea( $options[$name] ) : '';

    // Generate the table
    $checked = !empty( $options[$name] ) ? "checked='checked'" : '';

    if ( $field == "check" ) {
        $input = "<input type='checkbox' name='" . RSSFI_SETTINGS . "_settings[$name]' id='" . RSSFI_SETTINGS . "_settings[$name]' $checked class='$name' >";
    } elseif ( $field == "field" ) {
        $input = "<input type='text' name='" . RSSFI_SETTINGS . "_settings[$name]' id='" . RSSFI_SETTINGS . "_settings[$name]' size='$size' value='$value' placeholder='$placeholder' class='$name' >";
    }

    // Put table to the variables $out and $help_out
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    $input
                </td>
            </tr>";
    if ( !empty( $help ) ) {
        $help_out = "<tr>
                        <td></td>
                        <td class='help-text'>
                            $help
                        </td>
                     </tr>";
    } else {
        $help_out = "";
    }

    // Print the generated table
    echo $out . $help_out;
}

/**
 * Generate the button and make shortcode
 *
 * @since 2.6
 */
function RssFeedIcon_shortcode() {

    // Read options from database and declare variables
    $options = get_option( RSSFI_SETTINGS . '_settings' );
    $feed_link = !empty( $options['feed_link'] ) ? $options['feed_link'] : '/?feed=rss';
    $tooltip = !empty( $options['tooltip'] ) ? 'data-toggle="tooltip"' : '';
    $tooltip_text = !empty( $options['tooltip_text'] ) ? $options['tooltip_text'] : 'RSS Feed';
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
add_shortcode( 'rss-feed-icon', RSSFI_PREFIX . '_shortcode' );

/**
 * Allow shortcodes in the text widget
 *
 * @since 1.0
 */
add_filter( 'widget_text', 'do_shortcode' );
