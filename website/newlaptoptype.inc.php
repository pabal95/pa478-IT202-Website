<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #3/11/2026 -->

<h2>Enter New Laptop Type Information</h2>
<form name="newlaptopType" action="index.php" method="post">
   <table cellpadding="1" border="0">
       <tr>
           <td>Laptop Type ID:</td>
           <td><input type="number" name="laptopTypeID" size="4" min="1" max="99" required></td>
       </tr>
       <tr>
           <td>Laptop Type Code:</td>
           <td><input type="text" name="laptopTypeCode" size="20" placeholder="XXX" minlength="3" required></td>
       </tr>
       <tr>
           <td>Laptop Type Name:</td>
           <td><input type="text" name="laptopTypeName" size="20" required></td>
       </tr>
       <tr>
           <td>Laptop Shelf Number:</td>
           <td><input type="number" name="laptopShelfNumber" size="4" min="1" max="99" required></td>
       </tr>
   </table><br>
   <input type="submit" value="Submit New Laptop Type">
   <input type="hidden" name="content" value="addlaptopType">
</form>