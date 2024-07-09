<?php

class PortfolioModel {
    private $db;

    public $id;
    public $judul;
    public $deskripsi;
    public $foto;
    public $link;
    public $user_id;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function fill($array) {

        if(count($array) > 0) {
            $this->id = ($array["id"] != null || $array["id"] != "") ? $array["id"] : 0;
            $this->judul = $array["judul"];
            $this->deskripsi = $array["deskripsi"];
            $this->foto = $array["foto"];
            $this->link = $array["link"];
            $this->user_id = $array["user_id"];
        }

    }

    public function getPortfolio() {
        $stmt = $this->db->prepare("SELECT * FROM portfolio");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>