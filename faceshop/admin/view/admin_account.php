<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link href="css/admin_account.css" rel="stylesheet" type="text/css"/>
    <?php
    function delete($email){
    mysql_query("update account set checkDelete=1 WHERE email= '$email'");
    }

    if(isset($_POST['save'])){
        foreach ($_POST['delete'] as $value)
        {
        delete($value);
        }
        echo  "<script> alert('Đã xóa thành công !'); </script>";
    }
    ?>
</head>

<body>
<div id="manage_account">
    <div id="head_account"></div>
    <div id="h1">
        <h1>QUẢN LÝ TÀI KHOẢN</h1>
        <form id="f1" action="index.php?admin=manage_account_insert" method="post">
            <button type="submit">THÊM</button>
        </form>
        <form id="f2" action="" method="post">
            <input type="text" name="find"/>
            <button>Tìm</button>
        </form>
    </div>
    <form action="index.php?admin=manage_account" method="post">
        <input type="submit" value="Xóa" name="save" id="save"/>
    <table width="100%">
        <tr id="tt">
                <th id="delete"></th>
            <th id="stt">STT</td>
            <th id="name">Tên đăng nhập</th>
            <th id="email">Email</th>
            <th id="sex">Giới tính</th>
            <th id="tel">SĐT</th>
            <th id="city">Tỉnh/ Thành phố</th>
            <th id="address">Địa chỉ</th>
            <th id="district">Quận Huyện</th>    
        </tr>
    </table>
    <div id="main_manage_account">
        <table>
            <?php
            $sql="select * from account WHERE checkDelete=0";
            $kq=mysql_query($sql);
            $i=0;
            while($d=mysql_fetch_array($kq)){?>
                <tr>
                 <?php
                    if($d['checkDelete']==0){
                        echo '<td id="delete"><input type="checkbox" name="delete[]" value="'.$d['email'].'"/></td>';
                    }
                    ?>
                    <td id="stt"><?php echo ++$i;?></td>
                    <td id="name"><?php echo $d['name']; ?> </td>
                    <td id="email"><?php echo $d['email'] ?></td>
                    <td id="sex"><?php echo $d['sex'] ?></td>
                    <td id="tel"><?php echo $d['tel'];?></td>
                    <?php
                    $idcity = $d['idcity'];
                    $sqlcity = "select * from city WHERE idcity=$idcity";
                    $kqcity = mysql_query($sqlcity);
                    $dcity = mysql_fetch_array($kqcity);
                    ?>
                    <td id="city"><?php echo $dcity['name'] ?></td>
                    <td id="address"><?php echo $d['address'] ?></td>
                    <td id="district"><?php echo $d['district'] ?></td>                   
                </tr>
                <?php
            }
            ?>

        </table>

        </form>
    </div>
    <center><p>Phân trang</p></center>
</div>

</body>
</html>