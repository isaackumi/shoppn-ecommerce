<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

// $userId = $_SESSION['user_id'];
// $userName = $_SESSION['username'];
// echo($adminId);

$query = "SELECT * FROM categories";
$result = mysqli_query($connect,$query);
$count = mysqli_num_rows($result);

if($count == 0){
    echo("No categories available!");
    exit();
}

$data = array();
    while($row_result=mysqli_fetch_object($result)){
       array_push($data, array("cat_id"=> $row_result->cat_id, "cat_name"=> $row_result->cat_name));
    
}


echo(json_encode($data));

// echo json_encode($data);  //encoding php data into json 

?>