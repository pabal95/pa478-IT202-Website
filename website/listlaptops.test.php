<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #2/27/2026 -->

<?php
require_once("laptop.php");
$laptops = Laptop::getLaptops();
if ($laptops) {
   //asked AI for the formatting for this echo statement
  echo "<table border='1'><tr><th>ID</th><th>Name</th><th>RAM</th><th>Storage</th><th>Price</th></tr>";
  foreach ($laptops as $laptop) {
     echo "<tr>";
     echo "<td>{$laptop->laptopID}</td>";
     echo "<td>{$laptop->laptopName}</td>";
     echo "<td>{$laptop->ram}GB</td>";
     echo "<td>{$laptop->storageCapacity}GB</td>";
     echo "<td>\${$laptop->sellPrice}</td>";
     echo "</tr>";
  }
  echo "</table>";
} else {
   echo "<h2>No laptops found.</h2>";
}
?>