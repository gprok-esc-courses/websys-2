<html>
    <body>
    <h1>Another Page</h1>
    <p>User
    <?php
    if(!isset($_COOKIE['visitor'])) {
        echo "Alien";
    }
    else {
        echo $_COOKIE['visitor'];
    }
    ?>
    </p>
    </body>
</html>
