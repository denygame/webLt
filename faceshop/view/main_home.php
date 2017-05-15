<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Untitled Document</title>
  <link rel="stylesheet" type="text/css" href="css/main_home.css"/>
  <link rel="stylesheet" type="text/css" href="css/main_category.css"/>


  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script src="js/countBookSC.js"></script>




  <style>
    .mySlides {display:none}

    /* Slideshow container */
    .slideshow-container {
      max-width: 100%;
      position: relative;

    }

    /* Next & previous buttons */
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
      background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor:pointer;
      height: 13px;
      width: 13px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 1.5s;
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
      from {opacity: .4}
      to {opacity: 1}
    }

    @keyframes fade {
      from {opacity: .4}
      to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .prev, .next,.text {font-size: 11px}
    }
  </style>
</head>

<body>
<?php //libary
require_once 'controller/BookController.php'; $bController = new BookController();
require_once 'controller/AuthorController.php'; $authorController = new AuthorController(); ?>
<div id="main_home">

    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="view/img1.jpg" style="width:100%; height:200px;">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="view/img2.jpg" style="width:100% ; height:200px;">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="view/img3.jpg" style="width:100% ; height:200px;">
            <div class="text">Caption Three</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>

<div id="sach_noibat">
    <div id="tieude"><p>Sách nổi bật</p></div>
    <div style="min-height: 1000px;">
        <?php  $result=$bController->load6BookHighlight(); if ($result!=null) while ($d = mysql_fetch_array($result)) { ?>
            <div id="sach">
                <div id="hinhsach"><a href="index.php?id=book&idbook=<?php echo $d['idbook']; ?>" ?><img width="300px" src="img/<?php echo $d['imgbg']; ?>"/></a></div>
                <div id="tensach"><a href="index.php?id=book&idbook=<?php echo $d['idbook']; ?>" ?><p><?php echo $d['name']; ?></p></a></div>
                <hr/>
                <div id="mota">
                    <?php $idAuthor = $d['idauthor'];$nameAuthor = $authorController->getNameAuthorById($idAuthor); if($nameAuthor!=null){ ?><p><?php echo $nameAuthor['name'] ?></p><?php } ?>
                    <p style="overflow: hidden; width: 90%; height: 50px;"><?php echo $d['info']; ?></p>
                </div>
                <hr/>
                <div id="gia">
                    <div id="gia1">
                        <p>Giá bán: <font style="color:#C60"><?php echo number_format($d['price'] * (1 - (($d['saleoff']) / 100))); ?>đ</font></p>
                        <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']); ?>đ</font></p>
                    </div>
                    <div id="km"><?php echo $d['saleoff']; ?>%</div>
                </div>
                <div id="dathang">
                    <button class="btn" onclick="doSomething('<?php echo $d['idbook'];?>');"> &#9758 <b>CHỌN MUA</b></button>
                </div>
            </div>
        <?php } else echo 'Lỗi truy vẩn!'; ?>
    </div>
</div>

<hr/>
<div id="sach_moi">
    <div id="tieude"><p>Sách mới</p></div>
    <div id="sach_cungloai2">
        <?php $result=$bController->load12BookNew(); if ($result!=null) while ($d = mysql_fetch_array($result)) { ?>
            <div id="sach2">
                <div id="hinhsach2"><a href="index.php?id=book&idbook=<?php echo $d['idbook']; ?>"><img src="img/<?php echo $d['imgdetail']; ?>"/></a></div>
                <div id="tensach2"><a href="index.php?id=book&idbook=<?php echo $d['idbook']; ?>"><p><?php echo $d['name']; ?></a></div>
                <div id="mota2">
                    <?php $idAuthor = $d['idauthor'];$nameAuthor = $authorController->getNameAuthorById($idAuthor);  if($nameAuthor!=null){ ?><p><?php echo $nameAuthor['name'] ?></p><?php } ?>
                </div>
                <div id="gia2">
                    <p>Giá bán: <font style="color:#C60"><?php echo number_format($d['price'] * (1 - (($d['saleoff']) / 100))); ?>đ</font></p>
                    <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']); ?>đ</font></p>
                </div>
                <div id="km2"><?php echo $d['saleoff']; ?>%</div>
                <div id="dathang2"> <button class="btn" onclick="doSomething('<?php echo $d['idbook']; ?>');">&#9758 <b>CHỌN MUA </b></button></div>
            </div>
        <?php } else echo 'Lỗi truy vẩn!'; ?>
    </div>
    <div id="show_all_new"><a href="#"> &#9758 <b>Xem tất cả sách mới</b></a></div>
</div>
<hr/>
<div id="sach_sapra">
    <div id="tieude"><p>Sách sắp ra mắt</p></div>
    <div style="min-height: 300px;">
        <?php $result=$bController->load6BookFuture(); if ($result!= null) while ($d= mysql_fetch_array($result)) { ?>
            <div id="sach2">
                <div id="hinhsach2"><a href="index.php?id=book&idbook=<?php echo $d['idbook']; ?>"><img src="img/<?php echo $d['imgdetail']; ?>"/></a></div>
                <div id="tensach2"><a href="index.php?id=book&idbook=<?php echo $d['idbook']; ?>"><p><?php echo $d['name']; ?></a></div>
                <div id="mota2">
                    <?php $idAuthor = $d['idauthor'];$nameAuthor = $authorController->getNameAuthorById($idAuthor);  if($nameAuthor!=null){ ?><p><?php echo $nameAuthor['name'] ?></p><?php } ?>
                </div>
                <div id="gia2">
                    <p>Giá bán: <font style="color:#C60"><?php echo number_format($d['price'] * (1 - (($d['saleoff']) / 100))); ?>đ</font></p>
                    <p>Giá bìa: <font style="text-decoration:line-through"><?php echo number_format($d['price']); ?>đ</font></p>
                </div>
                <div id="km2"><?php echo $d['saleoff']; ?>%</div>
                <div id="dathang2"><button class="btn" onclick="doSomething('<?php echo $d['idbook'];?>');">&#9758 <b>CHỌN MUA </b></button></div>
            </div>
        <?php } else echo 'Lỗi truy vẩn!'; ?>
    </div>
    <div id="show_all_sapra"><a href="#"> &#9758 <b>Xem tất cả sách sắp ra</b></a></div>
</div>
</div>

<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
      }
    </script>
  </body>
  </html>