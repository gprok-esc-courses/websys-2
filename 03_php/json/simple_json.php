<?php
header("Content-type:application/json;charset=utf-8");

$data = array();
$data['result'] = 1;
$data['names'] = ['Peter', 'Paul', 'Mary'];

$json = json_encode($data);

echo $json;
