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


</head>
<body>
    


<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $fabricante = $_POST["fabricante"];
        $generacion = $_POST["generacion"];
        $unidades = $_POST["unidades_vendidas"];


$sql = "INSERT INTO consolas
(nombre, fabricante, generacion, unidades_vendidas)
VALUES
('$nombre', '$fabricante', '$generacion', '$unidades')";
 

$_conexion -> query($sql);
    }


?>


<div class="container">
 
    
 <form action="" method="post">
    <div class="mb-3">
        <label class="form-label" for="nombre">Nombre</label>
        <input class="form-control" type="text" name="nombre"> 
    </div>
    <div class="mb-3">
        <label class="form-label" for="fabricante">Fabricante</label>
        <input class="form-control" type="text" name="fabricante"> 
    </div>

    <div class="mb-3">
        <label class="form-label" for="generacion">Generacion</label>
        <input class="form-control" type="text" name="generacion"> 
    </div>
    <div class="mb-3">
        <label class="form-label" for="unidades_vendidas">Unidades vendidas</label>
        <input class="form-control" type="text" name="unidades_vendidas">  
    </div>

    <div class="mb-3">
        <input type="submit" value="enviar">
    </div>


 </form>

  





</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>