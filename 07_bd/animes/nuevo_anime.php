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


$sql = "select * from estudios order by nombre_estudio";
$resultado = $_conexion -> query($sql);
$estudios = []; 


while($fila = $resultado -> fetch_assoc() ){
    array_push($estudios, $fila["nombre_estudio"]);
}



    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo"];
        $estudio = $_POST["estudio"];
        $ano = $_POST["ano"];
        $temporadas = $_POST["temporadas"];
        $imagenes = $_FILES["imagen"]["name"];
        echo $imagenes;


$sql = "INSERT INTO animes
(titulo, nombre_estudio, anno_estreno, num_temporadas)
VALUES
('$titulo', '$estudio', '$ano', '$temporadas')";


$_conexion -> query($sql);
    }


?>


<div class="container">
  
     
 <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label" for="titulo">Titulo</label>
        <input class="form-control" type="text" name="titulo"> 
    </div>
    <div class="mb-3">
        <label class="form-label" for="estudio">Estudio</label>
        <input class="form-control" type="text" name="estudio"> 
    </div>

    <div class="mb-3">
        <label class="form-label" for="ano">Año</label>
        <input class="form-control" type="text" name="ano"> 
    </div>
    <div class="mb-3">
        <label class="form-label" for="temporadas">Número de temporadas</label>
        <input class="form-control" type="text" name="temporadas"> 
    </div>

    <div class="mb-3">
        <label class="form-label" for="imagen">Imagenes</label>
        <input class="form-control" type="img/jpg" name="imagen">  
    </div>

    <div class="mb-3">
        <input type="submit" value="enviar">
    </div>


 </form>

  





</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>