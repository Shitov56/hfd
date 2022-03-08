<?php 
$conn = mysqli_connect("localhost", "root", "","rabotkacher") or die ("Ошибка". mysqli_error($conn));
$vivod = mysqli_query($conn, "SELECT * FROM post JOIN categors where categors.id_cat = post.id_category AND post.id_teck = '2 'ORDER BY `post`.`time` DESC");
$i=0;
  $itog;
   while ($per = mysqli_fetch_assoc($vivod)) {
  //    $itog = $per['id'];
  // echo $per['img'];

 
 // $success=mail();
  //echo $success;
   
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