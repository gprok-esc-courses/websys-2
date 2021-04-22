<html>
<body>
    <h1>Gallery</h1>
    <div>
        <?php
        $images = glob("images/*.*");
        foreach ($images as $image) {
            echo "<img src='$image' width='200'>";
        }
        ?>
    </div>

</body>
</html>

