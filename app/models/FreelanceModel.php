<?php
namespace app\Models;
use app\config\Database;
use PDO;
class FreelanceModel {
    protected $conn;


    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function searchProjectsByName($name, $className) {
        $stmt = $this->conn->prepare("SELECT * FROM projects WHERE name LIKE ?");
        $stmt->execute(['%' . $name . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $className);
    }
}


?>