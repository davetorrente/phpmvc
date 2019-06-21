<?php
const DS = DIRECTORY_SEPARATOR;
define('DB_HOST', 'localhost'); // Set database host
define('DB_USER', 'root'); // Set database user
define('DB_PASS', ''); // Set database password
define('DB_NAME', 'php_mvc');  // Set database name
define('ROOT', dirname(__DIR__) . DS);
define('APP', ROOT . 'app' . DS);
define('VIEW', ROOT . 'app' . DS . 'view' . DS);
define('MODEL', ROOT . 'app' . DS . 'model' . DS); 
define('CORE', ROOT . 'app' . DS . 'core' . DS);
define('CONTROLLER', ROOT . 'app' . DS . 'controller' . DS);
define('ASSETS', ROOT . 'public' . DS . 'assets' . DS);
