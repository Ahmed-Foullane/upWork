<?php
namespace app\Models;
class TagModel extends DynamicCrud{
    protected $crud;
    public $id ;
    public $name ;
    public  $description ;
    public function __construct() {
        $this->crud = new DynamicCrud("tag");
    }
    
    public function getId(): int{
        return $this->id;
    }
    public function getName(): string{
        return $this->name;

    }
    public function getDescription(): string{
        return $this->description;
   }
   public function setId ( int $id): void{
    $this->id=$id;
   }
   public function setName( string $name): void{    
    $this->name=$name;
   }
   public function setDescription( string $description): void{
    $this->description=$description;
   } 
   public function getAllprojet(){
    return  $this->crud->read(DynamicCrud::class);
 }
 public function setTag($name, $description){
    $this->crud->create(["name"=> $name, "description" => $description]);
}
}
