<?php 

session_start();

require_once 'config/database.php';
require_once 'models/UserModel.php';
require_once 'models/ArticleModel.php';
require_once 'models/SkillModel.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/ArticleController.php';
require_once 'controllers/SkillController.php';

$userModel = new UserModel();
$authController = new AuthController($userModel);

$page = isset($_GET['page']) ? $_GET['page'] : '';
$module = isset($_GET['module']) ? $_GET['module'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if($page == 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $authController->login($username, $password);
    }
    else if($page == 'admin') {

        if($module == 'skill') {

            if($action == 'add') {
                $skillModel = new SkillModel();
                $skillController = new SkillController($skillModel);
                $skill = $_POST['skill'];
    
                $user_id = $_SESSION['user_id'];
    
                $skillController->create($skill, $user_id);
            }
            
            if($action == 'update') {
                $skillModel = new SkillModel();
                $skillController = new SkillController($skillModel);
                $skill = $_POST['skill'];
                $id = $_POST['id'];
                //$user_id = $_SESSION['user_id'];
    
                $skillController->update($skill, $id);
            }
    
            if($action == 'delete') {
                $skillModel = new SkillModel();
                $skillController = new SkillController($skillModel);
                $id = $_POST['id'];
                //$user_id = $_POST['user_id'];
    
                $skillController->delete($id);
            }
        }

        if($module == 'article') {

            if($action == 'addUpdate') {

                $id = $_POST['id'] ?? "";

                $articleModel = new ArticleModel();

                $articleController = new ArticleController($articleModel);
                
                $_POST['user_id'] = $_SESSION['user_id'];

                $articleModel->fill($_POST);

                if($id == "") {
                    $articleController->createPOST($articleModel);
                } 
                else {
                    $articleController->update($articleModel);
                }

            }
            
            if($action == 'delete') {
                $id = $_POST['id'];

                $articleModel = new ArticleModel();
                $articleController = new ArticleController($articleModel);
                $articleController->delete($id);
            }
        }
    }
    else {
        $authController->showLoginForm();
    }
}
else  {
    
    if($page != '')
    {
        if(file_exists("views/$page")) {
            include_once("views/$page/$page.php");
        }
        else {
            include_once("views/front/front.php");
        }
    }
    else 
    {
        $skillModel = new SkillModel();
        $skill = $skillModel->getSkill();

        include_once("views/front/front.php");
    }
    
}



?>