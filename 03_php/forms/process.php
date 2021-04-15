<?php

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

// echo $username . " " . $password;

if($username == 'john' && $password == '1111') {
    header("Location: ok.php");
}
else {
    header("Location: form.php");
}