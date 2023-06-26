<?php

require_once("db.php"); 

if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT id FROM product ORDER BY id DESC LIMIT 5";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  $id1 = "";
  $id2 = "";
  $id3 = "";
  $id4 = "";
  $id5 = "";

  while($row = $result->fetch_assoc()) {
    if ($id1 == "") {
      $id1 = $row["id"];
    } elseif ($id2 == "") {
      $id2 = $row["id"];
    } elseif ($id3 == "") {
      $id3 = $row["id"];
    } elseif ($id4 == "") {
      $id4 = $row["id"];
    } else {
      $id5 = $row["id"];
    }
  }
}

