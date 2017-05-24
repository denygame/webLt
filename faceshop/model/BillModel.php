<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/constants.php';


class BillModel
{
	public function getBillsByEmail($email,$start){
		return TestResult::testResultModel(DataProvider::executeQuery("select * from `bill` where email='$email' LIMIT $start,".constants::page_bill));
	}

	public function getTotalBills($email){
		return TestResult::testResultModel(DataProvider::executeQuery("select count(*) as count from `bill` where email='$email'"));
	}
}
?>