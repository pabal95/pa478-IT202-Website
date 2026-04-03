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
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
    <header>
        <?php include("header.inc.php"); ?>
    </header>
    <section style="height: 375px;">
        <nav>
            <?php include("nav.inc.php"); ?>
        </nav>
   <section>
       <main>
           <?php
           if (isset($_REQUEST['content'])) {
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