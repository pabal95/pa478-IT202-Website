<?php
require_once("laptoptype.php");

if (isset($_SESSION['login'])) {
    $laptopTypeID = $_POST['laptopTypeID'];
    $answer = $_POST['answer'];

    if ((trim($laptopTypeID) == '') or (!is_numeric($laptopTypeID))) {
        echo "<h2>Sorry, you must enter a valid laptop type ID</h2>\n";
    } else if (!LaptopType::findLaptopType($laptopTypeID)) {
        echo "<h2>Sorry, a laptop type with ID #$laptopTypeID does not exist</h2>\n";
    } else {
      
        if ($answer == "Update Laptop Type") {
            $laptopType = LaptopType::findLaptopType($laptopTypeID);
            
            $code = $_POST['laptopTypeCode'];
            $name = $_POST['laptopTypeName'];
            $shelf = $_POST['laptopShelfNumber'];

            
            if (strpos($name, "<script") !== false || strpos($code, "<script") !== false) {
                echo "<h2>Security Error: Script injection detected!</h2>";
                echo "<p>Please avoid using HTML tags in your entries.</p>";
            } else {
                // Update properties and save
                $laptopType->laptopTypeCode = $code;
                $laptopType->laptopTypeName = $name;
                $laptopType->laptopShelfNumber = $shelf;
                
                $result = $laptopType->updateLaptopType();
                if ($result) {
                    echo "<h2>Success: Laptop Type $laptopTypeID has been updated.</h2>\n";
                } else {
                    echo "<h2>Error: Problem updating laptop type $laptopTypeID.</h2>\n";
                }
            }
        
        } else {
            echo "<h2>Update Canceled. No changes were made to Laptop Type $laptopTypeID.</h2>\n";
        }
    }

    echo '<br><a href="index.php?content=listlaptoptypes">Return to Laptop Type List</a>';

} else {
    echo "<h2>Sorry, you must be logged in to update a laptop type.</h2>\n";
    echo '<a href="index.php">Please log in.</a>';
}
?>