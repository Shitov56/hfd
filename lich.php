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
           <form class="post">
           <p>Название</p>	
          

          <br>	   
<input type = "text" name ="title">
          <p class="">Введите Текст </p>
          <br>
<textarea name="text" class="sss" id="" cols="100" rows="12"></textarea>
<br>

<br>
<br>
<input class="file" type = "file" name ="img" id="file">
<br>
<p>Введите роль</p>
    <br>
   
    <select name ="sel1">
  <?php
   if(isset($_COOKIE["log"])){
    $logPr = $_COOKIE["log"];
    echo $logPr;
  $conn = mysqli_connect("localhost", "root", "","rabotkacher") or die ("Ошибка". mysqli_error($conn));
  $result1 = mysqli_query($conn, "SELECT * FROM `categors`");
  while ($row = mysqli_fetch_array($result1))
  {
      echo '<option value="', $row['id_cat'], '">', $row['category'],'</option>';
      
  }
              
  ?>
  </select>
  <br>      
<br>
<button name = "b1">Добавить</button>
<button name = "exit">выйти</button>
<?php 
if (isset($_GET['exit'])){
  setcookie('log',  '$value', time()-86400);
  
  setcookie('par',  '$value', time()-86400 );	
  header("Location:index.php");
}
  
// session_start();
// echo $_COOKIE["id"];
// $kyky=$_SESSION["id_user"];
// echo $kyky;

// echo $_COOKIE["log"];


if (isset($_GET['b1']))
{
$pos = explode("_",$_GET['sel1']);
$id_rol=$pos[0];    
$id_teck = 1;
$title=$_GET['title'];
$text=$_GET['text'];

$img=$_GET['img'];
$conn = mysqli_connect("localhost", "root","", "rabotkacher") or die (" Ошибка при подключении ". mysqli_error($conn));
$sql = "INSERT INTO `post`(`id_teck`, `nameuser`,`title`, `img`, `text` , `id_category` ) VALUES ('$id_teck','$logPr','$title','$img','$text',$id_rol)";
$res = mysqli_query($conn, $sql) or die (" Ошибка 1 ". mysqli_error($conn));
header("Location:lich.php");
}
?>
           <?php 
           
  $conn = mysqli_connect("localhost", "root", "","rabotkacher") or die ("Ошибка". mysqli_error($conn));
   $vivod = mysqli_query($conn, "SELECT * FROM post JOIN categors where post.nameuser='$logPr' AND categors.id_cat = post.id_category ORDER BY `post`.`time` DESC");
   $i=0;
   foreach ($vivod as $per) {
    ?><div class="post__name"><?php echo $per['title'];?></div><?php
    ?><div class="post__name2">Категория: <?php echo $per['category'];?></div><?php
    ?><div class="post__photo"><img class = "img__post" src="images/<?php echo $per['img'];?>" alt=""></div><?php
    ?><br><br><div class="texts__posts">Описание: <?php echo $per['text'];?></div><?php
    ?><br><br><div class="time">Cтатус: <?php if($per['id_teck']==1){echo "Новая";}else if($per['id_teck']==2){echo "Решена";}else if($per['id_teck']==3){echo "Отклонена";}?></div><?php
    ?><br><br><div class="time">Дата: <?php echo $per['time'];?></div><?php
    ?><br><br><a href="ytochnenie.php?id=<?=$per['id'];?>"><?php if($per['id_teck']==1){echo "Удалить";}else{echo "";}?></a><?php
    ?>  <form action="vender/delete.php" method="post"><a href="vender/deletepolz.php?id=<?=$per['id'];?>"><?php if($per['id_teck']==2||$per['id_teck']==3){echo "";}else{echo "";}?></a></a></form></button>
   
    
  
    <?php

   
    $i++;
    if($i>3){
       break;
    }   
}
}
               ?> 
			    
<br><br><br><br><br><br>
</form>

           </div> 
       

       </div>
      
   </div>


   <footer>
   </footer>

</body>
</html>