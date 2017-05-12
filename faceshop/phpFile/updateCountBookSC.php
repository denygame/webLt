<?php
$con = mysql_connect('localhost', 'root', '') or die("Không thể kết nối đến server");
mysql_select_db('db') or die("Không thể kết nối database");
mysql_query("SET NAMES'utf8'");

if(isset($_GET['idbook']) && isset($_GET['count'])){
	$idbook=$_GET['idbook'];
	$count=$_GET['count'];
	echo $count;
	//$realCount=(int)mysql_fetch_assoc(mysql_query("select count_book from `shoppingcart` where idbook=$idbook"));
	if($count==0){
			mysql_query("delete from `shoppingcart` where idbook = $idbook");
	}
	else{
		
			mysql_query("update `shoppingcart` set count_book=$count where idbook=$idbook");
		}

}

?>