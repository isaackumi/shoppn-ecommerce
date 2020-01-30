<?php 
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

if(isset($_POST["customer_btn"])){
    $userFullname = $_POST['customerFirstname'] . " " . $_POST['customerSurname'];
    $userEmail = $_POST['customerEmail'];
    $userAddress = $_POST['customerAddress'];
    $userCity = $_POST['customerCity'];
    $userCountry = $_POST['customerCountry'];
    $userPhone = $_POST['customerContact'];
    $userPassword = $_POST['customerPass'];

    
    // $userProfile = $_POST['userProfile'];
    $userEmail = filter_var($_POST['customerEmail'],FILTER_SANITIZE_EMAIL);
        if(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)){
            echo("Invalid Email");
}else{
    $query1 = "SELECT customer_email FROM customer WHERE customer_email = '$userEmail'";
    $result = mysqli_query($connect,$query1);
    $fetch_result = mysqli_fetch_object($result);
    // var_dump($fetch_result);

    $data = mysqli_num_rows($result);
    // print_r($query1);
    // var_dump($data);

if($userFullname == "" || $userEmail == "" || $userAddress == "" ||  $userCity == "" ||  $userCountry == ""  || $userPhone == ""){
    echo("Please fill all fields");

    }else{

if($data== 0){
    $folderName = "../images/users/";
    $fileName = $folderName . basename($_FILES['userProfile']["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

    //get the dimensions of the image and store it in the variable '$check'
    $fileDimensions = getimagesize($_FILES["userProfile"]["tmp_name"]);
    if($fileDimensions !== false) {
        //  echo "File is an image - " . $fileDimensions["mime"] . ".";
        // print_r($fileDimensions);
        $uploadOk = 1;
    } else{
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["userProfile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}else{
    if (move_uploaded_file($_FILES["userProfile"]["tmp_name"], $fileName)) {
       
            $userPassword = md5($userPassword);
            $sql = "INSERT INTO customer(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address) values('$userFullname','$userEmail','$userPassword','$userCountry','$userCity','$userPhone','$fileName','$userAddress')";
        //    var_dump($sql);
            $result1 = mysqli_query($connect,$sql);
    }
    else{
        echo "Sorry, there was an error uploading your file.";
    }

}

    }else{
        echo("This email is already regsitered, Please try another email");
    }

}

    }
  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Style - Admin Portal</title>

     <!-- BootStrap Link -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="http://localhost/shoppn/css/style.css">
    <!-- <link rel="stylesheet" href="http://localhost/shoppn/css/register.css"> -->
    <!-- Fontawesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <title>Flames - Admin</title>
     <!-- Datatables CDN Links -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<body>
    
    <!-- Header Container  -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" id="company-logo" href="#">Flames<span><i class="fas fa-fire-alt"></i></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="http://localhost/shoppn/admin/pages/adminportal.html">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="http://localhost/shoppn/admin/functions/addBrand.php">Brands <i class="fab fa-bitcoin"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/shoppn/admin/functions/addCategory.php">Categories <i class="fas fa-th-list"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="http://localhost/shoppn/admin/functions/addUser.php">Users <i class="fas fa-users"></i></a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="http://localhost/shoppn/admin/functions/addProducts.php">Products<i class="fas fa-users"></i></a>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="adminUsername" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Accounts <i class="fas fa-user"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Update <i class="fas fa-user-cog"></i></a>
                <a class="dropdown-item" href="http://localhost/shoppn/function/logout.php" id="adminlogoutbtn">Log Out <i class="fas fa-sign-in-alt"></i></a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

                <!-- End of Header Container -->

    <!-- Brands Tab  -->
    <div id="usersT">
            <h1>Users</h1>

              <!-- Add Users -->
              <div id="BtnSec">
            <div class="row">
            <div class="col-lg-12">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"> Add Users</button>
            </div>
        </div>
        </div>

        <!-- Brand Input -->
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Customer Firstname</label>
                  <input type="text" class="form-control" id="cname" name="customerFirstname" placeholder="Enter Customer Firstname">
                </div>
                <div class="form-group">
                  <label for="">Customer Surname</label>
                  <input type="text" class="form-control" id="cname" name="customerSurname" placeholder="Enter Customer Surname">
                </div>
                <div class="form-group">
                  <label for="">Customer Email</label>
                  <input type="text" class="form-control" id="cemail" name="customerEmail" placeholder="Enter Customer Email">
                </div>
                <div class="form-group">
                  <label for="">Customer Password</label>
                  <input type="password" class="form-control" id="cpass" name="customerPass" placeholder="Enter Customer Password">
                </div>
                <div class="form-group">
                  <label for="">Customer Country</label>
                  <input type="text" class="form-control" id="ccountry" name="customerCountry" placeholder="Enter Customer Country">
                </div>
                <div class="form-group">
                  <label for="">Customer City</label>
                  <input type="text" class="form-control" id="ccity" name="customerCity" placeholder="Enter Customer City">
                </div>
                <div class="form-group">
                  <label for="">Customer Contact</label>
                  <input type="number" class="form-control" id="ccontact" name="customerContact" placeholder="Enter Customer Contact">
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                             <span class="input-group-text "  name="userProfile">Profile Image</span>
                    </div>
                    <div class="custom-file">
                         <input type="file" class="custom-file-input" name="userProfile" id="userProfile" >
                         <label class="custom-file-label" for="userProfile">Choose file</label>
                    </div>
               </div>

                <div class="form-group">
                  <label for="">Customer Address</label>
                  <input type="text" class="form-control" id="caddress" name="customerAddress" placeholder="Enter Customer Address">
                </div>
            
                <button type="submit" class="btn btn-warning btn-block" name="customer_btn">Submit</button>
              </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





            <table id="users_id" class="table table-hover">
                    <thead class="table-dark" >
                        <tr>
                            <th>Customer Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Contact</th>
                            <th>Admin Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
    
    </div>
    
            

    <!-- End of Analysis Tab -->


       <!-- Bootstrap & Jquery Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Custom Js Script -->

<!-- <script src="http://localhost/shoppn/js/validate.js"></script> -->
<script src="http://localhost/shoppn/js/script.js"></script>


     <!-- Datatables Js CDN -->
     <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</body>
</html>