<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Generator of the help text under controls
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
 * Generator of the fields for saving settings data to database
 */
function spacexchimp_p013_control_field( $name, $label, $help=null, $placeholder=null ) {

    // Read options from database and declare variables
    $options = get_option( SPACEXCHIMP_P013_SETTINGS . '_settings' );
    $value = !empty( $options[$name] ) ? esc_textarea( $options[$name] ) : '';

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    <input
                        type='text'
                        name='" . SPACEXCHIMP_P013_SETTINGS . "_settings[$name]'
                        id='" . SPACEXCHIMP_P013_SETTINGS . "_settings[$name]'
                        value='$value'
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
 * Generator of the switches for saving plugin settings to database
 */
function spacexchimp_p013_control_switch( $name, $label, $help=null ) {

    // Read options from database and declare variables
    $options = get_option( SPACEXCHIMP_P013_SETTINGS . '_settings' );
    $checked = !empty( $options[$name] ) ? "checked='checked'" : '';

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    <input
                        type='checkbox'
                        name='" . SPACEXCHIMP_P013_SETTINGS . "_settings[$name]'
                        id='" . SPACEXCHIMP_P013_SETTINGS . "_settings[$name]'
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
 * Generator of the number fields with minus and plus buttons for saving plugin settings to database
 */
function spacexchimp_p013_control_number( $name, $label, $help=null, $default=null ) {

    // Read options from database and declare variables
    $options = get_option( SPACEXCHIMP_P013_SETTINGS . '_settings' );
    $value = !empty( $options[$name] ) ? esc_attr( $options[$name] ) : $default;

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
                                name='" . SPACEXCHIMP_P013_SETTINGS . "_settings[$name]'
                                id='" . SPACEXCHIMP_P013_SETTINGS . "_settings[$name]'
                                value='$value'
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

    // Read options from database and declare variables
    $options = get_option( SPACEXCHIMP_P013_SETTINGS . '_settings' );
    $default_image = SPACEXCHIMP_P013_URL . 'inc/img/no-image.png';
    $image_size = '115';

    if ( !empty( $options[$name] ) ) {
        $image_attributes = wp_get_attachment_image_src( $options[$name], array( $image_size, $image_size ) );
        $src = $image_attributes[0];
        $value = $options[$name];
    } else {
        $src = $default_image;
        $value = '';
    }

    $text = __( 'Upload', SPACEXCHIMP_P013_TEXT );

    // Generate a part of table
    $out = "<div class='upload'>
                <img
                    data-src='$default_image'
                    src='$src'
                />
                <div>
                    <input
                        type='hidden'
                        name='" . SPACEXCHIMP_P013_SETTINGS . "_settings[$name]'
                        id='" . SPACEXCHIMP_P013_SETTINGS . "_settings[$name]'
                        value='$value'
                    >
                    <button type='submit' class='upload_image_button button'>$text</button>
                    <button type='submit' class='remove_image_button button'>&times;</button>
                </div>
            </div>";

    // Print the generated part of table
    echo $out;
}