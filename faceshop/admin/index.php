<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Untitled Document</title>
  <link rel="stylesheet" type="text/css" href="css/indexcss.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <?php
  require_once 'controller/IndexController.php'; $index=new IndexController();
  if(isset($_GET['idlogout']) && isset($_SESSION['emailAdmin'])) {
    unset($_SESSION['emailAdmin']);
    session_destroy();
  }
    require_once 'controller/ManagerAccount.php'; $acc = new ManagerAccount();
  ?>


</head>

<body>
  <div id="container">
    <?php if (!isset($_SESSION['emailAdmin'])) { ?>
      <div id="login">
        <div id="head_login">
          <div id="img">
            <img src="../img/logo/logo.jpg" width="300px;" />
          </div>
        </div>
        <table>
          <form action="" method="post">
            <tr>
              <th style="color: #FFF">Admin</th>
            </tr>
            <tr>
              <td id="values"><input type="text" name="email" placeholder="example@gmail.com"/></td>
            </tr>
            <tr>
              <td id="values"><input type="password" name="password" placeholder="Password"/></td>
            </tr>
            <tr>
              <td>
                <button type="submit" name="btn_submit">LOGIN</button>
              </td>
            </tr>
          </form>
          <?php $acc->login(); ?>
        </table>
      </div>
      <?php } else { ?>

        <div id="head"><?php include('view/admin_head.php'); ?></div>
        <div id="main">
          <div id="main_left">
            <?php include 'view/admin_main_left.php'; ?>
          </div>
          <div id="main_right"> <?php $index->showMainRight(); ?> </div>
        </div>
        <div id="foot"></div>
        <?php } ?>
      </div>
    </body>
    </html>
