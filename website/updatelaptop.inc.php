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
          <td>Laptop Name</td>
          <td><input type="text" name="laptopName" value="<?php echo $laptop->laptopName; ?>"></td>
        </tr>
        <tr>
          <td>Laptop Type:</td>
          <td><select name="laptopTypeID">
              <?php
              echo "<option value=\"0\">Select a Laptop type</option>\n";
              $laptopTypes = LaptopType::getLaptopTypes();
              if ($laptopTypes)
                foreach ($laptopTypes as $laptopType) {
                  $laptopTypeID = $laptopType->laptopTypeID;
                  $selected = $laptopTypeID == $laptop->laptopTypeID ? "selected" : "";
                  echo "<option value=\"$laptopTypeID\" $selected>$laptopType</option>\n";
                }
              ?></td>
        </tr>
        <tr>
          <td>Buy Price</td>
          <td><input type=" text" name="buyPrice" value="<?php echo $laptop->buyPrice; ?>"></td>
        </tr>
      </table><br><br>
      <input type="submit" name="answer" value="Update Laptop">
      <input type="submit" name="answer" value="Cancel">
      <input type="hidden" name="laptopID" value="<?php echo $laptopID; ?>">
      <input type="hidden" name="content" value="updatelaptop">
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