<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/main_book.css" />


    <?php require_once 'controller/BookController.php'; $bookController = new BookController();
    require_once 'controller/AuthorController.php'; $authorController = new AuthorController();
    require_once 'controller/ScController.php'; $sc=new ScController();?>

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="js/countBookSC.js"></script>

    <script>
        $(document).ready(function(){
            $("#gt").click(function(){
                $("#nd_tg").hide();
                $("#nd_gt").show();
            });
            $("#tg").click(function(){
                $("#nd_gt").hide();
                $("#nd_tg").show();
            });
        });
    </script>

    <script type="text/javascript">
    //hàm chuyển link submit
        function chgAction() {
              addBookSc(<?php echo $_GET['idbook'];?>)
              document.getElementById("lalala").action ="index.php?id=shoppingcart";
              document.getElementById("lalala").submit();
        }

        function addBookSc(idbook){
           $.ajax({
                async: false,
                method: 'get',
                url: 'phpFile/addBookScFromMainBook.php',
                data: { idbook: idbook, count: document.getElementById('soluong').value }
              });
        }
    </script>

    
</head>

<body>
    <?php $idBook=$_GET['idbook'];$d=$bookController->getBookById($idBook);$idtype=$d['idtype']; { ?>

    <div id="noidung">
       <div id="left"><img src="img/<?php echo $d['imgdetail'];?>"/></div>
       <div id="right">
          <div id="name_book"><?php echo $d['name'];  ?> </div>
          <div id="detail">
            <?php $idAuthor = $d['idauthor'];$author = $authorController->getNameInfoAuthorById($idAuthor); if($author!=null){ ?><p>Tác giả: <?php echo $author['name'] ?></p><?php } ?>
            <p>Xuất bản: <?php echo $d['ngayxb']?></p>
            <p>Nhà xuất bản: <?php echo $d['nhaxb']?></p>
            <p>Nhà phát hành: <?php echo $d['nhaph']?></p>
            <p>Dạng bìa: <?php echo $d['dangbia']?></p>
            <p>Kích thướt: <?php echo $d['size']?></p>
            <p>Khối lượng: <?php echo $d['weight']?> gam</p>
            <p>Số trang: <?php echo $d['totalpages']?></p>
        </div>
        <div id="khac">
            <div style="margin: auto; width: 200px;">
                <div id="update" style=""><a href=""> <img src="img/logo/icon_update.png "><p>Update</p></a></div>
                <div id="delete"><a href=""> <img src="img/logo/icon_delete.png" ><p> Delete</p></a></div>
            </div>

            <div style="clear:both;">
                <ul style="margin-left: 30px;">
                    <li>Xem thêm các tác phẩm của <?php $d['idauthor'] ?>tuyển chọn</li>
                    <li>Tiết kiệm hơn với Xả kho giảm tới 70%</li>
                    <li>Hãy chọn chúng tôi để được
                        <ul style="margin-left: 20px;">
                            <li>Phục vụ uy tín, tận tâm, chuyên nghiệp</li>
                            <li>Thanh toán khi nhận sách trên toàn quốc</li>
                            <li>Đầu sách phong phú, cập nhật nhanh</li>
                        </ul>
                    </li>
                    <li>Ghé thăm  <a href="">Fanpage</a> để nhận nhiều ưu đãi hơn</li>
                    <li>Hotline: <a href="#">0965. 196. 801</a></li>
                </ul>
            </div>
        </div>
        <hr/>
        <div id="gia">
            <pre style=" font-family: Arial, Helvetica, sans-serif">Giá bán: <font style="font-size: 25px; color: orangered;" ><?php echo number_format($d['price']*(1-(($d['saleoff'])/100)));?> đ</font>     Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']);?> đ</font>   <font style=" padding: 5px; background-color: darkgreen; color: white;">Tiết kiệm: <?php echo $d['saleoff']?>%</font> </pre>
            <p style="margin-top: 10px;">( Bạn nhận được <font style=" color: #CC6600">243</font>  điểm thưởng khi mua cuốn sách này)</p>
            <div style="margin-top: 10px; float: left; margin-right: 15px;">





                <form id="lalala" method="post">
                    <div style=" border: 1px solid #999999; padding: 10px; width: 120px; float: left;">
                        <label>Số lượng</label>
                        <input type="number" value="1" min="0" name="soluong" id="soluong" style="width: 40px; margin-left: 10px; text-align: center"/>
                    </div>

                    <div style="float: left;" id="div_chon_sach">

                        <button onclick="addBookSc(<?php echo $d['idbook']; ?>);" style="background-color: #0e90d2"> + | Thêm vào giỏ hàng <br/> (Và tiếp tục mua)</button>

                        <button onclick="chgAction();" style="background-color: #CC6600">
                            <img src="img/logo/icon_giohang.png" width="20px;" style="margin-top: 4px; margin-bottom: -7px;" alt=""/> | Chọn cuốn này <br> (Và đi đến giỏ hàng)
                        </button>
                    </div>
                </form>




            </div>
        </div>
    </div>
</div>
<div id="gt_tg">
    <div style="border-bottom: 1px solid #999999; height: 30px">
        <div><button style="border-style: none" id="gt"> Giới thiệu</button></div>
        <div><button style="border-style: none" id="tg"> Tác giả</button></div>
    </div>
    <div id="nd_gt">
        <b style="font-size: 25px;">Giới thiệu</b><br>
        <p style="line-height: 25px; font-size: 20px;" ><?php echo $d['info']?></p>
    </div>
    <div id="nd_tg">
        <b style="font-size: 25px; ">Tác giả</b><br>
        <p style="line-height: 25px;font-size: 20px;"><?php if($author!=null) echo $author['info']; ?></p>
    </div>
</div>
<?php }?>
<hr />
<div id="danhgia">
    <div id="tieude_danhgia">GỬI ĐÁNH GIÁ CỦA BẠN</div>
    <div id="danhgia_left">
        <p>Điểm thưởng cho nhận xét được duyệt sẽ được cộng vào tài khoản ứng với email của bạn.</p>
        <p><a> >> Tham khảo bí quyết để comment dễ được duyệt đăng tại đây!</a></p>
        <br>
        <form action="" method="post">
            <table>
                <tr>
                    <td width="100px;">Email (<font color="red">*</font>)</td>
                    <td><input type="email" size="30"/></td>
                </tr>
                <tr>
                    <td>Đánh giá (<font color="red">*</font>)</td>
                    <td><input type="text" size="30"/></td>
                </tr>
                <tr>
                    <td>Câu hỏi chống spam </td>
                    <td> ????</td>
                </tr>
                <tr>
                    <td>Nhập câu trả lời (<font color="red">*</font>)</td>
                    <td><input type="text" size="30"/></td>
                </tr>
                <tr>
                    <td>Nhận xét của bạn</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td colspan="2" style="margin: auto"><textarea rows="6" cols="66"></textarea></td>
                </tr>
                <tr><d></d><td></td></tr>
                <tr>
                    <td colspan="2" style="text-align: center; margin: auto"><button type="submit">Gửi nhận xét</button></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="danhgia_right">
        <p>Nhận ngay điểm thưởng khi chia sẻ</p>
        <br>
        <p>Là hệ thống điểm thưởng (giá trị quy đổi 1 điểm tương ứng 5 đồng) được dùng khi mua hàng tại Anybooks</p>
        <br>
        <ul>
            Điều kiện để được cộng điểm:
            <ul style="margin-left: 15px;">
                <li>Trước khi gửi nhận xét bạn phải đăng nhập tài khoản tại Anybooks.</li>
                <li>Sau khi gửi nhận xét, ban quản trị sẽ duyệt nhận xét của bạn, nếu nhận xét hợp lệ hệ thống sẽ gửi email báo lại cho bạn, tài khoản của bạn sẽ được hiển thị và cộng điểm.
                </li>
            </ul>

        </ul>
        <br>
        <ul>
            Mỗi nhận xét được duyệt sẽ được tặng:
            <ul style="margin-left: 15px;">
                <li>200 điểm cho khách hàng đã từng mua hàng thành công tại Anybooks</li>
                <li>100 điểm cho khách hàng chưa từng mua hàng thành công.</li>
            </ul>
        </ul>
        <p>Tham khảo thêm mẹo viết comment hay tại đây!</p>
    </div>

