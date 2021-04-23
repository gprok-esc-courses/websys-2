<?php require_once 'header.partial.php'; ?>
<?php
    $pdo = new PDO("mysql:host=localhost;dbname=php_instagram", "root", "root");
    $result = $pdo->query("SELECT * from images");
?>

<div class="row">
    <div class="col-sm-8">

        <?php while($row = $result->fetch()) { ?>
        <div class="card mt-2">
            <div class="card-header">
                Featured
            </div>
            <img src="images/<?=$row['users_id'];?>/<?=$row['filename'];?>" width="400" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text"><?=$row['legend'];?></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <?php } ?>

    </div>
    <div class="col-sm-4">
        user's profile
    </div>
</div>

<?php require_once 'footer.partial.php'; ?>
