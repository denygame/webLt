<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/index.css" type="text/css" rel="stylesheet"/>

</head>

<body>
<?php
require_once 'controller/IndexController.php'; $index=new IndexController(); 
?>

<div id="container">
	<div id="header"><?php $index->showHead(); ?></div>
    <div id="main"> <?php $index->showMain(); ?></div>
    <div id="footer"><?php $index->showFoot(); ?></div>
</div>
</body>
</html>
