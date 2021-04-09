<style>
    td {
        padding: 4px;
    }
</style>
<?php

# generate a random number 1 to 1.000.000
$rnd = rand(1, 10);

# open the sudoku file
$sfile = fopen("sudoku.csv", "r");

# loop reading line to the random number, use the line
$line = "";
$counter = 0;
while($line = fgets($sfile)) {
    if($counter == $rnd) {
        break;
    }
    $counter++;
}

# display the sudoku
$puzzle = explode(",", $line);
echo $puzzle[0] . "<br>";
$sudoku = $puzzle[0];

echo "<table border='1'><tr>";
for($i = 0; $i < strlen($sudoku); $i++) {
    if($i != 0 && $i % 9 == 0) {
        echo "</tr><tr>";
    }
    if($sudoku[$i] == 0) {
        echo "<td>&nbsp;</td>";
    }
    else {
        echo "<td>" . $sudoku[$i] . "</td>";
    }
}
echo "</tr></table>";


