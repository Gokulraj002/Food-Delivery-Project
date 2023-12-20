<?php
include 'header.php';
?>

<style>
  table {
    width: 100%;
  }

  td, th {
    padding: 8px;
    line-height: 30px;
    color: white;
    font-size: 20px;
    border: 1px solid lightblue;
    text-align: center;
  }

  th {
    color: yellow;
    text-shadow: 4px 3px 4px red;
  }
</style>

<?php
  include 'dbconn.php';
  $db = new dbconn();
// $id=$_SESSION['id'];
$select_query = "SELECT * FROM `order`"; // Fixed the query string
$result = $db->conn->query($select_query);

if ($result->num_rows > 0) {
    echo '<table class=" container my-2">';
    echo '<tr>';
    echo '<th>Order ID</th>';
    echo '<th>Food Name</th>';
    echo '<th>Food Image</th>';
    echo '<th>Username</th>';
    echo '<th>Address</th>';
    echo '<th>Quantity</th>';
    echo '<th>Total Cost</th>';
    echo '<th>Order Date</th>';

    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['order_id'] . '</td>';
        echo '<td>' . $row['food_name'] . '</td>';
        echo '<td><img style="width:100px" src="'. $row['food_image'] . '"></td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['quantity'] . '</td>';
        echo '<td>' . $row['total_cost'] . '</td>';
        echo '<td>' . $row['order_date'] . '</td>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No records found in the "order" table.';
}
?>
