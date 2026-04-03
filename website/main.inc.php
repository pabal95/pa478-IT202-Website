<!-- Pabal Ahmed
4/2/2026
Phase-04 
IT202-004 Internet Applications
pa478@njit.edu -->

<?php
if (!isset($_SESSION['login'])) {
?>
  <h2>Please log in</h2>
  <form name="login" action="index.php" method="post">
    <label>Email:</label>
    <input type="text" name="email_address" size="20" required>
    
    <label>Password:</label>
    <input type="password" name="password" size="20" required>
    
    <input type="submit" value="Login">
    <input type="hidden" name="content" value="validate">
  </form>
<?php
} else {
   echo "<h2>Welcome to Inventory Helper, {$_SESSION['login']}</h2>";
?>
   <p>This program tracks laptop types and laptop inventory.</p>
   <p>Please use the links in the navigation window.</p>
   <p>Please DO NOT use the browser navigation buttons!</p>
   <a href="index.php?content=logout"><strong>Logout</strong></a>
<?php
}
?>