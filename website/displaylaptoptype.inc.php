<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #3/13/2026 -->

<?php
if (!isset($_REQUEST['laptopTypeID']) or (!is_numeric($_REQUEST['laptopTypeID']))) {
?>
 <h2>You did not select a valid laptopTypeID to view.</h2>
 <a href="index.php?content=listlaptoptypes">List Laptop Types</a>
 <?php
} else {
 $laptopTypeID = $_REQUEST['laptopTypeID'];
 $laptopType = LaptopType::findLaptopType($laptopTypeID);
 if ($laptopType) {
   echo $laptopType;
   // Use your Laptop class method to get the specific laptops
   $laptops = Laptop::getLaptopsByLaptopType($laptopTypeID); 
   if ($laptops) {
 ?>
     <br><br>
     <b>Laptops in this Category:</b><br>
     <table border="1">
       <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Price</th>
       </tr>
       <?php
       $itemtotal = 0;
       // FIX: Loop through $laptops (not $items)
       foreach ($laptops as $laptop) {
       ?>
         <tr>
           <td><?php echo $laptop->laptopID; ?></td>
           <td><?php echo $laptop->laptopName; ?></td>
           <td><?php echo '$' . number_format($laptop->sellPrice, 2); ?></td>
         </tr>
       <?php
         // Use sellPrice for the total calculation
         $itemtotal = $itemtotal + $laptop->sellPrice;
       }
       ?>
       <tr>
         <td></td>
         <td><b>Inventory Total Value</b></td>
         <td><b><?php echo '$' . number_format($itemtotal, 2); ?></b></td>
       </tr>
     </table>
     <br>
     <input type="button" value="Back to Laptop Types" 
            onclick="window.location.href='index.php?content=listlaptoptypes'">
<?php
   } else {
     echo "<h2>There are no laptops for this category</h2>\n";
     // Add back button even if no laptops exist
     echo '<br><input type="button" value="Back to List" onclick="window.location.href=\'index.php?content=listlaptoptypes\'">';
   }
 } else {
   echo "<h2>Sorry, laptop category $laptopTypeID not found</h2>\n";
   echo '<br><input type="button" value="Back to List" onclick="window.location.href=\'index.php?content=listlaptoptypes\'">';
 }
}
?>