<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./styles/autowidthtopnav.css">
<link rel="stylesheet" href="./styles/styles.css">
<link rel="stylesheet" href="./styles/topnavStyles.css">
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
          <option value="electronics">Electonics</option>
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

</div>


<div style ="height: 20px"></div>


<script type="text/javascript" src="scripts/shoppingScript.js"></script>

</body>

</html>