<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
 /*
Single page form => toda la informacion se almacena en una sola pagina
Multi page form => la informacion se reenvia a otras paginas
Modificar el formulario anterior para que se pueda icluir tambien un nuḿero
El mensaje se mostrará tantas veces como indique el número
 */

?>

<form action="" method="post">
<input type="text" name="mensaje"> 

<input type="number" name="numero">
<input type="submit" value="Enviar">


</form>

<?php


echo"hola";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */
    $mensaje = $_POST["mensaje"];
    $numero = (int)$_POST["numero"];
    var_dump($numero);
   
    
    for($i=0;$i<$numero;$i++){

        echo"<h1>$mensaje</h1>";
    }
   
    
}

?>


</body>
</html>