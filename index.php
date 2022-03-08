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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Navi</title>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
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
              
                <button class="nav__link" style="index.php"><a class="nav__link" href= "index.php"><?php if(isset($_COOKIE["log"])){echo"Вы вошли как "; echo $_COOKIE["log"];}else{echo "Главная страница";}?></a></button>
            
                  <button class="nav__link" name="b3" style=""><?php echo $name; ?></button>
            </nav>
            </div>
        </div>
    </div>
   <div class="intro">
       <div class="container1">
           <div class="post">
          
       <?php 
       
       include 'vivod.php';
       
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