<?php
require_once('./../../config/functions.php');
require_once('./../../config/session.php');
if (!$session->logout()) {
    redirect("/src/View/login");
}
