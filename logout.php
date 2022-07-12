
<?php
session_start();
unset($_SESSION['emailID']);
header("location:index.php");
?>
