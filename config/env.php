<?php
    define('DB_HOST', 'remotemysql.com'); // Set database host
    define('DB_USER', 'J95e7iOAiv'); // Set database user
    define('DB_PASS', '0bMS4HEfpg'); // Set database password
    define('DB_NAME', 'J95e7iOAiv');  // Set database name
    define("DS", DIRECTORY_SEPARATOR);

    // -----------------------------------------------------------------------
    // DEFINE ROOT PATHS
    // -----------------------------------------------------------------------
    defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)));
    define("LIB_PATH_INC", SITE_ROOT.DS);