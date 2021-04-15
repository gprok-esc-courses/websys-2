<?php
require_once "connection.php";

$task = filter_var($_POST['task'], FILTER_SANITIZE_STRING);

$db->exec("INSERT INTO simple_tasks (title) VALUES ('$task')");

header("Location: tasks.php");
