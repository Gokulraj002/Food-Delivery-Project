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
<?php
session_start();

include 'dbconn.php';

class Cart
{
    public $cartItems;

    public function __construct()
    {
        if (!isset($_SESSION['cart'])) { // Fix missing closing parenthesis here
            $_SESSION['cart'] = array();
        }

        $this->cartItems = &$_SESSION['cart'];
    }

    public function addToCart($item)
    {
        $this->cartItems[] = $item;
    }

    public function getCart()
    {
        return $this->cartItems;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buynow'])) {
    if (isset($_POST['reges_id'])&& isset($_POST['food_name']) && isset($_POST['discount_price']) && isset($_POST['quantity']) && isset($_POST['food_image'])) {
        $reges_id=$_POST['reges_id'];
        $foodName = $_POST['food_name'];
        $discountPrice = $_POST['discount_price'];
        $foodImage = $_POST['food_image'];
        $quantity = $_POST['quantity'];
        $item = array(
            'reges_id'=>$reges_id,
            'food_name' => $foodName,
            'discount_price' => $discountPrice,
            'quantity' => $quantity,
            'food_image' => $foodImage
        );

        $cart = new Cart();
        $cart->addToCart($item);
        header('location:usercart.php');
        exit();
    }
}

?>

 
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
          <a class="nav-link text-white ms-3 px-5 text-white fs-5" href='userorder.php'><b>order</b></a>
        </li>
       <!--  <li class="nav-item">
          <a class="nav-link text-white ms-2 px-5 text-white fs-5" href='../usercart.php'><b><i class="fa fa-shopping-cart text-white me-2 mt-2  float-start   " aria-hidden="true"></i>cart</b></a>
        </li> --> 
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
  <a href='shopreg.php'><button style="margin-left:70px;" class="btn btn-primary mt-2 btn-lg shadow text-white rounded-0" >SEE ORDER</button></a>

 <p class="text-white mt-2"> Need help? Please email us at<b> nhsquad@harley.com</b></p>
</div>
</div>

<div class="container mt-5">
<div class="table-responsive">
  <table class=" table-bordered table  align-middle mb-5">
  <tr class="text-center">
    <th >Name & Image</th>
  
    <th >Quantity</th>
    <th >Price</th>
    <th >Total</th>
  </tr>
 <?php
$totalCost = 0;

foreach ($_SESSION['cart'] as $item) {
    echo '<tr class="text-center">';
    echo '<td class="text-start">';
    echo '<img src="' . $item['food_image'] . '" class="mx-3" style="max-width: 100px; height: 98px;">';
    echo $item['food_name'];
    echo '</td>';
    echo '<td><span class="btn btn-outline-dark">' . $item['quantity'] . '</span></td>'; // Display the quantity
    echo '<td>$' . $item['discount_price'] . '</td>';
    echo '<td>$' . ($item['discount_price'] * $item['quantity']) . '<i class="fa ms-2 fa-times-circle-o"></i> <button>delete</button></td>'; // Calculate and display the total cost for this item
    echo '</tr>';
    $totalCost += ($item['discount_price'] * $item['quantity']); // Update the total cost
}
?>




<td colspan="5" class="text-end">
  <button class="btn rounded-0 px-2 me-3 btn-outline-secondary" >update cart</button>
  <button class="btn rounded-0 btn-success w-25">Continue Shopping</button>
</td>
</tr>




</table>
</div>
</div>
<div class="container mt-3">
    <div class="row mt-3">
        <div class="card mt-4">
            <div class="card-body" style="line-height: 3rem;">
                <p>Subtotal <span class="float-end"><?php echo $totalCost; ?></span></p>
                <p>Shipping <span class="float-end">Free Shipping</span></p>
                <hr>
                <h4 class="divider">Total <span class="float-end"><?php echo $totalCost; ?></span></h4>
            </div>
        </div>
        <form method="post" action="customerorder.php"> <!-- Create a separate PHP file for processing the order -->
            <div class="mb-3">
                <label for="address" class="form-label my-3"><h4>Enter Your Shipping Address:</h4></label>
                <textarea class="form-control" name="address" id="address" rows="2" required></textarea>
            </div>
            <input type="submit" name="place_order" class="btn btn-success btn-lg rounded-0 float-end my-2" style="width: 150px;" value="Place Order">
        </form>
    </div>
</div>

 
    </body>
    </html>