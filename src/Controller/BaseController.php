<?php
namespace App\Controller;

require_once('./../../config/session.php');
require_once('./../../config/functions.php');
class BaseController
{
    public $session;
    public $controller;
    public function __construct($session, $controller)
    {
        $this->controller = $controller;
        $this->session = $session;
        $this->beforeFilter();
    }
    public function beforeFilter()
    {
        if ($this->session->isUserLoggedIn(true)) {
            redirect('/src/View/home/', false);
        }
    }
}
