<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/CategoryModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/phpFile/connect.php';



class CategoryController
{
    private $model;

    public function __construct()
    {
        $this->model = new CategoryModel();
    }

    public function loadCategory()
    {
        $result = $this->model->getListCategory();
        return TestResult::testResultController($result);
    }

    public function getNameCate($idcategory){
         $result = $this->model->getName($idcategory);
        if ($result == null) return null; else return mysql_fetch_assoc($result);
    }
}
?>