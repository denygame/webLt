<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Untitled Document</title>
</head>

<body>
<div id="manage_book">
    <div id="head_book"></div>
    <div id="h1">
        <p>QUẢN LÝ SÁCH</p>
        <form>
            <button>THÊM</button>
        </form>

        <form action="" method="post">
            <input type="text" name="find"/>
            <button>Tìm</button>
        </form>
    </div>
    <div id="h2">
        <form action="admin_main_left.php" method="post">
            <div id="select_category">
                <select name="btn">
                    <option>--Chọn danh mục</option>
                    <?php
                    $sql = "select * from category";
                    $kq = mysql_query($sql);
                    while ($d = mysql_fetch_array($kq)) {
                        ?>
                        <option value="<?php echo $d['idcategory']; ?>"> <?php echo $d['name']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div id="select_type">
                <select name="btn">
                    <option>--Chọn thể loại--</option>
                    <?php
                    $sql = "select * from db_type";
                    $kq = mysql_query($sql);
                    while ($d = mysql_fetch_array($kq)) {
                        ?>
                        <option value="<?php echo $d['idtype']; ?>"> <?php echo $d['name']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </form>
    </div>


    <div id="main_manage_book">
        <table>
            <tr>
                <th id="stt">STT</td>
                <th id="img_book">Hình sách</th> 
                <th id="name_book">Tên sách</th>
                <th id="author">Tác giả</th> 
                <th id="price">Giá</th>
            </tr>
        </table>
    </div>
</div>


</body>
</html>