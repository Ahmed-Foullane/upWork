<?php
namespace app\Models;
use app\models\DynamicCrud;

class TagModel {
    private $id;
    private $name;

    public function __construct() {
        $this->crud = new DynamicCrud("tag");
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

    public function createTag($name){
        $this->crud->create(["name"=> $name]);
    }
    
    public function getAllTags(){
        return  $this->crud->read(TagModel::class);
    }

    public function deleteTag($id){
        return  $this->crud->delete(["id" => $id]);
      }

    public function updateTag($name, $id){
        $this->crud->update(["id"=> $id, "name"=> $name]);
    }

    // public function __toString() {
    //     return "Categorie{id=" . $this->id . ", name='" . $this->name . "'}";
    // }

}
?>
