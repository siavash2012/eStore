<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./styles/autowidthtopnav.css">
<link rel="stylesheet" href="./styles/styles.css">
<link rel="stylesheet" href="./styles/topnavStyles.css">
<link rel="stylesheet" href="./styles/cartStyles.css">
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


<div class="header">
 <h1 class="heading">Shopping Cart</h1>
 <h3 class="action" id="removeAll">Remove all</h3>
</div>




<?php

$link = mysqli_connect("localhost","root","","estore-3230388f1d");
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}



$shoppingCartString=$_POST["cartString"];
$shoppingCartArray=explode(" ",$shoppingCartString);


  for ($i = 0; $i < count($shoppingCartArray); $i++)  {
      $query = "SELECT * from `products` where `product_name`='".$shoppingCartArray[$i]."'";
      $result = mysqli_query($link, $query);
      $row=mysqli_fetch_row($result);
      if ($result  &&  $row> 0){
            echo '<div class="cartItems '.$i.'"><div class="imageBox">';
            $imageUrl='<img src="'.$row[2].'" style = "height:80px;">';
            echo($imageUrl);
            echo '</div>';
            echo '<div class="about">';
            echo '<h1 class="title">'.$row[0].'</h1>';
            echo '<h3 class="subtitle">'.$row[0].'</h3>';
            echo '</div><div class="counter"><div class="btn btnPlus '.$row[0].'">+</div><div class="count '.$row[0].'">1</div><div class="btn btnMinus '.$row[0].'">-</div></div><div class="prices">';
            echo '<div class="amount '.$row[0].'">'.$row[1].'</div>';
            echo '<div class="remove '.$row[0].'"><u>Remove</u></div></div></div>';
            echo '<hr>';
        }
          
    }
      
?>

<div id = "checkout" class="checkout">
 <div class="total">
 <div>
 <div class="subtotal">Sub Total</div>
 <div class="items"></div>
 </div>
 <div class="totalAmount"></div>
 </div>
 <button id="checkoutButton" class="checkoutButton">Checkout</button>
 </div>
 </div>
 <script type="text/javascript" src="scripts/cartScript.js"></script>
 
 
</body>
</html>
