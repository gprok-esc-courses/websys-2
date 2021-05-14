<?php
header("Content-type: application/json");
$pdo = new PDO("mysql:host=localhost;dbname=php_instagram", "root", "root");

$result = $pdo->query("SELECT id, filename, legend FROM images");
$data = $result->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($data);

echo $json;