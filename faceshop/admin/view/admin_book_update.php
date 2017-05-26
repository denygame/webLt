<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link  rel="stylesheet" type="text/css" href="css/admin_book_update.css"/>
</head>

<body>
<div id="admin_book_update">
    <form action="" method="post">
        <table>
            <h1>CHỈNH SỬA SÁCH</h1>
            <?php
            if(isset($_GET['idbook']))
            {
            $idbook =$_GET['idbook'];
            $sql= "select * from book WHERE  idbook=$idbook";
            $kq= mysql_query($sql);
            $d=mysql_fetch_assoc($kq);
            ?>
            <tr>
                <td id="label">Tên sách:</td>
                <td id="valuse"><input type="text" name="name_book" value="<?php echo $d['name'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Hình nền:</td>
                <td id="valuse"><input type="text" name="imgbg" value="<?php echo $d['imgbg'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Hình ảnh chi tiết: </td>
                <td id="valuse"><input type="text" name="imgdetail" value="<?php echo $d['imgdetail'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Tên tác giả:</td>
                <td id="valuse"><input type="text" name="author" value="<?php echo $d['idauthor'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Ngày xuất bản:</td>
                <td id="valuse"><input type="date" name="ngayxb" value="<?php echo $d['ngayxb'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Nhà xuất bản:</td>
                <td id="valuse"><input type="text" name="nhaxb" value="<?php echo $d['nhaxb'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Nhà phát hành:</td>
                <td id="valuse"><input type="text" name="nhaph" value="<?php echo $d['nhaph'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Dạng bìa:</td>
                <td id="valuse"><input type="text" name="dangbia" value="<?php echo $d['dangbia'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Kích thước:</td>
                <td id="valuse"><input type="number" name="size" value="<?php echo $d['size'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Khối lượng:</td>
                <td id="valuse"><input type="number" name="weight" value="<?php echo $d['weight'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Số trang:</td>
                <td id="valuse"><input type="number" name="totalpages" value="<?php echo $d['totalpages'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Khuyến mãi:</td>
                <td id="valuse"><input type="number" name="saleoff" value="<?php echo $d['saleoff'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Giá:</td>
                <td id="valuse"><input type="number" name="price" value="<?php echo $d['price'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Tóm tắt:</td>
                <td id="valuse"><input type="text" name="info" value="<?php echo $d['info'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Thể loại:</td>
                <td id="valuse">
                    <select name="type">
                        <?php
                        $sqlt="select * from db_type WHERE idtype=".$d['idtype'];
                        $kqt=mysql_query($sqlt);
                        $dt=mysql_fetch_assoc($kqt);
                        ?>
                        <option value="<?php echo $dt['idtype'] ?>"> <?php echo $dt['name'] ?></option>
                        <?php
                        $sqltype="select * from db_type";
                        $kqtype=mysql_query($sqltype);
                        while ($dtype=mysql_fetch_array($kqtype))
                        { ?>
                            <option value="<?php echo $dtype['idtype']; ?>"> <?php echo $dtype['name']; ?> </option>
                            <?php
                        }
                        ?>
                    </select>

                </td>
            </tr>
            <tr>
                <td id="label">Mức nổi bậc:</td>
                <td id="valuse"><input type="number" name="heighlights" value="<?php echo $d['heighlights'] ?>" /></td>
            </tr>
            <tr>
                <td id="label">Trạng thái:</td>
                <td id="valuse"><input type="text" name="status"  value="<?php echo $d['status'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Số lượng đã bán:</td>
                <td id="valuse"><input type="number" name="sold" value="<?php echo $d['sold'] ?>"/></td>
            </tr>
            <tr>
                <td id="label">Kiểm tra xóa:</td>
                <td id="valuse"><input type="number" name="checkDelete" value="<?php echo $d['checkDelete'] ?>"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center" id="btn">
                    <button type="submit" name="btn">Lưu</button>
                    <a href="index.php?admin=manage_book">Hủy</a>
                </td>
            </tr>
            <?php }?>
        </table>

    </form>


</div>
</body>
</html>