<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Usage Tab Content
 */
?>
    <div class="postbox">
        <h3 class="title"><?php _e( 'Usage Instructions', $text ); ?></h3>
        <div class="inside">
            <p><?php _e( 'To display the RSS feed icon on the front end of your website, simply follow these steps:', $text ); ?></p>
            <ol class="custom-counter">
                <li><?php _e( 'Go to the "Settings" tab on this page.', $text ); ?></li>
                <li><?php _e( 'Select the desired settings.', $text ); ?></li>
                <li><?php _e( 'Click the "Save changes" button.', $text ); ?></li>
                <li>
                    <?php _e( 'Now you have several methods for display the RSS feed icon (further just "button").', $text ); ?>
                    <?php _e( 'Just choose the one that is more suitable for your case.', $text ); ?>
                    <br><br>
                    <p><?php _e( '<b>A)</b> For add the button inside a post from WordPress Post/Page Editor use the following shortcode:', $text ); ?></p>
                    <p><?php highlight_string('[rss-feed-icon]'); ?></p>
                    <p><?php _e( '<b>B)</b> For add the button to the widget area (in sidebar, footer etc.) use the "Text" widget and add inside it the following shortcode:', $text ); ?></p>
                    <p><?php highlight_string('[rss-feed-icon]'); ?></p>
                    <p><?php _e( '<b>C)</b> For add the button directly to a theme files, just add the following code to needed place (where you want to display the button) in your theme files:', $text ); ?></p>
                    <p><?php highlight_string('<?php echo do_shortcode("[rss-feed-icon]"); ?>'); ?></p>
                </li>
                <li><?php _e( 'Enjoy your fancy RSS feed icon.', $text ); ?> <?php _e( 'It\'s that simple!', $text ); ?></li>
            </ol>
            <p class="note">
                <?php
                    printf(
                        __( 'If you want more options, then %s let us know %s and we will be happy to add them.', $text ),
                        '<a href="https://www.spacexchimp.com/contact.html" target="_blank">',
                        '</a>'
                    );
                ?>
            </p>
        </div>
    </div>
<?php
