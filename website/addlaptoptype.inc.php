<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #4/2/2026 -->

<?php
require_once("laptoptype.php");

if (isset($_SESSION['login'])) {
    
    $laptopTypeID = filter_input(INPUT_POST, 'laptopTypeID', FILTER_VALIDATE_INT);
    $shelf = filter_input(INPUT_POST, 'laptopShelfNumber', FILTER_VALIDATE_INT);
    
    
    $name = $_POST['laptopTypeName'];
    $code = $_POST['laptopTypeCode'];

   
    if (!is_int($laptopTypeID)) {
        echo "<h2>Error: Please enter a valid numeric ID.</h2>";
    } else if (!is_int($shelf)) {
        echo "<h2>Error: Please enter a valid numeric Shelf Number.</h2>";
    } else if (LaptopType::findLaptopType($laptopTypeID)) {
        echo "<h2>Error: Laptop Type #$laptopTypeID already exists.</h2>";
    } else {
       
        if (strpos($name, "<script") !== false || strpos($code, "<script") !== false) {
            echo "<h2>Security Error: Malicious script detected!</h2>";
        } else {
            
            $laptopType = new LaptopType($laptopTypeID, $code, $name, $shelf);
            $result = $laptopType->saveLaptopType();
            
            if ($result) {
                echo "<h2>Success: New Laptop Type #$laptopTypeID added!</h2>";
            } else {
                echo "<h2>Error: Problem adding laptop type.</h2>";
            }
        }
    }
    echo '<a href="index.php?content=listlaptoptypes">Return to Laptop Types</a>';
} else {
    echo "<h2>Access Denied: Please log in.</h2>";
}
?>