<?php
     session_start();
     $registerMessage = "";
    $_SESSION["loggedIn"] = false;
    
    $link = mysqli_connect("localhost","root","","estore-3230388f1d");
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
        
     if(isset($_POST["register"])){       
        if($_POST["email"]!="" and $_POST["password"] != "" and $_POST["fname"] != "" and $_POST["lname"] != ""){
            $registerEmail = $_POST["email"];
            $registerPassword = $_POST["password"];
            $registerFirstName = $_POST["fname"];
            $registerLastName = $_POST["lname"];
            $queryFind = "SELECT email from `customer_accounts` where `email` = '".mysqli_real_escape_string($link, $registerEmail)."'";
            $queryFindResult = mysqli_query($link, $queryFind);
            if(mysqli_num_rows($queryFindResult) == 0){
                $query = ("INSERT INTO `customer_accounts` (`first_name`, `last_name`,`street_number`,`address`,`email`,`city`,`postal_code`,`country`,`password`) VALUES ('".mysqli_real_escape_string($link,$registerFirstName)."', '".mysqli_real_escape_string($link,$registerLastName)."',NULL,NULL, '".mysqli_real_escape_string($link,$registerEmail)."',NULL,NULL,NULL, '".mysqli_real_escape_string($link,$registerPassword)."');");
                mysqli_query($link, $query);
                $_SESSION["userEmail"] = $registerEmail;
                $_SESSION["firstName"] = $registerFirstName;
                $_SESSION["loggedIn"] = true;
                //header("location:account.php");
                if($_SESSION["comingFromCheckout"]==true){
                            header("location:checkoutForm.php");
                        }else{
                        header("location:account.php");
                        }
            }else{
                $registerMessage = $registerMessage."Email Already Registered. Please Select Another Email.";
            }
            
        }else{
            $registerMessage = $registerMessage."Please Fill All the Required Fields.";
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

<h3>Create Account<br></h3>
<form method="POST">
  <label for="fname" style="color:black">First Name:</label><br>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname" style="color:black">Last Name:</label><br>
  <input type="text" id="lname" name="lname"><br><br>
  <label for="email" style="color:black">Email:</label><br>
  <input type="email" id="email" name="email"><br><br>
  <label for="password" style="color:black">Password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Create" name="register" id="register">
  <div><p><?php echo $registerMessage;?></p></div>
</form>
<p>Returning customer? <a href="login.php" style="color:rgb(7, 73, 160)">Sign in</a></p>


</div>

<script type="text/javascript" src="scripts/shoppingScript.js"></script>

</body>

</html>