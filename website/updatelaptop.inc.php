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
          <td><input type="text" name="laptopCode" value="<?php echo $laptop->laptopCode; ?>" required></td>
        </tr>
        <tr>
          <td>Laptop Name</td>
          <td><input type="text" name="laptopName" value="<?php echo $laptop->laptopName; ?>" required></td>
        </tr>
        <tr>
          <td>Laptop Description</td>
          <td><textarea name="laptopDescription" rows="3" cols="30" required><?php echo $laptop->laptopDescription; ?></textarea></td>
        </tr>
        <tr>
          <td>RAM Capacity (GB)</td>
          <td><input type="number" name="ram" value="<?php echo $laptop->ram; ?>" required></td>
        </tr>
        <tr>
          <td>Storage Capacity (GB)</td>
          <td><input type="number" name="storageCapacity" value="<?php echo $laptop->storageCapacity; ?>" required></td>
        </tr>
        <tr>
          <td>Inch Dimension</td>
          <td><input type="number" name="inchDimension" value="<?php echo $laptop->inchDimension; ?>" required></td>
        </tr>
        <tr>
          <td>Laptop Type</td>
          <td>
            <select name="laptopTypeID">
              <option value="0">Select a Laptop Type</option>
              <?php
              $laptopTypes = LaptopType::getLaptopTypes();
              if ($laptopTypes) {
                  foreach ($laptopTypes as $laptopType) {
                      $typeID = $laptopType->laptopTypeID;
                      $selected = ($typeID == $laptop->laptopTypeID) ? "selected" : "";
                      // Ensure you use a property like laptopTypeName here
                      echo "<option value=\"$typeID\" $selected>" . $laptopType->laptopTypeName . "</option>\n";
                  }
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Buy Price</td>
          <td><input type="number" step="0.01" name="buyPrice" value="<?php echo $laptop->buyPrice; ?>" required></td>
        </tr>
        <tr>
          <td>Sell Price</td>
          <td><input type="number" step="0.01" name="sellPrice" value="<?php echo $laptop->sellPrice; ?>" required></td>
        </tr>
        <tr>
          <td>Date Created</td>
          <td><?php echo $laptop->date_time_created; ?></td>
        </tr>
      </table><br><br>
      <input type="submit" name="answer" value="Update Laptop">
      <input type="submit" name="answer" value="Cancel">
      <input type="hidden" name="laptopID" value="<?php echo $laptopID; ?>">
      <input type="hidden" name="content" value="changelaptop">
    </form>

    <script language="javascript">
        document.laptops.laptopCode.focus();
        document.laptops.laptopCode.select();
    </script>

  <?php
  } else {
  ?>
    <h2>Sorry, laptop <?php echo $laptopID; ?> not found</h2>
    <a href="index.php?content=listlaptops">List laptops</a>
<?php
  }
}
?>