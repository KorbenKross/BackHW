  	<?php
$link = mysqli_connect('localhost', 'root', '', 'hw_base') 
	    or die("Ошибка " . mysqli_error($link));
$errors = array();
if (!empty($_POST)) {
    if  ((trim($_POST['login']) && trim($_POST['name']) && trim($_POST['password']))
        && trim($_POST['rpassword'])) {

        if ($_POST['password'] != $_POST['rpassword']) {
            $errors[] = "Пароли не совпадают";
        }

        $result = $link->query("select login from users where login='{$_POST['login']}'");
        if ($result->num_rows != 0) {
            $errors[] = "Пользователь с логином {$_POST['login']} уже существует";
        }
    }
    else {
        $errors[] = "Заполните все поля";
    }
}

    if (empty($errors)) {
    $login = $_POST['login'];
	$password = $_POST['password']; 
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$univer = $_POST['univer'];
	$salary = $_POST['salary'];
	$about = $_POST['about'];
    $query ="INSERT INTO `Users`(`id`, `login`, `password`,`name`,`surname`,`univer`,`salary`,`about`) VALUES (NULL, '$login', '$password', '$name', '$surname', '$univer', '$salary', '$about')";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	echo "Вы успешно зарегистрированы!";
}
    else {
        foreach($errors as $error) {
            echo $error . "<br>";
        }
    }
	// закрываем подключение
	mysqli_close($link);
	?>