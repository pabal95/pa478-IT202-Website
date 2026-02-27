<?php
require_once("laptop.php");
$laptops = Laptop::getLaptops();
if ($laptops) {
  foreach ($laptops as $laptop) {
     $laptopID = $laptop->laptopID;
     $laptopName = $laptop->laptopName;
     $laptopPrice = $laptop->listPrice;
     $option = $laptopID . " - " . $laptopName .  " - " . $laptopPrice;
     echo "$option<br>";
  }
} else {
   echo "<h2>No laptops found.</h2>";
}
?>