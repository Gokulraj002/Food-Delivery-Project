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
      <table >
        <tr>
            <th>S.NO</th>
          <th>USER NAME</th>
          <th>PASSWORD</th>
          <th>EMAIL</th>
          <th>ADDRESS</th>
          
        </tr>
        <tr>
<?php
include 'dbconn.php';
$new = new dbconn();
$result1 = $new->user();

if ($result1) {
    $counter = 1;  // Initialize the counter

    while ($row = $result1->fetch_assoc()) {
        ?>
        <tr >
            <td class="text-white"><?php echo $counter; ?></td>
            <td class="text-white"><?php echo $row['username']; ?></td>
             <td class="text-white"><?php echo $row['password']; ?></td>
            <td class="text-white"><?php echo $row['email']; ?></td>
            <td class="text-white"><?php echo $row['address']; ?></td>
            
        </tr>
        <?php 
        $counter++;  // Increment the counter
    }
}
?>
      </table>
       
     </section>