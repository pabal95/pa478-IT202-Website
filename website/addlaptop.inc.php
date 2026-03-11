<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #3/11/2026 -->

<?php
require_once('laptop.php');
if (isset($_SESSION['login'])) {
$laptopID = $_POST['laptopID'];
if ((trim($laptopID) == '') or (!is_numeric($laptopID))) {
   echo "<h2>Sorry, you must enter a valid laptop ID number</h2>\n";
} else if (Laptop::findLaptop($laptopID)) {
  echo "<h2>Sorry, A laptop with the ID #$laptopID already exists</h2>\n";
} else {
   $laptopCode = $_POST['laptopCode'];
   $laptopName = $_POST['laptopName'];
   $laptopDescription = $_POST['laptopDescription'];
   $ram = $_POST['ram'];
   $storageCapacity = $_POST['storageCapacity'];
   $inchDimension = $_POST['inchDimension'];
   $laptopTypeID = $_POST['laptopTypeID'];
   $buyPrice = $_POST['buyPrice'];
   $sellPrice = $_POST['sellPrice'];
   $laptop = new Laptop($laptopID, $laptopCode, $laptopName, $laptopDescription, $ram, $storageCapacity, $inchDimension, $laptopTypeID, $buyPrice, $sellPrice);
   $result = $laptop->saveLaptop();
   if ($result)
       echo "<h2>New Laptop #$laptopID successfully added</h2>\n";
   else
       echo "<h2>Sorry, there was a problem adding that laptop</h2>\n";
}
} else {
  echo "<h2>Sorry, you must be logged in to add a laptop</h2>\n";
}
?>