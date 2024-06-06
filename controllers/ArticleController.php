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
        $article;
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

    public function createPOST($model) {

        $judul = $model->judul;
        $isi = $model->isi;
        $user_id = $model->user_id;

        $stmt = $this->db->prepare("INSERT INTO article (judul, isi, user_id) VALUES (?,?,?)");
        $stmt->bind_param("sss", $judul, $isi, $user_id);
        $stmt->execute();

        if($stmt->affected_rows > 0) {
            header("Location: index.php?page=admin&module=article");
        }
    }

    public function update($model) {

        $id = $model->id;
        $judul = $model->judul;
        $isi = $model->isi;
        $user_id = $model->user_id;

        $stmt = $this->db->prepare("UPDATE article SET judul = ? , isi = ? , user_id = ? WHERE id = ?");
        $stmt->bind_param("ssss", $judul, $isi, $user_id, $id);
        $stmt->execute();

        if($stmt->affected_rows > 0) {
            header("Location: index.php?page=admin&module=article");
        }
    }


     

}

?>