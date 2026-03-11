<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #3/11/2026 -->

<?php
require_once("laptoptype.php");
$laptopTypes = LaptopType::getLaptopTypes();
if ($laptopTypes) {
?>
 <h2>Select Laptop Type</h2>
  <form name="laptopTypes" method="post">
   <select name="laptopTypeID" size="20">
       <?php
       $first = true;
       foreach ($laptopTypes as $laptopType) {
           $laptopTypeID = $laptopType->laptopTypeID;
           $name = $laptopTypeID . " - " . $laptopType->laptopTypeCode . ", " . $laptopType->laptopTypeName . ", Shelf No: " . $laptopType->laptopShelfNumber;
           if($first) {
                echo "<option value=\"$laptopTypeID\" selected>$name</option>\n"; 
                $first = false;
           } else {
                echo "<option value=\"$laptopTypeID\">$name</option>\n";
           }
       }
       ?>
   </select>
  </form>
<?php
} else {
  echo "<h2>No laptop types found.</h2>";
}
?>