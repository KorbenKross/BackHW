<?php
	
 
	// подключаемся к серверу
	$link = mysqli_connect('localhost:3306', 'root', '', 'hw_base') 
	    or die("Ошибка " . mysqli_error($link));
	 
	// выполняем операции с базой данных
	$login = $_POST['login'];
	
	$query ="DELETE from `Users` WHERE `login` = '$login'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

	if ($result) {
	    echo "Данные успешно сохранены!";
	}
	else {
	    echo "Произошла ошибка, пожалуйста повторите попытку.";
	}

	// закрываем подключение
	mysqli_close($link);
?>