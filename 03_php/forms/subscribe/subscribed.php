<?php
session_start();
if(isset($_SESSION['form_data'])) {
    $formData = $_SESSION['form_data'];
    unset($_SESSION['form_data']);



    echo "<h1>SUBSCRIBED</h1>";
    echo "Name: " . $formData['fullname'] . '<br>';
    echo "Email: " . $formData['email'] . '<br>';
    echo "Education: " . ($formData['education'] == 'Select' ? 'None selected' : $formData['education']) . "<br>";
    echo "Subscription Type: " . $formData['type'] . "<br>";
    echo "EXTRA: <br>";
    foreach ($formData['selectedExtras'] as $extra) {
        echo $extra . '<br>';
    }

    echo "<h1>Total cost: {$formData['cost']}</h1>";
}
else {
    echo "No data found";
}

