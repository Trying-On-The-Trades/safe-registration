<?php

/*
Plugin Name: Safe Registration
Plugin URI: http://dan-blair.ca
Description: Safe registration for students
Version: 0.1.5
Author: Trying On The Trades
Author URI: http://www.tott.com
*/

// Originally developed by Dann Blair

// Version of the DB used
define( 'REGISTER_DB_VERSION', '1.0' );

// Add jquery because we need that...
wp_register_script('jquery', $jquery_location, true);
wp_enqueue_script('jquery');

// Require in the registration functions
require_once("functions/register_functions.php");
require_once("js/register_js.php");
require_once("functions/db.php");

// Activation hook to install the DB
register_activation_hook( __FILE__, 'registration_install' );
register_uninstall_hook( __DIR__ . "/functions/uninstall.php", 'registration_uninstall' );


// Register the scripts that we need to alter the registration page
$register_location = WP_PLUGIN_URL . "/saferegistration.php?registration_js=1";
wp_register_script('register_js', $register_location, false, false, true);
wp_enqueue_script('register_js');

// Used to return the XML to build the registration on the page
if (isset($_GET['registration_js'])){
    return_registration_script();
}
