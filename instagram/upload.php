<?php
session_start();
require_once 'database.php';
require_once 'repository.php';

if(!isset($_FILES['image'])) {
    echo "No image<br>";
    die();
}
$legend = filter_var($_POST['legend'], FILTER_SANITIZE_STRING);

$imageRepo = new ImageRepository($pdo);

$result = $imageRepo->save($_FILES['image'], $legend, $_SESSION['instagram_user_id']);

if($result == "Uploaded") {
    header("Location: account.php");
}
else {
    $errors = array();
    $errors['message'] = $result;
    $_SESSION['instagram_errors'] = $errors;
    header("Location: account.php");
}

