<?php
defined('BASEPATH') or exit('No direct script access allowed');

define('APP_NAME', 'embarquesoft');

$siteUrl = 'https://'.$_SERVER['HTTP_HOST'].'/' . 'embarquesoft' .'/';
defined('SITE_URL')      OR define('SITE_URL', $siteUrl); // lowest 
defined('ASSETS')      OR define('ASSETS', $siteUrl.'assets/'); // lowest 
defined('JS_FILE')      OR define('JS_FILE', $siteUrl.'assets/js/'); // lowest 
defined('CSS_FILE')      OR define('CSS_FILE', $siteUrl.'assets/css/'); // lowest 
defined('IMAGES')      OR define('IMAGES', $siteUrl.'assets/images/'); // lowest 
defined('SITE_TITLE') OR define('SITE_TITLE','embarquesoft');

define("DEFAULT_ERROR_MESSAGE", 'Oops! Something went wrong! Help us improve your experience by sending an error report');
define("SERVER_DOWN", 'sorry we are a bit overloaded right now please try again latter');

define('DATE_TIME',date('Y-m-d h:i:s'));
define('DATE',date('Y-m-d'));
define('TIME',date('h:i:s'));
define('ERROR_CODE','error');
define('SUCCESS_CODE','success');
define('AUTHENTICATION_FAIL','2');
define('IP',$_SERVER['REMOTE_ADDR']);

define('SUPERADMIN',1);
define('ADMIN',2);
define('COMPANY',3);
define('DRIVER',4);
define('PORTAL_USER',5);
define('MAP_API_URL','https://maps.googleapis.com/maps/api/js?key=AIzaSyADn_S33DIb9GpWrLaF2vPurQfZJlLXoAw&libraries=places');









