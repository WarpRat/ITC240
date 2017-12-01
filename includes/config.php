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

//START CONFIG SNIPPET #1

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'widgets_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

//END CONFIG SNIPPET #1

//START CONFIG SNIPPET #2

define('ADMIN_PATH', $config->virtual_path . '/admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . '/includes/');

//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}

//END CONFIG SNIPPET #2

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

//START CONFIG SNIPPET #3

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav

    $config->adminWidget = '


        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a>
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>


    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)

    $config->adminWidget = '

        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>

    ';

}

//END CONFIG SNIPPET #3
