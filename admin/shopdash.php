 <?php 
session_start();
if (!isset($_SESSION["username"])) {
    header('Location:shoplog.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shop Dash</title>
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
      
body {
 
  padding: 0px;
  background-image: url(https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100%;
}
  .text{
        text-shadow: 5px 4px 5px red;
         font-family: "Sofia", sans-serif;
         color: white;
      }

.container {
  max-width: 400px;
  margin: 0 auto;
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 5px;
}

input, textarea {
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
}



    </style>
    <body>

<?php

 include'dbconn.php';

if(isset($_POST['submit'])) {
    $name = $_POST['shop_name'];
    $profile_photo = $_FILES['food_image']['name'];

    $image_tmp_path = $_FILES['food_image']['tmp_name'];

    $targetPath = "uploads/" . $profile_photo;
    move_uploaded_file($image_tmp_path, $targetPath);
    $food = $_POST['food_name'];
    $Categorie = $_POST['categorie'];  // Fixed typo in variable name
    // $shop = $_POST['shop_name'];
    $price = $_POST['price'];
    $price1 = $_POST['price1'];  // Corrected variable name
    $description = $_POST['description'];
    $reges_id= $_SESSION['id'];
    $obj = new dbconn();
    $obj->insert($reges_id,$name, $targetPath, $food, $Categorie,  $price, $price1, $description);
    // $obj->closeconnection();
}   




?>

    
<div class="container-fluid p-3 text-white">

<div class="row">
  <div class="col-1 ">
  <img src="<?php echo $_SESSION['photo']; ?>" class="rounded-circle" style="max-width: 100px; height: 98px;"> 

</div>
<div class="col-3 me-5 ">
  <h2 class="pt-4 text">Hi :<?php echo $_SESSION['username'] ?></h2>
</div>
<div class="col-3 ">
  <h2 class="pt-4 text"><?php echo $_SESSION['shop']; ?></h2>
</div>
<div class="col-2 ">
  <a class="text-decoration-none text-white text" href="orderpage.php"><h2 class="pt-4"> Orders </h2></a>
</div>
<div class="col-2 ">
  <a class="text-decoration-none text-white text" href="logout.php"><h2 class="pt-4 w-100"> Log Out </h2></a>
</div>
</div>

</div>
    <div class="p-3">
  <div class="container shadow-lg w-50 text-white">

    <h1 class="text text-warning ">Food Upload </h1><hr>
    <form class=" text-info fw-bold"action="" method="post" enctype="multipart/form-data">
      <label for="shop_name">Shop Name:</label>
      <input type="text" id="shop_name" name="shop_name" required>

       <label for="food_image">Upload Image:</label>
      <input type="file" id="food_image" name="food_image" accept="image/*" required>

      <label for="food_name">Food Name:</label>
      <input type="text" id="food_name" name="food_name" required>

      <label for="cate">Categorie:</label>
      <input type="text" id="cate" name="categorie" required>

      <label for="price">Disound Price:</label>
      <input type="number" id="price" name="price" min="0" step="1" required>
       <label for="price">Original Price:</label>
      <input type="number" id="price" name="price1" min="0" step="1" required>

      <label for="description">Description:</label>
      <textarea id="description" name="description" rows="4" required></textarea>

      <button class="btn btn-primary rounded-0 btn-lg" type="submit" name="submit">Upload</button><br><br><br><br><br>
    </form>
  </div>

</div>

<div class="container-fluid">

        <table  class=" bg-secondary table-bordered table table-striped mt-4 align-middle">
   
            <tr>
      <th colspan="8">
      <h2 class="text-center text text-primary text-bold my-3">Food Upload Details</h2></th>
    </tr><hr>
    
      <tr>
         <th style="width: 200px;">User id</th>
        <th style="width: 200px;">Shop Name</th>
        <th  class="w-25" >Food image</th>
        <th style="width: 200px;">Food name</th>
        <th style="width: 100px;">Discount Price</th>
        <th style="width: 100px;"> Original Price</th>
        <th style="width: 200px;">Description</th>
        <th style="width: 200px;">Action</th>
      </tr>
   <?php
    $new = new dbconn();
    $result = $new->select();

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
             echo "<td>{$row['reges_id']}</td>";
            echo "<td>{$row['shop_name']}</td>";
             echo "<td><img src='{$row['food_image']}' style='width: 25%'></td>";

            echo "<td>{$row['food_name']}</td>";
            echo "<td>{$row['discount_price']}</td>";
            echo "<td>{$row['original_price']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "<td class='action-buttons'>
                    <button class='btn btn-primary rounded-0 mx-2'>Edit</button>
                    <button class='btn btn-primary rounded-0'>Delete</button>
                </td>";
            echo "</tr>";
        }
    }
    ?>       <!-- Add more rows as needed -->
    </table>

</div>
</body>
</html>
