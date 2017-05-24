<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/TypeModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';

class TypeController
{
    private $model;

    public function __construct()
    {
        $this->model = new TypeModel();
    }

    public function loadTypeOfCategory($idCategory)
    {
        $result = $this->model->getListTypeByIdCategory($idCategory);
        return TestResult::testResultController($result);
    }

     public function getNameType($idtype){
         $result = $this->model->getName($idtype);
        if ($result == null) return null; else return mysql_fetch_assoc($result);
    }
}
?>