<?php

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli('localhost', 'root', '', 'blog');
        if($this->connection->connect_error) {
            die("Connection error : " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

}

?>