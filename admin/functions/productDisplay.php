<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

// $userId = $_SESSION['user_id'];
// $userName = $_SESSION['username'];
// echo($adminId);

$query = "SELECT * FROM products";
$result = mysqli_query($connect,$query);
$count = mysqli_num_rows($result);

if($count == 0){
    echo("No Products available!");
    exit();
}

$data = array();
    while($row_result=mysqli_fetch_object($result)){
       array_push($data, array("product_id"=> $row_result->product_id, "product_title"=> $row_result->product_title,"product_price"=> $row_result->product_price,"product_image"=> $row_result->product_image,"product_desc"=> $row_result->product_desc,"product_keywords"=> $row_result->product_keywords));
    
}


echo(json_encode($data));

// echo json_encode($data);  //encoding php data into json 

?>