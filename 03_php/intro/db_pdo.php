<?php

$db = new PDO('mysql:host=localhost;dbname=tmp_students', 'tmp_user', '1111');

$sql = "SELECT * FROM students";
$result = $db->query($sql);

echo("<h2>Students</h2>");
foreach ($result as $row) {
    echo("{$row['lname']} {$row['fname']}, studies: {$row['major']}<br>");
}

$db = null;
