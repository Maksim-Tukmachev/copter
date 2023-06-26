<?php
session_start();
error_reporting(0);
if ($_SESSION['user']) {
    header('Location: index.php');
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <link rel="stylesheet" rev="stylesheet" type="text/css" href="style/user.css" />
</head>
<body>

<form action="func/signin.php" method="post">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit">Войти</button>
        <p>
            Еще нет аккаунта? - <a href="register.php">Регистрация</a>!
        </p>
        <p>
            <a href="index.php">На главную</a>!
        </p>
    </form>

</body>
</html>