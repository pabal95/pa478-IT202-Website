<?php
/* -- #Pabal Ahmed
   -- #IT202-004
   -- #4/3/2026 */
require_once("laptoptype.php");

if (isset($_SESSION['login'])) {
  
    $laptopTypeID = filter_input(INPUT_POST, 'laptopTypeID', FILTER_VALIDATE_INT);
    $answer = $_POST['answer'];

    if (!is_int($laptopTypeID)) { 
        echo "<h2>Error: Invalid Laptop Type ID</h2>\n";
    } else if (!LaptopType::findLaptopType($laptopTypeID)) {
        echo "<h2>Error: Laptop Type #$laptopTypeID not found</h2>\n";
    } else if ($answer == "Update Laptop Type") {
        $laptopType = LaptopType::findLaptopType($laptopTypeID);
        
        $code = $_POST['laptopTypeCode'];
        $name = $_POST['laptopTypeName'];
        $shelf = filter_input(INPUT_POST, 'laptopShelfNumber', FILTER_VALIDATE_INT);

        if (!is_int($shelf)) {
            echo "<h2>Error: Shelf Number must be an integer</h2>";
        } else if (strpos($name, "<script") !== false || strpos($code, "<script") !== false) {
            echo "<h2>Security Error: Script injection detected!</h2>";
        } else {
            $laptopType->laptopTypeCode = $code;
            $laptopType->laptopTypeName = $name;
            $laptopType->laptopShelfNumber = $shelf;
            $result = $laptopType->updateLaptopType();
            echo $result ? "<h2>Success: Type updated.</h2>" : "<h2>Error: Problem updating.</h2>";
        }
    }
}
?>