<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/admin_book_insert.css"/>
</head>

<body>
<div id="admin_book_insert">
    <form action="" method="post">
    <table>
        <h1>THÊM SÁCH</h1>
        <tr>
            <td id="label">Tên sách:</td>
            <td id="values"><input type="text" name="name_book"/></td>
        </tr>
        <tr>
            <td id="label">Hình nền:</td>
            <td id="values"><input type="text" name="imgbg"/></td>
        </tr>
        <tr>
            <td id="label">Hình ảnh chi tiết: </td>
            <td id="values"><input type="text" name="imgdetail"/></td>
        </tr>
        <tr>
            <td id="label">Tên tác giả:</td>
            <td id="values"><input type="text" name="author"/></td>
        </tr>
        <tr>
            <td id="label">Ngày xuất bản:</td>
            <td id="values"><input type="date" name="ngayxb"/></td>
        </tr>
        <tr>
            <td id="label">Nhà xuất bản:</td>
            <td id="values"><input type="text" name="nhaxb"/></td>
        </tr>
        <tr>
            <td id="label">Nhà phát hành:</td>
            <td id="values"><input type="text" name="nhaph"/></td>
        </tr>
        <tr>
            <td id="label">Dạng bìa:</td>
            <td id="values"><input type="text" name="dangbia"/></td>
        </tr>
        <tr>
            <td id="label">Kích thước:</td>
            <td id="values"><input type="number" name="size"/></td>
        </tr>
        <tr>
            <td id="label">Khối lượng:</td>
            <td id="values"><input type="number" name="weight"/></td>
        </tr>
        <tr>
            <td id="label">Số trang:</td>
            <td id="values"><input type="number" name="totalpages"/></td>
        </tr>
        <tr>
            <td id="label">Khuyến mãi:</td>
            <td id="values"><input type="number" name="saleoff"/></td>
        </tr>
        <tr>
            <td id="label">Giá:</td>
            <td id="values"><input type="number" name="price"/></td>
        </tr>
        <tr>
            <td id="label">Tóm tắt:</td>
            <td id="values"><input type="text" name="info"/></td>
        </tr>
        <tr>
            <td id="label">Thể loại:</td>

            <td id="values">

                    <select name="type">
                        <option value=""> --chọn thể loại--</option>
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
            <td id="values"><input type="number" name="heighlightss"/></td>
        </tr>
        <tr>
            <td id="label">Trạng thái:</td>
            <td id="values"><input type="text" name="status" value="Mới"/></td>
        </tr>
        <tr>
            <td id="label">Số lượng đã bán:</td>
            <td id="values"><input type="number" name="sold" value="0"/></td>
        </tr>
        <tr>
            <td id="label">Kiểm tra xóa:</td>
            <td id="values"><input type="number" name="checkDelete" value="0"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center" id="btn">
                <button type="submit" name="btn">Thêm</button>
                <a href="index.php?admin=manage_book">Hủy</a>
            </td>
        </tr>
    </table>

    </form>


</div>
</body>
</html>