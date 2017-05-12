<?php 
$con = mysql_connect('localhost', 'root', '') or die("Không thể kết nối đến server");
mysql_select_db('db') or die("Không thể kết nối database");
mysql_query("SET NAMES'utf8'");



    if(isset($_GET['count'])&&isset($_GET['idbook'])){
        $idbook=$_GET['idbook']; $count=$_GET['count'];

		$existsBook = mysql_query("select * from `shoppingcart` where idbook=$idbook");
		if(mysql_num_rows($existsBook)>0){
			mysql_query("update `shoppingcart` set count_book=count_book+$count where idbook=$idbook");
		}else{
			mysql_query("insert into `shoppingcart`(idbook, count_book) VALUE ($idbook,$count)");
		}

        echo '<script type="text/javascript">','loadDivSc();','</script>';
         //unset($_POST['soluong']);
    } 
 ?>