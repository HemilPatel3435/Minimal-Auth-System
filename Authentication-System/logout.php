<?php include_once("partials/_err.php") ?>
<?php
session_start();
session_unset();
session_destroy();
header("location:login.php");
$_SESSION['loggedin'] = false;
?>