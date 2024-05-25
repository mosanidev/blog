<?php

class AuthController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function login($username, $password) {
        $user = $this->model->getUser($username, $password);

        if($user) {
            $_SESSION['username'] = $username;
            $this->admin();
        }
        else {
            $error = "Invalid username or password";
            include 'views/login.php';
        }
    }

    public function register($username, $password) {
        $insertedUser = $this->model->createUser($username, $password);

        if($insertedUser > 0) {
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