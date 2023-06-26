<?php
session_start(); 
 
error_reporting(0);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <link rel="stylesheet" rev="stylesheet" type="text/css" href="" />
</head>
<body>

<form method="post">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите свой логин">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <button type="submit">Войти</button>
    
</form>

</body>
</html>

<?php
require_once('func/db.php');

$login = $_POST['login'];
$password = $_POST['password'];

$check_admin = mysqli_query($connect, "SELECT * FROM `admin` WHERE `login` = '$login' AND `password` = '$password'");
if (mysqli_num_rows($check_admin) > 0) {

    $admin = mysqli_fetch_assoc($check_admin);

    $_SESSION['admin'] = [
        "login" => $admin['login'],
        "password" => $admin['password']
    ];

    header('Location: admin.php');
    

} else {
    die('Не верный логин или пароль');
}
?>

<pre>
    <?php
    print_r($check_admin);
    print_r($admin);
    ?>
</pre>
