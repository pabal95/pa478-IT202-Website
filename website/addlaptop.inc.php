<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #4/2/2026 -->

<?php
require_once('laptop.php');

if (isset($_SESSION['login'])) {
    $laptopID = $_POST['laptopID'];
    $name = $_POST['laptopName'];
    $code = $_POST['laptopCode'];
    $desc = $_POST['laptopDescription'];

    if (strpos($name, "<script") !== false || strpos($code, "<script") !== false || strpos($desc, "<script") !== false) {
        echo "<h2>Security Error: Script injection detected!</h2>";
    } else {
        // Requirement: Check if ID already exists
        if (Laptop::findLaptop($laptopID)) {
            echo "<h2>Error: Laptop ID #$laptopID already exists in inventory.</h2>";
        } else {
            $laptop = new Laptop($laptopID, $code, $name, $desc, $_POST['ram'], $_POST['storageCapacity'], $_POST['inchDimension'], $_POST['laptopTypeID'], $_POST['buyPrice'], $_POST['sellPrice']);
            $result = $laptop->saveLaptop();
            echo $result ? "<h2>Success: Laptop #$laptopID added.</h2>" : "<h2>Problem adding laptop.</h2>";
        }
    }
    echo '<br><a href="index.php?content=listlaptops">Return to List</a>';
}
else {
    echo "<h2>Access Denied: Please log in to add inventory.</h2>";
    echo '<a href="index.php">Log In</a>';
}
?>