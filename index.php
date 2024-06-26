<?php 

session_start();

require_once 'config/database.php';
require_once 'models/UserModel.php';
require_once 'models/ArticleModel.php';
require_once 'models/SkillModel.php';
require_once 'models/PortfolioModel.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/ArticleController.php';
require_once 'controllers/SkillController.php';
require_once 'controllers/PortfolioController.php';

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

                $articleController->createUpdatePOST($articleModel);
                
            }
            
            if($action == 'delete') {
                $id = $_POST['id'];

                $articleModel = new ArticleModel();
                $articleController = new ArticleController($articleModel);
                $articleController->delete($id);
            }
        }

        if($module == "portfolio") {

            if($action == 'addUpdate') {

                var_dump($_FILES['foto-1']['tmp_name']);

                /*
                $id = $_POST['id'] ?? "";
                $judul = $_POST['judul'];
                $deskripsi = $_POST['deskripsi'];
                $link = $_POST['link'];
                $deletedFiles = $_POST['deletedFiles'];

                $deletedFiles = explode(',', trim($deletedFiles, ','));
                $foto = null;
                $num = 1;

                if(isset($_FILES['foto'])) {

                    foreach ($_FILES['foto']['name'] as $index => $name) {
                        if (in_array($name, $deletedFiles)) {
                            continue;
                        }
    
                        if ($_FILES['foto']['error'][$index] === UPLOAD_ERR_OK) {
        
                            $uploadDir = 'src/img/uploads/portfolio/';
                            //$uploadFile = $uploadDir . basename($_FILES['foto']['name'][$index]);
    
                            $type = explode("/", $_FILES['foto']['type'][$index])[1];
        
                            $uploadFile = $uploadDir . $judul . "_" . $num . "." . $type;   
                            
                            $foto .= $uploadFile;
    
                            if (!move_uploaded_file($_FILES['foto']['tmp_name'][$index], $uploadFile)) {
                                echo "<p>Error moving file to $uploadFile</p>";
                                break;
                            } 

                            $foto .= ",";
    
                        } else {
                            echo "<p>Error uploading file: " . $_FILES['fileInput']['error'][$index] . "</p>";
                            break;
                        }
    
                        $num++;
                    }
                }

                $portfolioModel = new PortfolioModel();

                $portfolioController = new PortfolioController($portfolioModel);
                
                $_POST['user_id'] = $_SESSION['user_id'];
                $_POST['foto'] = $foto;

                $portfolioModel->fill($_POST);

                $portfolioController->createUpdatePOST($portfolioModel);

                */
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

        
        if($action == 'logout') {
            $authController->logout();
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