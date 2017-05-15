<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link href="css/change_pw.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="change_pw_show">
    <?php
    if(isset($_SESSION['email']))
    {?>
        <?php
        $email= $_SESSION['email'];
        $sql1="SELECT * FROM account WHERE email = '$email'";
        $kq1=mysql_query($sql1);
        while ($d1=mysql_fetch_array($kq1))
        {?>
            <table>
                <form action="index.php?id=login" method="post">
                    <tr id="title">
                        <td colspan="3" STYLE="font-size: 20PX;"><b>THAY ĐỔI MẬT KHẨU</b></td>
                    </tr>
                    <tr >
                        <td id="label"><label>Mật khẩu hiện tại: </label></td>
                        <td id="values" colspan="3"><input type="password" size="30" value="<?php echo $d1['pass']; ?>"/></td>
                    </tr>
                    <tr>
                        <td id="label"><label>Nhập mật khẩu mới: </label></td>
                        <td id="values" colspan="3"><input type="password" size="30" name="new_pass" id="new_pass"/></td>
                    </tr>
                    <tr>
                        <td id="label"><label>Nhập lại mật khẩu: </label></td>
                        <td id="values" colspan="3"><input type="password" size="30" name="re_new_pass" id="re_new_pass"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button id="save" >Lưu</button>
                            <a href="index.php?id=login" id="huy">Hủy</a>
                        </td>
                    </tr>
                </form>
            </table>


        <?php
        }
    }?>
</div>
</body>
</html>