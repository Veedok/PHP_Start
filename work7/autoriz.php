<?php

require_once 'db.php';
function addMarkup ($link) {
    $result1 = mysqli_query($link, "SELECT * FROM images ORDER BY countClick DESC");
    $product = '';
    while ($row = mysqli_fetch_assoc($result1)){
         $product .= "<form method='POST' action='autoriz.php'>
                        <div class='item'>
                                <img class='product_img' src=" . $row["imgPath"] . " alt='img'>
                                <input type='submit' value='buy' name='" . $row["id"] . "'>
                            </div>
                        </form>";
                
    }
    
    $wrap = '<link rel="stylesheet" href="style.css"><div class="wrap"><div class="content">' . $product . '</div></div>';
    echo($wrap);
    mysqli_close($link); 
}
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
if (isset($_COOKIE['myCookie']))   {   
    echo "Oh my God, переменная is gone ))";
    addMarkup($link); 
     
    $_SESSION .= $_POST[0];
    var_dump($_SESSION); 
} else {
    verify($link);
}

 
 

?>

    