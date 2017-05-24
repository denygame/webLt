<?php
require_once 'DataProvider.php';
require_once 'others/TestResult.php';
class AccountModel
{
	public function checkLogin($email,$passMD5)
    {
        $result = DataProvider::executeQuery("select * from account WHERE email = '$email'AND pass='$passMD5'");

        return TestResult::testResultModel($result);
    }

   /* public function countEmail($email){
    	$result = DataProvider::executeQuery('select COUNT(*) as count from `account` where email='.$email);
    	return mysql_fetch_array($result)['count'];
    }*/
}
?>