<?php
/* -- #Pabal Ahmed
   -- #IT202-004
   -- #pa478@njit.edu
   -- #4/2/2026 */
require_once("laptoptype.php");
if (!isset($_POST['laptopTypeID']) || !is_numeric($_POST['laptopTypeID'])) {
    echo "<h2>Error: A valid Laptop Type ID is required to update.</h2>";
} else {
    $laptopTypeID = $_POST['laptopTypeID'];
    $laptopType = LaptopType::findLaptopType($laptopTypeID);
    if ($laptopType) {
?>
        <h2>Update Laptop Type #<?php echo $laptopTypeID; ?></h2>
        <form name="laptopTypes" action="index.php" method="post">
            <table>
                <tr>
                    <td>Type Code:</td>
                    <td><input type="text" name="laptopTypeCode" minlength="2" maxlength="10" 
                        value="<?php echo htmlspecialchars($laptopType->laptopTypeCode); ?>" required></td>
                </tr>
                <tr>
                    <td>Type Name:</td>
                    <td><input type="text" name="laptopTypeName" minlength="10" maxlength="100" 
                        value="<?php echo htmlspecialchars($laptopType->laptopTypeName); ?>" required></td>
                </tr>
                <tr>
                    <td>Shelf Number:</td>
                    <td><input type="number" name="laptopShelfNumber" min="1" max="100" 
                        value="<?php echo htmlspecialchars($laptopType->laptopShelfNumber); ?>" required></td>
                </tr>
                <tr>
                    <td>Date Created:</td>
                    <td><?php echo $laptopType->date_time_created; ?></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="answer" value="Update Laptop Type">
            <input type="button" value="Cancel" onclick="window.location='index.php?content=listlaptoptypes'">
            <input type="hidden" name="laptopTypeID" value="<?php echo $laptopTypeID; ?>">
            <input type="hidden" name="content" value="changelaptoptype">
        </form>
<?php
    }
}
?>