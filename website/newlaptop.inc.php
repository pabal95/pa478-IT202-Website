<script language="javascript">
function validateForm() {
    var form = document.newlaptop;
    if (form.laptopID.value == "" || form.laptopName.value == "") {
        alert("ID and Name are required.");
        return false;
    }
    if (parseFloat(form.buyPrice.value) <= 0 || parseFloat(form.sellPrice.value) <= 0) {
        alert("Prices must be greater than zero.");
        return false;
    }
    return true;
}
</script>

<h2>Enter New Laptop Information</h2>
<form name="newlaptop" action="index.php" method="post" onsubmit="return validateForm()">
    <table>
        <tr><td>Laptop ID:</td><td><input type="number" name="laptopID" min="1" max="1000000" required></td></tr>
        
        <tr><td>Code:</td><td><input type="text" name="laptopCode" minlength="2" maxlength="10" required></td></tr>
        
        <tr><td>Name:</td><td><input type="text" name="laptopName" minlength="10" maxlength="100" required></td></tr>
        
        <tr><td>Description:</td><td><textarea name="laptopDescription" rows="3" minlength="100" maxlength="255" required></textarea></td></tr>
        
        <tr><td>RAM (GB):</td><td><input type="number" name="ram" min="1" max="128" required></td></tr>
        <tr><td>Storage (GB):</td><td><input type="number" name="storageCapacity" min="1" max="8000" required></td></tr>
        <tr><td>Dimension (in):</td><td><input type="number" name="inchDimension" min="1" max="50" required></td></tr>
        
        <tr>
            <td>Type:</td>
            <td>
                <select name="laptopTypeID" required>
                    <?php
                    $laptopTypes = LaptopType::getLaptopTypes();
                    foreach ($laptopTypes as $type) {
                        echo "<option value=\"$type->laptopTypeID\">$type->laptopTypeName</option>\n";
                    }
                    ?>
                </select>
            </td>
        </tr>
        
        <tr><td>Buy Price:</td><td><input type="number" step="0.01" name="buyPrice" min="0.01" max="10000" required></td></tr>
        <tr><td>Sell Price:</td><td><input type="number" step="0.01" name="sellPrice" min="0.01" max="15000" required></td></tr>
    </table><br>
    <input type="submit" value="Submit New Laptop">
    <input type="hidden" name="content" value="addlaptop">
</form>