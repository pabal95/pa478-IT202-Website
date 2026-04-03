<!-- #Pabal Ahmed
   -- #IT202-004
   -- #pa478@njit.edu
   -- #4/2/2026 -->

<?php
require_once("laptop.php");


if (isset($_SESSION['login'])) {
    $laptopID = $_POST['laptopID'];
    $answer = $_POST['answer']; // Capture button choice

    if ((trim($laptopID) == '') or (!is_numeric($laptopID))) {
       echo "<h2>Sorry, you must enter a valid laptop ID</h2>\n";
    } else if (!Laptop::findLaptop($laptopID)) {
       echo "<h2>Sorry, a laptop with ID #$laptopID does not exist</h2>\n";
    } else {
      
       if ($answer == "Update Laptop") {
           $laptop = Laptop::findLaptop($laptopID);
           
           // Capture inputs
           $code = $_POST['laptopCode'];
           $name = $_POST['laptopName'];
           $desc = $_POST['laptopDescription'];

         
           if (strpos($name, "<script") !== false || 
               strpos($code, "<script") !== false || 
               strpos($desc, "<script") !== false) {
               echo "<h2>Security Error: Malicious script detected!</h2>";
           } else {
               $laptop->laptopCode = $code;
               $laptop->laptopName = $name;
               $laptop->laptopDescription = $desc;
               $laptop->ram = $_POST['ram'];
               $laptop->storageCapacity = $_POST['storageCapacity'];
               $laptop->inchDimension = $_POST['inchDimension'];
               $laptop->laptopTypeID = !empty($_POST['laptopTypeID']) ? $_POST['laptopTypeID'] : NULL;
               $laptop->buyPrice = $_POST['buyPrice'];
               $laptop->sellPrice = $_POST['sellPrice'];
               
               $result = $laptop->updateLaptop();
               echo $result ? "<h2>Laptop $laptopID updated</h2>\n" : "<h2>Problem updating laptop $laptopID</h2>\n";
           }
       } else {
           echo "<h2>Update Canceled. No changes were made.</h2>\n";
       }
    }

    echo '<a href="index.php?content=listlaptops">Return to Laptop List</a>';

} else {
    echo "<h2>Access Denied: Please log in to update inventory.</h2>";
    echo '<a href="index.php">Log In</a>';
}
?>