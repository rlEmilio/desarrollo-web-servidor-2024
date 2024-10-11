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

<!--EJERCICIO 1: Realiza un formulario que reciba 3 números y devuelva el mayor de ellos.-->

<body>
<form action="" method="post">
<input type="number" name="num1">
<input type="number" name="num2">
<input type="number" name="num3">
<input type="submit" value="Enviar">


</form>





<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */
 $_numero1 = $_POST["num1"];
 $_numero2 = $_POST["num2"];
 $_numero3 = $_POST["num3"];
 $mayor=0;


 if($_numero1>$_numero2 && $_numero1>$_numero3){
    $mayor=$_numero1;
 }else if($_numero2>$_numero1 && $_numero2>$_numero3){
    $mayor=$_numero2;

}else if($_numero3>$_numero1 && $_numero3>$_numero2){
    $mayor=$_numero3;
}

echo "El número mayor es: ".$mayor;

}

    ?>
</body>
</html>
