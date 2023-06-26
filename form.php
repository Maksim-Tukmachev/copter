<?php
require_once("func/db.php");
if(isset($_POST['add_product'])) {
    $flytime = $_POST['flytime'];
    $massa = $_POST['massa'];
    $firm = $_POST['firm'];
    $price = $_POST['price'];
    $name = $_POST['name'];
    $path = 'image/' . time() . $_FILES['photo']['name'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    $file_name = time() . $_FILES['photo']['name'];
    $file_destination = 'image/' . $file_name;
    move_uploaded_file($file_tmp, $file_destination);
    if (empty($name) || empty($price) || empty($firm) || empty($massa) ) {
        echo "Заполните все поля";
    } else {
        $query = "INSERT INTO product (name, price, firm, massa, flytime, photo) VALUES ('$name', '$price', '$firm', '$massa', '$flytime', '$file_destination')";

        if ($connect->query($query) === TRUE ) {
            echo "Товар добавлен";
        }
        
    }
}
header('Location: admin.php');