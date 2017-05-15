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
        <tr id="title"><td colspan="5" style="text-align: left; font-size: 20px;"><b>DANH SÁCH ĐƠN ĐẶT HÀNG</b></td></tr>
		<tr>
			<th id="stt">STT</th>
			<th id="data_bill">Ngày đặt hàng</th>
			<th id="totalprice">Tổng tiền</th>
			<th id="status">Trạng thái</th>
			<th id="show_detail"></th>
		</tr>
		<?php 
			$sql="select * from bill";
			$kq=mysql_query($sql);
			$stt=0;
			while ($d=mysql_fetch_array($kq)) {?>
				<tr>
					<td id="stt"><?php echo $stt+1?></td>
					<td id="date_bill"><?php $date=$d['date_bill']; $date_bill=date_create($date); echo date_format($date_bill,"d/m/Y ") ?></td>
					<td id="totalprice"><?php  echo $d['totalprice'] ?></td>
					<td id="status"><?php echo $d['status'];?> </td>
					<td id="show_detail"><a href="index.php?id=login&idlogin=bill_detail&idbill=<?php echo $d['idbill'];?>">Xem chi tiết </a></td>
				</tr>
			<?php }
		?>
	</table>
</div>
</body>
</html>