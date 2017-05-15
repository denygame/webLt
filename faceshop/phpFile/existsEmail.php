<?php 
$con = mysql_connect('localhost', 'root', '') or die("Không thể kết nối đến server");
mysql_select_db('db') or die("Không thể kết nối database");
mysql_query("SET NAMES'utf8'");

$email=$_GET['email'];


$ex=mysql_query("select count(*) as count from `account` where email='".$email."'");
if(mysql_fetch_assoc($ex)['count']==0){
	echo 'false';
}else echo 'true';
?>