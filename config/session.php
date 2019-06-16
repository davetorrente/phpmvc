<?php
session_start();

class Session
{
    public $message;
    private $userIsLoggedIn = false;
    public $controllerMethod = [];
    public $authUser;
    public function __construct()
    {
        $this->userLoginSetup();
        $this->flashMsg(true);
    }

    public function isUserLoggedIn()
    {
        return $this->userIsLoggedIn;
    }
    public function login($user)
    {
        $_SESSION['user'] = $user;
    }
    private function userLoginSetup()
    {
        if (isset($_SESSION['user'])) {
            $this->userIsLoggedIn = true;
        } else {
            $this->userIsLoggedIn = false;
        }
    }
    public function logout()
    {
        session_destroy();
        header("Location: /");
        exit;
    }
    public function inputMessage($type = '', $msg = '', $redirect = false)
    {
        if (!empty($msg)) {
            if ($redirect) {
                $_SESSION['msg'][$type] = $msg;
            } else {
                $this->message[$type] = $msg;
            }
        }
    }
    public function flashMsg()
    {
        if (isset($_SESSION['msg'])) {
            $this->message = $_SESSION['msg'];
            unset($_SESSION['msg']);
        } else {
            return $this->message;
        }
    }
}

$session = new Session();
