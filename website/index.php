<!-- Pabal Ahmed
2/13/2026
Phase-01 Login and Logout
IT202-004 Internet Applications
pa478@njit.edu -->

<?php
session_start();
// require_once(("config.php"));
require_once("laptoptype.php");
require_once("laptop.php");
?>
<!DOCTYPE html>
<html>
<head><title>Laptop Inventory Website</title></head>
<body>
    <header>
        <?php include("header.inc.php"); ?>
    </header>
    <section style="height: 425px;">
        <nav>
        <?php include("nav.inc.php"); ?>
        </nav>
    </section>
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