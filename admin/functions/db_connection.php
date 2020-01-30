<?php
$localhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shoppn';

//Database Connection
$connect = mysqli_connect($localhost,$username,$password,$dbname);

//Check Database Connection
if($connect->connect_error){
    die("Connection Failed : ". $connect->connect_error);
}else{
  // echo('Successfully connected');
}


?>