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

        $id = $_GET['id'] ?? "";
        
        if(isset($id)) {
            $portfolio = $this->getById($id);
        }

        var_dump($portfolio);

        include_once 'views/admin/create_edit_portfolio.php';
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM portfolio where id=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function createUpdatePOST($model) {

        $id = $model->id;
        $judul = $model->judul;
        $deskripsi = $model->deskripsi;
        $foto = $model->foto;
        $link = $model->link;
        $user_id = $model->user_id;

        if($id == 0)
        {
            $stmt = $this->db->prepare("INSERT INTO portfolio (judul, deskripsi, foto, link, user_id) VALUES (?,?,?,?,?)");
            $stmt->bind_param("sssss", $judul, $deskripsi, $foto, $link, $user_id);
            $stmt->execute();
        }
        else {
            
        }

        if($stmt->affected_rows > 0) {
            header("Location: index.php?page=admin&module=portfolio");
            exit();
        }
    }

}

?>