<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/admin_category.css"/>
  <title>Untitled Document</title>
</head>

<body >
  <div style="padding-top: 10px;padding-left: 10px;">
    <?php if(isset($_POST['ten'])){
      $ten=$_POST['ten'];
      $rowSQL = mysql_query( "SELECT idcategory FROM `category`;" );
      $id = 1;
      while($row = mysql_fetch_array( $rowSQL ))
      {
        if($row['idcategory']!=$id)
        {
          break;
        }
        $id++;
      }
      $query="INSERT Category values('".$id."','".$ten."',0)";
      mysql_query($query);	
    }
    ?>
    <?php if(isset($_POST['suaten'])){
      $suaten=$_POST['suaten'];
      $id=$_POST['idcategory'];
      mysql_query( "update category set name='".$suaten."' where idcategory=".$id );	
    }
    ?>
    <?php 
    if (isset($_POST['btn_xoa']))
    {
      foreach ($_POST['check_box'] as $value) {
       mysql_query('update db_type set checkDelete=1 where idcategory='.$value);
      mysql_query('update category set checkDelete=1 where idcategory='.$value);
      }
    }
    ?>
    <h1 style="color:#0080C0;margin-left:10%"  >Quản lý Category</h1>   
<!-- <div  style="height:30px;clear:both;margin:10px 0;">
  <a class="all" href="index.php?admin=manage_category&check=0">Danh mục</a>
  <a class="deleted" href="index.php?admin=manage_category&check=1"><img src="view/trash.png" width="25" height="25" /></a>
</div> -->
 <button id="btn_them" onclick="hien_form_them()">Thêm</button>
<form name="" action="index.php?admin=manage_category" method="post"> 
<input class="btn_xoa" type="submit" name="btn_xoa" value="Xóa"/>
<table width="80%" border="1" style="margin:auto;clear:both">
  <tr>
  <th  style="height:30px;"></th>
    <th style="height:30px;">IdCategory</th>
    <th style="height:30px;">Tên</th>
        <th  style="height:30px;">Sửa</th>    
  </tr>
  <?php 	
  $result = mysql_query('select * from `category` where checkDelete=0');
  if(mysql_num_rows($result)>0)
   while($d=mysql_fetch_array($result)){
    ?>
    <tr>
        <td><input style="margin-left:40%" type="checkbox" name="check_box[]" value="<?php echo $d['idcategory'] ?>"></td>
    <td style="height:30px;;text-align:center;"><?php echo $d['idcategory'];?></td>
    <td style="height:30px;;margin-left:5px;"><span ><?php echo $d['name'];?></span></td>
         <td style="text-align:center;height:30px;" onclick="hien_form('<?php echo $d['name'] ?>',<?php echo $d['idcategory']?>);"><span id="update">Update</span></td>
   <!--  <td style="text-align:center;height:30px;">
      <a  class="btn_xoa" href="index.php?admin=manage_category&xoa=<?php echo $d['idcategory']?>"><span>Xóa</span></a></td> --> 
    </tr>
    <?php }?>
  </table>
  </form>
  <div class="form">
    <span class="close">×</span>
    <div class="form2">
      <h1 style="margin-left:33%;color:white;">Cập nhật name</h1>
      <p style="margin-left:35%;">old name:<span id="oldname"></span></p>
      <form  style="margin-left:30%;" action="index.php?admin=manage_category" method="post">
        <label style="color:white;">New name</label>
        <input name="suaten" type="text" />
        <input id="idcate" name="idcategory" type="hidden" value="" /><br/>
        <input class=" button" name="" type="submit" value="Update" />
      </form>
    </div>
  </div>
  <div class="form">
    <span class="close">×</span>
    <div class="form2">
      <h1 style="color:white;">Thêm Category</h1>
      <form  action="index.php?admin=manage_category" method="post">
       <label>Tên category</label>
       <input name="ten" type="text" />
       <input  name="" type="submit" value="Them" />
     </form>
   </div>
 </div>
 <script type="text/javascript">
  function hien_form(name,id){	
    var hienform = document.getElementsByClassName('form')[0];
    hienform.style.display="block";
    document.getElementById('idcate').value=id;
    document.getElementById('oldname').innerHTML=name;
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() { 
      hienform.style.display = "none";
    }
  }
  function hien_form_them(){	
    var hienform2 = document.getElementsByClassName('form')[1];
    hienform2.style.display="block";
    var span2 = document.getElementsByClassName("close")[1];
    span2.onclick = function() { 
      hienform2.style.display = "none";
    }
  }

</script>
</div>
</body>
</html>