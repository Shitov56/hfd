<?php 	
if (isset($_COOKIE["log"])){
    
    $name = "Личный кабинет";
  
    $disp =" ";
    $disp2 = "display: none;";
    if ($_COOKIE["id"]==1){
        if(isset($_GET['b3'])){
            header("Location:lich.php");
    
        }
      

        
    }
    if($_COOKIE["id"]==3){
        if(isset($_GET['b3'])){
            header("Location:admin.php");
    
        }
    }
   
       }
       else {$name = "Вход";
       $disp = "display: none;";
       $disp2 = " ";
       if(isset($_GET['b3'])){
        header("Location:vhod.php");

    }
      
       }
      
       ?>
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
            <form>
              
                <button class="nav__link" style="index.php"><a class="nav__link" href= "index.php"><?php if(isset($_COOKIE["log"])){echo "Вы вошли как "; echo $_COOKIE["log"];}else{echo "Главная страница";}?></a></button>
            
                  <button class="nav__link" name="b3" style=""><?php echo "Управление категориями"; ?></button>
            </nav>
            </div>
        </div>
    </div>
   <div class="intro">
       <div class="container">
           
           <div class="post">
 
         
           
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
   
    $i++;
    if($i>3){
       break;
    }
    
}
  // $ty= mysqli_fetch_all($vivod);
 //  $i=0;
    //   foreach($ty as $viv){
      //     $title=$viv[1];
      //     $img = $viv[2];
      //     $text = $viv[3];
      //     $time = $viv[5];
           
         
     //  }
    
    
       
     
      
    
    
   
   ?> 

             <br><br><br><br><br><br>


           </div> 

       </div>
      
   </div>
 
   </form>
   <footer>
   </footer>
</body>
</html>