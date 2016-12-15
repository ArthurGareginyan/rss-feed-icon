<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Render Settings Page
 *
 * @since 1.0
 */
function RssFeedIcon_render_submenu_page() {

	// Declare variables
	$options = get_option( 'RssFeedIcon_settings' );

	// Page
	?>
	<div class="wrap">
		<h2>
            <?php _e( 'RSS Feed Icon', RSSFI_TEXT ); ?>
            <br/>
            <span>
                <?php _e( 'by <a href="http://www.arthurgareginyan.com" target="_blank">Arthur Gareginyan</a>', RSSFI_TEXT ); ?>
            <span/>
		</h2>

        <div id="poststuff" class="metabox-holder has-right-sidebar">

            <!-- SIDEBAR -->
            <div class="inner-sidebar">
                <div id="side-sortables" class="meta-box-sortabless ui-sortable">

                    <div id="about" class="postbox">
                        <h3 class="title"><?php _e( 'About', RSSFI_TEXT ); ?></a></h3>
                        <div class="inside">
                            <p><?php _e( 'This plugin allows you to easily add the RSS feed icon in any place on your website. RSS feed icon allows your visitors to receive messages from your Blog/RSS feed by email.', RSSFI_TEXT ); ?></p>
                        </div>
                    </div>

                    <div id="help" class="postbox">
                        <h3 class="title"><?php _e( 'Help', RSSFI_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'Got something to say? Need help?', RSSFI_TEXT ); ?></p>
                            <p><a href="mailto:arthurgareginyan@gmail.com?subject=RSS Feed Icon">arthurgareginyan@gmail.com</a></p>
                        </div>
                    </div>

                    <div id="donate" class="postbox">
                        <h3 class="title"><?php _e( 'Donate', RSSFI_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', RSSFI_TEXT ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" rel="nofollow">
                                <img src="<?php echo plugins_url('../img/donate.png', __FILE__); ?>" alt="Make a donation">
                            </a>
                            <p><?php _e( 'Thanks for your support!', RSSFI_TEXT ); ?></p>
                        </div>
                    </div>

                    <a href="//www.iconfinder.com/?ref=ArthurGareginyan" target="_blank" rel="nofollow">
                        <img style="border:0px" src="<?php echo plugins_url('../img/banner.png', __FILE__); ?>" width="280" height="180" alt="">
                    </a>

                </div>
            </div>
            <!-- END-SIDEBAR -->

            <!-- FORM -->
            <div class="has-sidebar sm-padded">
                <div id="post-body-content" class="has-sidebar-content">
                    <div class="meta-box-sortabless">

                        <form name="specificfeedsicon-form" action="options.php" method="post" enctype="multipart/form-data">
                            <?php settings_fields( 'RssFeedIcon_settings_group' ); ?>

                            <div class="postbox" id="Settings">
                                <h3 class="title"><?php _e( 'Settings', RSSFI_TEXT ); ?></h3>
                                <div class="inside">
                                    <p class="description"></p>

                                    <table class="form-table">

                                        <tr valign='top'>
                                            <th scope='row'>
                                                <?php _e('RSS feed link', RSSFI_TEXT ); ?>
                                            </th>
                                            <td>
                                                <input type="text" name="RssFeedIcon_settings[feed_link]" id="RssFeedIcon_settings[feed_link]" placeholder="http://" value="<?php echo $options['feed_link']; ?>" size="50" >
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td>
                                            </td>
                                            <td class='help-text'>
                                                <?php _e( 'You can set a custom link to RSS feed of your website. Leave blank to use the default WordPress RSS feed link. Example: \'http://www.example.com/?feed=rss\'', RSSFI_TEXT ); ?>
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'>
                                                <?php _e( 'RSS feed icon', RSSFI_TEXT ); ?>
                                            </th>
                                            <td>
                                                <?php RssFeedIcon_image_uploader( 'custom_icon', $width = 115, $height = 115, $options ); ?>

                                                <?php
                                                    if ( !empty( $options['integrated_icon'] ) ) {
                                                        $integrated_icon = $options['integrated_icon'];
                                                    } else {
                                                        $integrated_icon = '8';
                                                    }
                                                ?>

                                                <div class="integrated-icons">
                                                    <table width="50%" border="0" cellspacing="15" cellpadding="0">
                                                        <tr>
                                                            <td>
                                                                <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="1" <?php checked('1', $integrated_icon); ?>>
                                                                <img src="<?php echo plugins_url( '../img/icons/1.png', __FILE__ ) ?>" width='48' height='48' />
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="2" <?php checked('2', $integrated_icon); ?>>
                                                                <img src="<?php echo plugins_url( '../img/icons/2.png', __FILE__ ) ?>" width='48' height='48' />
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="3" <?php checked('3', $integrated_icon); ?>>
                                                                <img src="<?php echo plugins_url( '../img/icons/3.png', __FILE__ ) ?>" width='48' height='48' />
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="4" <?php checked('4', $integrated_icon); ?>>
                                                                <img src="<?php echo plugins_url( '../img/icons/4.png', __FILE__ ) ?>" width='48' height='48' />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="5" <?php checked('5', $integrated_icon); ?>>
                                                                <img src="<?php echo plugins_url( '../img/icons/5.png', __FILE__ ) ?>" width='48' height='48' />
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="6" <?php checked('6', $integrated_icon); ?>>
                                                                <img src="<?php echo plugins_url( '../img/icons/6.png', __FILE__ ) ?>" width='48' height='48' />
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="7" <?php checked('7', $integrated_icon); ?>>
                                                                <img src="<?php echo plugins_url( '../img/icons/7.png', __FILE__ ) ?>" width='48' height='48' />
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="8" <?php checked('8', $integrated_icon); ?>>
                                                                <img src="<?php echo plugins_url( '../img/icons/8.png', __FILE__ ) ?>" width='48' height='48' />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td>
                                            </td>
                                            <td class='help-text upload-help-text'>
                                                <?php _e( 'You can choose icon from above or upload your own icon. You can find the coolest icons on the <a href="https://www.iconfinder.com/search/?q=rss+feed&ref=ArthurGareginyan" target="_blank" rel="nofollow" >IconFinder.com.</a>', RSSFI_TEXT ); ?>
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'>
                                                <?php _e('Size of icon', RSSFI_TEXT); ?>
                                            </th>
                                            <td>
                                                <input type="text" name="RssFeedIcon_settings[icon_size]" id="RssFeedIcon_settings[icon_size]" value="<?php echo $options['icon_size']; ?>" placeholder="60" size="3">
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td>
                                            </td>
                                            <td class='help-text'>
                                                <?php _e( 'You can set the height of icon (in px).', RSSFI_TEXT ); ?>
                                            </td>
                                        </tr>

                                    </table>

                                    <?php submit_button( __( 'Save Changes', RSSFI_TEXT ), 'primary', 'submit', true ); ?>

                                </div>
                            </div>

                            <div class="postbox" id="Preview">
                                <h3 class="title"><?php _e( 'Preview', RSSFI_TEXT ); ?></h3>
                                <div class="inside">
                                    <p class="description"><?php _e( 'Click "Save Changes" to update this preview.', RSSFI_TEXT ); ?></p>
                                    <br>
                                    <div class="preview-icon">
                                        <?php echo RssFeedIcon_shortcode(); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="postbox" id="Using">
                                <h3 class="title"><?php _e( 'Using', RSSFI_TEXT ); ?></h3>
                                <div class="inside">
                                    <p><?php _e( 'You have several methods for display the RSS feed icon (further just "icon") on your website. But first, enter your RSS feed link and choose preferred icon, then click "Save Changes".', RSSFI_TEXT ); ?></p>
                                    <p><?php _e( '<b>A)</b> For add the icon inside a post from WP Post/Page Editor use the following shortcode:', RSSFI_TEXT ); ?></p>
                                    <p><?php highlight_string('[rss-feed-icon]'); ?></p>
                                    <p><?php _e( '<b>B)</b> For add the icon to the widget area (in sidebar, footer etc.) use the "Text" widget and add inside it the following shortcode:', RSSFI_TEXT ); ?></p>
                                    <p><?php highlight_string('[rss-feed-icon]'); ?></p>
                                    <p><?php _e( '<b>C)</b> For add the icon directly to a theme files, just add one of the following code (both variants do the same) to needed place (where you want to display the button) in your theme files:', RSSFI_TEXT ); ?></p>
                                    <p><?php highlight_string('<?php echo do_shortcode("[rss-feed-icon]"); ?>'); ?></p>
                                    <p><?php highlight_string('<?php echo RssFeedIcon_shortcode(); ?>'); ?></p>
                                    <p><?php _e( 'It\'s that simple! If you want more options then tell me and I will be happy to add it.', RSSFI_TEXT ); ?></p>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- END-FORM -->

        </div>

	</div>
	<?php
}
