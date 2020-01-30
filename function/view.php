<?php
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

session_start();
$product_id = $_GET["id"];

// echo($product_id);

$query = "SELECT product_id,product_title,product_price,product_desc,product_image FROM products where product_id = '$product_id'";
$result = mysqli_query($connect,$query);
$fetch_result = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

if($count == 0){
    echo("No Product found!");
    exit();
}else{
    // var_dump($fetch_result);
}
// if(!empty($customerId)){
//     $data = array();
//     while($row_result=mysqli_fetch_object($result)){
//        array_push($data, array("product_id"=> $row_result->customer_id, "customer_name"=> $row_result->customer_name,"customer_email"=> $row_result->customer_email,"customer_country"=> $row_result->customer_country,"customer_city"=> $row_result->customer_city, "customer_contact"=> $row_result->customer_contact, "customer_image"=> $row_result->customer_image, "customer_address"=> $row_result->customer_address,));
    
// }


// }

// echo(json_encode($data));

// echo json_encode($data);  //encoding php data into json 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoppn</title>
     <!-- BootStrap Link -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!-- Custom Stylesheet -->
     <link rel="stylesheet" href="http://localhost/shoppn/css/style.css">
     <!-- Fontawesome Link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
</head>

<body>
     <!-- Nav Section -->
     <div class="row">
            <div class="col-lg-12">
                    <div id="top-nav">
                            <ul class="nav justify-content-center">
                               <li class="nav-item">
                                 <a class="nav-link active" href="http://localhost/shoppn/page/userlogin.html" id="plogin_btn">Sign In</a>
                               </li>
                               <li class="nav-item">
                                 <a class="nav-link" href="#">Store Locator</a>
                               </li>
                               <li class="nav-item">
                                 <a class="nav-link" href="#">Contact Us</a>
                               </li>
                               <li class="nav-item">
                                  <a class="nav-link btn btn-danger" id="userlogout_btn" style="margin-left: 0.5rem;"> Log out</a>
                                </li>
                             </ul>
                       </div>

            </div>
        </div>
 
    <!-- End of Nav Section -->

     <!-- Header Section -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed" style="width: 100%;" id="main-head">
            <a class="navbar-brand" id="company-logo" href="http://localhost/shoppn/page/landingPage.html" style="color: white;">Flames <span><i class="fas fa-fire-alt"></i></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <!-- Notifications Btn -->
                    <li class="nav-item dropdown nav-off" id="nav-off">
                        <a class="nav-link dropdown-toggle" href="#" id="notify-btn" style="font-size: 1.1rem;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope"></i>  <sup><span class="badge badge-danger" id="badge-alert">2</span></sup> 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="notify-btn">
                          <a class="dropdown-item" href="#">User Updated Profile</a>
                          <a class="dropdown-item" href="#">User Deleted item </a>
                        </div>
                      </li>

                      <li class="nav-item dropdown nav-off" id="nav-off">
                          <a class="nav-link dropdown-toggle btn" href="#" id="notify-btn" style="font-size: 1.1rem;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-dollar-sign"></i>   <sup> <span class="badge badge-danger">1</span></sup> 
                          </a>
                          <div class="dropdown-menu" aria-labelledby="notify-btn">
                            <a class="dropdown-item" href="#" >Transactions</a>
                            <a class="dropdown-item" href="#">Purchase</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Orders</a>
                            <a class="dropdown-item" href="#">Carts <i class="fas fa-cart-plus"></i> </a>
                          </div>
                        </li>
                
                <li class="nav-item dropdown nav-off" id="nav-off">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"  style="font-size: 1.1rem;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                  </a>
                  <div class="dropdown-menu"  id="catnav" aria-labelledby="navbarDropdown">
                   
                  </div>
                </li>

                <form class="form-inline my-2 my-lg-0" method="POST">
                    <input class="form-control mr-sm-2" type="search" id="searchInput" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary my-2 my-sm-0" id="searchnav_btn" type="button">Search</button>
                  </form>

                <li class="nav-item dropdown" id="nav-off">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="font-size: 1.1rem;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span id="userName">Account</span> <span id="userProfile"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Update</a>
                      <a class="dropdown-item" href="#">Help</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Policy</a>
                    </div>
                  </li>
              </ul>

            </div>
          </nav>
          
     <!-- End of Header Section  -->

     <!-- View Products -->
     <?php
    while($row_result=mysqli_fetch_object($result)){
                    echo($row_result["product_id"]);
        //        array_push($data, array("product_id"=> $row_result->customer_id, "customer_name"=> $row_result->customer_name,"customer_email"=> $row_result->customer_email,"customer_country"=> $row_result->customer_country,"customer_city"=> $row_result->customer_city, "customer_contact"=> $row_result->customer_contact, "customer_image"=> $row_result->customer_image, "customer_address"=> $row_result->customer_address,));
            
        }



    ?>



     <!-- Bootstrap & Jquery Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
   <!-- Custom Js Script -->
   
   <!-- <script src="http://localhost/shoppn/js/validate.js"></script> -->
   <script src="http://localhost/shoppn/js/script.js"></script>
    
</body>
</html>