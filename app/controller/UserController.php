<?php
class UserController extends Controller
{
    /**
     * User login method
     * login existing user account
     * session message to know login status
    */
    public function login()
    {

        $this->view('user/login', []);
        $this->view->pageTitle = 'Login';
        if (isset($_POST['login'])) {
            // if (isset($_POST['email']) && isset($_POST['password'])) {
            //     $user = $this->User->authenticate($_POST['email'], md5($_POST['password']));
            //     if ($user !== false) {
            //         $this->session->login($user);
            //         redirect('/src/View/home/', false);
            //     } else {
            //         $this->session->inputMessage("login", "Invalid username or password");
            //     }
            // } else {
            //     $this->session->inputMessage("login", "All fields are required.");
            // }
        }
        $this->view->render();
    }
    /**
     * User register method
     * create user from post data
     * session message to know registration status
    */
    public function register()
    {
        $this->view('user/register', []);
        $this->view->pageTitle = 'Register';
        $this->view->render();
    }
}