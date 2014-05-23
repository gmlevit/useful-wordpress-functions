<?php

/*
 * Change the default text of all passoword-protected pages
 * Add this to your theme's functions.php to create a plugin
 */

//1. Add filter to change the text and display the form
function gmlevit_password_protected_page_form() {
    global $post;

    $post = get_post( $post );
    $label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );

    $gmlevit_new_text = "The new text goes here. " .
        "If you need the password, please contact us at <strong>555-1212</strong> or email us at ".
        "<a href='mailto:info@somedomain.com'>info@somedomain.com</a> .";

    $output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <p>' . __( $gmlevit_new_text ) . '</p>
    <p><label for="' . $label . '">' . __( 'Password:' ) . '<input name="post_password" id="' . $label . '" type="password" size="20" /></label></p>' .
    '<p><input type="submit" name="Submit" value="' . esc_attr__( 'Submit' ) . '" /></p>
    </form>';

    return $output;
}
add_filter('the_password_form','gmlevit_password_protected_page_form');


// 2. Set password timeout to be the same as wordpress session
function gmlevit_password_protected_session_expire() {
    
    // Setting a time of 0 in setcookie() forces the cookie to expire with the session
    if ( isset( $_COOKIE['wp-postpass_' . COOKIEHASH] ) )
        setcookie('wp-postpass_' . COOKIEHASH, '', 0, COOKIEPATH);
}
add_action( 'wp', 'gmlevit_password_protected_session_expire' );
?>
