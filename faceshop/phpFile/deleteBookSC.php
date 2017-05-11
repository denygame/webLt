<?php
$con = mysql_connect('localhost', 'root', '') or die("Không thể kết nối đến server");
mysql_select_db('db') or die("Không thể kết nối database");
mysql_query("SET NAMES'utf8'");

if(isset($_GET['idbook'])){
	$idbook = $_GET['idbook'];
	mysql_query("delete from `shoppingcart` where idbook = $idbook");
}
?>