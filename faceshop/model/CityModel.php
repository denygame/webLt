<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
class CityModel
{
	public function showAllCity(){
		return TestResult::testResultModel(DataProvider::executeQuery("select * from `city`"));
	}

	public function getNameCity($id){
		return TestResult::testResultModel(DataProvider::executeQuery("select name from `city` where idcity=$id"));
	}
}
?>