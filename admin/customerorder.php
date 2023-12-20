<?php
session_start();
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['place_order'])) {
    $address = $_POST['address'];
   
    $totalCost = 0;
    $food_image = "";
    $food_name = "";
    $quantity = 0;


    foreach ($_SESSION['cart'] as $item) {
        $totalCost += ($item['discount_price'] * $item['quantity']);
        $food_image .= $item['food_image'] . " ";
        $food_name .= $item['food_name'] . " ";
        $quantity += $item['quantity'];
        $reges_id .=$item['reges_id'];
    }

    $db = new dbconn();
    $user_id = $_SESSION['_id'];
  
    $username = $_SESSION['name'];
    $status = 'Pending';



    $insert_query = "INSERT INTO `order` (user_id, reges_id, username, address, quantity, total_cost, status, food_image, food_name) 
                    VALUES ('$user_id', '$reges_id', '$username', '$address', '$quantity', '$totalCost', '$status', '$food_image', '$food_name')";

    if ($db->conn->query($insert_query) === TRUE) {
        echo "Order placed successfully.";
        unset($_SESSION['cart']); // Clear the cart after successful order placement
        header('location:userdash.php');
    } else {
        echo "Error placing the order: " . $db->conn->error;
    }
}
?>
