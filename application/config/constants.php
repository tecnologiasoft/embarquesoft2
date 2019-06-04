<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);
define('EXT', '.php');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



/*
|--------------------------------------------------------------------------
| Rest api encryption/decryption
|--------------------------------------------------------------------------
*/
defined('KEY_256')      OR define('KEY_256','28R8XWV76N4ZEPGXMC542XLJBXMCCICX');
defined('IV')      OR define('IV','28R8XWV76N4ZEPGX'); 

/*
|--------------------------------------------------------------------------
| Google Place API Key
|--------------------------------------------------------------------------
*/
//defined('PLACE_API_KEY') 			OR define('PLACE_API_KEY', 'AIzaSyBkyo_LbEsLKOPAjmVhZkI9LvNbT9Kgfvc'); 

defined('PLACE_API_KEY') 			OR define('PLACE_API_KEY', 'AIzaSyBkyo_LbEsLKOPAjmVhZkI9LvNbT9Kgfvc'); 
/*
|--------------------------------------------------------------------------
| Android/iOS Push keys
|--------------------------------------------------------------------------
*/
defined('ANDROID_PUSH_KEY') 		OR define('ANDROID_PUSH_KEY', 'AIzaSyAq6ILBTdg-Ojqt8NoC9kM54hIL51U-l2g'); 
defined('IOS_PEM_DEVELPMENT') 		OR define('IOS_PEM_DEVELPMENT', 'pem/Ned_Dev_APP.pem'); 
defined('IOS_PEM_DISTRIBUTION') 	OR define('IOS_PEM_DISTRIBUTION', 'pem/Jinky_Distribution_APNS.pem'); 

/*
|--------------------------------------------------------------------------
| Soft/Force App Updates
|--------------------------------------------------------------------------
*/
defined('IOS_VERSION') 				OR define('IOS_VERSION', 'v1'); 
defined('ANDROID_VERSION') 			OR define('ANDROID_VERSION', 'v1'); 
defined('UPDATE_TYPE') 				OR define('UPDATE_TYPE', '0');

/*
|--------------------------------------------------------------------------
| Set Images Path
|--------------------------------------------------------------------------
*/
defined('ADMIN_IMAGE') 				OR define('ADMIN_IMAGE', 'assets/upload/admin_profile/');
defined('ADMIN_IMAGE_THUMB')       	OR define('ADMIN_IMAGE_THUMB', 'assets/upload/admin_profile/thumb/');

defined('COMPANY_IMAGE') 				OR define('COMPANY_IMAGE', 'assets/upload/company_image/');
defined('CUSTOMER_IMAGES') 				OR define('CUSTOMER_IMAGES', 'assets/upload/customer/');

defined('USER_IMAGE')             	OR define('USER_IMAGE', 'assets/upload/user_profile/'); 
defined('USER_IMAGE_THUMB')       	OR define('USER_IMAGE_THUMB', 'assets/upload/user_profile/thumb/'); 

defined('MERCHANT_IMAGE')           OR define('MERCHANT_IMAGE', 'assets/upload/merchant/'); 
defined('MERCHANT_IMAGE_THUMB')     OR define('MERCHANT_IMAGE_THUMB', 'assets/upload/merchant/thumb/'); 

defined('MERCHANTSTORE_IMAGE')           OR define('MERCHANTSTORE_IMAGE', 'assets/upload/merchant_store/'); 
defined('MERCHANTSTORE_IMAGE_THUMB')     OR define('MERCHANTSTORE_IMAGE_THUMB', 'assets/upload/merchant_store/thumb/'); 

defined('MERCHANTSTORELOGO_IMAGE')           OR define('MERCHANTSTORELOGO_IMAGE', 'assets/upload/merchant_store/logo/'); 
defined('MERCHANTSTORELOGO_IMAGE_THUMB')     OR define('MERCHANTSTORELOGO_IMAGE_THUMB', 'assets/upload/merchant_store/logo/thumb/'); 
defined('SHIPT_TO_IMAGES') 				OR define('SHIPT_TO_IMAGES', 'assets/upload/shipto/');
