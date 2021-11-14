<?php
$link = mysqli_connect('127.0.0.1:3306', 'root', 'root', 'php_start');
$result = mysqli_query($link, "SELECT * FROM images ORDER BY countClick DESC");
var_dump($result);
while ($row = mysqli_fetch_assoc($result)){
    echo ("<a href='/singleimg.php?img_id=" . $row["id"] . "'>
                <div class='item'>
                    <img class='product_img' src=" . $row["imgPath"] . " alt='img'>
                    <p>" . $row["imgName"]  . "</p>
                </div>
            </a>");        
    }