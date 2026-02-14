<!-- Pabal Ahmed
2/13/2026
Phase-01 Login and Logout
IT202-004 Internet Applications
pa478@njit.edu -->

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head><title>Laptop Inventory Website</title></head>
<body>
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
</body>
</html>