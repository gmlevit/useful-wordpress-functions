<?php

/*
 * Add to your theme's functions.php 
 * This sets redirection links based on whether user is running locally or test
 */


$refererParse = parse_url($_SERVER['HTTP_REFERER']);

//LOCAL
if ( $refererParse['host'] == 'localhost') {
         $loginURL = '/mysite/wp-login.php?redirect_to=' . $_SERVER['REQUEST_URI'];
         $contactFormURL = '/mysite/contact-us';

}
//TEST
else {
         $loginURL = '/test/mysite/wp-login.php?redirect_to=' . $_SERVER['REQUEST_URI'];
         $contactFormURL = '/test/mysite/contact-us';
}
?>
