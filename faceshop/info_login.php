<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/info_login.css"/>
</head>

<body>
<?php
    if(isset($_SESSION['email']))
    {
        $email= $_SESSION['email'];
        $sql1="SELECT * FROM account WHERE email = '$email'";
        $kq1=mysql_query($sql1);
        while ($d1=mysql_fetch_array($kq1))
        {
            ?>
            <div id="info_login_show">
                <table>
                    <tr id="title"><td colspan="2"><b>THÔNG TIN ĐĂNG NHẬP</b></td></tr>
                    <tr>
                        <td id="label">Tên đăng nhập</td>
                        <td id="values"><b><?php echo $d1['name']; ?></b></td>
                    </tr>
                    <tr>
                        <td id="label">Email đăng nhập</td>
                        <td id="values"><b><?php echo $d1['email']; ?></b></td>
                    </tr>
                    <tr>
                        <td id="label">Số điện thoại</td>
                        <td id="values"><b><?php echo $d1['tel']; ?></b></td>
                    </tr>
                    <tr>
                        <td id="label">Mật khẩu</td>
                        <td id="values"><label><?php echo $d1['pass']?></label></td>
                    </tr>
                </table>
            </div>

            <?php
        }
    }
?>
</body>
</html>