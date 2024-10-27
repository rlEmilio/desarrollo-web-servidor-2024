<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<?php

$num=0;
$contador =0;

while($contador < 50){
    $primo=true;

for($j=2;$j<$num;$j++){
  
    if($num%$j==0){
        $primo=false;
    } //si el numero no es primo
}


if($primo){
    echo("<li>El número $num es primo\n</li>");
    $contador++;
}

$num++;

}



?>
    
</body>
</html>