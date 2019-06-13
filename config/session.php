<?php
session_start();

class Session
{
    public $message;
    private $userIsLoggedIn = false;
    public function __construct()
    {
        $this->flashMsg();
        $this->userLoginSetup();
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
    public function inputMessage($type = '', $msg = '')
    {
        if (!empty($msg)) {
            $_SESSION['msg'][$type] = $msg;
        }
    }
    public function flashMsg()
    {
        if (isset($_SESSION['msg'])) {
            $this->message = $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    }
}

$session = new Session();
