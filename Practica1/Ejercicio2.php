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
    $barrios=[
        ["Centro",2543],
        ["Huelin", 1109],    //creo matriz
        ["Málaga Este", 890],
        ["Palma/Palmilla", 49]

    ];


?>
<!--muestro contenido  -->
<table>

        <thead>
            <caption>Barrios de Málaga</caption>
            <tr>
                <th>Nombre</th>
                <th>Pisos turísticos</th>
              
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($barrios as $barrio){
            list($nombre,$pisos) = $barrio;
            echo"<tr>";
                echo "<td>$nombre</td>";
                echo "<td>$pisos</td>";
                
            echo"</tr>";
        }
        ?>
        </tbody>
    </table>
        <br><br>



    <!--formulario -->
<form action="" method="post">
    <label for="nombre"></label>
    <input type="text" name="nombre">
    <input type="submit" value="enviar">

</form>
    

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $_nombre = $_POST["nombre"];  //me traigo nombre del input
    $_existe = false;   //booleano para comprobar que existe el barrio recorriendo el array
   
  
    $_numero_viviendas = 0;  //aqui guardo las viviendas

    for($i=0;$i<count($barrios);$i++){
        if($barrios[$i][0]==$_nombre){
            $_existe=true;
            $_numero_viviendas = $barrios[$i][1];
               
        }    
        
    }
   
    if(!$_existe){
        echo ("<br>El barrio no existe");
    }

    $respuesta = "";     //comparaciones loǵicas
        match (true) {
           $_numero_viviendas==0  => $respuesta = "No hay viviendas turísticas",
           $_numero_viviendas >= 1 &&  $_numero_viviendas <= 50  => 
           $respuesta = "El barrio $_nombre"." tiene $_numero_viviendas viviendas turísticas. Son pocas viviendas turísticas" ,
           $_numero_viviendas >= 51 &&  $_numero_viviendas <= 1000  => 
           $respuesta = "El barrio $_nombre"." tiene $_numero_viviendas viviendas turísticas. Son bastantes viviendas turísticas" ,
           $_numero_viviendas > 1000  => 
           $respuesta = "El barrio $_nombre"." tiene $_numero_viviendas viviendas turísticas. Son muchas viviendas turísticas" ,
           
            
        };
    echo "<br>".$respuesta;

    }
    ?>



</body>
</html>