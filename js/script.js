$(document).ready(function(){
    // Admin Registration 
    // $("#adminReg_btn").click(function(){
    //     var adminFirstName = $("input#adminFirstname").val();
    //     var adminSurname = $("input#adminSurname").val();
    //     var adminEmail = $("input#adminEmail").val();
    //     var adminAge = $("input#adminAge").val();
    //     var adminGender = $("#adminGender").val();
    //     var adminUsername = adminFirstName + "." + adminSurname;
    //     var adminPassword = $("input#adminPassword1").val();
    //     var adminPassword2 = $("input#adminPassword2").val();
    //     var adminCode = $("input#adminCode").val();
    //     var adminImage = $("input#adminProfile").val();

    //     console.log(adminEmail);

    //     // Returns successful data submission message when the entered information is stored in database.
    //     var dataString = 'firstname=' + adminFirstName + '&surname=' + adminSurname + '&email=' + adminEmail + 
    //     '&age=' + adminAge + '&adminGender=' + adminGender +'&adminUsername=' + adminUsername +'&adminPassword=' + adminPassword + '&adminPassword2=' + adminPassword2 + '&adminCode=' + adminCode + '&adminImage=' + adminImage;

    //     console.log(dataString);
    //     if(adminFirstName == '' || adminSurname == '' || adminEmail == '' || adminAge == '' || adminGender == '' || adminPassword == '' || adminPassword2 == '' || adminUsername == '' || adminCode == '' || adminImage == '') {
    //         $("span#regErrorMessage").html("Please fill required fields");
    //         $("span#regErrorMessage").css({"color":"red"});
    //         $("span#regErrorMessage").show();

    //     }
    //     else {
    //         $("span#regErrorMessage").hide();
    //         console.log("Moves to else");
    //     // AJAX code to submit form.
    //     $.ajax({
    //     type: "POST",
    //     url: "http://localhost/shoppn/admin/functions/addAdmin.php",
    //     data: dataString,
    //     success: function(html) {
    //         if(html == "Welcome Admin"){
    //             $("form")[0].reset();
    //             window.location.href = "http://localhost/Skates/admin/page/login.html";
    //         }
    //         else{
    //             document.getElementById('regErrorMessage').innerHTML=html;
    //             $("#regErrorMessage").css({"color":"red"});
    //         }
    //     alert(html);
    //     }
    //     });
    //     }
    //     return false;

    // })

    


    // User Registration 
    // $("#userReg_btn").click(function(){
    //     var userFirstName = $("input#userFirstname").val();
    //     var userSurname = $("input#userSurname").val();
    //     var userFullname = userFirstName + " " + userSurname;
    //     var userEmail = $("input#userEmail").val();
    //     var userAddress = $("input#userHome").val();
    //     var userCity = $("input#userCity").val();
    //     var userCountry = $("input#userCountry").val();
    //     var userPhone = $("input#userContact").val();
    //     var userAge = $("input#userAge").val();
    //     var userGender = $("#userGender").val();
    //     // var userUsername = userFirstName + "." + userSurname;
    //     var userPassword = $("input#userPassword1").val();
    //     var userPassword2 = $("input#userPassword2").val();
    //     var userProfile = $('input#userProfile').val();
        

    //     // Returns successful data submission message when the entered information is stored in database.
    //     var dataString = 'fullname=' + userFullname  + '&email=' + userEmail  + '&age=' + userAge + '&city=' + userCity + 
    //     '&country=' + userCountry + '&phone=' + userPhone + '&userGender=' + userGender  +'&userPassword=' + userPassword + 
    //     '&userPassword2=' + userPassword2 + '&profile=' + userProfile + '&address=' + userAddress;

        
    //     if(userFirstName == "" || userEmail == '' || userAddress == '' || userAge == '' || userGender == '' || userPassword == '' || userPassword2 == '' || userCity == ' ' || userCountry == '' || userProfile == '' || userPhone == '' || userAddress == '') {
    //     alert("Please Fill All Fields");

    //     }
    //     else {
    //         console.log(dataString);
    //         console.log("Moves to else");
    //     // AJAX code to submit form.
    //     $.ajax({
    //     type: "POST",
    //     url: "http://localhost/shoppn/function/addUser.php",
    //     data: dataString,
    //     success: function(html) {
    //         if(html == "You have Successfully Registered"){
    //             $("form")[0].reset();
    //             window.location.href = "http://localhost/Skates/page/login.html";
    //         }
    //         else{
    //             document.getElementById('regErrorMessage').innerHTML=html;
    //             $("#regErrorMessage").css({"color":"red"});
    //         }
    //     alert(html);
    //     }
    //     });
    //     }
    //     return false;

    // })

     // Admin Login
     $("#adminLogin_btn").click(function(){
        var adminEmail = $("input#adminEmail").val();
        var adminPassword = $("input#adminpassword1").val();
        var adminCode =$("input#adminSecurityCode").val();

        console.log(adminEmail);
        var dataString = 'adminEmail=' + adminEmail + '&adminPassword=' + adminPassword + '&adminCode=' + adminCode;
        console.log(dataString);

        if(adminEmail == '' || adminPassword == '' || adminCode == ''){
            alert("Please Fill All fields");
        }
        else {
            console.log("Going to else");
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "http://localhost/shoppn/admin/functions/login.php",
        data: dataString,
        success: function(html) {
console.log(html);
            if(html == "Login Successfully"){
                 window.location.href = "http://localhost/shoppn/admin/pages/adminportal.html";
                document.getElementById('regErrorMessage').innerHTML= html;
                $("#logErrorMessage").css({"color":"blue"});
                $("form")[0].reset();
            }
            else{
                document.getElementById('regErrorMessage').innerHTML=html;
                $("#regErrorMessage").css({"color":"red"});
                $("form")[0].reset();
                
            }
        alert(html);
        }
        });
        }
        return false;
    })

     // User Login
     $("#userLogin_btn").click(function(){
        var customerEmail = $("input#userEmail").val();
        var customerPassword = $("input#userPassword").val();

        var dataString = 'customerEmail=' + customerEmail + '&customerPassword=' + customerPassword;
        console.log(dataString);

        if(customerEmail == '' || customerPassword == ''){
            alert("Please Fill All fields");
        }
        else {
            console.log("Going to else");
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "http://localhost/shoppn/function/login.php",
        data: dataString,
        success: function(html) {
// console.log(html);
            if(html == "Login Successfully"){
                 window.location.href = "http://localhost/shoppn/page/landingPage.html";
                document.getElementById('logErrorMessage').innerHTML= html;
                $("#logErrorMessage").css({"color":"blue"});
                $("form")[0].reset();
            }
            else{
                document.getElementById('logErrorMessage').innerHTML=html;
                $("#logErrorMessage").css({"color":"red"});
                $("form")[0].reset();
            }
        alert(html);
        }
        });
        }
        return false;

    })

    
    $('#userlogout_btn').hide();
   
    // User Portal
    $.ajax({
        type: "GET",
        url: "http://localhost/shoppn/function/userPortal.php",
        datatype :'json',
        success : function(data){
                var user = JSON.parse(data);
                console.log(data);
                for(var i = 0; i < user.length; i++){
                    var users = user[i];
                    
                    var customer_id = users.customer_id;
                    var customer_name = users.customer_name;
                    var customer_country = users.customer_country;
                    var customer_email = users.customer_email;
                    var customer_city = users.customer_city;
                    var customer_address = users.customer_address;
                    var customer_contact = users.customer_contact;
                    var customer_image = users.customer_image;

                    document.getElementById('userName').innerHTML=customer_name;
                    document.getElementById('screenName').innerHTML=customer_name;
                    $('#userProfile').html('<img src="'+customer_image+'" class="rounded-circle" style="width:2.5rem; height:2.5rem;" alt="UserProfile">');

                    if(customer_id !== ""){
                        $('#logmessage').hide();
                        $('#userlogout_btn').show();
                        $('#plogin_btn').hide();
                        $('#notify_btn').show();
                    }
                    else{
                        $('#userlogout_btn').hide();
                        $('#notify_btn').hide();
                    }
                }  
        },error:function(e){

        }
    });

