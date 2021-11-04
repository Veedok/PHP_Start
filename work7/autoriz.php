<?php
 session_start();
require_once 'db.php';


//Функция добавления разметки
function addMarkup ($link) {
    $result1 = mysqli_query($link, "SELECT * FROM images ORDER BY countClick DESC");
    $product = '';
    while ($row = mysqli_fetch_assoc($result1)){
         $product .= "<form method='POST' action='autoriz.php'>
                        <div class='item'>
                                <img class='product_img' src=" . $row["imgPath"] . " alt='img'>
                                <input class='displaynone' type='number' name='idproduct' value='" . $row["id"] . "'>
                                <input type='submit' id='' value = 'buy'>
                            </div>
                        </form>";
                
    }
    
    $wrap = '<link rel="stylesheet" href="style.css"><div class="wrap"><div class="content">' . $product . '</div></div>';
    echo($wrap); 
}
//Функция прохождения проверки юзера и пароля если все ок даем куки по которым при дальнейшем использовании страницы орентируемся на то что пользователь уже авторизован
function verify($link){
    $result = mysqli_query($link, "SELECT * FROM login");
    while ($users = mysqli_fetch_assoc($result)) {
        if($users['login'] === $_POST['login']) {
            if (password_verify($_POST['pass'], $users['passwordhash'])) {
                setcookie('myCookie', 'All ok');  
                addMarkup($link);                              
                die;  
            }   
        }    
    }    
    setcookie('badСookie','321');
    echo('error');
}
//Функция перебора массива из $_SESSION и формирование корзины из него
function basket ($arrayProduct, $link) {
    foreach($arrayProduct as $key => $value) {        
        $rowrequre = ("SELECT * FROM images WHERE id = ". $key. ";");
        $result2 = mysqli_query($link, $rowrequre);
        while ($row = mysqli_fetch_assoc($result2)){
             echo( "<form method='POST' action='autoriz.php'>
                        <div class='item'>
                                <img class='product_img' src=" . $row["imgPath"] . " alt='img'>
                                <input class='displaynone' type='number' name='idproduct' value='" . $row["id"] . "'>
                                <input type='submit' name='dell' value = 'DELL'>
                                <p class='count'>Количество " . $value . "</p>
                            </div>
                        </form>");
                
    }
        
    }

}
//Проверяем наличие куки если она есть пользователь уже авторизован
if (isset($_COOKIE['myCookie']))   {   
    addMarkup($link);
//Если он авторизован и нажал на купить продукт пишем его в $_SESSION['product] и перебираем масив добавляя разметку на этот продукт    
    if(isset($_POST['idproduct'])){        
//Проверка на нажатую кнопку DELL Если нажата то убераем товар из корзины и рисуем ее заново 
        if (isset($_POST['dell'])){
            unset($_SESSION['product'][$_POST['idproduct']]);
            basket($_SESSION['product'], $link);
//Если кнопка DELL не нажата проваливаемся сюда
        } else { 
//Если нужный нам массив существует и он не NULL то пробигаемся по нему циклом и ищем нет ли в нем уже нужного нам элемента         
            if((isset($_SESSION['product']) && $_SESSION['product']) ?? null )   {                   
                foreach ($_SESSION['product'] as $key => $value) {
                    if ($key == $_POST['idproduct']) { 
//Если нашли нужный элемент прибавляем к значению 1 рисуем корзину и прекращаем работу что бы последующие элементы не поломали нам работу                                           
                        $_SESSION['product'][$key] = $value + 1;
                        basket($_SESSION['product'], $link);
                        die;
                    } else {
//Если мы не нашли в массиве нужный нам элемент даем ему значение 1
                        $_SESSION['product'][$_POST['idproduct']] = 1;
                    }                    
                 }  
//Если корзины пока вообще нет то создаем ее и пишем в нее первый товар
                } else {
                    $_SESSION['product'][$_POST['idproduct']] = 1;
                    basket($_SESSION['product'], $link);
                    die;
            }
            
            basket($_SESSION['product'], $link);  
        }
    } 
//Если пользователь не авторизован но уже ввел логин и пароль то запускаем функцию проверки логина и пароля
} else {
    verify($link);
}
?>



    