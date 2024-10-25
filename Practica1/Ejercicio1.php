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
        table,th,caption,td{
            border: 1px solid black;
            text-align:center;
        }


    </style>
</head>
<body>
    
    <?php

    $personajes = [

        ["pikachu","electricidad"], //creo matriz
        ["blaziken","fuego"],
        ["vaporeon","agua"],
        ["pidgey","aire"]
    ];

    $nuevo_personaje1 = ["bullbasaur","planta"];
    array_push($personajes, $nuevo_personaje1);   //agrego personajes
    $nuevo_personaje2 = ["alakazam","psiquico"];
    array_push($personajes, $nuevo_personaje2);


    unset($personajes[5]);   //elimino el ultimo

    array_values($personajes); //reordeno para que no pete


    for($i=0;$i<count($personajes);$i++){
        $personajes[$i][2] = rand(500,2000);  //añado columna de puntos de ataque
    }


    for($i=0;$i<count($personajes);$i++){
        $personajes[$i][3] = rand(10000,30000);  //añado columna de puntos de vida
    }


   
    for($i=0;$i<count($personajes);$i++){
          if($personajes[$i][3]>=20000){              //añado columna de tipo
            $personajes[$i][4]="Tanque";                     
        }    else if($personajes[$i][2]>=1500 && $personajes[$i][3]<20000 ){
            $personajes[$i][4]="Ataque"; 
            
        }   else{
            $personajes[$i][4]="Soporte"; 
        }                                                     
    }



    //ordenar por columnas
    $_ataque = array_column($personajes, 2);
    $_salud = array_column($personajes, 3);
    $_elemento = array_column($personajes, 4);
    $_nombre = array_column($personajes, 0);
    array_multisort($_ataque, SORT_ASC, $_salud, SORT_ASC, $_elemento, SORT_ASC, $_nombre, SORT_ASC, $personajes);

    ?>

    <table>
        <thead>
            <caption>Personajes</caption>
            <tr>
                <th>Nombre</th>
                <th>Elemento</th>
                <th>Ataque</th>
                <th>Salud</th>
                <th>Tipo</th>

            </tr>
        </thead>
        <tbody>
        <?php
        foreach($personajes as $personaje){
            list($nombre,$elemento,$ataque,$salud,$tipo) = $personaje;
            echo"<tr>";
                echo "<td>$nombre</td>";
                echo "<td>$elemento</td>";
                echo "<td>$ataque</td>";
                echo "<td>$salud</td>";
                echo "<td>$tipo</td>";

            echo"</tr>";

        }

        ?>

        </tbody>

    </table>


</body>
</html>