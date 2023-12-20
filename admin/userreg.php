 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Harley Foods</title>
  <link rel="icon" href="https://www.shutterstock.com/shutterstock/photos/2052869804/display_1500/stock-vector-fast-food-circle-frame-design-with-appetizing-hamburger-sandwich-and-pizza-slice-vector-template-2052869804.jpg" >
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <style type="text/css"></style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Grand Hotel' rel='stylesheet'>

    </head>
        

   <style>
       body{
        background-image: url('image/adminback3.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
       }
   </style>

<body>

<?php
session_start();
    include "dbconn.php";
    // echo $_SESSION['food'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    // $food_id= $_SESSION['food'];
    

    $db=new dbconn();
     $db->insertuser( $username, $email, $address, $password, $cpassword);

}

// Close the database connection
// $db->closeConnection();

?>


    <div class="container mt-5">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card bg-transparent shadow-lg">

          
                <form action="" method="post" enctype="multipart/form-data" >
                    <h2 class="mb-4 text-white text-center border-bottom p-3"> USER REGISTRATION FORM</h2>
                    <div class="mb-3">
                        <label for="ownername" class="form-label text-info">USER NAME:</label>
                        <input type="text" class="form-control rounded-0" id="username" name="username" required>
                    </div>
                   
                    <div class="mb-3">
                        <label for="email" class="form-label text-info">E-MAIL:</label>
                        <input type="email" class="form-control rounded-0" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label text-info">ADDRESS:</label>
                        <input type="text" class="form-control rounded-0" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-info">PASSWORD:</label>
                        <input type="password" class="form-control rounded-0" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="cpassword" class="form-label text-info">CONFIRM-PASSWORD:</label>
                        <input type="password" class="form-control rounded-0" id="cpassword" name="cpassword" required>
                    </div>
                   
                    <button type="submit" name="submit" class="btn btn-lg btn-info">Register</button>
                    <p class="link text-info">Already have an account? <a href='shoplog.php'>Login here</a></p>
                </form>
            </div>
        </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 
</body>
</html>




    </body>