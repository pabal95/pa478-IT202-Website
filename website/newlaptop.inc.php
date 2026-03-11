<!-- -- #Pabal Ahmed
-- #IT202-004 
-- #pa478@njit.edu
-- #3/11/2026 -->

<h2>Enter New Laptop Information</h2>
<form name="newlaptop" action="index.php" method="post">
    <table cellpadding="1" border="0">
        <tr>
            <td>Laptop ID:</td>
            <td><input type="text" name="laptopID" size="4"></td>
        </tr>
        <tr>
            <td>Laptop Code:</td>
            <td><input type="text" name="laptopCode" size="20"></td>
        </tr>
        <tr>
            <td>Laptop Name:</td>
            <td><input type="text" name="laptopName" size="20"></td>
        </tr>
        <tr>
            <td>Laptop Description:</td>
            <td><input type="text" name="laptopDescription" size="30"></td>
        </tr>
        <tr>
            <td>RAM Capacity (GB):</td>
            <td><input type="text" name="ram" size="10"></td>
        </tr>
        <tr>
            <td>Storage Capacity (GB):</td>
            <td><input type="text" name="storageCapacity" size="10"></td>
        </tr>
        <tr>
            <td>Inch Dimension:</td>
            <td><input type="text" name="inchDimension" size="10"></td>
        </tr>
         <tr>
            <td>Laptop Type:</td>
            <td><select name="laptopTypeID">
                    <?php
                    echo "<option value=\"0\">Select a Laptop Type</option>\n";
                    $laptopTypes = LaptopType::getLaptopTypes();
                    if ($laptopTypes)
                        foreach ($laptopTypes as $laptopType) {
                            $laptopTypeID = $laptopType->laptopTypeID;
                            echo "<option value=\"$laptopTypeID\">$laptopType</option>\n";
                        }
                    ?></td>
        </tr>
        <tr>
            <td>Buy Price:</td>
            <td><input type="text" name="buyPrice" size="10"></td>
        </tr>
        <tr>
            <td>Sell Price:</td>
            <td><input type="text" name="sellPrice" size="10"></td>
        </tr>
    </table><br>
    <input type="submit" value="Submit New Laptop">
    <input type="hidden" name="content" value="addlaptop">
</form>