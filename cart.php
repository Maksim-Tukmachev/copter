<?php
session_start();
require_once("func/db.php");


function selectAll()
{
    $link = mysqli_connect('localhost', 'root', '', 'copter');

    $posts = array();
    $query = "SELECT id, photo, name, price, firm, massa, flytime  FROM cart ORDER BY id DESC";
    $res = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($res)) {
        $posts[] = $row;
    }
    return $posts;
}

function clearDataClient($var)
{
    $var = htmlspecialchars($var);

    return $var;
}

$posts = selectAll();
foreach($posts as $post){
    ?>
    <div class = "_container">
        <div class = "msg_header">
            <b><img src="<?php echo clearDataClient($post['photo'])?>" height="400 px"></b> <?php echo clearDataClient($post['name']) ?>
        </div>

        <div class = "msg_body">
            <?php echo clearDataClient($post['firm']);
            echo "<br/>";
            echo clearDataClient($post['massa']);
            echo "<br/>";
            echo clearDataClient($post['flytime'])?>
        </div>
        <form action="" method="post">
            <div class="msg_footer">
                <?php echo $post['price'] ?>
                <button name="action" value="delete">Удалить из корзины</button>
                <input type="hidden" name="prodId" value="<?php echo $post['id'] ?>">
            </div>
        </form>
    </div>


    <?php

}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $prodId1 = $_POST['prodId'];
    mysqli_query($connect, "DELETE FROM cart WHERE id = '$prodId1'");
}
?>