<!--
    -- #Pabal Ahmed
    -- #IT202-004
    -- $4/3/2026
-->

<?php
if (!isset($_POST['laptopID']) or (!is_numeric($_POST['laptopID']))) {
    echo "<h2>Error: Invalid laptop ID selection.</h2>";
    echo '<a href="index.php?content=listlaptops">Return to List</a>';
} else {
    $laptopID = $_POST['laptopID'];
    $laptop = Laptop::findLaptop($laptopID);
    if ($laptop) {
?>
    <h2>Update Laptop #<?php echo $laptop->laptopID; ?></h2><br>
    <form name="laptops" action="index.php" method="post">
      <table>
        <tr>
          <td>Laptop Code:</td>
          <td><input type="text" name="laptopCode" minlength="2" maxlength="10"
                     value="<?php echo htmlspecialchars($laptop->laptopCode); ?>" required></td>
        </tr>
        <tr>
          <td>Laptop Name:</td>
          <td><input type="text" name="laptopName" minlength="10" maxlength="100"
                     value="<?php echo htmlspecialchars($laptop->laptopName); ?>" required></td>
        </tr>
        <tr>
          <td>Description:</td>
          <td><textarea name="laptopDescription" rows="3" minlength="100" maxlength="255" required><?php echo htmlspecialchars($laptop->laptopDescription); ?></textarea></td>
        </tr>
        <tr>
          <td>Buy Price:</td>
          <td><input type="number" step="0.01" name="buyPrice" min="0.01" max="10000"
                     value="<?php echo htmlspecialchars($laptop->buyPrice); ?>" required></td>
        </tr>
        <tr>
          <td>Sell Price:</td>
          <td><input type="number" step="0.01" name="sellPrice" min="0.01" max="15000"
                     value="<?php echo htmlspecialchars($laptop->sellPrice); ?>" required></td>
        </tr>
        <tr>
          <td>Category:</td>
          <td>
            <select name="laptopTypeID" required>
              <?php
              $laptopTypes = LaptopType::getLaptopTypes();
              foreach ($laptopTypes as $type) {
                  $selected = ($type->laptopTypeID == $laptop->laptopTypeID) ? "selected" : "";
                  echo "<option value=\"$type->laptopTypeID\" $selected>$type->laptopTypeName</option>\n";
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Date Created:</td>
          <td><?php echo $laptop->date_time_created; ?></td>
        </tr>
      </table><br>
      <input type="submit" name="answer" value="Update Laptop">
      <input type="submit" name="answer" value="Cancel">
      <input type="hidden" name="laptopID" value="<?php echo $laptopID; ?>">
      <input type="hidden" name="content" value="changelaptop">
    </form>
<?php
    }
}
?>