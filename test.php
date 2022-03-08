<?php 
	if (isset($_GET['exit'])){
        setcookie('log',  '$value', time()-86400);
        
        setcookie('par',  '$value', time()-86400 );	
        header("Location:index.php");
    }
        
 session_start();
 echo $_COOKIE["id"];
 $kyky=$_SESSION["id_user"];
echo $kyky;

echo $_COOKIE["log"];


if (isset($_GET['b1']))
{
    $pos = explode("_",$_GET['sel1']);
    $id_rol=$pos[0];    
    $title=$_GET['title'];
$text=$_GET['text'];

$img=$_GET['img'];
$conn = mysqli_connect("localhost", "root","", "rabotkacher") or die (" Ошибка при подключении ". mysqli_error($conn));
$sql = "INSERT INTO `post`( `nameuser`,`title`, `img`, `text` , `id_category` ) VALUES ('$logPr','$title','$img','$text',$id_rol)";
$res = mysqli_query($conn, $sql) or die (" Ошибка 1 ". mysqli_error($conn));
header("Location:lich.php");
}
?>