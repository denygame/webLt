<?php
$con = mysql_connect('localhost', 'root', '') or die("Không thể kết nối đến server");
mysql_select_db('db') or die("Không thể kết nối database");
mysql_query("SET NAMES'utf8'");

//echo'<div id="list">';
echo '<table>';
$data=mysql_query("select * from `shoppingcart`");

if(mysql_num_rows($data)<=0){
	echo '<tr><td>Không có sản phẩm nào trong giỏ hàng</td></tr>';
}else {
	while ($d=mysql_fetch_array($data)) { 
		$idbook= $d['idbook']; 

		$kq_book=mysql_query("select * from book where idbook=$idbook");
		if($kq_book!=null){
			$d_book=mysql_fetch_assoc($kq_book);

			echo'<tr>';

			echo'<td>
			<div id="hinhsach"><a href="index.php?id=book&idbook='.$d_book['idbook'].';"><img src="img/'. $d_book['imgdetail'].'" /></a></div>
		</td>
		<td>
			<div id="tensach"><a href="index.php?id=book&idbook='.$d_book['idbook'].';">'. $d_book['name'].';</a></div>
			<div id="delete" onclick="deleteBook('.$idbook.');" ><img src="img/logo/icon_delete.png" /></div>
		</td>
		<td>
			<div id="giaban">'.number_format($d_book['price'] * (1-$d_book['saleoff']/100)).' đ</div>
			<div id="giabia">'.number_format($d_book['price']).' đ</div>
		</td>

			<td>
				<input type="number" num="0" value="'.$d['count_book'] .'" id="soluong" name="soluong" style="width: 38px; text-align: center"/>
			</td>
			<td>
				<button onclick="updateCountBook('.$idbook.');"><img src="img/logo/icon_update.png" width="17px;" /></button>
			</td>

	</td>
	<td>
		<div style="width: 100px; text-align: center; color: #CC6600; font-size: 20px;">';
			echo number_format(($d_book['price'] * (1-$d_book['saleoff']/100))*$d['count_book']).' đ
		</div>
	</td>
</tr>';
} 
}
}
echo'</table>';
//echo'</div>';








?>