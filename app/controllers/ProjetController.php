<?php
namespace app\controllers;
use app\Models\ProjetModel;
use app\Models\TagModel;

class ProjetController {
    private $projetModel;
    function __construct()
    {
        $this->projetModel = new projetModel();
    }
    public function index(){
        $projet = $this->projetModel->getAll();
        return $projet;
    }

        public function create()
        {   
            // $categorie = new CategorieModel();
            // $categorie->setId($_POST["categorie_id"]);
            $tags = [];
            foreach ($_POST["tags"] as $tagId) {
                $tag = new TagModel();
                $tag->setId($tagId);
                array_push($tags, $tag);
            }
            $client =  $_SESSION["authUser"];
            $this->projetModel->setclient($client);
            $this->projetModel->setTag($tags);
            $this->projetModel->setBudget($_POST['budget']);
            $this->projetModel->setDescription($_POST['description']);
            $this->projetModel->setTitle($_POST['title']);
            $this->projetModel->setDateDebut($_POST['date_debut']);
            $this->projetModel->setDateFin($_POST['date_fin']);
            // $this->projetModel->setCategorie($categorie);
            $this->projetModel->create();
            header("location: /Projet");
        }
}