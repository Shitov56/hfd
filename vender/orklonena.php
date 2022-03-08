<?php

$conn = mysqli_connect("localhost", "root","", "rabotkacher") or die (" Ошибка при подключении ". mysqli_error($conn)); 
$id = $_GET['id'];
mysqli_query($conn, "UPDATE `post` SET `id_teck` = '3' WHERE `post`.`id` = '$id'");
header("Location:../admin.php");

