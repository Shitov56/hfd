<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
	<link rel="stylesheet" href="css/style.css">
	<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
  
</head>
<body>	
	
<script>
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>

<div>Регистрация</div>

</div>
  <table align = "center">
	  
			<tr>
			  <th>
			    <p>Введите Логин </p>
			    <p>
			      <input  type = "text" name ="a" class = "log" >
		        </p>
			
			    </th>
	    </table><table align = "center">
	<tr>
	  <th>
	 
  <p>Введите ФИО</p>
  <p>
    <input type = "text" name ="fio" class="fio" required>
  </p>
  <p>Введите Email </p>
  <input type = "text" name ="fio" class="milo" required>
  <p>Введите Пароль </p>
			    <p>
			      <input type = "text" name ="b" class="par" required>
		        </p>
				<p>Повторите Пароль </p>
			    <p>
			      <input type = "text" name ="b" class="parPov" required><p id="parolsnesov" style="color:red;"></p>
		        </p>
				<input type="checkbox" name="a" id = "obrabotka" required> Согласен на обработку персональных данных
				<p>&nbsp;</p>
<button name = "b1" class= "otpravka">Регистрация  </button>


<p><a href="index.php">Назад</a></p>
		
			</th>
	  </table>

	

<script>
	$('button.test').on('click', function(){
		
		var emailValue = $('input.milo').val();
		
   		
		if(re5.test(emailValue)){
console.log("получилосьvalid");
		}
		else console.log("is not valid");
	
		


	})	
	$(document).ready(function(){
		$('button.otpravka').on('click', function(){
			var parValue = $('input.par').val();
			var parPovValue = $('input.parPov').val();
			var logValue = $('input.log').val();
			var fioValueqq = $('input.fio').val();
			var emailValue = $('input.milo').val();
			var chbox;
			chbox=document.getElementById('obrabotka');
			const re = fioValueqq.split(" ");
			var mailCheks = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if(re.length==3){
	var znach1=re[0];
	var znach2=re[1];
	var znach3=re[2];
	let match1 = /^[а-яё]*$/i.test(znach1);
	let match2 = /^[а-яё]*$/i.test(znach2);
	let match3 = /^[а-яё]*$/i.test(znach3);
	
	if(logValue!=""&&parValue!=""&&parValue==parPovValue&&match1&&match2&&match3&&chbox.checked&&mailCheks.test(emailValue)){
				var itog = parValue;
				var fioValue = znach1+" "+znach2+" "+znach3;
				console.log(fioValue);
				document.getElementById("parolsnesov").innerHTML = "Аккаунт создан";
				//var fioValue = $('input.fio').val();
			
			
			console.log(emailValue);
			$.ajax({
  method: "POST",
  url: "some.php",
  data: { log: logValue, emailz: emailValue,par: itog,fio:fioValue}
})
  .done(function(  ) {
    //alert( "Data Saved: " + msg );
  });
		}else  document.getElementById("parolsnesov").innerHTML = "ФИО введен не коректно или не заполнены другие поля";
//	console.log(znach1+" "+znach2+" "+znach3);
		}else  document.getElementById("parolsnesov").innerHTML = "ФИО введен не коректно или не заполнены другие поля";

		if(parValue!=parPovValue){
		document.getElementById("parolsnesov").innerHTML = "Пароли не совпадают";
	}

		if(!chbox.checked){
		document.getElementById("parolsnesov").innerHTML = "Согласитесь на обработку данных";
	}
		if(!mailCheks.test(emailValue)){
			document.getElementById("parolsnesov").innerHTML = "Майл введен не коректно";
		}
		if(logValue==""&&parValue==""){
		document.getElementById("parolsnesov").innerHTML = "Пожалуйста введите логин и пароль";
	}

			//let match = /^[а-яё]*$/i.test(fioValueqq);
			
		
		
			
		
		})

	});
	
  </script>
</body>
</html>
