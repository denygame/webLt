<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/delete_category.css"/>
</head>

<body>
<form action="index.php?admin=manage_delete" method="post">
    <input type="submit" value="Khôi phục" id="save" name="btncategory" />
    <table>
        <tr>
            <th id="check"></th>
            <th id="id">IdCategory</th>
            <th id="name">Tên danh mục</th>
        </tr>
        <?php
        $i=0;
        $kq=mysql_query("select * from category WHERE  checkDelete =1");
        while ($d=mysql_fetch_array($kq))
        {
            $i++;
            ?>
            <tr>
                <td id="check"><input type="checkbox"  name="restoreC[]" value="<?php echo $d['idcategory']?>"/></td>
                <td id="id"><?php echo $d['idcategory'] ?></td>
                <td id="name"><?php echo $d['name'] ?></td>
            </tr>
            <?php
        }
        if($i==0){
            //echo "<script> alert('Không có danh mục nào trong thùng rác !!!')</script>";
        }
        ?>

    </table>
</form>

</body>
</html>