<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link type="text/css" rel="stylesheet" href="css/admin_account_insert.css"/>

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="js/admin_account_insert.js"></script>
</head>

<body>

<div id="admin_account_insert">
    <form action="index.php?admin=manage_account_insert" method="post" id="frmInsert">
        <table>
            <h1>THÊM TÀI KHOẢN</h1>
            <tr>
                <td id="label">Tên đăng nhập:</td>
                <td id="values"><input type="text" id="name"/></td>
            </tr>
            <tr>
                <td id="label">Email:</td>
                <td id="values"><input type="text" id="email"/></td>
            </tr>
            <tr>
                <td id="label">Password: </td>
                <td id="values"><input type="password" id="password"/></td>
            </tr>
            <tr>
                <td id="label">Giới tính:</td>
                <td id="values"><input type="text" id="sex"/></td>
            </tr>
            <tr>
                <td id="label">Số điện thoại:</td>
                <td id="values"><input type="text" id="tel"/></td>
            </tr>
            <tr>
                <td id="label">Tỉnh/ Thành phố:</td>
                <td id="values">
                    <select name="city" id="city">
                      <option disabled selected hidden>-- Chọn tỉnh/thành phố-- </option>
                      <?php require_once $_SERVER['DOCUMENT_ROOT'].'/faceshop/controller/CityController.php'; $city=new CityController();
                      $result=$city->getCitys();
                      while ($d=mysql_fetch_array(($result))) { ?>
                        <option value="<?php echo $d['idcity'];?>"> <?php echo $d['name'];?> </option>
                        <?php } ?>
                      </select>
                </td>
            </tr>
            <tr>
                <td id="label">Địa chỉ:</td>
                <td id="values"><input type="text" id="address"/></td>
            </tr>
            <tr>
                <td id="label">Quận/ Huyện:</td>
                <td id="values"><input type="text" id="district"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center" id="btn">
                    <button type="submit" name="btn"  onclick="insert();">Thêm</button>
                    <a href="index.php?admin=manage_account">Hủy</a>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
