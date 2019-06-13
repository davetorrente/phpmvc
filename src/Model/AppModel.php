<?php
namespace App\Model;

require_once('./../../config/database.php');
require_once('./../../config/functions.php');
class AppModel
{
    public $database;
    public $controller;
    public function __construct($database, $model)
    {
        $this->database = $database;
        $this->model = $model;
    }
}
