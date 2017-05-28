<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';


class ManagerAccountModel
{
  public function checkLogin($email,$passMD5)
    {
        $result = DataProvider::executeQuery("select * from account WHERE email = '$email'AND pass='$passMD5'");
        return TestResult::testResultModel($result);
    }
    public function deleteEmail($email){
      DataProvider::executeQuery("update `account` set checkDelete=1 WHERE email= '$email'");
    }
}

?>
