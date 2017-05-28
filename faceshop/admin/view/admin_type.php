<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/admin_type.css"/>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

	<title>Untitled Document</title>
	<script type="text/javascript">
		function toggle(source) {
			var checkboxes = document.querySelectorAll('input[type="checkbox"]');
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i] != source)
					checkboxes[i].checked = source.checked;
			}
		}
	</script>
</head>

<body>
	<div style="padding-top: 10px;padding-left: 10px;">
		<?php 
		$sodong=10;
		if (!isset($_GET["p"]))
		{ 
			$p=1;
		}
		else
		{
			$p=intval($_GET["p"]);
		}
		$x=($p-1)*$sodong;
		?>	
		<!-- thêm idtype -->
		<?php if(isset($_POST['ten'])){
			$ten=$_POST['ten'];
			$idcategory=$_POST['idcategory'];
			$rowSQL = mysql_query( "SELECT idtype FROM `db_type`;" );
			$id = 1;
			while($row = mysql_fetch_array( $rowSQL ))
			{
				if($row['idtype']!=$id)
				{
					break;
				}
				$id++;
			}
			$query="INSERT db_type values(".$id.",'".$ten."',".$idcategory.",0)";
			mysql_query($query);	
		}
		?>
		<!-- sửa idtype -->		
		<?php if(isset($_POST['suaten'])){
			$suaten=$_POST['suaten'];
			$id=$_POST['idtype'];
			$idcategory=$_POST['idcategory'];
			mysql_query( "update db_type set name='".$suaten."',idcategory=".$idcategory." where idtype=".$id );	
		}
		?>
		<!-- xóa idtype -->
		<?php 
		if (isset($_POST['btn_xoa']))
		{
			if(isset($_POST['check_box']))
				foreach ($_POST['check_box'] as $value) {
					mysql_query('update db_type set checkDelete=1 where idtype='.$value);
				}
			}			
			?>
			<h1 style="color:#23282d;float: left;font-family: Arial, Helvetica, sans-serif;"  >QUẢN LÝ THỂ LOẠI</h1>
			<button id="btn_them" onclick="hien_form_them()">Thêm</button>  <!-- nút thêm-->
			<form name="" action="index.php?admin=manage_type" method="post"> 			
				<input class="btn_xoa" type="submit" name="btn_xoa" value="Xóa"/>	
				<table width="70%" style="border-collapse: collapse;clear:both;margin-top:12px;">
					<tr style="border:1px solid #CCC;background-color: #CCC">
						<td   style="text-align:center;height:30px;"><input type="checkbox" onclick="toggle(this)" name=""></td>
						<td style="text-align:center;height:30px;">IdType</td>
						<td style="height:30px;padding-left: 10px;"  >Tên</td>
						<td   style="text-align:center;height:30px;">IdCategory</td>	
						<td   style="text-align:center;height:30px;">sửa</td>
					</tr>
					<?php 	
					$result = mysql_query('select * from `db_type` where checkDelete=0 limit '.$x.','.$sodong);$dem=0;
					if(mysql_num_rows($result)>0)
						while($d=mysql_fetch_array($result)){
							?>
							<tr  style=" border:1px solid #CCC;color:#00a0d2;font-weight: 500; <?php if($dem%2==0) echo 'background-color: #FFF'?> ">
								<td><input style="margin-left:30%;height:30px;" type="checkbox" name="check_box[]" value="<?php echo $d['idtype'] ?>"></td>
								<td style="text-align:center;height:30px;" ><?php echo $d['idtype'];?></td>
								<td  style=";height:30px;padding-left: 10px;"><?php echo $d['name'];?></td>
								<td  style="text-align:center;height:30px;" ><?php echo $d['idcategory'];?></td>			
								<?php 
								$kq=mysql_query("select name as ten from category where idcategory=".$d['idcategory']);
								$ten=mysql_fetch_assoc($kq)['ten'];
								?>
								<th   onclick="hien_form('<?php echo $d['name'] ?>',<?php echo $d['idtype']?>,'<?php echo $ten; ?>');"><span id="update">Update</span></th>					
							</tr>
							<?php $dem++;}?>
						</table>
					</form>

					<div class="form">
						<span class="close">×</span>
						<div class="form2">
							<h1 style="margin-left:33%;color:red;">Cập nhật idtype</h1>
							<p style="margin-left:35%;font-size: 18px;">old name:<span id="oldname"></span></p>
							<p style="margin-left:35%;font-size: 18px;">old idcategory:<span id="oldid"></span></p>
							<form  style="text-align: center;" action="index.php?admin=manage_type" method="post">
								<label style="color:red;margin-left:-1.5%">Updates name</label>
								<input style="width:170px;margin-left:5	%" name="suaten" type="text" /><div style="height:10px;"></div>
								<label style="color:red;margin-left:-0.75%">Update idcategory</label>
								<select name="idcategory" >
									<?php 						
									$kq=mysql_query("select * from category where checkDelete=0");
									while($d=mysql_fetch_array($kq)){?>
									<option <?php if($ten==$d['name']) echo "selected"?> value="<?php echo $d['idcategory']?>"><?php echo $d['name']?></option>
									<?php } ?>	
								</select>						
								<input id="idtype" name="idtype" type="hidden" value="" /><br/>
								<input class=" btn_them" name="" type="submit" value="Update" />
							</form>
						</div>
					</div>

					<div class="form">
						<span class="close">×</span>
						<div class="form2">
							<h1 style="color:red;text-align: center;">Thêm Type</h1>
							<form  style="text-align: center;" action="index.php?admin=manage_type" method="post">
								<label style="color:red;">Tên Type</label>
								<input name="ten" type="text" /><div style="height:10px;"></div>
								<label style="color:red;margin-left:-4%">Loại idcategory</label>
								<select name="idcategory" >
									<?php 
									$kq=mysql_query("select * from category where checkDelete=0");
									while($d=mysql_fetch_array($kq)){?>
									<option value="<?php echo $d['idcategory']?>"><?php echo $d['name']?></option>
									<?php } ?>
								</select>
								<div style="height:10px;"></div>
								<input class="btn_them" name="" type="submit" value="Them" />

							</form>
						</div>
					</div>
					<script type="text/javascript">
						function hien_form(name,id,idcategory){	
							var hienform = document.getElementsByClassName('form')[0];
							hienform.style.display="block";
							document.getElementById('idtype').value=id;
							document.getElementById('oldname').innerHTML=name;
							document.getElementById('oldid').innerHTML=idcategory;
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
								hienform2.style.display="none";
							}
						}			
					</script>
				</div>
			</body>
			</html>