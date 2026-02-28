<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #2/27/2026 -->

<?php
error_log('$_POST ' . print_r($_POST, true));
require_once("laptoptype.php");
$laptopTypeID = $_POST['laptopTypeID'];
if ((trim($laptopTypeID) == '') or (!is_numeric($laptopTypeID))) {
 echo "<h2>Sorry, you must enter a valid laptop type ID</h2>\n";
} else if (!LaptopType::findLaptopType($laptopTypeID)) {
 echo "<h2>Sorry, A laptop type with ID #$laptopTypeID does not exist</h2>\n";
} else {
 $laptopType = LaptopType::findLaptopType($laptopTypeID);
 $result = $laptopType->removeLaptopType();
 if ($result)
   echo "<h2>Laptop Type $laptopTypeID removed</h2>\n";
 else
   echo "<h2>Sorry, problem removing laptop type $laptopTypeID</h2>\n";
}
?>