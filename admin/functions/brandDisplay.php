<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

$adminId = $_SESSION['admin_id'];
// $userName = $_SESSION['username'];
// echo($adminId);

$query = "SELECT * FROM brands";
$result = mysqli_query($connect,$query);
$count = mysqli_num_rows($result);

if($count == 0){
    echo("No brand available!");
    exit();
}

$data = array();
    while($row_result=mysqli_fetch_object($result)){
       array_push($data, array("brand_id"=> $row_result->brand_id, "brand_name"=> $row_result->brand_name));
    
}


echo(json_encode($data));

// echo json_encode($data);  //encoding php data into json 

?>