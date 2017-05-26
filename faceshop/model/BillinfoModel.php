<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/constants.php';


class BillinfoModel
{
	public function getBillsInfo($idbill,$start){
		return TestResult::testResultModel(DataProvider::executeQuery("select * from `billinfo` where idbill=$idbill  AND checkDelete = 0 LIMIT $start,".constants::page_bill));
	}

	public function getTotalBillsInfo($idbill){
		return TestResult::testResultModel(DataProvider::executeQuery("select count(*) as count from `billinfo` where idbill=$idbill  AND checkDelete = 0"));
	}

	public function getIdMax(){
		return TestResult::testResultModel(DataProvider::executeQuery("select max(idbillinfo) as max from `billinfo` where checkDelete = 0"));
	}

	public function insert($idbillinfo,$idbill,$idbook,$count){
		DataProvider::executeQuery("insert INTO `billinfo`(`idbillinfo`, `idbill`, `idbook`, `count`) VALUES ($idbillinfo,$idbill,$idbook,$count)");
	}
}
?>
