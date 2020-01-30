
<?php 
header('Access-Control-Allow-Origin: *');
require_once 'db_connection.php';

$adminId = $_SESSION['admin_id'];

if(isset($_POST["category_btn"])){
    $categoryInsert = $_POST['categoryQuery'];

    $checkQuery = "SELECT cat_name FROM categories WHERE cat_name = '$categoryInsert'";
    $result1 = mysqli_query($connect,$checkQuery);
    $queryCount = mysqli_num_rows($result1);


    if($queryCount > 0){
        echo("Brand Already exists");
    }
    else{
        if($categoryInsert !== "" && $adminId !== ""){
            $sql = "INSERT INTO categories(cat_name) values('$categoryInsert')";
            $result = mysqli_query($connect,$sql);
    
            if(isset($result)){
                echo("Category Inserted");
            }    
            else{
                echo("Failed to insert");
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
            <li class="nav-item active">
              <a class="nav-link" href="http://localhost/shoppn/admin/functions/addCategory.php">Categories <i class="fas fa-th-list"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/shoppn/admin/functions/addUser.php">Users <i class="fas fa-users"></i></a>
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

    <!-- Category Tab  -->
    <div id="categoryT">
        <h1> Category</h1>

              <!-- Add Category  -->
    <div id="BtnSec">
            <div class="row">
            <div class="col-lg-12">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"> Add Category</button>
            </div>
        </div>
        </div>

        <!-- Brand Input -->
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" >
                <div class="form-group">
                  <label for="">Category Name</label>
                  <input type="text" class="form-control" id="categoryquery" name="categoryQuery" placeholder="Enter Category">
        
                </div>
            
                <button type="submit" class="btn btn-warning btn-block" name="category_btn">Submit</button>
              </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



        <!-- Category Table  -->
            <table id="categtab_id" class="table table-hover">
                    <thead class="table-dark" >
                        <tr>
                            <th>Category id</th>
                            <th>Category Title</th>
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