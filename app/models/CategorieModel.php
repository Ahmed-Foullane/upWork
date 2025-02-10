<?php
namespace app\Models;
use app\models\DynamicCrud;

class CategorieModel {
    private $id;
    private $name;

    public function __construct() {
        $this->crud = new DynamicCrud("categorie");
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function createCategory($name){
        $this->crud->create(["name"=> $name]);
    }
    
    public function getAllCategories(){
        return  $this->crud->read(CategorieModel::class);
    }

    public function deleteCategori($id){
        return  $this->crud->delete(["id" => $id]);
      }

    public function updateCategory($name, $id){
        $this->crud->update(["id"=> $id, "name"=> $name]);
    }

    // public function __toString() {
    //     return "Categorie{id=" . $this->id . ", name='" . $this->name . "'}";
    // }

}
?>
