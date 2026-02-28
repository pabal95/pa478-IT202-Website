<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #2/27/2026 -->

<?php
require_once("laptoptype.php");
$laptopTypeID = $_POST['laptopTypeID'];
if ((trim($laptopTypeID) == '') or (!is_numeric($laptopTypeID))) {
  echo "<h2>Sorry, you must enter a valid laptop type ID</h2>\n";
} else if (!LaptopType::findLaptopType($laptopTypeID)) {
  echo "<h2>Sorry, A laptop type with ID #$laptopTypeID does not exist</h2>\n";

} else {
  $laptopType = LaptopType::findLaptopType($laptopTypeID);
  $laptopType->laptopTypeID = $_POST['laptopTypeID'];
  $laptopType->laptopTypeCode = $_POST['laptopTypeCode'];
  $laptopType->laptopTypeName = $_POST['laptopTypeName'];
  $laptopType->laptopShelfNumber = $_POST['laptopShelfNumber'];
  $result = $laptopType->updateLaptopType();
  if ($result) {
     echo "<h2>Laptop Type $laptopTypeID updated</h2>\n";
  } else {
     echo "<h2>Problem updating laptop type $laptopTypeID</h2>\n";
  }
}
?>