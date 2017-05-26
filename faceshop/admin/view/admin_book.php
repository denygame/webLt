<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Untitled Document</title>
    <link href="css/admin_book.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

    <?php
    function delete($idbook){
        mysql_query("update book set checkDelete=1 WHERE idbook= $idbook");
    }

    if(isset($_POST['save'])){
        foreach ($_POST['delete'] as $value)
        {
            delete($value);

        }
        //echo  "<script> alert('Đã xóa thành công !'); </script>";
    }
    ?>
</head>

<body>
<div id="manage_book">
    <div id="head_book"></div>
    <div id="h1">
        <h1>QUẢN LÝ SÁCH</h1>
        <form id="f1" action="index.php?admin=manage_book_insert" method="post">
            <button type="submit">THÊM</button>
        </form>

        <form id="f2" action="" method="post">
            <input type="text" name="find"/>
            <button>Tìm</button>
        </form>
    </div>
    <div id="h2">
        <form action="index.php?admin=manage_book" method="post">
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
            <button type="submit"><img src="../img/logo/icon_select.png" width="25px;"/> </button>
        </form>


    </div>
    <form action="index.php?admin=manage_book" method="post">
        <input type="submit" name="save" value="Xóa" id="save"/>
    <div id="main_manage_book">
        <table>
        <tr id="tt">
            <th id="stt">STT</td>
            <th id="img_book">Hình</th>
            <th id="name_book">Tên sách</th>
            <th id="author">Tác giả</th>
            <th id="price">Giá</th>
            <th id="delete"><input type="checkbox" name="" value=""/></th>
        </tr>
                <?php
                $sql="select * from book WHERE checkDelete=0";
                $kq=mysql_query($sql);
                $i=0;
                while($d=mysql_fetch_array($kq)){?>
                    <tr>
                        <td id="stt"><?php echo ++$i;?></td>
                        <td id="img_book"><a href="../admin/index.php?admin=manage_book_detail&idbook=<?php echo $d['idbook']; ?>"><img src="../img/<?php echo $d['imgdetail']; ?>" width="50px;" > </a></td>
                        <td id="name_book"><a href="../admin/index.php?admin=manage_book_detail&idbook=<?php echo $d['idbook']; ?>"><?php echo $d['name'] ?></a></td>
                        <td id="author">
                            <?php
                            $idauthor=$d['idauthor'];
                            $sqltg="select *from author WHERE idauthor=$idauthor";
                            $kqtg=mysql_query($sqltg);
                            $dtg=mysql_fetch_assoc($kqtg);
                            echo $dtg['name'];
                            ?>
                        </td>
                        <td id="price"><?php echo number_format($d['price']);?>đ</td>
                        <?php
                        if($d['checkDelete']==0){
                            echo '<td id="delete"><input type="checkbox" name="delete[]" value="'.$d['idbook'].'"/></td>';
                        }
                        ?>
                    </tr>
                    <?php
                }

                ?>


        </table>

    </div>

    </form>
    <div id="phantrang">
        <center><p>Phân trang</p></center>
    </div>

</div>


</body>
</html>