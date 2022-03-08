<form>
<meta charset="utf-8" />
<input class="file" type = "file" name ="img" id="file">

<p>Вы выбрали запись?</p>

<button name = "da">Да</button>

</form>
<?php

$id = $_GET['id'];

setcookie("idizz", $id, time () + 9999);
if(isset($_COOKIE["idizz"])){
    $iditog = $_COOKIE["idizz"];
    echo $_COOKIE["idizz"];
   
        
}
if (isset($_GET['da'])){
    $img=$_GET['img'];
    $conn = mysqli_connect("localhost", "root","", "rabotkacher") or die (" Ошибка при подключении ". mysqli_error($conn)); 
    
    mysqli_query($conn, "UPDATE `post` SET `id_teck` = '2', `img` = '$img' WHERE `post`.`id` = '$iditog'");
    unset($_COOKIE['idizz']);
    header("Location:../admin.php");
    }


