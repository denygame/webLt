<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/main_book.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
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
</head>

<body>
<?php require_once 'controller/BookController.php'; $bookController = new BookController();
require_once 'controller/AuthorController.php'; $authorController = new AuthorController();
    $idBook=$_GET['idbook'];$d=$bookController->getBookById($idBook);$idtype=$d['idtype'];{?>
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
                        <hr/>
						<div id="gia">
                            <pre style=" font-family: Arial, Helvetica, sans-serif">Giá bán: <font style="font-size: 25px; color: orangered;" ><?php echo number_format($d['price']*(1-(($d['saleoff'])/100)));?> đ</font>     Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']);?> đ</font>   <font style=" padding: 5px; background-color: darkgreen; color: white;">Tiết kiệm: <?php echo $d['saleoff']?>%</font> </pre>
                            <p style="margin-top: 10px;">( Bạn nhận được <font style=" color: #CC6600">243</font>  điểm thưởng khi mua cuốn sách này)</p>
                            <div style="margin-top: 10px; float: left; margin-right: 15px;">
                                <div style=" border: 1px solid #999999; padding: 10px; width: 140px; float: left; margin-right: 15px;">
                                    <span style=" float: left" >Số lượng</span>
                                    <a href="#?giam=1" style=" float: left; width: 5px; margin-left: 10px;"> < </a>
                                    <input type="text" name="qty" id="qty" value="1" class="input_quantity" size="1" style="text-align: center;  float: left; margin-left: 10px;"">
                                        <a href="#?tang=1" style=" float: left;width: 5px; margin-left: 10px;"> > </a>
                                </div>
                                <div style="float: left;" id="div_chon_sach">
                                    <a href="#" style=" background-color: #CC6600;" > + | Thêm vào giỏ hàng <br/> (Và tiếp tục mua)</a>
                                    <a href="#"  style="background-color: #0e90d2;"><img src="../img/icon_giohang.png" width="15px;" alt=""/> | Chọn cuốn này <br> (Và đi đến giỏ hàng)</a>
                                </div>
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
            <table >
                <tr><td colspan="2"><h2>Gửi đánh giá của bạn</h2></td> </tr>
                <tr>
                    <td width="400px">
                        <table>
                            <form>
                            <tr>
                                <td colspan="2" style="color: red">Điểm thưởng cho nhận xét được duyệt sẽ được cộng vào tài khoản ứng với email của bạn.</td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="#"> >> Tham khảo bí quyết để comment dễ được duyệt đăng tại đây!</a></td>
                            </tr>
                            <tr >
                                    <td id="td"> Email (<font color="red">*</font>)</td>
                                    <td><input type="email" id="" name="" size="30" style="font-size: 20px;"/></td>
                            </tr>
                            <tr>
                                    <td id="td"> Đánh giá (<font color="red">*</font>)</td>
                                    <td><input type="email" id="" name="" size="30" style="font-size: 20px;"/></td>
                            </tr>
                            <tr>
                                    <td id="td" > Câu hỏi chống spam: </td>
                                    <td> câu hỏi: </td>
                            </tr>
                            <tr>
                                    <td id="td"> Câu trả lời (<font color="red">*</font>)</td>
                                    <td><input type="email" id="" name="" size="30" style="font-size: 20px;"/></td>
                            </tr>
                            <tr>
                                    <td colspan="2" style="width: 190px;"> Nhập xét của bạn (<font color="red">*</font>)</td>
                            </tr>
                            <tr>
                                    <td colspan="2">
                                        <form action="" >
                                            <textarea rows="6" cols="101"></textarea>
                                        </form>
                                    </td>
                            </tr>
                            <tr>
                                    <td></td>
                                    <td id="gui_nhan_xet"><a href="#" >Gửi nhận xét</a> </td>
                            </tr>
                            </form>
                        </table>
                    </td>
                    <td>
                        <div>
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
                    </td>
                </tr>
            </table>
    </div>
    <hr />
    <div id="tieude2">Sách cùng thể loại</div>
        <div id="sach_cungloai2">
            <?php $result = $bookController->get6BookSameType($idBook,$idtype);if($result!=null) while($d=mysql_fetch_array($result)){?>
                <div id="sach2">
                    <div id="hinhsach2"><a href="index.php?id=sach&idbook=<?php echo $d['idbook'];?>"><img src="img/<?php echo $d['imgdetail']?>" /></a></div>
                    <div id="tensach2"><a href="index.php?id=sach&idbook=<?php echo $d['idbook'];?>"><p><?php echo $d['name'];?></p></a></div>
                    <div id="mota2">
                        <?php if($author!=null)?><p><?php echo $author['name'];  ?>
                    </div>
                    <div id="gia2">
                        <p>Giá bán: <font style="color:#C60"><?php echo number_format($d['price']*(1-(($d['saleoff'])/100)));?> đ</font></p>
                        <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']);?> đ</font></p>
                    </div>
                    <div id="km2"><?php echo $d['saleoff']; ?>%</div>
                    <div id="dathang2"><a href="#">&#9758 Đặt hàng</a></div>
                </div>
            <?php }?>
    </div>
</body>
</html>