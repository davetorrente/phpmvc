<?php
session_start();

class Session
{
    public $message;
    private $userIsLoggedIn = false;
    public function __construct()
    {
        $this->userLoginSetup();
        $this->flashMsg(true);
    }

    public function isUserLoggedIn()
    {
        return $this->userIsLoggedIn;
    }
    public function login($userId)
    {
        $_SESSION['userId'] = $userId;
    }
    private function userLoginSetup()
    {
        if (isset($_SESSION['userId'])) {
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
