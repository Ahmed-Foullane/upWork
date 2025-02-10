<?php
namespace app\Models;

class TagModel extends DynamicCrud {
    protected $crud;
    private  $id;
    private  $name;
    private  $description;

    public function __construct() {
        $this->crud = new DynamicCrud("tag");
    }
   
    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    
    public function getAllTag() {
        return $this->crud->read(TagModel::class); 
    }

   
    public function setTag(string $name, string $description): void {
        $this->crud->create(["name" => $name, "description" => $description]);
    }
    public function  deleteTag($id){
        $this->crud->delete(["id" => $id]);
    }
    public function updateTag($id,$name,$description){
        $this->crud->update(["id"=>$id, "name"=>$name, "description" =>$description]);
    }
}
