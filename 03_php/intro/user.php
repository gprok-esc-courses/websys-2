<?php

$name = "John";
$age = 34;
$salary = 1056.23;
$married = false;
$m = $married ? "Yes" : "No";

?>
<html>
    <body>
        <h1><?=$name;?></h1>
        <p>Age: <?=$age;?></p>
        <p>Salary: <?=$salary;?></p>
        <p>Married: <?=$m;?></p>
    </body>
</html>
