<?php

    session_start();
    include 'db.php';

    
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $patronymic = $_POST['patronymic'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password == $password_confirm) {

        $password = md5($password);
        mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
        mysqli_query($connect, "INSERT INTO `user` ( `surname`, `name`, `patronymic`, `login`, `email`,  `password`) VALUES ('$surname', '$name', '$patronymic',  '$login', '$email', '$password')");

        die('Регистрация прошла успешно!');


    } else {
        die('Пароли не совпадают');
        
    }

?>
