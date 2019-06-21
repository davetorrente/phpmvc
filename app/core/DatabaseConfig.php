<?php
class DatabaseConfig
{
    private $dbh;
    private $error;
    private $stmt;

    public function __construct()
    {
        //Set Options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
        );
        // Create new PDO
        try {
            $this->dbh = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS, $options);
            $this->dbh->query("CREATE DATABASE IF NOT EXISTS ". DB_NAME. " CHARACTER SET utf8 COLLATE utf8_general_ci;");
            $this->dbh->query("use " . DB_NAME);
        } catch (PDOException $e) {
            echo $this->error = $e->getMessage();
        }
    }
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
    
    public function lastInsertId()
    {
        $this->dbh->lastInsertId();
    }

    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function whileLoop()
    {
        global $db;
        $results = array();
        $x = 0;
        while ($x < $this->rowCount()) {
            $result = $this->resultset();
            $results[] = $result;
            $x++;
        }
     
        return $results;
    }
}
