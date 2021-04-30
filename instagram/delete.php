<?php
session_start();
require_once 'database.php';

if(!isset($_SESSION['instagram_user_id'])) {
    header("Location: login.php");
    die();
}
$user_id = $_SESSION['instagram_user_id'];

$id = filter_var($_POST['image_id'], FILTER_SANITIZE_STRING);

echo $id;

// find the file name
$result = $pdo->query("SELECT * FROM images WHERE id=$id");
if($row = $result->fetch()) {
    // delete the file in images/<user-id>/<filename>
    $filename = $row['filename'];
    unlink("images/$user_id/$filename");

    // delete from the database
    $stmt = $pdo->prepare("DELETE FROM images WHERE id=?");
    $stmt->execute([$id]);
}

header("Location: account.php");

