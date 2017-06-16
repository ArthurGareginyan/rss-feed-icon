<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Settings Tab
 *
 * @since 2.5
 */
?>
    <!-- SIDEBAR -->
    <div class="inner-sidebar">
        <div id="side-sortables" class="meta-box-sortabless ui-sortable">

            <div id="about" class="postbox">
                <h3 class="title"><?php _e( 'About', $text ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'This plugin allows you to easily add the RSS feed icon in any place on your website. RSS feed icon allows your visitors to receive messages from your Blog/RSS feed by email.', $text ); ?></p>
                </div>
            </div>

            <div id="support" class="postbox">
                <h3 class="title"><?php _e( 'Support', $text ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', $text ); ?></p>
                    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', $text ); ?></a>
                    <p><?php _e( 'Thanks for your support!', $text ); ?></p>
                </div>
            </div>

            <div id="help" class="postbox">
                <h3 class="title"><?php _e( 'Help', $text ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'If you have a question, please read the information in the FAQ section.', $text ); ?></p>
                </div>
            </div>

        </div>
    </div>
    <!-- END-SIDEBAR -->

    <!-- FORM -->
    <div class="has-sidebar sm-padded">
        <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless">

                <form action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields( RSSFI_SETTINGS . '_settings_group' ); ?>

                    <?php
                        // Get options from the database
                        $options = get_option( RSSFI_SETTINGS . '_settings' );

                        // Set default value if option is empty
                        $integrated_icon = !empty( $options['integrated_icon'] ) ? $options['integrated_icon'] : '8';
                    ?>

                    <div class="postbox" id="Settings">
                        <h3 class="title"><?php _e( 'Main Settings', $text ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'There you can configure this plugin.', $text ); ?></p>

                            <table class="form-table">

                                <?php RssFeedIcon_setting( 'feed_link',
                                                           __( 'RSS feed link', $text ),
                                                           __( 'You can set a custom link to RSS feed of your website. Leave blank to use the default WordPress RSS feed link. Example: \'http://www.example.com/?feed=rss\'', $text ),
                                                           'field',
                                                           'http://',
                                                           '50'
                                                          );
                                ?>

                                <tr>
                                    <th scope='row'>
                                        <?php _e( 'RSS feed icon', $text ); ?>
                                    </th>
                                    <td>
                                        <?php RssFeedIcon_image_uploader( 'custom_icon', $width = 115, $height = 115, $options ); ?>

                                        <div class="integrated-icons">
                                            <table width="50%" border="0" cellspacing="15" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="1" <?php checked('1', $integrated_icon); ?>>
                                                        <img src="<?php echo RSSFI_URL . 'inc/img/icons/1.png'; ?>" width='48' height='48' />
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="2" <?php checked('2', $integrated_icon); ?>>
                                                        <img src="<?php echo RSSFI_URL . 'inc/img/icons/2.png'; ?>" width='48' height='48' />
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="3" <?php checked('3', $integrated_icon); ?>>
                                                        <img src="<?php echo RSSFI_URL . 'inc/img/icons/3.png'; ?>" width='48' height='48' />
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="4" <?php checked('4', $integrated_icon); ?>>
                                                        <img src="<?php echo RSSFI_URL . 'inc/img/icons/4.png'; ?>" width='48' height='48' />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="5" <?php checked('5', $integrated_icon); ?>>
                                                        <img src="<?php echo RSSFI_URL . 'inc/img/icons/5.png'; ?>" width='48' height='48' />
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="6" <?php checked('6', $integrated_icon); ?>>
                                                        <img src="<?php echo RSSFI_URL . 'inc/img/icons/6.png'; ?>" width='48' height='48' />
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="7" <?php checked('7', $integrated_icon); ?>>
                                                        <img src="<?php echo RSSFI_URL . 'inc/img/icons/7.png'; ?>" width='48' height='48' />
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="RssFeedIcon_settings[integrated_icon]" value="8" <?php checked('8', $integrated_icon); ?>>
                                                        <img src="<?php echo RSSFI_URL . 'inc/img/icons/8.png'; ?>" width='48' height='48' />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td class='help-text upload-help-text'>
                                        <?php _e( 'You can choose icon from above or upload your own icon. You can find the coolest icons on the <a href="https://www.iconfinder.com/search/?q=rss+feed&ref=ArthurGareginyan" target="_blank" rel="nofollow" >IconFinder.com.</a>', $text ); ?>
                                    </td>
                                </tr>

                                <?php RssFeedIcon_setting( 'icon_size',
                                                           __( 'Icon size', $text ),
                                                           __( 'You can set the height of icon (in px).', $text ),
                                                           'field',
                                                           '60',
                                                           '2'
                                                          );
                                ?>

                                <?php RssFeedIcon_setting( 'tooltip',
                                                           __( 'Tooltip', $text ),
                                                           __( 'Enable/disable a tooltip above button.', $text ),
                                                           'check'
                                                         );
                                ?>

                                <?php RssFeedIcon_setting( 'tooltip_text',
                                                           __( 'Text of tooltip', $text ),
                                                           __( 'You can set a custom text of tooltip. Leave blank to use the default text.', $text ),
                                                           'field',
                                                           'RSS Feed',
                                                           '50'
                                                          );
                                ?>

                            </table>

                            <?php submit_button( __( 'Save changes', $text ), 'primary', 'submit', true ); ?>

                        </div>
                    </div>

                    <div class="postbox" id="Preview">
                        <h3 class="title"><?php _e( 'Preview', $text ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Click the "Save changes" button to update this preview.', $text ); ?></p>
                            <br>
                            <div class="preview-icon">
                                <?php echo RssFeedIcon_shortcode(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="postbox" id="support-addition">
                        <h3 class="title"><?php _e( 'Support', $text ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', $text ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', $text ); ?></a>
                            <p><?php _e( 'Thanks for your support!', $text ); ?></p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- END-FORM -->
<?php
