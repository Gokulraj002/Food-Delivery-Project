<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "harleyshop";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id']) && isset($_POST['new_status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['new_status'];

    // Update query using prepared statement
    $update_query = "UPDATE `order` SET status = ? WHERE order_id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $update_query);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "si", $new_status, $order_id);

        // Execute the update query
        if (mysqli_stmt_execute($stmt)) {
            // Update successful
            header('Location: orderpage.php'); // Redirect back to the orders page or wherever you want
            exit();
        } else {
            // Error handling for the update
            echo "Error updating order status: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}

// Close the database connection
mysqli_close($conn);
?>
