<?php require_once 'header.partial.php'; ?>
<?php
$pdo = new PDO("mysql:host=localhost;dbname=php_instagram", "root", "root");
$users_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
$user_result = $pdo->query("SELECT username FROM users WHERE id=$users_id");
$user = $user_result->fetch();
$images_result = $pdo->query("SELECT id, filename, legend 
                                    FROM images
                                    WHERE users_id=$users_id");
?>

<h1><?=$user['username'];?></h1>

<div class="row">
    <div class="col-sm-8">

        <?php while($row = $images_result->fetch()) { ?>
            <div class="card mt-2">
                <img src="images/<?=$users_id;?>/<?=$row['filename'];?>" width="400" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><?=$row['legend'];?></p>
                    <a href="#" class="btn btn-primary">Like</a>
                </div>
            </div>
        <?php } ?>

    </div>
    <div class="col-sm-4">
        user's profile
    </div>
</div>



<?php require_once 'footer.partial.php'; ?>
