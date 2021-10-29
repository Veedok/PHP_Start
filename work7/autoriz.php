<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">    
    <title>Document</title>
</head>
<body>    
    <div class="off" id="modal"></div>
    <div class="wrap">
        <div class="content">  

<?php
require_once 'db.php';
$result = mysqli_query($link, "SELECT * FROM login");
while ($users = mysqli_fetch_assoc($result)) {
    if($users['login'] === $_POST['login']) {
        if (password_verify($_POST['pass'], $users['passwordhash'])) {
            $result1 = mysqli_query($link, "SELECT * FROM images ORDER BY countClick DESC");
            while ($row = mysqli_fetch_assoc($result1)){
                 echo ("<a href='/singleimg.php?img_id=" . $row["id"] . "'>
                            <div class='item'>
                                <img class='product_img' src=" . $row["imgPath"] . " alt='img'>
                            </div>
                        </a>");
                        
            } 
            die;  
        }   
    }    
}
mysqli_close($link);
echo('error');
?>
       </div>
    </div>    
</body>
</html>