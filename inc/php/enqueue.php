<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Load scripts and style sheet for settings page
 *
 * @since 2.0
 */
function RssFeedIcon_load_scripts_admin($hook) {

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

}
add_action( 'admin_enqueue_scripts', 'RssFeedIcon_load_scripts_admin' );
