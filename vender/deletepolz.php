<?php

$conn = mysqli_connect("localhost", "root","", "rabotkacher") or die (" Ошибка при подключении ". mysqli_error($conn)); 
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM `post` WHERE `post`.`id` = '$id'");
