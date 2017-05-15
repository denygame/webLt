<?php
require_once 'DataProvider.php';
require_once 'others/TestResult.php';
class CityModel
{
	public function showAllCity(){
		return TestResult::testResultModel(DataProvider::executeQuery("select * from `city`"));
	}
}
?>