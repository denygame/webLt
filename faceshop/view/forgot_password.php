    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/forgot_password.css"/>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="js/forgotPass.js"></script>
    <?php require_once 'controller/OrderController.php'; $o = new OrderController(); $o->unsetSessionMoney(); ?>
</head>

<body>
    <div id="forgot_password">
        <div id="title">QUÊN MẬT KHẨU</div>
        <table>
            <tr>
                <td id="label"><label>Email <font color="red">*</font> </label></td>
                <td id="values"><input type="text" name="email" id="email" placeholder="example@gmail.com" autocomplete="off" /></td>
            </tr>
            <tr id="tEmailHave" class="t">
                <td  colspan="2">Email không có trong hệ thống!!!</td>
            </tr>
            <tr id="tEmail" class="t">
                <td colspan="2">Email không hợp lệ (ví dụ: abc@gmail.com)</td>
            </tr>
            <tr id="3">
                <td colspan="2" align="center">
                    <button onclick="btnClick();" id="btn">Gửi mã</button>
                    <button><a href="index.php?id=login" style="color:white;"> Hủy </a></button>
                </td>
            </tr>
            <tr id="tTB">
                <td colspan="2">Kiểm tra email để lấy mật khẩu mới</td>
            </tr>
            <tr id="call_back">
                <td colspan="2"><a href="index.php?id=login">Quay lại trang đăng nhập</a></td>
            </tr>
        </table>
    </div>

</body>
</html>
