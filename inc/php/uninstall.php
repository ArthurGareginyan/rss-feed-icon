<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Delete options on uninstall
 *
 * @since 2.2
 */
function RssFeedIcon_uninstall() {
    delete_option( RSSFI_SETTINGS . '_settings' );
}
register_uninstall_hook( __FILE__, RSSFI_PREFIX . '_uninstall' );
