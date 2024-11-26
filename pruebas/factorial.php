<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    



<?php   
//factorial de n

$factorial = 1;
$num = 6;

for ($i = 1; $i <= $num; $i++) {
$factorial*=$i;

}

echo "El factorial de $num es: ".$factorial;

?>

<?php

//sumatorio de n

$sumatorio = 0;


for ($i = 1; $i <= $num; $i++) {
$sumatorio+=$i;

}

echo "<br>El sumatorio de $num es: ".$sumatorio;





?>




</body>
</html>