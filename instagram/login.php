<?php require_once 'header.partial.php'; ?>
<?php
    session_start();
    $username = '';
    if(isset($_SESSION['instagram_errors'])) {
        $errors = $_SESSION['instagram_errors'];
        $username = $errors['username'];
        unset($_SESSION['instagram_errors']);
    }
?>

<div class="row">
    <?php
    if(isset($errors)) {
        echo "<div>" . $errors['message'] . "</div>";
    }
    ?>
    <div class="col-sm-12">
        <form method="post" action="authenticate.php">
            <input type="text" name="username" placeholder="Username" value="<?=$username;?>">
            <input type="password" name="password", placeholder="Password">
            <input type="submit" value="Login">
        </form>

    </div>
</div>

<?php require_once 'footer.partial.php'; ?>
