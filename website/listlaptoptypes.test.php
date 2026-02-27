<?php
require_once("laptoptype.php");
$laptopTypes = LaptopType::getLaptopTypes();
if ($laptopTypes) {
  foreach ($laptopTypes as $laptopType) {
     $laptopTypeID = $laptopType->laptopTypeID;
     $name = $laptopTypeID . " - " . $laptopType->laptopTypeCode . ", " . $laptopType->laptopTypeName;
     echo "$name<br>";
  }
} else {
  echo "<h2>No laptop types found.</h2>";
}
?>