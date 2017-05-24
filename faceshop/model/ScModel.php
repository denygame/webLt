<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/model/DataProvider.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/others/TestResult.php';
class ScModel
{
	public function countBook(){
		$result = DataProvider::executeQuery('select SUM(count_book) as count from `shoppingcart`');
		return mysql_fetch_array($result)['count'];
	}

	public function addBook($idbook){
		$existsBook = DataProvider::executeQuery("select * from `shoppingcart` where idbook=$idbook");
		if(mysql_num_rows($existsBook)>0){
			DataProvider::executeQuery("update `shoppingcart` set count_book=count_book+1 where idbook=$idbook");
		}else{
			DataProvider::executeQuery("insert into `shoppingcart`(idbook, count_book) VALUE ($idbook,1)");			
		}
	}

	public function getSC(){
		$result = DataProvider::executeQuery('select * from `shoppingcart`');
		return TestResult::testResultModel($result);
	}

	public function countSC(){
		$result=DataProvider::executeQuery('select SUM(count_book) as count from `shoppingcart`');
		return TestResult::testResultModel($result);
	}

	public function deleteBook($idbook){
		DataProvider::executeQuery("delete from `shoppingcart` where idbook = $idbook");
	}

	public function update($idbook,$count,$type){
		$existsBook = DataProvider::executeQuery('select * from `shoppingcart` where idbook='.$idbook);

		if($type==0){ //thực hiện update trong shoppingcart, k cộng lên
			if(mysql_num_rows($existsBook)>0){
				if($count==0) DataProvider::executeQuery("delete from `shoppingcart` where idbook = $idbook");
				else DataProvider::executeQuery('update shoppingcart set count_book='.$count.' where idbook='.$idbook);
			}else{
				DataProvider::executeQuery("insert into shoppingcart(idbook, count_book) VALUE ($idbook,$count)");			
			}
		}
		else{
			if(mysql_num_rows($existsBook)>0){
				DataProvider::executeQuery("update `shoppingcart` set count_book=count_book+$count where idbook=$idbook");
			}else{
				DataProvider::executeQuery("insert into `shoppingcart`(idbook, count_book) VALUE ($idbook,$count)");
			}
		}
	}
}
?>