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
                
                $successUpload = false;

                $id = $_POST['id'] ?? "";
                $judul = $_POST['judul'];
                $deskripsi = $_POST['deskripsi'];
                $link = $_POST['link'];

                $num = 1;

                // check image format
                $allowedImageType = array("png","jpg","jpeg");

                $allAllowed = true;
                foreach($_FILES as $data) { 
                    $typeFoto = $data['type'] != "" ? explode("/", $data['type'])[1] : "";

                    if($typeFoto != "") {
                        if(!in_array($typeFoto, $allowedImageType)) {
                            echo "<p>Uploaded photo is not in right format</p>";
                            $allAllowed = false;
                            break;
                        }
                    }
                }

                $foto = "";

                if($allAllowed) 
                {
                    foreach($_FILES as $data) {
                        $typeFoto = $data['type'] != "" ? explode("/", $data['type'])[1] : "";
    
                        if($typeFoto != "") {
                            if($data['error'] === UPLOAD_ERR_OK) {
    
                                $uploadDir = 'src/img/uploads/portfolio/'.$judul.'/';
        
                                if(!is_dir($uploadDir)) {
                                    mkdir($uploadDir);
                                }

                                $type = explode("/", $data['type'])[1];
            
                                $uploadFile = $uploadDir . $judul . "_" . $num . "." . $type;   

                                if($foto != "") 
                                    $foto .= "|";

                                $foto .= $uploadFile;

                                if (!move_uploaded_file($data['tmp_name'], $uploadFile)) {
                                    echo "<p>Error moving file to $uploadFile</p>";
                                    break;
                                } 

                                $successUpload = true;

                                $num++;
                            }
                            else {
                                $error_messages = array(
                                    UPLOAD_ERR_OK         => 'There is no error, the file uploaded with success',
                                    UPLOAD_ERR_INI_SIZE   => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
                                    UPLOAD_ERR_FORM_SIZE  => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                                    UPLOAD_ERR_PARTIAL    => 'The uploaded file was only partially uploaded',
                                    UPLOAD_ERR_NO_FILE    => 'No file was uploaded',
                                    UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
                                    UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
                                    UPLOAD_ERR_EXTENSION  => 'A PHP extension stopped the file upload',
                                );
        
                                echo "<p>Error uploading file: " . $error_messages[$data['error']] . "</p>";
                                break;
                            }
                        }
                    }
                }

                $imgUploaded = array_filter($_FILES, function($a) { return $a['name']; });

                if($successUpload || count($imgUploaded) == 0) {
                    $portfolioModel = new PortfolioModel();

                    $portfolioController = new PortfolioController($portfolioModel);
                
                    $_POST['user_id'] = $_SESSION['user_id'];

                    // $foto = "";
                    // if(count($imgUploaded) > 0) {
                    //     foreach($imgUploaded as $data) {
                    //         if($foto != "") 
                    //             $foto .= "|";
                    //         $foto .= $data['name']; 
                    //     }
                    // }
                    // $_POST['foto'] = $foto;

                    $_POST['foto'] = $foto;

                    $portfolioModel->fill($_POST);

                    $portfolioController->createUpdatePOST($portfolioModel);
                }
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

include_once 'views/global.php';

?>
