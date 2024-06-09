<?php 

class PortfolioController {
    private $model;
    private $db;

    public function __construct($model) {
        $this->model = $model;
        $this->db = Database::getInstance()->getConnection();
    }

    public function index() {
        $portfolio = $this->model->getPortfolio();

        include 'views/admin/portfolio.php';
    }

    public function createEdit() {
        include 'views/admin/create_edit_portfolio.php';
    }

    public function createUpdatePOST($model) {
        var_dump($model);
    }

}

?>