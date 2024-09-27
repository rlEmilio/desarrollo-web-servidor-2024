<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>

    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    

    <?php

    $frutas = array(
        "Manzana",
        "Naranja",
        "Cereza"

    );

 


$personas = array(

"45362782D" => "Estela",
"79456342S" => "Enya",
"96645245G" => "Luis",
"68754643D" => "Daiana",

);

$personas[]='Jorge';
$personas["65748352G"] = "Alejandra";
unset($personas["96645245G"]);
print_r($personas);










/*array_push($frutas, "mango", "Melocotón");
$frutas[]= "Sandía";
$frutas[7]= "uva";
$frutas[]= "Melón";



unset($frutas[1]);
$frutas = array_values($frutas);

print_r($frutas);*/
    ?>

</body>
</html>