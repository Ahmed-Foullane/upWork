<?php
namespace app\controllers;
use app\views\pages\admin\tag;
use app\models\TagModel;

class TagController {
    private $TagModel;
    public function __construct(){
        $this->TagModel = new TagModel();
    }

    public function index(){
        include_once '../app/views/pages/admin/tag.php';
        }

    public function createTag(){
       
        $name = $_POST["name"];
        $this->TagModel->createTag($name);
        header("location: /Tag");
    }
    
    public function deletTag($id){
        $this->TagModel->deleteTag($id);
        header("location: /Tag");
    }

    public function updateTag(){
       $name = $_POST["name"];
       $id = $_POST["id"];
        $this->TagModel->updateTag($name, $id);
        header("location: /Tag");
    }
}

