<?php
session_start();
require_once 'database.php';
require_once 'repository.php';

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$userRepository = new UserRepository($pdo);
$user = $userRepository->authenticate($username, $password);

if($user != null) {
    $_SESSION['instagram_username'] = $user->username;
    $_SESSION['instagram_user_id'] = $user->id;
    header("Location: feed.php");
}
else {
    $errors = array();
    $errors['message'] = "Username/Password is wrong";
    $errors['username'] = $username;
    $_SESSION['instagram_errors'] = $errors;
    header("Location: login.php");
}


