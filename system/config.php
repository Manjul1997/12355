<?php

/* Error Reporting */

error_reporting(0);

ini_set('display_errors', 0);



/* Server configuration & optimisation */

ini_set('implicit_flush', 1);

set_time_limit(0);



/* Starting session */

session_start();



/* Starting compression */

ob_start();



/* Define Base Path */

define('BASE_PATH', realpath(dirname(__FILE__).'/..'));



/* Include required files */

include(BASE_PATH.'/system/dbconn.php');

include(BASE_PATH.'/system/lib/functions.php');

?>