<?php
$visitor = filter_var($_POST['visitor'], FILTER_SANITIZE_STRING);

setcookie('visitor', $visitor, time() + (86400 * 30)); // 86400 = 1 day

header("Location: home.php");
die();