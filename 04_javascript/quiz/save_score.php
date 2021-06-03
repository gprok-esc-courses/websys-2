<?php
header("Content-type:application/json;charset=utf-8");

$pdo = new PDO('mysql:host=localhost;dbname=php_quiz', 'root', 'root');

$json_data = file_get_contents('php://input');
$json_values = json_decode($json_data);

$score = $json_values->score;
$username = $json_values->username;
$category_id = $json_values->category_id;

$statement = $pdo->prepare("INSERT INTO scores (username, score, category_id) VALUES (?, ?, ?)");
$statement->execute([$username, $score, $category_id]);

$response['result'] = 'success';
$json = json_encode($response);

echo($json);


