<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #2/27/2026 -->
<?php
require_once("laptop.php");

if (isset($_SESSION['login'])) {
    $laptopID = $_POST['laptopID'];
    if ((trim($laptopID) == '') or (!is_numeric($laptopID))) {
       echo "<h2>Sorry, you must enter a valid laptop ID</h2>\n";
    } else if (!Laptop::findLaptop($laptopID)) {
       echo "<h2>Sorry, A laptop with ID #$laptopID does not exist</h2>\n";
    } else {
       $laptop = Laptop::findLaptop($laptopID);
       $result = $laptop->removeLaptop();
       echo $result ? "<h2>Laptop $laptopID deleted</h2>\n" : "<h2>Problem deleting laptop $laptopID</h2>\n";
    }
 
    echo '<a href="index.php?content=listlaptops">Return to Laptop List</a>';
} else {
    echo "<h2>Access Denied: Please log in.</h2>";
}
?>