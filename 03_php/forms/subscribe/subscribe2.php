<?php session_start(); ?>
<h1>Subscribe to our Journal</h1>
<?php
// Version 2: form action is DIFFERENT page

$eduOptions = ["Select", "High School", "BSc", "MSc", "PhD"];
$types = [
    'Monthly' => 'Monthly',
    'Six Months' => 'Six Months (5% discount)',
    'Yearly' => 'Yearly (10% discount)',
];
$extras = [
    'Printed version' => 'Printed Version (+ $15/month)',
    'Year Review' => 'Year Review (+ $20, free for Yearly plan)',
    'Poster' => 'Poster (free)',
    'Stickers' => 'Stickers (free)',
];

$fullname = "";
$email = "";
$education = "Select";
$type = "Monthly";
$selectedExtras = [];
$errors = [];
if(isset($_SESSION['form_data'])) {
    $fullname = $_SESSION['form_data']['fullname'];
    $email = $_SESSION['form_data']['email'];
    $education = $_SESSION['form_data']['education'];
    $type = $_SESSION['form_data']['type'];
    $selectedExtras = $_SESSION['form_data']['selectedExtras'];
    $errors = $_SESSION['errors'];

    unset($_SESSION['errors']);
    unset($_SESSION['form_data']);
}

foreach ($errors as $error) {
    echo $error . '<br>';
}
?>

<form method="post" action="subscribe_do.php">
    <input type="text" name="fullname" placeholder="Fullname" value="<?=$fullname;?>"> * <br>
    <input type="email" name="email" placeholder="Email" value="<?=$email;?>"> * <br>
    Education: <select name="education">
        <?php
            foreach ($eduOptions as $option) {
                $default = $education == $option ? "selected='selected'" : "";
                echo "<option value='$option' $default>$option</option>";
            }
        ?>
    </select><br>
    Subscription Type:
    <?php
        foreach ($types as $key => $value) {
            $checked = $type == $key ? 'checked' : '';
            echo "<input type='radio' name='type' value='$key' $checked> $value";
        }
    ?>
    <br>
    Extra:<br>
    <?php
    foreach ($extras as $key => $value) {
        $checked = in_array($key, $selectedExtras) ? 'checked' : '';
        echo "<input type='checkbox' value='$key' name='extra[]' $checked> $value<br>" ;
    }
    ?>
    <input type="submit" value="Subscribe" name="subscribe">
</form>
