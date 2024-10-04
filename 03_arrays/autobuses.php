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

 
</head>
<body>



    <?php
    $autobuses = [

        ["Málaga", "Ronda", 90, 10],
        ["Churriana", "Málaga", 20, 3],
        ["Málaga", "Granada", 120, 15],
        ["Torremolinos", "Málaga", 90, 10]
        
        #añadir dos lineas de autobus
        #ordenar por duracion de mas a menos
        #mostrar las lineas en una tabla

        #insertar 3 autobuses mas.
        #ordenar primero por el origen y luego por el precio
        #ordenar primero por la duracion y luego por el precio.



    ];

   /* $nueva_linea1 = ["Maqueda", "Alameda", 60, 4];
    $nueva_linea2 = ["Cártama", "Álora", 90, 9];
    array_push($autobuses, $nueva_linea1 );
    array_push($autobuses, $nueva_linea2 );
    array_push($autobuses, ["Centro", "Torremolinos", 50, 3] );
    array_push($autobuses, ["Puerto", "Clinico", 80, 10] );
    array_push($autobuses, ["locotta", "Fuengirola", 120, 20] );




    $_origen = array_column($autobuses, 0);
    $_precio = array_column($autobuses, 3);
    $_destino = array_column($autobuses, 1);
    $_duracion = array_column($autobuses, 2);
    array_multisort($_origen, SORT_ASC, $_destino, SORT_ASC, $autobuses);
    array_multisort($_duracion, SORT_ASC, $_precio, SORT_ASC, $autobuses);*/



    #unset($autobuses[0]); #borrar fila de la matriz.

 

    ?>


<table>


        <thead>
        <caption>Lineas de autobuses</caption>
        <tr>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duracion</th>
            <th>Precio</th>
            <th>Distancia</th>
            

        </tr>

        </thead>

        <tbody>

            <?php
              for($i=0;$i<count($autobuses);$i++){
                $autobuses[$i][4]= "X";
                
            }

        foreach($autobuses as $autobus){
            echo("<tr>");
            list($origen, $destino, $duracion, $precio, $distancia) = $autobus;
            echo ("<td>$origen</td>");
            echo ("<td>$destino</td>");
            echo ("<td>$duracion</td>");
            echo ("<td>$precio</td>");
            if($duracion<=30){
                $distancia="Corta distancia";
            }else if($duracion<=90){
                $distancia="Distancia media";
            }else{
                $distancia="Distancia larga";
            }
            echo ("<td>$distancia</td>");
            echo("</tr>");
        }

    

       
        ?>


        </tbody>


</table>



       
   

    
</body>
</html>