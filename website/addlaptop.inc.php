<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #4/2/2026 -->

<?php
require_once('laptop.php');

if (isset($_SESSION['login'])) {
    $laptopID = filter_input(INPUT_POST, 'laptopID', FILTER_VALIDATE_INT);
    $buyPrice = filter_input(INPUT_POST, 'buyPrice', FILTER_VALIDATE_FLOAT);
    $sellPrice = filter_input(INPUT_POST, 'sellPrice', FILTER_VALIDATE_FLOAT);
    
   
    $ram = filter_input(INPUT_POST, 'ram', FILTER_VALIDATE_INT);
    $storage = filter_input(INPUT_POST, 'storageCapacity', FILTER_VALIDATE_INT);
    $inch = filter_input(INPUT_POST, 'inchDimension', FILTER_VALIDATE_INT);
    $typeID = filter_input(INPUT_POST, 'laptopTypeID', FILTER_VALIDATE_INT);

   
    $name = $_POST['laptopName'];
    $code = $_POST['laptopCode'];
    $desc = $_POST['laptopDescription'];


    if (!is_int($laptopID) || !is_float($buyPrice) || !is_float($sellPrice)) {
        echo "<h2>Error: Invalid ID or Price format.</h2>";
    } else {
        
        if (strpos($name, "<script") !== false || 
            strpos($code, "<script") !== false || 
            strpos($desc, "<script") !== false) {
            echo "<h2>Security Error: Malicious script detected!</h2>";
        } else if (Laptop::findLaptop($laptopID)) {
            echo "<h2>Error: Laptop ID #$laptopID already exists.</h2>";
        } else {
           
            $laptop = new Laptop($laptopID, $code, $name, $desc, $ram, $storage, $inch, $typeID, $buyPrice, $sellPrice);
            $result = $laptop->saveLaptop();
            
            if ($result) {
                echo "<h2>Success: Laptop #$laptopID added to inventory.</h2>";
            } else {
                echo "<h2>Problem adding laptop to database.</h2>";
            }
        }
    }
    echo '<br><a href="index.php?content=listlaptops">Return to Laptop List</a>';
}
?>