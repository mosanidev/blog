<?php 

class SkillController {
    private $model;
    private $db;

    public function __construct($model) {
        $this->model = $model;
        $this->db = Database::getInstance()->getConnection();
    }

    public function index() {
        $skill = $this->model->getSkill();

        include 'views/admin/skill.php';
    }

    public function create($skill, $user_id) {

        if($skill == null || trim($skill," ") == '') {
            header("Location: index.php?page=admin&module=skill");
        }

        $stmt = $this->db->prepare("INSERT INTO skill (skill, user_id) VALUES (?,?)");
        $stmt->bind_param("ss", $skill, $user_id);
        $stmt->execute();

        if($stmt->affected_rows > 0) {
            header("Location: index.php?page=admin&module=skill");
        }
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM skill where id=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($skill, $id) {

        if($skill == null || trim($skill," ") == '') {
            header("Location: index.php?page=admin&module=skill");
        }

        $stmt = $this->db->prepare("UPDATE skill SET skill=? WHERE id=?");
        $stmt->bind_param("si", $skill, $id);
        $stmt->execute();

        if($stmt->affected_rows > 0) {
            header("Location: index.php?page=admin&module=skill");
        }
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM skill WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if($stmt->affected_rows > 0) {
            header("Location: index.php?page=admin&module=skill");
        }
    }

}

?>