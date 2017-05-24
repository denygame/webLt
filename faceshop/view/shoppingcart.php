<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/shoppingcart.css"/>

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="js/deleteSC.js"></script>
    <script src="js/countBookSC.js"></script>

    <?php require_once 'controller/ScController.php'; $sc=new ScController(); 
    require_once 'controller/BookController.php'; $bController = new BookController(); ?>

</head>
<body>
    <?php if(isset($_POST['count'])&&isset($_GET['idbook'])){
       $count=$_POST['count'];
       $idbook=$_GET['idbook'];
       $sc->updateSC($idbook,$count,0); 
       unset($_POST['count']);
       unset($_GET['idbook']);
       echo '<script type="text/javascript">','loadDivSc();','</script>';
   }  ?>


   <div>
    <div id="title" ><b>Giỏ hàng</b></div>

    <div id="shopingcart_left">
        <div id="list">
            <table>
                <?php $kq=$sc->getSC(); if($kq==null) { ?>
                <tr><td>Không có sản phẩm nào trong giỏ hàng</td></tr>
                <?php } else {
                    while ($d=mysql_fetch_array($kq)) {
                        $idbook= $d['idbook']; ?>
                        <tr>
                            <?php $kq_book=$bController->getBookById($idbook);
                            if($kq_book!=null) $d_book=$kq_book; ?>
                            <td>
                                <div id="hinhsach"><a href="index.php?id=book&idbook=<?php echo $d_book['idbook'];?>"><img src="img/<?php echo $d_book['imgdetail']?>" /></a></div>
                            </td>
                            <td>
                                <div id="tensach"><a href="index.php?id=book&idbook=<?php echo $d_book['idbook'];?>"><?php echo $d_book['name'];?></a></div>
                                <div id="delete" onclick="deleteBook('<?php echo $idbook; ?>');"><img src="img/logo/icon_delete.png" /></div>
                            </td>
                            <td>
                                <div id="giaban"><?php echo number_format($d_book['price'] * (1-$d_book['saleoff']/100))?> đ</div>
                                <div id="giabia"><?php echo number_format($d_book['price'])?> đ</div>
                            </td>

                            <form method="post" action="index.php?id=shoppingcart&idbook=<?php echo $idbook; ?>">
                                <td>
                                    <input type="number" min="0" value="<?php echo $d['count_book'] ?>" id="count" name="count" style="width: 38px; text-align: center"/>
                                </td>



                                <td>
                                    <button><img src="img/logo/icon_update.png" width="17px;" /></button>
                                </td>
                            </form>

                        </td>
                        <td>
                            <div style="width: 100px; text-align: center; color: #CC6600; font-size: 20px;">
                                <?php echo number_format(($d_book['price'] * (1-$d_book['saleoff']/100))*$d['count_book']);?> đ
                            </div>
                        </td>
                    </tr>
                    <?php } } ?>
                </table>
            </div>
            <div id="total">
                <table>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>Tổng cộng:</b></td>
                        <td><?php
                            $total=0;
                            $kq=$sc->getSC();
                            if($kq!=null){
                                while ($d=mysql_fetch_array($kq))
                                {
                                    $kq_book=$bController->getBookById($d['idbook']);
                                    if($kq_book!=null) $d_book=$kq_book;
                                    $total=$total+$d['count_book']*$d_book['price'];
                                }
                            }
                            echo number_format($total); ?>đ
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td ><b>Chỉ còn:</b></td>
                        <td style="color: #CC6600; font-size: 25px;font-style: italic;">
                            <b><?php
                                $total2=0;
                                $kq=$sc->getSC();
                                if($kq!=null){
                                    while ($d2=mysql_fetch_array($kq))
                                    {
                                        $kq_book=$bController->getBookById($d2['idbook']);
                                        if($kq_book!=null) $d_book=$kq_book;
                                        $total2=$total2+$d2['count_book']*$d_book['price']*(1-$d_book['saleoff']/100);
                                    }
                                }
                                echo number_format($total2); ?>đ</b>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Tiết kiệm được:</b></td>
                            <td>
                                <?php
                                echo number_format($total-$total2);
                                ?>đ
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                Tổng tiền chưa bao gồm phí vận chuyển
                                xem thông tin phí vận chuyển tại đây.
                            </td>
                        </tr>
                    </table>
                </div>



            </div>
            <div id="shoppingcart_right">

            </div>
        </div>
    </body>
    </html>