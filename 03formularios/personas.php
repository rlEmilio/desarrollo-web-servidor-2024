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
    
<form action="" method="post">
<input type="text" name="nombre"> 
<input type="text" name="edad">
<input type="submit" value="Enviar">


</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */
    $nombre = $_POST["nombre"];
    $edad = (int)$_POST["edad"];
    var_dump($nombre);    
    var_dump($edad);
    $resultado ="";
    
    $resultado = match (true) {
       $edad < 18  => "Menor de edad",
       $edad >=18  && $edad <65 => "Mayor de edad",
       $edad >=65 =>  "Jubilada"
    };

   
    echo"La persona $nombre es: $resultado";
}

?>



</body>
</html>