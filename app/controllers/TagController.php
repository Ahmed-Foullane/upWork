<?php
namespace app\controllers;
use app\Models\TagModel;
class TagController {
    public $TagModel;
    function __construct()
    {
        $this->TagModel = new TagModel();
    }
    public function index(){
        $cat = new TagController();
        $tags = $cat->getAllTag();
        ob_start();
        include '..\app\views\pages\client\nav.php';
        
        
        include '..\app\views\pages\client\Tag.php';
        }
    public function getAllTag(){
        $tags=$this->TagModel->getAllTag();
        return $tags;
    }

    public function addTag(){
        $name = $_POST["name"];
        $description = $_POST["description"];
        $this->TagModel->setTag($name,$description);
        header("location: /Tag");


    }
    public function deleteTag($id){ 
      
            $this->TagModel->deleteTag($id);
           header("location: /Tag");
     }
    public function updateTag($id,$name,$description){
        $this->TagModel->updateTag($id,$name,$description);
        header("location: /Tag");
    } 
}
