<?php

$link = mysqli_connect('localhost','root','','estore-3230388f1d');


//testing inserting a new product
$sql = "INSERT INTO `products` (`product_name`, `product_price`, `product_image_url`) VALUES
('hotwheels', 100,'productImages/hotwheels.jpg')";

$result = mysqli_query($link, $sql) or die ("Bad Query");

echo "Good Query";


?>