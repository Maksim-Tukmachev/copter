<?php

    $connect = mysqli_connect('localhost', 'root', '', 'copter');

    if (!$connect) {
        die('Error connect to DataBase');
    }
?>