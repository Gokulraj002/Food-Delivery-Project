<?php 
  session_start();
  // include 'dbconn.php';
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
/*        text-shadow: 5px 4px 5px red;*/
         font-family:  times new romans;
         color: black;
         font-size: 30px;
      }
              .texts{
         text-shadow: 5px 4px 5px blue;
       font-family: "Sofia", sans-serif;
         color: white;
/*         font-size: 40px;*/
      
         cursor: pointer;
      }


      .cards {
/*      border: 1px solid #ccc;*/
      border-radius: 10px;
      float: left;
/*      width: 200px;*/
/*      margin: 20px;*/ 
/*      text-align: center;*/
/*      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);*/
      transition: transform 0.3s;
    }

    .cards img {
/*      width: 100%;*/
      border-radius: 10px;
    }

    .cards:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      transform: scale(1.05);
    }
    .new{
      width: 33%;
      height: 400px;
      float: left;
    }

    </style>

    <body >
      <?php
      include 'dbconn.php';
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
          <a class="nav-link text-white text-bold ms-4 px-5 texts text-white fs-5" href='index.php'>HI : <?php echo $_SESSION['username'] ?></a>
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
<div class="container-fluid">

<?php
$db = new dbconn();
$id=$_SESSION['id'];
$select_query = "SELECT * FROM `order` WHERE $id= reges_id "; 
$result = $db->conn->query($select_query);

if ($result->num_rows > 0) {
    echo '<table >';
    echo '<tr>';
    echo '<th>Order ID</th>';
    
    echo '<th>Food Name</th>'; // Updated header text
    echo '<th>Food Image</th>'; // Added header for Food Image
    echo '<th>Username</th>';
    echo '<th>Address</th>';
    echo '<th>Quantity</th>';
    echo '<th>Total Cost</th>';
    echo '<th>Status</th>'; // Corrected the header text
    echo '<th>Order Date</th>';
    echo '<th>Update & Edit</th>'; // Fixed button placement
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['order_id'] . '</td>';
        echo '<td>' . $row['food_name'] . '</td>';
        echo '<td><img style="width:100px" src="' . $row['food_image'] . '"></td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['quantity'] . '</td>';
        echo '<td>' . $row['total_cost'] . '</td>';
         echo '<td>';
    echo '<form method="post" action="update_status.php">'; // Create a separate PHP script for updating status
    echo '<input type="hidden" name="order_id" value="' . $row['order_id'] . '">';
    echo '<select name="new_status">';
       echo '<option value="Pending">' . $row['status'] . '</option>';
    echo '<option value="Shipped">Shipped</option>';
    echo '<option value="Delivered">Delivered</option>';
    echo '</select>';
    echo '<td>' . $row['order_date'] . '</td>';
    echo '<td>' . '<button type="submit" class="btn btn-primary">Update</button>' . '</td>';

    // echo '<button type="submit" class="btn btn-primary">Update</button>';
    echo '</form>';
    echo '</td>';


        
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No records found in the "order" table.';
}
?>


</div>
</body>
</html>
