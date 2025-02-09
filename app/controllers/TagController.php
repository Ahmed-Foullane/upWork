<?php
namespace app\controllers;
use app\Models\TagModel;
class TagController {
    private $projetModel;
    function __construct()
    {
        $this->projetModel = new TagModel();
    }
    public function index(){
        include_once '..\app\views\pages\client\Tag.php';
        }

    public function addTag(){
        $name = $_POST["name"];
        $description = $_POST["description"];
        $this->projetModel->setTag($name,$description);
    }
}