<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #3/11/2026 -->

<?php
require_once("laptop.php");
$laptops = Laptop::getLaptops();
if ($laptops) {
?>
 <h2>Select Laptop</h2>
  <form name="laptops" method="post">
   <select name="laptopID" size="20">
       <?php
       $first = true;
       foreach ($laptops as $laptop) {
           $laptopID = $laptop->laptopID;
           $laptopName = $laptop->laptopName;
           $laptopPrice = $laptop->sellPrice;
           $option = $laptopID . " - " . $laptopName .  " - " . $laptopPrice;
           if($first) {
                echo "<option value=\"$laptopID\" selected>$option</option>\n";
                $first = false;
           } else {
                echo "<option value=\"$laptopID\">$option</option>\n";
           }
       }
       ?>
   </select>
 </form>
<?php
} else {
  echo "<h2>No laptops found.</h2>";
}
?>