//  LogOut Section
    $("#userlogout_btn").click(function(){
        $.ajax({
            type: "GET",
            url: "http://localhost/shoppn/function/logout.php",
            datatype :'json',
            success : function(html){
                console.log(html);
                if(html == "Logged Out"){
                     window.location.href = "http://localhost/shoppn/page/userlogin.html";
                    
                }
                
            alert(html);
    
               
            },error:function(e){
    
            }
        });

    })

// Categories Count , Brand Count, userCount Section
    $.ajax({
        type: "GET",
        url: "http://localhost/shoppn/admin/functions/adminPortal.php",
        datatype :'json',
        success : function(data){
                var userC = JSON.parse(data);
                // console.log(data);
                for(var i = 0; i < userC.length; i++){
                    var usersC = userC[i];
                    
                    var admin_id = usersC.user_id;
                    var admin_username = usersC.adminUsername;
                    var userCount = usersC.userCount;
                    var categoryCount = usersC.categoryCount;
                    var brandCount = usersC.brandCount;
                   

                    $("#userCount").html(userCount);
                    $("#adminUsername").html(admin_username);
                    $("#catCount").html(categoryCount);
                    $("#brandCount").html(brandCount);
                   
                
                }

           
        },error:function(e){

        }
    });


var brantab = $("#brands_id tbody"); 
        $.ajax({
            type: "GET",
            url: "http://localhost/shoppn/admin/functions/brandDisplay.php",
            datatype :'json',
            success : function(data){
                var data = JSON.parse(data);
                // console.log(data);
                for(var i = 0; i< data.length; i++){
                    var brands = data[i];
                    brantab.append('<tr>'+
                    '<td>' + brands.brand_id + '</td>'+
                    '<td>' + brands.brand_name + '</td>'+
                    '<td><a href="" class="btn btn-danger btn-sm" style="color:white;">Delete <i class="fas fa-trash-alt"></i></a></td>'+
                    '</tr>');
                }
                $('#brands_id').DataTable();
            },error:function(e){

            }
        });

        var categtab = $("#categtab_id tbody");
        $(document).ready(function(){
            
                $.ajax({
                    type: "GET",
                    url: "http://localhost/shoppn/admin/functions/CategoryDisplay.php",
                    datatype :'json',
                    success : function(data){
                        var data = JSON.parse(data);
                        // console.log(data);
                        for(var i = 0; i< data.length; i++){
                            var category = data[i];
                            categtab.append('<tr>'+
                            '<td>' + category.cat_id + '</td>'+
                            '<td>' + category.cat_name + '</td>'+
                            '<td><a href="" class="btn btn-danger btn-sm" style="color:white;">Delete <i class="fas fa-trash-alt"></i></a></td>'+
                            '</tr>');
        
                            
        
                        }
                        $('#categtab_id').DataTable();
                    },error:function(e){
        
                    }
                });
                
        });

        
        
        var userstab = $("#users_id tbody");
        $(document).ready(function(){
            
                $.ajax({
                    type: "GET",
                    url: "http://localhost/shoppn/admin/functions/userDisplay.php",
                    datatype :'json',
                    success : function(data){
                        var data = JSON.parse(data);
                        console.log(data);
                        for(var i = 0; i< data.length; i++){
                            var users = data[i];
                            userstab.append('<tr>'+
                            '<td>' +
                             '<p style="font-weight:bold; ">' + users.customer_id  + '</p>'
                             + '</td>'+
                            '<td>' +
                             '<p style="font-weight:bold;">' + users.customer_name  + '</p>'
                             + '</td>'+
                            '<td>' + 
                            '<p style="font-weight:bold; ">' + users.customer_email   + '</p>'
                            + '</td>'+
                            '<td>' + 
                            '<p style="font-weight:bold; ">' + users.customer_country    + '</p>'
                            + '</td>'+
                            '<td>' +
                             '<p style="font-weight:bold; ">' + users.customer_city    + '</p>'
                             + '</td>'+
                            '<td>' +
                             '<p style="font-weight:bold; ">' +  users.customer_contact  + '</p>' 
                             + '</td>'+
                            '<td><a href="" class="btn btn-danger btn-sm" style="color:white;">Delete <i class="fas fa-trash-alt"></i></a>'+
                            '<a href="" class="btn btn-warning btn-sm disabled" disabled style="color:white;">View Details<i class="fas fa-trash-alt"></i></a>'+
                            '</td>'+
                            '</tr>');
                        }
                        $('#users_id').DataTable();
                    },error:function(e){
        
                    }
                });
                
        });

        var productstab = $("#products_id tbody");
        $(document).ready(function(){
            
                $.ajax({
                    type: "GET",
                    url: "http://localhost/shoppn/admin/functions/productDisplay.php",
                    datatype :'json',
                    success : function(data){
                        var data = JSON.parse(data);
                        console.log(data);
                        for(var i = 0; i< data.length; i++){
                            var users = data[i];
                            productstab.append('<tr>'+
                            '<td>' +
                            '<p style="font-weight:bold; margin-top:2rem;">' + users.product_id + '</p>'
                            +'</td>'+
                            '<td>' + 
                            '<p style="font-weight:bold; margin-top:2rem;">' + users.product_title + '</p>'
                            +'</td>'+
                            '<td>' + 
                            '<p style="font-weight:bold; margin-top:2rem;">'+ 'GH₵ ' + users.product_price + '</p>'
                            +'</td>'+
                            '<td>' +
                             '<p style="font-weight:bold; margin-top:2rem;">' + users.product_desc+ '</p>'
                            +'</td>'+
                            '<td>' +
                            '<img src="'+users.product_image+'" class="rounded-circle" style="width:5rem; height:5rem; alt="Product Image">'
                            + '</td>'+
                            '<td><a href="" class="btn btn-danger btn-sm" style="color:white; margin-top:2rem;">Delete <i class="fas fa-trash-alt"></i></a>'+
                            '<a href="" class="btn btn-warning btn-sm disabled" disabled style="color:white; margin-top:2rem;">View Details<i class="fas fa-trash-alt"></i></a>'+
                            '</td>'+
                            '</tr>');
                        }
                        $('#products_id').DataTable();
                    },error:function(e){
        
                    }
                });
                
        });


        // Display Brands in dropdown
    // var container = $("#brand");
    $.ajax({
        type: "GET",
        url: "http://localhost/shoppn/admin/functions/brandDisplay.php",
        datatype :'json',
        success : function(data){
                var data = JSON.parse(data);
                // console.log(data);
                for(var i = 0; i < data.length; i++){
                    var brands = data[i];
                    
                    var brand_id = brands.brand_id;
                    var timestamp = brands.timestamp;
                    var brand_name = brands.brand_name;

                    // console.log(brand_name);

                    $("#brand").append('<option value="'+brand_id+'">'+brand_name+'</option>');            
                }

           
        },error:function(e){

        }
    });


 // Display Categories in dropdown
 $.ajax({
     type: "GET",
     url: "http://localhost/shoppn/admin/functions/categoryDisplay.php",
     datatype :'json',
     success : function(data){
             var data = JSON.parse(data);
             // console.log(data);
             for(var i = 0; i < data.length; i++){
                 var categories = data[i];
                 
                 var category_id = categories.cat_id;
                 var category_name = categories.cat_name;

                //  console.log(category_name);

                 $("#category").append('<option value="'+category_id+'">'+category_name+'</option>');
                 $("#catmenu .card-body").append('<a href="'+category_id+'">'+category_name+'</a><br>');
                 $("#catnav").append(' <a class="dropdown-item" href="'+category_id+'">'+category_name+'</a>');
                

             }
     },error:function(e){

     }
 });


 // Product Display 
