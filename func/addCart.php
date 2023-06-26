<?php
session_start();
require_once("db.php");

$prodId = $_POST['prodId'];
$query = "SELECT  photo, name, price, firm, massa, flytime  FROM product WHERE `id` = '$prodId'";
$res = mysqli_query($connect, $query);
$product=mysqli_fetch_assoc($res);

$photo=$product['photo'];
$name=$product['name'];
$price=$product['price'];
$firm=$product['firm'];
$massa=$product['massa'];
$flytime= $product['flytime'];

$sql=mysqli_query($connect,"INSERT INTO `cart` ( `photo`, `name`, `price`, `firm`, `massa`,  `flytime`) VALUES ('$photo', '$name', '$price',  '$firm', '$massa', '$flytime')");

header('Location: ../cart.php');