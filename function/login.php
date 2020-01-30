<?php
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $customerEmail = $_POST['customerEmail'];
    $customerPassword = $_POST['customerPassword'];
    $customerEmail = filter_var($_POST['customerEmail'],FILTER_SANITIZE_EMAIL);

      if(!filter_var($customerEmail,FILTER_VALIDATE_EMAIL)){
            echo("Invalid Email");
}

    if(!empty($customerEmail) && !empty($customerPassword)){
         $customerPassword = md5($customerPassword);
    //Creating a query request to check if the user exists
    $userExistQuery = "SELECT * FROM customer WHERE customer_email='$customerEmail' and customer_pass='$customerPassword'";
   
    $result = mysqli_query($connect,$userExistQuery);
    $fetch_result = mysqli_fetch_row($result);
    //print_r($fetch_result);
    $count = mysqli_num_rows($result);
    
     if($count>0){
    session_start();
    // var_dump($fetch_result);
   
    $_SESSION['customer_id'] =$fetch_result[0];
    $_SESSION['customer_name'] =$fetch_result[1];
    $_SESSION['customer_contact'] =$fetch_result[6];
    $_SESSION['customer_address'] =$fetch_result[8];
    $_SESSION['customer_city'] =$fetch_result[5];
    $_SESSION['user_country'] =$fetch_result[4];
    $_SESSION['customer_image'] =$fetch_result[7];
   

    $customerId = $_SESSION['customer_id'];
    $customerName = $_SESSION['customer_name'];  
    
    echo("Login Successfully");
     }else{
         echo("Email & Password Invalid");
         
         
     }
    
    }
    
}
?>