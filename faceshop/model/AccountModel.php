<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';

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

    public function exEmail($email){
    	$ex=DataProvider::executeQuery("select count(*) as count from `account` where email='".$email."'");
    	if(mysql_fetch_assoc($ex)['count']==0){
    		return false;
    	}
    	return true;
    }

    public function insert($email,$pass,$idcity,$name,$sex,$tel,$address,$district){
    	if($sex=='Male') $sex='Nam'; else $sex='Nữ';
		//mã hóa 160bits hash function
    	$passEn=sha1($pass);
    	mysql_query("insert into `account`(email, pass, name, sex, tel, idcity, district, address) VALUE ('$email','$passEn','$name','$sex',$tel,$idcity,'$district','$address')");

    }

    public function updateNewPass($email,$hashPass){
        DataProvider::executeQuery("update `account` SET `pass`= '".$hashPass."' WHERE email = '".$email."'");
    }

    public function getAcc($email){
        return TestResult::testResultModel(DataProvider::executeQuery("select * from `account` where email = '$email'"));
    }

    public function updateUserProfile($email,$idcity,$name,$sex,$tel,$address,$district){
        if($sex=='Male') $sex='Nam'; else $sex='Nữ';
        DataProvider::executeQuery("update `account` SET `name`='$name',`sex`='$sex',`tel`=$tel,`idcity`=$idcity,`district`='$district',`address`='$address' WHERE email='$email'");
    }

    public function getSex($email){
        $r=DataProvider::executeQuery("select sex from `account` where email = '$email'");
        return mysql_fetch_assoc($r)['sex'];
    }

    public function getIdCity($email){
        $r=DataProvider::executeQuery("select idcity from `account` where email = '$email'");
        return mysql_fetch_assoc($r)['idcity'];
    }

}
?>