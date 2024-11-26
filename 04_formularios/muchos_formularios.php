<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    require("../05_funciones/iva.php");
   
    ?>
</head>
<body>
    


<!--crear 4 formularios, para iva, irp, temperaturas y primos -->


<!--formulario iva -->
<h2>Calcular iva</h2>
<form action="" method="post">
    <label for="precio">Precio del producto</label>
    <input type="number" name="precio">
    <input type="hidden" name="accion" value="formulario_iva">
    <br>  <br>
    <label for="iva">Selecciona el tipo de iva</label>
    <select name="iva" id="iva">
        <option value="general">General</option>
        <option value="reducido">Reducido</option>
        <option value="superreducido">Superreducido</option>
    </select>
    <input type="submit" value="Calcular PVP">
</form>
<br><br>


<!--formulario irpf -->
<h2>Calcular irpf</h2>
<form action="" method="post">
<label for="salario">Salario</label>
<input type="number" name="salario" id="">
<input type="submit" value="Enviar">
</form>
<br><br>


<!--formulario temperaturas -->
<h2>Conversión temperaturas</h2>
<form action="" method="post">
    <label for="temperatura">Temperatura</label>
    <input type="number" name="temperatura">
    <select name="unidades" id="unidades">
        <option value="CELSIUS">CELSIUS</option>
        <option value="KELVIN">KELVIN</option>
        <option value="FAHRENHEIT">FAHRENHEIT</option>    
    </select>
    <select name="conversion" id="conversion">
        <option value="CELSIUS">CELSIUS</option>
        <option value="KELVIN">KELVIN</option>
        <option value="FAHRENHEIT">FAHRENHEIT</option>   
    </select> 
    <input type="submit" value="Enviar">

</form>
<br><br>



<!--formulario primos -->
<h2>Primos</h2>
<form action="" method="post">
    <input type="number" name="num1">
    <input type="number" name="num2">
    <input type="submit" value="Enviar">
</form>



<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */
    if($_POST["accion"]=="formulario_iva"){
    $_precio = $_POST["precio"];
    $_iva = $_POST["iva"];
    calcularIva($_precio, $_iva);
    }

    

}
?>
</body>
</html>