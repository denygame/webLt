<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link type="text/css" rel="stylesheet" href="css/bill_detail.css"/>
</head>

<body>
    <?php require_once 'controller/BillinfoController.php'; $bi=new BillinfoController(); 
    require_once 'controller/BookController.php'; $book=new BookController();
    if(isset($_GET['idbill'])) {
        $idbill=$_GET['idbill'];
        $list=$bi->getInfoPageBillinfo($idbill);
        $start=$list['start'];
        $current_page = $list['current_page'];
        $total_page = $list['total_page'];

        $str = 'id=login&idlogin=bill_detail&idbill='.$idbill;
        if ($current_page > $total_page) $current_page = $total_page; else if ($current_page < 1) $current_page = 1; ?>
        <div id="bill_detail">
            <table>
                <tr>
                    <th id="stt">STT</th>
                    <th id="name_book">Tên Sách</th>
                    <th id="count">Số lượng</th>
                    <th id="price">Giá</th>
                </tr>
                <?php
                $kq=$bi->billInfos($idbill, $start); 
                if($kq!=null) {
                    $i=0;
                    while ($d=mysql_fetch_array($kq))
                    {
                        $idbook=$d['idbook'];
                        $d2=$book->getBookById($idbook);
                        ?>
                        <tr>
                            <td id="stt"><?php $i++; echo $i;  ?></td>
                            <td id="name_book"><a href="index.php?id=book&idbook=<?php echo $d2['idbook']; ?>"> <?php echo $d2['name'] ?> </a></td>
                            <td id="count"><?php echo $d['count'] ?></td>
                            <td id="price" style="color: #CC6600; font-style: oblique; font-size: 20px;">
                                <?php echo number_format($d['count']*$d2['price']*(1-($d2['saleoff']/100)));?>đ
                            </td>
                        </tr>
                        <?php } 
                    } else echo "<script language='javascript'>alert('Không có trang này!');</script>"; 
                } ?>
            </table>
        </div>
        <center><div id="phantrang"><?php $bi->pageBills($str,$current_page,$total_page); ?></div></center>
    </body>
    </html>