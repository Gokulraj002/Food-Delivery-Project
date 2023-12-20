 <?php 
    session_start();
   if (!isset($_SESSION["name"])) {
   header("Location:userlog.php");
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Foods</title>
  <link rel="icon" href="https://www.shutterstock.com/shutterstock/photos/2052869804/display_1500/stock-vector-fast-food-circle-frame-design-with-appetizing-hamburger-sandwich-and-pizza-slice-vector-template-2052869804.jpg" >
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <style type="text/css"></style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Grand Hotel' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    </head>
    <style>

    .text{
         font-family:  times new romans;
         color: black;
         font-size: 30px;
      }
     .texts{
      text-shadow: 5px 4px 5px blue;
      font-family: "Sofia", sans-serif;
      color: white;
      cursor: pointer;
      }


      .cards {
      border-radius: 10px;
      float: left;
      transition: transform 0.3s;
    }

    .cards img {
      border-radius: 2px;
    }

    .cards:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      transform: scale(1.05);
    }
    .new{
      width: 33%;
      height: 430px;
      float: left;
    }

    </style>

    <body >
      

      <?php
      include 'dbconn.php';
     //    $session= new dbconn();
     //    $result1=$session->userselect1();
     //     if ($result1 && $result1->num_rows > 0) {
     //    $user = $result1->fetch_assoc();
     //    $_SESSION['id1'] = $user['user_id'];
    
     // }


      ?>




  







<div class="position relative">
  <img height="500px" src="https://b.zmtcdn.com/mx-onboarding-hero87f77501659a5656cad54d98e72bf0d81627911821.webp" class="w-100" alt="" role="presentation" style=" filter: blur(1px);">

 
<div class="position-absolute top-0">

  <nav class="navbar navbar-expand-sm  navbar-dark ">
  <div class="container-fluid row ">
    <div class="col-2"></div>
    <div class="col-4">
    <a class="navbar-brand text-white px-2 text" href="#"><strong>Ga</strong> Harley</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon "></span>
    </button>
  </div>
    <div class="col -6 collapse navbar-collapse  justify-content-center  " id="collapsibleNavbar">
      <ul class="navbar-nav ">
        <li class="nav-item ">
          <a class="nav-link text-white ms-4 px-5 text-white fs-5" href='index.php'>Home  </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white ms-3 px-5 text-white fs-5" href='userorder.php'><b>order</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white ms-2 px-5 text-white fs-5" href='usercart.php'><b><i class="fa fa-shopping-cart text-white me-2 mt-2  float-start   " aria-hidden="true"></i>cart</b></a>
        </li> 
         
         <li class="nav-item">
          <a class="nav-link text-white mx-2  px-5 text-white fs-5" href="userlogout.php"><b>Log Out</b></a>
        </li>  
      </ul>
    </div>
  </div>
</nav>
              
</div>
<div class="position-absolute bottom-50  " >
  <div style="margin-left: 210px; margin-bottom: -93px;" >
   <h1 class="text-white texts">Welcome to Harley<br>
 food order app first deliver is free!</h1>
<p class="text-white fs-5  "> Buy 4 products at same time u got a discount 50%.</p>
  <a href='shopreg.php'><button style="margin-left:70px;" class="btn btn-primary mt-2 btn-lg shadow text-white rounded-0" >UPDATE PROFILE</button></a>

 <p class="text-white mt-2"> Need help? Please email us at<b> nhsquad@harley.com</b></p>
</div>
</div>
</div>

<div class=" container p-3  mt-3">
<?php



$new = new dbconn();
$result = $new->select1();

if ($result) {
    while ($row = $result->fetch_assoc()) {
    
        ?>
        <div class="container mb-5 new">
            <div class="cards mb-3 text-center">
                <h5 class="text my-2"><?php echo $row['shop_name']; ?></h5>
                <a href="#">
                <img src="<?php echo $row['food_image']; ?>" alt="Food Image" 
                    width="300px" height="250px">
                </a>
                <h5 class="text"><?php echo $row['food_name']; ?></h5>
                <p><b><?php echo $row['discount_price']; ?></b><del class="mx-3"><?php echo $row['original_price']; ?></del></p>

        <form method="post" action="usercart.php">
          <input type="hidden" name="reges_id" value="<?php echo $row['reges_id']; ?>">  
          <input type="hidden" name="food_name" value="<?php echo $row['food_name']; ?>">          
          <input type="hidden" name="discount_price" value="<?php echo $row['discount_price']; ?>">
          <input type="number" name="quantity" value="1" min="1" max="10"class="btn btn-lg btn-primary rounded-0" style="margin-top: -19px;">
          <input type="hidden" name="food_image" value="<?php echo $row['food_image']; ?>">
          <button class="btn btn-primary btn-lg mb-3 rounded-0" name="buynow">Buy Now</button>
       </form>
      
            </div>
        </div>
        <?php
    }
}
?>




</div>
</body>