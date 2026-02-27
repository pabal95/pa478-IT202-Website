<?php
require_once("laptop.php");
$laptopID = $_POST['laptopID'];
if ((trim($laptopID) == '') or (!is_numeric($laptopID))) {
   echo "<h2>Sorry, you must enter a valid laptop ID</h2>\n";
} else if (!Laptop::findLaptop($laptopID)) {
   echo "<h2>Sorry, A laptop with ID #$laptopID does not exist</h2>\n";
} else {
   $laptop = Laptop::findLaptop($laptopID);
   $result = $laptop->removeLaptop();
   if ($result) {
       echo "<h2>Laptop $laptopID deleted</h2>\n";
   } else {
       echo "<h2>Problem deleting laptop $laptopID</h2>\n";
   }
}
?>