$.ajax({
    type: "GET",
    url: "http://localhost/shoppn/admin/functions/productDisplay.php",
    datatype :'json',
    success : function(data){
            var data = JSON.parse(data);
            // console.log(data);
            for(var i = 0; i < data.length; i++){
                var products= data[i];
                
                var product_id = products.product_id;
                var product_title = products.product_title;
                var product_price = products.product_price;
                var product_desc = products.product_desc;
                var product_Image = products.product_image;
                var product_keywords = products.product_keywords;

                // console.log(products);

                $("#prodDisplay .row").append('<div class="col-lg-4">'+  
                '<div class="card shadow-lg" style="width: 22rem;"> <img src="'+ product_Image +'" class="card-img-top" style="height: 15rem;" alt="...">'+
                '<div class="card-body shadow-lg ">'+ 
                '<h5 class="card-title">'+ product_title +'</h5>'+
                '<p class="card-text">'+'GHC'+ ' ' + product_price +'</p>'+
                '<p class="card-text">'+product_desc +'</p>'+
                '<a class=" btn btn-outline-warning" style="margin-left:2.2rem;" href="http://localhost/shoppn/function/view.php?id='+ product_id+'"> View Product </a>'+
                '<a class="btn btn-outline-danger" style="margin-left:0.4rem;" href="http://localhost/shoppn/function/view.php?id='+ product_id+'"> Add to Cart </a>'
                +'</div>'
                +'</div>'+
                '</div>');        
            }
    },error:function(e){
    }
});


