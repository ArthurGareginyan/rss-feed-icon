<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Base for the _load_scripts hook & Dymamic CSS for the _load_scripts hook
 *
 * @since 2.1
 */
function RssFeedIcon_load_scripts_base() {

    // Load JQuery library
    wp_enqueue_script( 'jquery' );

    // Style sheet
    wp_enqueue_style( 'RssFeedIcon-frontend-css', RSSFI_URL . 'inc/css/frontend.css' );

    // JavaScript
    wp_enqueue_script( 'RssFeedIcon-frontend-js', RSSFI_URL . 'inc/js/frontend.js' );

    // Read options from BD, sanitiz data and declare variables
    $options = get_option( 'RssFeedIcon_settings' );

    // Size of icon
    if ( !empty( $options['icon_size'] ) ) {
        $icon_size = $options['icon_size'];
    } else {
        $icon_size = '60';
    }

    // Dynamic CSS
    $custom_css = "
                    .RssFeedIcon {
                        
                    }
                    .RssFeedIcon img {
                        width: " . $icon_size . "px !important;
                        height: " . $icon_size . "px !important;
                    }
                  ";

    // Inject dynamic CSS
    wp_add_inline_style( 'RssFeedIcon-frontend-css', $custom_css );

}

/**
 * Load scripts and style sheet for settings page
 *
 * @since 2.1
 */
function RssFeedIcon_load_scripts_admin( $hook ) {

    // Return if the page is not a settings page of this plugin
    if ( 'settings_page_rss-feed-icon' != $hook ) {
        return;
    }

    // WordPress library
    wp_enqueue_media();

    // Style sheet
    wp_enqueue_style( 'RssFeedIcon-admin-css', RSSFI_URL . 'inc/css/admin.css' );

    // JavaScript
    wp_enqueue_script( 'RssFeedIcon-admin-js', RSSFI_URL . 'inc/js/admin.js', array(), false, true );

    // Bootstrap library
    wp_enqueue_style( 'RssFeedIcon-bootstrap-css', RSSFI_URL . 'inc/lib/bootstrap/bootstrap.css' );
    wp_enqueue_style( 'RssFeedIcon-bootstrap-theme-css', RSSFI_URL . 'inc/lib/bootstrap/bootstrap-theme.css' );
    wp_enqueue_script( 'RssFeedIcon-bootstrap-js', RSSFI_URL . 'inc/lib/bootstrap/bootstrap.js' );

    // Other libraries
    wp_enqueue_script( 'RssFeedIcon-bootstrap-checkbox-js', RSSFI_URL . 'inc/lib/bootstrap-checkbox.js' );

    // Call the function with a basis of scripts
    RssFeedIcon_load_scripts_base();

}
add_action( 'admin_enqueue_scripts', 'RssFeedIcon_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end
 *
 * @since 2.1
 */
function RssFeedIcon_load_scripts_frontend() {

    // Call the function with a basis of scripts
    RssFeedIcon_load_scripts_base();

    // Other libraries
    wp_enqueue_style( 'RssFeedIcon-bootstrap-tooltip-css', RSSFI_URL . 'inc/lib/bootstrap-tooltip/bootstrap-tooltip.css' );
    wp_enqueue_script( 'RssFeedIcon-bootstrap-tooltip-js', RSSFI_URL . 'inc/lib/bootstrap-tooltip/bootstrap-tooltip.js' );

}
add_action( 'wp_enqueue_scripts', 'RssFeedIcon_load_scripts_frontend' );
