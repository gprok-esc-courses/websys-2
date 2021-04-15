<?php
session_start();
require_once "connection.php";
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$result = $db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

if($result->rowCount() > 0) {
    $_SESSION['username'] = $username;
    header("Location: data.php");
}
else {
    header("Location: login.php");
}

