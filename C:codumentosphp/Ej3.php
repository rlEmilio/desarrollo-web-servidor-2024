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
    
<!--EJERCICIO 3: Realiza un formulario que reciba dos números y 
devuelva todos los números primos dentro de ese rango (incluidos los extremos).-->

<h2>Números primos en el rango</h2>
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


$_num1 = $_POST["num1"];
$_num2 = $_POST["num2"];
$primo = true;
$cadena = "";

for($i=$_num1;$i<=$_num2;$i++){
    $primo = true; //reinicio primo
    for($j=2;$j<$i;$j++){
        if($i%$j==0) { //si el numero no es primo
            $primo = false;
        } 
    }

    
    
    if($primo){
        $cadena = $cadena.$i.", ";
    }
}

//este codigo es para quitar la última coma de la cadena;
$tamano = strlen($cadena);
//echo $tamano;
$cadena_format = substr_replace($cadena, '', $tamano-2);


echo "<br><br>";
echo "Los números primos entre ".$_num1." y ".$_num2." son: ".$cadena_format;
 

}

?>
</body>
</html>