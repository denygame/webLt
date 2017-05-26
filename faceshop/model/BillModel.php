<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/constants.php';


class BillModel
{
	public function getBillsByEmail($email,$start){
		return TestResult::testResultModel(DataProvider::executeQuery("select * from `bill` where email='$email'  AND checkDelete = 0 LIMIT $start,".constants::page_bill));
	}

	public function getTotalBills($email){
		return TestResult::testResultModel(DataProvider::executeQuery("select count(*) as count from `bill` where email='$email'  AND checkDelete = 0"));
	}

	public function getIdMax(){
		return TestResult::testResultModel(DataProvider::executeQuery("select max(idbill) as max from `bill` where checkDelete = 0"));
	}

	public function insertBill($idbill,$email,$name,$sex,$tel,$idcity,$district,$address,$status,$ship){
		if($sex=='Male') $sex='Nam'; else $sex='Nữ';
		DataProvider::executeQuery("insert INTO `bill`(`idbill`, `email`, `name`, `date_bill`, `sex`, `tel`, `idcity`, `district`, `address`, `status`, `ship`)VALUES($idbill,'$email','$name',CURRENT_DATE(),'$sex',$tel,$idcity,'$district','$address','$status',$ship)");
	}
}
?>
