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
            <table>
                <tr>
                    <td  align="left"><img src="img/logo/icon_taikhoan.png" height="70px;"> </td>
                    <td>
                        <div  id="change_pass">
                            <a id="change_pass" style="border-style: none" id="t8">Thay đổi mật khẩu</a>
                        </div>
                    </td>
                    <td>
                        <div id="logout">
                            <form action="index.php?id=login" method="post">
                                <input style="border-style: none; height: 40px; font-size: 18px;" type="submit" name="logout" value="Đăng Xuất" id="logout" />
                            </form>
                        </div>
                    </td>
                </tr>
                <form action="" method="" >

                    <tr>
                        <td id="label"><label>Tên đăng nhập: </label></td>
                        <td id="values"><label><?php echo $d1['name']; ?></label></td>
                        <td id="update"> <a id="c1"><img src="img/logo/icon_update.png" height="30px"></a></td>
                    </tr>
                    <tr id="t1" style="display: none">
                        <td></td>
                        <td><input type="text" size="30" name="name" id="name"/></td>
                        <td id="save"><a class="save">Lưu</a></td>
                    </tr>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#c1").click(function(){
                                $("#t1").show();
                            });
                            $(".save").click(function(){
                                $("#t1").hide();
                            });
                        });
                    </script>

                    <tr>
                        <td id="label"><label>Email: </label></td>
                        <td id="values" ><label><?php echo $d1['email'];?></label></td>
                        <td id="update"> <a id="c2"><img src="img/logo/icon_update.png" height="30px"></a> </td>
                    </tr>
                    <tr id="t2" style="display: none">
                        <td></td>
                        <td><input type="text" size="30" name="email" id="email"/></td>
                        <td id="save"><a class="save">Lưu</a></td>
                    </tr>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#c2").click(function(){
                                $("#t2").show();
                            });
                            $(".save").click(function(){
                                $("#t2").hide();
                            });
                        });
                    </script>

                    <tr>
                        <td id="label"><label>Giới tính: </label></td>
                        <td id="values"><label><?php echo $d1['sex']?></label></td>
                        <td id="update"> <a id="c3"><img src="img/logo/icon_update.png" height="30px"></a> </td>
                    </tr>
                    <tr id="t3" style="display: none">
                        <td></td>
                        <td><input type="text" size="30" name="email" id="email"/></td>
                        <td id="save"><a class="save">Lưu</a></td>
                    </tr>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#c3").click(function(){
                                $("#t3").show();
                            });
                            $(".save").click(function(){
                                $("#t3").hide();
                            });
                        });
                    </script>

                    <tr>
                        <td id="label"><label>Số điện thoại: </label></td>
                        <td id="values"><label><?php echo $d1['tel']; ?></label></td>
                        <td id="update"> <a id="c4"><img src="img/logo/icon_update.png" height="30px"></a> </td>
                    </tr>
                    <tr id="t4" style="display: none">
                        <td></td>
                        <td><input type="text" size="30" name="email" id="email"/></td>
                        <td id="save"><a class="save">Lưu</a></td>
                    </tr>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#c4").click(function(){
                                $("#t4").show();
                            });
                            $(".save").click(function(){
                                $("#t4").hide();
                            });
                        });
                    </script>

                    <tr>
                        <td id="label"><label>Địa chỉ: </label></td>
                        <td id="values"> <label><?php echo $d1['address']?></label></td>
                        <td id="update"> <a id="c5"><img src="img/logo/icon_update.png" height="30px"></a> </td>
                    </tr>
                    <tr id="t5" style="display: none">
                        <td></td>
                        <td><input type="text" size="30" name="email" id="email"/></td>
                        <td id="save"><a class="save">Lưu</a></td>
                    </tr>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#c5").click(function(){
                                $("#t5").show();
                            });
                            $(".save").click(function(){
                                $("#t5").hide();
                            });
                        });
                    </script>

                    <tr>
                        <td id="label"><label>Quận/ Huyện: </label></td>
                        <td id="values"><label><?php echo $d1['district'] ?></label></td>
                        <td id="update"> <a id="c6"><img src="img/logo/icon_update.png" height="30px"></a> </td>
                    </tr>
                    <tr id="t6" style="display: none">
                        <td></td>
                        <td><input type="text" size="30" name="email" id="email"/></td>
                        <td id="save"><a class="save">Lưu</a></td>
                    </tr>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#c6").click(function(){
                                $("#t6").show();
                            });
                            $(".save").click(function(){
                                $("#t6").hide();
                            });
                        });
                    </script>

                    <tr>
                        <td id="label"><label>Tỉnh/ Thành phố: </label></td>
                        <td id="values"><label><?php echo $d1['city'] ?></label></td>
                        <td id="update"> <a id="c7"><img src="img/logo/icon_update.png" height="30px"></a> </td>
                    </tr>
                    <tr id="t7" style="display: none">
                        <td></td>
                        <td><select name="city">
                                <option>--Chọn tỉnh/thành phố--</option>
                                <?php
                                $sql="select * from city";
                                $kq=mysql_query($sql);
                                while ($d=mysql_fetch_array(($kq)))
                                {?>
                                    <option value="<?php echo $d['name'];?>"> <?php echo $d['name'];?> </option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td id="save"><a class="save">Lưu</a></td>
                    </tr>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#c7").click(function(){
                                $("#t7").show();
                            });
                            $(".save").click(function(){
                                $("#t7").hide();
                            });
                        });
                    </script>

                    <tr id="c8" style="display: none">
                        <td id="label"><label>Nhập mật khẩu cũ: </label></td>
                        <td id="values"><input type="password" size="30" value="<?php echo $d1['pass']; ?>"/></td>
                        <td></td>
                    </tr>
                    <tr id="c9" style="display: none">
                        <td id="label"><label>Nhập mật khẩu mới: </label></td>
                        <td id="values"><input type="password" size="30" name="new_pass" id="new_pass"/></td>
                        <td></td>
                    </tr>
                    <tr id="c10" style="display: none">
                        <td id="label"><label>Nhập lại mật khẩu mới: </label></td>
                        <td id="values"><input type="password" size="30" name="re_new_pass" id="re_new_pass"/></td>
                        <td></td>
                    </tr>
                    <tr id="c11" style="display: none">
                        <td></td>
                        <td><a id="t9">Lưu</a></td>
                    </tr>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#t8").click(function(){
                                $("#c8").show();
                                $("#c9").show();
                                $("#c10").show();
                                $("#c11").show();
                            });
                            $("#t9").click(function () {
                                $("#c8").hide();
                                $("#c9").hide();
                                $("#c10").hide();
                                $("#c11").hide();
                            })
                        });
                    </script>
                </form>
            </table>
            <?php
        }
    }
    ?>

</div>

</body>
</html>