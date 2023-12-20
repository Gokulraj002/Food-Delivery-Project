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
       background-image: url(image/new123.jpg);
        background-size: 100% 100%;
        background-attachment: fixed;
        background-repeat: no-repeat 
       }
   
   </style>


<body>

<?php   

include 'dbconn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['Password'];
     
     
    // Check login credentials
    $db = new dbconn(); 
    $result=$db->userselect($username, $password);
    if($row=$result->fetch_assoc()){

      
        $_SESSION['name']=$row['username'];
         $_SESSION['_id']=$row['user_id'];
         header('location:userdash.php'); 

    }

}
 ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 shadow-lg p-3">
                <h2 class="mb-4 text-white text-center">USER LOGIN</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label text-info">USER NAME:</label>
                        <input type="text" class="form-control rounded-0" id="name" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-info">PASSWORD : </label>
                        <input type="Password" class="form-control rounded-0" id="password" name="Password" required>
                    </div>

                     
                    <button type="submit" class="btn btn-dark">Login</button>
                    <p class="link text-white">Don't have an account? <a href='userreg.php' class="text-info">Registration Now</a></p>

                </form>
                       <form method="post" action="customerorder.php">
          <input type="hidden" name="reges_id" value="<?php echo $row['user_id'] ?>">
          </form> 
            </div>
        </div>
    </div>
    
     
</body>
</html>
