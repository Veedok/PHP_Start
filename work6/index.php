<?php
$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$operation = $_POST["Math"];
$result = "Пока еще не начали считать";
if($num2 == 0 && $operation == '/'){
    $result = "Делить на ноль нельзя";
}elseif(is_numeric($num1) && is_numeric($num2)){
    switch ($operation){
        case '+' :
            $result ="Сумма = " . ($num1 + $num2);
            break;
        case '-' :
            $result ="Разница = " . ($num1 - $num2);
            break;
        case '*' :
            $result ="Произведение = " . $num1 * $num2;
            break;
        case '/' :
            $result ="Частное = " . $num1 / $num2;
            break;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="number" name="num1">
        <input type="number" name="num2">
        <input type="submit" name="Math" value="+">
        <input type="submit" name="Math" value="-">
        <input type="submit" name="Math" value="*">
        <input type="submit" name="Math" value="/">
        <!-- <select name="Math">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="submit"> -->
    </form>
    <p><?php echo($result);?></p>
</body>
</html>