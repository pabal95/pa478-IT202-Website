<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #4/2/2026 -->
<script language="javascript">
function listbox_dblclick() {
    document.laptopTypes.viewbutton.click();
}

function button_click(target) {
    var userConfirmed = true;
    if (target == 1) {
        // Change this BACK to 'displaylaptoptype' so the View button actually VIEWS
        document.laptopTypes.content.value = "displaylaptoptype";
    } else if (target == 2) {
        userConfirmed = confirm("Are you sure you want to remove this laptop type?");
        document.laptopTypes.content.value = "removelaptoptype";
    } else if (target == 3) {
        // Target 3 is the actual Update button, so this stays as updatelaptoptype
        document.laptopTypes.content.value = "updatelaptoptype";
    }

    if (userConfirmed) {
        document.laptopTypes.submit();
    }
}
</script>
<?php
require_once("laptoptype.php");
$laptopTypes = LaptopType::getLaptopTypes();
if ($laptopTypes) {
?>
 <h2>Select Laptop Type</h2>
  <form name="laptopTypes" method="post">
   <select name="laptopTypeID" size="20" ondblclick="listbox_dblclick()">
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
   <br><br>
      <input type="button" name="viewbutton" value="View Laptop Type" onclick="button_click(1)">
      <input type="button" value="Delete Laptop Type" onclick="button_click(2)">
      <input type="button" value="Update Laptop Type" onclick="button_click(3)">

      <input type="hidden" name="content" value="">
  </form>
  <?php
$count = count($laptopTypes);
?>
<p id="inventory-count" style="font-weight: bold; margin-top: 20px;">
    Total Laptop Types: <?php echo $count; ?>
</p>
<?php
} else {
  echo "<h2>No laptop types found.</h2>";
}
?>