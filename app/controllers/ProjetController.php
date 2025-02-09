<?php
namespace app\controllers;
use app\Models\ProjetModel;
class ProjetController {
    private $projetModel;
    function __construct()
    {
        $this->projetModel = new projetModel();
    }
    public function index(){
        include_once '..\app\views\components\client\projet.php';
        }

    public function addUser(){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $budget= $_POST["budget"];
        $date_debut = $_POST["date_debut"];
        $date_fin = $_POST["date_fin"];
        $this->projetModel->setUser($title,$description,$budget,$date_debut,$date_fin);
    }
}