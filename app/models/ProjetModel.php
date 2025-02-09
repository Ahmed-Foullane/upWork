<?php
namespace app\Models;
// use app\Models\CategorieModel;
class ProjetModel extends DynamicCrud{
    private  $crud;
    private $id;
    private $title;
    private  $budget;
    private $description;
    private $date_debut;
    private $date_fin;
    // private CategorieModel $categorie;
    private array $tag;
    public function __construct() {
        $this->crud = new DynamicCrud("Projet");
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getTitre(): string
    {
        return $this->title;
    }
    // public function getCategorie(): CategorieModel
    // {
    //     return $this->categorie;
    // }
    public function getTag(): array
    {
        return $this->tag;
    }
    public function getDateDebut(): string {
        return $this->date_debut;

    }
    public function getDateFin(): string {
        return $this->date_fin;

    }
    public function getBudget(){
        return $this->budget;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function setTitre($title): void
    {
        $this->title = $title;
    }
    // public function setCategorie($categorie): void
    // {
    //     $this->categorie = $categorie;
    // }
    public function setTag($tag): void
    {
        $this->tag = $tag;
    }
    public function setDescription($description): void
    {
        $this->description = $description;
    }
    public function getAllprojet(){
        return  $this->crud->read(projetModel::class);
     }
     public function setUser($title, $description,$budget,$date_debut,$date_fin){
        $this->crud->create(["projettitle"=> $title, "description" => $description,"budget"=>$budget,"date_debut"=>$date_debut,"date_fin"=>$date_fin]);
    }
}


?>