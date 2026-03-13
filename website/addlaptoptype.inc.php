<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #3/11/2026 -->

<?php
require_once("laptoptype.php");
if (isset($_SESSION['login'])) {
  $laptopTypeID = filter_input(INPUT_POST, 'laptopTypeID', FILTER_VALIDATE_INT);
  if ((trim($laptopTypeID) == '') or (!is_int($laptopTypeID))) {
    echo "<h2>Sorry, you must enter a valid laptop type ID number</h2>\n";
  } else if (LaptopType::findLaptopType($laptopTypeID)) {
    echo "<h2>Sorry, A laptop type with the ID #$laptopTypeID already exists</h2>\n";
  } else {
    $laptopTypeCode = htmlspecialchars($_POST['laptopTypeCode']);
    $laptopTypeName = htmlspecialchars($_POST['laptopTypeName']);
    $laptopShelfNumber = filter_input(INPUT_POST, 'laptopShelfNumber', FILTER_VALIDATE_INT);
    $laptopType = new LaptopType($laptopTypeID, $laptopTypeCode, $laptopTypeName, $laptopShelfNumber);
    $result = $laptopType->saveLaptopType();
    if ($result) {
        echo "<h2>New Laptop Type #$laptopTypeID successfully added</h2>\n";
    } else {
        echo "<h2>Sorry, there was a problem adding that laptop type</h2>\n";
    }
}
} else {
  echo "<h2>Sorry, you must be logged in to add a laptop type</h2>\n";
}
?>