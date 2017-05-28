<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
class TypeModel
{
    //lấy danh sách các loại sách trong danh mục
    public function getListTypeByIdCategory($idCategory)
    {
        $result = DataProvider::executeQuery('select * from `db_type` WHERE idcategory ='.$idCategory.' and checkDelete = 0');
        return TestResult::testResultModel($result);
    }

     public function getName($idtype){
    	$result = DataProvider::executeQuery('select `name` from `db_type` WHERE idtype='.$idtype.' and checkDelete = 0');
        return TestResult::testResultModel($result);
    }

    public function getListIdType($idcategory){
        $result = DataProvider::executeQuery("select `idtype` from `db_type` where idcategory=$idcategory and checkDelete = 0");
        return TestResult::testResultModel($result);
    }

    public function getListTypeNot($idtype){
      $result = DataProvider::executeQuery("select * from `db_type` where idtype != $idtype and checkDelete = 0");
      return TestResult::testResultModel($result);
    }

    public function getListType(){
      $result = DataProvider::executeQuery("select * from `db_type` where checkDelete = 0");
      return TestResult::testResultModel($result);
    }
}
?>
