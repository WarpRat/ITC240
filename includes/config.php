<?php
/*
config.php

stores configuration information for our web app.

*/

//prevents header errors
ob_start();

define('DEBUG', true); #we want to see all errors

include 'credentials.php'; // stores DB info
include 'common.php'; // stores favorite functions

//prevents date errors

date_default_timezone_set('America/Los_Angeles');

//create default page identifier
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//create config objet
$config = new stdClass;

//set wibsite defaults
$config->title = THIS_PAGE;
$config->banner = 'Blue Water<span>Catering</span>';
$config->image_sub = 'images/uploads/';

//START NEW THEME STUFF
$sub_folder = 'bluewater';//change to 'widgets' or 'sprockets' etc.

//add subfolder, in this case 'fidgets' if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
$config->virtual_path = 'http://' . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;
$config->theme = 'BlueRipple';//sub folder to themes

//END NEW THEME STUFF


switch(THIS_PAGE){

    case 'customers.php':
        $config->title = 'Customer Database';
    break;
    case 'dishes.php':
        $config->title = 'Sample Dishes';
        $config->sub_banner = 'A Sample Selection of Our Cuisine';
    break;
    case 'daily.php':    
        $config->title = 'Daily Menus';
    break;
    case 'contact.php':
        $config->title = 'Contact Page';
    break;
    case 'catering.php':
        $config->title = 'Catering Requests';
        $config->banner = 'L\'eau Bleue<span>Traiteur</span>';
    break;
    case 'index.php':
        $config->title = 'Blue Water Catering';
    break;
}


//START NEW THEME STUFF
//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . '/themes/' . $config->theme . '/';
//END NEW THEME STUFF

?>
