 <?php include 'header.php';
      ?>
        
      <style>
          table
      {
  width: 100%;

}
td,th {
  padding: 8px;
  line-height: 30px;
 color: black;
   font-size: 20px;
   border: 1px solid lightblue;
   text-align: center;
}
th{
  color: yellow;
  
/*    font-size: 22px;*/
  text-shadow: 4px 3px 4px red;
}
</style>


        <section class="container  p-5">
      <table>
       
      <tr>
        <th>S.NO</th>
         <th style="width: 200px;">OWNER Name</th>
        <th style="width: 250px;">Shop Name</th>
        <th  style="width:200px;" >Food image</th>
        <th style="width: 200px;">Food name</th>
        <th style="width: 100px;">Discount Price</th>
        <th style="width: 100px;"> Original Price</th>
        <th style="width: 230px;">Description</th>
    
      </tr>
<?php
include 'dbconn.php';
 $new = new dbconn();
    $result = $new->select2();

    if ($result) {
          $counter =1;
        while ($row = $result->fetch_assoc()) {   
       

    // while ($row = $result2->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='text-white'>{$counter}</td>";
        echo "<td class='text-white'>{$row['ownername']}</td>";
        echo "<td class='text-white'>{$row['shop_name']}</td>";
        echo "<td class='text-white'><img src='{$row['food_image']}' style='width:75%'></td>";
        echo "<td class='text-white'> {$row['food_name']}</td>";
        echo "<td class='text-white'>{$row['discount_price']}</td>";
        echo "<td class='text-white'>{$row['original_price']}</td>";
        echo "<td class='text-white'>{$row['description']}</td>";
        echo "</tr>";
        $counter++;
    }
}
?>

    </table>
    
       
     </section>