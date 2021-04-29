<?php
session_start();
require_once 'database.php';
require_once 'repository.php';

$legend = filter_var($_POST['legend'], FILTER_SANITIZE_STRING);
$image_id = filter_var($_POST['image_id'], FILTER_SANITIZE_STRING);

$imageRepo = new ImageRepository($pdo);

$imageRepo->updateLegend($legend, $image_id);

header("Location: account.php");