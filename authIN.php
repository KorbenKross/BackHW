<?php
$mysqli = new mysqli('localhost', 'root', '', 'hw_base');
$errors = array();
if (!empty($_POST)) {
    if ((trim($_POST['login']) && trim($_POST["password"]))) {
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        $result = $mysqli->query("select * from users where login='{$login}' and password='{$password}'");
        if ($result->num_rows != 1) {
            $errors[] = "Пользователь с таким логином и паролем не зарегистрирован";
        }
    }
    else {
        $errors[] = "Заполните все поля";
    }
}

if (empty($errorss)) {
    setcookie("Login", $_POST["login"], time() + 60);
    setcookie("Password", $_POST["password"], time() + 60);
    echo "Вы успешно авторизированы";
}
?>







