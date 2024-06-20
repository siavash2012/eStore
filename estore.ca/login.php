<?php
    session_start();
     $_SESSION["loggedIn"]=false;
    $loginMessage = "";
    
    $link = mysqli_connect("localhost","root","","estore-3230388f1d");
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

       
    if(isset($_POST["login"])){

        if($_POST["email"] != "" and $_POST["password"] != ""){
            $loginEmail = $_POST["email"];
            $loginPassword = $_POST["password"];
            $queryFind = "SELECT `password`,`first_name` from `customer_accounts` where `email` = '".mysqli_real_escape_string($link, $loginEmail)."'";
            $queryFindResult = mysqli_query($link, $queryFind);
                if(mysqli_num_rows($queryFindResult)==0){
                    $loginMessage = $loginMessage."Email Not Found. Please Try Again.";
                    
                }else{
                   
                    $row=mysqli_fetch_row($queryFindResult);
                    $password = $row[0];
                    $firstName = $row[1];
                   if($password==$loginPassword){
                        $_SESSION["userEmail"] = $loginEmail;
                        $_SESSION["firstName"] = $firstName;
                        $_SESSION["loggedIn"]=true;
                        if($_SESSION["comingFromCheckout"]==true){
                            header("location:checkoutForm.php");
                        }else{
                        header("location:account.php");
                        }
                       
                       
                   }else{$loginMessage = $loginMessage."Your Password Does Not Match.";}
                }
            
            }else{
                $loginMessage = $loginMessage."Please Fill All the Required Fields.";
                }
    }
            
            
            
           
?>



<!DOCTYPE html>
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

<div id="wrapper">

<h3>Login<br></h3>
<form method="POST">
  <label for="email" style="color:black">Email:</label><br>
  <input type="email" id="email" name="email"><br><br>
  <label for="password" style="color:black">Password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" id="login" name="login" value="Sign in">
</form>
<p>New Customer? <a href="register.php" style="color:rgb(7, 73, 160)">Register Here</a></p>
 <div><p><?php echo $loginMessage;?></p></div>

</div>

<script type="text/javascript" src="scripts/shoppingScript.js"></script>

</body>

</html>