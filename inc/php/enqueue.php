<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Base for the _load_scripts hook
 *
 * @since 2.2
 */
function RssFeedIcon_load_scripts_base( $options ) {

    // Load JQuery library
    wp_enqueue_script( 'jquery' );

    // Style sheet
    wp_enqueue_style( RSSFI_PREFIX . '-frontend-css', RSSFI_URL . 'inc/css/frontend.css' );

    // JavaScript
    wp_enqueue_script( RSSFI_PREFIX . '-frontend-js', RSSFI_URL . 'inc/js/frontend.js' );

    // Size of icon
    if ( !empty( $options['icon_size'] ) ) {
        $icon_size = $options['icon_size'];
    } else {
        $icon_size = '60';
    }

    // Dynamic CSS. Create CSS and injected it into the stylesheet
    $custom_css = "
                    .RssFeedIcon {
                        
                    }
                    .RssFeedIcon img {
                        width: " . $icon_size . "px !important;
                        height: " . $icon_size . "px !important;
                    }
                  ";
    wp_add_inline_style( RSSFI_PREFIX . '-frontend-css', $custom_css );

}

/**
 * Load scripts and style sheet for settings page
 *
 * @since 2.2
 */
function RssFeedIcon_load_scripts_admin( $hook ) {

    // Return if the page is not a settings page of this plugin
    $settings_page = 'settings_page_' . RSSFI_SLUG;
    if ( $settings_page != $hook ) {
        return;
    }

    // Read options from BD
    $options = get_option( RSSFI_SETTINGS . '_settings' );

    // WordPress library
    wp_enqueue_media();

    // Style sheet
    wp_enqueue_style( RSSFI_PREFIX . '-admin-css', RSSFI_URL . 'inc/css/admin.css' );

    // JavaScript
    wp_enqueue_script( RSSFI_PREFIX . '-admin-js', RSSFI_URL . 'inc/js/admin.js', array(), false, true );

    // Bootstrap library
    wp_enqueue_style( RSSFI_PREFIX . '-bootstrap-css', RSSFI_URL . 'inc/lib/bootstrap/bootstrap.css' );
    wp_enqueue_style( RSSFI_PREFIX . '-bootstrap-theme-css', RSSFI_URL . 'inc/lib/bootstrap/bootstrap-theme.css' );
    wp_enqueue_script( RSSFI_PREFIX . '-bootstrap-js', RSSFI_URL . 'inc/lib/bootstrap/bootstrap.js' );

    // Other libraries
    wp_enqueue_script( RSSFI_PREFIX . '-bootstrap-checkbox-js', RSSFI_URL . 'inc/lib/bootstrap-checkbox.js' );

    // Call the function that contain a basis of scripts
    RssFeedIcon_load_scripts_base( $options );

}
add_action( 'admin_enqueue_scripts', RSSFI_PREFIX . '_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 *
 * @since 2.2
 */
function RssFeedIcon_load_scripts_frontend() {

    // Read options from BD
    $options = get_option( RSSFI_SETTINGS . '_settings' );

    // Call the function that contain a basis of scripts
    RssFeedIcon_load_scripts_base( $options );

    // Other libraries
    wp_enqueue_style( RSSFI_PREFIX . '-bootstrap-tooltip-css', RSSFI_URL . 'inc/lib/bootstrap-tooltip/bootstrap-tooltip.css' );
    wp_enqueue_script( RSSFI_PREFIX . '-bootstrap-tooltip-js', RSSFI_URL . 'inc/lib/bootstrap-tooltip/bootstrap-tooltip.js' );

}
add_action( 'wp_enqueue_scripts', RSSFI_PREFIX . '_load_scripts_frontend' );
