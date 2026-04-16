<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #3/11/2026 -->

<h2>Enter New Laptop Type Information</h2>
<form name="newlaptoptype" action="index.php" method="post">
    <table>
        <tr><td>Type ID:</td><td><input type="number" name="laptopTypeID" min="1" max="10" required></td></tr>
        
        <tr><td>Type Code:</td><td><input type="text" name="laptopTypeCode" minlength="2" maxlength="10" required></td></tr>
        
        <tr><td>Type Name:</td><td><input type="text" name="laptopTypeName" minlength="10" maxlength="100" required></td></tr>
        
        <tr><td>Shelf Number:</td><td><input type="number" name="laptopShelfNumber" min="1" max="100" required></td></tr>
    </table><br>
    <input type="submit" value="Submit New Type">
    <input type="button" value="Cancel" onclick="window.location='index.php?content=listlaptoptypes'">
    <input type="hidden" name="content" value="addlaptoptype">
</form>