<?php
setcookie('visitor', '', time() - 3600);

header("Location: home.php");
die();

