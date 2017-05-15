<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/info_user.css"/>
</head>

<body>
<div id="info_user_show">
    <?php
    if(isset($_SESSION['email']))
    {?>
        <?php
        $email= $_SESSION['email'];
        $sql1="SELECT * FROM account WHERE email = '$email'";
        $kq1=mysql_query($sql1);
        while ($d1=mysql_fetch_array($kq1))
        {?>
        <table id="info">
            <td id="title" colspan="2"><b>THÔNG TIN CÁ NHÂN</b><a href="index.php?id=login&idlogin=user_update" style="float: right; color: blue"><i>Cập nhật</i></a> <img src="img/logo/book_update.png" style="float: right; width: 20px; margin-top: 11px;"/> </td>
            <tr>
                <td id="label"><label>Tên đăng nhập: </label></td>
                <td id="values" colspan="3"><label><?php echo $d1['name']; ?></label></td>
            </tr>

            <tr>
                <td id="label"><label>Email: </label></td>
                <td id="values" colspan="3" ><label><?php echo $d1['email'];?></label></td>
            </tr>

            <tr>
                <td id="label"><label>Giới tính: </label></td>
                <td id="values" colspan="3"><label><?php echo $d1['sex']?></label></td>
            </tr>

            <tr>
                <td id="label"><label>Số điện thoại: </label></td>
                <td id="values"colspan="3"><label><?php echo $d1['tel']; ?></label></td>
            </tr>

            <tr>
                <td id="label"><label>Ðịa chỉ: </label></td>
                <td id="values"colspan="3"> <label><?php echo $d1['address']?></label></td>
            </tr>

            <tr>
                <td id="label"><label>Quận/ Huyện: </label></td>
                <td id="values"colspan="3"><label><?php echo $d1['district'] ?></label></td>
            </tr>

            <tr>
                <td id="label"><label>Tỉnh/ Thành phố: </label></td>
                <td id="values"colspan="3"><label>
                        <?php
                        $sql_city="select * from city WHERE idcity=".$d1['idcity'];
                        $kq_city=mysql_query($sql_city);
                        while ($d_city=mysql_fetch_array($kq_city))
                        { echo $d_city['name'];} ?></label></td>
            </tr>
        </table>
    <?php }
    }?>
</div>
</body>
</html>