<?php
// Open the API url
$data = file_get_contents('https://opentdb.com/api.php?amount=10');

// Read JSON data
$json = json_decode($data);

// Get the array of questions
$questions = $json->results;

// Display questions
foreach ($questions as $question) {
    echo "<div>" . $question->question . "</div>";
    $answers = [];
    $answers[] = $question->correct_answer;
    foreach ($question->incorrect_answers as $incorrect) {
        $answers[] = $incorrect;
    }
    shuffle($answers);
    foreach ($answers as $answer) {
        echo "<input type='radio'>" . $answer . "<br>";
    }
    echo "<hr>";
}