<?php

    session_start();
    include 'db.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "first_name" => $user['first_name'],
            "last_name" => $user['last_name'],
            "login" => $user['login']
        ];

        header('Location: ../index.php');

    } else {
        die('Не верный логин или пароль');
    }
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
