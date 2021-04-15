<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}

?>

<h1>WELCOME</h1>
<a href="logout.php">Logout</a>
