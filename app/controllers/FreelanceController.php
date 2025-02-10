<?php
namespace app\controllers;
use app\models\FreelanceModel;

class FreelanceController{
    private $freelanceModel;

    public function __construct(){
$this->freelanceModel = new FreelanceModel();
    }
}

?>