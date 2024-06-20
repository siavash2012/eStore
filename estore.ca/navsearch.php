<?php

$link = mysqli_connect("localhost","root","","estore-3230388f1d");
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


$q = $_REQUEST["q"];
$c = $_REQUEST["c"];


if($c=="all"){
    $query = "SELECT * from `products`";
}else{
    $query = "SELECT * from `products` where `category` = '".$c."';";
}


$queryResult = "";
$result = mysqli_query($link,$query);
$productTable = $result->fetch_all(MYSQLI_ASSOC);

foreach ($productTable as $index=>$result){
    
  $keywordsArray = explode(" ",$result["keywords"]);
  
  foreach ($keywordsArray as $indexKeywords=>$resultKeywords){
      
    $curl = curl_init();

    curl_setopt_array($curl, [
	    CURLOPT_URL => "https://text-similarity-calculator.p.rapidapi.com/stringcalculator.php?ftext=".$resultKeywords."&stext=".$q,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_FOLLOWLOCATION => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_MAXREDIRS => 10,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => "GET",
	    CURLOPT_HTTPHEADER => [
		    "x-rapidapi-host: text-similarity-calculator.p.rapidapi.com",
		    "x-rapidapi-key: dd18e74db3mshb90ccf2c712fd97p1f2153jsn40eefef6165f"
	    ],
    ]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    $responseArray= explode(":",$response);
	$similarity =(int)substr($responseArray[3],2,3);
	if($similarity>90){
	    $queryResult = $queryResult."<div><img style='height:90px;float:left; margin-right:20px' src='".$result["product_image_url"]."'>";
	    $queryResult = $queryResult."<p style='font-weight: bold;'>".$result["product_name"]."</p>";
	    $queryResult = $queryResult."<p style='font-weight:bold'>".$result["product_price"]." $</p>";
	    $queryResult = $queryResult."<p><input type='button' onclick='addToCartFromSearch(this)' id='".$result["product_name"]."ButtonSearch' class='addToCart' value='Add to Cart'></input></p><hr></div>";
	    break;
	}
}

     
      
  }
}

echo $queryResult;












?>
