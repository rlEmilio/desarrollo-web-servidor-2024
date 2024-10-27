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
    
<!--EJERCICIO 4: Realiza un formulario que funcione a modo de conversor de 
temperaturas. Se introducirá en un campo de texto la temperatura, y 
luego tendremos un select para elegir las unidades de dicha temperatura, 
y otro select para elegir las unidades a las que queremos convertir la temperatura.

Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT". 
Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.

En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT.-->


<h2>Conversor de temperaturas to wapo</h2>

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




<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */

$_temperatura = $_POST["temperatura"];    
$_unidad = $_POST["unidades"];
$_conversion = $_POST["conversion"];
$respuesta ="";
match (true) {
    $_unidad == "CELSIUS" && $_conversion == "KELVIN" => $respuesta=  $_temperatura." grados CELSIUS equivalen a ".(int)(($_temperatura+273.15))." grados KELVIN" ,
    $_unidad == "CELSIUS" && $_conversion == "FAHRENHEIT" => $respuesta=  $_temperatura." grados CELSIUS equivalen a ".(int)(($_temperatura*9/5)+32)." grados FAHRENHEIT" ,
    $_unidad == "KELVIN" && $_conversion == "CELSIUS" => $respuesta=  $_temperatura." grados KELVIN equivalen a ".(int)(273.15-$_temperatura)." grados CELSIUS" ,
    $_unidad == "KELVIN" && $_conversion == "FAHRENHEIT" => $respuesta=  $_temperatura." grados KELVIN equivalen a ".(int)(($_temperatura-273.15)*(9/5)+32)." grados FAHRENHEIT" ,
    $_unidad == "FAHRENHEIT" && $_conversion == "CELSIUS" => $respuesta=  $_temperatura." grados FAHRENHEIT equivalen a ".(int)(($_temperatura-32)*(5/9))." grados CELSIUS" ,
    $_unidad == "FAHRENHEIT" && $_conversion == "KELVIN" => $respuesta=  $_temperatura." grados FAHRENHEIT equivalen a ".(int)(($_temperatura-32)*(5/9)+273.15)." grados KELVIN" ,
    //si se eligen las mismas unidades
    default => $respuesta = "Por favor, elija una unidad de medida diferente para realizar la conversión",
 
 
   
};

echo "<br><br>";
echo $respuesta;

}
?>



</body>
</html>