<?php
$con = mysql_connect('localhost', 'root', '') or die("Không thể kết nối đến server");
mysql_select_db('db') or die("Không thể kết nối database");
mysql_query("SET NAMES'utf8'");

$query='select SUM(count_book) as count from `shoppingcart`';
$result = mysql_query($query);

$row = mysql_num_rows($result);

if($row>0){
	$row = mysql_fetch_assoc($result); 
	$sum = $row['count'];
	if(is_numeric($sum))
		echo $sum;
	else echo '0';
}
else echo '0';
?>