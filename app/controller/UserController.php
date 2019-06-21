<?php

class UserController extends Controller
{
    public function __construct()
    {
        $this->model('User');
        $this->User = $this->model;
    }
    /**
     * User login method
     * login existing user account
     * session message to know login status
    */
    public function login()
    {
        $error = '';
        if (isset($_POST['login'])) {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $user = $this->User->authenticate($_POST['email'], md5($_POST['password']));
                if ($user !== false) {
                    $this->session()->login($user);
                    redirect('/home/', false);
                } else {
                    $error = "Invalid username or password";
                }
            } else {
                $error = "All fields are required.";
            }
        }
        $this->view('user/login', ['error' => $error]);
        $this->view->pageTitle = 'Login';
        $this->view->render();
    }
    /**
     * User register method
     * create user from post data
     * session message to know registration status
    */
    public function register()
    {
        $errors = [];
        if (isset($_POST['register'])) {
            $_POST['time'] = makeDate();
            if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
                $errors[] = "All fields are required.";
            } else {
                $validPassword = $this->User->checkMatchPassword($_POST['password'], $_POST['confirm_password']);
                $emailExists = $this->User->checkExists('email', $_POST['email']);
                if (!$validPassword || $emailExists) {
                    if ($emailExists) {
                        $errors[] = "Email is already exists.";
                    } elseif (!$validPassword) {
                        $errors[] = "Password not matched.";
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
                        $errors[] = "Registration Success.";
                    } else {
                        $errors[] = "Registration Failed.";
                    }
                }
            }
        }
        $this->view('user/register', ['errors' => $errors]);
        $this->view->pageTitle = 'Register';
        $this->view->render();
    }
}
