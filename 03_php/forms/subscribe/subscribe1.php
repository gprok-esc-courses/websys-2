<h1>Subscribe to our Journal</h1>
<?php
// Version 1: form action is SAME page

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

$formOK = true;
$fullname = "";
$email = "";
$education = "Select";
$type = "Monthly";
$selectedExtras = [];
if(isset($_POST['subscribe'])) {
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $education = $_POST['education'];
    $type = $_POST['type'];
    if(isset($_POST['extra'])) {
        $selectedExtras = $_POST['extra'];
    }

    if(empty($fullname)) {
        echo "Fullname is mandatory<br>";
        $formOK = false;
    }
    if(empty($email)) {
        echo "Email is mandatory<br>";
        $formOK = false;
    }
    if($formOK) {
        echo "<h2>Subcription Data</h2>";
        echo "Fullname: $fullname, Email: $email<br>";
        echo "Education: " . ($education == 'Select' ? 'None selected' : $education) . "<br>";
        echo "Subscription Type: $type<br>";
        if(!empty($_POST['extra'])) {
            foreach ($_POST['extra'] as $extra) {
                echo $extra . '<br>';
            }
        }
        // Calculate total cost and display
        die();
    }
    else {
        echo "<h2>$10/month</h2>";
    }
}
?>

<form method="post" action="subscribe1.php">
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
