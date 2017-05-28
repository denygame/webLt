<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/constants.php';

class ManagerBookModel
{

  function __construct()
  {

  }

  public function getListBook($start){
		return TestResult::testResultModel(DataProvider::executeQuery("select * from `book` where checkDelete = 0 ORDER BY idbook LIMIT $start,".constants::page_managerBook));
	}

  public function deleteBook($id){
    DataProvider::executeQuery("update `book` set checkDelete=1 WHERE idbook= $id");
  }
}

?>
