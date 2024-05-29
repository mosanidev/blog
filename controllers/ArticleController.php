<?php 

class ArticleController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $article = $this->model->getArticle();

        include 'views/admin/article.php';
    }

    public function create() {
        include_once 'views/admin/create_new_article.php';
    }

}

?>