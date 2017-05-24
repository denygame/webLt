<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="js/register.js"></script>

</head>

<body>
    <div id="register">
        <div id="register_left">
            <div id="title"><h5>ĐĂNG KÝ TÀI KHOẢN</h5></div>
            <form action="index.php?id=login" method="post" id="register_form">
                <h4 style="margin-top: 10px;">Thông tin đăng nhập</h4>
                <table>

                    
                    <tr>
                        <td id="k">
                            <label>Email (<font color="red">*</font>)</label>
                        </td>
                        <td>
                            <input type="text" name="email" id="email" autocomplete='off' />
                        </td>
                    </tr>


                    <tr id="tEmailHave" class="t">
                        <td></td>
                        <td>Email đã có trong hệ thống!!!</td>
                    </tr>

                    <tr id="tEmail" class="t">
                        <td></td>
                        <td>Email không hợp lệ (ví dụ: abc@gmail.com)</td>
                    </tr>

                    <tr>
                        <td id="k">
                            <label>Mật khẩu (<font color="red">*</font>)</label>
                        </td>
                        <td>
                            <input type="password" name="password" id="password"/>
                            <br>
                        </td>
                    </tr>
                    <tr id="t">
                        <td></td>
                        <td>Nhập tối thiểu 6 ký tự</td>
                    </tr>
                    <tr>
                        <td id="k">
                            <label>Nhập lại mật khẩu (<font color="red">*</font>)</label>
                        </td>
                        <td>
                            <input type="password" name="rePass" id="rePass"/>
                        </td>
                    </tr>
                    <tr id="tRepass" class="t">
                        <td></td>
                        <td>Password nhập lại chưa đúng</td>
                    </tr>

                </table>
                <h4 style="margin-top: 10px;">Thông tin khách hàng</h4>
                <table>
                    <tr>
                        <td id="k">
                            <label>Họ và tên (<font color="red">*</font>)</label>
                        </td>
                        <td>
                            <input type="text" name="hoten" id="hoten" autocomplete="off"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="k">
                            <label>Giới tính (<font color="red">*</font>)</label>
                        </td>
                        <td>
                            <select name="gioitinh" id="gioitinh">
                                <option disabled selected hidden>--Lựa chọn giới tính--</option>
                                <option value="Male">Nam</option>
                                <option value="Female">Nữ</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="tSex" class="t">
                        <td></td>
                        <td>Bạn phải chọn giới tính</td>
                    </tr>


                    <tr>
                        <td id="k">
                            <label>Điện thoại (<font color="red">*</font>)</label>
                        </td>
                        <td>
                            <input type="text" name="sdt" id="sdt" autocomplete="off" onKeyPress="return isNumberKey(event);"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="k">
                            <label>Tỉnh/Thành phố (<font color="red">*</font>)</label>
                        </td>
                        <td>
                            <select name="city" id="city">
                                <option disabled selected hidden>--Chọn tỉnh/thành phố--</option>
                                <?php require_once'controller/CityController.php'; $city=new CityController();
                                $result=$city->getCitys();
                                while ($d=mysql_fetch_array(($result))) { ?>
                                <option value="<?php echo $d['idcity'];?>"> <?php echo $d['name'];?> </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr id="tCity" class="t">
                        <td></td>
                        <td>Bạn phải chọn tỉnh thành phố</td>
                    </tr>


                    <tr>
                        <td id="k">
                            <label>Quận/ Huyện (<font color="red">*</font>)</label>
                        </td>
                        <td>
                            <input type="text" name="quan" id="quan" autocomplete="off"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="k">
                            <label>Địa chỉ chi tiết (<font color="red">*</font>)</label>
                        </td>
                        <td>
                            <input type="text" name="address" id="address" autocomplete="off"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="k"></td>
                        <td id="sub">
                            <br>
                            <input type="submit" onclick="submitForm();" value="Đăng ký"/><input type="submit" value="Hủy" onclick="chgAction();" />
                        </td>
                    </tr>
                    <tr></tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>