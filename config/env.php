<?php
    define('DB_HOST', 'localhost'); // Set database host
    define('DB_USER', 'root'); // Set database user
    define('DB_PASS', ''); // Set database password
    define('DB_NAME', 'php_mvc');  // Set database name
	define("DS", DIRECTORY_SEPARATOR);

	// -----------------------------------------------------------------------
	// DEFINE ROOT PATHS
	// -----------------------------------------------------------------------
	defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)));
	define("LIB_PATH_INC", SITE_ROOT.DS);