<?php

$link = mysqli_connect('localhost','root','','estore-3230388f1d');


//testing inserting a new customer
$sql = "INSERT INTO `customer_accounts` (`first_name`, `last_name`, `street_number`, `address`, `email`, `city`, `postal_code`, `country`, `password`) VALUES
('Barry', 'Allen', NULL, NULL , 'test@test.ca', NULL, NULL, NULL, 'testpwd')";


$result = mysqli_query($link, $sql) or die ("Bad Query");

echo "Good Query";


?>