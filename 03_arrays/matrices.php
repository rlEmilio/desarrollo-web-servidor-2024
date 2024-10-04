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



    $videojuegos = [

        ["FIFA 24", "DEPORTE", 70],
        ["Dark Souls", "Soulslike", 50],
        ["Hollow Knight", "Plataformas", 0]


    ];


  $nuevo_videojuego = ["Throne and liberty", "MMO", 20];
            array_push($videojuegos, $nuevo_videojuego); //introducir elemento en matriz;

    #SORT_ASC ordenar de forma ascendiente
    #SORT_DESC ordenar de forma descendiente


     #ordenar por el precio de mas barato a mas caro
     $_precio = array_column($videojuegos,2);
     array_multisort($_precio, SORT_ASC, $videojuegos);
     
     
     #ordenar por categoria en orden alfabetico inverso
     /*$_categoria = array_column($videojuegos,1);
     array_multisort($_categoria, SORT_DESC, $videojuegos);*/
     
               
?>

<table>

   
        <thead>
        <caption>Videojuegos</caption>
        <tr>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Gratuito</th>

        </tr>

        </thead>

        <tbody>

            <?php
          

          array_push($videojuegos, ["Fortnite", "Battle royale", 0]);
          array_push($videojuegos, ["TLOU", "shooter", 40]);

          for($i=0;$i<count($videojuegos);$i++){
            if($videojuegos[$i][2]==0){
                $videojuegos[$i][3]="SI";
            }else{
                $videojuegos[$i][3]="NO";
            }
          }


        foreach($videojuegos as $videojuego){
            echo("<tr>");
            list($titulo, $categoria, $precio, $gratuito)= $videojuego;
            echo ("<td>$titulo</td>");
            echo ("<td>$categoria</td>");
            echo ("<td>$precio</td>");
            echo ("<td>$gratuito</td>");
            echo("</tr>");
        }




        ?>


        </tbody>


</table>
   

</body>
</html>