<?php
namespace App\Controller;

require_once('BaseController.php');
require_once('./../Model/UserModel.php');
use App\Controller\BaseController as BaseController;
use App\Model\UserModel as UserModel;

class UserController extends BaseController
{
    public function __construct($database, $session)
    {
        parent::__construct($session, $this);
        $this->User = new UserModel($database);
    }
    public function beforeFilter()
    {
        parent::beforeFilter();
    }
    /**
     * User login method
     * login existing user account
     * session message to know login status
    */
    public function login()
    {
        if (isset($_POST['login'])) {
            $user = $this->User->authenticate($_POST['username'], md5($_POST['password']));
            if ($user !== false) {
                $this->session->login($user[0]['id']);
                redirect('/src/View/home/', false);
            } else {
                $this->session->inputMessage("error", "Invalid username or password");
            }
        }
    }
    /**
     * User register method
     * create user from post data
     * session message to know registration status
    */
    public function register()
    {
        if (isset($_POST['register'])) {
            $_POST['time'] = makeDate();
            if (empty($_POST['username']) || empty($_POST['password'])) {
                $this->session->inputMessage("error", "All fields are required");
            } else {
                if ($this->User->checkExists('username', $_POST['username'])) {
                    $this->session->inputMessage("error", "Username is already exists");
                } else {
                    if ($this->User->create($_POST)) {
                        $this->session->inputMessage("success", "Registration Success", true);
                        redirect('/src/View/register/', false);
                    } else {
                        $this->session->inputMessage("error", "Registration Failed");
                    }
                }
            }
        }
    }
}
$user = new UserController($database, $session);
