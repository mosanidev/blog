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

        // $id = $model->id;
        // $judul = $model->judul;
        // $deskripsi = $model->deskripsi;
        // $foto = $model->foto;
        // $link = $model->link;
        // $user_id = $model->user_id;

        // if($id == 0)
        // {
        //     $stmt = $this->db->prepare("INSERT INTO portfolio (judul, deskripsi, foto, link, user_id) VALUES (?,?,?,?)");
        //     $stmt->bind_param("ssss", $judul, $deskripsi, $foto, $link, $user_id);
        //     $stmt->execute();
        // }
        // else {
        //     
        // }

        // if($stmt->affected_rows > 0) {
        //     header("Location: index.php?page=admin&module=article");
        // }
    }

}

?>