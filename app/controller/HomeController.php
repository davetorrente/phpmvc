<?php


class HomeController extends Controller
{
    public function index()
    {
        if (!$this->session()->isUserLoggedIn(true)) {
            redirect('/user/login/', false);
        }
        $this->view('home/index', []);
        $this->view->pageTitle = 'Dashboard';
        $this->view->render();
    }
    public function about()
    {
        $this->view('home/about', []);
        $this->view->pageTitle = 'About';
        $this->view->render();
    }
}