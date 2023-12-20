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
        text-shadow: 5px 4px 5px red;
         font-family: 'Grand Hotel';
         color: white;
         font-size: 40px;
      }
              .texts{
         text-shadow: 5px 4px 5px blue;
       font-family: "Sofia", sans-serif;
         color: white;
      
         cursor: pointer;
      }

    </style>
    <body >

   
<div class="position relative">
  <img height="500px" src="https://b.zmtcdn.com/mx-onboarding-hero87f77501659a5656cad54d98e72bf0d81627911821.webp" class="w-100" alt="" role="presentation" style=" filter: blur(1px);">

 
<div class="position-absolute top-0">

  <nav class="navbar navbar-expand-sm  navbar-dark ">
  <div class="container-fluid row ">
    <div class="col-2"></div>
    <div class="col-6">
    <a class="navbar-brand text-white px-2 text" href="#"><strong>Ga</strong> Harley</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon "></span>
    </button>
  </div>
    <div class="col -6 collapse navbar-collapse  justify-content-center  " id="collapsibleNavbar">
      <ul class="navbar-nav ">
        <li class="nav-item ">
          <a class="nav-link text-white ms-4 px-5 text-white fs-5" href='userdash.php'>HOME  </a>
        </li>
         <li class="nav-item">
          <a class="nav-link text-white ms-2 px-5 text-white fs-5" href='../usercart.php'><b><i class="fa fa-shopping-cart text-white me-2 mt-2  float-start   " aria-hidden="true"></i>cart</b></a>
        </li> 
         <li class="nav-item">
          <a class="nav-link text-white mx-2  px-5 text-white fs-5" href="#partners"><b>profile</b></a>
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
  <a href='shopreg.php'><button style="margin-left:70px;" class="btn btn-primary mt-2 btn-lg shadow text-white rounded-0" >GO TO CART </button></a>

 <p class="text-white mt-2"> Need help? Please email us at<b> nhsquad@harley.com</b></p>
</div>
</div>

<div class="container mt-5">
<div class="table-responsive">
  <table class=" table-bordered table  align-middle mb-5">
  <tr class="text-center">
    <th >Name </th>  
    <th >Quantity</th>
    <th >Price</th>
    <th >IMAGE</th>
    <th> Value</th>
  </tr>
 <?php
include 'dbconn.php';
$db = new dbconn();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel_order'])) {
    $order_id = $_POST['order_id'];

    // Use a prepared statement to delete the order
    $delete_query = "DELETE FROM `order` WHERE order_id = ?";
    $stmt = $db->conn->prepare($delete_query);
    
    if ($stmt) {
        $stmt->bind_param("i", $order_id); 
        if ($stmt->execute()) {
            echo 'Order canceled successfully.';
            
        } else {
            echo 'Failed to cancel order.';
        }
        $stmt->close();
    } else {
        echo 'Failed to prepare the delete statement.';
    }
}
 session_start();
  $id=$_SESSION['_id'] ;


$select_query = "SELECT * FROM `order` WHERE $id= user_id"; 
$result = $db->conn->query($select_query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr class="text-center">
            <td class="text-start">
              <img src="<?php echo $row['food_image']; ?>" class="mx-3" style="max-width: 100px; height: 98px;">
                <?php echo $row['food_name'] ?>
            </td>
            <td><span class="btn btn-outline-dark"><?php echo $row['quantity']; ?></span></td>
            <td><?php echo $row['total_cost']; ?></td>
            <td><?php echo $row['status']; ?> <i class="fa ms-2 fa-times-circle-o"></i></td>
             <form method="post">
                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                   <td> <button type="submit" name="cancel_order" class="btn rounded-0 btn-success w-75">Cancel Order</button></td>
                </form>
        </tr>
        <?php
    }
}
?>

</table>
</div>
</div>