<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
class CategoryModel
{
    public function getListCategory()
    {
        $result = DataProvider::executeQuery('select * from `category`where checkDelete = 0');
        return TestResult::testResultModel($result);
    }

    public function getName($idcategory){
    	$result = DataProvider::executeQuery('select `name` from `category` WHERE idcategory='.$idcategory.' and checkDelete = 0');
        return TestResult::testResultModel($result);
    }
}
?>
