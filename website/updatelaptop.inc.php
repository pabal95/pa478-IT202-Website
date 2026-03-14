<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #3/13/2026 -->

<?php
if (!isset($_POST['laptopID']) or (!is_numeric($_POST['laptopID']))) {
?>
  <h2>You did not select a valid laptopID value</h2>
  <a href="index.php?content=listlaptops">List laptops</a>
  <?php
} else {
  $laptopID = $_POST['laptopID'];
  $laptop = Laptop::findLaptop($laptopID);
  if ($laptop) {
  ?>
    <h2>Update Laptop <?php echo $laptop->laptopID; ?></h2><br>
    <form name="laptops" action="index.php" method="post">
      <table>
        <tr>
          <td>Laptop ID</td>
          <td><?php echo $laptop->laptopID; ?></td>
        </tr>
        <tr>
          <td>Laptop Code</td>
          <td><input type="text" name="laptopCode" value="<?php echo $laptop->laptopCode; ?>"></td>
        </tr>
        <tr>
          <td>Laptop Name</td>
          <td><input type="text" name="laptopName" value="<?php echo $laptop->laptopName; ?>"></td>
        </tr>
        <tr>
          <td>Laptop Description</td>
          <td><input type="text" name="laptopDescription" value="<?php echo $laptop->laptopDescription; ?>"></td>
        </tr>
        <tr>
          <td>RAM Capacity (GB)</td>
          <td><input type="text" name="ram" value="<?php echo $laptop->ram; ?>"></td>
        </tr>
        <tr>
          <td>Storage Capacity (GB)</td>
          <td><input type="text" name="storageCapacity" value="<?php echo $laptop->storageCapacity; ?>"></td>
        </tr>
        <tr>
          <td>Inch Dimension</td>
          <td><input type="text" name="inchDimension" value="<?php echo $laptop->inchDimension; ?>"></td>
        </tr>
        <tr>
          <td>Laptop Type</td>
          <td><select name="laptopTypeID">
              <?php
              echo "<option value=\"0\">Select a Laptop Type</option>\n";
              $laptopTypes = LaptopType::getLaptopTypes();
              if ($laptopTypes)
                  foreach ($laptopTypes as $laptopType) {
                      $laptopTypeID = $laptopType->laptopTypeID;
                      $selected = ($laptopTypeID == $laptop->laptopTypeID) ? "selected" : "";
                      echo "<option value=\"$laptopTypeID\" $selected>$laptopType</option>\n";
                  }
              ?>
            </select></td>
        </tr>
        <tr>
          <td>Buy Price</td>
          <td><input type="text" name="buyPrice" value="<?php echo $laptop->buyPrice; ?>"></td>
        </tr>
        <tr>
          <td>Sell Price</td>
          <td><input type="text" name="sellPrice" value="<?php echo $laptop->sellPrice; ?>"></td>
        </tr>
      </table><br><br>
      <input type="submit" name="answer" value="Update Laptop">
      <input type="submit" name="answer" value="Cancel">
      <input type="hidden" name="laptopID" value="<?php echo $laptopID; ?>">
      <input type="hidden" name="content" value="changelaptop">
    </form>
  <?php
  } else {
  ?>
    <h2>Sorry, laptop <?php echo $laptopID; ?> not found</h2>
    <a href="index.php?content=listlaptops">List laptops</a>
<?php
  }
}
?>