<?php
namespace app\Models;
use app\config\Database;
use PDO;
class FreelanceModel {
    private $conn;
    private $id;


    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function __call($name, $arguments) {
        if($name == "FreelanceModelCall"){
            if(count($arguments) == 1){
                $this->id = $arguments[0];
            } 
        }
        }
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return  $this->id;
    }

    public function searchProjectsByName($name, $className) {
        $stmt = $this->conn->prepare("SELECT * FROM projects WHERE name LIKE ?");
        $stmt->execute(['%' . $name . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $className);
    }
}


?>