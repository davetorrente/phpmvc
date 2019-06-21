<?php 
require CORE . 'Functions.php';
class Controller
{
    protected $view;
    protected $model;
    protected $session;
    public function __construct()
    {
        
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

            return $this->model;
        }
    }

    public function session()
    {
        $this->session = new Session();

        return $this->session;
    }
}