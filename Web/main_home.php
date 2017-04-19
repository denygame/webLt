<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="main_home.css" />
</head>

<body>
<?php include'connect.php';?>
<div id="main_home">	
	<div id="slide"></div>
	<div id="sach_noibat">
   	  <div id="tieude"><p>Sách nổi bật</p></div>
        <div>
        	<?php
			$sql="select * from sach ";
			$kq=mysql_query($sql);
			while($d=mysql_fetch_array($kq))
			{
			?>
              <div id="sach">
              	<div id="hinhsach"><a href="home.php?idsach= <?php echo $d['idsach'];?>"><img width="300px" src="img/<?php echo $d['hinhanh1'];?>" /></a></div>
                <div id="tensach"><a href="home.php?idsach= <?php echo $d['idsach']; ?>"><?php echo $d['tensach'];?></a></div>
                <hr />
                <div id="mota">
                	<p><?php echo $d['tacgia'];?></p>
                	<p></p>
                </div> 
                <hr />
                <div id="gia">
                	<div id="gia1">
						<p>Giá bán: <font style="color:#C60"><?php echo $d['giaban']*(1-$d['khuyenmai']);?> đ</font></p>
                        <p>Giá bìa: <font style="text-decoration:line-through"><?php echo $d['giaban'] ;?> đ</font></p>
                    </div>
                    <div id="km">-<?php echo $d['khuyenmai']*100;?>% </div>
                </div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
              </div>
             <?php }?>
               
        </div>
    </div>
    <hr />
    <div id="sach_moi">
    	<div id="tieude"><p>Sách mới</p></div>
        <div>
              <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
              </div>
              
               <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
              </div>
              
               <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
              </div>
              
               <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
              </div>
              
               <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
                
              </div>
               <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
              </div>
        </div>
    </div>
    <hr />
    <div id="sach_sapra">
    	<div id="tieude"><p>Sách sắp ra mắt</p></div>
        <div>
             <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
              </div>
              
               <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
              </div>
              
               <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
              </div>
              
               <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
              </div>
              
               <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
                
              </div>
               <div id="sach">
              	<div id="hinhsach"><a href="home.php?id=sach"><img /></a></div>
                <div id="tensach"><a href="home.php?id=sach">Ten sach</a></div>
                <hr />
                <div id="mota">Mô tả</div> 
                <hr />
                <div id="gia">giá sách</div>
                <div id="dathang">
                	<a href="#">&#9758 Đặt hàng</a>
                </div>
              </div>
        </div>
    </div>
</div>
</body>
</html>