<?php
ob_start();
require_once('config/functions.php');
require_once('config/session.php');
if ($session->isUserLoggedIn(true)) {
    redirect('/src/View/home/', false);
} else {
    redirect('/src/View/login/', false);
}
