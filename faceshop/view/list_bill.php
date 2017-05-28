<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="css/list_bill.css">
    <?php
    function delete($idbill){
    mysql_query("update bill set checkDelete= 1 WHERE idbill=$idbill");
    }
    if(isset($_POST['save']))
    {
        foreach ($_POST['delete'] as $value)
        {
            delete($value);
            //echo $value;
        }
        echo '<script> location.href='.'"index.php?id=login&idlogin=bill"'.';</script>';
    //echo "<script> alert('Đã xóa bill thành công!'); </script>";
    }


    ?>

</head>

<body>
	<?php
	require_once 'controller/BillController.php'; $b=new BillController();
    require_once 'controller/BookController.php'; $book=new BookController();
	if(isset($_SESSION['email'])){ 
		$email=$_SESSION['email']; 
		$list=$b->getInfoPageBill($email);
		$start=$list['start'];
		$current_page = $list['current_page'];
		$total_page = $list['total_page'];
		if ($current_page > $total_page) $current_page = $total_page; else if ($current_page < 1) $current_page = 1;
	}?>
	
	<div id="list_bill">
        <form action="index.php?id=login&idlogin=bill" method="post">
		<table>
			<tr id="title"><td colspan="6" style="text-align: center; font-size: 20px;"><b>DANH SÁCH ĐƠN ĐẶT HÀNG</b></td></tr>
			<tr>
				<th id="stt">STT</th>
				<th id="data_bill">Ngày đặt hàng</th>
				<th id="totalprice">Tổng tiền</th>
				<th id="status">Trạng thái</th>
				<th id="show_detail"></th>
                <th id="delete"><input type="submit" name="save" value="Xóa" /></th>
			</tr>
			<?php 
			$kq=$b->billsByEmail($email, $start); 
			if($kq!=null){ 
				$stt=0;
				while ($d=mysql_fetch_array($kq)) {?>
				<tr>
					<td id="stt"><?php echo $stt+1?></td>
					<td id="date_bill"><?php $date=$d['date_bill']; $date_bill=date_create($date); echo date_format($date_bill,"d/m/Y ") ?></td>
					<td id="totalprice">
                        <?php
                        $listBillsInfo=mysql_query("select * from billinfo WHERE  idbill=".$d['idbill']);
                        $total=0;
                        while ($dinfo=mysql_fetch_array($listBillsInfo)){
                            $bk=$book->getBookById($dinfo['idbook']);
                            $total=$total+($bk['price']*(1-$bk['saleoff']/100))*$dinfo['count'];
                        }
                        echo number_format($total);
                        ?>
                    </td>
					<td id="status"><?php echo $d['status'];?></td>
					<td id="show_detail"><a href="index.php?id=login&idlogin=bill_detail&idbill=<?php echo $d['idbill'];?>">Xem chi tiết </a></td>
                    <td id="delete">
                        <?php
                        if($d['status']=='New')
                        {
                            echo '<input type="checkbox" name="delete[]" value="'.$d['idbill'].'"/>';
                        }
                    ?>
                    </td>
                </tr>
				<?php $stt=$stt+1; } 
			}else echo "<script language='javascript'>alert('Không có trang này!');</script>"; ?>
		</table>
        </form>
	</div>
	<center><div id="phantrang"><?php $b->pageBills($current_page,$total_page); ?></div></center>
</body>
</html>