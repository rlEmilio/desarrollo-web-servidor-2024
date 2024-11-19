<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    require("configuracion.php");
    ?>


<style>

     th, td{
        border: 1px solid black;
        
    }
</style>

</head>
<body>
    

<div class="container">
    
    
    <?php
    $sql1 = "select * from animes";
    $resultado1 = $_conexion -> query($sql1);

    ?>

    <a href="nuevo_anime.php">Nuevo anime</a>

<table class="table table-striped table-dark">
    <head>
        <tr>
            <th>Titulo</th>
            <th>Estudio</th>
            <th>Año</th>
            <th>Número de temporadas</th>
        </tr>

    </head>

    <tbody>
        <?php
            while($fila = $resultado1 -> fetch_assoc()){

                echo("<tr>");
                echo("<td>" .$fila["titulo"] ."</td>");
                echo("<td>" .$fila["nombre_estudio"] ."</td>");
                echo("<td>" .$fila["anno_estreno"] ."</td>");
                echo("<td>" .$fila["num_temporadas"] ."</td>");
                echo("</tr>");

            }
        ?>


 
<?php
    $sql2 = "select * from estudios";
    $resultado2 = $_conexion -> query($sql2);

    ?>


<table class="table table-striped table-dark">
    <head>
    <br><br>
    <h2>Estudios</h2>
        <tr>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Año de creacion</th>

        </tr>

    </head>

    <tbody>
        <?php
            while($fila = $resultado2 -> fetch_assoc()){

                echo("<tr>");
                echo("<td>" .$fila["nombre_estudio"] ."</td>");
                echo("<td>" .$fila["ciudad"] ."</td>");
                echo("<td>" .$fila["anno_fundacion"] ."</td>");
                
                echo("</tr>");

            }
        ?>


    </tbody>


</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>