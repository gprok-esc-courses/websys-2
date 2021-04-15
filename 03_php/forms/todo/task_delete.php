<?php

require_once "connection.php";

$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

$db->exec("DELETE FROM simple_tasks WHERE id=$id");

header("Location: tasks.php");