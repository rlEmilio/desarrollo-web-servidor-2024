<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    require("../05_funciones/edades.php");
    require("../05_funciones/potencia.php");
    ?>

 
</head>
<body>

<h1>edad</h1>

<form action="" method="post">
<input type="text" name="nombre" placeholder="nombre">
<input type="text" name="edad" placeholder="edad">
<input type="submit" value="Comprobar">
<input type="hidden" name="accion" value="formulario_edad">
</form>

<br><br>

<h1>potencia</h1>

<form action="" method="post">
<input type="text" name="base" placeholder="numero1"> 
<input type="text" name="exponente" placeholder="numero2">
<input type="hidden" name="accion" value="formulario_potencia">
<input type="submit" value="Enviar">
</form>



<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        if($_POST["accion"]=="formulario_edad"){
        $_nombre = $_POST["nombre"];
        $_edad = $_POST["edad"];

       comprobarEdad($_nombre, $_edad);
        }
    }



    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if($_POST["accion"]=="formulario_potencia"){
        $_base = $_POST["base"];
        $_exponente = $_POST["exponente"];

       
        calcularPotencia($_base, $_exponente);
        }

    }
    


?>  

    
</body>
</html>