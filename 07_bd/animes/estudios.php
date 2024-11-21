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
        $nombre = $_POST["nombre_estudio"];
        $ciudad = $_POST["ciudad"];
        $anno = $_POST["anno_fundacion"];
       


$sql = "INSERT INTO estudios
(nombre_estudio, ciudad, anno_fundacion)
VALUES
('$nombre', '$ciudad', '$anno')";


$_conexion -> query($sql);
    }
   
   /* nombre_estudio VARCHAR(30) PRIMARY KEY,
    ciudad VARCHAR(40),
    anno_fundacion NUMERIC(4,0)*/

?>


<div class="container">
 
    
 <form action="" method="post">
    <div class="mb-3">
        <label class="form-label" for="nombre_estudio">Nombre Estudio</label>
        <input class="form-control" type="text" name="nombre_estudio"> 
    </div>
    <div class="mb-3">
        <label class="form-label" for="ciudad">Ciudad</label>
        <input class="form-control" type="text" name="ciudad"> 
    </div>

    <div class="mb-3">
        <label class="form-label" for="anno_fundacion">Año de fundación</label>
        <input class="form-control" type="text" name="anno_fundacion"> 
    </div>
   
    <div class="mb-3">
        <input type="submit" value="enviar">
    </div>


 </form>

  





</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>