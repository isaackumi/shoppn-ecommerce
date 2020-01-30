<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

// $userId = $_SESSION['user_id'];
// $userName = $_SESSION['username'];
// echo($adminId);

$query = "SELECT * FROM customer";
$result = mysqli_query($connect,$query);
$count = mysqli_num_rows($result);

if($count == 0){
    echo("No Customer  available!");
    exit();
}

$data = array();
    while($row_result=mysqli_fetch_object($result)){
       array_push($data, array("customer_id"=> $row_result->customer_id, "customer_name"=> $row_result->customer_name, "customer_email"=> $row_result->customer_email, "customer_country"=> $row_result->customer_country,"customer_city"=> $row_result->customer_city,"customer_contact"=> $row_result->customer_contact));
    
}


echo(json_encode($data));

// echo json_encode($data);  //encoding php data into json 

?>