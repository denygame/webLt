<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="css/user_update.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="user_update">
        <?php
        if(isset($_SESSION['email']))
            {?>
        <?php
        $email= $_SESSION['email'];
        $sql1="SELECT * FROM account WHERE email = '$email'";
        $kq1=mysql_query($sql1);
        while ($d1=mysql_fetch_array($kq1))
            {?>
        <form action="index.php?id=login&idlogin=info_user" method="post">
        <table id="info">
            <td id="title" colspan="2"><b>CẬP NHẬT THÔNG TIN</b></td>
            <tr>
                <td id="label"><label>Email: </label></td>
                <td id="values" colspan="3" ><label><?php echo $d1['email'];?></label></td>
            </tr>
            <tr>
                <td id="label"><label>Tên đăng nhập: </label></td>
                <td id="values" colspan="3"><input type="text" value="<?php echo $d1['name']; ?>"/></td>
            </tr>

            <tr>
                <td id="label">
                    <label>Giới tính</label>
                </td>
                <td id="values">
                    <select name="gioitinh" id="gioitinh">
                        <option disabled selected hidden>--Lựa chọn giới tính--</option>
                        <option value="Male">Nam</option>
                        <option value="Female">Nữ</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td id="label"><label>Số điện thoại: </label></td>
                <td id="values"colspan="3"><input value="<?php echo $d1['tel']; ?>" type="text"/></td>
            </tr>

            <tr>
                <td id="label"><label>Ðịa chỉ: </label></td>
                <td id="values"colspan="3"> <input value="<?php echo $d1['address']?>" type="text"/></td>
            </tr>

            <tr>
                <td id="label"><label>Quận/ Huyện: </label></td>
                <td id="values"colspan="3"><input value="<?php echo $d1['district'] ?>" type="text"/></td>
            </tr>

            <tr>
                <td id="label"><label>Tỉnh/ Thành phố</label></td>
                <td id="values">
                    <select name="city">
                        <option value="<?php echo $d1['idcity'];?>">
                            <?php
                            $sql_city="select * from city WHERE idcity=".$d1['idcity'];
                            $kq_city=mysql_query($sql_city);
                            while ($d_city=mysql_fetch_array($kq_city)){ echo $d_city['name'];}?>
                        </option>
                        <?php
                        $sql_city="select * from city";
                        $kq_city=mysql_query($sql_city);
                        while ($d_city=mysql_fetch_array($kq_city)){
                            if($d_city['idcity']!=$d1['idcity']){ ?>
                            <option value="<?php echo $d_city['idcity'];?>"> <?php echo $d_city['name'];?></option>
                            <?php } }?>
                        </select>
                    </td>
                </tr>
            <tr>
                <td id="label"></td>
                <td id="values">
                    <button type="submit">Lưu</button>
                    <button type="submit">Hủy</button>
                </td>
            </tr>
            </table>
        </form>
            <?php }
        }?>


    </div>
</body>
</html>