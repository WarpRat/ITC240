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

//echo $_SERVER['PHP_SELF'];

//echo THIS_PAGE;



//die;



?>
