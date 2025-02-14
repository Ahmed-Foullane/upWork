<?php

namespace app\Models;

use app\config\Database;

class CandidateurModel
{
    private  $id;
    private $description;
    private $budget;
    private $date_debut;
    private $date_fin;
    private  ProjetModel $projet;
    private FreelanceModel $freelance;
    private $status;
    public function __construct() {}
    public function getId(): int
    {
        return $this->id;
    }

    public function getDateDebut(): string
    {
        return $this->date_debut;
    }
    public function getDateFin(): string
    {
        return $this->date_fin;
    }
    public function getBudget()
    {
        return $this->budget;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getStatus(): string
    {
        return $this->status;
    }
    public function getFreelance(): FreelanceModel
    {
        return $this->freelance;
    }
    public function getProjet(): ProjetModel
    {
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
    public function setStatus($status): void
    {
        $this->status = $status;
    }
    public function setDateDebut($date_debut)
    {
        $this->date_debut = $date_debut;
    }
    public function setDateFin($date_fin)
    {
        $this->date_fin = $date_fin;
    }
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }
    public function setFreelance($freelance)
    {
        $this->freelance = $freelance;
    }
    public function setProjet($projet)
    {
        $this->projet = $projet;
    }
    public function getAll(int $id)
    {
        $query = 'SELECT candidateur.id AS id, users.first_name , candidateur.budget AS budget, candidateur.description AS description,
         candidateur.date_debut, candidateur.date_fin, projet.title as projet
        FROM candidateur
        JOIN projet ON candidateur.projet_id = projet.id
        JOIN freelance ON candidateur.freelance_id = freelance.id
		JOIN users on users.id = freelance.user_id where projet.id = :id;';
        $smt = Database::getInstance()->getConnection()->prepare($query);
        $smt->bindParam(":id",$id);
        $smt->execute();
        return $smt->fetchObject(__CLASS__);
    }
    public function create()
    {
        $projet = $this->projet->getId();
        $freelance = $this->freelance->getId();
        $query = "INSERT INTO candidateur (description, budget, date_debut, date_fin, freelance_id, projet_id) 
          VALUES (:description, :budget, :date_debut, :date_fin, :freelance_id, :projet_id);";
var_dump( $query);
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":budget", $this->budget);
        $stmt->bindParam(":date_debut", $this->date_debut);
        $stmt->bindParam(":date_fin", $this->date_fin);
        $stmt->bindParam(':freelance_id',$freelance);
        $stmt->bindParam(':projet_id', $projet);
        $result=$stmt->execute();
        return $result;
        
    }
}
