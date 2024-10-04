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

<link rel="stylesheet" href="estilos.css">

</head>
<body>
    

    <?php

    $frutas = array(
        "Manzana",
        "Naranja",
        "Cereza"

    );


    $frutas2 = array(
        "Naranja",
        "Manzana",
        "Cereza"
        
    );

 

if($frutas == $frutas2){
    echo ("Son iguales");
}else{ echo ("No son iguales");}
    
echo('<br>');


$numeros = [1,2,3,4,5];
$numeros2 = ["1","2","3","4","5"];


if($numeros === $numeros2){
    echo ("Son iguales");
}else{ echo ("No son iguales");}
    
echo('<br>');
echo('<br>');
$personas = array(

"45362782D" => "Estela",
"79456342S" => "Enya",
"96645245G" => "Luis",
"68754643D" => "Daiana",

);

$personas["12345342A"] = "Paco de la torre";
$personas["86754352O"] = "Paco fiestas";



asort($personas);
print_r($personas);


echo('<br>');
echo('<br>');


$profesores = array(





);

/*
<table>
    <thead>
        <tr>
            <th>Claves</th>
            <th>personas</th>
        </tr>

    </thead>

<tbody>
<?php

foreach($personas as $clave => $ele){?>
   <tr>

    <td>
        <?php
        echo ("$clave");
        ?>
    </td>
    <td>
        <?php
        echo ("$ele");
        ?>
    </td>
   </tr>

   <?php

   
}?>*/

/*$personas[]='Jorge';
$personas["65748352G"] = "Alejandra";
unset($personas["96645245G"]);


$tamano = count($personas);
echo($tamano);



for($i=0;$i<count($frutas);$i++){
echo("<li>$frutas[$i] </li>");


}

echo("<br>");

$i=0;
while($i < count($frutas)){
    echo("<li>$frutas[$i] </li>");
    $i++;
}

echo("<br>");
foreach($frutas as $clave => $ele){
    echo("<li>$clave, $ele </li>");
}




/*array_push($frutas, "mango", "Melocotón");
$frutas[]= "Sandía";
$frutas[7]= "uva";
$frutas[]= "Melón";



unset($frutas[1]);
$frutas = array_values($frutas);

print_r($frutas);*/
    /*?>



<table>
    <thead>
        <tr>
            <th>Claves</th>
            <th>personas</th>
        </tr>

    </thead>

<tbody>
<?php

foreach($personas as $clave => $ele){?>
   <tr>

    <td>
        <?php
        echo ("$clave");
        ?>
    </td>
    <td>
        <?php
        echo ("$ele");
        ?>
    </td>
   </tr>

   <?php

   
}?>







</tbody>
</table>


</body>
</html>*/