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
    <style >

        
   .name{
        text-shadow: 5px 4px 5px red;
         font-family: 'Grand Hotel';
         color: white;
         text-transform: 50%;
        cursor: pointer;
      }        

    .text{
        text-shadow: 5px 4px 5px red;
         font-family: 'Grand Hotel';
         color: white;
      }
    
    .texts{
         text-shadow: 5px 4px 5px red;
      }
    
     a:hover{
        text-shadow:5px 4px 5px blue; ;
      }
    
     a{
        text-decoration: none;
          color:revert-layer;

      }
     
      body{

        background-image:url('image/new.jfif');
        background-repeat: no-repeat;
        background-size: 100% 100% ;
        background-attachment: fixed;
      }
.glow

 {
  font-size: 45px;
  color: #fff;
  text-align: center;
  animation: glow 1s ease-in-out infinite alternate;
  cursor: pointer;
}

/*

@-webkit-keyframes glow 
{
  from 
  {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
  }
  
  to {
    text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
  }
}
*/
    </style>

    <body>
          <?php

            include 'dbconn.php';
            $db = new dbconn();
            $food=$db->select1();
            $user=$db->user();
            $admin=$db->admin();
            $order=$db->order();
            $food=mysqli_num_rows($food);
            $user=mysqli_num_rows($user);
            $admin=mysqli_num_rows($admin);
           $order=mysqli_num_rows($order);
           
          
        


      ?>    
 <header>
      <div class="container  shadow mt-3">
          <nav class="navbar navbar-expand-lg navbar-dark  " >
  
    <p class="name text-bold display-6">Harley Food</p>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar border ">
      <ul class="navbar-nav me-auto fw-bold px-4 ">
        <li class="nav-item px-5 fs-4 banner-btn">

          <a class=" text-white texts active" href='admin.php'> Home  </a>
        </li>

        <li class="nav-item px-5 fs-4 banner-btn">

          <a class=" text-white texts" href='adminadmin.php '>Admin</a>

        </li>
        <li class="nav-item px-5 fs-4 banner-btn">
          <a class=" text-white texts " href='adminuser.php'>Users</a>
        </li>
        <li class="nav-item px-5 fs-4 banner-btn">
          <a class=" text-white texts" href='adminfood.php'>Food</a>
        </li>
        <li class="nav-item px-5 fs-4 banner-btn">
          <a class=" text-white texts" href='adminorder.php'>orders</a>
        </li>
      </ul>
    </div>

</nav> 
</div>
</header>
<section>
  <div class="container shadow mt-5">

    <h1 class="text-center text-white texts border-bottom mb-5 glow"> ADMIN DASHBOARD</h1>
<div class="row text-center">
    <div class="col-1"></div>
    <div class="bg-white rounded-pill col-3 p-2 shadow mb-3 me-5   text-center">
      <h1><i class="fa fa-home text-info float-start banner-btn me-2 w-50" aria-hidden="true"></i></h1><h2><span class="float-end pe-5"> <?php  echo $admin; ?></span></h2><br>
        <p class=" mt-5 fs-4 pe-4 text-dark"style="text-align: right;"><a href="adminadmin.php"> Restaraunts</a></p>

    </div>

    <div class="bg-white  rounded-pill col-3 shadow p-2 me-5 mb-3  text-center ">
      <h1><i class="fa fa-user text-info banner-btn  float-start me-2 w-50" aria-hidden="true"></i></h1><h2><span class="float-end pe-5"> <?php  echo $user; ?></span></h2><br>
        <p class=" mt-5 fs-4 pe-4"style="text-align:right;"><a href="adminuser.php">Users</a></p>

    </div>


    <div class="bg-white p-2 rounded-pill shadow col-3 mb-3 me-4 text-center">
      <h1><i class="fa fa-shopping-basket text-info float-start banner-btn  me-2 w-50" aria-hidden="true"></i></h1><h2 ><span class="float-end pe-5"> <?php  echo $food; ?></span></h2><br>
        <p class=" mt-5 fs-4 pe-4"style="text-align: right;"><a href="adminfood.php"> Dishes</a></p>

    </div>
  </div>
  <div class="row text-center mt-4">

    <div class="col-2"></div>

    <div class="bg-white rounded-pill p-2 mb-3 shadow col-3 me-5 ms-4 text-center">
      <h1><i class="fa fa-shopping-cart text-info float-start me-2 w-50 banner-btn " aria-hidden="true"></i></h1><h2><span class="float-end pe-5"> <?php  echo $order; ?></span></h2><br>
        <p class=" mt-5 fs-4 pe-4"style="text-align: right;"><a href="adminorder.php">Order</a></p>

    </div>
    
    <div class="bg-white rounded-pill p-2 mb-3 shadow col-3 text-center">
      <h1><i class="fa fa-trash-o  text-info float-start banner-btn me-2 w-50" aria-hidden="true"></i></h1><h2><span class="float-end pe-5"> 5</span></h2><br>
        <p class=" mt-5 fs-4 pe-4  text-info"style="text-align: right;"><a href="">Cancel Orders</a></p>

    </div>


    
  </div>
</div>
</section>

<footer>
  

</footer>




    </body>