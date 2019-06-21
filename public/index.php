<?php
const DS = DIRECTORY_SEPARATOR;
define('ROOT', dirname(__DIR__) . DS);
define('APP', ROOT . 'app' . DS);
define('VIEW', ROOT . 'app' . DS . 'view' . DS);
define('MODEL', ROOT . 'app' . DS . 'model' . DS);
define('DATA', ROOT . 'app' . DS . 'data' . DS);
define('CORE', ROOT . 'app' . DS . 'core' . DS);
define('CONTROLLER', ROOT . 'app' . DS . 'controller' . DS);
define('ASSETS', ROOT . 'public' . DS . 'assets' . DS);
define('DB_HOST', 'remotemysql.com'); // Set database host
define('DB_USER', 'J95e7iOAiv'); // Set database user
define('DB_PASS', '0bMS4HEfpg'); // Set database password
define('DB_NAME', 'J95e7iOAiv');  // Set database name
$modules = [ROOT, APP, CORE, CONTROLLER, DATA];

set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));
spl_autoload_register('spl_autoload', false);

new Application;