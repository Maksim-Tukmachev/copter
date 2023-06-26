<?php
error_reporting(0);
session_start();
include 'func/db.php';


?>  

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>CopterTime</title>
<link rel="stylesheet" rev="stylesheet" type="text/css" href="style/katalog.css" />
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


<?php
function selectAll(){
    $link = mysqli_connect('localhost', 'root', '', 'copter');

    $posts = array();
    $query = "SELECT id, photo, name, price, firm, massa, flytime  FROM product ORDER BY id DESC";
    $res = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($res)){
        $posts[] = $row;
    }
    return $posts;
}

function clearDataClient($var){
      $var=htmlspecialchars($var);
  
      return $var;
  }


function selectByPrice($order){
    $link = mysqli_connect('localhost', 'root', '', 'copter');

    $posts = array();
    $query = "SELECT id, photo, name, price, firm, massa, flytime FROM product ORDER BY price $order";
    $res = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($res)){
        $posts[] = $row;
    }
    return $posts;
}

function selectByFlytime($order){
    $link = mysqli_connect('localhost', 'root', '', 'copter');

    $posts = array();
    $query = "SELECT id, photo, name, price, firm, massa, flytime FROM product ORDER BY flytime $order";
    $res = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($res)){
        $posts[] = $row;
    }
    return $posts;
}

function selectByDate($order){
    $link = mysqli_connect('localhost', 'root', '', 'copter');

    $posts = array();
    $query = "SELECT id, photo, name, price, firm, massa, flytime FROM product ORDER BY id $order";
    $res = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($res)){
        $posts[] = $row;
    }
    return $posts;
}
?>

<form method="POST" action="">
  <label>Фильтр по цене:</label>
  <select name="order_price">
    <option value="ASC">По возрастанию</option>
    <option value="DESC">По убыванию</option>
  </select>
  <button type="submit" name="submit_price">Применить</button>
</form>

<form method="POST" action="">
  <label>Фильтр по времени полета:</label>
  <select name="order_flytime">
    <option value="ASC">По возрастанию</option>
    <option value="DESC">По убыванию</option>
  </select>
  <button type="submit" name="submit_flytime">Применить</button>
</form>

<form method="POST" action="">
  <label>Фильтр по новизне:</label>
  <select name="order_date">
    <option value="ASC">По возрастанию</option>
    <option value="DESC">По убыванию</option>
  </select>
  <button type="submit" name="submit_date">Применить</button>
</form>
<form method="POST" action="">



<?php
    
        
  if(isset($_POST['submit_price']) && isset($_POST['order_price'])){
      $order_price = $_POST['order_price'];
      $posts = selectByPrice($order_price);
  } else if(isset($_POST['submit_flytime']) && isset($_POST['order_flytime'])){
      $order_flytime = $_POST['order_flytime'];
      $posts = selectByFlytime($order_flytime);
  } else if(isset($_POST['submit_date']) && isset($_POST['order_date'])){
        $order_date = $_POST['order_date'];
        $posts = selectByFlytime($order_date);
  } else {
      $posts = selectAll();
  }

  foreach($posts as $post){

?>
<div class = "_container">
        <div class = "msg_header">
            <b><img src="<?php echo clearDataClient($post['photo'])?>" height="400 px" text-align: center;></b> <?php echo clearDataClient($post['name']) ?>
        </div>

        <div class = "msg_body">
            <?php echo clearDataClient($post['firm']);
            echo "<br/>";
            echo clearDataClient($post['massa']);
            echo "<br/>";
            echo clearDataClient($post['flytime'])?>
        </div>

        <form action="func/addCart.php" method="post">
            <div class = "msg_footer">
            <?php echo $post['price']?><strong>
            <?php if( isset($_SESSION['user']) && !empty($_SESSION['user']) ) {?>
            <a href="?id=<?php echo $post['id']?>"></a></strong>
            <button  name="prodId" value="<?php echo $post['id'];?>">Добавить в корзину</button><?php } ?>
            </div>
        </form>
        
            
        

</div>



<?php
}
?>

</body>
</html>

