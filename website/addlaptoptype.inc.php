<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #3/11/2026 -->

<?php
require_once("laptoptype.php");
$laptopTypeID = $_POST['laptopTypeID'];
if ((trim($laptopTypeID) == '') or (!is_numeric($laptopTypeID))) {
  echo "<h2>Sorry, you must enter a valid laptop type ID number</h2>\n";
} else if (LaptopType::findLaptopType($laptopTypeID)) {
  echo "<h2>Sorry, A laptop type with the ID #$laptopTypeID already exists</h2>\n";
} else {
  $laptopTypeCode = $_POST['laptopTypeCode'];
  $laptopTypeName = $_POST['laptopTypeName'];
  $laptopShelfNumber = $_POST['laptopShelfNumber'];
  $laptopType = new LaptopType($laptopTypeID, $laptopTypeCode, $laptopTypeName, $laptopShelfNumber);
  $result = $laptopType->saveLaptopType();
  if ($result) {
      echo "<h2>New Laptop Type #$laptopTypeID successfully added</h2>\n";
  } else {
      echo "<h2>Sorry, there was a problem adding that laptop type</h2>\n";
  }
}
?>