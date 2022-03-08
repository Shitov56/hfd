<?php
var_dump($_POST);

$emailz = $_POST['emailz'];
    $a = $_POST['log'];
    $b = $_POST['par'];
    $fio = $_POST['fio'];

	

//$fio="log log log";

		
$imya = explode(" ", $fio);
//if($imya[0]!=null||$imya[1]!=null||$imya[2]!=null){
$c = $imya[0];
$d = $imya[1];
$e = $imya[2];
//}
if($d==null||$e==null||$c==null){
	echo "Пожалуйта введите информацию корректно";
}
else{
	echo "Все верно";

	
	//$a = "log";
 //   $b= "par";
//	$c=$_GET['c'];
	//$d=$_GET['d'];
	//$e=$_GET['e'];
	$conn = mysqli_connect("localhost", "root","", "rabotkacher") or die (" Ошибка при подключении ". mysqli_error($conn));
	$resul = mysqli_query($conn, "SELECT password FROM users where name='$a'");
	if ($resul)
	{
	$sum_row_users = mysqli_num_rows($resul);	
	if ($sum_row_users==0)
			{	
		$resul11 = mysqli_query($conn, "SELECT max(id_user) as id FROM users");
		$max_id = mysqli_fetch_assoc($resul11);
		$id_users=$max_id['id'];
		$id_users+=1;
		$id_rol = 1;
		
		$resul111 = mysqli_query($conn, "SELECT max(id_polz) as id FROM polzov");
		$max_id = mysqli_fetch_assoc($resul111);
		$id_polz=$max_id['id'];
		$id_polz+=1;
		
		
		
		
		
		
		
		
		$sql = "insert into users values($id_users, $id_rol, '$a', '$b')"; 
		$res = mysqli_query($conn, $sql) or die (" Ошибка 1 ". mysqli_error($conn));
		
		$sql = "insert into polzov values($id_polz, $id_users,'$emailz', '$c', '$d', '$e')"; 
		$res = mysqli_query($conn, $sql) or die (" Ошибка 1 ". mysqli_error($conn));
	} //конец if sum_row
	} //конец if resul
	}