<?php
// cart page 
include 'dbconn.php';

class Cart
{
    private $cartItems;

    public function __construct()
    {
        if (!isset($_SESSION['cart'])) {
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
    if (isset($_POST['food_name']) && isset($_POST['discount_price']) && isset($_POST['food_image'])) {
        $foodName = $_POST['food_name'];
        $discountPrice = $_POST['discount_price'];
        $foodImage = $_POST['food_image'];

        $item = array(
            'food_name' => $foodName,
            'discount_price' => $discountPrice,
            'food_image' => $foodImage
        );

        $cart = new Cart();
        $cart->addToCart($item);

        header('Location: usercart.php');  // Redirect to usercart.php after adding to cart
        exit();
    }
}
?>
