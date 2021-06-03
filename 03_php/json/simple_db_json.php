<?php
header("Content-type:application/json;charset=utf-8");

$pdo = new PDO('mysql:host=localhost;dbname=php_instagram', 'root', 'root');

$result = $pdo->query("SELECT images.id, filename, legend, username FROM images, users 
                        WHERE images.users_id=users.id");

$data = $result->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($data);

echo $json;