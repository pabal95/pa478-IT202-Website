<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #3/13/2026 -->
<?php
session_start();
require_once("config.php");
require_once("laptoptype.php");
require_once("laptop.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pabal's Laptops | Inventory</title>
    <link rel="stylesheet" type="text/css" href="ih_styles.css">
</head>
<body>
    <header>
        <?php include("header.inc.php"); ?>
    </header>

    <section style="display: flex; min-height: 600px;">
        <nav style="width: 200px; background-color: #86836D;">
            <?php include("nav.inc.php"); ?>
        </nav>
        
        <main style="flex: 1; padding: 20px;">
            <?php
            if (isset($_REQUEST['content'])) {
                // This line looks for files like 'listlaptops.inc.php'
                include($_REQUEST['content'] . ".inc.php");
            } else {
                include("main.inc.php");
            }
            ?>
        </main>
    </section>

    <footer>
         <?php include("footer.inc.php"); ?>
    </footer>
</body>
</html>