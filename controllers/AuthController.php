<?php

class AuthController {
    private $model;
    private $db;

    public function __construct($model) {
        $this->model = $model;
        $this->db = Database::getInstance()->getConnection();
    }

    public function login($username, $password) {
        $user = $this->model->getUser($username, $password);

        if($user) {

            $password_hashed = $user['password'];

            if(password_verify($password, $password_hashed)) {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user['id'];
                $this->admin();
                header('Location: index.php?page=admin');

            } 
            else {
                $error = "Invalid username or password";
                include 'views/login/login.php';
            }

        }
        else {
            $error = "Invalid username or password";
            include 'views/login/login.php';
        }
    }

    public function register($username, $password) {
        $stmt = $this->db->prepare("INSERT INTO user (username, password) VALUES (?,?)");
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("ss", $username, $hashed_password);
        $stmt->execute();

        if($stmt->affected_rows > 0) {
            echo "successfully created an user";
        }
    }

    public function admin() {
        if(isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $user_id = $_SESSION['user_id'];
            include 'views/admin.php';
        } else {
            header('Location: login.php');
        }
    }

    public function showLoginForm() {
        header('Location: login.php');
    }

    public function logout() {
        session_destroy();
        header('Location: login.php');
    }
}

?>