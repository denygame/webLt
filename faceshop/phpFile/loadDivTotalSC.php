<?php
require_once 'connect.php';


//echo'<div id="total">';

echo'<table>
<tr>
	<td></td>
	<td></td>
	<td><b>Tổng cộng:</b></td>
	<td>';
		$total=0;
		$data=mysql_query("select * from `shoppingcart`");
		if($data!=null){
			while ($d=mysql_fetch_array($data))
			{
				$kq_book=mysql_query("select * from `book` WHERE idbook=".$d['idbook']);
				if($kq_book!=null) $d_book=mysql_fetch_array($kq_book);
				$total=$total+$d['count_book']*$d_book['price'];
			}
		}
		echo number_format($total).'đ';
		echo'</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td ><b>Chỉ còn:</b></td>
		<td style="color: #CC6600; font-size: 25px;font-style: italic;">
			<b>';
				$total2=0;
				$data=mysql_query("select * from `shoppingcart`");
				if($data!=null){
					while ($d2=mysql_fetch_array($data))
					{
						$kq_book=mysql_query("select * from book where idbook=".$d2['idbook']);
						if($kq_book!=null) $d_book=mysql_fetch_array($kq_book);
						$total2=$total2+$d2['count_book']*$d_book['price']*(1-$d_book['saleoff']/100);
					}
				}
				echo number_format($total2).'đ</b>';
				echo'</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><b>Tiết kiệm được:</b></td>
				<td>';
					echo number_format($total-$total2).'đ';
					echo'</td>
				</tr>
				<tr>
					<td colspan="4">
						Tổng tiền chưa bao gồm phí vận chuyển
						xem thông tin phí vận chuyển tại đây.
					</td>
				</tr>
			</table>';

               //  echo'</div>';
			?>