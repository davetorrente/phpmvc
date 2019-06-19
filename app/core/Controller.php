<?php 

class Controller
{
    protected $view;
    protected $model;
    protected $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function view($viewName, $data = [])
    {
        $this->view = new View($viewName, $data);

        return $this->view;
    }

    public function model($modelName, $data = [])
    {
        if (file_exists(MODEL . $modelName . '.php')) {
            require MODEL . $modelName . '.php';
            $this->model = new $modelName;
        }
    }
}