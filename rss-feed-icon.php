<?php
/**
 * Plugin Name: RSS Feed Icon
 * Plugin URI: https://github.com/ArthurGareginyan/rss-feed-icon
 * Description: Easily add the RSS feed icon in any place of your website. It will be responsive and compatible with all major browsers. It will work with any theme!
 * Author: Arthur Gareginyan
 * Author URI: http://www.arthurgareginyan.com
 * Version: 2.1
 * License: GPL3
 * Text Domain: rss-feed-icon
 * Domain Path: /languages/
 *
 * Copyright 2016-2017 Arthur Gareginyan (email : arthurgareginyan@gmail.com)
 *
 * This file is part of "RSS Feed Icon".
 *
 * "RSS Feed Icon" is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "RSS Feed Icon" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with "RSS Feed Icon".  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 *               █████╗ ██████╗ ████████╗██╗  ██╗██╗   ██╗██████╗
 *              ██╔══██╗██╔══██╗╚══██╔══╝██║  ██║██║   ██║██╔══██╗
 *              ███████║██████╔╝   ██║   ███████║██║   ██║██████╔╝
 *              ██╔══██║██╔══██╗   ██║   ██╔══██║██║   ██║██╔══██╗
 *              ██║  ██║██║  ██║   ██║   ██║  ██║╚██████╔╝██║  ██║
 *              ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═╝  ╚═╝
 *
 *   ██████╗  █████╗ ██████╗ ███████╗ ██████╗ ██╗███╗   ██╗██╗   ██╗ █████╗ ███╗   ██╗
 *  ██╔════╝ ██╔══██╗██╔══██╗██╔════╝██╔════╝ ██║████╗  ██║╚██╗ ██╔╝██╔══██╗████╗  ██║
 *  ██║  ███╗███████║██████╔╝█████╗  ██║  ███╗██║██╔██╗ ██║ ╚████╔╝ ███████║██╔██╗ ██║
 *  ██║   ██║██╔══██║██╔══██╗██╔══╝  ██║   ██║██║██║╚██╗██║  ╚██╔╝  ██╔══██║██║╚██╗██║
 *  ╚██████╔╝██║  ██║██║  ██║███████╗╚██████╔╝██║██║ ╚████║   ██║   ██║  ██║██║ ╚████║
 *   ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═╝╚═╝  ╚═══╝   ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═══╝
 *
 */


/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Define global constants
 *
 * @since 1.0
 */
defined('RSSFI_DIR') or define('RSSFI_DIR', dirname(plugin_basename(__FILE__)));
defined('RSSFI_BASE') or define('RSSFI_BASE', plugin_basename(__FILE__));
defined('RSSFI_URL') or define('RSSFI_URL', plugin_dir_url(__FILE__));
defined('RSSFI_PATH') or define('RSSFI_PATH', plugin_dir_path(__FILE__));
defined('RSSFI_TEXT') or define('RSSFI_TEXT', 'rss-feed-icon');
defined('RSSFI_VERSION') or define('RSSFI_VERSION', '2.1');

/**
 * Load the plugin modules
 *
 * @since 2.0
 */
require_once( RSSFI_PATH . 'inc/php/core.php' );
require_once( RSSFI_PATH . 'inc/php/enqueue.php' );
require_once( RSSFI_PATH . 'inc/php/version.php' );
require_once( RSSFI_PATH . 'inc/php/functional.php' );
require_once( RSSFI_PATH . 'inc/php/page.php' );
require_once( RSSFI_PATH . 'inc/php/messages.php' );
require_once( RSSFI_PATH . 'inc/php/uninstall.php' );
