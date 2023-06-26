<?php
error_reporting(0);
session_start();
require_once("func/db.php");
require_once("func/selectimage.php");
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html"charset="utf-8"/>
<title>CopterTime</title>
<link rel="stylesheet" rev="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>

<img src="image/unnamed.jpg" height="200 px">
<h1>Лети выше, лети дальше с CopterTime!</h1>

<?php if( isset($_SESSION['user']) && !empty($_SESSION['user']) )
{
?>
      <h2 style="margin: 10px 0;"><?= $_SESSION['user']['login'] ?>
      <a href="func/logout.php" id="1">  Выход</a><br></h2>
<?php }else{ ?>
     <a href="login.php" id="1">Вход</a>/
     <a href="register.php" id="1">Регистрация</a>
<?php } ?>
<p>
</p>
<br>


<a href="index.php" class="btn">О нас</a>
<a href="katalog.php" class="btn">Каталог</a>
<a href="map.php" class="btn">Где нас найти?</a>

<p></p>
<p></p>
<br>
<h2>Что нового?</h2>
<p></p>
<form>
<div class="slider middle">
    <div class="slides">
        <input type="radio" name="r" id="r1" checked>
        <input type="radio" name="r" id="r2">
        <input type="radio" name="r" id="r3">
        <input type="radio" name="r" id="r4">
        <input type="radio" name="r" id="r5">

        <div class="slide s1"><img src="<?php
        $sql = mysqli_query($connect, "SELECT `photo` FROM `product` WHERE `id` = '$id1'");
        $result = mysqli_fetch_array($sql);
        echo "{$result['photo']}";?>"></div>
        <div class="slide"><img src="<?php
        $sql = mysqli_query($connect, "SELECT `photo` FROM `product` WHERE `id` = '$id2'");
        $result = mysqli_fetch_array($sql);
        echo "{$result['photo']}";?>"></div>
        <div class="slide"><img src="<?php
        $sql = mysqli_query($connect, "SELECT `photo` FROM `product` WHERE `id` = '$id3'");
        $result = mysqli_fetch_array($sql);
        echo "{$result['photo']}";?>"></div>
        <div class="slide"><img src="<?php
        $sql = mysqli_query($connect, "SELECT `photo` FROM `product` WHERE `id` = '$id4'");
        $result = mysqli_fetch_array($sql);
        echo "{$result['photo']}";?>"></div>
        <div class="slide"><img src="<?php
        $sql = mysqli_query($connect, "SELECT `photo` FROM `product` WHERE `id` = '$id5'");
        $result = mysqli_fetch_array($sql);
        echo "{$result['photo']}";?>"></div>
    </div>

    <div class="navigation">
        <label for="r1" class="bar"></label>
        <label for="r2" class="bar"></label>
        <label for="r3" class="bar"></label>
        <label for="r4" class="bar"></label>
        <label for="r5" class="bar"></label>
    </div>
</div>
</form>




</body>
</html>
