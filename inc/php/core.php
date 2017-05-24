<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Register text domain
 *
 * @since 2.2
 */
function RssFeedIcon_textdomain() {
    load_plugin_textdomain( RSSFI_TEXT, false, RSSFI_DIR . '/languages/' );
}
add_action( 'init', RSSFI_PREFIX . '_textdomain' );

/**
 * Print direct link to plugin admin page
 *
 * Fetches array of links generated by WP Plugin admin page ( Deactivate | Edit )
 * and inserts a link to the plugin admin page
 *
 * @since  2.2
 * @param  array $links Array of links generated by WP in Plugin Admin page.
 * @return array        Array of links to be output on Plugin Admin page.
 */
function RssFeedIcon_settings_link( $links ) {
    $page = '<a href="' . admin_url( 'options-general.php?page=' . RSSFI_SLUG . '.php' ) .'">' . __( 'Settings', RSSFI_TEXT ) . '</a>';
    array_unshift( $links, $page );
    return $links;
}
add_filter( 'plugin_action_links_' . RSSFI_BASE, RSSFI_PREFIX . '_settings_link' );

/**
 * Print additional links to plugin meta row
 *
 * @since 2.2
 */
function RssFeedIcon_plugin_row_meta( $links, $file ) {

    if ( strpos( $file, RSSFI_SLUG . '.php' ) !== false ) {

        $new_links = array(
                           'donate' => '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank"><span class="dashicons dashicons-heart"></span> ' . __( 'Donate', RSSFI_TEXT ) . '</a>'
                           );
        $links = array_merge( $links, $new_links );
    }

    return $links;
}
add_filter( 'plugin_row_meta', RSSFI_PREFIX . '_plugin_row_meta', 10, 2 );

/**
 * Register plugin's submenu in the "Settings" Admin Menu
 *
 * @since 2.2
 */
function RssFeedIcon_register_submenu_page() {
    $menu_title = RSSFI_NAME;
    $capability = 'manage_options';
    add_options_page( RSSFI_NAME, $menu_title, $capability, RSSFI_SLUG, RSSFI_PREFIX . '_render_submenu_page' );
}
add_action( 'admin_menu', RSSFI_PREFIX . '_register_submenu_page' );

/**
 * Register settings
 *
 * @since 2.2
 */
function RssFeedIcon_register_settings() {
    register_setting( RSSFI_SETTINGS . '_settings_group', RSSFI_SETTINGS . '_settings' );
    register_setting( RSSFI_SETTINGS . '_settings_group', RSSFI_SETTINGS . '_service_info' );
}
add_action( 'admin_init', RSSFI_PREFIX . '_register_settings' );
