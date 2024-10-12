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




<form action="" method="post">
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

</form>




<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */

$_temperatura = $_POST["temperatura"];    
$_unidad = $_POST["unidades"];
$_conversion = $_POST["conversion"];

if($_unidad == "CELSIUS" $$ $_conversion == "KELVIN" ){
    echo("La temperatura de "$temperatura." grados celsius equivale a ".($temperatura+273.15). " grados kelvin");
}

}

?>



</body>
</html>