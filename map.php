<?php
error_reporting(0);
session_start();



?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>CopterTime</title>
<link rel="stylesheet" rev="stylesheet" type="text/css" href="style/map.css" />
</head>
<body>


<p>CopterTime</p>

<?php if( isset($_SESSION['user']) && !empty($_SESSION['user']) )
{
?>
      <h2 style="margin: 10px 0;"><?= $_SESSION['user']['login'] ?>
      <a href="func/logout.php">  Выход</a><br></h2>
<?php }else{ ?>
     <a href="login.php">Вход</a>/
     <a href="register.php">Регистрация</a>
<?php } ?>
<p></p>

<a href="index.php" class="btn">О нас</a>
<a href="katalog.php" class="btn">Каталог</a>
<a href="map.php" class="btn">Где нас найти?</a>

<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A846cf5866b6a4105577867f3c3aacea49fbd007c7ba15ed21772a6549d1c98e1&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>

<h3>Контактные данные</h3><p></p>
Адрес: Мажоров пер., 14, стр. 7, Москва<p></p>
Тел: 8-950-734-22-11<p></p>
Email: coptertime@copter.ru<p></p>

</body>
</html>
<style>
html{
  text-align: center;
}      
body {
    background-color: white;
    color: black;
    font-family: Arial, sans-serif;
  }
  
  p {
    font-size: 24px;
    margin: 10px 0;
  }
  
  a {
    color: black;
    text-decoration: none;
    margin-right: 10px;
  }
  
  .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: black;
    color: white;
    border-radius: 5px;
    margin-right: 10px;
  }
</style>