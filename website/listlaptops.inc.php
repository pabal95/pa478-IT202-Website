<!-- #Pabal Ahmed
     -- #IT202-004
     -- #4/2/2026
     -- #-->
<script language="javascript">
function laptop_dblclick() {
    document.laptops.viewbutton.click();
}

function laptop_button_click(target) {
    var userConfirmed = true;
    if (target == 1) {
        // Change this from 'updatelaptop' to 'displaylaptop'
        document.laptops.content.value = "displaylaptop";
    } else if (target == 2) {
        userConfirmed = confirm("Are you sure you want to delete this laptop?");
        document.laptops.content.value = "removelaptop";
    } else if (target == 3) {
        // Target 3 remains 'updatelaptop' for the actual Update button
        document.laptops.content.value = "updatelaptop";
    }

    if (userConfirmed) {
        document.laptops.submit();
    }
}
</script>

<?php
require_once("laptop.php");
$laptops = Laptop::getLaptops();

if ($laptops) {
    $totalValue = 0; 
?>
    <h2>Select a Laptop</h2>
    <form name="laptops" action="index.php" method="post">
        <select name="laptopID" size="15" style="width: 100%;" ondblclick="laptop_dblclick()">
            <?php
            foreach ($laptops as $laptop) {
                $totalValue += $laptop->buyPrice; // Requirement: Summing prices
                echo "<option value=\"$laptop->laptopID\">$laptop->laptopID - $laptop->laptopName</option>\n";
            }
            ?>
        </select>
        <br><br>
        <input type="button" name="viewbutton" value="View Details" onclick="laptop_button_click(1)">
        <input type="button" value="Update Laptop" onclick="laptop_button_click(3)">
        <input type="button" value="Delete" onclick="laptop_button_click(2)">
        <input type="hidden" name="content" value="">
    </form>
    
    <p><strong>Total Inventory Value:</strong> $<?php echo number_format($totalValue, 2); ?></p>
<?php
} else {
    echo "<h2>No laptops found in the database.</h2>";
}
?>