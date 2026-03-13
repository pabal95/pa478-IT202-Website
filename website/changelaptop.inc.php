<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #2/27/2026 -->

<?php
require_once("laptop.php");
$laptopID = $_POST['laptopID'];
if ((trim($laptopID) == '') or (!is_numeric($laptopID))) {
   echo "<h2>Sorry, you must enter a valid laptop ID</h2>\n";
} else if (!Laptop::findLaptop($laptopID)) {
   echo "<h2>Sorry, A laptop with ID #$laptopID does not exist</h2>\n";

} else {
   $laptop = Laptop::findLaptop($laptopID);
   $laptop->laptopID = $_POST['laptopID'];
   $laptop->laptopCode = $_POST['laptopCode'];
   $laptop->laptopName = $_POST['laptopName'];
   $laptop->laptopDescription = $_POST['laptopDescription'];
   $laptop->ram = $_POST['ram'];
   $laptop->storageCapacity = $_POST['storageCapacity'];
   $laptop->inchDimension = $_POST['inchDimension'];
   $laptop->laptopTypeID = !empty($_POST['laptopTypeID']) ? $_POST['laptopTypeID'] : NULL;
   $laptop->buyPrice = $_POST['buyPrice'];
   $laptop->sellPrice = $_POST['sellPrice'];
   $result = $laptop->updateLaptop();
   if ($result) {
       echo "<h2>Laptop $laptopID updated</h2>\n";
   } else {
       echo "<h2>Problem updating laptop $laptopID</h2>\n";
   }
}
?>