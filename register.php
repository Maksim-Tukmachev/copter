<?php
    session_start();
    error_reporting(0);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <link rel="stylesheet" rev="stylesheet" type="text/css" href="style/user.css" />
</head>
<body>


<form action="func/signup.php" method="post">
        <label>Фамилия</label>
        <input type="text" name="surname" placeholder="Введите свою фамилию">
        <label>Имя</label>
        <input type="text" name="name" placeholder="Введите свое имя">
        <label>Отчество</label>
        <input type="text" name="patronymic" placeholder="Введите свое Отчество">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Email</label>
        <input type="text" name="email" placeholder="Введите свой email">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit">Зарегистрироваться</button>
        <p>
        <p>
            Уже есть аккаунт? - <a href="login.php">Войти</a>!
        </p>
        <p>
            <a href="index.php">На главную</a>!
        </p>
    </form>
</body>
</html>