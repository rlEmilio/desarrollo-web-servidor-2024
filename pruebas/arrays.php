<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>


<style>
    table, th, td{
        border: 1px solid black;
    }



</style>
</head>
<body>

<?php
/*$personas = array(

"45362782D" => "Estela",
"79456342S" => "Enya",
"96645245G" => "Luis",
"68754643D" => "Daiana",

);

$personas[]='Jorge';
$personas["65748352G"] = "Alejandra";

print_r($personas);*/


$videojuegos = [

["super mario", "plataformas", 40],
["alice madness","terror", 10],
["hollow night", "plataformas", 30],
["uncharted","accion",50]

];

$_nuevoJuego = ["resident evil","terror",15];
array_push($videojuegos, $_nuevoJuego);

//print_r($videojuegos);


 for($i=0;$i<count($videojuegos);$i++){
    if($videojuegos[$i][2]>15){
        $videojuegos[$i][3]="Ta caro";
    }else{
        $videojuegos[$i][3]="Ta bien";
    }

   
}  

unset($videojuegos[2]);

?>


<table>

    <thead>
        <tr>
            <th>
            Juego
            </th>
            <th>
            Tipo
            </th>
            <th>
            Precio
            </th>
            <th>
             Estado   
            </th>
        </tr>


    </thead>

    <tbody>





     <?php foreach($videojuegos as $videojuego){
        list($nombre, $tipo, $precio, $estado) = $videojuego;
        echo "<tr>";
        echo "<td>$nombre</td>";
        echo "<td>$tipo</td>";
        echo "<td>$precio</td>";
        echo "<td>$estado</td>";
        echo "</tr>";


     }
        
      ?>



    </tbody>




</table>
    
</body>
</html>