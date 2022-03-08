<form>
<meta charset="utf-8" />
<p>Вы уверены что хотите удалить запись?</p>

<button name = "da">Да</button>
<button name = "net">нет</button>
</form>
<?php
$id = $_GET['id'];

setcookie("idizz", $id, time () + 9999);

if(isset($_COOKIE["idizz"])){
    $iditog = $_COOKIE["idizz"];
    echo $_COOKIE["idizz"];
    if (isset($_GET['da'])){
    
        $conn = mysqli_connect("localhost", "root","", "rabotkacher") or die (" Ошибка при подключении ". mysqli_error($conn)); 
        
        mysqli_query($conn, "DELETE FROM `post` WHERE `id` = '$iditog'");
        unset($_COOKIE['idizz']);
        header("Location:lich.php");
        }
        if (isset($_GET['net'])){
            unset($_COOKIE['idizz']);
            header("Location:lich.php");
            }
}

    ?>