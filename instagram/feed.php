<?php require_once 'header.partial.php'; ?>
<?php
    $pdo = new PDO("mysql:host=localhost;dbname=php_instagram", "root", "root");
    $result = $pdo->query("SELECT im.id, im.filename, im.legend, im.users_id, us.username 
                                    FROM images im, users us
                                    WHERE im.users_id=us.id");
?>

<div class="row">
    <div class="col-sm-8">

        <?php while($row = $result->fetch()) { ?>
        <div class="card mt-2">
            <div class="card-header">
                <a href="profile.php?id=<?=$row['users_id'];?>"><?=$row['username'];?></a>
            </div>
            <img src="images/<?=$row['users_id'];?>/<?=$row['filename'];?>" width="400" class="card-img-top" alt="...">
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