</div>
<hr />


<div id="tieude2">Sách cùng thể loại</div>
<div id="sach_cungloai2">
    <?php $result = $bookController->get6BookSameType($idBook,$idtype);if($result!=null) while($d=mysql_fetch_array($result)){?>
    <div id="sach2">
        <div id="hinhsach2"><a href="index.php?id=book&idbook=<?php echo $d['idbook'];?>"><img src="img/<?php echo $d['imgdetail']?>" /></a></div>
        <div id="tensach2"><a href="index.php?id=book&idbook=<?php echo $d['idbook'];?>"><p><?php echo $d['name'];?></p></a></div>
        <div id="mota2">
            <?php if($author!=null)?><p><?php echo $author['name'];  ?>
        </div>
        <div id="gia2">
            <p>Giá bán: <font style="color:#C60"><?php echo number_format($d['price']*(1-(($d['saleoff'])/100)));?> đ</font></p>
            <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']);?> đ</font></p>
        </div>
        <div id="km2"><?php echo $d['saleoff']; ?>%</div>
        <div id="dathang2"><button class="btn" onclick="doSomething('<?php echo $d['idbook'];?>');">&#9758 Chọn mua</button></div>
    </div>
    <?php }else echo 'Không có sách nào cùng thể loại';?>
</div>
</body>
</html>