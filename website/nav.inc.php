  <?php
   if (isset($_SESSION['login'])) {
   ?>
    <div class="navigation" style="float: left; height: 100%; min-width: 175px; width: auto;">
      <table width="100%" cellpadding="3">
        <?php
         echo "<td><h3>Welcome, {$_SESSION['login']}</h3></td>";
         ?>
        <tr>
          <td><a href="index.php"><strong>Home</strong></a></td>
        </tr>
        <tr>
          <td><strong>Laptop Types</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listlaptoptypes">
              <strong>List Laptop Types</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newlaptoptype">
              <strong>Add New Laptop Type</strong></a></td>
        </tr>
        <tr>
          <td><strong>Laptops</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listlaptops">
              <strong>List Laptops</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newlaptop">
              <strong>Add New Laptop</strong></a></td>
        </tr>
        <tr>
          <td>
            <hr />
          </td>
        </tr>
        <tr>
          <td><a href="index.php?content=logout">
              <strong>Logout</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for Laptop:</label><br>
              <input type="text" name="laptopID" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="updatelaptop" />
            </form>
          </td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for Laptop Type:</label><br>
              <input type="text" name="laptopTypeID" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="displaylaptoptype" />
            </form>
          </td>
        </tr>
      </table>
    </div>
  <?php
   }
   ?>