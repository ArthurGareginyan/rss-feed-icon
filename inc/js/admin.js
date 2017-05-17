/*
 * Plugin JavaScript and JQuery code for the admin pages of website
 *
 * @package     RSS Feed Icon
 * @uthor       Arthur Gareginyan
 * @link        http://www.arthurgareginyan.com
 * @copyright   Copyright (c) 2016-2017 Arthur Gareginyan. All Rights Reserved.
 * @since       2.1
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

    // Enable Bootstrap Checkboxes
    $(':checkbox').checkboxpicker();

    // Dynamic content
    $( ".include-tab-author" ).load( "http://mycyberuniverse.com/public-files/dynamic-content/page-for-include.html #include-tab-author" );
    $( ".include-tab-support" ).load( "http://mycyberuniverse.com/public-files/dynamic-content/page-for-include.html #include-tab-support" );
    $( ".include-tab-family" ).load( "http://mycyberuniverse.com/public-files/dynamic-content/page-for-include.html #include-tab-family" );
    $( ".additional-css" ).load( "http://mycyberuniverse.com/public-files/dynamic-content/styles.html" );

    // Add questions and answers into spoilers and color them in different colors
    $(".panel-group .panel").each(function(i) {
         $( ".question-" + (i+1) ).appendTo( $("h4", this) );
         $( ".answer-" + (i+1) ).appendTo( $(".panel-body", this) );

         if ( $(this).find("h4 div").hasClass('question-red') ) {
             $(this).addClass('panel-danger');
         } else {
             $(this).addClass('panel-info');
         }
    });

});
