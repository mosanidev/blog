<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style/admin.css">
</head>
<body>
    <div class="container-menu-admin">
        <div class="side-menu-admin">
            <ul>
                <li><a href="index.php?page=admin&module=article">Article</a></li>
                <li><a href="index.php?page=admin&module=skill">Skill</a></li>
                <li><a href="index.php?page=admin&module=portfolio">Portfolio</a></li>
            </ul>
        </div>
        <div class="content-admin">
            <?php
                $module = isset($_GET['module']) ? $_GET['module'] : '';

                if(file_exists("views/admin/$module.php")) {

                    if($module == "article") {
                        $articleModel = new ArticleModel();
                        $articleController = new ArticleController($articleModel);

                        $articleController->index();
                    }

                    if($module == "skill") {
                        $skillModel = new SkillModel();
                        $skillController = new SkillController($skillModel);

                        $skillController->index();
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>