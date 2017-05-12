<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/list_bill.css">
</head>

<body>
<?php if(isset($_SESSION['email'])) $email=$_SESSION['email'];?>
	
<div id="list_bill">
	<table>
		<tr><td colspan="5" align="center" style="text-align: center;">Danh sách đơn đặt hàng</td></tr>
		<tr>
			<td id="stt">STT</td>
			<td id="data_bill">Ngày đặt hàng</td>
			<td id="totalprice">Tổng tiền</td>
			<td width="20%">Trạng thái</td>
			<td id="show_detail"></td>
		</tr>
		<?php 
			$sql="select * from bill";
			$kq=mysql_query($sql);
			$stt=0;
			while ($d=mysql_fetch_array($kq)) {?>
				<tr>
					<td id="stt"><?php echo $stt+1?></td>
					<td id="data_bill"><?php echo $d['date_bill']; ?></td>
					<td id="totalprice"><?php echo $d['totalprice'] ?></td>
					<td ></td>
					<td id="show_detail"><a href="">Xem chi tiết </a></td>
				</tr>
			<?php }
		?>
	</table>
</div>
</body>
</html>