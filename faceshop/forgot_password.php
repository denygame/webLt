<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/forgot_password.css"/>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

</head>

<body>
<div id="forgot_password">
    <div id="title">QUÊN MẬT KHẨU</div>
    <table>
        <form action="index.php?id=forgot_password" method="post">
            <tr>
                <td id="label"><label>Email <font color="red">*</font> </label></td>
                <td id="values"><input type="text" name="email" id="email" placeholder="example@gmail.com"/></td>
            </tr>
            <tr id="1" style="display: none">
                <td id="label">Mã xác nhận  <font color="red">*</font></td>
                <td id="values"><input type="text"  name="password"/></td>
            </tr>
            <tr id="2" style="display: none">
                <td id="label"></td>
                <td id="values"><a href="">Gửi lại mã xác nhận</a> </td>
            </tr>
            <tr id="3">
                <td colspan="2" align="center"><button>Gửi mã</button> <a href="index.php?id=login" >Hủy</a></td>
            </tr>
            <tr id="4" style="display: none">
                <td colspan="2" align="center"><button>Xác nhận</button> <a href="index.php?id=login">Hủy</a></td>
            </tr>
        </form>
    </table>
</div>

</body>
</html>