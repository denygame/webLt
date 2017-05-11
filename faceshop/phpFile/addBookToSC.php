<?php
$con = mysql_connect('localhost', 'root', '') or die("Không thể kết nối đến server");
mysql_select_db('db') or die("Không thể kết nối database");
mysql_query("SET NAMES'utf8'");

if(isset($_GET['idbook'])){
	$idbook = $_GET['idbook'];
	$sql1 = "select * from `shoppingcart` where idbook=$idbook";
	$existsBook = mysql_query($sql1);
	if(mysql_num_rows($existsBook)>0){
		mysql_query("update `shoppingcart` set count_book=count_book+1 where idbook=$idbook");
	}else{
		mysql_query("insert into `shoppingcart`(idbook, count_book) VALUE ($idbook,1)");
	}
}
?>
