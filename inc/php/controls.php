<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Generator of the help text under options
 */
function spacexchimp_p013_control_help( $help=null ) {

    // Return if help text not defined
    if ( empty( $help ) ) {
        return;
    }

    // Generate a part of table
    $out = "<tr>
                <td></td>
                <td class='help-text'>
                    $help
                </td>
            </tr>";

    // Print the generated part of table
    echo $out;
}

/**
 * Generator of the field option for saving plugin settings to database
 */
function spacexchimp_p013_control_field( $name, $label, $help=null, $placeholder=null ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p013_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p013_options();
    $option = $options[$name];

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    <input
                        type='text'
                        name='" . $plugin['settings'] . "_settings[$name]'
                        id='" . $plugin['settings'] . "_settings[$name]'
                        value='$option'
                        placeholder='$placeholder'
                        class='control-field $name'
                    >
                </td>
            </tr>";

    // Print the generated part of table
    echo $out;

    // Print a help text
    spacexchimp_p013_control_help( $help );
}

/**
 * Generator of the switch option for saving plugin settings to database
 */
function spacexchimp_p013_control_switch( $name, $label, $help=null ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p013_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p013_options();
    $option = $options[$name];
    $checked = ( $option === true ) ? "checked='checked'" : '';

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    <input
                        type='checkbox'
                        name='" . $plugin['settings'] . "_settings[$name]'
                        id='" . $plugin['settings'] . "_settings[$name]'
                        value='true'
                        $checked
                        class='control-switch $name'
                    >
                </td>
            </tr>";

    // Print the generated part of table
    echo $out;

    // Print a help text
    spacexchimp_p013_control_help( $help );
}

/**
 * Generator of the number option for saving plugin settings to database
 */
function spacexchimp_p013_control_number( $name, $label, $help=null ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p013_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p013_options();
    $option = $options[$name];

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                        <div class='input-group control-number $name'>
                            <span class='input-group-btn'>
                                <button type='button' class='btn btn-danger' data-type='minus' data-field='example'>
                                    <i class='fa fa-minus' aria-hidden='true'></i>
                                </button>
                            </span>
                            <input
                                type='number'
                                name='" . $plugin['settings'] . "_settings[$name]'
                                id='" . $plugin['settings'] . "_settings[$name]'
                                value='$option'
                                maxlength='4'
                                class='form-control text-center'
                            >
                            <span class='input-group-btn'>
                                <button type='button' class='btn btn-success' data-type='plus' data-field='example'>
                                    <i class='fa fa-plus' aria-hidden='true'></i>
                                </button>
                            </span>
                        </div>
                </td>
            </tr>";

    // Print the generated part of table
    echo $out;

    // Print a help text
    spacexchimp_p013_control_help( $help );
}

/**
 * Generator of the WordPress Image Uploader
 */
function spacexchimp_p013_image_uploader( $name ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p013_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p013_options();
    $default_image = $plugin['url'] . 'inc/img/no-image.png';
    $image_size = '115';

    if ( ! empty( $options[$name] ) ) {
        $image_attributes = wp_get_attachment_image_src( $options[$name], array( $image_size, $image_size ) );
        $src = $image_attributes[0];
        $value = $options[$name];
    } else {
        $src = $default_image;
        $value = '';
    }

    $text = __( 'Upload', $plugin['text'] );

    // Generate a part of table
    $out = "<div class='upload'>
                <img
                    data-src='$default_image'
                    src='$src'
                />
                <div>
                    <input
                        type='hidden'
                        name='" . $plugin['settings'] . "_settings[$name]'
                        id='" . $plugin['settings'] . "_settings[$name]'
                        value='$value'
                    >
                    <button type='submit' class='upload_image_button button'>$text</button>
                    <button type='submit' class='remove_image_button button'>&times;</button>
                </div>
            </div>";

    // Print the generated part of table
    echo $out;
}

/**
 * Generator of the hidden option for saving plugin settings to database
 */
function spacexchimp_p013_control_hidden( $name, $value ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p013_plugin();

    // Generate a part of table
    $out = "<input
                type='hidden'
                name='" . $plugin['settings'] . "_settings[$name]'
                id='" . $plugin['settings'] . "_settings[$name]'
                value='$value'
                class='control-hidden $name'
            >";

    // Print the generated part of table
    echo $out;
}

/**
 * Generator of the separator between option groups
 */
function spacexchimp_p013_control_separator( $text=null ) {

    // Generate a part of table
    if ( ! empty( $text ) ) {
        $out = "<tr>
                    <td height='60' colspan='2'>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' style='text-align:center;'>
                    " . $text . "
                    </td>
                </tr>";
    } else {
        $out = "<tr>
                    <td height='60' colspan='2'>
                        <hr>
                    </td>
                </tr>";
    }

    // Print the generated part of table
    echo $out;
}
