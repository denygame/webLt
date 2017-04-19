<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
*{ margin:0; padding:0;}
#container{ width:100%; }
#header{ width:100%; min-height:150px; margin-bottom:25px; position:relative; z-index:2;}
#main{ width:1050px; clear:both; margin:auto; margin-bottom:300px; position:relative; z-index:1;}
#footer{ width:100%; clear:both;}
</style>
</head>

<body>

<div id="container">
	<div id="header"> <?php include'head.php'?></div>
    <div id="main"> 
    	<?php 
			if(!isset($_GET['id']))
			{ include'main_home.php';}
			else
			{
				$id=$_GET['id'];
				
				switch($id)
				{
					case'trangchu': include'main_home.php'; break;
					case'sach':include'main_sach.php'; break;
					case'danhmuc':include'main_danhmuc.php'; break;
					default : echo'<div style="text-align:center; font-size:50px; height:63px;">Không có thông tin về trang này.</div>'; break;
				}
			}
		?>
    </div>
    <div id="footer"><?php include'foot.php'?> </div>
</div>
</body>
</html>