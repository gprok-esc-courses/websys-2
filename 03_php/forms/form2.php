<?php
$username = "";
$password = "";
if(isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if($username == 'john' && $password == '1111') {
        echo "OK";
        die();
    }
    else {
        echo "Error, username or password wrong<br>";
    }
}

?>

<form action="form2.php" method="post">
    <input type="text" name="username" placeholder="Username" value="<?=$username;?>">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="submit">
</form>
