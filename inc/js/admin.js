/*
 * JS functions for plugin settings page
 *
 * Copyright (c) 2016 Arthur Gareginyan ( http://www.arthurgareginyan.com ).
 * All Rights Reserved.
 */


jQuery(document).ready(function($) {

    "use strict";

    // The "Upload" button
    $('.upload_image_button').click(function() {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        wp.media.editor.send.attachment = function(props, attachment) {
            $(button).parent().prev().attr('src', attachment.url);
            $(button).prev().val(attachment.id);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open(button);
        return false;
    });

    // The "Remove" button (remove the value from input type='hidden')
    $('.remove_image_button').click(function() {
        var answer = confirm('Are you sure?');
        if (answer == true) {
            var src = $(this).parent().prev().attr('data-src');
            $(this).parent().prev().attr('src', src);
            $(this).prev().prev().val('');
        }
        return false;
    });

    // Remove the "successful" message after 3 seconds
    if (".updated") {
        setTimeout(function() {
            $(".updated").fadeOut();
        }, 3000);
    }

});
