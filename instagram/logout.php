<?php
session_start();

unset($_SESSION['instagram_username']);
unset($_SESSION['instagram_user_id']);

header("Location: feed.php");