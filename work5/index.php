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
    if(!$link) {
        echo("db_error");
    }
    $result = mysqli_query($link, "SELECT * FROM images ORDER BY countClick DESC");
    while ($row = mysqli_fetch_assoc($result)){
        echo ("<a href='/singleimg.php?img_id=" . $row["id"] . "'>
                    <div class='item'>
                        <img class='product_img' src=" . $row["imgPath"] . " alt='img'>
                    </div>
                </a>");
                // Тут я пытаюсь создать масив что бы потом писать его в json и передавать в js 
                // было пару удачных попыток но буду благодарен если отметите как это правильно делать
                // foreach ($row as $key => $valu){
                //     $temp[] = array('key' => $key, 'value' => $value);
                // }
                
                 
        }
    mysqli_close($link);
    var_dump($temp[0]);
            
?>
        </div>
    </div>    
    <!-- <script>
        var id1 = <?php //print_r($temp)?>;
        console.log(id1[0]);
    </script> -->
</body>
</html>