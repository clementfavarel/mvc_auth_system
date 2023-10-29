<?php

class Db
{
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbName = 'db_name';

    private function __construct()
    {
        $this->conn = new PDO(
            "mysql:host={$this->host};
        dbname={$this->dbName}",
            $this->user,
            $this->pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
        );
    }

    public function __clone()
    {
        throw new Exception('Clonage non autorisé');
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Db();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
        echo "<script>console.log('Connecté à la base de donnée');</script>";
    }
}
