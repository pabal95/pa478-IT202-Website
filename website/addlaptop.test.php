<?php
require_once('laptop.php');
$laptopID = $_POST['laptopID'];
if ((trim($laptopID) == '') or (!is_numeric($laptopID))) {
   echo "<h2>Sorry, you must enter a valid laptop ID number</h2>\n";
} else if (Laptop::findLaptop($laptopID)) {
  echo "<h2>Sorry, A laptop with the ID #$laptopID already exists</h2>\n";
} else {
   $laptopName = $_POST['laptopName'];
   $laptopTypeID = !empty($_POST['laptopTypeID']) ? $_POST['laptopTypeID'] : NULL;
   $listPrice = $_POST['listPrice'];
   $laptop = new Laptop($laptopID, $laptopName, $laptopTypeID, $listPrice);
   $result = $laptop->saveLaptop();
   if ($result)
       echo "<h2>New Laptop #$laptopID successfully added</h2>\n";
   else
       echo "<h2>Sorry, there was a problem adding that laptop</h2>\n";
}
?>