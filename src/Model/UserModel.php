<?php
namespace App\Model;

require_once('./../../config/database.php');
require_once('AppModel.php');
use App\Model\AppModel as AppModel;

class UserModel extends AppModel
{
    public function __construct($database)
    {
        parent::__construct($database, $this);
    }
    /**
     * User create method
     * create user from data parameter
     * @param array $data post inputs
     * @return bool
    */
    public function create($data)
    {
        $username = $data['username'];
        $password = md5($data['password']);
        $time = $data['time'];
        $this->database->query("INSERT INTO users (username, password, created, modified) VALUES('{$username}', '{$password}', '{$time}', '{$time}')");

        if ($this->database->execute()) {
            return true;
        }

        return false;
    }
     /**
     * User checExists method
     * check existing record of a user
     * @param string $field table field
     * @param string $value input to check
     * @return bool
    */
    public function checkExists($field, $value)
    {
        $this->database->query("SELECT id FROM users WHERE $field = '{$value}'");
        $user = $this->database->resultset();

        return !empty($user) ? true : false;
    }
}
