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
            <button class="nav__link" style="adminindex.php"><a class="nav__link" href= "index.php">Главная страница</a></button>
             
            </nav>
            </div>
        </div>
    </div>
    <div class="intro">
       <div class="container">
           <div class="post">
           <form class="post"> 
           <?php 
           $conn = mysqli_connect("localhost", "root", "","rabotkacher") or die ("Ошибка". mysqli_error($conn));
           
           $vivod = mysqli_query($conn, "SELECT * FROM `categors`");
           foreach($vivod as $vi){
            ?><br><?php
              echo $vi['category'];
             ?>&nbsp&nbsp<a style = "color:red;" href = "vender/delcat.php?id=<?= $vi['id_cat'];?>">Удалить</a><?php
           }
           ?>
           <p>Введите название категории </p>
           <br>
			    <p>
                    
			      <input type = "text"  name ="b" class="par">
		        </p>
           <button name = "addCat">Добавить категорию</button>
           <button name = "exit">выйти</button>

           <br><br>
           <?php 
         
       
         $conn = mysqli_connect("localhost", "root", "","rabotkacher") or die ("Ошибка". mysqli_error($conn));
         $vivod = mysqli_query($conn, "SELECT * FROM post JOIN categors where categors.id_cat = post.id_category ORDER BY `post`.`time` DESC");
         $i=0;
           
            while ($per = mysqli_fetch_assoc($vivod)) {
             ?><div class="post__name"><?php echo $per['title'];?></div><?php
             ?><div class="post__name2">Категория: <?php echo $per['category'];?></div><?php
             ?><div class="post__photo"><img class = "img__post" src="images/<?php echo $per['img'];?>" alt=""></div><?php
             ?><br><br><div class="texts__posts">Описание: <?php echo $per['text'];?></div><?php
             ?><br><br><div class="time">Cтатус: <?php if($per['id_teck']==1){echo "Новая";}else if($per['id_teck']==2){echo "Решена";}else if($per['id_teck']==3){echo "Отклонена";}?></div><?php
             ?><br><br><div class="time">Дата: <?php echo $per['time'];?></div><?php
            
            ?><a style = "color:green;" href = "vender/razreshena.php?id=<?=$per['id'];?>"><?php if($per['id_teck']==3){echo "Решена";}else if($per['id_teck']==1){echo "Решена";}?></a>&nbsp&nbsp<a style = "color:red;" href = "vender/orklonena.php?id=<?=$per['id'];?>"><?php if($per['id_teck']==2){echo "Отклонена";}else if($per['id_teck']==1){echo "Отклонена";}?></a><?php
             $i++;
             if($i>3){
                break;
             }
             
         }
         ?>
           <br><br>

<br><br><br><br><br><br>
</form>

           </div> 

       </div>
      
   </div>
   
   <?php 
     
     if (isset($_GET['addCat'])){

         $b=$_GET['b'];
         if($b ==null){echo "Заполните поле";}else{  $sql = "INSERT INTO `categors` (`id_cat`, `category`) VALUES (NULL, '$b')"; 
             $res = mysqli_query($conn, $sql) or die (" Ошибка 1 ". mysqli_error($conn));header("Location:admin.php");}
      
       
     }
	if (isset($_GET['exit'])){
        setcookie('log',  '$value', time()-86400);
        
        setcookie('par',  '$value', time()-86400 );	
        header("Location:index.php");
    }
        
//  session_start();
//  echo $_COOKIE["id"];
//  $kyky=$_SESSION["id_user"];
// echo $kyky;

// echo $_COOKIE["log"];



?>
   <footer>
   </footer>

</body>
</html>