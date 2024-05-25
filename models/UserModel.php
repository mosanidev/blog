<?php

class UserModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getUser($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        echo $result->fetch_assoc();
        return $result->fetch_assoc();
    }

    public function createUser($username, $password) {
        $stmt = $this->db->prepare("INSERT INTO user (username, password) VALUES (?,?)");
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("ss", $username, $hashed_password);
        $stmt->execute();
        return $stmt->affected_rows;
    }

}

?>