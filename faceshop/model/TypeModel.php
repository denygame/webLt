<?php
require_once 'DataProvider.php';
require_once 'others/TestResult.php';
class TypeModel
{
    //lấy danh sách các loại sách trong danh mục
    public function getListTypeByIdCategory($idCategory)
    {
        $result = DataProvider::executeQuery('select * from `db_type` WHERE idcategory ='.$idCategory);
        return TestResult::testResultModel($result);
    }

     public function getName($idtype){
    	$result = DataProvider::executeQuery('select `name` from `db_type` WHERE idtype='.$idtype);
        return TestResult::testResultModel($result);
    }

    public function getListIdType($idcategory){
        $result = DataProvider::executeQuery("select `idtype` from `db_type` where idcategory=$idcategory");
        return TestResult::testResultModel($result);
    }
}
?>