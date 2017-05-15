<?php 
$con = mysql_connect('localhost', 'root', '') or die("Không thể kết nối đến server");
mysql_select_db('db') or die("Không thể kết nối database");
mysql_query("SET NAMES'utf8'");

$email=$_GET['email'];
$pass=$_GET['password'];
$idcity=$_GET['city'];
$name=$_GET['name'];
$sex=$_GET['sex'];
$tel=$_GET['tel'];
$address=$_GET['address'];
$district=$_GET['district'];

if($sex=='Male') $sex='Nam'; else $sex='Nữ';
//mã hóa 160bits hash function
$passEn=sha1($pass);
mysql_query("insert into `account`(email, pass, name, sex, tel, idcity, district, address) VALUE ('$email','$passEn','$name','$sex',$tel,$idcity,'$district','$address')");
?>