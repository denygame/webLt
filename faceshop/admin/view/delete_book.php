<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/delete_book.css"/>

</head>

<body>
<form action="index.php?admin=manage_delete" method="post">
    <input type="submit" value="Khôi phục" id="save" name="btnbook" />
    <table>
        <tr>
            <th id="check"></th>
            <th id="img">Hình</th>
            <th id="name_book">Tên sách</th>
            <th id="author">Tên tác giả</th>
            <th id="price">Giá</th>
        </tr>
        <?php
        $i=0;
        $kq=mysql_query("select * from book WHERE  checkDelete =1");
        while ($d=mysql_fetch_array($kq))
        {
            $i++;
            ?>
            <tr>
                <td id="check"><input type="checkbox"  name="restoreB[]" value="<?php echo $d['idbook']?>"/></td>
                <td id="img"> <a href="../admin/index.php?admin=manage_book_detail&idbook=<?php echo $d['idbook']; ?>"><img src="../img/<?php echo $d['imgdetail'] ?>"/></a></td>
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
                <td id="price"><?php echo number_format($d['price']) ?>đ</td>
            </tr>
        <?php
        }
        if($i==0){
            //echo "<script> alert('Không có sách nào trong thùng rác !!!')</script>";
        }
        ?>

    </table>
</form>

</body>
</html>