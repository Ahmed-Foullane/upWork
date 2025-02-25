<?php
namespace app\Models;
use app\config\Database;
use PDO;

// use app\Models\CategorieModel;
class ProjetModel {
    private $id;
    private $title;
    private  $budget;
    private $description;
    private $date_debut;
    private $date_fin;
    private $status;
    private  $categorie;
    private array $tag;
    private UserModel $client;
    public function __construct() {
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getClient():UserModel{
        return $this->client;
    }
    public function getTitre(): string
    {
        return $this->title;
    }
    public function getCategorie()
    {
        return $this->categorie;
    }
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
    public function getStatus():string{
        return $this->status;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function setTitle($title): void
    {
        $this->title = $title;
    }
    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
    }
    public function setTag($tag): void
    {
        $this->tag = $tag;
    }
    public function setDescription($description): void
    {
        $this->description = $description;
    }
    public function setStatus($status):void{
        $this->status=$status;
    }
    public function setClient($client):void{
        $this->client=$client;
    }
    public function setDateDebut($date_debut){
        $this->date_debut=$date_debut;
    }
    public function setDateFin($date_fin){
        $this->date_debut=$date_fin;
    }
    public function setBudget($budget){
        $this->budget=$budget;

    }
    public function getAll(){
        $query = 'select  projet.id as id ,projet.title  as title  ,projet.description as description ,
        projet.budget as budget ,projet.date_debut, projet.date_fin , categorie.name as catategorie 
         FROM projet join categorie  
          on projet.categorie_id =categorie.id;';
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $projet = $stmt->fetchAll(PDO::FETCH_CLASS, projetModel::class);
        foreach ($projet as $projets):
            $sql = "select t.name  from tag t  join projet_tag c on t.id=c.tag_id  where c.projet_id=:id";
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->bindParam(':id', $projets->id);
            $stmt->execute();
            $projets->tags = $stmt->fetchAll(PDO::FETCH_CLASS, TagModel::class);
        endforeach;
        return $projet; 
     }
     public function create()
     {
         $categorie = $this->categorie->getId();
        //  $client = $this->getclient()->getId();
         $query = "INSERT INTO projet (title , description, budget, date_debut,date_fin,categorie_id , client_id ) VALUES (:title,:description,:budget,:date_debut,date_fin,:categorie_id,:client_id)";
         $stmt = Database::getInstance()->getConnection()->prepare($query);
         $stmt->bindParam(":titre", $this->title);
         $stmt->bindParam(":description", $this->description);
         $stmt->bindParam(":budget", $this->budget);
         $stmt->bindParam(":date_debut", $this->date_debut);
         $stmt->bindParam(":date_fin", $this->date_fin);
         $stmt->bindParam(":categorie_id", $categorie);
        //  $stmt->bindParam(":client_id", $client);
         if ($stmt->execute()) {
             $id = Database::getInstance()->getConnection()->lastInsertId();
             foreach ($this->tag as $tag) {
                 $tagId = $tag->getId();
                 $query = "INSERT INTO `projet_tag`(`tag_id`, `projet_id`) VALUES  ('$tagId' ,'$id')";
                 $stmt = Database::getInstance()->getConnection()->prepare($query);
                 $stmt->execute();
             }
         }
 
 
     }
     public function update()
     {
         $categorie = $this->categorie->getId();
         $query = "UPDATE projet SET ,title = :title, description = :description, budget = :budget,date_debut=:date_debut,date_fin=:date_fin ,categorie_id = :categorie_id WHERE id = :id";
         $stmt = Database::getInstance()->getConnection()->prepare($query);
         $stmt->bindParam(":titre", $this->title);
         $stmt->bindParam(":description", $this->description);
         $stmt->bindParam(":budget", $this->budget);
         $stmt->bindParam(":date_debut", $this->date_debut);
         $stmt->bindParam(":date_fin", $this->date_fin);
         $stmt->bindParam(":categorie_id", $categorie);
         $stmt->bindParam(":id", $this->id);
         if ($stmt->execute()) {
             $stmt = Database::getInstance()->getConnection()->prepare("DELETE FROM courstags WHERE id_cours = :id");
             $stmt->bindParam(":id", $this->id);
             $stmt->execute();
             foreach ($this->tag as $tag) {
                 $tagId = $tag->getId();
                 $query = "INSERT INTO projet_tag (tag_id,projet_id) VALUES (:tag_id, :projet_id)";
                 $stmt = Database::getInstance()->getConnection()->prepare($query);
                 $stmt->bindParam(":tag_id", $tagId);
                 $stmt->bindParam(":projet_id", $this->id);
                 $stmt->execute();
             }
 
             return true;
         }
 
         return false;
     }
     public function delete($id)
    {
        $query = "DELETE  FROM projet WHERE id = '" . $id . "';";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        return $stmt->execute();
    }


    }
    



?>