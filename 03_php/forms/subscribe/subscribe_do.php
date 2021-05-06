<?php
// Version 1: form action is SAME page
session_start();

$formOK = true;
$fullname = "";
$email = "";
$education = "Select";
$type = "Monthly";
$selectedExtras = [];
$errors = [];
if(isset($_POST['subscribe'])) {
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $education = $_POST['education'];
    $type = $_POST['type'];
    if(isset($_POST['extra'])) {
        $selectedExtras = $_POST['extra'];
    }

    if(empty($fullname)) {
        $errors[] = "Fullname is mandatory<br>";
        $formOK = false;
    }
    if(empty($email)) {
        $errors[] = "Email is mandatory<br>";
        $formOK = false;
    }
    $_SESSION['form_data'] = [
        'fullname' => $fullname,
        'email' => $email,
        'education' => $education,
        'type' => $type,
        'selectedExtras' => $selectedExtras,
    ];
    if($formOK) {
        $cost = 0;
        switch ($type) {
            case 'Monthly':
                $cost = 10;
                break;
            case 'Six Months':
                $cost = 60 - (60 * 0.05);
                break;
            case 'Yearly':
                $cost = 120 - (120 * 0.10);
                break;
        }
        if (in_array('Printed version', $selectedExtras)) {
            switch ($type) {
                case 'Monthly':
                    $cost += 15;
                    break;
                case 'Six Months':
                    $cost += 6*15 - (6*15*0.05);
                    break;
                case 'Yearly':
                    $cost += 12*15 - (12*15 * 0.10);
                    break;
            }
        }
        if (in_array('Year Review', $selectedExtras)) {
            if($type != 'Yearly') {
                $cost += 20;
            }
        }
        $_SESSION['form_data']['cost'] = $cost;
        header("Location: subscribed.php");
    }
    else {
        $_SESSION['errors'] = $errors;
        header("Location: subscribe2.php");
    }
}
