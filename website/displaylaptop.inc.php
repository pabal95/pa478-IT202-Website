<?php
if (!isset($_REQUEST['laptopID']) or (!is_numeric($_REQUEST['laptopID']))) {
    echo "<h2>Error: No valid laptop ID selected.</h2>";
    echo '<a href="index.php?content=listlaptops">Return to List</a>';
} else {
    $laptopID = $_REQUEST['laptopID'];
    $laptop = Laptop::findLaptop($laptopID);
    if ($laptop) {
        // Fetch the category name for a better display
        $type = LaptopType::findLaptopType($laptop->laptopTypeID);
        $typeName = $type ? $type->laptopTypeName : "Unknown";
?>
        <h2>Laptop Details: <?php echo htmlspecialchars($laptop->laptopName); ?></h2>
        <table border="1" cellpadding="5">
            <tr><td><strong>Laptop ID:</strong></td><td><?php echo $laptop->laptopID; ?></td></tr>
            <tr><td><strong>Code:</strong></td><td><?php echo htmlspecialchars($laptop->laptopCode); ?></td></tr>
            <tr><td><strong>Category:</strong></td><td><?php echo htmlspecialchars($typeName); ?></td></tr>
            <tr><td><strong>RAM:</strong></td><td><?php echo $laptop->ram; ?> GB</td></tr>
            <tr><td><strong>Storage:</strong></td><td><?php echo $laptop->storageCapacity; ?> GB</td></tr>
            <tr><td><strong>Screen:</strong></td><td><?php echo $laptop->inchDimension; ?> inches</td></tr>
            <tr><td><strong>Sell Price:</strong></td><td>$<?php echo number_format($laptop->sellPrice, 2); ?></td></tr>
            <tr><td><strong>Description:</strong></td><td><?php echo htmlspecialchars($laptop->laptopDescription); ?></td></tr>
            <tr><td><strong>Date Created:</strong></td><td><?php echo $laptop->date_time_created; ?></td></tr>
        </table>
        <br>
        <input type="button" value="Back to Laptop List" 
               onclick="window.location.href='index.php?content=listlaptops'">
<?php
    } else {
        echo "<h2>Sorry, Laptop #$laptopID not found.</h2>";
    }
}
?>