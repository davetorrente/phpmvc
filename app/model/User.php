<?php

class User extends AppModel
{
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
        $email = $data['email'];
        $time = $data['time'];
        $picName = $data['pic_name'];
        $this->database->query("INSERT INTO users (username, password, email, pic_name, created, modified) VALUES('{$username}', '{$password}', '{$email}', '{$picName}', '{$time}', '{$time}')");

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
    /**
     * User authenticate method
     * authenticate user record
     * @param string $username table field
     * @param string $password table field
     * @return array user or bool false
    */
    public function authenticate($email, $password)
    {
        $this->database->query("SELECT * FROM users WHERE email = '{$email}' and password = '{$password}'");
        $user = $this->database->resultset();

        return !empty($user) ? $user : false;
    }

     /**
     * User checkMatchPassword method
     * authenticate user record
     * @param string $username table field
     * @param string $password table field
     * @return array user or bool false
    */
    public function checkMatchPassword($password, $confirmPassword)
    {
        if ($password == $confirmPassword) {
            return true;
        }

        return false;
    }
}
