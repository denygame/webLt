<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link type="text/css" rel="stylesheet" href="css/admin_account_insert.css"/>
    <script type="text/javascript">

    </script>
</head>

<body>
<div id="admin_account_insert">
    <form action="admin_account.php" method="post">
        <table>
            <h1>THÊM TÀI KHOẢN</h1>
            <tr>
                <td id="label">Tên đăng nhập:</td>
                <td id="valuse"><input type="text" name="name"/></td>
            </tr>
            <tr>
                <td id="label">Email:</td>
                <td id="valuse"><input type="text" name="email"/></td>
            </tr>
            <tr>
                <td id="label">Password: </td>
                <td id="valuse"><input type="password" name="pass"/></td>
            </tr>
            <tr>
                <td id="label">Giới tính:</td>
                <td id="valuse"><input type="text" name="sex"/></td>
            </tr>
            <tr>
                <td id="label">Số điện thoại:</td>
                <td id="valuse"><input type="date" name="ngayxb"/></td>
            </tr>
            <tr>
                <td id="label">Tỉnh/ Thành phố:</td>
                <td id="valuse">
                    <select name="city">
                        <option >--chọn tỉnh/ thành phố--</option>
                        <?php
                            $sql="select * from city";
                            $kq=mysql_query($sql);
                            while ($d=mysql_fetch_array($kq)){
                                ?>
                                <option value="<?php echo $d['idcity']; ?>"><?php echo $d['name'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td id="label">Địa chị:</td>
                <td id="valuse"><input type="text" name="address"/></td>
            </tr>
            <tr>
                <td id="label">Quận/ Huyện:</td>
                <td id="valuse"><input type="number" name="district"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center" id="btn">
                    <button type="submit" name="btn">Thêm</button>
                    <a href="index.php?admin=manage_account">Hủy</a>
                </td>
            </tr>
        </table>

    </form>


</div>
</body>
</html>