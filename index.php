<?php 

session_start();

require_once 'config/database.php';
require_once 'models/UserModel.php';
require_once 'controllers/AuthController.php';

// Initialize model and controller 
$model = new UserModel();
$controller = new AuthController($model);

// Determine action from the URL parameter
$action = isset($_GET['action']) ? $_GET['action'] : '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if($action == 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $controller->login($username, $password);
    } else {
        $controller->showLoginForm();
    }
}
else  {
    
    if(file_exists("views/$action.php")) {
        include_once("views/$action.php");
    }
    else {
        include_once("views/front.php");
    }
}



?>