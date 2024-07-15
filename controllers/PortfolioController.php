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
        $deleted_photo = $model->deleted_photo;

        if($id == 0)
        {
            $stmt = $this->db->prepare("INSERT INTO portfolio (judul, deskripsi, foto, link, user_id) VALUES (?,?,?,?,?)");
            $stmt->bind_param("ssssi", $judul, $deskripsi, $foto, $link, $user_id);
            $stmt->execute();
        }
        else {

            if($deleted_photo != "EMPTY_ALL") {

                

            }

            // $stmt = $this->db->prepare("UPDATE portfolio SET judul = ?, deskripsi = ?, foto = ?, link = ?, user_id = ? WHERE id = ?");
            // $stmt->bind_param("ssssii", $judul, $deskripsi, $foto, $link, $user_id, $id);
            // $stmt->execute();
        }

        // if($stmt->affected_rows > 0) {
        //     header("Location: index.php?page=admin&module=portfolio");
        //     exit();
        // }
    }

    public function delete($id, $judul)
    {
        
        $stmt = $this->db->prepare("DELETE FROM portfolio WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if($stmt->affected_rows > 0) {
            
            // if(is_dir('src/img/uploads/portfolio/'.$judul)) {
            //     var_dump(rmdir('src/img/uploads/portfolio/'.$judul));
            // }

            header("Location: index.php?page=admin&module=portfolio");
            exit;
        }
        
    }

}

?>