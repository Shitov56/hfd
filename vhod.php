<html lang="en">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Navi</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="header__inner">
                <div class="logo__inners">
                <img class = "img__logo" src="images/logo.png" alt="">
            <div class="header__logo">Navi</div>
                </div>
            

            <nav class = "nav">
            <button class="nav__link" style="index.php"><a class="nav__link" href= "index.php">Главная страница</a></button>
            
            </nav>
            </div>
        </div>
    </div>
   <div class="intro">
       <div class="container">
           <div class="post">
          
<div class="post__name">Войдите</div>   
<form> 
<p>Введите Логин</p>
<input type = "text" name ="a" required>
<p>Введите Пароль</p>
<p>	
  <input type = "text" name ="b" required>
</p>
<p>&nbsp; </p>


<button name = "b1">Вход</button>
<p><br>

  <br>
  <a href="reg.php"> Регистрация</a><br>
</p>
<p>&nbsp;</p>
</form>


           </div> 

       </div>
      
   </div>
   <footer>

   </footer>
   <?php 
$conn = mysqli_connect("localhost", "root","", "rabotkacher") or die ("Ошибка в подключении". mysqli_error($conn));
if (isset($_GET['b3'])){
	if (isset($_COOKIE["log"])){
		$k = $_COOKIE["log"];
		$p=$_COOKIE["par"];
		
		$resul = mysqli_query($conn, "SELECT * FROM `users` WHERE name='$k' AND password ='$p'");
		if ($resul)
	{
	
	
	
	$sum_row_users = mysqli_num_rows($resul);
	if ($sum_row_users==1)
	{
	$aaa = mysqli_fetch_assoc($resul);
	
	if($aaa['id_rol']==1)
	{
	echo 'вы вошли как Студент';
	session_start();
	$_SESSION["id_user"]=$aaa['id_user'];
	echo $_SESSION["id_user"];
	header("Location:lich.php");
	
	}
	if($aaa['id_rol']==2)
	{
	echo 'вы вошли как Преподователь';
	session_start();
	$_SESSION["id_user"]=$aaa['id_user'];
	echo $_SESSION["id_user"];
	header("Location:lich2.php");
	}
	
		if($aaa['id_rol']==3)
	{
	echo 'вы вошли как admin';
	session_start();
	$_SESSION["id_rol"]=$aaa['id_rol'];
	echo $_SESSION["id_rol"];
	header("Location:lich2.php");
	}
	else{
	echo 'логин или пароль не верен';
	
	}
	
	}
	}
	
	}
}


if(!isset($_COOKIE["log"])){
	if (isset($_GET['b1']))
{
	
	$b=$_GET['b'];
	$a=$_GET['a'];
	
	$resul = mysqli_query($conn, "SELECT * FROM `users` WHERE name='$a' AND password ='$b'");
if ($resul)
{



$sum_row_users = mysqli_num_rows($resul);
if ($sum_row_users==1)
{
	
$aaa = mysqli_fetch_assoc($resul);

if($aaa['id_rol']==1)
{
    setcookie("id", $aaa['id_rol'], time () + 9999);
	setcookie("log", $a, time () + 9999);
setcookie("par", $b, time () + 9999);
echo 'вы вошли как Студент';
session_start();
$_SESSION["id_user"]=$aaa['id_user'];
echo $_SESSION["id_user"];
header("Location:lich.php");

}
if($aaa['id_rol']==2)
{
    setcookie("id", $aaa['id_rol'], time () + 9999);
	setcookie("log", $a, time () + 9999);
setcookie("par", $b, time () + 9999);
echo 'вы вошли как Преподователь';
session_start();
$_SESSION["id_user"]=$aaa['id_user'];
echo $_SESSION["id_user"];
header("Location:admin.php");
}

	if($aaa['id_rol']==3)
{
    setcookie("id", $aaa['id_rol'], time () + 9999);
	setcookie("log", $a, time () + 9999);
setcookie("par", $b, time () + 9999);
echo 'вы вошли как Преподователь';
session_start();
$_SESSION["id_rol"]=$aaa['id_rol'];
echo $_SESSION["id_rol"];
header("Location:admin.php");
}
else{
echo 'логин или пароль не верен';

}

}
}
}
}



?>
</body>
</html>