<html>
    <body>
    <?php
        if(!isset($_COOKIE['visitor'])) {
            echo "<form method='post' action='remember.php'>" .
                 "<input type='text' name='visitor' placeholder='Type your name'>" .
                 "<input type='submit' value='Remember me'>";
        }
        else {
            echo "Welcome back " . $_COOKIE['visitor'] .
                 "<form method='post' action='forget.php'>" .
                 "<input type='submit' value='Forget me'>";
        }
    ?>
    </body>
</html>
