<?php
// A variable is defined by the $ in front of the variable name.
// PHP is untyped so the type of the variable depends on the data assigned to it

$name = "John";    // string (can be defined with double (") or single (') quotes
$age = 34;          // integer
$salary = 1450.34;  // float
$married = false;   // boolean

// Arrays
$children = array('Mary', 'Tom', 'Alice');                  // simple
$books_per_month = [2, 4, 4, 2, 3, 5, 1, 3, 1, 1, 3, 4];    // simple
$friends = [                                                // key-value pairs - associative array
    "Paul" => "6978-345672",
    "Sara" => "6922-109872",
    "Vic" => "6991-090912",
];
$last_game = [                                              // 2d
    ['x', 'o', 'x'],
    ['x', 'x', 'o'],
    ['o', 'o', 'x'],
];

echo("<b>$name</b> is $age y.o., earns &euro; $salary");
if($married) {
    echo(" is married<br>");
}
else {
    echo(" not married<br>");
}

echo ($married ? " is married" : " not married");
echo ("<br>");

echo("<b>Children</b><br>");
echo("<ul>");
foreach ($children as $child) {
    echo("<li>$child</li>");
}
echo("</ul>");

echo("<ul>");
for($i = 0; $i < count($children); $i++) {
    echo("<li>{$children[$i]}</li>");
}
echo("</ul>");

echo("<b>Phone Catalog</b><br>");
foreach ($friends as $key => $value) {
    echo ("$key: $value<br>");
}

echo("<b>Last Game</b><br>");
for($row = 0; $row < 3; $row++) {
    for ($col = 0; $col < 3; $col++) {
        echo "{$last_game[$row][$col]} ";
    }
    echo("<br>");
}

$total = 0;
$counter = 0;
while($counter < count($books_per_month)) {
    $total += $books_per_month[$counter];
    $counter++;
}
echo("Total books: $total");

$v = 1;
switch($v) {
    case 0:
        echo("Sunday");
        break;
    case 1:
        echo("Monday");
        break;
    default:
        echo("Not a day");
        break;
}
