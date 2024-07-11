<?php 

class ArticleController {
    private $model;
    private $db;

    public function __construct($model) {
        $this->model = $model;
        $this->db = Database::getInstance()->getConnection();
    }

    public function index() {
        $article = $this->model->getArticle();

        include 'views/admin/article.php';
    }

    public function createEdit() {

        $id = $_GET['id'] ?? "";
        
        if(isset($id)) {
            $article = $this->getById($id);
        }

        include_once 'views/admin/create_edit_article.php';
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM article where id=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM article WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if($stmt->affected_rows > 0) {
            header("Location: index.php?page=admin&module=article");
        }
    }

    public function createUpdatePOST($model) 
    {
        $id = $model->id;
        $judul = $model->judul;
        $akses = $model->akses;
        $isi = $model->isi;
        $user_id = $model->user_id;

        if($id == 0)
        {
            $stmt = $this->db->prepare("INSERT INTO article (judul, akses, isi, user_id) VALUES (?,?,?,?)");
            $stmt->bind_param("ssss", $judul, $akses, $isi, $user_id);
            $stmt->execute();
        }
        else {
            $stmt = $this->db->prepare("UPDATE article SET judul = ? , akses = ? , isi = ? , user_id = ? WHERE id = ?");
            $stmt->bind_param("sssss", $judul, $akses, $isi, $user_id, $id);
            $stmt->execute();
        }

        if($stmt->affected_rows >= 0) {
            header("Location: index.php?page=admin&module=article");
            exit;
        }
    }
}

?>