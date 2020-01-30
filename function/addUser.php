<?php 
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

if(isset($_POST["userReg_btn"])){
    $userFullname = $_POST['userFirstname'] . " " . $_POST['userSurname'];
    $userEmail = $_POST['userEmail'];
    $userAddress = $_POST['userHome'];
    $userCity = $_POST['userCity'];
    $userCountry = $_POST['userCountry'];
    $userPhone = $_POST['userContact'];
    $userGender = $_POST['userGender'];
    $userPassword = $_POST['userPassword'];
    $userPassword2 = $_POST['userPassword2'];
    // $userProfile = $_POST['profile'];
    
    // $userProfile = $_POST['userProfile'];
    $userEmail = filter_var($_POST['userEmail'],FILTER_SANITIZE_EMAIL);
        if(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)){
            echo("Invalid Email");
}else{
    $query1 = "SELECT * FROM customer WHERE customer_email = '$userEmail'";
    $result = mysqli_query($connect,$query1);
    $fetch_result = mysqli_fetch_object($result);
    // var_dump($fetch_result);
    $data = mysqli_num_rows($result);

if($userFullname == "" || $userEmail == "" || $userAddress == "" ||  $userCity == "" ||  $userCountry == ""  || $userPhone == "" ||  $userGender == ""  || $userPassword == "" || $userPassword2 == ""){
    echo("Please fill all fields");

    }else{

if(($data)==0){
    $folderName = "../users/";
    $fileName = $folderName . basename($_FILES["userProfile"]["name"]);

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
        if($userPassword === $userPassword2){
            $userPassword = md5($userPassword);
            $sql = "INSERT INTO customer(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address) values('$userFullname','$userEmail','$userPassword','$userCountry','$userCity','$userPhone','$fileName','$userAddress')";
        //    var_dump($sql);
            $result1 = mysqli_query($connect,$sql);
        }
        else{
            echo("Password mismatch");
        }

    }
    else{
        echo "Sorry, there was an error uploading your file.";
    }

}

    if($query1){
        echo("You have Successfully Registered");
     
     }else{

    echo("Registration Error");
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
    <!-- BootStrap Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="http://localhost/shoppn/css/style.css">
    <link rel="stylesheet" href="http://localhost/shoppn/css/register.css">
    <!-- Fontawesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <title>Flames - Admin</title>
</head>
<body>
<div class="register-bck">
    <div class="register-box">
        <div class="row">
            <div class="col-lg-5 col-md-3">
                <img src="https://images.pexels.com/photos/1963528/pexels-photo-1963528.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="Registration Slide Image" style="width: 42rem; height: 38rem; margin-top:9rem;" class="img-thumbnail shadow-lg  rounded-circle">
            </div>

            <div class="col-lg-7 col-md-9">
                <div class="rheader">    
                <h1 id="company-logo">Flames<span><i class="fas fa-fire-alt"></i></span></h1>
                 <p>User Registration</p>
                 <p id="rscreen-message">Shop till you drop</p>
                </div>
                <hr>

                <div class="reg-body">
                        <form method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="userFirstname" name="userFirstname" placeholder="Enter Firstname">
                                    <span id="userFirstnameError"></span>
                                  </div>

                                  <div class="form-group col-md-6">
                                   
                                    <input type="text" class="form-control" id="userSurname" name="userSurname" placeholder="Enter Surname">
                                    <span id="userSurnameError"></span>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <input type="text" class="form-control" id="userEmail" name="userEmail" placeholder="Enter email address">
                                  <span id="userEmailError"></span>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="userHome" name="userHome" placeholder="Enter address">
                                    <span id="userHomeError"></span>
                                  </div>
   
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    
                                    <input type="number" class="form-control" id="userAge" name="userAge" placeholder="Enter Age">
                                    <span id="userAgeError"></span>
                                  </div>
                                  <div class="form-group col-md-4">
                                   
                                    <select id="userGender" name="userGender" class="form-control">
                                      <option selected>---Gender---</option>
                                      <option value="male">male</option>
                                      <option value="female">female</option>
                                      <option value="transgender">transgender</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                      <input type="number" class="form-control" id="userContact" name="userContact" placeholder="Enter Phone Number">
                                      <span id="userContactError"></span>

                                    </div>
                                    <div class="form-group col-md-4">
                                     <input type="text" class="form-control" id="userCountry" name="userCountry" placeholder="Enter Country">
                                      <span id="userCountryError"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="userCity" name="userCity" placeholder="Enter City">
                                         <span id="userCityError"></span>
                                       </div>
                                  </div>
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <input type="password" class="form-control" id="userPassword1" name="userPassword" placeholder="Enter Password">
                                          <span id="userPasswordError"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="password" class="form-control" id="userPassword2" name="userPassword2"  placeholder="Re-enter Password">
                                                <span id="adminPassword2Error"></span>
                                              </div>
                                      </div>
                                      <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text " id="userProfile" name="userProfile">Profile Image</span>
                                                    </div>
                                                    <div class="custom-file">
                                                      <input type="file" class="custom-file-input" name="userProfile"
                                                        aria-describedby="inputGroupFileAddon01">
                                                      <label class="custom-file-label" for="userProfile">Choose file</label>
                                                    </div>
                                                  </div>
                                                <span id="userSecurityError"></span>
                                              </div>
                                          </div>
                                
                                <button type="submit" class="btn btn-warning btn-block" id="" name="userReg_btn"> <i class="fas fa-sign-in-alt" ></i> Register</button>
                                <p style="text-align:right ;" > Already an  User <a href="http://localhost/shoppn/page/userlogin.html">Login</a></p>

                                <div id="user-options">
                                    <p>Other options</p>
                                    <hr>
                                        <div class="row d-flex justify-content-center">
                                                <div class="col-lg-12">
                                                        <a href="http://localhost/shoppn/page/landingPage.html" class="btn btn-outline-warning">Move to Site</a></p>
                                                </div>
                                            </div>
                                </div>
                               
                                
                                <span id="regErrorMessage"></span>
                              </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap & Jquery Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Custom Js Script -->

<!-- <script src="http://localhost/shoppn/js/validate.js"></script> -->
<script src="http://localhost/shoppn/js/script.js"></script>
    
</body>
</html>