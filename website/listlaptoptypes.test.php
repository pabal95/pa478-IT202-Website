<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #2/27/2026 -->

<?php
require_once("laptoptype.php");
$laptopTypes = LaptopType::getLaptopTypes();
if ($laptopTypes) {
  foreach ($laptopTypes as $laptopType) {
     $laptopTypeID = $laptopType->laptopTypeID;
     $name = $laptopTypeID . " - " . $laptopType->laptopTypeCode . ", " . $laptopType->laptopTypeName . ", Shelf No: " . $laptopType->laptopShelfNumber;
     echo "$name<br>";
  }
} else {
  echo "<h2>No laptop types found.</h2>";
}
?>