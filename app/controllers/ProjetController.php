<?php

namespace app\controllers;

use app\Models\ProjetModel;
use app\Models\TagModel;
use app\Models\CategorieModel;

class ProjetController
{
    private $projetModel;
    function __construct()
    {
        $this->projetModel = new projetModel();
    }
    public function index()
    {
        $projet = new ProjetController();
        $projets = $projet->getProjet();
        $Categorie = new CategorieModel();
        $categories = $Categorie->getAllCategories();
        $tag = new TagController();
        $tags = $tag->getAllTag();
        include_once '..\app\views\pages\client\Projet.php';
    }
    public function getProjet()
    {
        $projet = $this->projetModel->getAll();
        return $projet;
    }
    public function create()
    {
        $categorie = new CategorieModel();
        $categorie->setId($_POST["categorie_id"]);
        $tags = [];
        foreach ($_POST["tags"] as $tagId) {
            $tag = new TagModel();
            $tag->setId($tagId);
            array_push($tags, $tag);
        }
        $this->projetModel->setTitle($_POST['title']);
        $this->projetModel->setDescription($_POST['description']);
        $this->projetModel->setBudget($_POST['budget']);
        $this->projetModel->setDateDebut($_POST['date_debut']);
        $this->projetModel->setDateFin($_POST['date_fin']);
        $this->projetModel->setCategorie($categorie);
        $this->projetModel->setTag($tags);
        $this->projetModel->create();
        header("location: /Projet");
    }
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"]) {
            $categorie = new CategorieModel();
            $categorie->setId($_POST["categorie_id"]);
            $tags = [];
            foreach ($_POST["tags"] as $tagId) {
                $tag = new TagModel();
                $tag->setId($tagId);
                array_push($tags, $tag);
            }
            $this->projetModel->setTitle($_POST['title']);
            $this->projetModel->setDescription($_POST['description']);
            $this->projetModel->setBudget($_POST['budget']);
            $this->projetModel->setDateDebut($_POST['date_debut']);
            $this->projetModel->setDateFin($_POST['date_fin']);
            $this->projetModel->setCategorie($categorie);
            $this->projetModel->setTag($tags);
            $this->projetModel->setId($_GET['id']);
            $this->projetModel->update();
            header("location: /Projet");

            
        }
    }
}
