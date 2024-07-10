<?php

class ArticleModel {
    private $db;

    public $id;
    public $judul;
    public $akses;
    public $isi;
    public $user_id;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function fill($array) {

        if(count($array) > 0) {
            $this->id = ($array["id"] != null || $array["id"] != "") ? $array["id"] : 0;
            $this->judul = $array["judul"];
            $this->akses = $array["akses"];
            $this->isi = $array["isi"];
            $this->user_id = $array["user_id"];
        }
        
    }

    public function getArticle() {
        $stmt = $this->db->prepare("SELECT * FROM article");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>