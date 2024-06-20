<?php
 session_start();
 $userEmail=$_SESSION["userEmail"];

$link = mysqli_connect("localhost","root","","estore-3230388f1d");
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$query1 = "UPDATE `customer_accounts` SET `first_name`='".$_POST[firstName]."' WHERE `email`='".$_SESSION[userEmail]."'" ;
$query2 = "UPDATE `customer_accounts` SET `last_name`='".$_POST[lastName]."' WHERE `email`='".$_SESSION[userEmail]."'" ;
$query3 = "UPDATE `customer_accounts` SET `street_number`='".$_POST[streetNumber]."' WHERE `email`='".$_SESSION[userEmail]."'" ;
$query4 = "UPDATE `customer_accounts` SET `address`='".$_POST[address]."' WHERE `email`='".$_SESSION[userEmail]."'" ;
$query5 = "UPDATE `customer_accounts` SET `password`='".$_POST[password]."' WHERE `email`='".$_SESSION[userEmail]."'" ;
$query6 = "UPDATE `customer_accounts` SET `city`='".$_POST[city]."' WHERE `email`='".$_SESSION[userEmail]."'" ;
$query7 = "UPDATE `customer_accounts` SET `postal_code`='".$_POST[postalCode]."' WHERE `email`='".$_SESSION[userEmail]."'" ;
$query8 = "UPDATE `customer_accounts` SET `country`='".$_POST[country]."' WHERE `email`='".$_SESSION[userEmail]."'" ;
mysqli_query($link, $query1);
mysqli_query($link, $query2);
mysqli_query($link, $query3);
mysqli_query($link, $query4);
mysqli_query($link, $query5);
mysqli_query($link, $query6);
mysqli_query($link, $query7);
mysqli_query($link, $query8);
header("location:account.php");
?>