<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

$adminId = $_SESSION['admin_id'];
$adminUsername = $_SESSION['admin_firstname'] .".". $_SESSION['admin_lastname'];

// echo($adminId);

$userCountQuery = "SELECT * FROM customer";
$result = mysqli_query($connect,$userCountQuery);
$count = mysqli_num_rows($result);

$catCountQuery = "SELECT * FROM categories";
$result2 = mysqli_query($connect,$catCountQuery);
$count2 = mysqli_num_rows($result2);

$brandCountQuery ="SELECT * FROM brands";
$result3 = mysqli_query($connect,$brandCountQuery);
$count3 = mysqli_num_rows($result3);

if($count == 0){
    echo("No user found!");
    exit();
}

$data = array();
if($result){
    while($row_result=mysqli_fetch_object($result)){
        array_push($data, array("admin_id"=> $adminId,"adminUsername"=> $adminUsername,"userCount"=> $count, "categoryCount"=> $count2, "brandCount"=> $count3));
     
 }
 
}

echo(json_encode($data));

// echo json_encode($data);  //encoding php data into json 

?>