<?php

class AuthController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function login($username, $password) {
        $user = $this->model->getUser($username, $password);

        if($user) {

            $password_hashed = $user['password'];

            if(password_verify($password, $password_hashed)) {
                $_SESSION['username'] = $username;
                $this->admin();
            } 
            else {
                $error = "Invalid username or password";
                include 'views/login.php';
            }

        }
        else {
            $error = "Invalid username or password";
            include 'views/login.php';
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
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
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