$("input#searchInput").focusout(function(){
    var searchInput = $("#searchInput").val();

    // $("#searchInput").each(function(){
        var searchInput = this.value;
        var dataString = 'searchInput=' + searchInput;
        if(searchInput !== ''){
                   
    $(".nav-off").hide();
    $("#page-body").hide();
    $("#searchDisplay").show();
    console.log("lets go");
    $.ajax({
        type: "POST",
        url: "http://localhost/shoppn/function/search.php",
        data: dataString,
        success: function(html) {
        $('#searchInput').val('').removeAttr('checked').removeAttr('selected');
        var data = JSON.parse(html);
            console.log(data);

            for(var i = 0; i < data.length; i++){
                var products= data[i];
                
                var product_id = products.product_id;
                var product_title = products.product_title;
                var product_price = products.product_price;
                var product_desc = products.product_desc;
                var product_Image = products.product_image;
                var product_keywords = products.product_keywords;

                console.log(products);

                $("#searchResult .row").append('<div class="col-lg-3">'+  
                '<div class="card shadow-lg" style="width: 22rem; margin-left: 7rem;"> <img src="'+ product_Image +'" class="card-img-top" style="height: 15rem;" alt="...">'+
                '<div class="card-body shadow-lg ">'+ 
                '<h5 class="card-title">'+ product_title +'</h5>'+
                '<p class="card-text">'+'GHC'+ ' ' + product_price +'</p>'+
                '<p class="card-text">'+product_desc +'</p>'+
                '<a class=" btn btn-outline-warning" style="margin-left:2.2rem; href="'+ product_id+'"> View Product </a>'+
                '<a class="btn btn-outline-danger" style="margin-left:0.4rem;" href="'+ product_id+'"> Add to Cart </a>'
                +'</div>'
                +'</div>'+
                '</div>');        
            }

            if( html == ""){
                console.log("No products found");
            }
           
        alert(html);
        }
        });
               }
        else{
            alert("Please search for something");
            $("#page-body").show();
           



   }
        
    // })
})



