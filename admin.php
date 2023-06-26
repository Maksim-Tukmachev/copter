<?php
session_start(); 
require_once("func/db.php"); 
//error_reporting(0);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Администраторская панель</title>
</head>

<style>
    body {
        background-color: #FFFFFF;
        color: #000000;
        font-family: Arial, sans-serif;
    }
    table {
        color: #000000;
        border-collapse: collapse;
        width: 100%;
    }
    th {
        border: 1px solid #000000;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #000000;
        color: #FFFFFF;
    }
    input[type="text"], input[type="file"], input[type="submit"] {
        color: #000000;
        background-color: #FFFFFF;
        border: 1px solid #000000;
        padding: 5px;
        margin-right: 10px;
        border-radius: 5px;
        font-size: 16px;
    }
    input[type="submit"] {
        background-color: #000000;
        color: #FFFFFF;
        cursor: pointer;
        border: none;
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }
    input[type="submit"]:hover {
        background-color: #FFFFFF;
        color: #000000;
    }
</style>

<?php if( isset($_SESSION['admin']) && !empty($_SESSION['admin']) )
{
?>
<a href="logoutadmin.php">  Выход</a><br></h2>
<?php
if(isset($_POST['delete_product'])){
$product_id = $_POST['product_id'];
$query = "DELETE FROM product WHERE id='$product_id'";
$result = mysqli_query($connect, $query);
if(!$result){
echo "Ошибка при удалении товара";
}
}


if(isset($_POST['edit_product'])){
$product_id = $_POST['product_id'];
$flytime = $_POST['flytime'];
$massa = $_POST['massa'];
$firm = $_POST['firm'];
$price = $_POST['price'];
$name = $_POST['name'];
$photo = $_POST['photo'];

$query = "UPDATE product SET name='$name', price='$price', firm='$firm', massa='$massa', flytime='$flytime' WHERE id='$product_id'";
$result = mysqli_query($connect, $query);
if(!$result){
echo "Ошибка при редактировании товара";
}
}
?>

<tr>
        <td colspan="12">
            <h3>Добавить товар</h3>
            <form action="form.php" method="post" enctype="multipart/form-data">
                <input type="file" name="photo">
                <input type="text" name="name" placeholder="Название">
                <input type="text" name="price" placeholder="Цена">
                <input type="text" name="firm" placeholder="фирма">
                <input type="text" name="massa" placeholder="масса">
                <input type="text" name="flytime" placeholder="Время полета">
                <input type="submit" name="add_product" value="Добавить">
            </form>
        </td>
    </tr>

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
?>

<?php
    $posts = selectAll();
    foreach($posts as $post){
?>
<div class = "_container">
        <div class = "msg_header">
            <b><img src="<?php echo clearDataClient($post['photo'])?>" height="300 px"></b> <?php echo clearDataClient($post['name']) ?>
        </div>

        <div class = "msg_body">
            <?php echo clearDataClient($post['firm']);
            echo clearDataClient($post['massa']);
            echo clearDataClient($post['flytime'])?>
        </div>

        <div class = "msg_footer">
            <?php echo $post['price']?><strong><a href="?id=<?php 
            echo $post['id']?>"></a></strong>
            <?php $id=$post['id'];?>
        </div>
    </div>
    <table>
    <?php
    $query = "SELECT * FROM product where id=$id";
    $result = mysqli_query($connect, $query);
    if(!$result){
        echo "Ошибка при выборке товаров";
    }
    while($row = mysqli_fetch_assoc($result)){ ?>
        <h2>Редактирование товара</h2>
        
            <?php $row['id']; ?>
            <img src="<?php $row['photo']; ?>" width="100">
            <?php $row['name']; ?>
            <?php $row['price']; ?>
            <?php $row['firm']; ?>
            <?php $row['massa']; ?>
            <?php $row['flytime']; ?>
            <tr>   
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" name="delete_product" value="Удалить">
                </form>
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="name" placeholder="Название" value="<?php echo $row['name']; ?>">
                    <input type="text" name="price" placeholder="Цена" value="<?php echo $row['price']; ?>">
                    <input type="text" name="firm" placeholder="фирма" value="<?php echo $row['firm']; ?>">
                    <input type="text" name="massa" placeholder="Масса" value="<?php echo $row['massa']; ?>">
                    <input type="text" name="flytime" placeholder="Время полета" value="<?php echo $row['flytime']; ?>">
                    <input type="submit" name="edit_product" value="Редактировать">
                </form>
            
        </tr>
    <?php } ?>
    
</table>



<?php
}   
?>
<?php }else{ ?>
     Информация не для тебя 
     <a href="index.php" class="btn">На главную</a>
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
<?php } ?>

