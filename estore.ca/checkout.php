<?php
session_start();
 $_SESSION["comingFromCheckout"]=false;

if($_SESSION["loggedIn"]==true){
    
    $userEmail=$_SESSION["userEmail"];
    $firstName=$_SESSION["firstName"];
    }else{
        $_SESSION["comingFromCheckout"]=true;
        header("location:login.php");  

}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./styles/autowidthtopnav.css">
<link rel="stylesheet" href="./styles/styles.css">
<link rel="stylesheet" href="./styles/topnavStyles.css">
<link rel="stylesheet" href="./styles/accountStyles.css">
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

<script type="text/javascript" src="scripts/shoppingScript.js"></script>

</body>



<?php

$link = mysqli_connect("localhost","root","","estore-3230388f1d");
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$cartString = explode('&&',$_POST["cartString"]);
$itemNames = explode(" ",$cartString[0]);
$itemCounts = explode(" ",$cartString[1]);
$queryInsertCustomerOrders = "INSERT INTO `customer_orders` (`email`) VALUES ('".$_SESSION["userEmail"]."');";
$resultInsert = mysqli_query($link, $queryInsertCustomerOrders);
$queryGetOrderNumber = "SELECT `order_number`  FROM `customer_orders` ORDER BY `order_number` DESC LIMIT 1;";
$resultGetOrderNumber = mysqli_query($link, $queryGetOrderNumber);
$orderNumber = (mysqli_fetch_array($resultGetOrderNumber)[0]);
$grandTotal=0;
for ($i = 0; $i < count($itemNames); $i++) {
    $queryGetPrice = "SELECT `product_price`  FROM `products` WHERE `product_name`='".$itemNames[$i]."';";
    $resultGetPrice =  mysqli_query($link, $queryGetPrice);
    $price = (mysqli_fetch_array($resultGetPrice)[0]);
    $totalPrice = $price * (int) $itemCounts[$i];
    $grandTotal += $totalPrice;
    $queryInsertOrders = "INSERT INTO `orders` (`item_name`,`order_date`,`item_quantity`,`order_total`,`order_currency`,`order_number`)
    VALUES ('".$itemNames[$i]."','".date("Y-m-d")."','".$itemCounts[$i]."','".$totalPrice."','"."USD"."','".$orderNumber."');";
    $insertOrdersResult = mysqli_query($link, $queryInsertOrders);
}

$queryGetOrder = "SELECT * FROM `orders` WHERE `order_number`='".$orderNumber."';";

    if($result = mysqli_query($link, $queryGetOrder)){
        echo "<div style='margin-left:5px;'><h3>Thank you ".$firstName.".</h3>";
        echo "<h4>Your order number is ".$orderNumber.".</h4></div>";
        echo "<div style='margin-left:5px;'><h4>Order Summary</h4><table style='border-collapse:collapse;'><tr><th>Order Number</th><th>Order Date</th><th>Item</th><th>Quantity</th><th>Subtotal</th></tr>";
          while($row=mysqli_fetch_row($result)){
            $order_number = $row[6];
            $item_name = $row[0];
            $order_date = $row[1];
            $item_quantity = $row[2];
            $order_total = $row[3];
            $order_currency = $row[4];
            echo '<tr>';
            echo '<td>'.$order_number.'</td>';
            echo '<td>'.$order_date.'</td>';
            echo '<td>'.$item_name.'</td>';
            echo '<td>'.$item_quantity.'</td>';
            echo '<td>'.$order_total.' '.$order_currency.'</td>';
            echo '</tr>';
        }
        echo '<tr style="text-align:left;"><th colspan="4">Total</th><th>'.$grandTotal.' USD</th></tr>';
        echo '</table></div>';
        
    }
echo "<script typpe='text/javascript' src='scripts/checkoutScript.js'></script>"
?>

