<?php
namespace app\controllers;
use app\views\pages\admin\categores;
use app\models\CategorieModel;

class CategoryController {
    private $categoryModel;
    public function __construct(){
        $this->categoryModel = new CategorieModel();
    }

    public function index(){
        include_once '../app/views/pages/admin/categores.php';
        }

    public function createCategory(){
        $name = $_POST["name"];
        $this->categoryModel->createCategory($name);
        header("location: /category");
    }
    
    public function deletCategory($id){
        $this->categoryModel->deleteCategori($id);
        header("location: /category");
    }

    public function updateCategory(){
       $name = $_POST["name"];
       $id = $_POST["id"];
        $this->categoryModel->updateCategory($name, $id);
        header("location: /category");
    }
}

