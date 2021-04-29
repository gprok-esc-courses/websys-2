<?php require_once 'header.partial.php'; ?>
<?php
session_start();
require_once 'database.php';
if(!isset($_SESSION['instagram_username'])) {
    $errors = array();
    $errors['message'] = 'This page requires login';
    $_SESSION['instagram_errors'] = $errors;
    header("Location: login.php");
}
$error = '';
if(isset($_SESSION['instagram_errors'])) {
    $error = $_SESSION['instagram_errors']['message'];
    unset($_SESSION['instagram_errors']);
}

$users_id = $_SESSION['instagram_user_id'];
$images_result = $pdo->query("SELECT id, filename, legend 
                                        FROM images
                                        WHERE users_id=" . $_SESSION['instagram_user_id']);
?>

<h1><?=$_SESSION['instagram_username'];?></h1>

<div class="row">
    <div class="col-sm-12">
        <h2>Upload Image</h2>
        <h4><?=$error;?></h4>
        <form method="post" action="upload.php" enctype="multipart/form-data">
            <input type="file" name="image"> <br>
            <input type="text" name="legend" placeholder="legend"><br>
            <input type="submit" value="Upload">

        </form>

    </div>

    <div class="col-sm-12">

        <?php while($row = $images_result->fetch()) { ?>
            <div class="card mt-2">
                <img src="images/<?=$users_id;?>/<?=$row['filename'];?>" width="400" class="card-img-top" alt="...">
                <div class="card-body">
                    <form method="post" action="update_legend.php">
                    <p class="card-text">
                        <input type="text" name="image_id" value="<?=$row['id'];?>" hidden>
                        <input type="text" name="legend" value="<?=$row['legend'];?>">
                        <input type="submit" value="Update">
                    </p>
                    <a href="#" class="btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        <?php } ?>

    </div>
</div>


<?php require_once 'footer.partial.php'; ?>

