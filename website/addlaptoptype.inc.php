<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #4/2/2026 -->

<?php
require_once("laptoptype.php");

if (isset($_SESSION['login'])) {
    $laptopTypeID = $_POST['laptopTypeID'];
    $name = $_POST['laptopTypeName'];
    $code = $_POST['laptopTypeCode'];
    $desc = $_POST['description']; // Requirement: Include all fields
    $shelf = $_POST['laptopShelfNumber'];

   
    if (empty($laptopTypeID) || !is_numeric($laptopTypeID)) {
        echo "<h2>Error: Please enter a valid numeric ID.</h2>";
    } else if (LaptopType::findLaptopType($laptopTypeID)) {
        echo "<h2>Error: Laptop Type #$laptopTypeID already exists.</h2>";
    } else {
       
        if (strpos($name, "<script") !== false || 
            strpos($code, "<script") !== false || 
            strpos($desc, "<script") !== false) {
            echo "<h2>Security Error: Malicious script detected!</h2>";
        } else {
            // 3. Create the object and save
            $laptopType = new LaptopType($laptopTypeID, $code, $name, $desc, $shelf);
            $result = $laptopType->saveLaptopType();
            
            if ($result) {
                echo "<h2>Success: New Laptop Type #$laptopTypeID added!</h2>";
            } else {
                echo "<h2>Error: Problem adding laptop type.</h2>";
            }
        }
    }
    // Navigation back to list
    echo '<a href="index.php?content=listlaptoptypes">Return to Laptop Types</a>';
} else {
    echo "<h2>Access Denied: Please log in.</h2>";
}
?>