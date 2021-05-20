<?php

$per_page = 10;
$page = 1;
if(isset($_GET['page'])) {
    $page = $_GET['page'];
}

$start = $page * $per_page - $per_page;
echo $start . "<br>";

$pdo = new PDO('mysql:host=localhost;dbname=php_pagination', 'root', 'root');

// Find the total number of posts
$sql = "SELECT COUNT(*) as total from posts";
$result = $pdo->query($sql);
$total = 0;
if($row = $result->fetch()) {
    $total = $row['total'];
    echo $row['total'] . "<br>";
}

// Load the necessary posts
$sql = "SELECT * FROM posts LIMIT $start, $per_page";
$result = $pdo->query($sql);

// Display the posts
foreach ($result as $row) {
    echo "<p>" . $row['id'] . ". " . $row['title'] . "</p>";
}


// Display the pagination numbers
$pages = $total / $per_page;
echo "<div>";
if($page > 1) {
    echo " <a href=blog.php?page=" . ($page - 1) . ">&lt;</a> ";
}
for($i = 1; $i <= $pages; $i++) {
    if($i == $page) {
        echo $i . " ";
    }
    else {
        echo "<a href=blog.php?page=" . $i . ">" . $i . "</a> ";
    }
}
if($page < $pages) {
    echo " <a href=blog.php?page=" . ($page + 1) . ">&gt;</a> ";
}
echo "</div>";
