<?php
session_start();
if($_SESSION["loggedIn"]==true){
    
    $userEmail=$_SESSION["userEmail"];
    $firstName=$_SESSION["firstName"];   
    }else{
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

<div class="header">
<h1 class="heading">Welcome <?php echo $firstName;?></h1>
<button id ="logut" class="settingsButton" onclick="window.location.replace('logout.php');">Logout</button>
</div>

<div class="myAccount">
<h2>My Account</h2>
<button id ="editProfile" class="settingsButton" type="submit" form="userInformation">Save Profile</button>
</div>
</div>

<form method = "POST" action="editProfile.php" id="userInformation" class = "userInformationRow">
<div class="userInformation">
<h2>User Information</h2>
<div class = "userInformationRow">


<?php
$link = mysqli_connect("localhost","root","","estore-3230388f1d");
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $link -> connect_error;
  exit();
}
$query = "SELECT * from `customer_accounts` where `email`='".$userEmail."';" ;
if ($result = mysqli_query($link, $query)) {
  if ($result) {
      
         while($row=mysqli_fetch_row($result)){
             $first_name= $row[0];
             $last_name= $row[1];
             $street_number= $row[2];
             $address= $row[3];
             $email= $row[4];
             $city= $row[5];
             $postal_code= $row[6];
             $country= $row[7];
             $password= $row[8];
         echo '<label>First Name<br><input type"text" id = "firstName" name="firstName" value ='.$first_name. '></label>';
         echo '<label>Last Name<br><input type"text" id="lastName" name="lastName" value ='.$last_name. '></label>';
         echo '<label style="margin-top:-23px;">Street<br> Number<br><input type"text" id="streetNumber" name="streetNumber" style="width:80px;" value ='.$street_number.'></label>';
         echo '<label style="margin-left:50px;">Address<br><input type"text" id="address" name="address" style="width:320px;" value ="'.$address. '"></label>';
         echo '</div><br><div class = "userInformationRow">';
         echo '<label>Password<br><input type"text" id="password" name="password" value ='.$password.'></label>';
         echo '<label>Email<br><input type"text" id="email" name="email" value ='.$email.' readonly></label>';
         echo '<label>City<br><input type"text" id="city" name="city" style="width:130px;" value ='.$city.'></label>';
         echo '<label>Postal Code<br><input type"text" id="postalCode" name="postalCode" style="width:130px;" value ='.$postal_code.'></label>';
         echo '<label>Country<br><input type"text" id="country" name="country" style="width:130px;" value ='.$country.'></label>';
         echo '</div></div></form><br><hr>';
             
             
         }
      }
}

echo '<div class="orderHistory"><h2>Order History</h2></div><div class="orderHistoryTable"><table><tr><th>Order Number</th><th>Order Date</th><th>Item</th><th>Quantity</th><th>Subtotal</th></tr>';

$query2="SELECT * from `customer_orders` inner join `orders` on `customer_orders`.`order_number`=`orders`.`order_number` where `customer_orders`.`email`='".$userEmail."';";

if ($result = mysqli_query($link, $query2)) {
    if ($result) {
        while($row=mysqli_fetch_row($result)){
            $order_number = $row[8];
            $item_name = $row[2];
            $order_date = $row[3];
            $item_quantity = $row[4];
            $order_total = $row[5];
            $order_currency = $row[6];
            echo '<tr>';
            echo '<td>'.$order_number.'</td>';
            echo '<td>'.$order_date.'</td>';
            echo '<td>'.$item_name.'</td>';
            echo '<td>'.$item_quantity.'</td>';
            echo '<td>'.$order_total.' '.$order_currency.'</td>';
            echo '</tr>';
            
        }
        
        
    }
}
echo '</table></div>';

?>

<script type="text/javascript" src="scripts/shoppingScript.js"></script>

</body>

</html>


