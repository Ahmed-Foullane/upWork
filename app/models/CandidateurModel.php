<?php
namespace app\Models;
class CandidateurModel{
    private  $id;
    private $description;
    private $budget;
    private $date_debut;
    private $date_fin;
    private  ProjetModel $projet;
    private FreelanceModel $freelance;
    private $status;
    public function __construct() {
    }
    public function getId(): int
    {
        return $this->id;
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
    public function getStatus():string{
        return $this->status;
    }
    public function getFreelance():FreelanceModel{
        return $this->freelance;

    }
    public function getProjet():ProjetModel{
        return $this->projet;

    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function setDescription($description): void
    {
        $this->description = $description;
    }
    public function setStatus($status):void{
        $this->status=$status;
    }
   
    public function setDateDebut($date_debut){
        $this->date_debut=$date_debut;
    }
    public function setDateFin($date_fin){
        $this->date_fin=$date_fin;
    }
    public function setBudget($budget){
        $this->budget=$budget;

    } 
    public function setFreelance($freelance){
        $this->freelance =$freelance;
    }
    public function setProjet($projet){
        $this->projet =$projet;
    }
    public function getAll(){
        $query ='SELECT projet.id AS id, projet.title AS title, projet.description AS description,
        projet.budget AS budget, projet.date_debut, projet.date_fin, categorie.name as cat
        FROM projet
        JOIN categorie ON projet. = categorie.id;';
    }

}