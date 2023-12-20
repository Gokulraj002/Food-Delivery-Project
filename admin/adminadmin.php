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
 font-weight:30px ;
 
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

      <body>

     <section class="container p-5">
      <table>
        <tr>
          <th>S.NO</th>
          <th>NAME</th>
          <th>PASSWORD</th>
          <th>SHOP NAME</th>
          <th>ADDRESS</th>
          <th>PHONE NUMBER</th>
        </tr>
<?php
include 'dbconn.php';

$new = new dbconn();
$result2 = $new->admin();

if ($result2) {
  $counter=1;
    while ($rows = $result2->fetch_assoc()) {
        ?>

        <tr>
            <td class="text-white"><?php echo $counter; ?></td>
            <td class="text-white"><?php echo $rows['ownername']; ?></td>
            <td class="text-white"><?php echo $rows['password']; ?></td>
            <td class="text-white"><?php echo $rows['shopname']; ?></td>
            <td class="text-white"><?php echo $rows['address']; ?></td>
            <td class="text-white"><?php echo $rows['phonenumber']; ?></td>
        </tr>

        <?php
        $counter++;
    }
}
?>
    </table>
       
     </section>
   </body>