<?php

function sum($nums) {
    $total = 0;
    foreach ($nums as $n) {
        $total += $n;
    }
    return $total;
}


// $values = [4, 5, 6, 7, 8, 9, 10];
// echo("Total: " . sum($values));

