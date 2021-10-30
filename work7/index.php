<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <div class="wrap1">
        <form class="form" method="POST" action="autoriz.php">
            <h3>Вход</h3>
            <input class="itemform" type="text" name="login" placeholder="Введите логин">
            <input class="itemform" type="password" name="pass" placeholder="Введите пароль">
            <input class="itemform" type="submit" value="Войти">
        </form>
        <form class="form" method="POST" action="register.php">
            <h3>Регистрация</h3>
            <input class="itemform" type="text" name="login" placeholder="Придумайте логин">
            <input class="itemform" type="password" name="pass" placeholder="Введите пароль">
            <input class="itemform" type="password" name="pass1" placeholder="Повторите пароль">
            <input class="itemform" type="submit" value="Зарегестрироваться">
        </form>
    </div>

</body>
</html>




