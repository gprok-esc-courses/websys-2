<?php

// Open the API url
$data = file_get_contents('https://api.chucknorris.io/jokes/random');

// Read JSON data
$json = json_decode($data);

// Extract the 'value' element which contains the joke
$joke = $json->value;

// Display the joke
echo $joke;
