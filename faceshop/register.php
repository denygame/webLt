<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>

<body>
<div id="register">
    <div id="register_left">
        <div id="title"><h5>Đăng ký tài khoản:</h5></div>
        <form action="" method="post">
            <h4>Thông tin đăng nhập</h4>
            <table>
                <tr>
                    <td id="k">
                        <label>Email (*)</label>
                    </td>
                    <td>
                        <input type="text" name="email" id="email"/>
                    </td>
                </tr>
                <tr>
                    <td id="k">
                        <label>Mật khẩu (*)</label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password"/>
                        <br>
                        <p>Nhập tối thiểu 6 ký tự</p>
                    </td>
                </tr>
                <tr>
                    <td id="k">
                        <label>Nhập lại mật khẩu (*)</label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password"/>
                    </td>
                </tr>
            </table>
            <h4>Thông tin khách hàng</h4>
            <table>
                <tr>
                    <td id="k">
                        <label>Họ và tên (*)</label>
                    </td>
                    <td>
                        <input type="text" name="hoten" id="hoten"/>
                    </td>
                </tr>
                <tr>
                    <td id="k">
                        <label>Giới tính (*)</label>
                    </td>
                    <td>
                        <select name="gioitinh">
                            <option>Lựa chọn giới tính</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td id="k">
                        <label>Điện thoại (*)</label>
                    </td>
                    <td>
                        <input type="text" name="sdt" id="sdt"/>
                    </td>
                </tr>
                <tr>
                    <td id="k">
                        <label>Tỉnh/Thành phố (*)</label>
                    </td>
                    <td>
                        <select name="city">
                            <option>--Chọn tỉnh/thành phố--</option>
                            <?php
                            $sql="select * from city";
                            $kq=mysql_query($sql);
                            while ($d=mysql_fetch_array(($kq)))
                            {?>
                                <option value="<?php echo $d['idcity'];?>"> <?php echo $d['name'];?> </option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td id="k">
                        <label>Quận/ Huyện (*)</label>
                    </td>
                    <td>
                        <input type="text" name="quan" id="quan"/>
                    </td>
                </tr>
                <tr>
                    <td id="k">
                        <label>Địa chỉ chi tiết (*)</label>
                    </td>
                    <td>
                        <input type="text" name="address" id="address"/>
                    </td>
                </tr>
                <tr>
                    <td id="k">
                        <label>Nick Yahoo </label>
                    </td>
                    <td>
                        <input type="text" name="yahoo" id="yahoo"/>
                    </td>
                </tr>
                <tr>
                    <td id="k">
                        <label>Nick Skype </label>
                    </td>
                    <td>
                        <input type="text" name="skype" id="skype"/>
                    </td>
                </tr>
                <tr>
                    <td id="k">
                        <label>Câu hỏi chống spam </label>
                    </td>
                    <td>
                        <input type="text" name="question" id="question"/>
                    </td>
                </tr>
                <tr>
                    <td id="k">
                        <label>Nhập câu trả lời</label>
                    </td>
                    <td>
                        <input type="text" name="answer" id="answer"/>
                    </td>
                </tr>
                <tr>
                    <td id="k"></td>
                    <td id="sub">
                        <br>
                        <input type="submit" value="Đăng ký"/><input type="reset" value="Làm lại"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div id="register_right">

    </div>
</div>
</body>
</html>