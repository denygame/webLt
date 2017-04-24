<?php
require_once 'DataProvider.php';
require_once 'others/TestResult.php';
class CategoryModel
{
    public function getListCategory()
    {
        $result = DataProvider::executeQuery('select * from `category`');
        return TestResult::testResultModel($result);
    }

    public function getName($idcategory){
    	$result = DataProvider::executeQuery('select `name` from `category` WHERE idcategory='.$idcategory);
        return TestResult::testResultModel($result);
    }
}
?>