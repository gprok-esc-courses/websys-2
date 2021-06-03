<?php
header("Content-type:application/json;charset=utf-8");

$arr = [1,2,3,4,5,6];

$json = json_encode($arr);

echo $json;