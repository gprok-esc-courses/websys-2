<?php

# open the csv file
$game_file = fopen("dato.csv", "r");

$totals = array();

# loop through each line
//echo "<table border='1'>";
//while($line = fgets($game_file)) {
//    $data = explode(",", $line);
//    echo "<tr>";
//    echo "<td>" . $data[2] . ":</td><td>" . $data[0] . "</td>";
//    echo "</tr>";
//}
//echo "</table>";

# display some info
while($line = fgets($game_file)) {
    $data = explode(",", $line);
    $publisher = $data[2];
    if($publisher == 'Publisher') {
        continue;
    }
    if(array_key_exists($publisher, $totals)) {
        $totals[$publisher] += 1;
    }
    else {
        $totals[$publisher] = 1;
    }
}
arsort($totals);
foreach ($totals as $key => $value) {
    echo $key . ": " . $value . "<br>";
}
