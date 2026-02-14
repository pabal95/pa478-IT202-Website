<!-- Pabal Ahmed
2/13/2026
Phase-01 Login and Logout
IT202-004 Internet Applications
pa478@njit.edu -->

<?php
if(isset($_SESSION['login'])) {
    // unset($_SESSION['login']);
    // unset($_SESSION['emailAddress']);
    // unset($_SESSION['firstName']);
    // unset($_SESSION['lastName']);
    // unset($_SESSION['pronouns']);
    // unset($_SESSION['phoneNumber']);
    session_unset();
    session_destroy();
}
header("Location: index.php");
?>