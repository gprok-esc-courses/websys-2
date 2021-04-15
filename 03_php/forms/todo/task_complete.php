<?php

require_once "connection.php";

$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

$db->exec("UPDATE simple_tasks SET completed=1 WHERE id=$id");

header("Location: tasks.php");
