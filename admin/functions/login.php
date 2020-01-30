<?php
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $adminEmail = $_POST['adminEmail'];
    $adminPassword = $_POST['adminPassword'];
    $adminCode = $_POST['adminCode'];
    $adminEmail = filter_var($_POST['adminEmail'],FILTER_SANITIZE_EMAIL);

      if(!filter_var($adminEmail,FILTER_VALIDATE_EMAIL)){
            echo("Invalid Email");
}

    if(!empty($adminEmail) && !empty($adminPassword) && !empty($adminCode)){
         $adminPassword = md5($adminPassword);
    //Creating a query request to check if the user exists
    $adminExistQuery = "SELECT * FROM admin WHERE admin_email='$adminEmail' and admin_password='$adminPassword' or security_code='$adminCode'";
   
    $result = mysqli_query($connect,$adminExistQuery);
    $fetch_result = mysqli_fetch_row($result);
    //print_r($fetch_result);
    $count = mysqli_num_rows($result);
    
     if($count>0){
    session_start();
    // var_dump($fetch_result);
   
    $_SESSION['admin_id'] =$fetch_result[0];
    $_SESSION['admin_firstname'] =$fetch_result[1];
    $_SESSION['admin_lastname'] =$fetch_result[2];
    $_SESSION['admin_age'] =$fetch_result[3];
    $_SESSION['admin_gender'] =$fetch_result[4];
    $_SESSION['admin_email'] =$fetch_result[5];
    $_SESSION['security_code'] =$fetch_result[7];
    $_SESSION['admin_profile'] =$fetch_result[8];


    $adminUser = $_SESSION['admin_id'];
    $adminFirstname = $_SESSION['admin_firstname'];
   
    
    echo("Login Successfully");
     }else{
         echo("Email & Password Invalid");
         
         
     }
    
    }
    
}
?>