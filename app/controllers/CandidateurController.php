<?php
namespace app\controllers;

use app\Models\CandidateurModel;
use app\Models\FreelanceModel;
use app\Models\ProjetModel;

class CandidateurController{
    private $candidateur;
    function __construct()
    {
        $this->candidateur = new CandidateurModel();
    }
    public function index(){
        include_once '..\app\views\pages\client\Candidateur.php';
    }
    public function create(){
        
        $freleencer = new FreelanceModel;
        $sessionFree = 1;
        $freleencer->FreelanceModelCall($sessionFree);
        $this->candidateur->setDescription($_POST['description']);
        $this->candidateur->setBudget($_POST['budget']);
        $this->candidateur->setDateDebut($_POST['date_debut']);
        $this->candidateur->setDateFin($_POST['date_fin']);
        $this->candidateur->setFreelance($freleencer);
        $projet = new ProjetModel();
        $projet->setId($_GET["project_id"]);
        $this->candidateur->setProjet($projet); 
        $this->candidateur->create();
        header("location: /Projet"); 
    }
    public function getAll(){
        
    }
}