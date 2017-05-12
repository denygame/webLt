<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
   <link rel="stylesheet" href="css/profile.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

</head>

<body>

<div id="profile">
    <?php
    if(isset($_SESSION['email']))
    {
        $email= $_SESSION['email'];
        $sql1="SELECT * FROM account WHERE email = '$email'";
        $kq1=mysql_query($sql1);
        while ($d1=mysql_fetch_array($kq1))
        {?>
            <table id="info" style="display: none">
                <tr>
                    <td  align="left"><img src="img/logo/icon_taikhoan.png" height="70px;"> </td>
                    <th>
                        <div  id="change_pass">
                            <button id="change_pass" id="t8">Thay đổi mật khẩu</button> 
                        </div>
                    </th>

                    <th>
                        <div id="update_info">
                            <button id="update_info">Cập nhật thông tin cá nhân</button>
                        </div>
                    </th>

                    <th>
                        <div id="logout">
                            <form action="index.php?id=login" method="post">
                                <button type="submit" name="logout" id="logout">Đăng Xuất</button>
                            </form>
                        </div>
                    </th>
                </tr>

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
                    <td id="label"><label>Địa chỉ: </label></td>
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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="index.php?id=list_bill"> << Xem danh sách các đơn hàng >> </a></td>
                </tr>
            </table>

            <table id="change_pass_ac" style="display: none">
                <form action="index.php?id=login" method="post">
                    <tr>
                        <th colspan="3">Thay đổi mật khẩu</th>
                    </tr>
                    <tr >
                        <td id="label"><label>Nhập mật khẩu cũ: </label></td>
                        <td id="values" colspan="3"><input type="password" size="30" value="<?php echo $d1['pass']; ?>"/></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td id="label"><label>Nhập mật khẩu mới: </label></td>
                        <td id="values" colspan="3"><input type="password" size="30" name="new_pass" id="new_pass"/></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td id="label"><label>Nhập lại mật khẩu mới: </label></td>
                        <td id="values" colspan="3"><input type="password" size="30" name="re_new_pass" id="re_new_pass"/></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button id="save" >Lưu thay đổi</button>
                            <a href="index.php?id=login"><button>Hủy</button></a>
                        </td>
                        <td> </td>
                    </tr>
                </form>
            </table>

            <table id="update_info_ac" style="display: none">
                <form action="index.php?id=login" method="post">
                    <tr>
                        <th colspan="3">Cập nhật thông tin cá nhân</th>
                    </tr>
                    <tr>
                        <td colspan="3" align="left"><img src="img/logo/icon_taikhoan.png" height="70px;"> </td>
                    </tr>
                    <tr>
                        <td><label>Tên đăng nhập</label></td>
                        <td colspan="2"><input type="text" value="<?php echo $d1['name']; ?>"/></td>
                    </tr>

                    <tr>
                        <td><label>Email</label></td>
                        <td colspan="2"><input type="text" value="<?php echo $d1['email']; ?>"/></td>
                    </tr>

                    <tr>
                        <td><label>Giới tính</label></td>
                        <td colspan="2">
                            <select name="sex">
                                <option value="<?php echo $d1['sex'];?>"><?php echo $d1['sex'];?></option>
                                <?php
                                $sql_sex="select * from sex";
                                $kq_sex=mysql_query($sql_sex);
                                while ($d_sex=mysql_fetch_array($kq_sex)){
                                    if($d_sex['sex']!=$d1['sex']){ ?>
                                <option value="<?php echo $d_sex['sex'];?>"> <?php echo $d_sex['sex'];?></option>
                                    <?php } }?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label>Số điện thoại</label></td>
                        <td colspan="2"><input type="text" value="<?php echo $d1['tel']; ?>"/></td>
                    </tr>

                    <tr>
                        <td><label>Địa chỉ</label></td>
                        <td colspan="2"><input type="text" value="<?php echo $d1['address']; ?>"/></td>
                    </tr>

                    <tr>
                        <td><label>Quận/ Huyện</label></td>
                        <td colspan="2"><input type="text" value="<?php echo $d1['district']; ?>"/></td>
                    </tr>

                    <tr>
                        <td><label>Tỉnh/ Thành phố</label></td>
                        <td>
                            <select name="sex">
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
                        <td></td>
                        <td>
                            <button id="save">Lưu thay đổi</button>
                            <button id="reset" type="reset">Làm lại</button>
                            <a href="index.php?id=login"><button>Hủy</button></a>
                        </td>
                    </tr>
                </form>
            </table>
            <?php
        }
    }
    ?>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#info").show();
        $("#change_pass").click(function () {
            $("#info").hide();
            $("#change_pass_ac").show();
        })
        $("#change_pass_ac #save").click(function () {
            alert("Đổi mật khẩu thành công!!!");
        })
        $("#update_info").click(function () {
            $("#info").hide();
            $("#update_info_ac").show();
        })
        $("#update_info_ac #save").click(function () {
            alert("Lưu thay đổi thành công!!!");
        })
        $("#update_info_ac #reset").click(function () {
            $("#update_info_ac").show();
        })
    })
</script>
</body>
</html>