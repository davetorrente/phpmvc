<?php
class AppModel
{
    public $database;

    public function __construct()
    {
        $this->database = new DatabaseConfig();
    }
}