// $("#searchnav_btn").click(function(){
//    var searchInput = $("#searchInput").val();
//    var dataString = 'searchInput=' + searchInput;

//    if(searchInput == ''){
//        alert("Please search for something");
//        $("#page-body").show();
//    }
//    else{
//     $("#nav-off").hide();
//     $("#page-body").hide();
//     $("#searchDisplay").show();
//     console.log("lets go");
//     $.ajax({
//         type: "POST",
//         url: "http://localhost/shoppn/function/search.php",
//         data: dataString,
//         success: function(html) {
            
//         var data = JSON.parse(html);
//             console.log(data);
//             for(var i = 0; i < data.length; i++){
//                 var products= data[i];
                
//                 var product_id = products.product_id;
//                 var product_title = products.product_title;
//                 var product_price = products.product_price;
//                 var product_desc = products.product_desc;
//                 var product_Image = products.product_image;
//                 var product_keywords = products.product_keywords;

//                 console.log(products);

//                 $("#searchResult .row").append('<div class="col-lg-3">'+  
//                 '<div class="card shadow-lg" style="width: 22rem; margin-left: 7rem;"> <img src="'+ product_Image +'" class="card-img-top" style="height: 15rem;" alt="...">'+
//                 '<div class="card-body shadow-lg ">'+ 
//                 '<h5 class="card-title">'+ product_title +'</h5>'+
//                 '<p class="card-text">'+'GHC'+ ' ' + product_price +'</p>'+
//                 '<p class="card-text">'+product_desc +'</p>'+
//                 '<a class=" btn btn-outline-warning" style="margin-left:2.2rem; href="'+ product_id+'"> View Product </a>'+
//                 '<a class="btn btn-outline-danger" style="margin-left:0.4rem;" href="'+ product_id+'"> Add to Cart </a>'
//                 +'</div>'
//                 +'</div>'+
//                 '</div>');        
//             }

//             $("#searchInput").reset();

//             if( html == ""){
//                 console.log("No products found");
//             }
           
//         alert(html);
//         }
//         });


//    }

// })


$("#closeSearch").click(function(){
    $("#searchDisplay").hide();
    $("#page-body").show();
    $(".nav-off").show();
})
        
        

// $("#prodDisplay").slideUp();    

})