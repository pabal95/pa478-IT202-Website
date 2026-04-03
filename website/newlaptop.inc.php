<script language="javascript">
function validateForm() {
    var form = document.newlaptop;
    // Requirement: Check for empty fields and positive numbers
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
        <tr><td>Laptop ID:</td><td><input type="number" name="laptopID" required></td></tr>
        <tr><td>Code:</td><td><input type="text" name="laptopCode" required></td></tr>
        <tr><td>Name:</td><td><input type="text" name="laptopName" required></td></tr>
        <tr><td>Description:</td><td><textarea name="laptopDescription" rows="3" required></textarea></td></tr>
        <tr><td>RAM (GB):</td><td><input type="number" name="ram" required></td></tr>
        <tr><td>Storage (GB):</td><td><input type="number" name="storageCapacity" required></td></tr>
        <tr><td>Dimension (in):</td><td><input type="number" name="inchDimension" required></td></tr>
        <tr>
            <td>Type:</td>
            <td>
                <select name="laptopTypeID">
                    <?php
                    $laptopTypes = LaptopType::getLaptopTypes();
                    foreach ($laptopTypes as $type) {
                        echo "<option value=\"$type->laptopTypeID\">$type->laptopTypeName</option>\n";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr><td>Buy Price:</td><td><input type="number" step="0.01" name="buyPrice" required></td></tr>
        <tr><td>Sell Price:</td><td><input type="number" step="0.01" name="sellPrice" required></td></tr>
    </table><br>
    <input type="submit" value="Submit New Laptop">
    <input type="hidden" name="content" value="addlaptop">
</form>