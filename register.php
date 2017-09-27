
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			/*baыckground-image: url(images2/1.jpg);*/
			max-width: 100%;
			text-align: center;
			font-size: 18px;
		}
		input{
			background-color: pink;
		}
		table{
			background-color: grey;
			border: 3px solid black;
		}
		form{
			font-family: Tahoma, sans-serif;
			padding: 20px;
			color: red;
		}
		form input{
			height: 24px;
			width: 200px;
			opacity: 0.5;
			border-radius: 5px;
			margin-bottom: 20px;
		}
		form input:hover{
			opacity: 1;
		}
		form input[type="submit"]{
			opacity: 1;
		}
		.fon{
			text-align: left;
			width: 500px;
			border: 2px solid blue;
			border-radius: 10px;
			background-color: white;
		}

	</style>
</head>

<body>
<div class="fon">
	<form name="forma" action="loginIN.php" method="post">
		 Ваш логин: <input type="text" name="login"><br />
		 Ваш пароль: <input type="password" name="password"><br />
		 Ваш пароль еще раз: <input type="password" name="rpassword"><br />
		 Ваше имя: <input type="text" name="name"><br />
		 Ваша фамилия: <input type="text" name="surname"><br />
		 Ваш университет: <input type="text" name="univer"><br />
		 Желаемая зарплата: <input type="text" name="salary"><br />		 
		 О себе: <input type="text" name="about"><br />
		<input name="submit" type="submit" value="Отправить"> 		 
	</form>
</div>
	<form name="forma1" action="DelIN.php" method="post">
		 Введите логин для удаления: <input type="text" name="login"><br />
		<input name="submit" type="submit" value="Удалить"> 		 
	</form>




<?php

	$link = mysqli_connect('localhost:3306', 'root', '', 'hw_base') 
					    or die("Ошибка " . mysqli_error($link));

	$select= mysqli_query($link, "SELECT `name`, `surname`, `univer`, `salary`, `about` FROM `Users`;");
	echo '<table align=/"middle/" border=/"1/">';
	echo "<th> Имя </th>";
	echo "<th> Фамилия </th>";
	echo "<th> Университет </th>";
	echo "<th> Зарплата </th>";
	echo "<th> О себе </th>";
	while ($r= mysqli_fetch_array($select)) {
			echo "<tr>";
	        // echo $r['id'] . " ";
	        echo "<td>" . $r['name'] . " " . "</td>";
	        echo "<td>" . $r['surname'] . " " . "</td>";
	        echo "<td>" . $r['univer'] . " " . "</td>";
	        echo "<td>" . $r['salary'] . " " . "</td>";
	        echo "<td>" . $r['about'] . " " . "</td>" . "<br />";
	        echo "</tr>";
	}
	echo "</table>";

	// закрываем подключение
	mysqli_close($link);
?>
	<?php



			    # Если кнопка нажата
			    if( isset( $_POST['search_table'] ) )
			    {	
					// подключаемся к серверу
					$link = mysqli_connect('localhost:3306', 'root', '', 'hw_base') 
					    or die("Ошибка " . mysqli_error($link));
					 
					// выполняем операции с базой данных
					$univer = $_POST['univer'];
					
					$query ="SELECT `id`, `name`, `surname`, `univer`, `salary`, `about` FROM `Users` WHERE `univer` = '$univer'";
					$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

					echo '<table border=/"1/">';
					echo "<th> Имя </th>";
					echo "<th> Фамилия </th>";
					echo "<th> Университет </th>";
					echo "<th> Зарплата </th>";
					echo "<th> О себе </th>";
					while ($x= mysqli_fetch_array($result)) {
							echo "<tr>";
					        echo "<td>" . $x['name'] . " " . "</td>";
					        echo "<td>" . $x['surname'] . " " . "</td>";
					        echo "<td>" . $x['univer'] . " " . "</td>";
					        echo "<td>" . $x['salary'] . " " . "</td>";
					        echo "<td>" . $x['about'] . " " . "</td>" . "<br />";
					        echo "</tr>";
					}
					echo "</table>";


			        # Тут пишете код, который нужно выполнить.
			        # Пример:
			        if ($result) {
						    echo "Данные успешно сохранены!";
						}
						else {
						    echo "Произошла ошибка, пожалуйста повторите попытку.";
					}

					// закрываем подключение
					mysqli_close($link);
			    }
			  ?>







<?php  if (empty($_COOKIE)) : ?>

<html>
<form action="authIN.php" method="POST" >
    Логин:
    <input name="login" type="text" />
    <br/><br/>
    Пароль:
    <input name="password" type="password"/>
    <br/><br/>
    <input type="submit" value="Войти" />
</form>
    </html>
<?php else:?>
<h1> Вы авторизированы под логином <?=$_COOKIE["Login"]?> </h1>
<?php endif;?>			  


    <div id="search">

          <form role="search" method="POST">          	  
              <input style="width: 200px; height: 20px; margin: 10px;" type="text" placeholder="Поиск по университету..." name="univer" value="">
              <input name="search_table" type="submit" value="Найти"> 
          </form>
    </div>







</body>
</html>