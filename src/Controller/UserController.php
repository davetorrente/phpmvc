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
    /**
     * User login method
     * login existing user account
     * session message to know login status
    */
    public function login()
    {
        if ($this->session->isUserLoggedIn(true)) {
            redirect('/src/View/home/', false);
        }
        if (isset($_POST['login'])) {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $user = $this->User->authenticate($_POST['email'], md5($_POST['password']));
                if ($user !== false) {
                    $this->session->login($user);
                    redirect('/src/View/home/', false);
                } else {
                    $this->session->inputMessage("login", "Invalid username or password");
                }
            } else {
                $this->session->inputMessage("login", "All fields are required.");
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
        if ($this->session->isUserLoggedIn(true)) {
            redirect('/src/View/home/', false);
        }
        if (isset($_POST['register'])) {
            $_POST['time'] = makeDate();
            if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
                $this->session->inputMessage("register", "All fields are required");
            } else {
                $validPassword = $this->User->checkMatchPassword($_POST['password'], $_POST['confirm_password']);
                $emailExists = $this->User->checkExists('email', $_POST['email']);
                if (!$validPassword || $emailExists) {
                    if ($emailExists) {
                        $this->session->inputMessage("email", "Email is already exists");
                    } elseif (!$validPassword) {
                        $this->session->inputMessage("password", "Password not matched.");
                    }
                } else {
                    $data = $_POST;
                    if (!empty($_FILES['user_pic'])) {
                        $picName = explode('.', $_FILES['user_pic']['name']);
                        $ext = end($picName);
                        $dir = './../../public/images/user/';
                        $filenameSaved = imageSave($_FILES['user_pic']['tmp_name'], $dir, $ext);
                        if ($filenameSaved) {
                            $data['pic_name'] = $filenameSaved;
                        }
                    }
                    if ($this->User->create($data)) {
                        $this->session->inputMessage("register", "Registration Success", true);
                        redirect('/src/View/register/', false);
                    } else {
                        $this->session->inputMessage("register", "Registration Failed");
                    }
                }
            }
        }
    }
    public function getUsers()
    {
        $this->User->database->query("SELECT * FROM users");
        $users = $this->User->database->resultset();

        return $users;
    }
}
$user = new UserController($database, $session);
