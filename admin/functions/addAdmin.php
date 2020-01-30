<?php 
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

if(isset($_POST["adminReg_btn"])){
    $adminFirstname = $_POST['adminFirstname'];
    $adminSurname = $_POST['adminSurname'];
    $adminEmail = $_POST['adminEmail'];
    $adminAge = $_POST['adminAge'];
    $adminGender = $_POST['adminGender'];
    $adminPassword = $_POST['adminPassword'];
    $adminPassword2 = $_POST['adminPassword2'];
    $adminUsername = $_POST['adminFirstname'].".".$_POST['adminSurname'];
    $adminSecurityCode = $_POST['adminCode'];
    // $adminProfile = $_POST['adminProfile'];
    $adminEmail = filter_var($_POST['adminEmail'],FILTER_SANITIZE_EMAIL);
        if(!filter_var($adminEmail,FILTER_VALIDATE_EMAIL)){
            echo("Invalid Email");
}else{
    $query1 = "SELECT * FROM admin";
    $result = mysqli_query($connect,$query1);
    $fetch_result = mysqli_fetch_object($result);
    $data = mysqli_num_rows($result);

if($adminFirstname == '' || $adminSurname == '' || $adminEmail == '' || $adminAge == '' || $adminGender == '' || $adminPassword == '' || $adminPassword2 == '' || $adminUsername == '' || $adminSecurityCode == ''){
        echo("Please fill all fields");
    }
    else{
        if(($data)<2){

            $folderName = "../profile/";
            $fileName = $folderName . basename($_FILES["adminProfile"]["name"]);
    
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    
            //get the dimensions of the image and store it in the variable '$check'
            $fileDimensions = getimagesize($_FILES["adminProfile"]["tmp_name"]);
            if($fileDimensions !== false) {
                //  echo "File is an image - " . $fileDimensions["mime"] . ".";
                // print_r($fileDimensions);
                $uploadOk = 1;
            } else{
                echo "File is not an image.";
                $uploadOk = 0;
            }




    
            if ($_FILES["adminProfile"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }



    
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }





        
    
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["adminProfile"]["tmp_name"], $fileName)) {
                // echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
                // echo '<image src="../images/'.basename( $_FILES["product_image"]["name"]).'">';
                if($adminPassword == $adminPassword2){
                    $adminPassword = md5($adminPassword);
                    $sql = "INSERT INTO admin(admin_firstname,admin_lastname,admin_age,admin_gender,admin_email,admin_password,security_code,admin_profile) values('$adminFirstname','$adminSurname','$adminAge','$adminGender','$adminEmail','$adminPassword','$adminSecurityCode','$fileName')";
                    $result2 = mysqli_query($connect,$sql);
                            
                    if($result2){
                        echo("Welcome Admin");
                        header('Location: http://localhost/shoppn/page/userlogin.html');
                    }else{
        
                    echo("Error Login");
                    }
            
                }else{
                    echo("Password mismatch");
                }
        
    
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }






    
        }else{
            echo("An adminstrator exists");
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
                <img src="https://images.pexels.com/photos/1364700/pexels-photo-1364700.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="Registration Slide Image" style="width: 42rem; height: 38rem; margin-top:9rem;" class="img-thumbnail shadow-lg  rounded-circle">
            </div>

            <div class="col-lg-7 col-md-9">
                <div class="rheader">    
                <h1 id="company-logo">Flames<span><i class="fas fa-fire-alt"></i></span></h1>
                 <p>Admin Registration</p>    
                 <p id="security-message">It takes two to find a dozen keys <span><i class="fas fa-key"></i></span></p> 
                </div>
                <hr>

                <div class="reg-body fixed">
                        <form method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="adminFirstname" name="adminFirstname" placeholder="Enter Firstname">
                                    <span id="adminFirstnameError"></span>
                                  </div>

                                  <div class="form-group col-md-6">
                                   
                                    <input type="text" class="form-control" id="adminSurname" name="adminSurname" placeholder="Enter Surname">
                                    <span id="adminSurnameError"></span>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <input type="text" class="form-control" id="adminEmail" name="adminEmail" placeholder="Enter email address">
                                  <span id="adminEmailError"></span>
                                </div>
   
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    
                                    <input type="number" class="form-control" id="adminAge" name="adminAge" placeholder="Enter Age">
                                    <span id="adminAgeError"></span>
                                  </div>
                                  <div class="form-group col-md-4">
                                   
                                    <select id="adminGender" name="adminGender" class="form-control">
                                      <option selected>---Gender---</option>
                                      <option value="male">male</option>
                                      <option value="female">female</option>
                                      <option value="transgender">transgender</option>
                                    </select>
                                  </div>
                                 
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <input type="password" class="form-control" id="adminPassword1" name="adminPassword" placeholder="Enter Password">
                                          <span id="adminPasswordError"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <input type="password" class="form-control" id="adminPassword2" name="adminPassword2" placeholder="Re-enter Password">
                                                <span id="adminPassword2Error"></span>
                                              </div>
                                      </div>
                                      <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <input type="password" class="form-control" id="adminCode"  name="adminCode" placeholder="Enter Security Code">
                                              <span id="adminSecurityError"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text " id="adminProfile" >Profile Image</span>
                                                    </div>
                                                    <div class="custom-file">
                                                      <input type="file" class="custom-file-input" id="adminProfilem"
                                                        aria-describedby="inputGroupFileAddon01"  name="adminProfile">
                                                      <label class="custom-file-label" for="adminProfile">Choose file</label>
                                                    </div>
                                                  </div>
                                                <span id="adminSecurityError"></span>
                                              </div>
                                          </div>
                                
                                <button type="submit" class="btn btn-warning btn-block" id="adminReg_btn" name="adminReg_btn"> <i class="fas fa-sign-in-alt"></i> Register</button>
                                <p style="text-align:right ;" > Already an  Admin <a href="http://localhost/shoppn/admin/pages/adminlog.html">Login</a></p>

                                <div id="admin-options">
                                    <p>Other options</p>
                                    <hr>
                                        <div class="row d-flex justify-content-center">
                                                <div class="col-lg-12">
                                                        <a href="http://localhost/shoppn/page/userlogin.html" class="btn btn-outline-danger">User Portal</a>
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