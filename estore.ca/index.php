<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./styles/autowidthtopnav.css">
<link rel="stylesheet" href="./styles/styles.css">
<link rel="stylesheet" href="./styles/topnavStyles.css">
<link rel="stylesheet" href="./styles/slideshow.css">
<title>eStore.ca: Low prices - Fast Shipping</title>   
</head>
<body>

  
<div class="bannerbox3">

    <div class="logo"><a class="active" href="index.php"><img src = "logoImages/eStore.ca.png" width="120vw" ></a></div>
  
    <form class="search-form" id="search-form">
      <input type="text" id="search-box" name = "search-box" class="search-box" placeholder="Search ">
    </form>
  
    <nav class="site-nav1">
      <ul>
        <li class="site-nav__item" ><a id="search-button" class="button">Search</a></li>
        <li class="site-nav__item" ><label for="category">Category</label></li>
        <select name="categories" id="categories" >
          <option value="all">All</option>
          <option value="books">Books</option>
          <option value="electronics">Electronics</option>
          <option value="household">Household</option>
          <option value="toys">Toys</option>
        </select>
  
      </ul>
    </nav>
    <nav class="site-nav1">
      <ul>
    <li class="site-nav__item2"><a class="active" href="account.php"><img id = "accountLogo" width="65vw" src = "logoImages/account.png"></a></li>
    <li class="site-nav__item2"><a class="active" href="cartForm.php"><img id = "cartLogo" width="65vw" src = "logoImages/cart.png"></a></li>    
  </nav>

</div>

<div class="bannerbox2">
<!-- using navbar instead of table for product categories-->
<nav class="site-nav2">
  <ul>
    <li class="site-nav__item"><a href="dealcentre.php" style="text-decoration: none;">Deal Centre</a></li>
    <li class="site-nav__item"><a href="shopbooks.php" style="text-decoration: none;">Books</a></li>
    <li class="site-nav__item"><a href="shopelectronics.php" style="text-decoration: none;">Electronics</a></li>
    <li class="site-nav__item"><a href="shophousehold.php" style="text-decoration: none;">Household</a></li>      
    <li class="site-nav__item"><a href="shoptoys.php" style="text-decoration: none;">Toys</a></li>  
  </ul>
</nav>
</div>

<div class="divider"></div>

<div id="queryResult"></div>


<div class = "center">
<div style = "width: 1000px">

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
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
  user-select: none;
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
  height: 15px;
  width: 15px;
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
  animation-name: fade;
  animation-duration: 1.5s;
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

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="logoImages/banner1.png" style="width:100%">
  <div class="text"> </div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="logoImages/banner2.png" style="width:100%">
  <div class="text"> </div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="logoImages/banner3.png" style="width:100%">
  <div class="text"> </div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
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

<div style ="height: 20px"></div>

<div class = "centerpage"   text-align= "center">
<b>
<h1 style="font-family:sans-serif;padding-left:50px"> <a href="shoptoys.php" style="color:black"> Shop Toys </a></h1><b>
<div class="centerdiv">

<section>
<div class="productdiv">
<div>
<img src="productImages/toycar.jpg" style = "width: 70%"/></a>
</div>
<div>
<h3>Toy Car.</h3>
<h4>Price: C $25</h4>
<input type="button" id="carButton" class="addToCart" value="Add to Cart"></input>
</div>
</div>
</section>

<div style ="margin: 10px"></div>

<section>
<div class="productdiv">
<div>
<img src="productImages/puzzle.png" style = "width: 40%"/></a>
</div>
<div >
<h3>Puzzle.</h3>
<h4>Price: <span style="text-decoration: line-through; color:red">Was C $55</span> C $35 </h4>
<input type="button" id="puzzleButton" class="addToCart" value="Add to Cart"></input>
</div>
</div>
</section>

<div style ="margin: 10px"></div>

<section>
<div class="productdiv">
<div>
<img src="productImages/lego-time100-companies.jpg" style = "width: 55%"/></a>
</div>
<div >
<h3>LEGO</h3>
<h4>Price: C $100</h4>
<input type="button" id="legoButton" class="addToCart" value="Add to Cart"></input>
</div>
</div>
</section>

</div>

<div style ="height: 20px"></div>

<h1 style="font-family:sans-serif;padding-left:50px"> <a href="shophousehold.php" style="color:black"> Shop Household </a></h1><b>
<div class="centerdiv">
<section>
<div class="productdiv">
<div>
<img src="productImages/table.png" style = "width: 80%"/></a>
</div>
<div >
<h3>Dining Table.</h3>
<h4>Price: C $150</h4>
<input type="button" id="tableButton" class="addToCart" value="Add to Cart"></input>
</div>
</div>
</section>

<div style ="margin: 10px"></div>

<section>
<div class="productdiv">
<div>
<img src="productImages/chair.png" style = "width: 50%"/></a>
</div>
<div >
<h3>Office Chair.</h3>
<h4>Price: C $300 </h4>
<input type="button" id="chairButton" class="addToCart" value="Add to Cart"></input>
</div>
</div>
</section>

<div style ="margin: 10px"></div>

<section>
<div class="productdiv">
<div>
<img src="productImages/toaster.png" style = "width: 55%"/></a>
</div>
<div >
<h3>Awesome Toaster.</h3>
<h4>Price: <span style="text-decoration: line-through; color:red">Was C $250</span> C $175</h4>
<input type="button" id="toasterButton" class="addToCart" value="Add to Cart"></input>
</div>
</div>
</section>


</div>

<div style ="height: 20px"></div>

<h1 style="font-family:sans-serif;padding-left:50px"> <a href="shopelectronics.php" style="color:black"> Shop Electronics </a></h1><b>
<div class="centerdiv">

<section>
<div class="productdiv">
<div>
<img src="productImages/microwave.png" style = "width: 55%"/></a>
</div>
<div >
<h3>Microwave Oven.</h3>
<h4>Price: C $550 </h4>
<input type="button" id="microwaveButton" class="addToCart" value="Add to Cart"></input>
</div>
</div>
</section>

<div style ="margin: 10px"></div>

<section>
<div class="productdiv">
<div>
<img src="productImages/laptop.png" style = "width: 31.5%"/></a>
</div>
<div >
<h3>Folding Screen Laptop.</h3>
<h4>Price: C $3500 </h4>
<input type="button" id="laptopButton" class="addToCart" value="Add to Cart"></input>
</div>
</div>
</section>

</div>

<div style ="height: 20px"></div>

<h1 style="font-family:sans-serif;padding-left:50px"> <a href="shopbooks.php" style="color:black"> Shop Books </a></h1><b>
<div class="centerdiv">

<section>
<div class="productdiv">
<div>
<img src="productImages/python.png" style = "width: 40%"/></a>
</div>
<div >
<h3>Learn How to Program in Python.</h3>
<h4>Price: C $85 </h4>
<input type="button" id="pythonButton" class="addToCart" value="Add to Cart"></input>
</div>
</div>
</section>

<div style ="margin: 10px"></div>

<section>
<div class="productdiv">
<div>
<img src="productImages/java.png" style = "width: 41.5%"/></a>
</div>
<div >
<h3>Learn How to Program in Java.</h3>
<h4>Price: C $130 </h4>
<input type="button" id="javaButton" class="addToCart" value="Add to Cart"></input>
</div>
</div>
</section>
</div>

</div>
</div>
</div>
<div style ="height: 20px"></div>

<script type="text/javascript" src="scripts/shoppingScript.js"></script>

</body>

</html>