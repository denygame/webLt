<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/delete_account.css"/>
</head>

<body>
<form action="index.php?admin=manage_delete" method="post">
    <input type="submit" value="Khôi phục" id="save" name="btnaccount" />
    <table>
        <tr>
            <th id="check"></th>
            <th id="name">Tên đăng nhập</th>
            <th id="email">Email</th>
            <th id="sex">Giới tính</th>
            <th id="tel">Số điện thoại</th>
            <th id="city">Tỉnh/ Thành phố</th>
            <th id="address">Địa chỉ</th>
            <th id="district">Quận/ Huyện</th>
        </tr>
        <?php
        $i=0;
        $kq=mysql_query("select * from account WHERE  checkDelete =1");
        while ($d=mysql_fetch_array($kq))
        {
            $i++;
            ?>
            <tr>
                <td><input type="checkbox" name="restoreA[]" value="<?php echo $d['email'] ?>"/></td>
                <td id="name"><?php echo $d['name']; ?> </td>
                <td id="email"><?php echo $d['email'] ?></td>
                <td id="sex"><?php echo $d['sex'] ?></td>
                <td id="tel"><?php echo $d['tel'];?></td>
                <?php
                $idcity = $d['idcity'];
                $sqlcity = "select * from city WHERE idcity=$idcity";
                $kqcity = mysql_query($sqlcity);
                $dcity = mysql_fetch_array($kqcity);
                ?>
                <td id="city"><?php echo $dcity['name'] ?></td>
                <td id="address"><?php echo $d['address'] ?></td>
                <td id="district"><?php echo $d['district'] ?></td>
            </tr>
            <?php
            if($i==0){
                //echo "<script> alert('Không có tài khoản nào trong thùng rác !!!')</script>";
            }
        }
        ?>

    </table>
</form>

</body>
</html>