<?php
require_once 'DataProvider.php';
require_once 'others/TestResult.php';
class ScModel
{
	public function countBook(){
		$result = DataProvider::executeQuery('select SUM(count_book) as count from `shoppingcart`');
		return mysql_fetch_array($result)['count'];
	}

	public function addBook($idbook,$count){
		$existsBook = DataProvider::executeQuery('select * from `shoppingcart` where idbook='.$idbook);
		if(mysql_num_rows($existsBook)>0){
			DataProvider::executeQuery('update shoppingcart set count_book=count_book+'.$count.' where idbook='.$idbook);
		}else{
			DataProvider::executeQuery("insert into shoppingcart(idbook, count_book) VALUE ($idbook,$count)");			
		}
	}

	public function getSC(){
		$result = DataProvider::executeQuery('select * from `shoppingcart`');
		return TestResult::testResultModel($result);
	}
}
?>