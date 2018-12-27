<?php

session_start();

$username = "admin";
$password = "root";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>File Panel</title>
</head>
<body>
    <form method="post">
        <h1 class="title">
            Hoost
        </h1>
        <?php
        
        function location($url) {
            echo "<script> location.replace('" . $url . "')</script>";
        }

        $post_username = $_POST['username'];
        $post_password = $_POST['password'];

        if (isset($post_password) && isset($post_username)) {
            if ($post_password !== $password) {
                echo "Wrong password or username.";
            } else if ($post_username !== $username) {
                echo "Wrong password or username.";
            }
            else {
                $_SESSION['state'] = true;
                location('admin/');
            }
        }
        else {

        }
        
        ?>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>