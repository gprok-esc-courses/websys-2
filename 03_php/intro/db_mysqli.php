<?php

$db = mysqli_connect('localhost', 'tmp_user', '1111');
mysqli_select_db($db, 'tmp_students');


$sql = "SELECT * FROM students";

$result = mysqli_query($db, $sql);

echo("<h2>Students</h2>");
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo("{$row['lname']} {$row['fname']}, studies: {$row['major']}<br>");
    }
}
else {
    echo "No students found";
}