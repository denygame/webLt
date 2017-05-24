<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/constants.php';


class BillinfoModel
{
	public function getBillsInfo($idbill,$start){
		return TestResult::testResultModel(DataProvider::executeQuery("select * from `billinfo` where idbill=$idbill LIMIT $start,".constants::page_bill));
	}

	public function getTotalBillsInfo($idbill){
		return TestResult::testResultModel(DataProvider::executeQuery("select count(*) as count from `billinfo` where idbill=$idbill"));
	}
}
?>