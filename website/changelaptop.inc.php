<!-- #Pabal Ahmed
   -- #IT202-004
   -- #pa478@njit.edu
   -- #4/2/2026 -->

<?php
require_once("laptop.php");

if (isset($_SESSION['login'])) {
   
    $laptopID = filter_input(INPUT_POST, 'laptopID', FILTER_VALIDATE_INT);
    $answer = $_POST['answer'];

    if (!is_int($laptopID)) {
       echo "<h2>Error: Invalid Laptop ID</h2>\n";
    } else if (!Laptop::findLaptop($laptopID)) {
       echo "<h2>Error: Laptop #$laptopID not found</h2>\n";
    } else if ($answer == "Update Laptop") {
        $laptop = Laptop::findLaptop($laptopID);
        
   
        $buyPrice = filter_input(INPUT_POST, 'buyPrice', FILTER_VALIDATE_FLOAT);
        $sellPrice = filter_input(INPUT_POST, 'sellPrice', FILTER_VALIDATE_FLOAT);
        $ram = filter_input(INPUT_POST, 'ram', FILTER_VALIDATE_INT);
        $storage = filter_input(INPUT_POST, 'storageCapacity', FILTER_VALIDATE_INT);
        $inch = filter_input(INPUT_POST, 'inchDimension', FILTER_VALIDATE_INT);
        $typeID = filter_input(INPUT_POST, 'laptopTypeID', FILTER_VALIDATE_INT);

    
        if (!is_float($buyPrice) || !is_float($sellPrice) || !is_int($ram)) {
            echo "<h2>Error: Numeric data is in the wrong format.</h2>";
        } else if (strpos($_POST['laptopName'], "<script") !== false) {
            echo "<h2>Security Error: Script injection detected!</h2>";
        } else {
            $laptop->laptopCode = $_POST['laptopCode'];
            $laptop->laptopName = $_POST['laptopName'];
            $laptop->laptopDescription = $_POST['laptopDescription'];
            $laptop->ram = $ram;
            $laptop->storageCapacity = $storage;
            $laptop->inchDimension = $inch;
            $laptop->laptopTypeID = $typeID;
            $laptop->buyPrice = $buyPrice;
            $laptop->sellPrice = $sellPrice;
            
            $result = $laptop->updateLaptop();
            echo $result ? "<h2>Laptop $laptopID updated</h2>" : "<h2>Error updating laptop.</h2>";
        }
    }
}
?>