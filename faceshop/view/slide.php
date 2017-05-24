<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <style>
    .mySlides {
     display: none
   }
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
     cursor: pointer;
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
     from {
      opacity: .4
    }
    to {
     opacity: 1
   }
 }
 @keyframes fade {
   from {
    opacity: .4
  }
  to {
   opacity: 1
 }
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next, .text {
   font-size: 11px
 }
}
</style>

</head>

<body>

  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="img/slide/img1.jpg" style="width:100%; height:200px;">
      <div class="text">Caption Text</div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="img/slide/img2.jpg" style="width:100% ; height:200px;">
      <div class="text">Caption Two</div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="img/slide/img3.jpg" style="width:100% ; height:200px;">
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

      slideIndex = 0;
      carousel();

      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
       }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
       slideIndex++;
       if (slideIndex > x.length) {slideIndex = 1}    
        x[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(carousel, 5000);    
    }
  </script>

</body>
</html>