<?php
/* -- #Pabal Ahmed
   -- #IT202-004
   -- #pa478@njit.edu
   -- #4/2/2026 */


if (!isset($_POST['laptopTypeID']) || !is_numeric($_POST['laptopTypeID'])) {
    echo "<h2>Error: A valid Laptop Type ID is required to update.</h2>";
    echo "<a href=\"index.php?content=listlaptoptypes\">Return to List</a>";
} else {
    $laptopTypeID = $_POST['laptopTypeID'];
    $laptopType = LaptopType::findLaptopType($laptopTypeID);

    if ($laptopType) {
?>
        <h2>Update Laptop Type #<?php echo $laptopTypeID; ?></h2>
        
        <form name="laptopTypes" action="index.php" method="post">
            <table>
                <tr>
                    <td>Laptop Type ID:</td>
                    <td><?php echo $laptopTypeID; ?></td>
                </tr>
                <tr>
                    <td>Type Code:</td>
                    <td>
                        <input type="text" name="laptopTypeCode" 
                               value="<?php echo $laptopType->laptopTypeCode; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Type Name:</td>
                    <td>
                        <input type="text" name="laptopTypeName" 
                               value="<?php echo $laptopType->laptopTypeName; ?>" required>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" name="answer" value="Update Laptop Type">
            <input type="submit" name="answer" value="Cancel">
            
            <input type="hidden" name="laptopTypeID" value="<?php echo $laptopTypeID; ?>">
            <input type="hidden" name="content" value="changelaptoptype">
        </form>

        <script language="javascript">
            document.laptopTypes.laptopTypeCode.focus();
            document.laptopTypes.laptopTypeCode.select();
        </script>
<?php
    } else {
        echo "<h2>Error: Laptop Type #$laptopTypeID not found.</h2>";
    }
}
?>