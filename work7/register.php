<?php 
require_once 'db.php';
$result = mysqli_query($link, "SELECT * FROM login");
while ($users = mysqli_fetch_assoc($result)) {
    if($users['login'] === $_POST['login']) {
        echo ("Такой пользователь уже есть");
        die;
        }   
    }
if ($_POST['pass'] === $_POST['pass1']) {
    $passhesh = password_hash($_POST['pass'], null);
    $login = $_POST['login'];
    $adddb = "INSERT ignore INTO login (login, passwordhash) VALUES ('" . $login . "', '" . $passhesh . "')";
    mysqli_query($link, $adddb);
    echo('<h2>Вы успешно зарегистрированы</h2>
    <a href="index.php">На страницу входа </a>');
} else {
    echo('Пароли не совпадают');
}   